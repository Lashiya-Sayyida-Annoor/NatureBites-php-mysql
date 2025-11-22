<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("head.php");
$msg="";

$userid=$_SESSION['uid'];
if(isset($_POST["btnsubmit"])){
$comtitle=$_POST["txtcomtitle"];
$comcontent=$_POST["txtcomcontent"];
$insqry="insert into tbl_complaint(complaint_title,complaint_content,user_id) values('".$comtitle."','".$comcontent."',".$userid.")";
if($con->query($insqry))
{
$msg="Your Complaint Has Been Submitted";
}
else
{
$msg="Complaint Submission Failed";
}
}
?>








<!DOCTYPE html>
<html>
<head>
  <title>User Complaint</title>
  <style>
    /* Styling for the card format */
    .card {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #c53636;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgb(42 17 17 / 95%);
      background-color: #b7c9be;
    }

    .form-table {
      width: 100%;
    }

    .form-table td {
      padding: 10px;
    }

    .form-table input[type="text"],
    .form-table textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-table input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

   h3{
    color: #9d1212;
   }
   .table{
    width: 70%;
   }
    
  </style>
</head>

<body>
  <center>
    <br /><br />
    <h3>Report Your Complaints Here..</h3>
    <br /><br />
    <div class="card">
      <form id="form1" name="form1" method="post" action="">
        <table class="form-table" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>Complaint Title:</td>
            <td>
              <label for="txtcomtitle"></label>
              <input type="text" name="txtcomtitle" id="txtcomtitle" />
            </td>
          </tr>
          <tr>
            <td>Complaint Content:</td>
            <td>
              <textarea name="txtcomcontent" id="txtcomcontent" rows="4" cols="50"></textarea>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="right">
              <input type="submit" name="btnsubmit" value="Submit" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  

<br />

<?php echo $msg?>
<br /><br />
<h3>Your previous complaints</h3><br />
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th class="text-center">SL No:</th>
      <th class="text-center">Complaint Title:</th>
      <th class="text-center">Complaint Content:</th>
      <th class="text-center">Admin Reply:</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $selc = "SELECT * FROM tbl_complaint where user_id=" . $userid;
    $resc = $con->query($selc);
    $i = 0;
    while ($rowc = $resc->fetch_assoc()) {
      $i++;
    ?>
      <tr>
        <td class="text-center"><?php echo $i; ?></td>
        <td class="text-center"><?php echo $rowc['complaint_title']; ?></td>
        <td class="text-center"><?php echo $rowc['complaint_content']; ?></td>
        <td class="text-center">
          <?php
          if ($rowc['complaint_status'] == 1) {
          ?>
            <?php echo $rowc['complaint_reply']; ?>
          <?php
          } else {
          ?>
            Waiting...
          <?php
          }
          ?>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>


</form><br /><br />
</center>
</body>
<?php
ob_end_flush();
include('foot.php');
?>
</html>




       
