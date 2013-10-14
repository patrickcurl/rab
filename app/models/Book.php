<?php

class Book extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
   // 'isbn10' => 'alpha_num|between:10,10',
   // 'isbn13' => 'alpha_num|between:13,13',
   );
    public function item(){
      return $this->hasMany('Item');
    }
    public static $sluggable = array(
        'build_from' => array('title', 'author', 'isbn10', 'isbn13'),
        'save_to'    => 'slug',
    );
    public function getPriceAttribute(){
      $price = DB::table('retail_prices')->where('ISBN', '=', $this->isbn13)->first();
      if(isset($price) && $price != null){
        return number_format(($price->Price * 1.75), 2);
      }else {
        return (0.00);
      }

    }

    public static function getIsbns($isbn){
      $isbns = array();
      $iLength = strlen($isbn);
      if ($iLength == 10 || $iLength == 13){
        switch($isbn){
          case ($iLength == 10):
            $isbns[10] = $isbn;
            $isbns[13] = self::isbn10to13($isbn);
            break;
          case ($iLength == 13):
            $isbns[10] = self::isbn13to10($isbn);
            $isbns[13] = $isbn;
            break;
          default:
           $isbns[10] = null;
           $isbns[13] = null;
        }

      }
      if(isset($isbns[10]) || isset($isbns[13])){
        return $isbns;
      } else {
        return null;
      }
    }

    // public function getSlugAttribute(){
    //   if($this->isbn13 != null){
    //     $isbn = $this->isbn13;
    //   } else {
    //     $isbn = $this->isbn10;
    //   }
    //   return $isbn . ' ' . $this->title . ' ' . $this->author . ' '. $this->publisher;
    // }


    public static function getBook($isbn){
      $region = "com";
      $method = 'GET';
      $host = 'webservices.amazon.'.$region;
      $uri = '/onca/xml';

      $ass_tag = Config::get('env_vars.amazon_ass_tag');
      $public_key = Config::get('env_vars.amazon_public_key');
      $private_key = Config::get('env_vars.amazon_private_key');
      $params = array(
                      'Operation'=>"ItemLookup",
                      'IdType'=>"ISBN",
                      'Service'=>"AWSECommerceService",
                      'AWSAccessKeyId'=>$public_key,
                      'AssociateTag'=>$ass_tag,
                      'Version'=>"2011-08-01",
                      'Availability'=>"Available",
                      'SearchIndex' => "All",
                      'Condition'=>"All",
                      'ItemPage'=>"1",
                      'Timestamp'=> gmdate('Y-m-d\TH:i:s\Z'),
                      'ResponseGroup'=>"ItemAttributes,Images,OfferFull,Offers,Reviews,EditorialReview,BrowseNodes,SalesRank",
                      'ItemId'=> $isbn);
      ksort($params);
      $canonicalized_query = array();
      foreach ($params as $param=>$value)
      {
         $param = str_replace('%7E', '~', rawurlencode($param));
         $value = str_replace('%7E', '~', rawurlencode($value));
         $canonicalized_query[] = $param.'='.$value;
      }
      $canonicalized_query = implode('&', $canonicalized_query);
      $string_to_sign = $method."\n".$host."\n".$uri."\n".$canonicalized_query;
      $signature = base64_encode(hash_hmac('sha256', $string_to_sign, $private_key, TRUE));
      $signature = str_replace('%7E', '~', rawurlencode($signature));
      $url = 'http://'.$host.$uri.'?'.$canonicalized_query.'&Signature='.$signature;
      $xml = simplexml_load_file($url);
      $xml->registerXpathNamespace("xmlns", "http://webservices.amazon.com/AWSECommerceService/2011-08-01");

      /* if (isset($xml->Items->Request->Errors->Error->Code) && $xml->Items->Request->Errors->Error->Code == 'AWS.InvalidParameterValue'){
         return null; } */
        if(isset($xml->Items->Request->Errors)){
        return null;
      } else {
        $book = array(
                   // 'isbn10' => (string) $xml->Items->Item->ItemAttributes->ISBN,
                   // 'isbn13' => (string) $xml->Items->Item->ItemAttributes->EAN,
                    'title' => (string) $xml->Items->Item->ItemAttributes->Title,
                    'author' => (string) $xml->Items->Item->ItemAttributes->Author,
                    'publisher' => (string) $xml->Items->Item->ItemAttributes->Publisher,
                    'edition' => (string) $xml->Items->Item->ItemAttributes->Edition,
                    'image_url' => (string) $xml->Items->Item->LargeImage->URL,
                    'amazon_url' => (string) $xml->Items->Item->DetailPageURL,
                    'weight' => (double) number_format($xml->Items->Item->ItemAttributes->ItemDimensions->Weight /100, 2)
                    );


      return $book;
      }

    }

    public static function find_or_create($isbn){
        // Create a nulled object
        $nullBook = new Book();
        $nullBook->isbn10 = '0000000000';
        $nullBook->isbn13 = '0000000000000';
        $nullBook->title = 'Not valid.';
        $nullBook->author = 'Not valid.';
        $nullBook->publisher = 'Not valid.';
        $nullBook->edition = 'Not valid.';
        //$nullBook->image_url = 'Not valid.';
        $nullBook->amazon_url = 'Not valid.';
        $nullBook->weight = 0.00;
        $nullBook->singlePrice = 0.00;
        $nullBook->retailPrice = 0.00;

        // First we check if isbn is right size.
        if(strlen($isbn) != 13 && strlen($isbn) != 10){
          return $nullBook;
        } else {
          $book = Book::where('isbn10', '=', $isbn)
                        ->orWhere('isbn13', '=', $isbn)
                        ->first();
          if (empty($book)){

             $book_info = self::getBook($isbn);
             if (isset($book_info))
              // check to see if amazon returned book data
              {
                  // $isbns = array('10' => $book_info['isbn10'], '13' => $book_info['isbn13']);
                  $isbns = self::getIsbns($isbn);
                  $book = self::bookExists($isbns);

                  if($book == null){
                    // make sure that we have a book object one way or another.
                    $book = new Book();
                  }

                 // $book->isbn10 = $book_info['isbn10'];
                  //check if $book_info['isbn10'] exists

                  if(isset($isbns[13]) || isset($isbns[10])){
                  if(isset($isbns[13])){ $book->isbn13 = $isbns[13]; } else { $book->isbn13 = null;}
                  if(isset($isbns[10])){ $book->isbn13 = $isbns[10]; } else { $book->isbn10 = null;}
                  $book->title = $book_info['title'];
                  $book->author = $book_info['author'];
                  $book->publisher = $book_info['publisher'];
                  $book->edition = $book_info['edition'];
                  $book->image_url = $book_info['image_url'];
                  $book->amazon_url = $book_info['amazon_url'];
                  $book->weight = $book_info['weight'];
                  $book->save();
              } else{
                return $nullBook;
              }
                  }

            }
            if (isset($book)){

              $single = DB::table('single_prices')->where('isbn', '=', $isbn)->first();
              if(isset($single) || $single != null){
                  $singlePrice = $single->Price;
                  $singlePrice = $singlePrice - ($singlePrice * .1);
                  $singlePrice = self::floorToFraction($singlePrice, 2);
                  $book->singlePrice = $singlePrice;
              } else{
                $book->singlePrice = 0.00;
              }

              $retail = DB::table('retail_prices')->where('isbn', '=', $isbn)->first();
              if(isset($retail) || $retail != null){
              $retailPrice = $retail->Price;
              $book->retailPrice = $retailPrice;
              }


                 return $book;
              } else {


                return $nullBook;
              }

        }

    }
  public static function floorToFraction($number, $denominator = 1)
    {
        $x = $number * $denominator;
        $x = floor($x);
        $x = $x / $denominator;
        return $x;
    }

  public static function bookExists($isbns){

    $book = Book::where('isbn10', '=', $isbns['10'])
                              ->orWhere('isbn13', '=', $isbns['13'])->first();
    if (isset($book) && $book != null){
      return $book;
    } else {
      return null;
    }


  }
          /**
  * Function accepts either 12 or 13 digit number, and either provides or checks the validity of the 13th checksum digit
  *    Optionally converts to ISBN 10 as well.
  */
  public static function isbn13checker($input, $convert = FALSE){
    $output = FALSE;
    if (strlen($input) < 12){
      $output = array('error'=>'ISBN too short.');
    }
    if (strlen($input) > 13){
      $output = array('error'=>'ISBN too long.');
    }
    if (!$output){
      $runningTotal = 0;
      $r = 1;
      $multiplier = 1;
      for ($i = 0; $i < 13 ; $i++){
        $nums[$r] = substr($input, $i, 1);
        $r++;
      }
      $inputChecksum = array_pop($nums);
      foreach($nums as $key => $value){
        $runningTotal += $value * $multiplier;
        $multiplier = $multiplier == 3 ? 1 : 3;
      }
      $div = $runningTotal / 10;
      $remainder = $runningTotal % 10;

      $checksum = $remainder == 0 ? 0 : 10 - substr($div, -1);

      $output = array('checksum'=>$checksum);
      $output['isbn13'] = substr($input, 0, 12) . $checksum;
      if ($convert){
        $output['isbn10'] = isbn13to10($output['isbn13']);
      }
      if (is_numeric($inputChecksum) && $inputChecksum != $checksum){
        $output['error'] = 'Input checksum digit incorrect: ISBN not valid';
        $output['input_checksum'] = $inputChecksum;
      }
    }
    return $output;
  }

  /**
  * Function accepts either 10 or 9 digit number, and either provides or checks the validity of the 10th checksum digit
  *    Optionally converts to ISBN 13 as well.
  */
  public static function isbn10checker($input, $convert = FALSE){
    $output = FALSE;
    if (strlen($input) < 9){
      $output = array('error'=>'ISBN too short.');
    }
    if (strlen($input) > 10){
      $output = array('error'=>'ISBN too long.');
    }
    if (!$output){
      $runningTotal = 0;
      $r = 1;
      $multiplier = 10;
      for ($i = 0; $i < 10 ; $i++){
        $nums[$r] = substr($input, $i, 1);
        $r++;
      }
      $inputChecksum = array_pop($nums);
      foreach($nums as $key => $value){
        $runningTotal += $value * $multiplier;
        //echo $value . 'x' . $multiplier . ' + ';
        $multiplier --;
        if ($multiplier === 1){
          break;
        }
      }
      //echo ' = ' . $runningTotal;
      $remainder = $runningTotal % 11;
      $checksum = $remainder == 1 ? 'X' : 11 - $remainder;
      $checksum = $checksum == 11 ? 0 : $checksum;
      $output = array('checksum'=>$checksum);
      $output['isbn10'] = substr($input, 0, 9) . $checksum;
      if ($convert){
        $output['isbn13'] = isbn10to13($output['isbn10']);
      }
      if ((is_numeric($inputChecksum) || $inputChecksum == 'X') && $inputChecksum != $checksum){
        $output['error'] = 'Input checksum digit incorrect: ISBN not valid';
        $output['input_checksum'] = $inputChecksum;
      }
    }
    return $output;
  }

  public static function isbn10to13($isbn10){

    $isbnStem = strlen($isbn10) == 10 ? substr($isbn10, 0,9) : $isbn10;
    $isbn13data = self::isbn13checker('978' . $isbnStem);
    return $isbn13data['isbn13'];

  }

  public static function isbn13to10($isbn13){

    $isbnStem = strlen($isbn13) == 13 ? substr($isbn13, 12) : $isbn13;
    $isbnStem = substr($isbn13, -10);
    $isbn10data = self::isbn10checker($isbnStem);
    return $isbn10data['isbn10'];
  }
}