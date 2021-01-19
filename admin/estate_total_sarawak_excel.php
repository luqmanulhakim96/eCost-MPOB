<?php 
extract($_REQUEST);
include('../Connections/connection.class.php');
include '../class/admin.estate.class.php';

if(isset($district)){
	header("Content-Disposition: attachment; filename=Estate_Response_Survey_in_$district.xls");
}else{
	header("Content-Disposition: attachment; filename=Estate_Response_Survey_in_Sarawak.xls");
}
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<table width="100%" border="1" cellpadding="4" cellspacing="0" class="display" id="example" style="border-collapse:collapse">
  <thead>
    <tr bgcolor="#8A1602" height="30">
      <th width="4%" class="style1" filter='false'>No.</th>
      <th class="style1">Estate Name</th>
      <th><span class="style1">Company Name</span></th>
      <th><span class="style1">New License No.</span></th>
      <th class="style1">E-mail</th>
      <th class="style1">Address</th>
      <th class="style1">Poskod</th>
      <th class="style1">City</th>
      <th class="style1">State</th>
      <th class="style1">Phone No.</th>
      <th class="style1">Fax No.</th>
      <th class="style1">Last access</th>
    </tr>
  </thead>
  <tbody>
	<?php 	
		while($row=mysql_fetch_array($result_sarawak)) { ?>
		<tr valign="top" <?php if($list%2==0){?>class="alt"<?php } ?>>
			<td><?php echo $list++; ?></td>
			<td><?php echo $row['nama_estet'];?></td>
			<td><?php echo $row['syarikat_induk'];?></td>
			<td><?php echo $row['no_lesen_baru'];?></td>
			<td><?php echo $row['emel'];?>
		  <div align="center"></div></td>
          <td><?php echo $row['alamat1']." ".$row['alamat2'];?></td>
            <td><?php echo $row['poskod'];?></td>
            <td><?php echo $row['bandar'];?></td>
            <td><?php echo $row['negeri'];?></td>
            <td><?php echo $row['no_telepon'];?></td>
            <td><?php echo $row['no_fax'];?></td>
		  <td><?php echo $row['success'];?></td>
		    
		</tr>
	<?php }?>
  </tbody>
</table>
