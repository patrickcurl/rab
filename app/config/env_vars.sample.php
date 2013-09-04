<?php
return array(
  'testVar' => "This is a test",
  'baseUrl' => 'http://rab.dev',
  //Database.php config vars.
  'db_name' => '',
  'db_user' => '',
  'db_pass' => '',

  //Mail.php config vars.
  'email_user' => '', //mandrill user
  'email_password' => '', // mandrill pass/api-key
  'email_from_address' => '', // global from address
  'email_from_name' => '', // global from address
  'email_host' => '',

  // Amazon API vars
  'ass_tag' => '',
  'amazon_public_key' => '',
  'amazon_private_key' => '',
  'amazon_ass_tag' => '',

  // UPS API vars
  'ups_license' => "",
  'ups_user' => "",
  'ups_pass' => "",
  'ups_company' => array(
      "name" => "",
      "attn" => "",
      "phone" =>"",
      "address" => "",
      "city" => "",
      "state" => "",
      "zip" => "",
      "ship_num" => "",
    ),
  'identified_by' => array('username', 'email'),
  'aff_id_powells' => '',
  'bb101_key' => '',
  'bb101_aff' => ''
  //Config::get('env_vars.var')
);