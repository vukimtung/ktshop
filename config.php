<?php

require_once 'vendor/autoload.php';

$google_client = new Google_Client();

$google_client->setClientID('364787826383-kqnbi4clph5kbuclb6m650scu1ggnijg.apps.googleusercontent.com');

$google_client->setClientSecret('uQUytEYfe0a1ePmihMEVDfLy');

$google_client->setRedirectUri('http://localhost/ktshop/taikhoan.php');

$google_client->addScope('email');

$google_client->addScope('profile');

?>