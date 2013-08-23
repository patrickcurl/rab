<?php
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
            return Redirect::to('/')->with('message', 'User has been deleted and cannot login.');
        }
        catch(UserUnverifiedException $e) {
            echo "User has not yet verified";
            return Redirect::to('/')->with('message', 'User has been deleted and cannot login.');
        }
        catch(UserDisabledException $e) {
            echo "User is currently disabled";
            return Redirect::to('/')->with('message', 'User has been deleted and cannot login.');
        }
        catch(UserPasswordIncorrectException $e) {
            echo "The password entered is NOT correct, please try again.";
            return Redirect::to('/')->with('message', 'User has been deleted and cannot login.');
        }


    }

    public function getLogout(){
        Auth::logout();
        return Redirect::back();
    }



}