<?php 
	setcookie("AdminLoginStatus","true",time()-80000,'/');
	header('location:admin_login.php');
?>