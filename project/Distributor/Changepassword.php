<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
  
  if(isset($_POST['btnsubmit']))
  {
	  $current=$_POST['txtcupass'];
	  $new=$_POST['txtnew'];
	  $conform=$_POST['txtcopass'];
	  $seleqry="select * from tbl_distributor where dist_id=".$_SESSION['distid'];
	  $res=$con->query($seleqry);
	$row=$res->fetch_assoc();
	  $oldPassword=$row['dist_pass'];
		
	   if($oldPassword==$current)
	   {
			  if($new==$conform)
			  {
			 		$upquery="update tbl_distributor set dist_pass='".$conform."' where dist_id=".$_SESSION['distid'];	
					if($con->query($upquery))
					{
						?>
                        <script>
						alert("updated");
                        </script>
                        <?php
					}
					else
					{
						?>
                        <script>
						alert("updated");
                        </script>
                        <?php
						
					}
			  }
			  else
			  {
				  ?>
                  <script>
						alert("not match");
                        </script>
                    <?php
			  }
	  }
	  else
	  {
		  ?>
		  <script>
						alert("Not Old password");
                        </script>
                        <?php 
	  }
	header("location:../Distributor/MyProfile.php");	
	  
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<title>Untitled Document</title>
	<head>
<style>
.custom-table {
            width: 50%;
            margin-bottom: 20px;
			background-color: #0000007a;
        }

        .custom-table td {
            text-align: center;
        }

  </style>
</head>

<body>
  <center>
<form id="form1" name="form1" method="post" action="">
  <div class="container">
        <form>
            <table class="table table-bordered custom-table">
                <tr>
                    <td width="131">Current password</td>
                    <td>
                        <label for="txtcupass"></label>
                        <input type="text" class="form-control" name="txtcupass" id="txtcupass" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one number" required/>
                    </td>
                </tr>
                <tr>
                    <td>New password</td>
                    <td>
                        <label for="txtnew"></label>
                        <input type="text" class="form-control" name="txtnew" id="txtnew" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one number" required/>
                    </td>
                </tr>
                <tr>
                    <td>Confirm password</td>
                    <td>
                        <label for="txtcopass"></label>
                        <input type="text" class="form-control" name="txtcopass" id="txtcopass" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one number" required />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="btn btn-primary" name="btnsubmit" id="btnsubmit" value="Submit" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
      </center>

</form>
</body>
<?php
ob_end_flush();
include('foot.php');
?>
</html>