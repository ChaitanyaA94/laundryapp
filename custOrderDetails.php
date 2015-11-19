<!DOCTYPE html>
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
	<link rel="stylesheet" href="style.css">
</head>
<body> 
<section class="loginform cf">
<h2 align="center"> Order Details </h2>
<script language="javascript">
function focuson()
  { document.loginr.userid.focus()}
</script>
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
			$query1 = mysql_query("SELECT * FROM `order` WHERE `LaundryID`='$custID' AND `Delivered`!='1' ORDER BY `Date` ASC,`Time` ASC,`Tot_Price` DESC") or die(mysql_error());
			if(mysql_num_rows($query1)>0){
				while($row1=mysql_fetch_array($query1)){
				?>
				<table id="view_tbl" border="0" align="center">
					<tr>
					<td nowrap="nowrap" style="text-align:left" width="20%">
					<strong>Order ID :</strong></td><td  width="20%""><?php echo $row1['OrderID'];?><br/></td>
					</tr>
					<tr>
						<td  style="text-align:left;"><strong>User Name :</strong></td>
						<td  style="text-align:left">
						<?php
							$userId=$row1['UserID'];
							$queryUserName=mysql_query("SELECT * FROM member where ID = '$userId'") or die(mysql_error()); 
							if(mysql_num_rows($queryUserName)==1){
								$row2=mysql_fetch_array($queryUserName);
								echo $row2['Name'];
							}else{
								echo 'Not Yet Selected';
						}?>
					<br/></td>
					</tr>
					<tr>
						<td  style="text-align:left;"><strong>User Mobile Number :</strong></td>
						<td  style="text-align:left"><?php 
						$userId=$row1['UserID'];
						$queryUserName=mysql_query("SELECT * FROM member where ID = '$userId'") or die(mysql_error()); 
						if(mysql_num_rows($queryUserName)==1){
							$row2=mysql_fetch_array($queryUserName);
							echo $row2['Telephone'];
						}else{
							echo 'Not Yet Selected';
					}?><br /></td>
					</tr>
					<tr>
						<td  style="text-align:left;"><strong>User Address :</strong></td>
						<td  style="text-align:left"><?php 
						$userId=$row1['UserID'];
						$queryUserName=mysql_query("SELECT * FROM member where ID = '$userId'") or die(mysql_error()); 
						if(mysql_num_rows($queryUserName)==1){
							$row2=mysql_fetch_array($queryUserName);
							echo $row2['Address'];
						}else{
							echo 'Not Yet Selected';
					}?><br /></td>
					</tr>
					<tr>
						<td  style="text-align:left"><strong>Pick Up Date :</strong></td>
						<?php if($row1['Date']==""){ ?>
						<td  style="text-align:left"><?php echo "Not Set";?><br /></td>
						<?php
						}else{?>
						<td  style="text-align:left"><?php echo $row1['Date'];?><br /></td>
					
					<?php }?>
					</tr>
					<tr>
					   <td  style="text-align:left"><strong>No of Clothes :</strong></td>
						<?php if($row1['Tot_Clothes']==0){?>
							<td  style="text-align:left"><?php echo "Not Given";?><br /></td>
						<?php }else{?>
						<td style="text-align:left"><?php echo $row1['Tot_Clothes'];
						}?><br /></td>
					</tr>
					<tr>
					   <td  style="text-align:left"><strong>Price :</strong></td>
						<?php if($row1['Tot_Price']==""){?>
							<td  style="text-align:left	"><?php echo "Not Given";?><br /></td>
						<?php }else{?>
						<td style="text-align:left"><?php echo $row1['Tot_Price']; 
						}?><br /></td>
					</tr>
            <tr>
                <td align="right">
				</td>
                <td>
                <a href="detail_chart.php?id=<?php echo $row1['OrderID'];?>" class="new_order" title="view-details"><button type="button" class="btn btn-group-sm btn-primary"><span class="glyphicon glyphicon-list-alt"></span><strong> View Details </strong></button></a>
                </td>
            </tr>
        </table>
		<br/>
		<?php
			}
			}else{ ?><h4 align="center">You have no orders</h4>
		<?php
		}
		}
	}
	require_once('footer.php');?>
</section>
</body>
</html> 

