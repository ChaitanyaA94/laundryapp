<!DOCTYPE html>
<?php
ob_end_clean();
ob_start();
session_start();
require_once('header.php');
require_once('connect.php');
$EmailID=$_SESSION['EmailID'];
$Orderid=$_GET['id'];
$checkQ=mysql_query("select * from `order` where `OrderID`='$Orderid' and `UserID`=(select `ID` from `member` where `EmailID`='$EmailID')");
if(mysql_num_rows($checkQ) == 1){
if($Orderid != " " || $Orderid != "%" || $Orderid != "#"){
?>
<html>
<center>
<head>
	<title>New Order</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="newO_style.css">
</head>
<body>
<section class="loginform cf">
<br>
<form action="#" method="post">
<table align="center" cellpadding="20%">
<tr>
<td>
<label for="Type" id="washtype">TYPE</label></td><td>
<select name="type">
<option value="W">Washing</option>
<option value="I">Ironing</option>
<option value="D">Dry Cleaning</option>
<option value="WI">Washing+Ironing</option>
</select>
</td><td>
<label for="CLOTH TYPE" id="clothtype"> CLOTH TYPE</label></td><td>
<select name="clothtype">
<option value="S">Shirt</option>
<option value="P">Pant</option>
<option value="DT">Dress(Top)</option>
<option value="D">Dress</option>
<option value="C">Chaddar</option>
</select>
</td>
<td>
<label for="NUMBER" id="number">NUMBER</label></td><td>
<select name="number">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
</td><td>
<button type="submit" name="add">ADD</button>
</td>
</tr>
</table>
</form>
<?php
if(isset($_POST['add'])){
	$type=$_POST['type'];
	$clothtype=$_POST['clothtype'];
	$number=$_POST['number'];
	
	$query = mysql_query("INSERT INTO `order_details`(`orderid`,`washType`,`clothType`,`number`) values ('$Orderid','$type','$clothtype','$number')") or die(mysql_error());
	$queryNum=mysql_query("SELECT * from `order` where `OrderID`='$Orderid'");
	$r=mysql_fetch_array($queryNum);
	$cost=0;
	$LaundryID=$r['LaundryID'];
	if($LaundryID!=0){
			$valueQuery=mysql_query("SELECT * FROM `order_details` where orderid='$Orderid'") or die(mysql_error());
			if(mysql_num_rows($valueQuery)>0){
			
			while($rowQ=mysql_fetch_array($valueQuery)){
				$type=$rowQ['washType'];
				$ctype=$rowQ['clothType'];
				$number=$rowQ['number'];
				$temp=mysql_query("SELECT `$ctype` FROM `rate` where `Type`='$type' and LID='$lid'");
				$cost+=($temp*$number);
			}
		}
	}
	$rval=$r['Tot_Clothes'];
	$rval+=$number;
	$query1 = mysql_query("UPDATE  `order` SET `Tot_Clothes`='$rval',`Tot_Price`='$cost' where `OrderID`=$Orderid") or die(mysql_error());
	header('location:new_order.php?id='.$Orderid);
}
?>
</br>
<br>
<div>  
<table align="center" border ="1" cellpadding="25%">
<tr>
<td> Type</td>
<td>Washing</td>
<td>Type</td>
<td>Ironing</td>
</tr>
<tr>
</tr>
<tr>
<td>Number of Clothes</td> 
<td><?php
	$q1=mysql_query("SELECT sum(`number`) as num FROM `order_details` where `orderid`='$Orderid' and `washtype`='W'") or die(mysql_error());
	$row=mysql_fetch_array($q1);
	$num=$row['num'];
	if($num != NULL ){
		echo $num;
	}else{
		echo 0;
	}
?></td> 
<td>Number of Clothes</td> 
<td><?php
	$q1=mysql_query("SELECT sum(`number`) as num FROM `order_details` where `orderid`='$Orderid' and `washtype`='I'") or die(mysql_error());
	$row=mysql_fetch_array($q1);
	$num=$row['num'];
	if($num != NULL ){
		echo $num;
	}else{
		echo 0;
	}
?></td> 
</tr>
<tr>
</tr>
<tr>
<td>Type</td>
<td>Washing+Ironing</td>
<td>Type</td>
<td>Dry Cleaning</td>
</tr>
<tr>
</tr>
<tr>
<td>Number of Clothes</td> 
<td><?php
	$q1=mysql_query("SELECT sum(`number`) as num FROM `order_details` where `orderid`='$Orderid' and `washtype`='WI'") or die(mysql_error());
	$row=mysql_fetch_array($q1);
	$num=$row['num'];
	if($num != NULL ){
		echo $num;
	}else{
		echo 0;
	}
?></td> 
<td>Number of Clothes</td> 
<td><?php
	$q1=mysql_query("SELECT sum(`number`) as num FROM `order_details` where `orderid`='$Orderid' and `washtype`='D'") or die(mysql_error());
	$row=mysql_fetch_array($q1);
	$num=$row['num'];
	if($num != NULL ){
		echo $num;
	}else{
		echo 0;
	}
?></td> 
</tr>
<tr>
</tr>
</table>
<form method="post" action="#">
<table align="center" border="0" cellpadding="20%">
<tr>
<tr>
<td>Pick up Date:</td>
<td><input type="date" name="date" id="date"/></td>
<td>Pick up Time:</td>
<td><input type="time" id="time" name="time"/></td>
<td><input type="button" name="setdate" value="Set Date"/></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['setdate'])){
	$date=$_POST['date'];
	$time=$_POST['time'];
	$query1 = mysql_query("UPDATE  `order` SET `time`='$time',`date`='$date' where `OrderID`=$Orderid") or die(mysql_error());
}
?>
<table align="center" border="0" cellpadding="25%">
<tr>
<td></td>
<td><a href="viewOrderDetails.php" class="new_order" title="view-details"><button type="button">Go Back</button></a></td>
<td><a href="viewLaundry.php?id=<?php echo $Orderid;?>" class="new_order" title="view-details"><button type="button">Select the Laundry</button></a></td>
<td></td>
</tr>
</table>
</div>
</br>
<?php
}
}
require_once('footer.php');
?>
</section>
</body>
</center>
</html>