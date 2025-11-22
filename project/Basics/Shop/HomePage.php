<?php
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
    <center>
<h2>Welcome</h2>
<h2><?php echo $_SESSION['sname'] ?></h2>
<a href="MyProfile.php">My Profile</a><br>
<a href="Tools.php">Tools</a><br>
<a href="shopcomplaint.php">Complaints</a><br>
</center>
</body>
</html>