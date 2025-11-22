<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');


 $stock=0;
if(isset($_POST["btnsave"]))
{   
    
 	    
		$newstock=$_POST["txtquan"];

		$expdate=$_POST["namedt"];
    $BatchId=0;
   
    $sel1="select * from tbl_vegstock where vegstock_id=(select max(vegstock_id) from tbl_vegstock)";
    $res1=$con->query($sel1);
    
    if($row1=$res1->fetch_assoc())
    {
      
      $BatchId=$row1['batch_id']+1;
    }
    else
    {
      $BatchId=100000;

    }

		$insert="insert into tbl_vegstock(vegstock_quant,veg_id,expiry_date,stocking_date,batch_id)values('".$newstock."','".$_GET["pid"]."','".$expdate."',now(),'".$BatchId."')";
		$con->query($insert);

   
}

if(isset($_GET['pid']))
{
$select="select * from tbl_vegetables v inner join tbl_vegstock vi where v.veg_id=".$_GET['pid'];
$res=$con->query($select);
$row=$res->fetch_assoc();
}

   
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <center>
  <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Vegetable Information</h5>
        </div>
        <div class="card-body">
          <table class="table table-dark table-hover" style="width: 100%;">
            <?php
            if (isset($_GET['pid'])) {
              $select = "select * from tbl_vegetables v inner join tbl_vegstock vi where v.veg_id=" . $_GET['pid'];
              $res = $con->query($select);
              $row = $res->fetch_assoc();
            }
            ?>
            <tr>
              <td align="center">Vegetable</td>
              <td align="center"><?php echo $row['veg_name']; ?></td>
            </tr>

            <tr>
              <td>New Stock</td>
              <td>
                <label for="txtquan"></label>
                <input type="text" name="txtquan" id="txtquan" required="required" class="form-control">
              </td>
            </tr>

            <tr>
              <td>Current Date</td>
              <?php
              date_default_timezone_set('Asia/Kolkata');
              $date = date('d-m-y');
              ?>
              <td><?php echo $date; ?></td>
            </tr>

            <tr>
              <td>Expiry Date</td>
              <td>
                <input type="date" name="namedt" required="required" class="form-control">
              </td>
            </tr>
          </table>
        </div>
        <div class="card-footer text-center">
          <button type="submit" name="btnsave" id="btnsave" class="btn btn-primary btn-sm">Submit</button>
          <button type="reset" name="btnsave2" id="btnsave2" class="btn btn-secondary btn-sm">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
</center>
</form>
</body>
<?php
ob_end_flush();
include('foot.php');
?>
</html>