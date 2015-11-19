<?php
ob_end_clean();
ob_start();
session_start();
include_once('connect.php');

$email=$_SESSION['EmailID'];
echo $email;
if(isset($_POST['type'])){
	$washtype=$_POST['type'];
	echo $washType;
} 
if(isset($_POST['clothtype'])&&isset($_POST['number'])){
	
	$clothtype=$_POST['clothtype'];
	$number=$_POST['number'];
	
	echo $clothType;
	$id=$_GET['id'];
	$checkQ=mysql_query("select * from `order` where `OrderID`='$id' and `UserID`=(select `ID` from `member` where `EmailID`='$EmailID')");
	if(mysql_num_rows($checkQ) == 1){
		if($id != " " || $id != "%" || $id != "#"){
			$query = mysql_query("INSERT INTO `order_details`(`orderid`,`washType`,`clothType`,`number`) values ('$id','$washType','$clothType','$number')") or die(mysql_error()); 
		}
	}
	header('location:new_order.php?id='.$id);
}else{
	echo "you are here";
}
?>