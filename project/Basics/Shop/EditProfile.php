<?php
 include("../Assets/connection/connection.php");
 session_start();
 if(isset($_POST['btnupdate']))
 {
	 $name=$_POST['txtname'];
	 $email=$_POST['txtemail'];
	 $contact=$_POST['txtcontact'];
	 $address=$_POST['txtaddress'];
	 $laqry="update tbl_shop set shop_name='".$name."',shop_email='".$email."',shop_contact='".$contact."',shop_address='".$address."' where shop_id=".$_SESSION['sid'];
	 if($con->query($laqry))
	{
		echo "updated";
	}
	header("location:../Shop/MyProfile.php");
	 
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
<?php
$shopid=$_SESSION['sid'];
$seleqry="select *from tbl_shop u inner join tbl_place c on u.place_id=c.place_id inner join tbl_district d on c.district_id=d.district_id where shop_id='".$shopid."'";
$res=$con->query($seleqry);

while($row=$res->fetch_assoc())
{
?>            
<center>
  <table width="200" border="1">
    <tr>
      <td align="center" >Name</td>
      <td align="center"><input type="txt" name="txtname" pattern="^[A-Za-z -]+$" title= "enter in valid form" required value="<?php echo $row['shop_name']; ?>" /></td>
    </tr>
    <tr>
      <td align="center">Email</td>
      <td align="center"><input type="txt" name="txtemail"  pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" titlt="enter the valid email form" required value="<?php echo $row['shop_email']; ?>" /></td>
    </tr>
    <tr>
      <td align="center">Contact</td>
      <td align="center"><input type="txt" name="txtcontact"   pattern="^\d{10}$" title="Please enter a 10-digit phone number" requiredvalue="<?php echo $row['shop_contact']; ?>" /></td>
    </tr>
    <tr>
      <td align="center">Address</td>
      <td align="center"><input type="txt" name="txtaddress" cols="45" rows="5" pattern="[A-Za-z0-9\s.,-]+"  titlt="enter the valid form" required value="<?php echo $row['shop_address']; ?>" /></td>
    </tr>
    <td align="center" colspan="2"><input type="submit" name="btnupdate" value="update" /></td>
    </tr>
    </table>
    </center>
<?php

}

?>
</form>
</body>
</html>
