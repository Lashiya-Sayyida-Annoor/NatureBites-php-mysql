<?php
ob_start();
include('head.php');
 include("../Assets/Connection/Connection.php");
  session_start();
  $mesg="";
  $astatus=1;
  $rstatus=2;
  
   if(isset($_GET['aid']))
   {
	   $upqry="update tbl_distributor set dist_status=".$astatus." where dist_id=".$_GET['aid'];
	   if($con->query($upqry))
	   {
		    "the status is 1(accepted)";
	   }
	   else
	   {
		   "the updation is failed";
	   }
   }
   if(isset($_GET['rid']))
   {
	   $upQry="update tbl_distributor set dist_status=".$rstatus." where dist_id=".$_GET['rid'];
	   if($con->query($upQry))
	   {
		   "the status is 2(rejected)";
	   }
	   else
	   {
		   "the updation is failed";
	   }
   }
  
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    table {
      border: 2px solid white;
      border-collapse: collapse;
    }

    td {
      padding: 10px;
    }
  </style>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
	<center style="    overflow-x: auto;
    -webkit-overflow-scrolling: touch;">
<table border="2" class="table table-bordered table-responsive table-hover table-dark"> 
	<thead>
<tr>
<td>Sl.No</td>
<td>Distributor Name</td>
<td>Distributor Email</td>
<td>Distributor Contact</td>
<td>Distributor Address</td>
<td>Distributor District</td>
<td>Distributor Place</td>
<td>Distributor logo</td>
<td>Distributor Proof</td>
<td> Status</td>
</tr>
</thead>
<tbody>
<?php
$seleqry="select *from tbl_distributor u inner join tbl_place c on u.place_id=c.place_id inner join tbl_district d on c.district_id=d.district_id where dist_status!=".$astatus." and dist_status!=".$rstatus."";
$res=$con->query($seleqry);
$i=0;
while($row=$res->fetch_assoc())
{
	$i++;
	
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row ['dist_name']; ?></td>
<td><?php echo $row ['dist_email']; ?></td>
<td><?php echo $row ['dist_contact']; ?></td>
<td> <?php echo $row ['dist_address']; ?></td>
<td> <?php echo $row ['district_name']; ?></td>
<td> <?php echo $row ['place_name']; ?></td>
<td><img src="..\Assets\Files\Distimg\<?php echo $row['dist_img'];?>" width="100"/></td>
<td><a href="..\Assets\Files\Distproof\<?php echo $row['dist_proof'];?>" class="btn btn-primary btn-sm"> proof</a></td>
<td align ="center"><a href ="DistributorVerification.php?aid=<?php echo $row ['dist_id']?>" class="btn btn-success">Accept</a>
<a href ="DistributorVerification.php?rid=<?php echo $row ['dist_id']?>" class="btn btn-danger">Reject</a></td>
</tr>

<?php
}
?>
</tbody>
</table>

<h4><?php echo $mesg ?></h4>

<h3 align="center">Accepted Distributor</h3>

<table border="2" class="table table-bordered  table-responsive table-hover table-dark" >
	<thead>
<tr>
<td>Sl.No</td>
<td>Distributor Name</td>
<td>Distributor Email</td>
<td>Distributor Contact</td>
<td>Distributor Address</td>
<td>Distributor District</td>
<td>Distributor Place</td>
<td>Distributor logo</td>
<td>Distributor Proof</td>
<td> Status</td>
</tr>
</thead>
<tbody>
        

<?php
$seleqry="select *from tbl_distributor u inner join tbl_place c on u.place_id=c.place_id inner join tbl_district d on c.district_id=d.district_id where dist_status=".$astatus;
$res=$con->query($seleqry);
$i=0;
while($row=$res->fetch_assoc())
{
	$i++;
	
?>

<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row ['dist_name']; ?></td>
<td><?php echo $row ['dist_email']; ?></td>
<td><?php echo $row ['dist_contact']; ?></td>
<td> <?php echo $row ['dist_address']; ?></td>
<td> <?php echo $row ['district_name']; ?></td>
<td> <?php echo $row ['place_name']; ?></td>
<td><img src="..\Assets\Files\Distimg\<?php echo $row['dist_img'];?>" width="100"/></td>
<td><a href="..\Assets\Files\Distproof\<?php echo $row['dist_proof'];?>" class="btn btn-primary btn-sm" >proof</a></td>
<td><a href ="DistributorVerification.php?rid=<?php echo $row ['dist_id']?>" class="btn btn-danger">Reject</a></td>
</tr>

<?php
}
?>
</tbody>
</table>

<h3 align="center">Rejected Distributor</h3>

<table border="2" class="table table-bordered  table-responsive table-hover table-dark" >
	<thead>
<tr>
<td>Sl.No</td>
<td>Distributor Name</td>
<td>Distributor Email</td>
<td>Distributor Contact</td>
<td>Distributor Address</td>
<td>Distributor District</td>
<td>Distributor Place</td>
<td>Distributor logo</td>
<td>Distributor Proof</td>
<td>Status</td>
</tr>
</thead>
<tbody>
<?php
$seleqry="select *from tbl_distributor u inner join tbl_place c on u.place_id=c.place_id inner join tbl_district d on c.district_id=d.district_id where dist_status=".$rstatus;
$res=$con->query($seleqry);
$i=0;
while($row=$res->fetch_assoc())
{
	$i++;
	
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row ['dist_name']; ?></td>
<td><?php echo $row ['dist_email']; ?></td>
<td><?php echo $row ['dist_contact']; ?></td>
<td> <?php echo $row ['dist_address']; ?></td>
<td> <?php echo $row ['district_name']; ?></td>
<td> <?php echo $row ['place_name']; ?></td>
<td><img src="..\Assets\Files\Distimg\<?php echo $row['dist_img'];?>" width="100"/></td>
<td><a href="..\Assets\Files\Distproof\<?php echo $row['dist_proof'];?>" class="btn btn-primary btn-sm">proof</a></td>
<td><a href ="DistributorVerification.php?aid=<?php echo $row ['dist_id']?>" class="btn btn-success">Accept</a>
</tr>

<?php
}
?>
</tbody>
</table>
</center>
</form>
</body>
<?php
ob_end_flush();
include('foot.php');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>