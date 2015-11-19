<?php 

ob_end_clean();
ob_start();

session_start();
$dbhost='localhost'; 
$dbname='laundry'; 
$dbuser='root'; 
$dbpass=''; 
$con=mysql_connect($dbhost,$dbuser,$dbpass) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db($dbname,$con) or die("Failed to connect to MySQL: ". mysql_error()); 

if(isset($_POST['regis'])){
$mtype=$_POST['type1'];
$name=$_POST['name'];
$address=$_POST['address'];
$phone_no=$_POST['phone_no'];
$email=$_POST['email'];
$pass1=$_POST['pass1'];

if($mtype=="washer")
	$mtype="L";
else
	$mtype="U";

 $query = mysql_query("INSERT INTO MEMBER(name,address,telephone,emailid,password,type) VALUES('$name','$address','$phone_no','$email','$pass1','$mtype')");
 if(!$query)
 {
	 $message="EmailID Already Exists";
		echo "<script type='text/javascript'>
		alert('$message');
		history.go(-1);
		</script>";
 }
 else{
	if($mtype=="L") 
	{ 
		$_SESSION['EmailID'] = $email;
		header('location:rates.php');	
	}else{
		$_SESSION['EmailID'] = $email;
		header('location:viewOrderDetails.php');
	}
 }
}
?>