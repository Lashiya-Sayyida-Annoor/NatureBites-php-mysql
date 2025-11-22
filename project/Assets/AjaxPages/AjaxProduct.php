<?php
session_start();
include("../Connection/Connection.php");
?>

<table  align="center"cellspacing="60" id="result">
  <br><br>
  
        <tr>
       <?php	  
	   $select="select *from tbl_vegetables dt inner join tbl_vegcategory p on p.vegcat_id=dt.vegcat_id where dt.vegcat_id='".$_GET["did"]."' and dt.dist_id='".$_SESSION["disid"]."'";
	  $res=$con->query($select);
	  $i=0;
	
	  
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
		 
	?>
     
   
      <td >
	 
     <p>
     <img src="../Assets/Files/Distimg/<?php echo $row['veg_img'];?>" width="100"/><br />
     Vegetables <?php echo $row['veg_name'];?><br />
     Rate <?php echo $row['veg_rate'];?><br />
   
     
     </p>
     
   
    </td>
	
	<?php
	 if($i==3)
	 {
		 echo "</tr> <tr>";
		 $i=0;
	 }
	  }
	?>
    </table>

















