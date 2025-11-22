<?php
include("../Assets/Connection/Connection.php");


    if(isset($_POST["btnsub"]))
{
	
	$name=$_POST["txtname"];
	$contact=$_POST["txtcontact"];
	$address=$_POST["txtaddress"];
	$email=$_POST["txtemail"];
	$district=$_POST["sele_dist"];
	$place=$_POST["sele_place"];
	$pass=$_POST["txtpass"];
	$status=$_POST["txtstatus"];
	
	
	$logo=$_FILES["file_logo"]["name"];
	$temp1=$_FILES["file_logo"]["tmp_name"];
  $size=$_FILES["file_logo"]["size"];
	move_uploaded_file($temp1,"../Assets/Files/shoplogo/".$logo);
	
	$proof=$_FILES["file_proof"]["name"];
	$temp2=$_FILES["file_proof"]["tmp_name"];
  $size1=$_FILES["file_proof"]["size1"];
	move_uploaded_file($temp2,"../Assets/Files/shopproof/".$proof);


	
	$insQry="insert into tbl_shop(shop_name,place_id,shop_email,shop_address,shop_contact,shop_pass,shop_status,shop_logo,shop_proof)values('".$name."','".$place."','".$email."','".$address."','".$contact."','".$pass."','".$status."','".$logo."','".$proof."')"; 
  if(($size>=50000 && $size<=150000)&&($size1>=50000 && $size1<=150000))
  {
$con->query($insQry);
}
else
{?>
<script>
  alert("file size doesn't match ")
  </script>
  <?php }
  
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
    
<body>
<form id="form1" name="form1" method="post" action=""  enctype="multipart/form-data">
  <table width="200" border="1">
    <tr>
      <td width="84">Shop name</td>
      <td width="100"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" pattern="^[A-Za-z -]+$" title= "enter in valid form" required /></td>
    </tr>
    <tr>
      <td>Shop email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" titlt="enter the valid email form" required  /></td>
    </tr>
    <tr>
      <td>Shop contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" pattern="^\d{10}$" title="Please enter a 10-digit phone number" required /></td>
    </tr>
    <tr>
      <td>Shop address</td>
      <td><label for="txtaddress"></label>
        <label for="txtaddress"></label>
      <textarea name="txtaddress" id="txtaddress" cols="45" rows="5" pattern="[A-Za-z0-9\s.,-]+"  titlt="enter the valid form" required></textarea></td>
    </tr>
     <tr>
      <td>Shop password</td>
      <td><label for="txtpass"></label>
      <input type="password" name="txtpass" id="txtpass" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one number" required/></td>
    </tr>
    <tr>
      <td>Shop logo</td>
      <td><label for="file_logo"></label>
      <input type="file" name="file_logo" id="file_logo" /></td>
    </tr>
    <tr>
      <td>Shop proof</td>
      <td><label for="file_proof"></label>
      <input type="file" name="file_proof" id="file_proof" /></td>
    </tr>
    <tr>
    <td>District</td>
    <td><label for="txtdistrict"></label>
      <label for="sele_dist"></label>
       <select name="sele_dist" id="sele_dist" onchange="getPlace(this.value)">
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
  
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sele_place"></label>
        <select name="sele_place" id="sele_place">
         <option value="">----select----</option>
      </select></td>
    </tr>
    <tr>
     
    <td colspan="2" align="center"><input type="submit" name="btnsub" id="btnsub" value="Submit">
    <input type="reset" name="btnsub" id="btnsub" value="cancel" /><td>
    </tr>
  </table>
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#sele_place").html(html);
		}
	});
}
</script>
</html>























