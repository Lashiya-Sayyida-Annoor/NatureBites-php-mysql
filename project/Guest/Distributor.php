<?php
include("../Assets/Connection/Connection.php");

    if(isset($_POST["btnsub"]))
{
	
	$name=$_POST["txtname"];
	$contact=$_POST["txtcontact"];
	$address=$_POST["txtadd"];
	$email=$_POST["txtemail"];
	$district=$_POST["sel_dis"];
	$place=$_POST["sel_place"];
	$pass=$_POST["txtpass"];
	
	$img=$_FILES["file_img"]["name"];
	$temp1=$_FILES["file_img"]["tmp_name"];
 
	move_uploaded_file($temp1,"../Assets/Files/Distimg/".$img);
	
	$proof=$_FILES["file_proof"]["name"];
	$temp2=$_FILES["file_proof"]["tmp_name"];
  
	move_uploaded_file($temp2,"../Assets/Files/Distproof/".$proof);

	
 $insQry="insert into tbl_distributor(dist_name,place_id,dist_email,dist_address,dist_contact,dist_pass,dist_img,dist_proof)values('".$name."','".$place."','".$email."','".$address."','".$contact."','".$pass."','".$img."','".$proof."')";
   $con->query($insQry);
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Additional Custom CSS */

    body {
    background: url('../Assets/Template/Main/img/organic-food-farm.jpg') no-repeat center center fixed;
    background-size:cover;
    font-size:x-large;
    color:#d39e00;;
    
}
   
  .registration-container {
    box-shadow: 0 0 5px black, 0 0 15px black;
    border-radius: 30px;
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
    border: 10px solid #606c5f;
    
    /* You can add any additional styles or content-specific styles here */
}

    .btn-register {
            background-color: #007bff;
            color: #fff;
        }
    
  </style>
</head>

<body>
<form id="form1" name="form1" method="post" enctype="multipart/form-data">
  <div class="container registration-container">
    <h2 class="text-center">Farmer Registration</h2>
    
      <div class="form-group">
        <label for="username">Name</label>
        <input type="text" class="form-control" name="txtname" id="txtname" placeholder="Enter your username" pattern="^[A-Za-z -]+$" title= "enter in valid form" required placeholder="Enter your name">
      </div>
      <div class="form-group">
        <label for="email">Contact</label>
        <input type="text" class="form-control" name="txtcontact" id="txtcontact" pattern="^\d{10}$" title="Please enter a 10-digit phone number" required  placeholder="Enter your contact">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="txtemail" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" titlt="enter the valid email form" required placeholder="Enter your email">
      </div>
      <div class="form-group">
        <label for="email">Address</label>
        <input type="text" class="form-control" name="txtadd" id="txtadd" pattern="[A-Za-z0-9\s.,-]+"  titlt="enter the valid form" required placeholder="Enter your address">
      </div>
      <div class="form-group">
        <label for="email"> Image</label>
        <input type="file" class="form-control" name="file_img" id="file_img"  >
      </div>
      <div class="form-group">
        <label for="email">Proof</label>
        <input type="file" class="form-control" name="file_proof" id="file_proof" >
      </div>

      <div class="form-group">
        <label for="district">District</label>
        <select class="form-control" name="sel_dis" id="sel_dis" onchange="getPlace(this.value)">
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
        <label for="password">Password</label>
        <input type="password" class="form-control" name="txtpass" id="txtpass" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one number" required placeholder="Enter your password">
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" class="form-control" name="txtcpass" id="txtcpass" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one number" required placeholder="Confirm your password">
      </div>
      <button type="submit" class="btn btn-register btn-block" id="btnsub" name="btnsub">Register</button>
        
  </div>
  <!-- Include Bootstrap JS and jQuery (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.1/dist/js/bootstrap.min.js"></script>
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
</html>


