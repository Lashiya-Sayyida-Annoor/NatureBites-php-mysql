<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
if(isset($_POST["btnsend"])){
$reply=$_POST["txtreplycom"];
$idid=$_GET['iid'];
$id=$_GET['rid'];
$comid=$_GET['coid'];


if($idid==1)
{

$insqry="update tbl_complaint set complaint_reply='".$reply."',complaint_status=1 where dist_id=".$id." and complaint_id=".$comid;
if($con->query($insqry)){

?>
<script>
alert("Complaint reply is saved");
window.location="viewcomplaint.php";

</script>
<?php
}
}
else
{

$ins="update tbl_complaint set complaint_reply='".$reply."',complaint_status=1 where user_id=".$id." and complaint_id=".$comid;
if($con->query($ins)){

?>
        <script>
alert("Complaint reply is saved");
window.location="viewcomplaint.php";

</script>
   
    <?php
}
}
}

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reply complaints</title>

<style>
    
    </style>
</head>

<body>
<center><br /><br />
<h2>Reply To Complaints</h2><br />
<form method="post">
<table border="1" rules="none" cellpadding="10" cellspacing="10" style="background-color:grey;" >>
<tr>
<td>Enter your reply:</td>
<td><textarea name="txtreplycom" rows="8" cols="50"></textarea></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="btnsend" value="SEND REPLAY" class="btn btn-primary btn-sm"/></td>
</tr>
</table>
<br />

</form>
</center>
</body>
<?php
ob_end_flush();
include('foot.php');
?>
</html>


        