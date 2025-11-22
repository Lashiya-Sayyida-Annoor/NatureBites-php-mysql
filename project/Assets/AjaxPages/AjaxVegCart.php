<?php
include("../Connection/Connection.php");
session_start();
$selqry="select * from tbl_booking where user_id='".$_SESSION["uid"]."' and booking_status='0'";


$bill=0;
$current = "Select * from tbl_booking where booking_id =(select max(booking_id) from tbl_booking)";
$res1 = $con->query($current);
   
$row1 = $res1->fetch_assoc();

if (empty($row1['bill_num'])) {
        $bill = date('Ym') * 1000;
    }
else {

       
 
        $p2 = substr($row1['bill_num'], 0, 6);

        if ($p2 == date('Ym')) {
			$bill=$row1['bill_num']+1;
         
        } else {
			 $bill=date('Ym')*1000;
          
			
        }
    }	


$result=$con->query($selqry);
if($result->num_rows>0)
{
	
	if($row=$result->fetch_assoc())
	{
		$bid = $row["booking_id"];
		
		
		
		$selqry="select * from tbl_cart where booking_id='".$bid."' and veg_id='".$_GET["id"]."'";
		//echo $selqry;
		$result=$con->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
		
		 $insQry1="insert into tbl_cart(veg_id,booking_id)values('".$_GET["id"]."','".$bid."')";
         if($con->query($insQry1))
          { 
             echo "Added to Cart";
                        }
                        else
                        {
	                       echo "Failed";
                        }
		}
		
	}
	
}
else
{
	

$insQry=" insert into tbl_booking(user_id,booking_date,bill_num)values('".$_SESSION["uid"]."',curdate(),'".$bill."')";
			if($con->query($insQry))
			{
				$selqry1="select MAX(booking_id) as id from tbl_booking where user_id=".$_SESSION["uid"];
                $result=$con->query($selqry1);
				if($row=$result->fetch_assoc())
				{
					$bid=$row["id"];
					
					
					$selqry="select * from tbl_cart where booking_id='".$bid."'and veg_id='".$_GET["id"]."'";
		$result=$con->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
					
					
	                   $insQry1="insert into tbl_cart(veg_id,booking_id)values('".$_GET["id"]."','".$bid."')";
                        if($con->query($insQry1))
                        { 
                          echo "Added to Cart";
                        }
                        else
                        {
	                       echo "Failed";
                        }
					  
		}

                }
			}
}
?>