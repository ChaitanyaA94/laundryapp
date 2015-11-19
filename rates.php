<?
ob_end_clean();
ob_start();
session_start();
require_once('header.php');
?>
<html>
<head>
	<title>Rates</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="rates_style.css">
</head>
<body>
<section class="loginform cf">
<form method="POST" action="#">
<center>
<h1>Rates and Services</h1>
<br>
<br>
<br>
<table border="3" width="300" cellpadding="10%">

<tr><h3>Ratecard</h3>(All values in &#8377;)</tr>
<tr>
<th contenteditable='false'>Wash\Clothes</th>
<th contenteditable='false'>Shirt</th>
<th contenteditable='false'>Trousers</th>
<th contenteditable='false'>Dress(Top)</th>
<th contenteditable='false'>Dress</th>
<th contenteditable='false'>Chaddar</th>
</tr>

<tr>
<th>Wash</th>
<td><input type="text" size="2" name="WS"></td>
<td><input type="text" size="2" name="WT"></td>
<td><input type="text" size="2" name="WD"></td>
<td><input type="text" size="2" name="WDT"></td>
<td><input type="text" size="2" name="WC"></td>
</tr>

<tr>
<th>Wash and Iron</th>
<td><input type="text" size="2" name="WIS"></td>
<td><input type="text" size="2" name="WIT"></td>
<td><input type="text" size="2" name="WID"></td>
<td><input type="text" size="2" name="WIDT"></td>
<td><input type="text" size="2" name="WIC"></td>
</tr>

<tr>
<th>Iron</th>
<td><input type="text" size="2"  name="IS"></td>
<td><input type="text" size="2" name="IT"></td>
<td><input type="text" size="2" name="ID"></td>
<td><input type="text" size="2" name="IDT"></td>
<td><input type="text" size="2" name="IC"></td>
</tr>

<tr>
<th>Dry Clean</th>
<td><input type="text" size="2" name="DS"></td>
<td><input type="text" size="2" name="DT"></td>
<td><input type="text" size="2" name="DD"></td>
<td><input type="text" size="2" name="DDT"></td>
<td><input type="text" size="2" name="DC"></td>
</tr>

</tbody>
</table>
<br>
<br>
<textarea name="desc" rows="5" cols="23" placeholder="You can enter your Laundry Description here."></textarea>
<br>
<br>
<input type="file" name="file1" id="file1" class="form-control">
</form>
<br>
<input type="submit" value="Continue" name="save">
</section>
</center>
<?php
session_start();
include_once('connect.php');
if(isset($_POST['save'])){
$email=$_SESSION['EmailID'];
$q=mysql_query("SELECT * FROM `member` where EmailID = '$email'") or die(mysql_error());
if(mysql_num_rows($q)!=0){
	$row=mysql_fetch_array($q);
	$id=$row['ID'];
$WS=$_POST['WS'];
$WT=$_POST['WT'];
$WD=$_POST['WD'];
$WDT=$_POST['WDT'];
$WC=$_POST['WC'];

	$queryW = mysql_query("INSERT INTO `rate` values ('$id','W','$WS','$WT','$WD','$WDT','$WC')") or die(mysql_error()); 
$WIS=$_POST['WIS'];
$WIT=$_POST['WIT'];
$WID=$_POST['WID'];
$WIDT=$_POST['WIDT'];
$WIC=$_POST['WIC'];
	$queryW = mysql_query("INSERT INTO `rate` values ('$id','WI','$WIS','$WIT','$WID','$WIDT','$WIC')") or die(mysql_error()); 

$DS=$_POST['DS'];
$DT=$_POST['DT'];
$DD=$_POST['DD'];
$DDT=$_POST['DDT'];
$DC=$_POST['DC'];
	$queryW = mysql_query("INSERT INTO `rate` values ('$id','D','$DS','$DT','$DD','$DDT','$DC')") or die(mysql_error());

$IS=$_POST['IS'];
$IT=$_POST['IT'];
$ID=$_POST['ID'];
$IDT=$_POST['IDT'];
$IC=$_POST['IC'];
	$queryW = mysql_query("INSERT INTO `rate` values ('$id','I','$IS','$IT','$ID','$IDT','$IC')") or die(mysql_error()); 


$desc=$_POST['desc'];
$path=getcwd()."/image";
$name1=$_FILES["file1"]["name"];
if ($_FILES["file1"]["error"] > 0) {
	$name1="";
 // echo "Error: " . $_FILES["file1"]["error"] . "<br>";
} 
else {
	$dest_photo=$_FILES["file1"]["tmp_name"];
	if(isset($_FILES["file1"]["name"]))
	{
		move_uploaded_file($dest_photo,"$path/$name1");
	}
}
	$queryUpdate = mysql_query("UPDATE member set Description='$desc',photo='$name1' where ID='$id'") or die(mysql_error()); 
	header('location:custOrderDetails.php');
}
}
require_once('footer.php');
?>
</body>
</html>