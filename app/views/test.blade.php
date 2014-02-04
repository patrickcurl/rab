
<?php
echo app()->environment();
// $b = Book::find_or_create('9780131367739');
// $u = User::find(1);
// $u = $u->toArray();
// $o = Order::createLabel($u, 3.5);
// var_dump($o);
//$b = Book::find_or_create('9780131367739');

//phpinfo();

$redis = Predis::connection();
$redis->set('name', 'Taylor');
// phpinfo();

// $u = User::find(1);
// $u = $u->toArray();
// $o = Order::createLabel($u, 3.5);
// var_dump($o
// try{
//         $client = new Guzzle\Http\Client('http://blog.recycleabook.com/api/');
//         $request = $client->get('get_recent_posts/?count=8');
//         $response = $request->send();
//         $data = $response->json();
//         $data = $data['posts'];
//         $posts = array();

//         foreach($data as $i => $post){
//             $posts[$i]['title'] = $post['title'];
//             $posts[$i]['url'] = $post['url'];
//             if (isset($post['attachments']) && $post['attachments'] != null){
//                 $posts[$i]['image'] = $post['attachments'][0]['url'];
//             } else {
//                 $posts[$i]['image'] = URL::to('images/assets/landscapes/landscape-2-e-300x300.jpg');
//             }
//             if(isset($post['excerpt'])){
//                 $posts[$i]['excerpt'] = $post['excerpt'];
//             } else {
//                 $posts[$i]['excerpt'] = 'Click below to read more...';
//             }

//         }
//        // $view->with('posts', $posts);
//         var_dump($posts);
//       } catch(ServerErrorResponseException $e){
//         var_dump($e);
//         // foreach($e as $ex){
//         //   echo $ex->getMessage() . "\n";
//         // }
//       }
// IMAPPP
// $imap = eden('Mail')->imap('imap.secureserver.net', 'patrick@recycleabook.com', 'password', 993, true);
// // $mbox = $imap->getMailBoxes();
// // var_dump(get_class_methods('Eden_Mail_Imap'));
// // var_dump(get_declared_classes());
// $imap->setActiveMailbox('INBOX');
// $count = $imap->getEmailTotal();

// $emails = $imap->getEmails(0, $count);
// //var_dump($imap->getUniqueEmails(365, true));
// foreach($emails as $e){
//   echo $e['from']['email'] . " | " .$e['subject'] . "<br />";
// }

// $emails = $imap->getEmails(0, 3);
//var_dump($emails);
// END_IMAPPP
?>
 <?php
// echo app()->env;
// $client = new Guzzle\Http\Client('http://blog.recycleabook.com/api/');
//     $request = $client->get('get_post/?slug=bitcoin-friend-or-foe');
//     // e.g. $request = $client->get('get_recent_posts/?count=8');
//     $response = $request->send();
//     $data = $response->json();
//     var_dump($data);

// //$isbn = "1558102582";
// $isbn2 = "9780131367739";

// $isbns = Book::getIsbns($isbn);
// var_dump($isbns);
// $book = getBook($isbn2);
// var_dump($book);
//  function getBook($isbn){
//       $region = "com";
//       $method = 'GET';
//       $host = 'webservices.amazon.'.$region;
//       $uri = '/onca/xml';

//       $ass_tag = Config::get('env_vars.amazon_ass_tag');
//       $public_key = Config::get('env_vars.amazon_public_key');
//       $private_key = Config::get('env_vars.amazon_private_key');
//       $params = array(
//                       'Operation'=>"ItemLookup",
//                       'IdType'=>"ISBN",
//                       'Service'=>"AWSECommerceService",
//                       'AWSAccessKeyId'=>$public_key,
//                       'AssociateTag'=>$ass_tag,
//                       'Version'=>"2011-08-01",
//                       'Availability'=>"Available",
//                       'SearchIndex' => "All",
//                       'Condition'=>"All",
//                       'ItemPage'=>"1",
//                       'Timestamp'=> gmdate('Y-m-d\TH:i:s\Z'),
//                       'ResponseGroup'=>"ItemAttributes,Images,OfferFull,Offers,Reviews,EditorialReview,BrowseNodes,SalesRank",
//                       'ItemId'=> $isbn);
//       ksort($params);
//       $canonicalized_query = array();
//       foreach ($params as $param=>$value)
//       {
//          $param = str_replace('%7E', '~', rawurlencode($param));
//          $value = str_replace('%7E', '~', rawurlencode($value));
//          $canonicalized_query[] = $param.'='.$value;
//       }
//       $canonicalized_query = implode('&', $canonicalized_query);
//       $string_to_sign = $method."\n".$host."\n".$uri."\n".$canonicalized_query;
//       $signature = base64_encode(hash_hmac('sha256', $string_to_sign, $private_key, TRUE));
//       $signature = str_replace('%7E', '~', rawurlencode($signature));
//       $url = 'http://'.$host.$uri.'?'.$canonicalized_query.'&Signature='.$signature;
//       return $url;
//       $xml = simplexml_load_file($url);
//       $xml->registerXpathNamespace("xmlns", "http://webservices.amazon.com/AWSECommerceService/2011-08-01");
//       return $xml;
//       if(isset($xml->Items->Request->Errors)){
//         return null;
//       }
//       /* if (isset($xml->Items->Request->Errors->Error->Code) && $xml->Items->Request->Errors->Error->Code == 'AWS.InvalidParameterValue'){
//        return null; */
//       else {
//         $book = array(
//                     'isbn10' => (string) $xml->Items->Item->ItemAttributes->ISBN,
//                     'isbn13' => (string) $xml->Items->Item->ItemAttributes->EAN,
//                     'title' => (string) $xml->Items->Item->ItemAttributes->Title,
//                     'author' => (string) $xml->Items->Item->ItemAttributes->Author,
//                     'publisher' => (string) $xml->Items->Item->ItemAttributes->Publisher,
//                     'edition' => (string) $xml->Items->Item->ItemAttributes->Edition,
//                     'image_url' => (string) $xml->Items->Item->LargeImage->URL,
//                     'amazon_url' => (string) $xml->Items->Item->DetailPageURL,
//                     'weight' => (double) number_format($xml->Items->Item->ItemAttributes->ItemDimensions->Weight /100, 2)
//                     );


