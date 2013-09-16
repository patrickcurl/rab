<?php

class Book extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

    public static $sluggable = array(
        'build_from' => 'slug',
        'save_to'    => 'slug',
    );
    public function getSlugAttribute(){
      return $this->title . ' ' . $this->author;
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

    public static function find_or_create($isbn){
        $book = Book::where('isbn10', '=', $isbn)
                      ->orWhere('isbn13', '=', $isbn)
                      ->first();
        if ($book){
            return $book;
        } else
        {
            $book_info = self::getBook($isbn);
            if ($book_info)
            {
                $book = new Book();
                $book->isbn10 = $book_info['isbn10'];
                $book->isbn13 = $book_info['isbn13'];
                $book->title = $book_info['title'];
                $book->author = $book_info['author'];
                $book->publisher = $book_info['publisher'];
                $book->edition = $book_info['edition'];
                $book->image_url = $book_info['image_url'];
                $book->amazon_url = $book_info['amazon_url'];
                $book->weight = $book_info['weight'];
                $book->save();
            }
            if ($book){
                return $book;
            } else {return Null;}
        }
    }
}