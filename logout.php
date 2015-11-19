<?php
ob_end_clean();
ob_start();
session_start();
require_once('connect.php');
if(isset($_SESSION['EmailID']))
{
	session_destroy();
	unset($EmailID);
	header('location:index.php');
}else{
	echo"session not set";
}
?>