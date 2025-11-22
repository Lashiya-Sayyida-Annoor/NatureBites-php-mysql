<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
if(isset($_GET['mid']))
{
    $sel="select * from tbl_vegstock vs inner join tbl_vegetables v on vs.veg_id=v.veg_id where vs.vegstock_id=".$_GET['mid'];
    $res=$con->query($sel);
    $row=$res->fetch_assoc();
}
if(isset($_POST["btnsave"]))
{
$damage=$_POST["txtqua"];

    $update="update tbl_vegstock set damage_veg='".$damage."'  where vegstock_id=".$_GET['mid'];
    $con->query($update);   
}
?>
<html>
<body>
<center>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" class="table table-bordered  table-dark table-hover" style="width: 40%;">
        
        <br><br>
      <tr> <td>vegetable</td>
           <td ><?php echo $row['veg_name'];?></td>
      </tr>
<tr> <td> batch</td>
<td><?php echo $row['batch_id'];?></td>
</tr>
<tr> <td>damaged quantity</td>
<td><input type="txt" name="txtqua" required="required"></td>
</tr>
<tr>
    <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Submit" class="btn btn-primary btn-sm " /></td>

</table>
</center>
</body>
<?php
ob_end_flush();
include('foot.php');
?>
</html>