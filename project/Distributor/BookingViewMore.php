<?php
include("../Assets/Connection/Connection.php");
session_start();


?>
<html>
    <head>
</head>
<body>

<form id="form1" name="form1" method="post" action="">
<h2>Placed Orders<h2>
  <table width="200" border="1"  class="table  table-bordered table table-hover" style="background-color:grey;">
    <tr>
      <td>SI.NO</td>
      <td>Costumer</td>
      <td>Address</td>
      <td>Product</td>
      <td>Quantity</td>
      <td>Total</td>
      <td>Status</td>
     </tr>
    <?php
	$i=0;
	$selQry = "select * from tbl_booking b inner join tbl_cart c on c.booking_id = b.booking_id 
  inner join  tbl_vegetables p on p.veg_id = c.veg_id
   inner join tbl_distributor k on k.dist_id=p.dist_id 
   inner join tbl_user ui on ui.user_id =b.user_id 
   inner join tbl_place o on o.place_id=ui.place_id 
   inner join tbl_district d on d.district_id=o.district_id where b.booking_id=".$_GET['bid'];
$res = $con->query($selQry);
while($row=$res->fetch_assoc())
	{
		$i++;
	
	?>
    <tr>
    <td><?php echo $i; ?></td>
      
      <td><?php echo $row["user_name"]; ?></td>
      <td>
        <p>
            <?php 
            echo $row["user_address"]."<br>" , 
              $row["place_name"]."<br>" ,
              $row["district_name"]."<br>"?>
             </p>
            </td>
            <td><?php echo $row["veg_name"]; ?></td>
            <td><?php echo $row["cart_quantity"]; ?></td>

            <td><?php echo $row["cart_quantity"]*$row["veg_rate"]; ?></td>

           <td> <a href ="viewbooking.php>" class="btn btn-primary btn-sm">Back</a>
      </td>
      </tr>
    <?php
	} 
	?>
    
  </table>


</body>
</html>