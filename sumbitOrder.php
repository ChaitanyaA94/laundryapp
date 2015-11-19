<?php
//sumbitOrder
ob_end_clean();
ob_start();
session_start();
include_once('connect.php');
$oid=$_GET['oid'];
$id=$_GET['id'];
$value=$_GET['value'];
$EmailID=$_SESSION['EmailID'];

$checkQ=mysql_query("select * from `order` where `OrderID`='$oid' and `UserID`=(select `ID` from `member` where `EmailID`='$EmailID')");
if(mysql_num_rows($checkQ) == 1){
	if($oid != " " || $oid != "%" || $oid != "#" || $id != " " || $id != "%" || $id != "#"){
		if($value!="Not Given"){
			$query1 = mysql_query("UPDATE  `order` SET `LaundryID`='$id',`Tot_Price`='$value' where `OrderID`='$oid'") or die(mysql_error());
		}
	}
}
header('location:viewOrderDetails.php');
?>