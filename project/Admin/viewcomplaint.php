<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Complaints</title>
</head>

<body>
<center><br /><br />
<h3>Complaints from Farmers</h3><br />
<table border="1" cellpadding="10" cellspacing="0" class="table  table-bordered table table-hover" style="background-color:grey;" >
<tr>
<td align="center">SL No:</td>
<td align="center">Farmer Name:</td>
<td align="center">Farmer Contact:</td>
<td align="center">Farmer Email:</td>
<td align="center">Complaint title:</td>
<td align="center">Complaint Description:</td>
<td align="center">Action:</td>
</tr>
<?php
$selc="SELECT * FROM tbl_complaint co inner join tbl_distributor c on co.dist_id=c.dist_id";
 $resc=$con->query($selc);
   $i=0;
   while($rowc=$resc->fetch_assoc())
   {
  $i++;
?>
<tr>
       <td align="center"><?php echo $i;?></td>
       <td align="center"><?php echo $rowc['dist_name'];?></td>
        <td align="center"><?php echo $rowc['dist_contact'];?></td>
         <td align="center"><?php echo $rowc['dist_email'];?></td>
         <td align="center"><?php echo $rowc['complaint_title'];?></td>
         <td align="center"><?php echo $rowc['complaint_content'];?></td>
         <?php
if($rowc['complaint_status']==0){
?>
         <td><a href="replycomplaint.php?rid=<?php echo $rowc['dist_id'] ?>&iid=1&coid=<?php echo $rowc['complaint_id'];?>" class="btn btn-primary btn-sm">Reply</a></td>
          <?php
}
else
{
?>
             <td align="center"><?php echo $rowc['complaint_reply']?></td>
             <?php
}
?>
         </tr>
<?php
   }
   ?>
</table>
<br /><br />
<h3>Complaints from users</h3><br />
<table border="1" cellpadding="10" cellspacing="0" class="table  table-bordered table table-hover" style="background-color:grey;"  >
<tr>
<td align="center">SL No:</td>
<td align="center">User Name:</td>
<td align="center">User Contact:</td>
<td align="center">User Email:</td>
<td align="center">Complaint title:</td>
<td align="center">Complaint Description:</td>
<td align="center">Action:</td>
</tr>
<?php
$selu="SELECT * FROM tbl_complaint co inner join tbl_user u on co.user_id=u.user_id";
 $resu=$con->query($selu);
   $i=0;
   while($rowu=$resu->fetch_assoc())
   {
  $i++;
?>
<tr>
       <td align="center"><?php echo $i;?></td>
       <td align="center"><?php echo $rowu['user_name'];?></td>
        <td align="center"><?php echo $rowu['user_contact'];?></td>
         <td align="center"><?php echo $rowu['user_email'];?></td>
         <td align="center"><?php echo $rowu['complaint_title'];?></td>
         <td align="center"><?php echo $rowu['complaint_content'];?></td>
         <?php
if($rowu['complaint_status']==0){
?>
         <td><a href="replycomplaint.php?rid=<?php echo $rowu['user_id']?>&iid=2&coid=<?php echo $rowu['complaint_id'];?>" class="btn btn-primary btn-sm">Reply</a></td>
         <?php
}
else
{
?>
             <td align="center"><?php echo $rowu['complaint_reply']?></td>
             <?php
}
?>
         </tr>
<?php
   }
   ?>
</table>
</center>
</body>
<?php
ob_end_flush();
include('foot.php');
?>
</html>

    