<!--
  <h2>Packed Products<h2>
    <table border="2"  class="table  table-bordered table-dark table-hover"  >
 
  <tr>
      <td>SI.NO</td>
      <td>Product</td>
      <td>Price</td>
      <td>User</td>
      <td>Address</td>
      <td>Status</td>
     
    </tr>
    <?php/*
	$i=0;
	$sel="SELECT * FROM tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_vegetables v on v.veg_id=c.veg_id inner join tbl_user u on u.user_id=b.user_id inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id inner join tbl_distributor dis where b.booking_status='1' and c.cart_status='2' and dis.dist_id=".$_SESSION['distid'];
	// $sel="select * from tbl_distributor d inner join tbl_place p on p.place where dis_id=".$_SESSION['bid'];
    $res=$con->query($sel);
	while($row=$res->fetch_assoc())
	{
		$i++;
	
	?>
    
	
    <tr>

      <td><?php echo $i; ?></td>
      <td>
        <p><?php echo $row["veg_name"]."<br>",
        "qnty:".$row['cart_quantity'];?> 
        </p>
      </td>
      <td><?php echo $row['veg_rate']* $row['cart_quantity']?></td>
      <td><?php echo $row["user_name"]; ?></td>
      <td>
        <p>
            <?php 
            echo $row["user_address"]."<br>" , 
              $row["place_name"]."<br>" ,
              $row["district_name"]."<br>"?>
             </p>
            </td>
            <td>
        
           <a href ="viewbooking.php?cid=<?php echo $row ['booking_id']?>" class="btn btn-primary btn-sm">Ship Product </a>
           
           
   </td>

			
     

    </tr>
    <?php
	} 
	?>
    </table>




    </table>
  <h2>Shipped Products<h2>
    <table border="2"  class="table  table-bordered table-dark table-hover">
 
  <tr>
      <td>SI.NO</td>
      <td>Product</td>
      <td>Price</td>
      <td>User</td>
      <td>Address</td>
      <td>Status</td>
     
    </tr>
    <?php
	$i=0;
	$sel="SELECT * FROM tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_vegetables v on v.veg_id=c.veg_id inner join tbl_user u on u.user_id=b.user_id inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id inner join tbl_distributor dis where b.booking_status='1' and c.cart_status='3' and dis.dist_id=".$_SESSION['distid'];
	// $sel="select * from tbl_distributor d inner join tbl_place p on p.place where dis_id=".$_SESSION['bid'];
    $res=$con->query($sel);
	while($row=$res->fetch_assoc())
	{
		$i++;
	
	?>
    
	
    <tr>

      <td><?php echo $i; ?></td>
      <td>
        <p><?php echo $row["veg_name"]."<br>",
        "qnty:".$row['cart_quantity'];?> 
        </p>
      </td>
      <td><?php echo $row['veg_rate']* $row['cart_quantity']?></td>
      <td><?php echo $row["user_name"]; ?></td>
      <td>
        <p>
            <?php 
            echo $row["user_address"]."<br>" , 
              $row["place_name"]."<br>" ,
              $row["district_name"]."<br>"?>
             </p>
            </td>
            <td>
        
           <a href ="viewbooking.php?rid=<?php echo $row ['booking_id']?>" class="btn btn-primary btn-sm">Deliver </a>
           
           
    </td>

			
     

    </tr>
    <?php
	} 
	?>
    </table>


    <h2>Delivered Products<h2>
    <table border="2" class="table table-bordered table-dark table-hover" style="width: 80%;" >
 
  <tr>
      <td>SI.NO</td>
      <td>Product</td>
      <td>Price</td>
      <td>User</td>
      <td>Address</td>
     
     
    </tr>
    <?php
	$i=0;  
	$sel="SELECT * FROM tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_vegetables v on v.veg_id=c.veg_id inner join tbl_user u on u.user_id=b.user_id inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id inner join tbl_distributor dis where b.booking_status='1' and c.cart_status='4' and dis.dist_id=".$_SESSION['distid'];
	// $sel="select * from tbl_distributor d inner join tbl_place p on p.place where dis_id=".$_SESSION['bid'];
    $res=$con->query($sel);
	while($row=$res->fetch_assoc())
	{
		$i++;
	
	?>
    
	
    <tr>

      <td><?php echo $i; ?></td>
      <td>
        <p><?php echo $row["veg_name"]."<br>",
        "qnty:".$row['cart_quantity'];?> 
        </p>
      </td>
      <td><?php echo $row['veg_rate']* $row['cart_quantity']?></td>
      <td><?php echo $row["user_name"]; ?></td>
      <td>
        <p>
            <?php 
            echo $row["user_address"]."<br>" , 
              $row["place_name"]."<br>" ,
              $row["district_name"]."<br>"?>
             </p>
            </td>
            
			
     

    </tr>
    <?php
	} */
	?>
    </table>-->

