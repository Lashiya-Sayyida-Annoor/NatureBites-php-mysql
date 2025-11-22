<?php
session_start();
include("../Connection/Connection.php");
?>

<table  align="center"cellspacing="60" id="results">
  <br><br>
  
        <tr>
       <?php	  
	   $select="select *from tbl_tool dt inner join tbl_toolcategory p on p.toolcat_id=dt.toolcat_id where dt.toolcat_id='".$_GET["pid"]."' and dt.shop_id='".$_SESSION["sid"]."'";
	  $res=$con->query($select);
	  $i=0;
	
	  
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
		 
	?>
     
   
      <td >
	 
     <p>
     <img src="../Assets/Files/shoplogo/<?php echo $row['tool_img'];?>" width="100"/><br />
     Tools <?php echo $row['tool_name'];?><br />
     Rate <?php echo $row['tool_rate'];?><br />
	 <a href="Searchdisttool.php">Add cart</a><br>
   
     
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

