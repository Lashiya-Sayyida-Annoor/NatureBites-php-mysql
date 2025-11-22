
<?php
include("../Assets/Connection/Connection.php");
session_start();
if (isset($_POST["btnlogin"])) {
    $email = $_POST["txtemail"];
    $pass = $_POST["txtpass"];

    $seluser = "select * from tbl_user where user_email='" . $email . "' and user_password='" . $pass . "'";
    $seladmin = "select * from tbl_admin where admin_email='" . $email . "' and admin_password='" . $pass . "'";
    $seldist = "select * from tbl_distributor where dist_email='" . $email . "' and dist_pass='" . $pass . "'";

    $resuser = $con->query($seluser);
    $resadmin = $con->query($seladmin);
    $resdist = $con->query($seldist);

    if ($resuser->num_rows > 0) {
        $row = $resuser->fetch_assoc();
        $_SESSION['uid'] = $row['user_id'];
        $_SESSION['uname'] = $row['user_name'];
        header("location:../user/homepage.php");
    } else if ($resadmin->num_rows > 0) {
        $row = $resadmin->fetch_assoc();
        $_SESSION['aid'] = $row['admin_id'];
        $_SESSION['aname'] = $row['admin_name'];
        header("location:../Admin/homepage.php");
    } else if ($resdist->num_rows > 0) {
        $row = $resdist->fetch_assoc();
        if ($row['dist_status'] == 1) {
            $_SESSION['distid'] = $row['dist_id'];
            $_SESSION['distname'] = $row['dist_name'];
            header("location:../Distributor/homepage.php");
        } else {
            // Distributor exists, but dist_status is not 1
			?>
			<script>
				alert("Distributor account exists, but it is not active.");
				</script>
            <?php
        }
    } else {  
        // Handle the case where no matching user, admin, or distributor was found
		?>
		<script>
				alert("User not found.");
				</script>
       <?php
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
    body {
       background-image: url("../Assets/Template/Main/img/wepik-export-20231028062337qFV0.jpeg");

     
        
        background-repeat:no-repeat;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content:center;
        align-items: center;
       background-size:50%;
	   
    }
        
     input[type="submit"] {
        
        width: 300px;
        height: 40px;
        background-color:transparent;
        border-radius: 10px;
        border-color: black;
        color:black;
        text-size-adjust: 50px;
        background: #6c757d;
    }

     input[type="text"] {
        border-color: #4a8949;
        border: solid 4.5 black;
 border-radius: 1rem;
 width:300px;
 
 padding: 1rem;
 font-size: 1rem;
 color: black;

    }
    .input-group {
 margin-top:50px;
}

.cont{width:500px;
height:300px;
box-shadow:0 0 5px black,0 0 15px black;
border-radius:30px;
position: absolute;
   top: 90px; 
  bottom: 100px;
  right: 100px;
  background: #495057;
}
form
{ padding-top:10px;
padding-bottom:100px;}






</style>

</head>

<body>

<form id="form1" name="form1" method="post" action="">
    <div class="cont" align="center">
    <div class="input-group">
       
                <input type="text" name="txtemail" id="txtemail"class="input" required placeholder="EMAIL" required/>
           <br><br>
                
                <input type="text" name = "txtpass" id="txtpass"class="input"required placeholder="PASSWORD"  required/><br><br><br>
            
            <input type="submit" name="btnlogin" id="btnlogin" value="Login" /><br><br>
            <a href="../index.php">SignUp</a>
      
</div>
    </div>
</form>
</div>
</body>

</html>







