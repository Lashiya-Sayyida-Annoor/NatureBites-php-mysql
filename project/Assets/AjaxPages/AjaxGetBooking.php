<?php
session_start();
include("../Connection/Connection.php");

$selQry = "select * from tbl_booking b inner join tbl_cart c on c.booking_id = b.booking_id inner join  tbl_vegetables p on p.veg_id = c.veg_id inner join tbl_distributor k on k.dist_id=p.dist_id where user_id='" . $_SESSION["uid"] . "'";

if($_GET['pid']=='All')
{
   $selQry=$selQry."and booking_status>0 and cart_status>0";
}
if($_GET['pid']=='Placed')
{
   $selQry=$selQry."and booking_status=1 and cart_status=1";
   
}
if($_GET['pid']=='Packed')
{
   $selQry=$selQry."and booking_status=2 and cart_status=1";
    

}if($_GET['pid']=='Shipped')
{
   $selQry=$selQry."and booking_status=3 and cart_status=1";
   

}
if($_GET['pid']=='Delivered')
{
   $selQry=$selQry."and booking_status=4 and cart_status=1";
  
}

$res = $con->query($selQry);

if ($res->num_rows == 0) {
    if ($_GET['pid'] == 'All') {
     echo "No orders to display for the selected filter."; 
   } elseif ($_GET['pid'] == 'Placed') {
       echo "No orders with 'Placed' status to display.";
    } elseif ($_GET['pid'] == 'Packed') {
        echo "No orders with 'Packed' status to display.";
    } elseif ($_GET['pid'] == 'Shipped') {
        echo "No orders with 'Shipped' status to display.";
    } elseif ($_GET['pid'] == 'Delivered') {
        echo "No orders with 'Delivered' status to display.";
    }
} else {
    ?>




<html>
    <head>
        <body>
        <div class="row">
        <?php
    $i = 0;
    while ($row = $res->fetch_assoc()) {
        $quantity = $row["cart_quantity"];
        $price = $row["veg_rate"];
        $totalamount = $quantity * $price;
        $i++;
        
        ?>


    <div class="col-md-3 mb-2">
        <div class="card" style="width:18rem; height:100%; ">
  <img src="../Assets/Files/Distimg/<?php echo $row["veg_img"]; ?>" width="47" height="200" class="card-img-top" alt="...">
  <div class="card-body">
  
  <h5 class="card-text"> Farmer :&nbsp; <?php echo $row["dist_name"]; ?></h5>
     <h5 class="card-text">Product :&nbsp;<?php echo $row["veg_name"]; ?></h5>
    <h5 class="card-text">quantity :&nbsp; <?php echo $row["cart_quantity"]; ?>kg <br>
           Totalamount :&nbsp; Rs<?php echo "$totalamount"; ?> <br>
           
    </h5>
    
                <?php 
               if ($row["booking_status"] == 1 && $row["cart_status"] == 1) {
                    ?>
                     <h6> Status : Order Placed </h6>
                    <?php 
                } else if ($row["booking_status"] == 2 && $row["cart_status"] == 1) {
                    ?>
                     <h6>Status : Product Packed</h6>
                    <?php 
                } else if ($row["booking_status"] == 3 && $row["cart_status"] == 1) {
                    ?>
                     <h6>Status : Product Shipped</h6>
                    <?php 
                } else if ($row["booking_status"] == 4 && $row["cart_status"] == 1) {
                    ?>
                    <h6>Status : Delivered</h6>
                   <br> 
                   <a href="ProductRating.php?pid=<?php echo $row["dist_id"]; ?> " class="btn btn-primary">Review</a>
                    <a href="Invoice.php?oid=<?php echo $row["booking_id"]; ?> " class="btn btn-primary">Bill</a>
  
               
                   
                    <?php 
                }
                ?>
                </div>
</div>
                </div>
           
            
                
          


     
        <?php
    }
}
    
    ?>
     </div>


