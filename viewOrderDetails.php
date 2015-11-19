<?php
ob_end_clean();
ob_start();
session_start();
include_once('header.php');
?>
<html>
<head>
	<title>Order Details</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="order_style.css">
</head>
<body>
<section class="loginform cf">
<h2 align="center" color="Blue"> Order Details </h2>
<script language="javascript">
function focuson()
  { document.loginr.userid.focus()}
</script>
<form method="POST" action="create_order.php">
<table border="0">
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
<td align="right">
<a href="create_order.php" ><button type="button" align="right" class="btn btn-group-sm btn-primary"><span class="glyphicon glyphicon-list-alt"></span><strong> New Order </strong></button></a>
<br>
<br>
</td></table>
</form>
<?php

include_once('connect.php');
$mailID=$_SESSION['EmailID'];

	if(!empty($mailID))
	{
		$query = mysql_query("SELECT * FROM member where EmailID = '$mailID'") or die(mysql_error()); 
	
		if(mysql_num_rows($query)==1) 
		{
			$row = mysql_fetch_array($query);
			$custID = $row['ID'];
			$query1 = mysql_query("SELECT * FROM `order` where UserID=$custID AND `Delivered`!='1' order by `OrderID`") or die(mysql_error());
			if(mysql_num_rows($query1)>0){
				while($row1=mysql_fetch_array($query1)){
				?>
			<table id="view_tbl" align="center" border="1">
				<tr>
					<td nowrap="nowrap" style="text-align:left" width="20%">
					<strong>Order ID :</strong></td><td  width="20%" style="font-size:18px; color:#FF6600"><?php echo $row1['OrderID'];?><br/></td>
				</tr>
				<tr>
					<td  style="text-align:left"><strong>Pick Up Date :</strong></td>
						<?php if($row1['Date']=="0000-00-00"){  ?>
					<td  style="text-align:left"><?php echo "Not Given";?><br /></td>
					<?php
					}else{?>
					<td  style="text-align:left"><?php echo $row1['Date'];?><br /></td>
				</tr>
				<?php }?>
				<tr>
					<td  style="text-align:left"><strong>Laundry :</strong></td>
					<td  style="text-align:left">
					<?php 
					$laundryId=$row1['LaundryID'];
					$queryLaundryName=mysql_query("SELECT * FROM member where ID = '$laundryId'") or die(mysql_error()); 
					if(mysql_num_rows($queryLaundryName)==1){
						$row2=mysql_fetch_array($queryLaundryName);
						echo $row2['Name'];
					}else{
						echo 'Not Yet Selected';
					}
					?><br /></td>
				</tr>
				<tr>
				   <td  style="text-align:left"><strong>Total Clothes :</strong></td>
					<?php if($row1['Tot_Clothes']==""){ ?>
					<td  style="text-align:left"><?php echo "Not Given";?><br /></td>
						<?php
						}else{?>
					<td  style="text-align:left"><?php echo $row1['Tot_Clothes'];?><br /></td>
				</tr>
				<?php }?>
				<tr>
				   <td  style="text-align:left"><strong>Amount :</strong></td>
					<?php if($row1['Tot_Price']==""){?>
						<td  style="text-align:left"><?php echo "Not Given";?><br /></td>
					<?php }else{?>
						<td><?php echo $row1['Tot_Price']; ?></td>
				</tr>
				<?php }
				?>
				<tr>
				<td></td>
					<td>
					<a href="new_order.php?id=<?php echo $row1['OrderID'];?>" class="new_order" title="view-details"><button type="button" class="btn btn-group-sm btn-primary"><span class="glyphicon glyphicon-list-alt"></span><strong> Edit</strong></button></a>
					</td>
				</tr>
			</table>
			<br/>
			<?php }
				}else{
				?><h4 align="center">You have not placed any orders yet. Please do that using the button above</h4>
				<?php
				
			}
		}
	}
	require_once('footer.php');
	?>
</section>
</body>
</html> 