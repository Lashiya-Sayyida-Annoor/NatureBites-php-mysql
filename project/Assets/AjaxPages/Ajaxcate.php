<?php
include("../Connection/Connection.php");
?>
<html>
</body>
<table  align="center"cellspacing="60" id="result">
  <br><br>
  
        <tr>
       <?php	  
	   $select="select *from tbl_vegetables dt inner join tbl_vegcategory p on p.vegcat_id=dt.vegcat_id where dt.vegcat_id='".$_GET["did"]."'";
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
	<button name="btnaddcart" onClick="addCart(<?php echo $row['veg_id']?>)" >Add to cart</button>   
     
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

	<script src="../Assets/Template/Search/jquery.min.js"></script>
  <script>
   function addCart(id)
            {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxVegCart.php?id=" + id,
                    success: function(response) {
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }
</script>

	</body>
	</html>

















