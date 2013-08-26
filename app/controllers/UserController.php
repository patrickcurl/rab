<?php
use Toddish\Verify\UserNotFoundException;  // User can't be found
use Toddish\Verify\UserUnverifiedException; // User isn't verified
use Toddish\Verify\UserDisabledException; // User has been disabled
use Toddish\Verify\UserDeletedException; // User has been deleted
use Toddish\Verify\UserPasswordIncorrectException; // User has entered the wrong password
class UserController extends BaseController {

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
      //  $this->beforeFilter('auth');

        $this->beforeFilter('csrf', array('on' => 'post'));

    }

    public function getLogin(){

    }

    public function postLogin(){
        $email = Input::get('email');
        $password = Input::get('password');

        try{
            Auth::attempt(array(
              'identifier' => $email,
              'password' => $password
            ));
            return Redirect::to('/')->with('message', 'Successfully logged in.');
        }
        catch(UserDeletedException $e) {
            echo "User has been deleted and cannot login.";
            return Redirect::to('/')->with('message', 'User has been deleted and cannot login.');
        }
        catch(UserNotFoundException $e) {
            echo "We're sorry, that user does not exist, please try again.";
            return Redirect::to('/')->with('message', 'We\'re sorry, that user does not exist, please try again.');
        }
        catch(UserUnverifiedException $e) {
            echo "User account is not yet verified.";
            return Redirect::to('/')->with('message', 'User account is not yet verified.');
        }
        catch(UserDisabledException $e) {
            echo "User is currently disabled";
            return Redirect::to('/')->with('message', 'User has been disabled by admin.');
        }
        catch(UserPasswordIncorrectException $e) {
            echo "The password entered is NOT correct, please try again.";
            return Redirect::to('/')->with('message', 'The password entered is NOT correct, please try again.');
        }


    }

    public function getLogout(){
        Auth::logout();
        return Redirect::back();
    }



}