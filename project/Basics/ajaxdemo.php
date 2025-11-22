





<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("head.php");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
	
	.card{
	background-color: rgba(0,0,0,0.125);}
	.table-success{
		bs-table-bg: rgba(0,0,0,0.2);
	}
	a {
    color: #f65005;
    text-decoration: none;
}
	</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<center>
  <table width="200" border="1"  class="table table-success table-hover" style="width: 10%;">
    <tr>
	<div class="form-group row">
  <label for="sel_dis" class="col-sm-2 col-form-label">District</label>
  <div class="col-sm-4">
    <select class="form-control" name="sel_dis" id="sel_dis" onchange="getPlace(this.value)">
      <option value="">----select----</option>
      <?php
      $selplace = "select * from tbl_district";
      $resplace = $con->query($selplace);
      while($rowcat = $resplace->fetch_assoc()) {
      ?>
      <option value="<?php echo $rowcat["district_id"] ?>"><?php echo $rowcat["district_name"] ?></option>
      <?php
      }
      ?>
    </select>
  </div>
  <label for="sel_place" class="col-sm-2 col-form-label">Place</label>
  <div class="col-sm-4">
   <select class="form-control" name="sel_place" id="sel_place" onchange="getDist()">
      <option value="">----select----</option>
    </select>
  </div>
</div>
    </tr>
  </table>
   <table  align="center"cellspacing="60" id="result">
  <br><br>
  
        <tr>
		<div class="row">
        <?php
         $i = 0;
       $select="select *from tbl_distributor dt inner join tbl_place p on p.place_id=dt.place_id inner join tbl_district d on d.district_id=p.district_id where dist_status=1";
	  $res=$con->query($select);
	  
	
	  
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
		 
	?>


<div class="col-md-3 mb-2">
        <div class="card" style="width:18rem; height:100%; ">


  <img src="../Assets/Files/Distimg/<?php echo $row['dist_img'];?>" width="100" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Farmer :&nbsp; <?php echo $row['dist_name'];?></h5>
    <h6 class="card-text">Contact :&nbsp; <?php echo $row['dist_contact'];?></h6>
	<h6 class="card-text">Address :&nbsp;<?php echo $row['dist_address'];?></h6>
    <a href="ViewProducts.php?disid=<?php echo $row["dist_id"]?>" class="btn btn-primary">View Product</a>
	<a href="distreview.php?disid=<?php echo $row["dist_id"]?>" class="btn btn-primary">Review</a>

  </div>
</div>
	  </div>
	  <?php
	
	  }
	?>
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
			getDist();
		}
	});
}

function getDist()
{
	var did=document.getElementById("sel_dis").value;
	var pid=document.getElementById("sel_place").value;
	$.ajax({
		url:"../Assets/AjaxPages/AjaxDist.php?did="+did+"&pid="+pid,
		success: function(html){
			//alert(html);
			$("#result").html(html);
		}
	});
}
</script>
<?php 
ob_end_flush();
include("foot.php");
?>
</html>