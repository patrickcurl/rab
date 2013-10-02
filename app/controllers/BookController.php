<?php
 use Intervention\Validation;
class BookController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */
    public function missingMethod($params)
{
    //return $params;
    return call_user_func_array( array($this, 'getIndex'), $params );
}

public function getIndex($slug=null){
        if (empty($slug)){
            return Redirect::to('/')->with('message', 'Book not found.');
        } else {
            if (isset($slug) && $slug != null)
            {
                $book = Book::where('slug', '=', $slug)->first();
                    return View::make('books.index', array('book' => $book));
            } else
            {
                    Redirect::back()->with('message', 'Book not found.');
            }
        }
}
    //public function getSearch($isbn)

    public static function searchBook($isbns)
    {
        $isbns = Input::get('isbns');
        $isbns = preg_replace('/[^a-z\d,]/i', '', $isbns);
        $isbns = explode(",", $isbns);
        $isbns = array_unique($isbns);
        $books = array();

        foreach($isbns as $isbn){
            $book = Book::find_or_create($isbn);
            $multiplier = self::getMultiplier();
            $price = $book->retailPrice * $multiplier;
            $book->price = round($price, 0, PHP_ROUND_HALF_DOWN);

            if($book->isbn10 != '0000000000'){
                array_push($books, $book);
            }

        }

        return $books;
    }

    public static function getMultiplier(){
        $multiplier = 1.75;
        if(isset($_COOKIE['referred_by']) && $_COOKIE['referred_by'] != null){
             $aid = $_COOKIE['referred_by'];
        }
         elseif(Session::get('referred_by')
                && Session::get('referred_by') !=null)
        {
              $aid = Session::get('referred_by');
        }
        if(isset($aid) && $aid != null){
            $aff = User::where('username', '=', $aid)->first();
            if (isset($aff) && $aff != null){
                if($aff->price_level && $aff->price_level != null){
                    $multiplier = number_format($aff->price_level, 2);

                }
            }
        }
        return $multiplier;
    }
    public function postSearch()
    {

        $books = self::searchBook(Input::get('isbns'));
        if(isset($books) && $books != null){
            return View::make('books.search', array('books' => $books) );
        } else {
            return View::make('books.not_found');
        }

    }
    public function getIsbnResults()
    {
        //$isbns =  str_replace("\r", "", Input::get('isbn'));
        $isbns = preg_replace('/[^a-z\d,]/i', '', Input::get('isbn'));
        $isbns = explode(",", $isbns);
        $isbns = array_unique($isbns);

        $books = array();
       // return var_dump($isbn);
        foreach($isbns as $isbn){
           // if(\Intervention\Validation\Validator::isIsbn($isbn)){
                $book = Book::find_or_create($isbn);

                array_push($books, $book);
           // }

        }

        //return $isbn;
        return View::make('books.search', array('books' => $books) );
    }
    public function postSearchSingle()
    {
        // $isbns =  str_replace("\r", "", Input::get('isbns'));
        $isbns = preg_replace('/[^a-z\d,]/i', '', Input::get('isbns'));
        $isbns = explode(",", $isbns);
        $isbns = array_unique($isbns);
        $books = array();
        //return var_dump($isbns);
        foreach($isbns as $isbn){
           // if(\Intervention\Validation\Validator::isIsbn($isbn)){
                $book = Book::find_or_create($isbn);
                array_push($books, $book);
          //  }

        }

        //return $isbn;
        return View::make('single.search', array('books' => $books) );
    }
    public function searchISBN(){
        $isbn = Input::get('isbn');
       // if(\Intervention\Validation\Validator::isIsbn($isbn)){
            $book = Book::find_or_create($isbn);
       // }
        if($book){







            // $string ="<books><details><title>{$book->title}</title><author>{$book->author}</author><image>{$book->image_url}</image><isbn>{$book->isbn13}</isbn><buyback>{$price}</buyback></details></books>";
            // $xml = new SimpleXMLElement($string);
            //
            // return echo $xml->asXML();

            $dom = new DOMDocument( "1.0", "ISO-8859-15" );
            $root = $dom->createElement("books");
            $dom->appendChild($root);
            $dom->formatOutput=false;

            $details = $dom->createElement("details");
            $root->appendChild($details);
            $title_text = $dom->createTextNode($book->title);
            $title = $dom->createElement("title");
            $details->appendChild($title_text);
            $title->appendChild($title_text);

            $author_text = $dom->createTextNode($book->author);
            $author = $dom->createElement("author");
            $details->appendChild($author);
            $author->appendChild($author_text);

            $image_src = $dom->createTextNode($book->image_url);
            $image = $dom->createElement("image");
            $image->appendChild($image_src);
            $details->appendChild($image);

            $isbn_text = $dom->createTextNode($book->isbn13);
            $isbn = $dom->createElement("isbn");
            $details->appendChild($isbn);
            $isbn->appendChild($isbn_text);
            $tempbook = DB::table('retail_prices')
                ->where('isbn', '=', $book->isbn13)->first();

            if($tempbook){
            $price = number_format(($tempbook->Price * 1.7), 2);
            $buyback_text = $dom->createTextNode($price);
            $offer = $dom->createElement("buyback");
            $details->appendChild($offer);
            $offer->appendChild($buyback_text);
            } else {
                //$price = number_format(($tempbook->Price * 1.7), 2);
                $buyback_text = $dom->createTextNode("Not Currently Buying");
                $offer = $dom->createElement("buyback");
                $details->appendChild($offer);
                $offer->appendChild($buyback_text);
            }
            $output = $dom->saveXML();
            $headers['Content-Type'] = 'application/xml';
            return Response::make($output, 200, $headers);
            //print($output);

        }
        else
        {
            return "tough titty said the kitty...";
        }
    }

}
