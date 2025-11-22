<?php
$vegcategory_name="";
$vegcategoryid=0;
ob_start();
include('head.php');
include("../Assets/Connection/Connection.php");
if(isset($_GET['did']))
	{
		$delqry="delete from tbl_vegcategory where vegcat_id=".$_GET['did'];
		$con->query($delqry);
	}
	
	if(isset($_POST["btnsave"]))
		{
			
			
			$vegcategoryname=$_POST["txtdname"];
			$vegcategory_id=$_POST["txtid"];
			if($vegcategory_id==0)
	        {
			
			$tasqry="insert into tbl_vegcategory(vegcat_name)values('".$vegcategoryname."')";
			$con->query($tasqry);
			 
	       }
		
		
			 
	
	     else
			  { 
			$laqry="update tbl_vegcategory set vegcat_name='".$vegcategoryname."' where vegcat_id=".$vegcategory_id;
			$con->query($laqry);
			  }
				
		}
		
	
		if(isset($_GET['eid']))
	{
		$SelQry="select * from tbl_vegcategory where vegcat_id=".$_GET['eid'];
		$resEdit=$con->query($SelQry);
		$rowEdit=$resEdit->fetch_assoc();
		$vegcategoryid=$rowEdit['vegcat_id'];
		$vegcategory_name=$rowEdit['vegcat_name'];
	}
	if(isset($_GET['did']))
	{
		$delqry="delete from tbl_vegcategory where vegcat_id=".$_GET['did'];
		$con->query($delqry);
		
	}
			   
	?>










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
    
input[type="text"] {
       
        border-color: black;
        border: black;
 
 padding: 0.5rem;
 color: black;
}
    
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<input type="hidden" name="txtid" value="<?php echo $vegcategoryid?> ">
<center>
  <table width="301" height="126" border="1"  class="table  table-dark table-hover" style="width: 30%;">
    <tr>
      
      <td><label for="txtdname"></label>
      Category Name :<input type="text" name="txtdname" id="txtdname" required="required" pattern="[a-zA-Z]+"  title="Enter the category correctly" value="<?php echo $vegcategory_name?>" placeholder="category name"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Submit" class="btn btn-primary btn-sm"/>
      <input type="reset" name="btncancel" id="btncancel" value="Cancel"  class="btn btn-secondary btn-sm"/>
      <label for="btncancel"></label></td>
    </tr>
    </form>
    
  <table width="200" border="1" class="table table-bordered table-dark table-hover" style="width: 50%;">
  <br><br>
      <tr>
        <td>SI.NO</td>
        <td>VegCategoryname</td>
        <td>Action</td>
      </tr>
       <?php 
	
	  $select="select *from tbl_vegcategory";
	  $res=$con->query($select);
	  $i=0;
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
	?>
    
    <tr>
      <td height="65"><?php echo $i?></td>
      <td><?php echo $row['vegcat_name'];?></td>
      <td><a href="VegCategory.php?did=<?php echo $row['vegcat_id']?>" class="btn btn-danger btn-sm">Delete</a>
      <a href="VegCategory.php?eid=<?php echo $row['vegcat_id'] ?>" class="btn btn-info btn-sm">Edit</a></td>
    </tr>
	<?php
	  }
	  ?>
      </center>
</table>
</body>
<?php
ob_end_flush();
include('foot.php');
?>
</html>