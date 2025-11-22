<?php
include("../Connection/Connection.php");
?>
<table  align="center"cellspacing="60" id="result">
  <br><br>
  
        <tr>
       <?php 
	
	  $select="select *from tbl_shop dt inner join tbl_place p on p.place_id=dt.place_id inner join tbl_district d on d.district_id=p.district_id where shop_status=1";
	  
	  if($_GET["pid"]!="")
	  {
		  $select.=" and dt.place_id='".$_GET["pid"]."'";
	  }
	  if($_GET["did"]!="")
	  {
		  $select.=" and p.district_id='".$_GET["did"]."'";
	  }
	  $res=$con->query($select);
	  $i=0;
	//echo $select;
	  
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
		 
	?>
     
   
      <td >
	 
     <p>
     <img src="../Assets/Files/shoplogo/<?php echo $row['shop_logo'];?>" width="100"/><br />
     Distributor <?php echo $row['shop_name'];?><br />
     Contact <?php echo $row['shop_contact'];?><br />
       Address<?php echo $row['shop_address'];?><br />
	   <a href="Searchdisttool.php?sid=<?php echo $row["shop_id"]?>">View Products</a>
     
     </p>
     
   
    </td>
	
	<?php
	 if($i==4)
	 {
		 echo "</tr> <tr>";
		 $i=0;
	 }
	  }
	?>
    </table>