<?php include('../Connections/connection.class.php');
include '../class/test.class.php';
header("Content-Disposition: attachment; filename=All_Mill_Response_Survey_in_Malaysia.xls");
?>
<style type="text/css">
<!--
.style2 {	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="display" id="example">
  <thead>
    <tr bgcolor="#8A1602" height="30">
      <th width="4%" class="style2">No.</th>
      <th class="style2">Mill Name</th>
      <th class="style2">Company Name</th>
      <th class="style2">License No.</th>
      <th class="style2">E-mail</th>
      <th class="style2">Address</th>
      <th class="style2">Phone No.</th>
      <th class="style2">Fax No.</th>
      <th class="style2">Last access</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row=mysqli_fetch_array($result_all)) { ?>
    <tr valign="top">
      <td><?php echo $list++; ?></td>
      <td><?php echo $row['nama'];?></td>
      <td><?php echo $row['syarikat_induk'];?></td>
      <td><?php echo $row['lesen'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['alamatsurat1']." ".$row['alamatsurat2']." ".$row['alamatsurat3'];?></td>
      <td><?php echo $row['notel'];?></td>
      <td><?php echo $row['nofax'];?></td>
      <td><?php echo $row['access'];?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
