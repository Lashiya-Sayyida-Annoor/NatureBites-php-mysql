<?php
include("../Assets/Connection/Connection.php");
session_start();
$flag=0;
 if(isset($_POST['btnupload']))
 {
	  $photos=$_FILES['photos'];
    for ($i = 0; $i < count($photos['name']); $i++) {
        $photoName = $photos['name'][$i];
        $photoTmpName = $photos['tmp_name'][$i];
        move_uploaded_file($photoTmpName, '../Assets/Files/Gallery/'.$photoName);
        $query = "INSERT INTO tbl_toolgallary (galry_image,tool_id) VALUES ('".$photoName."','".$_GET['tid']."')";
        if($con->query($query))
		{
            $flag++;
        }
    }
	 if($flag==$i)
    {
        echo '<script>alert("Upload Successfull");</script>';
    }
    else{
        ?>
        <script>alert("Only <?php echo $flag ?> Uploaded. Remaining Failed!");</script>'
        <?php
    }
}
if(isset($_GET['did']))
	{
		$delqry="delete from tbl_toolgallary where galry_id=".$_GET['did'];
		$con->query($delqry);
	}
 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>gallary</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="200" border="1">
    <tr>
      <td>Images</td>
      <td><label for="txtimg"></label>
      <input type="file" name="photos[]" id="photos[]" multiple="multiple" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnupload" id="btnupload" value="Upload" />
      <input type="reset" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
  </table>
  <table>
  <br><br>
  <tr>
   <?php 
	
	  $select="select *from tbl_toolgallary";
	  $res=$con->query($select);
	  $i=0;
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
	?>
    
    <td>
    <img src="../Assets/Files/Gallery/<?php echo $row['galry_image'];?>" width="100" />
    <p><a href="toolgallary.php?did=<?php echo $row['galry_id']?>">Delete</a></p>
     
    </td>
    
    <?php
	 if($i==4)
	 {
		 echo "</tr> <tr>";
		 $i=0;
	 }
	  }
	?>
    </td>
   
    
      </center>
      </table>
</form>
</body>
</html>