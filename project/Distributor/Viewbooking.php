<?php
include("../Assets/Connection/Connection.php");

ob_start();
include('head.php');


if (isset($_GET['pid']))
{ $up="update tbl_booking set booking_status=2 where booking_id='".$_GET["pid"]."'";
 $con->query($up);}  


 if (isset($_GET['cid']))
 { $up="update tbl_booking set booking_status=3 where booking_id='".$_GET["cid"]."'";
  $con->query($up);} 


  if (isset($_GET['rid']))
     { $up="update tbl_booking set booking_status=4 where booking_id='".$_GET["rid"]."'";
      $con->query($up);} 

  ?>

<html>
  <head>  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head>
<body>

<center>
<a href="MyRating.php?qid=<?php echo $row["dist_id"]; ?> " class="btn btn-primary">My Ratings and Reviews</a>
</center>


<form id="form1" name="form1" method="post" action="">
<h2>Placed Orders<h2>
  <table width="200" border="1"  class="table  table-bordered table table-hover" style="background-color:grey;">
    <tr>
      <td>SI.NO</td>
      <td>Costumer</td>
      <td>Address</td>
      <td>Status</td>
     </tr>
    <?php
	$i=0;
	$sel="SELECT * FROM tbl_booking b  inner join tbl_user u on u.user_id=b.user_id inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id inner join tbl_distributor dis where b.booking_status='1' and  dis.dist_id=".$_SESSION['distid'];
	// $sel="select * from tbl_distributor d inner join tbl_place p on p.place where dis_id=".$_SESSION['bid'];
    $res=$con->query($sel);
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
           <td> <a href ="viewbooking.php?pid=<?php echo $row ['booking_id']?>" class="btn btn-primary btn-sm">Packed </a>
            <a href ="BookingViewMore.php?bid=<?php echo $row ['booking_id']?>" class="btn btn-primary btn-sm">View More</a>
      </td>
      </tr>
    <?php
	} 
	?>
    
  </table>
  <h2>Packed Products<h2>
    <table border="2"   class="table  table-bordered table table-hover" style="background-color:grey;"  >
 
  <tr>
  <td>SI.NO</td>
      <td>Costumer</td>
      <td>Address</td>
      <td>Status</td>
     
    </tr>
    <?php
	$i=0;
	$sel="SELECT * FROM tbl_booking b inner join  tbl_user u on u.user_id=b.user_id inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id inner join tbl_distributor dis where  b.booking_status='2' and dis.dist_id=".$_SESSION['distid'];
	// $sel="select * from tbl_distributor d inner join tbl_place p on p.place where dis_id=".$_SESSION['bid'];
    $res=$con->query($sel);
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
       <td> <a href ="viewbooking.php?cid=<?php echo $row ['booking_id']?>" class="btn btn-primary btn-sm">Ship Product </a>
       <a href ="BookingViewMore.php?bid=<?php echo $row ['booking_id']?>" class="btn btn-primary btn-sm">View More</a>
        </td>
      </tr>
    <?php
	} 
	?>
    </table>



  <h2>Shipped Products<h2>
    <table border="2"   class="table  table-bordered table table-hover" style="background-color:grey;">
 
  <tr>
     <td>SI.NO</td>
      <td>Costumer</td>
      <td>Address</td>
      <td>Status</td>
     
    </tr>
    <?php
	$i=0;
	$sel="SELECT * FROM tbl_booking b  inner join tbl_user u on u.user_id=b.user_id inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id inner join tbl_distributor dis where b.booking_status='3'  and dis.dist_id=".$_SESSION['distid'];
	// $sel="select * from tbl_distributor d inner join tbl_place p on p.place where dis_id=".$_SESSION['bid'];
    $res=$con->query($sel);
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
         <td> <a href ="viewbooking.php?rid=<?php echo $row ['booking_id'];?>" class="btn btn-primary btn-sm">Deliver </a>
         <a href ="BookingViewMore.php?bid=<?php echo $row ['booking_id']?>" class="btn btn-primary btn-sm">View More</a>
           </td>
          </tr>
    <?php
	} 
	?>
    </table>


    <h2>Delivered Products<h2>
    <table border="2"  class="table  table-bordered table table-hover" style="background-color:grey; , width:80%;">
 
  <tr>
      <td>SI.NO</td>
      <td>Costumer</td>
      <td>Address</td>
      
      
     
     
    </tr>
    <?php
	$i=0;  
	$sel="SELECT * FROM tbl_booking b inner join  tbl_user u on u.user_id=b.user_id inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id inner join tbl_distributor dis where b.booking_status='4' and dis.dist_id=".$_SESSION['distid'];
	// $sel="select * from tbl_distributor d inner join tbl_place p on p.place where dis_id=".$_SESSION['bid'];
    $res=$con->query($sel);
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
            
            <td>
            <a href ="BookingViewMore.php?bid=<?php echo $row ['booking_id']?>" class="btn btn-primary btn-sm">View More</a>
  </td>
  </tr>
    <?php
	} 
	?>
    </table>

</form>
<br>

</body>
<?php
ob_end_flush();
include('foot.php');
?>
</html>
