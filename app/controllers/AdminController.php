<?php

class AdminController extends BaseController {

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
public function __construct(){
        $this->beforeFilter("admin_auth");
    }



    public function getIndex()
    {
        $orders=array();
        $orders = Order::with('user')->paginate(20);
        $users = DB::table('users')->paginate(20);
        $data = array('orders' => $orders, 'users' =>$users);
        //return var_dump($orders);
        return View::make('admin.index', $data);
        //return View::make('cart.index', array('cart' => $cart));
    }

    public function getBuyers(){
        $group = Sentry::findGroupByName('buyers');
        $buyers = Sentry::findAllUsersInGroup($group);
        $data = array(
                           'supplies' => Supply::all(),
                           'orders' => SupplyOrder::all(),
                           // 'files' => Doc::all()->with('users')->toJson()
                           'files' => Doc::with('users')->get()->toJson(),
                           'buyers' => $buyers
                           );

        return View::make('admin.buyers', $data)->nest('child', 'partials._ang_files_js', $data);
     }




     public function postAddSupply(){
        $supply = Supply::create(array('name' => Input::get('name'), 'description' => Input::get('description')));
        return Redirect::to('admin/buyers')->with('message', 'Item added!');
     }

    public function getCustomers(){
        $filter = Input::get('f');
        if(isset($filter) && $filter == all){
            $orders = Order::with('user')->paginate(40);
        }
        $orders = Order::with('user')->paginate(40);
        return View::make('admin.customers', array('orders' => $orders));
    }

    public function getMailbox($m=null){
        $emails = Cache::get('emails', function(){
            $imap = eden('Mail')->imap('imap.secureserver.net', 'patrick@recycleabook.com', 'password', 993, true);
            $imap->setActiveMailbox('INBOX');
            $e = $imap->getEmails(0, $imap->getEmailTotal());
            Cache::add('emails', $e, 60);
            $imap->disconnect();

            return $e;

        });
        $data['emails'] = array();
        foreach($emails as $i => $em){
            $data['emails'][$i]['id'] = $em['id'];
            $data['emails'][$i]['from'] = $em['from']['email'];
            $data['emails'][$i]['to'] = $em['to'][0]['email'];
            $data['emails'][$i]['subject'] = $em['subject'];
            $data['emails'][$i]['date'] = date('m-d-Y', $em['date']);
        }

        if ($m=="json"){
            return json_encode($data['emails']);
        } else {
            return View::make('admin.mailbox_test', $data);
        }

    }


    public function getUsers(){
        $users = User::with('orders')->paginate(100);
        $groups = Group::all();
        //$users = Sentry::getUserProvider()->findAll()->with('orders');
        //php

        // $users->load('orders');
        return View::make('admin.users', array('users' => $users, 'groups' => $groups));
    }

