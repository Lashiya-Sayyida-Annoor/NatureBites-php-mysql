<?php
session_start();
include("../Assets/Connection/Connection.php");


if(isset($_POST['btnsubmit']))
{
    $title=$_POST['txttitle'];
	$content=$_POST['txtarea'];
	
    $insQry="insert into tbl_complaint(complaint_title,complaint_content,shop_id)values('".$title."','".$content."','".$_SESSION['sid']."')";
	$con->query($insQry);
	   
}




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>shopcomplient</title>
</head>
<body>
  <center>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" cellpadding="10" cellspacing="0">
     <tr>
      <td width="131">Title</td>
      <td width="53"><label for="txttitle"></label>
      <input type="text" name="txttitle" id="txttitle" pattern="^[A-Za-z -]+$" title= "enter in valid form" required /></td>
    </tr>
    <tr>
      <td>content</td>
      <td><label for="txtnew"></label>
      <input name="txtarea" id="txtarea" cols="45" rows="5" pattern="^[A-Za-z -]+$" title= "enter in valid form" required /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table><br>

  <br /><br />
<h3> previous complaints</h3><br />
<table border="1" cellpadding="10" cellspacing="0">
<tr>
<tr>
<td align="center">SL No:</td>
<td align="center">Complaint Title:</td>
<td align="center">Complaint Content:</td>
<td align="center">Admin Reply:</td>
</tr>
<?php
$selc="SELECT * FROM tbl_complaint where shop_id=".$_SESSION['sid'];
 $resc=$con->query($selc);
   $i=0;
   while($rowc=$resc->fetch_assoc())
   {
  $i++;
?>
<tr>
       <td align="center"><?php echo $i;?></td>
       <td align="center"><?php echo $rowc['complaint_title'];?></td>
        <td align="center"><?php echo $rowc['complaint_content'];?></td>
          <?php
if($rowc['complaint_status']==1)
{
?>
            <td align="center"><?php echo $rowc['complaint_reply'];?></td>
            <?php
}
else
{
?>
            <td align="center">Waiting...</td>
            <?php
}
?>
         </tr>
<?php
   }
   ?>


</table>



</form><br /><br />
</center>
</body>
</html>
