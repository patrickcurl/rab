<?php
class UsersTableSeeder extends Seeder{
	public function run(){
			 $users = array(
						array(
              'first_name' => 'Admin',
              'last_name' => 'User',
              'email' => 'patrickwcurl+admin@gmail.com',
              'password' => 'test123',
              'phone' => '9372235538',
              'address' => '54 Bond St',
              'city' => 'Dayton',
              'state' => 'OH',
              'zip' => '45405',
              'payment_method' => 'Paypal',
              'paypal_email' => 'test@testmonkey.com',
              'name_on_cheque' => 'Patrick Curl'),
            array(
              'first_name' => 'Patrick',
              'last_name' => 'Curl',
              'email' => 'patrickwcurl@gmail.com',
              'password' => 'test123',
              'phone' => '9372235538',
              'address' => '54 Bond St',
              'city' => 'Dayton',
              'state' => 'OH',
              'zip' => '45405',
              'payment_method' => 'Paypal',
              'paypal_email' => 'test@testmonkey.com',
              'name_on_cheque' => 'Patrick Curl'),
			);

			DB::table('users')->delete();
			foreach($users as $key => $user){
				//DB::table('users')->insert($user);
        $user = Sentry::register($user,true);
        //$user.save();
			}

      $groups = array(
            array(
              'name' => 'Admin',
              'permissions' => array(
                  'admin' => 1,
                  'customers' => 1,
                ),
              ),
            array(
              'name' => 'Customers',
              'permissions' => array(
                  'admin' => 0,
                  'customers' => 1,
                ),
              ),


      );

      DB::table('groups')->delete();
      $group1 = Sentry::getGroupProvider()->create($groups[0]);
      $group2 = Sentry::getGroupProvider()->create($groups[1]);

        $users = array(
            array('email' => 'patrickwcurl+admin@gmail.com', 'group' => $group1->id),
            array('email' => 'patrickwcurl@gmail.com', 'group' => $group2->id),
          );
        DB::table('users_groups')->delete();
        foreach($users as $user){
            $myuser = Sentry::getUserProvider()->findByLogin($user['email']);
            $group = Sentry::getGroupProvider()->findById($user['group']);
            $myuser->addGroup($group);

        }



	}
}