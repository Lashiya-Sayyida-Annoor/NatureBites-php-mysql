<?php
 include("../Assets/Connection/Connection.php");
  session_start();
  $mesg="";
  $astatus=1;
  $rstatus=2;
  
   if(isset($_GET['aid']))
   {
	   $upqry="update tbl_shop set shop_status=".$astatus." where shop_id=".$_GET['aid'];
	   if($con->query($upqry))
	   {
		   echo "the status is 1(accepted)";
	   }
	   else
	   {
		   echo "the updation is failed";
	   }
   }
   if(isset($_GET['rid']))
   {
	   $upQry="update tbl_shop set shop_status=".$rstatus." where shop_id=".$_GET['rid'];
	   if($con->query($upQry))
	   {
		   echo "the status is 2(rejected)";
	   }
	   else
	   {
		   echo "the updation is failed";
	   }
   }
  
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table border="2">
<tr>
<td>Sl.No</td>
<td>Shop Name</td>
<td>Shop Email</td>
<td>Shop Contact</td>
<td>shop Address</td>
<td>shop District</td>
<td>shop Place</td>
<td>Shop Password</td>
<td>Shop logo</td>
<td>Shop Proof</td>
<td>Shop Status</td>
</tr>
<?php
$seleqry="select *from tbl_shop u inner join tbl_place c on u.place_id=c.place_id inner join tbl_district d on c.district_id=d.district_id where shop_status!=".$astatus." and shop_status!=".$rstatus."";
$res=$con->query($seleqry);
$i=0;
while($row=$res->fetch_assoc())
{
	$i++;
	
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row ['shop_name']; ?></td>
<td><?php echo $row ['shop_email']; ?></td>
<td><?php echo $row ['shop_contact']; ?></td>
<td><?php echo $row ['shop_address']; ?></td>
<td><?php echo $row ['district_name']; ?></td>
<td><?php echo $row ['place_name']; ?></td>
<td><?php echo $row ['shop_pass']; ?></td>
<td><img src="..\Assets\Files\shoplogo\<?php echo $row['shop_logo'];?>" width="100"/></td>
<td><a href="..\Assets\Files\shopproof\<?php echo $row['shop_proof'];?>" />proof</a></td>
<td align ="center"><a href ="ShopVerification.php?aid=<?php echo $row ['shop_id']?>">Accept</a>
<a href ="ShopVerification.php?rid=<?php echo $row ['shop_id']?>">Rejectt</a></td>
</tr>

<?php
}
?>
</table>


<h4><?php echo $mesg ?></h4>

<h3 align="center">Accepted Shop</h3>

<table border="2">
<tr>
<td>Sl.No</td>
<td>Shop Name</td>
<td>Shop Email</td>
<td>Shop Contact</td>
<td>shop Address</td>
<td>shop District</td>
<td>shop Place</td>
<td>Shop Password</td>
<td>Shop logo</td>
<td>Shop Proof</td>
<td>Shop Status</td>
</tr>

<?php
$seleqry="select *from tbl_shop u inner join tbl_place c on u.place_id=c.place_id inner join tbl_district d on c.district_id=d.district_id where shop_status=".$astatus;
$res=$con->query($seleqry);
$i=0;
while($row=$res->fetch_assoc())
{
	$i++;
	
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row ['shop_name']; ?></td>
<td><?php echo $row ['shop_email']; ?></td>
<td><?php echo $row ['shop_contact']; ?></td>
<td><?php echo $row ['shop_address']; ?></td>
<td><?php echo $row ['shop_address']; ?></td>
<td><?php echo $row ['district_name']; ?></td>
<td><?php echo $row ['shop_pass']; ?></td>
<td><img src="..\Assets\Files\shoplogo\<?php echo $row['shop_logo'];?>" width="100"/></td>
<td><a href="..\Assets\Files\shopproof\<?php echo $row['shop_proof'];?>" />proof</a></td>
<td><a href ="ShopVerification.php?rid=<?php echo $row ['shop_id']?>">Rejectt</a></td>
</tr>
<?php
}
?>
</table>

<h3 align="center">Rejected Shop</h3>

<table border="2">
<tr>
<td>Sl.No</td>
<td>Shop Name</td>
<td>Shop Email</td>
<td>Shop Contact</td>
<td>shop Address</td>
<td>shop District</td>
<td>shop Place</td>
<td>Shop Password</td>
<td>Shop logo</td>
<td>Shop Proof</td>
<td>Shop Status</td>
</tr>

<?php
$seleqry="select *from tbl_shop u inner join tbl_place c on u.place_id=c.place_id inner join tbl_district d on c.district_id=d.district_id where shop_status=".$rstatus;
$res=$con->query($seleqry);
$i=0;
while($row=$res->fetch_assoc())
{
	$i++;
	
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row ['shop_name']; ?></td>
<td><?php echo $row ['shop_email']; ?></td>
<td><?php echo $row ['shop_contact']; ?></td>
<td><?php echo $row ['shop_address']; ?></td>
<td><?php echo $row ['shop_address']; ?></td>
<td><?php echo $row ['district_name']; ?></td>
<td><?php echo $row ['shop_pass']; ?></td>
<td><img src="..\Assets\Files\shoplogo\<?php echo $row['shop_logo'];?>" width="100"/></td>
<td><a href="..\Assets\Files\shopproof\<?php echo $row['shop_proof'];?>" />proof</a></td>
<td ><a href ="ShopVerification.php?aid=<?php echo $row ['shop_id']?>">Accept</a>
</tr>
<?php
}
?>
</table>

</form>
</body>
</html>