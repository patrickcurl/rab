<?php

class Book extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
   // 'isbn10' => 'alpha_num|between:10,10',
   // 'isbn13' => 'alpha_num|between:13,13',
   );

    public static $sluggable = array(
        'build_from' => 'slug',
        'save_to'    => 'slug',
    );
    public function getSlugAttribute(){
      if($this->isbn13 != null){
        $isbn = $this->isbn13;
      } else {
        $isbn = $this->isbn10;
      }
      return $isbn . ' ' . $this->title . ' ' . $this->author . ' '. $this->publisher;
    }
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

      if (isset($xml->Items->Request->Errors->Error->Code) && $xml->Items->Request->Errors->Error->Code == 'AWS.InvalidParameterValue'){
        return null;
      } else {
        $book = array(
                    'isbn10' => (string) $xml->Items->Item->ASIN,
                    'isbn13' => (string) $xml->Items->Item->ItemAttributes->EAN,
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
          if (!isset($book) || $book == null){

             $book_info = self::getBook($isbn);
             if (isset($book_info) && $book_info != null)
              {


                  $book = new Book();
                 // $book->isbn10 = $book_info['isbn10'];
                  //check if $book_info['isbn10'] exists
                  if(isset($book_info['isbn10']) && $book_info['isbn10'] != null){
                    //if it does set attribute.
                    $book->isbn10 = $book_info['isbn10'];
                  } else {
                    // if it doesn't set it equal to first 7 digits of isbn + nax
                    $book->isbn10 = substr($book_info['isbn13'], 0, 7) . "nax";
                  }
                  if(isset($book_info['isbn13']) && $book_info['isbn13'] != null){
                    $book->isbn13 = $book_info['isbn13'];
                  } else {
                    $book->isbn13 = $book_info['isbn10'] . "nax";
                  }

                  $book->title = $book_info['title'];
                  $book->author = $book_info['author'];
                  $book->publisher = $book_info['publisher'];
                  $book->edition = $book_info['edition'];
                  $book->image_url = $book_info['image_url'];
                  $book->amazon_url = $book_info['amazon_url'];
                  $book->weight = $book_info['weight'];
                  $book->save();
              }
            }
            if (isset($book) && $book != null){

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
}