<?php
ob_start();
include('Head.php');
$district_name = "";
$districtid = 0;

include("../Assets/Connection/Connection.php");
if (isset($_GET['did'])) {
    $delqry = "DELETE FROM tbl_district WHERE district_id=" . $_GET['did'];
    if ($con->query($delqry)) {
?>
        <script>
            alert('Deleted');
        </script>
<?php
    } else {
?>
        <script>
            alert('Failed');
        </script>
<?php
    }
}

$message = "";
if (isset($_POST["btnsave"])) {
    $distname = $_POST["txtdname"];
    $distid = $_POST["txtid"];
    if ($distid == 0) {
        $sql_check_duplicate = "SELECT * FROM tbl_district WHERE district_name ='" . $distname . "' ";
        $result = $con->query($sql_check_duplicate);
        if ($result->num_rows > 0) {
            echo "Error: Duplicate data already exists!";
        } else {
            $insqry = "INSERT INTO tbl_district(district_name) VALUES('" . $distname . "')";
            if ($con->query($insqry)) {
                $message = "Record Inserted...";
            } else {
                $message = "Insertion Failed...";
            }
        }
    } else {
        $upqry = "UPDATE tbl_district SET district_name='" . $distname . "' WHERE district_id=" . $distid;
        if ($con->query($upqry)) {
?>
            <script>
                alert('Updated');
                window.location = "District.php";
            </script>
<?php
        } else {
?>
            <script>
                alert('Failed');
            </script>
<?php
        }
    }
}

if (isset($_GET['eid'])) {
    $SelQry = "SELECT * FROM tbl_district WHERE district_id=" . $_GET['eid'];
    $resEdit = $con->query($SelQry);
    $rowEdit = $resEdit->fetch_assoc();
    $districtid = $rowEdit['district_id'];
    $district_name = $rowEdit['district_name'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
    
input[type="text"] {
       
        border-color: black;
        border: black;
 
 padding: 0.5rem;
 color: black;
}
    
</style>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>District</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <input type="hidden" name="txtid" value="<?php echo $districtid ?>">
    <center>
        <table border="1" class="table  table-dark table-hover" style="width: 50%;">
            <tr>
                
                <td><label for="txtdname"></label>
                   District Name : <input type="text" name="txtdname" id="txtdname" required="required" pattern="[a-zA-Z]+" title="Enter letters only" placeholder="Enter District Name" value="<?php echo $district_name ?>" />
                </td>
            
                <td colspan="2" align="center">
                    <input type="submit" name="btnsave" id="btnsave" value="Submit" class="btn btn-primary btn-sm" onclick="checkDuplicateDistrict()" />
                    <input type="reset" name="btncancel" id="btncancel"  class="btn btn-secondary btn-sm" value="Cancel" />
                </td>
            </tr>
        </table>
        <br><br>
        <table width="213" border="1" class="table table-bordered table-dark table-hover" style="width: 50%;">
            <tr>
                <td width="59" height="49">Serialno</td>
                <td width="59">Districtname</td>
                <td width="73">Action</td>
            </tr>

            <?php
            $select = "SELECT * FROM tbl_district";
            $res = $con->query($select);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td height="65"><?php echo $i ?></td>
                    <td><?php echo $row['district_name']; ?></td>
                    <td>
                        <a href="District.php?did=<?php echo $row['district_id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        <a href="District.php?eid=<?php echo $row['district_id'] ?>"class="btn btn-info btn-sm">Edit</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </center>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>
