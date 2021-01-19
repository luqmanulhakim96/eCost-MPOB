<?php
extract($_REQUEST);
include('../Connections/connection.class.php');
include '../class/admin.estate.class.php';
extract($_REQUEST);

	if($type=='peninsular'){
		$result_incomplete = $result_peninsular_incomplete;
		if(isset($negeri)){
			if(isset($district)){
				header("Content-Disposition: attachment; filename=Non-Response_Estate_in_$district.xls");
			}else{
				header("Content-Disposition: attachment; filename=Non-Response_Estate_in_$negeri.xls");
			}
		}else{
			header("Content-Disposition: attachment; filename=Non-Response_Estate_in_Peninsular.xls");
		}
	}
	else if($type=='sabah'){
		$result_incomplete = $result_sabah_incomplete;
		if(isset($district)){
			header("Content-Disposition: attachment; filename=Non-Response_Estate_in_$district.xls");
		}else{
			header("Content-Disposition: attachment; filename=Non-Response_Estate_in_Sabah.xls");
		}
	}
	else if($type=='sarawak'){
		$result_incomplete = $result_sarawak_incomplete;
		if(isset($district)){
			header("Content-Disposition: attachment; filename=Non-Response_Estate_in_$district.xls");
		}else{
			header("Content-Disposition: attachment; filename=Non-Response_Estate_in_Sarawak.xls");
		}
	}
	else
	{
		$result_incomplete = $result_all_incomplete;
		header("Content-Disposition: attachment; filename=Non-Response_Estate_in_Malaysia.xls");
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
    </tr>
  </thead>
  <tbody>
	<?php 	
		while($row=mysql_fetch_array($result_incomplete)) { ?>
		<tr valign="top" <?php if($list%2==0){?>class="alt"<?php } ?>>
			<td><?php echo $list++; ?></td>
			<td><?php echo $row['nama_estet'];?></td>
			<td><?php echo $row['syarikat_induk'];?></td>
			<td><?php echo $row['no_lesen_baru'];?></td>
			<td><?php echo $row['emel'];?>
            <td><?php echo $row['alamat1']." ".$row['alamat2'];?></td>
            <td><?php echo $row['poskod'];?></td>
            <td><?php echo $row['bandar'];?></td>
            <td><?php echo $row['negeri'];?></td>
            <td><?php echo $row['no_telepon'];?></td>
            <td><?php echo $row['no_fax'];?></td>
		  <div align="center"></div></td>		    
		</tr>
	<?php }?>
  </tbody>
</table>