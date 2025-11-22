<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RankList</title>
<?php
$name="";
$gender="";
$dept="";
$tmark="";
$perce="";
$grade="";
if(isset($_POST["btnsub"]))
{
	$fname=$_POST["txtfname"];
	$lname=$_POST["txtlname"];
	$gender=$_POST["btngender"];
	if($gender=="male")
	$name="mr." .$fname."".$lname;
	else
	$name="miss." .$fname."".$lname;
	
	$dept=$_POST["ddldepartment"];
	$mark1=$_POST["txtmk1"];
	$mark2=$_POST["txtmk2"];
	$mark3=$_POST["txtmk3"];
	$tmark=$mark1+$mark2+$mark3;
	$perce=($tmark/3);
	if($perce>=90)
	$grade="A+";
	if($perce>=80)
	$grade="A";
	if($perce>=70)
	$grade="B+";
}
?>
	
	
	
	

</head>

<body>
<form id="form1" name="form1" method="post" action="">
<center>
  <table width="561" border="1">
    <tr>
      <td width="71">First Name</td>
      <td width="144"><label for="txtfname"></label>
      <input type="text" name="txtfname" id="txtfname" /></td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><label for="txtlname"></label>
      <input type="text" name="txtlname" id="txtlname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="btngender" id="gender" value="male" />
      <label for="male">male</label>
      <input type="radio" name="btngender" id="gender" value="female" />
      <label for="female"></label>female</td>
    </tr>
    <tr>
      <td>Department</td>
      <td><label for="ddldepartment"></label>
        <select name="ddldepartment" id="ddldepartment">
       <option>--select--</option>
        <option value="bca">BCA</option>
        <option value="cs">computer science</option>
        <option value="electric">Electronics</option>
        </select>
     </td>
    </tr>
    <tr>
      <td height="32">Mark1</td>
      <td><label for="txtmk1"></label>
      <input type="text" name="txtmk1" id="txtmk1" /></td>
    </tr>
    <tr>
      <td>Mark2</td>
      <td><label for="txtmk2"></label>
      <input type="text" name="txtmk2" id="txtmk2" /></td>
    </tr>
    <tr>
      <td>Mark3</td>
      <td><label for="txtmk3"></label>
      <input type="text" name="txtmk3" id="txtmk3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsub" id="btnsub" value="Submit" /></td>
    </tr>
    <tr>
    <td>Name=<?php echo $name ?></td></tr>
    <tr><td>Gender=<?php echo $gender ?></td></tr>
    <tr><td>Department=<?php echo $dept ?></td>
    </tr>
    <tr>
      <td>TotalMark=<?php echo $tmark ?></td></tr>
      <tr><td>Percentage=<?php echo $perce ?></td></tr>
    <tr><td>Grade=<?php echo $grade ?></td>
    </tr>
  </table>
  </center>
</form>
</body>
</html>