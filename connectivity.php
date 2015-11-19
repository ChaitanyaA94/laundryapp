<?php 
ob_end_clean();
ob_start();
session_start();
include_once('connect.php');
if(isset($_POST['EmailID'])) 
{
	if(!empty($_POST['EmailID']))  
	{
	$query = mysql_query("SELECT * FROM `member` where EmailID = '$_POST[EmailID]' AND password = '$_POST[password]'") or die(mysql_error()); 
	
	if(mysql_num_rows($query)==1) 
	{
		$row = mysql_fetch_array($query);
		$_SESSION['EmailID'] = $row['EmailID'];
		$flag=$row['Type'];
		if($flag=='L'){
			//laundry
			header('location:custOrderDetails.php');
		}else{
			//user
			header('location:viewOrderDetails.php');
		}
	} 
	else 
	{ 
		$message="Wrong EmailID or Password";
		echo "<script type='text/javascript'>
		alert('$message');
		history.go(-1);
		</script>";
	} 
} 
} 
?>