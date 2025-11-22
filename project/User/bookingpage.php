<?php 
ob_start();
include("Head.php");

include("../Assets/Connection/Connection.php");

/*$sel1="select * from tbl_booking where user_id='" . $_SESSION["uid"] . "' and cart_status=3";
$resl=$con->query($sel1);
	while($row=$resl->fetch_assoc())
    {
        if()
    }*/
   
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<style>
    
    
        .hidden {
            display: none;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        #tab {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
   
        .card{
            background-color:#90EE90;
        }
        
        
     
        .a1 {
           
            padding: 100px;
         margin: 100px;
         box-sizing: border-box;
          }
          .m{align:center;}
          h6{
            color: #FF0000
          }

</style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body onload="GetBooking('All')">

<div  align="center">
   

        <div class="m" id="tab">
        <button class="btn btn-warning" onclick="GetBooking('All')">View All Orders</button>
<button class="btn btn-warning" onclick="GetBooking('Placed')" style="width: 130px;">Placed Orders</button>
<button class="btn btn-warning" onclick="GetBooking('Packed')" style="width: 180px;">Packed Products</button>
<button class="btn btn-warning" onclick="GetBooking('Shipped')">Shipped Orders</button>
<button class="btn btn-warning" onclick="GetBooking('Delivered')">Delivered Orders</button>
       
</div>

    <div id="showBooking"></div>     

</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function GetBooking(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxGetBooking.php?pid="+did,
		success: function(html){
			$("#showBooking").html(html);
		}
	});
}
</script>

<?php
include("Foot.php");
ob_flush();
?>
</html>
    