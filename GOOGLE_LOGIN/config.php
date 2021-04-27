<?php 
	require_once "../GoogleAPI_2.2.0 new/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("291973388441-06hngrak3t364v3cdvhr9f7olr9vol9f.apps.googleusercontent.com");
	$gClient->setClientSecret("0-KSsCDSxjtb_E5s0BHDsEXO");
	$gClient->setRedirectUri("http://localhost/project/GOOGLE_LOGIN/g_callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

?>