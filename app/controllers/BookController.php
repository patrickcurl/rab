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

    //public function getSearch($isbn)
     public function postSearch()
    {
        $isbns =  str_replace("\r", "", Input::get('isbns'));
        $isbns = explode("\n", $isbns);
        $isbns = array_unique($isbns);
        $books = array();
        //return var_dump($isbns);
        foreach($isbns as $isbn){
            if(\Intervention\Validation\Validator::isIsbn($isbn)){
                $book = Book::find_or_create($isbn);
                array_push($books, $book);
            }

        }

        //return $isbn;
        return View::make('books.search', array('books' => $books) );
    }
    public function postSearchSingle()
    {
        $isbns =  str_replace("\r", "", Input::get('isbns'));
        $isbns = explode(",", $isbns);
        $isbns = array_unique($isbns);
        $books = array();
        //return var_dump($isbns);
        foreach($isbns as $isbn){
            if(\Intervention\Validation\Validator::isIsbn($isbn)){
                $book = Book::find_or_create($isbn);
                array_push($books, $book);
            }

        }

        //return $isbn;
        return View::make('books.search_single', array('books' => $books) );
    }
    public function searchISBN(){
        $isbn = Input::get('isbn');
        if(\Intervention\Validation\Validator::isIsbn($isbn)){
            $book = Book::find_or_create($isbn);
        }
        if($book){
            $tempbook = DB::table('retail_prices')
                ->where('isbn', '=', $book->isbn13)->first();

            $price = number_format(($tempbook->Price * 1.7), 2);

            $string ="<books><details><title>{$book->title}</title><author>{$book->author}</author><image>{$book->image_url}</image><isbn>{$book->isbn13}</isbn><buyback>{$price}</buyback></details></books>";
            $xml = new SimpleXMLElement($string);
            return $xml->asXML();
        }
        else
        {
            return "the funky bunch";
        }
    }

}