//       return $book;
//       }

//     }



        /**
  * Function accepts either 12 or 13 digit number, and either provides or checks the validity of the 13th checksum digit
  *    Optionally converts to ISBN 10 as well.
  */
  function isbn13checker($input, $convert = FALSE){
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
  function isbn10checker($input, $convert = FALSE){
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

  function isbn10to13($isbn10){

    $isbnStem = strlen($isbn10) == 10 ? substr($isbn10, 0,9) : $isbn10;
    $isbn13data = isbn13checker('978' . $isbnStem);
    return $isbn13data['isbn13'];

  }

  function isbn13to10($isbn13){

    $isbnStem = strlen($isbn13) == 13 ? substr($isbn13, 12) : $isbn13;
    $isbnStem = substr($isbn13, -10);
    $isbn10data = isbn10checker($isbnStem);
    return $isbn10data['isbn10'];
  }
// $isbns = array('10' => '0440243831', '13' => '9780440243830');
// foreach($isbns as $iNum)
//                   {
//                     if(isset($iNum))
//                     {
//                       if(strlen($iNum) == 10)
//                       {
//                         // $book->isbn10 = $iNum;
//                         echo $iNum;
//                       } elseif(strlen($iNum) == 13)
//                       {
//                         // $book->isbn13 = $iNum;
//                         echo $iNum;
//                       }

//                     }
//                   }
// $book_info = Book::getBook('0440243831');
// $isbns = array('10' => $book_info['isbn10'], '13' => $book_info['isbn13']);
// $book = Book::bookExists($isbns);
// var_dump($book);
// $client = new Guzzle\Http\Client('http://blog.recycleabook.com/api/');
// 	    	$request = $client->get('get_post/?slug=bitcoin-friend-or-foe');
// 	   		$response = $request->send();
// 	    	$data = $response->json();


// 	    var_dump($data);
// $book = Book::find_or_create('0440243831');
// $book = self::bookExists($isbns);

//echo $book->Items->Item->ItemAttributes->ISBN;
// use Guzzle\Http\Client;

// $client = new Client('http://blog.recycleabook.com/api/');
// $request = $client->get('get_recent_posts/?count=6');
// //echo $request->getUrl();
// $response = $request->send();
// $data = $response->json();
// var_dump($data['posts'][0]);
// $request = Requests::get('http://blog.recycleabook.com/api/get_recent_posts/?count=6', array('Accept' => 'application/json'));


// var_dump($request->status_code);
// var_dump($request->headers['content-type']);
// var_dump($request->body);

// function floorToFraction($number, $denominator = 1)
// {
//     $x = $number * $denominator;
//     $x = floor($x);
//     $x = $x / $denominator;
//     return $x;
// }

// echo floorToFraction(50.51, 2) . "-- 50.51 <br />";
// echo floorToFraction(50.59, 2) . "-- 50.59 <br />";
// echo floorToFraction(50.99, 2) . "-- 50.99 <br />";
// echo floorToFraction(50.49, 2) . "-- 50.51 <br />";

// $num = 50.00;
// for($i=0;$i<100;$i++){
// 	echo floorToFraction($num, 2) . "-- {$num} <br />";
// 	$num = $num + .01;
// }
//


// $refs = User::find(9)->refs()->get();
// $pending_orders_total = 0.00;
// $pending_orders_count = 0;
// $accepted_orders_total = 0.00;
// $accepted_orders_count = 0;
// $total_orders_count = 0;
// $total_orders_amount = 0.00;
// foreach($refs as $ref){
// 	$orders = $ref->orders()->get();

// 	 foreach ($orders as $order) {
// 	 	//var_dump($order);
// 	 	if ($order->received_date == null){
// 	 		$pending_orders_total += $order->total_amount;
// 	 		$pending_orders_count += 1;
// 	 		// echo "{$order->total_amount} - {$order->received_date} <br />";
// 	 	}

// 	 	if ($order->received_date != null){
// 	 		$accepted_orders_total += $order->total_amount;
// 	 		$accepted_orders_count += 1;
// 	 		// echo "{$order->total_amount} - {$order->received_date} <br />";
// 	 	}
// 	 	$total_orders_count += 1;
// 	 	$total_orders_amount += $order->total_amount;

// 	 }
// }

// echo "{$pending_orders_total}<br />";
// echo "{$pending_orders_count}<br />";
// echo "{$accepted_orders_total}<br />";
// echo "{$accepted_orders_count}<br />";
// echo "{$total_orders_amount}<br />";
// echo "{$total_orders_count}<br />";
//

// $comm = User::getCommissions(9);
// var_dump($comm);
//

// $b = Book::getBook('0802404936');
// var_dump($b);
// $c = Book::find_or_create('0802404936');
// var_dump($c);
?>
