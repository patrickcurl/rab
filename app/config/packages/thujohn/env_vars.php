<?php
return array(
  'testVar' => "This is a test",
  'baseUrl' => 'http://rab.dev',
  //Database.php config vars.
  'db_name' => 'chrish_rab',
  'db_user' => 'chrish_rab',
  'db_pass' => 'FartNugget!@#',

  //Mail.php config vars.
  'email_user' => 'patrickwcurl@gmail.com', //mandrill user
  'email_password' => '14a0826b-b86a-481f-be63-6dc6cc3ba706', // mandrill pass/api-key
  'email_from_address' => 'info@recycleabook.com', // global from address
  'email_from_name' => 'RecycleABook.com', // global from address
  'email_host' => 'smtp.mandrillapp.com',

  // Amazon API vars
  'ass_tag' => 'recycleabook-20',
  'amazon_public_key' => 'AKIAI6SCW67W5JGC6KHQ',
  'amazon_private_key' => 'ZsS5CQfdoNgMrV/PLlE/aS7c/ff/EimPoI6yj7ir',
  'amazon_ass_tag' => 'recycleabook-20',

  // UPS API vars
  'ups_license' => "7CB1086EA7F00776",
  'ups_user' => "jodyrecycleabook",
  'ups_pass' => "04Lynne!",
  'ups_company' => array(
      "name" => "RecycleABook",
      "attn" => "Candi Mason",
      "phone" =>"9374394848",
      "address" => "561 Congress Park Dr",
      "city" => "Dayton",
      "state" => "OH",
      "zip" => "45459",
      "ship_num" => "877600",
    ),
  'identified_by' => array('username', 'email'),
  'aff_id_powells' => '37214',
  'bb101_key' => '818cb7c79e9dec8b3d15c5e215b1e2193701af4b',
  'bb101_aff' => '1532'
  //Config::get('env_vars.var')
);