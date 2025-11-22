<?php
include("../Assets/Connection/Connection.php");
 $stock=0;
if(isset($_POST["btnsave"]))
{   
    
  
	$sel="select  * from tbl_toolstock where tool_id='".$_GET['pid']."'";
	$row=$con->query($sel);
	if($res=$row->fetch_assoc())
	{ 
		
		$stock=$res["toolstock_quantity"];
		$newstock=$stock+$_POST["txtquan"];
		$update="update tbl_toolstock set toolstock_quantity='".$newstock."' where tool_id=".$_GET['pid'];
		$con->query($update);
	}
   
  
	else
	{
		$insert="insert into tbl_toolstock(toolstock_quantity,tool_id)values('".$stock."','".$_GET["pid"]."')";
		$con->query($insert);
	}
   
}
$shopid=$_SESSION['sid'];
$seleqry="select *from tbl_toolstock t inner join tbl_tool to on t.tool_id=to.tool_id  where shop_id='".$shopid."'";
$res=$con->query($seleqry);
while($row=$res->fetch_assoc())
{
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
  <table width="200" border="1">
  <tr>
      <td align="center" >Tool Name</td>
      <td align="center"><?php echo $row['tool_name']; ?></td>
    </tr>
	<tr>
      <td align="center" >Tool quantity</td>
      <td align="center"><?php echo $row["toolstock_quantity"]; ?></td>
    </tr>
	<?php
	}
	?>
    <tr>
      <td height="43">Quantity</td>
      <td><label for="txtquan"></label>
      <input type="text" name="txtquan" id="txtquan" required="required" /></td>
    </tr>
    <tr>
      <td height="28" align="center" colspan="2"><input type="submit" name="btnsave" id="btnsave" value="save" />&nbsp;&nbsp;
      <input type="reset" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
  </table>

  </center>
</form>
</body>
</html>