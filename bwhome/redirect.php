<?php
require_once 'vendor/autoload.php';
// init configuration 
$clientID = '1092053652031-tsnkk1vhag6dvh2sl2fc6nks44iv47gb.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost:8080/index.php';
 
// create Client Request to access Google API 
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
// authenticate code from Google OAuth Flow 
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
 
  // get profile info 
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  // now you can use this profile info to create account in your website and make user logged in. 
} else {
  echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
}
?>