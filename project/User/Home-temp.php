
<?php

include("../Assets/Connection/Connection.php");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>homepage</title>


</head>


<body>
	
<h2>Welcome </h2>
<h2><?php echo $_SESSION['uname'] ?></h2>

<a href="Profile.php">My Profile</a><br>
<a href="searchdistributor.php">Search Farmer</a><br>
<a href="MyVegCart.php">Vegetable Cart</a><br>
<a href="usercomplaint.php">complaints</a><br>



<br><br><br>



<form id="form1" name="form1" method="post" action="">
<center>

  <table width="200" border="1">
  <tr>
       </select><td>category</td>
       <td><label for="sel_cate"></label>
       <select name="sel_cate" id="sel_cate"  onchange="getCate(this.value)">
       <option value="">----select----</option>
    <?php
	$selDis = "select * from tbl_vegcategory";
	$resDis = $con->query($selDis);
	while($rowDis=$resDis->fetch_assoc())
	{
		?>
		<option value="<?php echo $rowDis["vegcat_id"]?>"><?php echo $rowDis["vegcat_name"]?></option>
        <?php
	}
	?>
    </select>
    </td>
    </tr>
    <table  align="center"cellspacing="60" id="result">
     <br><br>
      <tr>
       <?php	  
	   $select="select *from tbl_vegetables dt inner join tbl_vegcategory p on p.vegcat_id=dt.vegcat_id ";
	  $res=$con->query($select);
	  $i=0;
	
	  
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
		 
	?>
     
   
      <td >
	 
     <p>
     <img src="../Assets/Files/Distimg/<?php echo $row['veg_img'];?>" width="100"/><br>
     Vegetables <?php echo $row['veg_name'];?><br>
     Rate <?php echo $row['veg_rate'];?><br>
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
    
    </center>
   </form> 
    
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


<script src="../Assets/JQ/jQuery.js"></script>
<script>

function getCate(did)
{
	
	
	$.ajax({
		url:"../Assets/AjaxPages/Ajaxcate.php?did="+did,
		success: function(html){
			//alert(html);
			$("#result").html(html);
		}
	});
}

</script>
</html>






