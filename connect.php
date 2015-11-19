<?php
$dbhost='localhost'; 
$dbname='laundry'; 
$dbuser='root'; 
$dbpass=''; 
$con=mysql_connect($dbhost,$dbuser,$dbpass) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db($dbname,$con) or die("Failed to connect to MySQL: ". mysql_error());
?>