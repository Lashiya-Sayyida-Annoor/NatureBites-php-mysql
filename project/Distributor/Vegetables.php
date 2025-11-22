<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
 if(isset($_POST['btnsub']))
 {
    $name=$_POST['txtname'];
	$rate=$_POST['txtrate'];
  $amount=$_POST['txtamount'];
	$category=$_POST['sele_veg'];
	
	
	$img=$_FILES["file_img"]["name"];
	$temp1=$_FILES["file_img"]["tmp_name"];
  $size=$_FILES["file_img"]["size"];
	move_uploaded_file($temp1,"../Assets/Files/Distimg/".$img);
	
	$insQry="insert into tbl_vegetables(veg_name,veg_rate,veg_img,vegcat_id,dist_id,veg_amount)values('".$name."','".$rate."','".$img."','".$category."','".$_SESSION['distid']."','".$amount."')";
	/*if($size>=1000 && $size<=200000)
  {*/
    $con->query($insQry);
   // }
    //else
   // {?>
   <!-- <script>
      alert("file size doesn't match ")
      </script> -->
      <?php }

	
	if(isset($_GET['did']))
	{
		$delqry="delete from tbl_vegetables where veg_id=".$_GET['did'];
		$con->query($delqry);
	}
	   
 
?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
 .table{
  background-color:#f95f538c;
 }
  
  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <center>
  <div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="your_action_url_here" method="post">
        <div class="table-responsive p-4" style="border-radius: 50px; box-shadow: 0 0 10px rgb(129 11 11 / 68%);  ">
          <table class="table table-bordered" style="width: 100%;">
            <tr>
              <td>Vegetable Name:</td>
              <td>
                <label for="txtname"></label>
                <input type="text" name="txtname" id="txtname" class="form-control" pattern="^[A-Za-z -]+$" title="Enter in a valid form" required />
              </td>
            </tr>
            <tr>
              <td>Vegetable Category:</td>
              <td>
                <label for="sele_veg"></label>
                <select name="sele_veg" id="sele_veg" class="form-control">
                  <option value="">----select----</option>
                  <?php
                    $selcat = "select * from tbl_vegcategory";
                    $rescat = $con->query($selcat);
                    while ($rowcat = $rescat->fetch_assoc()) {
                      echo '<option value="' . $rowcat["vegcat_id"] . '">' . $rowcat["vegcat_name"] . '</option>';
                    }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Vegetable Rate:</td>
              <td>
                <label for="txtrate"></label>
                <input type="text" name="txtrate" id="txtrate" class="form-control" required="required" />
              </td>
            </tr>
            <tr>
              <td>Vegetable Amount:</td>
              <td>
                <label for="txtamount"></label>
                <input type="text" name="txtamount" id="txtamount" class="form-control" required="required" />
              </td>
            </tr>
            <tr>
              <td>Vegetable Image:</td>
              <td>
                <label for="file_img"></label>
                <input type="file" name="file_img" id="file_img" class="form-control" />
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input type="submit" name="btnsub" id="btnsub" value="Submit" class="btn btn-primary btn-sm">
                <input type="reset" name="btncanc" id="btncanc" value="Cancel" class="btn btn-danger btn-sm" />
              </td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>



  <<div class="container mt-4">
  <table class="table table-bordered table table-hover" style="width: 100%; background-color:grey;">
    <thead>
      <tr>
        <th>SI.NO</th>
        <th>Vegetable name</th>
        <th>Vegetable category</th>
        <th>Vegetable rate</th>
        <th>Vegetable image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $select = "select * from tbl_vegetables v inner join tbl_vegcategory vg on vg.vegcat_id=v.vegcat_id";
        $res = $con->query($select);
        $i = 0;
        while ($row = $res->fetch_assoc()) {
          $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['veg_name']; ?></td>
        <td><?php echo $row['vegcat_name']; ?></td>
        <td><?php echo $row['veg_rate']; ?></td>
        <td><img src="../Assets/Files/Distimg/<?php echo $row['veg_img']; ?>" width="100" /></td>
        <td>
          <a href="vegetablestock.php?pid=<?php echo $row['veg_id']; ?>" class="btn btn-primary btn-sm">Stock</a><br><br>
          <a href="Vegetables.php?did=<?php echo $row['veg_id']; ?>" class="btn btn-danger btn-sm">Delete</a><br><br>
          <a href="DamageStock.php?pid=<?php echo $row['veg_id']; ?>" class="btn btn-danger btn-sm">Damage Stock</a>
        </td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
      </center>
</form>
</body>
<?php
ob_end_flush();
include('foot.php');
?>
</html>