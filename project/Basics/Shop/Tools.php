<?php
include("../Assets/Connection/Connection.php");
session_start();
 if(isset($_POST['btnsub']))
 {
    $name=$_POST['txtname'];
	$rate=$_POST['txtrate'];
	$category=$_POST['sele_cat'];
	
	
	$img=$_FILES["file_img"]["name"];
	$temp1=$_FILES["file_img"]["tmp_name"];
  $size=$_FILES["file_img"]["size"];
	move_uploaded_file($temp1,"../Assets/Files/shoplogo/".$img);
	
	$insQry="insert into tbl_tool(tool_name,tool_rate,tool_img,toolcat_id,shop_id)values('".$name."','".$rate."','".$img."','".$category."','".$_SESSION['sid']."')";
	if($size>=50000 && $size<=150000)
  {
    $con->query($insQry);
    }
    else
    {?>
    <script>
      alert("file size doesn't match ")
      </script>
      <?php }
	   
 }
 if(isset($_GET['did']))
	{
		$delqry="delete from tbl_tool where tool_id=".$_GET['did'];
		$con->query($delqry);
	}
	
?>













<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="200" border="1">
    <tr>
      <td>Tool Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" pattern="^[A-Za-z -]+$" title= "enter in valid form" required/></td>
    </tr>
    <tr>
      <td>Tool Category</td>
      <td><label for="txtcat"></label>
        <label for="sele_cat"></label>
        <select name="sele_cat" id="sele_cat">
        <option value="">----select----</option>
    <?php
	$selcat = "select * from tbl_toolcategory";
	$rescat = $con->query($selcat);
	while($rowcat=$rescat->fetch_assoc())
	{
		?>
		<option value="<?php echo $rowcat["toolcat_id"]?>"><?php echo $rowcat["toolcat_name"]?></option>
        <?php
	}
	?>
      </select></td>
    </tr>
    <tr>
      <td>Tool Rate</td>
      <td><label for="txtrate"></label>
      <input type="text" name="txtrate" id="txtrate" required="required"/></td>
    </tr>
    <tr>
      <td>Tool Image</td>
      <td><label for="txtimage"></label>
        <label for="file"></label>
      <input type="file" name="file_img" id="file_img" /></td>
    </tr>
  
    <tr>
    <td align="right"><input type="submit" name="btnsub" id="btnsub" value="Submit" ></td>
    </tr>
  </table>
  <table width="200" border="1">
  <br><br>
      <tr>
        <td>SI.NO</td>
        <td>tool name</td>
        <td>tool category</td>
        <td>tool rate</td>
        <td>tool image</td>
        <td>Action</td>
      </tr>
       <?php 
	
	  $select="select *from tbl_tool";
	  $res=$con->query($select);
	  $i=0;
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
	?>
    
    <tr>
      <td height="65"><?php echo $i?></td>
      <td><?php echo $row['tool_name'];?></td>
      <td><?php echo $row['toolcat_id'];?></td>
      <td><?php echo $row['tool_rate'];?></td>
      <td><img src="../Assets/Files/shoplogo/<?php echo $row['tool_img'];?>" width="100"/></td>
      <td><a href="Tools.php?did=<?php echo $row['tool_id']?>">Delete</a><br>
      <a href="Toolstock.php?pid=<?php echo $row['tool_id']?>">stock</a>
       <a href="toolgallary.php?tid=<?php echo $row['tool_id']?>">Addgallary</a>
    </tr>
	<?php
	  }
	  ?>
      </center>
     </table> 
</form>
</body>
</html>
