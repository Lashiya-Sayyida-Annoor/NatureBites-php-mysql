<?php
ob_start();
include("head.php");

  include("../Assets/Connection/Connection.php");
  
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Profile</title>
    <!-- Include Bootstrap CSS -->
    
    <!-- Include your custom CSS -->
    <link rel="stylesheet" href="styles.css">
<style>
  /* Apply custom styles */
body {
    background-color: #f8f9fa;
    padding: 20px;
}

#form1 {
    margin: 20px;
}

table {
    width: 80%;
    margin: 0 auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table td {
    padding: 10px;
}

table tr:nth-child(odd) {
    background-color: #f2f2f2;
}

table tr:last-child td {
    text-align: right;
}

a {
    color: #007BFF;
    text-decoration: none;
    margin-right: 10px;
}
.table-bordered {
    border: 55px solid #dee2e6;
}

  </style>

<form id="form1" name="form1" method="post" action="">
    <?php
    $userid = $_SESSION['uid'];
    $seleqry = "select *from tbl_user u inner join tbl_place c on u.place_id=c.place_id inner join tbl_district d on c.district_id=d.district_id where user_id='" . $userid . "'";
    $res = $con->query($seleqry);
    while ($row = $res->fetch_assoc()) {
    ?>
    <div class="container">
            <div class="row">


                  
      
                <div class="col-md-8 offset-md-2">
                    <table class="table table-bordered">
                          <!-- Include the profile photo here -->
           <tr><td colspan="2" align="center"><img  src="../Assets/Files/userphoto/<?php echo $row['user_photo'];?>"   width="200px" height="200px" alt="Profile image" class="img-fluid rounded-circle"></td>
                        <tr>
                            <td>Name</td>
                            <td><?php echo $row['user_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $row['user_email']; ?></td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td><?php echo $row['user_contact']; ?></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><?php echo $row['user_gender']; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $row['user_address']; ?></td>
                        </tr>
                        <tr>
                            <td>District</td>
                            <td><?php echo $row['district_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Place</td>
                            <td><?php echo $row['place_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Pincode</td>
                            <td><?php echo $row['place_pincode']; ?></td>
                        </tr>
                        <!-- Add more rows as needed -->
                        <tr>
                            <td colspan="2" class="text-right">
                                <a href="EditProfile.php" class="btn btn-info">Edit Profile</a>
                                <a href="ChangePassword.php" class="btn btn-info">Change Password</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</form>
</body>
<?php
ob_end_flush();
include("foot.php");
?>
</html>





















