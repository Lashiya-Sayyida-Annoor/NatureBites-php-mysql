<?php
 include("../Assets/connection/connection.php");
 ob_start();
include('head.php');

 if(isset($_POST['btnupdate']))
 {
	 $name=$_POST['txtname'];
	 $email=$_POST['txtemail'];
	 $contact=$_POST['txtcontact'];
	 $address=$_POST['txtaddress'];
	 $laqry="update tbl_distributor set dist_name='".$name."',dist_email='".$email."',dist_contact='".$contact."',dist_address='".$address."' where dist_id=".$_SESSION['distid'];
	 if($con->query($laqry))
	{
		echo "updated";
	}
	header("location:../Distributor/MyProfile.php");
	 
 }
 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Add custom CSS styles */
    .custom-table {
            width: 50%;
            margin-bottom: 20px;
            background-color: #49505780;
        }

        .custom-table td {
            text-align: center;
        }

    .form-group {
      margin-bottom: 15px;
    }
    tbody{border-width: thick;}
    
  </style>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<?php
$distid=$_SESSION['distid'];
$seleqry="select *from tbl_distributor u inner join tbl_place c on u.place_id=c.place_id inner join tbl_district d on c.district_id=d.district_id where dist_id='".$distid."'";
$res=$con->query($seleqry);

while($row=$res->fetch_assoc())
{
?>
<center>
<div class="container">
    <form method="POST">
    <table class="table table-bordered custom-table" >
        <tr>
          <td align="center"><strong>Name</strong></td>
          <td align="center">
            <div class="form-group">
              <input type="text" name="txtname" class="form-control" pattern="^[A-Za-z -]+$" title="Enter in a valid form" required value="<?php echo $row['dist_name']; ?>">
            </div>
          </td>
        </tr>
        <tr>
          <td align="center"><strong>Email</strong></td>
          <td align="center">
            <div class="form-group">
              <input type="email" name="txtemail" class="form-control" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" title="Enter a valid email format" required value="<?php echo $row['dist_email']; ?>">
            </div>
          </td>
        </tr>
        <tr>
          <td align="center"><strong>Contact</strong></td>
          <td align="center">
            <div class="form-group">
              <input type="tel" name="txtcontact" class="form-control" pattern="^\d{10}$" title="Please enter a 10-digit phone number" required value="<?php echo $row['dist_contact']; ?>">
            </div>
          </td>
        </tr>
        <tr>
          <td align="center"><strong>Address</strong></td>
          <td align="center">
            <div class="form-group">
              <input type="txt" name="txtaddress" class="form-control"  pattern="[A-Za-z0-9\s.,-]+" title="Enter in a valid form" required value="<?php echo $row['dist_address']; ?> ">
            </div>
          </td>
        </tr>
        <tr>
          <td align="center" colspan="2">
            <input type="submit" name="btnupdate" value="Update" class="btn btn-primary">
          </td>
        </tr>
      </table>
    </center>
<?php

}

?>
</form>
</body>
<?php
ob_end_flush();
include('foot.php');
?>
</html>