<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calculator</title>
<?php
if(isset($_POST["btnsubmit"]))
{
 $a=0;$b=0;$result=0;
 $a=$_POST["txtfnum"];
 $b=$_POST["txtsnum"];
 $result=$a+$b;
}
elseif(isset($_POST["btnsub"]))
{
 $a=0;$b=0;$result=0;
 $a=$_POST["txtfnum"];
 $b=$_POST["txtsnum"];
 $result=$a-$b;
}

else if(isset($_POST["btnmulti"]))
{
	$a=0;$b=0;$result=0;
 $a=$_POST["txtfnum"];
 $b=$_POST["txtsnum"];
 $result=$a*$b;
 }
 else if(isset($_POST["btndivi"]))
 {
 $a=0;$b=0;$result=0;
 $a=$_POST["txtfnum"];
 $b=$_POST["txtsnum"];
 $result=$a/$b;
 }
 ?>
</head>
<body>
<form method="post">
<center>
<table border="10">
<tr>
<td>First Number:</td>
<td><input type="text" name="txtfnum" placeholder="firstnum" require="required"></td>
</tr>
<tr>
<td>Second Number:</td>
<td><input type="txt" name="txtsnum" placeholder="secondnum" required="required"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="btnsubmit" value="Add">
<input type="submit" name="btnsub" value="Sub">
<input type="submit" name="btnmulti" value="multi">
<input type="submit" name="btndivi" value="divi"></td>
</tr>
<tr>
<td>result=<?php echo $result ?></td>
</tr>
</center>
</table> 
</form>
</body>
</html>