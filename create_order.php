<?php
session_start();
include_once('connect.php');

$email=$_SESSION['EmailID'];
$q=mysql_query("SELECT * FROM member where EmailID = '$email'") or die(mysql_error());
if(mysql_num_rows($q)!=0){
	$row=mysql_fetch_array($q);
	$id=$row['ID'];
	$query = mysql_query("INSERT INTO `order`(`UserID`,`LaundryID`) values ('$id','0')") or die(mysql_error()); 

	$q1=mysql_query("SELECT * FROM `order` where `UserID` = '$id' order by `OrderID` DESC LIMIT 1") or die(mysql_error());
	if(mysql_num_rows($q1) !=0 ){
		$row1=mysql_fetch_array($q1);
		$idOrder=$row1['OrderID'];
		echo $idOrder;
		header('location:new_order.php?id='.$idOrder);
	}
}
?>