    public function getGroups(){
        $groups = Sentry::findAllGroups();
        return View::make('admin.groups', array('groups' => $groups));
    }
    public function postAddGroup(){
        $grp = Input::get('group_name');
        try{
            $group = Sentry::createGroup(array(
                           'name' => $grp
                           ));
            return Redirect::back()->with('message', 'Groups successfully updated.');

        } catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
        {

            return Redirect::back()->with('message', 'Group name is required');
        }
        catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
        {
            return Redirect::back()->with('message', 'Group already exists');
        }
        return Redirect::back()->with('message', 'Something Else went wrong');

    }
    public function postUpdateOrders(){

      $orders = Input::get('orders');
        // process/update each order.

        foreach($orders as $order){

            // grab Order object.
            $o = Order::where('id', '=', $order['id'])->first();

            // grab User object.
            $u = User::where('id', '=', $o->user_id)->first();
           // return var_dump(date('Y-m-d', strtotime($order['received_date'])));

            // Received Date
            // check of Received date is set, and not empty. If empty/notset do nothing else update.
            if (isset($order['received_date']) && $order['received_date']!=null){

                // convert received date to date object;
                $received_date = date('Y-m-d', strtotime($order['received_date']));

                // check if old_received_date exists
                if (isset($order['old_received_date'])){
                    //if old_received_date exists convert to date object.
                    $old_received_date = date('Y-m-d', strtotime($order['old_received_date']));

                    // if received date does not match old received date...ie the record is updated, not the same.
                    if ($received_date != $old_received_date){
                        // update value
                        $o->received_date = $received_date;
                    }
                } else {
                    // there is no old_Received_date value, so it's the first time the record is updated, and we will send an email to user.
                    $o->received_date = $received_date;
                    $data['userId'] = $o->user_id;
                    $data['email'] = $o->user->email;

                    // Email the user on first update of this data field.
                    Mail::send('emails.shipment_received', $data, function($m) use($data)
                    {
                        $m->from('patrick@recycleabook.com', 'RecycleABook')->replyTo('clmason81@gmail.com')->to($data['email'])->subject('Shipment Received @ RecycleABook.com');
                    });
                }
            }


            // Paid Date
            if (isset($order['paid_date']) && !empty($order['paid_date'])){

                // convert paid date to date object;
                $paid_date = date('Y-m-d', strtotime($order['paid_date']));

                // check if old_paid_date exists
                if (isset($order['old_paid_date'])){
                    //if old_paid_date exists convert to date object.
                    $old_paid_date = date('Y-m-d', strtotime($order['old_paid_date']));

                    // if paid date does not match old paid date...ie the record is updated, not the same.
                    if ($paid_date != $old_paid_date){
                        // update value
                        $o->paid_date = $paid_date;
                    }
                } else {
                    // there is no old_paid_date value, so it's the first time the record is updated, and we will send an email to user.
                    $o->paid_date = $paid_date;
                    $data['userId'] = $o->user->id;
                    $data['email'] = $o->user->email;

                    // Email the user on first update of this data field.
                    Mail::send('emails.payment_sent', $data, function($m) use($data)
                    {
                        $m->from('patrick@recycleabook.com', 'RecycleABook')->replyTo('clmason81@gmail.com')->to($data['email'])->subject('Payment Received from RecycleABook.com');
                    });
                }
            }
             /*
            if ($paid_date != $order['old_paid_date']){
              $o->paid_date = $paid_date;

            }
            */
            $o->comments = $order['comments'];
            $o->save();


        }
        return Redirect::back()->with('message', 'Update successful');
    }



    /**
    *   Update method for users table.
    *
    **/
    public function postUpdateUsers(){
      $users = Input::get('users');
      //return var_dump($users);
        // process/update each order.
        foreach($users as $user){

          // grab User object.
          $u = User::where('id', '=', $user['id'])->first();
          $u->first_name = $user['first_name'];
          $u->last_name = $user['last_name'];
          $u->email = $user['email'];
          $u->phone = $user['phone'];
          $u->address = $user['address'];
          $u->city = $user['city'];
          $u->state = $user['state'];
          $u->zip = $user['zip'];
          $u->payment_method = $user['payment_method'];
          $u->paypal_email = $user['paypal_email'];
          $u->name_on_cheque = $user['name_on_cheque'];
          $u->save();

        }
        return Redirect::back()->with('message', 'Update successful');


    }

    public function postAddUser(){
        $inputs = array('first_name' => Input::get('first_name'),
                        'last_name' => Input::get('last_name'),
                        'email' => Input::get('email'),
                        'password' => Input::get('password'),
                        'password_confirmation' => Input::get('password_confirmation')
                        );
        $groups = Input::get('groups');
        // foreach($groups as $index => $g){
        //             $group = Sentry::findGroupByName($index);
        //            // $user->addGroup($group);
        //             return var_dump($group);
        //         }
        $rules = array(
                        'first_name' => 'required',
                        'last_name' => 'required',
                        'email' => 'required|email|unique:users,email',
                        'password' => 'required|confirmed',


                       );
        $v = Validator::make(
                             $inputs,
                             $rules
                             );
        if($v->fails()){
            $messages = $v->messages();
            return Redirect::to('admin/users')->withErrors($v);
        } else{
            try{
                $user = Sentry::register(
                                           array(
                                                 'first_name' => $inputs['first_name'],
                                                 'last_name' => $inputs['last_name'],
                                                 'email' => $inputs['email'],
                                                 'password' => $inputs['password'],
                                                 ), true
                                           );
                foreach($groups as $index => $g){
                    $group = Sentry::findGroupByName($index);
                    $user->addGroup($group);
                }
            }
            catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
            {
                echo 'Login field is required.';
            }
            catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
            {
                echo 'Password field is required.';
            }
            catch (Cartalyst\Sentry\Users\UserExistsException $e)
            {
                echo 'User with this login already exists.';
            }
            catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
            {
                echo 'Group was not found.';
            }
            return Redirect::back()->with('message', 'added user');
        }
    }

