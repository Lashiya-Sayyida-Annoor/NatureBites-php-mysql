<?php
 include("../Assets/connection/connection.php");
 ob_start();
include("Head.php");

 if(isset($_POST['btnupdate']))
 {
	 $name=$_POST['txtname'];
	 $email=$_POST['txtemail'];
	 $contact=$_POST['txtcontact'];
	 $address=$_POST['txtaddress'];
	 $gender=$_POST['txtgender'];
	 $laqry="update tbl_user set user_name='".$name."',user_email='".$email."',user_contact='".$contact."',user_address='".$address."',user_gender='".$gender."' where user_id=".$_SESSION['uid'];
	 if($con->query($laqry))
	{
		echo "updated";
	}
	header("location:../user/Profile.php");
	 
 }
 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.custom-table {
            width: 30%;
            margin-bottom: 20px;
            background-color:lightgrey;
        }

        .custom-table td {
            text-align: center;
        }

  </style>
<title> Edit profile</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<?php
$userid=$_SESSION['uid'];
$seleqry="select *from tbl_user u inner join tbl_place c on u.place_id=c.place_id inner join tbl_district d on c.district_id=d.district_id where user_id='".$userid."'";
$res=$con->query($seleqry);

while($row=$res->fetch_assoc())
{
?>
<center>
<form id="form1" name="form1" method="post" action="">
<div class="container">
        <form>
            <table class="table table-bordered custom-table">
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" class="form-control" name="txtname" pattern="^[A-Za-z -]+$" title="Enter in a valid form" required value="<?php echo $row['user_name']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" class="form-control" name="txtemail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4]" title="Enter a valid email format" required value="<?php echo $row['user_email']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>
                        <input type="text" class="form-control" name="txtcontact" pattern="^\d{10}$" title="Please enter a 10-digit phone number" required value="<?php echo $row['user_contact']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <input type="text" class="form-control" name="txtaddress" pattern="[A-Za-z0-9\s.,-]+" title="Enter a valid form" required value="<?php echo $row['user_address']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="text" class="form-control" name="txtgender" value="<?php echo $row['user_gender']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-info" name="btnupdate" value="Update" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    </center>
<?php

}

?>




</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>