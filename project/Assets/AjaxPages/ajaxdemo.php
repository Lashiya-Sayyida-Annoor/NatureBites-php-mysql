<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>SI.NO</td>
      <td>Product</td>
      <td>User</td>
      <td>Address</td>
      <td>Status</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$sel="SELECT * FROM tbl_booking  b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_vegetables v on v.veg_id=c.veg_id inner join tbl_user u on u.user_id=b.user_id inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id where booking_id=".$_SESSION['bid'];
	$row=$con->query($sel);
	while($res=$row->fetch_assoc())
	{
		$i++;
	
	?>
    
	
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row["veg_name"]; ?> </td>
      <td><?php echo $row["user_name"]; ?></td>
      <td><?php echo $row["user_address"] ,$row["place_name"]; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php
	}
	?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>



