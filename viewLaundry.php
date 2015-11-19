<?php 
ob_end_clean();
ob_start();
session_start();
require_once('header.php');
?>
<html>
<head>
	<title>Laundry Details</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="laundry_style.css">
</head>
<body> 
<section class="loginform cf">
<div color="BLUE">
<h3 align="center"> Laundry Details </h3>
</div>
<script language="javascript">
function focuson()
  { document.loginr.userid.focus()}
</script>
<?php
include_once('connect.php');
$EmailID=$_SESSION['EmailID'];
$oid=$_GET['id'];

$checkQ=mysql_query("select * from `order` where `OrderID`='$oid' and `UserID`=(select `ID` from `member` where `EmailID`='$EmailID')");
if(mysql_num_rows($checkQ) == 1){
if($oid != " " || $oid != "%" || $oid != "#"){
$query = mysql_query("SELECT * FROM member where Type='L'") or die(mysql_error()); 
if(mysql_num_rows($query)>0){
	while($row=mysql_fetch_array($query)){
		$value=0;
		$lid=$row['ID'];
		$valueQuery=mysql_query("SELECT * FROM `order_details` where orderid='$oid'");
		if(mysql_num_rows($valueQuery)>0){
			
			while($rowQ=mysql_fetch_array($valueQuery)){
				$type=$rowQ['washType'];
				$ctype=$rowQ['clothType'];
				$number=$rowQ['number'];
				$temp=mysql_query("SELECT `$ctype` FROM `rate` where `Type`='$type' and LID='$lid'");
				$value+=($temp*$number);
			}
		}
	?>
<div align="center">
<table id="view_tbl" border="0">
        	<tr>
				<?php if($row['photo']==""){?>
					<td width="18%" rowspan="7" nowrap="nowrap" align="left">
                    	<a href="viewRate.php?id=<?php echo $row['id'];?>" class="truck_details" title="view-details">
                        <img src="image/NotAvailable.png" alt="Truck_img" title="Image not available" height="125px" width="130px"/>
                        </a>
                    </td>
					<?php }else{?>
					<td width="18%" rowspan="7" nowrap="nowrap" bgcolor="#FFF">
                    	<a href="viewRate.php?id=<?php echo $row['id'];?>" class="truck_details" title="view-details">
                        <img src="image/<?php echo $row['photo'];?>" alt="Truck_img" title="Truck_img" height="125px" width="130px"/>
                        </a>
                    </td>
					<?php }?>            	
            </tr>
            <tr>
               	<td nowrap="nowrap" style="text-align:left" width="20%">
				<strong>Name :</strong></td><td  width="62%" style="font-size:18px; color:#FF6600"><?php echo $row['Name'];?><br/></td>
            </tr>
            <tr>
               	<td  style="text-align:left;"><strong>Address:</strong></td>
					<?php if($row['Address']=="" ){  ?>
				<td  style="text-align:left"><?php echo "Not Given";?><br /></td>
				<?php
				}else{?>
				<td  style="text-align:left"><?php echo $row['Address'];?><br /></td>
 			</tr>
			<?php }?>
            <tr>
                <td  style="text-align:left"><strong>Telephone:</strong></td>
				<?php if($row['Telephone']==""){ ?>
				<td  style="text-align:left"><?php echo "Not Given";?><br /></td>
				<?php
				}else{?>
				<td  style="text-align:left"><?php echo $row['Telephone'];?><br /></td>
			</tr>
			<?php }?>
            <tr>
               <td  style="text-align:left"><strong>Rate:</strong></td>
				<?php if($value==0){ ?>
				<td  style="text-align:left"><?php echo "Not Given";?><br /></td>
					<?php
					}else{?>
				<td  style="text-align:left"><?php echo $value;?><br /></td>
			</tr>
			<?php }?>
            <tr>
               <td  style="text-align:left"><strong>Description:</strong></td>
				<?php if($row['Description']==""){?>
					<td  style="text-align:left"><?php echo "Not Given";?><br /></td>
				<?php }else{?>
					<?php $des=$row['Description']; 
					$h=strlen($des);
					$arr2 = str_split($des, 70);
					?>
			</tr>
			<?php }?>
            <tr>
                <td></td>
                <td align="right">
                <a href="sumbitOrder.php?id=<?php echo $row['ID'];?>&oid=<?php echo $oid;?>&value=<?php echo $value;?>" class="truck_details" title="view-details"><button type="button"><strong>Select Laundry</strong></button></a>
                </td>
            </tr>
        </table>
		</div>
		<?php
	}
}
}
}
require_once('footer.php');?>
</section>
</body>
</html> 

