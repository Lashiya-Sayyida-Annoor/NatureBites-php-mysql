<?php
include("../Assets/Connection/Connection.php");


?>




<html>
<body>

<form id="form1" name="form1" method="post" action="">
<center>
  <table width="200" border="1">
    <tr>
      </select><td>District</td>
      <td><label for="sel_dis"></label>
        <select name="sel_dis" id="sel_dis" onChange="getPlace(this.value)">
        <option value="">----select----</option>
         <?php
	$selplace = "select * from tbl_district";
	$resplace = $con->query($selplace);
	while($rowcat=$resplace->fetch_assoc())
	{
		?>
		<option value="<?php echo $rowcat["district_id"]?>"><?php echo $rowcat["district_name"]?></option>
        <?php
	}
	?>
   
    </select></td> &nbsp;&nbsp;
    <td width="46">Place </td>
    <td width="19"><label for="sel_place"></label>
      <select name="sel_place" id="sel_place" onChange="getDist()">
        <option value="">----select----</option>
      </select></td>
    </tr>
  </table>
  
  
   <table  align="center"cellspacing="60" id="result">
  <br><br>
  
        <tr>
       <?php 
	
	  $select="select *from tbl_shop dt inner join tbl_place p on p.place_id=dt.place_id inner join tbl_district d on d.district_id=p.district_id where shop_status=1";
	  $res=$con->query($select);
	  $i=0;
	
	  
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
        <a href="Searchtool.php?sid=<?php echo $row["shop_id"]?>">View Products</a>
     
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
    
    
    
    
  </center>
</form>
</body>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#sel_place").html(html);
			getDist();
		}
	});
}

function getDist()
{
	var did=document.getElementById("sel_dis").value;
	var pid=document.getElementById("sel_place").value;
	$.ajax({
		url:"../Assets/AjaxPages/AjaxShop.php?did="+did+"&pid="+pid,
		success: function(html){
			//alert(html);
			$("#result").html(html);
		}
	});
}
</script>
</html>