<?php
include("../Assets/Connection/Connection.php");
/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

	 
	require '../Assets/phpMail/src/Exception.php';
	require '../Assets/phpMail/src/PHPMailer.php';
	require '../Assets/phpMail/src/SMTP.php'; */
	
if(isset($_POST["btnsub"]))
{
	
	$name=$_POST["txtname"];
	$district=$_POST["sel_district"];
	$place=$_POST["sel_place"];
	$email=$_POST["txtemail"];
	$gender=$_POST["btngender"];
	$address=$_POST["txtadd"];
	$pass=$_POST["txtpass"];
	$contact=$_POST["txtcontact"];
	
	$photo=$_FILES["file_img"]["name"];
	$temp1=$_FILES["file_img"]["tmp_name"];
  
	move_uploaded_file($temp1,"../Assets/Files/userphoto/".$photo);

	$proof=$_FILES["file_proof"]["name"];
	$temp2=$_FILES["file_proof"]["tmp_name"];
  
	move_uploaded_file($temp2,"../Assets/Files/userproof/".$proof);

	
	
	$insQry="insert into tbl_user(user_name,place_id,user_email,user_gender,user_address,user_contact,user_password,user_photo,user_proof)values('".$name."','".$place."','".$email."','".$gender."','".$address."','".$contact."','".$pass."','".$photo."','".$proof."')";
  $con->query($insQry);
	/*$mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'naturebites003@gmail.com'; // Your gmail
    $mail->Password = 'vtsciymqbwrwkjae'; // Your gmail app password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
	
  
    $mail->setFrom('naturebites003@gmail.com'); // Your gmail
  
    $mail->addAddress($_POST["txtemail"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Successfully Registered";
    $mail->Body = "Hello ".$_POST["txtname"].",You are successfully registered in our Adventuro travelling .From this time,your's issues are our own problem too.And also explore our products.Thank you.";
  if($mail->send())
  {
    ?>
   <script>
	window.location="NewUser.php";
    </script>
   <?php
  }
  else
  {
    echo "Failed";
  }
 */
}  
	
?>

<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" enctype="multipart/form-data">
<center>
  <table width="200" border="1">
    <tr>
      <td width="75">Name</td>
      <td width="109"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" pattern="^[A-Za-z -]+$" title= "enter in valid form" required/></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onChange="getPlace(this.value)">
        <option value="">---select---<option>
    <?php /*
	$selplace = "select * from tbl_district";
	$resplace = $con->query($selplace);
	while($rowcat=$resplace->fetch_assoc())
	{
		?>
		<option value="<?php echo $rowcat["district_id"]?>"><?php echo $rowcat["district_name"]?></option>
        <?php
  }*/
	?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place">
        <option value="">---select---<option>
     
      </select></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" titlt="enter the valid email form" required /></td>
    </tr> 
    <tr>
      <td>Password</td>
      <td><label for="txtpass"></label>
      <input type="text" name="txtpass" id="txtpass" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one number" required/></td>
    </tr>
    <tr>
          <td>Gender</td>
          <td><input type="radio" name="btngender" id="btngender" value="male" />
            <label for="btngender">male</label>
            <input type="radio" name="btngender" id="btngender" value="female" />
            <label for="btngender">female</label>
            <input type="radio" name="btngender" id="btngender" value="others" />
            <label for="btngender">others</label></td>
      </tr>
        <tr>
          <td>Address</td>
          <td><label for="txtadd"></label>
            <textarea name="txtadd" id="txtadd" cols="45" rows="5" pattern="[A-Za-z0-9\s.,-]+"  titlt="enter the valid form" required></textarea></td>
        </tr>
    <tr>
      <td>Conform password</td>
      <td><label for="txtcpass"></label>
      <input type="text" name="txtcpass" id="txtcpass" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one number" required/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact"  pattern="^\d{10}$" title="Please enter a 10-digit phone number" required /></td>
    </tr>
    <tr>
      <td height="26">Photo</td>
      <td><input type="file" name="file_img" id="file_img"></td>
    </tr>
     <tr>
      <td>Proof</td>
        <td><input type="file" name="file_proof" id="file_proof" /></td>
    </tr>
    <tr>
      <td height="32" colspan="2" align="center"><input type="submit" name="btnsub" id="btnsub" value="register" />
        <input type="reset" name="btncanc" id="btncanc" value="Cancel" /></td>
      </tr>
  </table>
  </center>
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#sel_place").html(html);
		}
	});
}
</script>
</html> -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <style>
         body {
    background: url('../Assets/Template/Main/img/23458.jpg') no-repeat center center fixed;
    background-size:cover;
    font-size:x-large;
    color:#000;
    
}

       
        .registration-container {
    box-shadow: 0 0 5px black, 0 0 15px black;
    border-radius: 30px;
    max-width: 700px;
    margin: 50px auto;
    padding: 20px;
    border: 10px solid #606c5f;
    /* You can add any additional styles or content-specific styles here */
}

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn-register {
            background-color: #007bff;
            color: #fff;
        }

        .btn-register:hover {
            background-color: #0056b3;
        }
        .btn-group{
          display: inline-flex;
        }
    </style>
</head>
<body>
<form id="form1" name="form1" method="post" enctype="multipart/form-data">
    <div class="container registration-container">
        <h2 class="text-center">User Registration</h2>
        <form>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="txtname" id="txtname" pattern="^[A-Za-z -]+$" title= "enter in valid form" required placeholder="Enter your username">
            </div>
            <div class="form-group">
        <label for="contact">Contact</label>
        <input type="text" class="form-control"name="txtcontact" id="txtcontact"  pattern="^\d{10}$" title="Please enter a 10-digit phone number" required  placeholder="Enter your contact">
      </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="txtemail" id="txtemail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" titlt="enter the valid email form" required placeholder="Enter your email">
            </div>

            <div class="form-group">
    <label for="gender">Gender</label>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-secondary">
            <input type="radio" name="btngender" id="male" value="male"> Male
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="btngender" id="female" value="female"> Female
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="btngender" id="other" value="other"> Other
        </label>
    </div>
</div>

       <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="txtadd" id="txtadd" pattern="[A-Za-z0-9\s.,-]+"  titlt="enter the valid form" required placeholder="Enter your address">
      </div>

      <div class="form-group">
        <label for="district">District</label>
        <select class="form-control" name="sel_district" id="sel_district"  onChange="getPlace(this.value)">
        <option value="">----select----</option>
         <?php
	$selplace = "select * from tbl_district";
	$resplace = $con->query($selplace);
	while($rowcat=$resplace->fetch_assoc())
	{
		?>
		<option value="<?php echo $rowcat["district_id"]?>"><?php echo $rowcat["district_name"]?></option>
        <?php
	}
        
	?>
   </select>
</div>
      
      <div class="form-group">
        <label for="place">Place</label>
        <select class="form-control" name="sel_place" id="sel_place">
        <option value="">----select----</option>
  </select>
      </div>
 
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="file_img" id="file_img"  >
      </div>
      <div class="form-group">
        <label for="proof">Proof</label>
        <input type="file" class="form-control" name="file_proof" id="file_proof" >
      </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control"name="txtpass" id="txtpass" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one number" required placeholder="Enter your password">
            </div>
            <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" class="form-control"name="txtcpass" id="txtcpass" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one number" required placeholder="Confirm your password">
      </div>
            <button type="submit" class="btn btn-register btn-block" name="btnsub" id= "btnsub">Register</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (Required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#sel_place").html(html);
		}
	});
}
</script>
</html>


