<html>
<head>
	<title>Clothes Details</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="chart_style.css">
</head>
<body>
<?php
ob_end_clean();
ob_start();
session_start();
require_once('header.php');
require_once('connect.php');
$EmailID=$_SESSION['EmailID'];
$id=$_GET['id'];
	if($id != " " || $id != "%" || $id != "#"){
?>
<section class="loginform cf">
<h2 align="center">Clothes Details</h2>
<h4 align="center">Order Id :<?php echo $id;?></h2>
<br/><br/>
<form method="POST" action="#">
<table align="center" cellpadding="25%">
<tr>
<th>Type\Clothes</th>
<th>Shirt</th>
<th>Trouser</th>
<th>Dress(Top)</th>
<th>Dress</th>
<th>Chaddar</th>
</tr>
<tr>
<th>Wash</th>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='W' and clothType='S'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='W' and clothType='T'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='W' and clothType='DT'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='W' and clothType='D'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='W' and clothType='C'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
</tr>
<tr>
<th>Wash+Iron</td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='WI' and clothType='S'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='WI' and clothType='T'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='WI' and clothType='DT'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='WI' and clothType='D'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='WI' and clothType='C'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
</tr>
<tr>
<th>Ironing</th>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='I' and clothType='S'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='I' and clothType='T'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='I' and clothType='DT'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='I' and clothType='D'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='I' and clothType='C'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
</tr>
<tr>
<th>Dry Cleaning</th>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='D' and clothType='S'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='D' and clothType='T'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='D' and clothType='DT'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='D' and clothType='D'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
<td><?php 
$q=mysql_query("SELECT sum(`number`) as total from order_details where orderid='$id' and washType='D' and clothType='C'") or die(mysql_error());
	$row=mysql_fetch_assoc($q);
	$num=$row['total'];
	if($num==NULL){
		echo 0;
	}else{
		echo $num;
	}
?></td>
</tr>
<tr>
<td></td>
<td><button type="submit" name="back">Back</button></td>
<td><input type="checkbox" name="picked">Picked</input></td>
<td><input type="checkbox" name="deliver">Delivered</input></td>
<td><button type="submit"  name="save">Save</button></td>
<td></td>
</tr>
</table></form>
</section>
<?php
	if(isset($_POST['save'])){
		if(isset($_POST['picked']) && isset($_POST['deliver'])){
			$qur=mysql_query("UPDATE `order` SET Picked='1',Delivered='1' where OrderID='$id'");
		}else if(isset($_POST['picked'])){
			$qur=mysql_query("UPDATE `order` SET Picked='1' where OrderID='$id'");
		}else if(isset($_POST['deliver'])){
			$qur=mysql_query("UPDATE `order` SET Picked='1',Delivered='1' where OrderID='$id'");
		}
		header('location:custOrderDetails.php');
	}
	if(isset($_POST['back'])){
		header('location:custOrderDetails.php');
	}
}
?>
</body>
</html>