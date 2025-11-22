<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
if(isset($_GET['pid']))
{
    $sel="select * from tbl_vegetables where veg_id=".$_GET['pid'];
    $res=$con->query($sel);
    $row=$res->fetch_assoc();
    ?>
    <html>
        <body>
            
            
   <center>
      
        <table width="200" border="1"class="table table-bordered  table-dark table-hover" style="width: 40%;">
        <br><br>
      <tr>
        <td  colspan="2 "align="right" >Vegetable : </td>
        <td colspan="2 " ><?php echo  $row['veg_name'];?></td>

</tr>
<tr>
        <td>SI.NO</td>
        <td>batch id</td>
        <td>vegetable quantity</td>
        <td>Action</td>
      </tr>
      <?php

$i=0;
$sele1="select * from tbl_vegstock where veg_id=".$_GET['pid'];
$res1=$con->query($sele1);
while($row1=$res1->fetch_assoc())
{
    $i++;
    ?>
    <tr>
    <td height="65"><?php echo $i?></td>
      <td><?php echo $row1['batch_id'];?></td>
      <td><?php echo $row1['vegstock_quant'];?></td>
      <td><a href="Damagedeta.php?mid=<?php echo $row1['vegstock_id']?>" class="btn btn-primary " >damaged </a></td>

   </tr>
   <?php }

  }
  ?>
  </table>
  </center>
  </body>
  <?php
ob_end_flush();
include('foot.php');
?>
  </html>



































