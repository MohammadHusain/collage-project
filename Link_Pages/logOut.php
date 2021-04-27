<?php 
session_start();
	//setcookie("name","mohammad",time() + 60);
	setcookie("userId","",time() - 80000,"/");
	setcookie("userName","",time() - 80000,"/");
	setcookie("userEmail","",time() - 80000,"/");
	setcookie("isGoogle","",time() - 80000,"/");
	setcookie("userImage","",time() - 80000,"/");
	unset($_SESSION['userId']);
	session_destroy();
	header("location:homePage.php");
?>