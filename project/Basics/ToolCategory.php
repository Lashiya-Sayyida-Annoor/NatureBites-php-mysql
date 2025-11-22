<?php
$toolcategory_name="";
$toolcategoryid=0;
include("../Assets/Connection/Connection.php");
if(isset($_GET['did']))
	{
		$delqry="delete from tbl_toolcategory where toolcat_id=".$_GET['did'];
		if($con->query($delqry))
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
	$message="";
	if(isset($_POST["btnsave"]))
		{
			
			
			$toolcategoryname=$_POST["txtdname"];
			$toolcategory_id=$_POST["txtid"];
			if($toolcategory_id==0)
	        {
			
			$tasqry="insert into tbl_toolcategory(toolcat_name)values('".$toolcategoryname."')";
			if($con->query($tasqry))
			 {
				$messsage="Record Inserted...";
			  }
			else
			 {
				$messsage="Insertion Failed...";
			 }
	       }
		
		
			 
	
	     else
			   {
				$laqry="update tbl_toolcategory set toolcat_name='".$toolcategoryname."' where toolcat_id=".$toolcategory_id;
				if($con->query($laqry))
				{
					?>
                    <script>
					alert('updated')
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
		}
		
	
		if(isset($_GET['eid']))
	{
		$SelQry="select * from tbl_toolcategory where toolcat_id=".$_GET['eid'];
		$resEdit=$con->query($SelQry);
		$rowEdit=$resEdit->fetch_assoc();
		$toolcategoryid=$rowEdit['toolcat_id'];
		$toolcategory_name=$rowEdit['toolcat_name'];
	}
	if(isset($_GET['did']))
	{
		$delqry="delete from tbl_toolcategory where toolcat_id=".$_GET['did'];
		if($con->query($delqry))
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
	?>
















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<input type="hidden" name="txtid" value="<?php echo $toolcategoryid?> ">
<center>
  <table width="301" height="126" border="1">
    <tr>
      <td>Tool Category Name</td>
      <td><label for="txtdname"></label>
      <input type="text" name="txtdname" id="txtdname" required="required" pattern="[a-zA-Z]+"  title="Enter the category correctly" value="<?php echo $toolcategory_name?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
      <label for="btncancel"></label></td>
    </tr>
    </form>
    
  <table width="200" border="1">
  <br><br>
      <tr>
        <td>SI.NO</td>
        <td>ToolCategoryname</td>
        <td>Action</td>
      </tr>
       <?php 
	
	  $select="select *from tbl_toolcategory";
	  $res=$con->query($select);
	  $i=0;
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
	?>
    
    <tr>
      <td height="65"><?php echo $i?></td>
      <td><?php echo $row['toolcat_name'];?></td>
      <td><a href="ToolCategory.php?did=<?php echo $row['toolcat_id']?>">Delete</a>
      <a href="ToolCategory.php?eid=<?php echo $row['toolcat_id'] ?>">Edit</a></td>
    </tr>
	<?php
	  }
	  ?>
      </center>
</table>
</body>
</html>