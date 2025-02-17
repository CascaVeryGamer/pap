<?php
$google_client->setClientId('1084358701215-25gsqng3f2gppchnhhfhqvs881jk5ahv.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://localhost/pap');

$google_client->addScope('email');

$google_client->addScope('profile');

session_start();

require_once 'google-api-php-client/Google_Client.php';
require_once 'google-api-php-client/Google_Oauth2Service.php';

$gClient=new Google_Client();
$gClient->setApplicationName('Login to Pap');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECTING_URL);

$google_oauthV2=new Google_Oauth2Service($gClient);

?>