
<?php 
   include("../Assets/connection/connection.php");
   ob_start();
   include('head.php');
   $message="";
   
   if(isset($_POST["btnsub"]))
   {
	   
	   $adminname=$_POST["txtname"];
	   $admincontact=$_POST["txtcontact"];
       $adminemail=$_POST["txtemail"];
       $adminpassword=$_POST["txtpass"];

       $photo=$_FILES["file_img"]["name"];
	     $temp1=$_FILES["file_img"]["tmp_name"];
  
	    move_uploaded_file($temp1,"../Assets/Files/adminphoto/".$photo);
	   
	
	   
	   $insqry="insert into tbl_admin(admin_name,admin_contact,admin_email,admin_password,admin_img)values('".$adminname."',        '".$admincontact."','".$adminemail."','".$adminpassword."','".$photo."')";
	 
	   if($con->query($insqry))
	   { 
	      $message="Record Inserted";
	   }
	   else
	   {
		   $message="Inserted Failed";
	   }
   }
   
   
   ?>
	   
 <script>
     function validate()
	 {
		 var username=document.getElementById("txtname");
		 var email=document.getElementById("txtemail");
		 var password=document.getElementById("txtpass");
		 if(username.value==""||email.value==""||password.value=="")
		 {
			 alert('fill out all fields');
			 return false;
		 }
		 true;
	 }
	 
	 
	 function validateUsername() {
		 const usernameInput=document.getElementById("txtname");
		 const usernameError=document.getElementById("usernameError");
		 const firstcharacter=usernameInput.value.charAt(0);
		 const username=usernameInput.value.trim();
		 if (username.length <3) {

      usernameError.textContent = "Username must be at least 3 characters long."; 

		} else if (username.length >8) {

    usernameError.textContent = "Username cannot exceed 8 characters.";

      } else if (!/^[a-zA-Z0-9_-]+$/.test(username)) { 
	  usernameError.textContent = "Username can only contain letters, numbers, hyphens, and underscores. ";

     } else if(!/^[A-Za-z]+$/.test(firstCharacter)){ 
	 usernameError.textContent="Name start with letter only";

	 }else {

        usernameError.textContent = ""; // Clear error message
	 }
	 }




function validateEmail(){

const emailInput = document.getElementById("txtemail");

const emailError= document.getElementById("emailError");

const email = emailInput. value.trim();
const emailPattern = /^[a-zA-Z0-9_-]+[a-zA-Z0-9.-]+\. [a-zA-Z](2,4)$/;

if (!emailPattern.test(email)) {

emailError.textContent = "please enter a valid email address";

}else {

emailError.textContent="";
}
}


function validatePassword() {

var password=document.getElementById("txtpass").value;

if (password.length <8){

alert("Password must be least 8 characters long. "); 
return false;
}
if (!/[A-Z]/.test(password) || !/[a-z]/.test(password)) {

alert("Password must contain both uppercase and lowercase letters."); 
return false;
}

if(!/\d/.test(password)) {
	alert("Password must contain at least one number. ");
	return false;
}
if(!/[!@#$%^&*]/.test(password)){
	alert("Password must contain at least one special character: !@#$%^&*");
	return false;
}
return true;
}

function togglePasswordVisibility(){
	var passwordInput =document.getElementById("txtpass");

if (passwordInput.type === "password") { 
passwordInput.type = "text";

} else {

passwordInput.type = "password";
}
}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Registration</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" onsubmit="return validate()"  enctype="multipart/form-data">
<center>
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname"  onchange="validateUsername()"/>
      <p id="usernameError"></p></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" onchange="validateContact()"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" onblur="validateEmail()"/>
      <p id="emailError"></p></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpass"></label>
      <input type="password" name="txtpass" id="txtpass" onchange="validatePassword()"/></td>
    </tr>
    <tr>
      <td>image</td>
      <td><input type="file" name="file_img" id="file_img" /></td>
</tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsub" id="btnsub" value="Submit" />        <label for="btnsub">
        <input type="reset" name="btncan" id="btncan" value="cancel" />
      </label></td>
    </tr>
  
	
  </table>
  </center>
</form>
</body>
<?php
ob_flush();
include('foot.php');
?>
</html>