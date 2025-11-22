<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LargestSmallest</title>
<?php
 if(isset($_POST["btnsub"]))
 {
	 $a=0;$b=0;$c=0;
	 $a=$_POST["txtnum1"];
	 $b=$_POST["txtnum2"];
	 $c=$_POST["txtnum3"];
	 $big=$a;
	 $small=$a;
	 if($b>$big)
	 $big=$b;
	 if($b<$big)
	 $small=$b;
	 if($c>$big)
	 $big=$c;
	 if($c<$big)
	 $small=$c;
	 
	 
 }
	 ?>
	 
</head>

<body>
<form method="post">
<center>
<table border="2">
<tr>
<td>Number 1</td>
<td>5</td>
</tr>
<tr>
<td>Number 2</td>
<td><input type="txt" name="txtnum2" required="required"></td>
</tr>
<tr>
<td>Number 3</td>
<td><input type="txt" name="txtnum3" required="required"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="btnsub" value="Submit"></td>
</tr>
<tr>
<tr>
<td>Largest=<?php echo $big ?>
<td>Smallest=<?php echo $small ?>
</table>
</form>
</center>
</body>
</html>