    public function postUpload(){

        //     $destinationPath = base_path(). '/' . "upload" . '/';

        //     if(Input::hasFile('myfile')){

        //         $file = Input::file('myfile'); // your file upload input field in the form should be named 'file'

        //         // Declare the rules for the form validation.
        //         $rules = array('myfile'  => 'mimes:jpg,jpeg,bmp,png,xls,pdf,csv');
        //         $data = array('myfile' => Input::file('myfile'));

        //         // Validate the inputs.
        //         $validation = Validator::make($data, $rules);

        //         if ($validation->fails())
        //         {
        //             return Response::json('error', 400);
        //         }

        //         if(is_array($file))
        //         {
        //             foreach($file as $part) {
        //                 $filename = $part->getClientOriginalName();
        //                 $part->move($destinationPath, $filename);
        //             }
        //         }
        //         else //single file
        //         {
        //             $filename = $file->getClientOriginalName();
        //             $uploadSuccess = Input::file('myfile')->move($destinationPath, $filename);
        //         }

        //         if( $uploadSuccess ) {
        //             return Response::json('success', 200);
        //         } else {
        //             return Response::json('error', 400);
        //         }

        //     }
        // }

        $file = Input::file('file');
        $destinationPath = 'uploads/';
        $fullFile = $file->getClientOriginalName();
        $name = pathinfo($fullFile, PATHINFO_FILENAME);
        $ext = pathinfo($fullFile, PATHINFO_EXTENSION);
        $fileName = $name . "-" . str_random(4) . "-" . date('m-d-Y');
        $fullFile = $fileName . "." . $ext;
        //$filename = date('m-d-Y') . "_" . str_random(8) . "_" .$file->getClientOriginalName();
        $filesize = $file->getSize();
        // $extension =$file->getClientOriginalExtension();
        // $filename = str_random(8) . "." .$extension;
        $upload_success = Input::file('file')->move($destinationPath, $fullFile);

        if( $upload_success && isset($fileName) && isset($ext)) {

            $nfile = new Doc;
            $nfile->name = $fileName;
            $nfile->ext = $ext;
            if (isset($filesize)) { $nfile->size = $filesize; }
            $nfile->save();

            //return $nfile->toJson();
            $files = Doc::with('users')->get()->toJson();
        //return Response::json('success123', 200);
        } else {
            return Response::json('error', 400);
        }
    }

    public function postAjaxUpdateFile(){ // path: /admin/ajax-update-file
        $id = Input::get('id');
        $name = Input::get('name');
        $description = Input::get('description');

        $file = Doc::find($id);
        if(isset($file)){
            // Removed as is messy and requires also physically renaming file.
            // if(isset($name)){
            //     $file->name = $name;
            // }
            if(isset($description))
                {$file->description = $description;
            }
            $file->save();
            $files = Doc::with('users')->get()->toJson();
            return $files;
        } else {
           return 400;
        }
    }

    public function postAjaxAddBuyerToDoc(){
        $doc = Doc::find(Input::get('doc'));
        $buyer = User::find(Input::get('buyer'));
        $doc->users()->attach(Input::get('buyer'));
        $files = Doc::with('users')->get()->toJson();
        //return $buyer->toJson();
        return $files;
     }
     public function postAjaxDeleteFiles(){
        $inFiles = Input::get('files');
        foreach($inFiles as $infile){
            Doc::destroy($infile['id']);
            File::delete(public_path().'/uploads/'.$infile['name'].'.'.$infile['ext']);
        }
        $files = Doc::with('users')->get()->toJson();
        return $files;
     }

     public function getAjaxGetFiles(){
        $files = Doc::all()->toJson();
        return $files;
     }

}