<?php
 include("../Assets/Connection/Connection.php");
 ob_start();
 include('head.php');
 	if(isset($_GET['did']))
	{
		$delqry1="delete from tbl_place where place_id=".$_GET['did'];
		if($con->query($delqry1))
		{
		   ?>
           <script>
		   alert('deleted')
		   </script>
           <?php
         }
         else
			   {
				   ?>
                   <script>
				   alert('failed')
				   </script>
                   <?php
			   }
	}


		
		if(isset($_POST["btnsub"]))
		{
			
			$placename=$_POST["txtname"];
			$placepincode=$_POST["txtpin"];
			$district=$_POST["sel_district"];
      if(($placename==0)||($placepincode==0)||($district==0))
  { echo "Fill required fields";}
  else{
			$insQry="insert into tbl_place(place_name,place_pincode,district_id)values('".$placename."','".$placepincode."','".$district."')";
			$con->query($insQry);
			
			
		}
  }
		?>
        
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


</head>

<body>
<form id="form1" name="form1" method="post" action="">
<center>
<table width="200" border="1" align="center" class="table  table-dark table-hover" style="width: 30%;">
	<tr>
    
    <td>District :<select name="sel_district">
    <option value="">----select----</option>
    <?php
	$selDis = "select * from tbl_district";
	$resDis = $con->query($selDis);
	while($rowDis=$resDis->fetch_assoc())
	{
		?>
		<option value="<?php echo $rowDis["district_id"]?>"><?php echo $rowDis["district_name"]?></option>
        <?php
	}
	?>
    </select>
    </td>
    </tr>
  <tr>

    <td><label for="txtname"></label>
    Placename :<input type="text" name="txtname" id="txtname" required="required" pattern="[a-zA-Z]+"  title="Enter letters only" placeholder="Enter place name" /></td>
  </tr>
  <tr>
 <td><label for="txtpin"></label>
    Pincode :<input type="text" name="txtpin" id="txtpin" required="required" pattern="^\d{6}$" title="Enter 6 digit pincode,no space allowed" placeholder="******" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btnsub" id="btnsub" class="btn btn-primary btn-sm" value="Submit" />
      <input type="reset" name="btncanc" id="btncanc" value="cancel" class="btn btn-secondary  btn-sm"/></td>
  </tr>
  
</table>

<br /><br /><br />
<table width="200" border="1" align="center"  class="table table-bordered table-dark table-hover" style="width: 40%;">
  <tr>
    <td>SI.no</td>
    <td>Placename</td>
    <td>Pincode</td>
    <td>district name</td>
    <td>Action</td>
  </tr>
  <?php
   $selQry="select *from tbl_place fc inner join tbl_district c on fc.district_id=c.district_id";
	  $res=$con->query($selQry);
	  $i=0;
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
	?>
    
    <tr>
      <td height="65"><?php echo $i?></td>
      <td><?php echo $row['place_name'];?></td>
      <td><?php echo $row['place_pincode'];?></td>
      <td><?php echo $row['district_name'];?></td>
      
       <td><a href="place.php?did=<?php echo $row['place_id']?>" class="btn btn-danger btn-sm">Delete</a>
      
    </tr>
	<?php
	  }
	  ?>
</table>
  </form>

</center>
</body>
<?php
ob_end_flush();
include('foot.php');
?>
</html>