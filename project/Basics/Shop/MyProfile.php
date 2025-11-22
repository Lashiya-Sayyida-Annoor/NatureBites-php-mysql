<?php
  include("../Assets/Connection/Connection.php");
  session_start();
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
      <td align="center"><?php echo $row['shop_name']; ?></td>
    </tr>
    <tr>
      <td align="center">Email</td>
      <td align="center"><?php echo $row['shop_email']; ?></td>
    </tr>
    <tr>
      <td align="center">Contact</td>
      <td align="center"><?php echo $row['shop_contact']; ?></td>
    </tr>
    <tr>
      <td align="center">Address</td>
      <td align="center"><?php echo $row['shop_address']; ?></td>
    </tr>
    <tr>
      <td align="center">Status</td>
      <td align="center"><?php echo $row['shop_status']; ?></td>
    </tr>
    
    <tr>
      <td align="center">District</td>
      <td align="center"><?php echo $row['district_name']; ?></td>
    </tr>
    <tr>
      <td align="center">Place</td>
      <td align="center"><?php echo $row['place_name']; ?></td>
    </tr>
    <tr>
      <td align="center">Pincode</td>
      <td  align="center"><?php echo $row['place_pincode']; ?></td>
      </tr>
      <tr>
      <td align="center">Password</td>
      <td align="center"><?php echo $row['shop_pass']; ?></td>
    </tr>
      <tr>
      <td colspan="2" align="right"><a href="EditProfile.php">Editprofile</a>
      <a href="ChangePassword.php">changepassword</a></td>
    </tr>
    </table>
    </center>
  <?php
}
?>
</form>
</body>
</html>