<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="facebox/facebox.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
})
</script>

<table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
<thead>
  <tr>
    <td height="26" colspan="4"><div align="center"><strong>List of Non Response Survey in <?php echo $region_full; ?></strong></div></td>
  </tr>
  <tr bgcolor="#8A1602">
    <td width="4%" class="style1">No.</td>
    <td width="37%" height="33" class="style1">Estate Name</td>
    <td width="31%" bgcolor="#8A1602" class="style1">Main Company </td>
    <td width="28%" class="style1">E-mail</td>
  </tr>
</thead>
<tbody>
<?php
	$con = connect();
	$year = date('Y');
		if($region=='pm')
		{
			$region_full = "Peninsular Malaysia";
			$q="SELECT esub.* FROM esub LEFT JOIN buruh ON esub.No_Lesen_Baru = buruh.lesen WHERE b.tahun = $year AND buruh.lesen IS NULL AND esub.Negeri NOT LIKE 'SABAH' AND esub.Negeri NOT LIKE 'SARAWAK'GROUP BY buruh.lesen";
		}
		else if($region=='sabah')
		{
			$region_full = "Sabah";
			$sqladd = "(e.negeri LIKE '%SABAH%')";
			$q="SELECT * FROM buruh b, esub e WHERE b.lesen = e.no_lesen_baru AND b.tahun = $year AND $sqladd GROUP BY b.lesen";
		}
		else if($region=='swk')
		{
			$region_full = "Sarawak";
			$sqladd = "(e.negeri LIKE '%SARAWAK%')";
			$q="SELECT * FROM buruh b, esub e WHERE b.lesen = e.no_lesen_baru AND b.tahun = $year AND $sqladd GROUP BY b.lesen";
		}
		else if($region=='my')
		{
			$region_full = "Malaysia";
			$q="SELECT * FROM buruh b, esub e WHERE b.lesen = e.no_lesen_baru AND b.tahun = $year GROUP BY b.lesen";
		}
		$r=mysqli_query($con, $q);
		$j =0;
		echo $q;
	while($row=mysqli_fetch_array($r)){
?>
  <tr valign="top">
    <td><?php echo ++$j; ?></td>
    <td><?php echo $row['Nama_Estet'];?></td>
    <td><?php echo $row['Syarikat_Induk'];?></td>
    <td><a href="emailnonresponde.php?bil=<?php echo $row['Bil'];?>" rel="facebox" ><?php echo $row['Emel'];?></a>
    <div align="center"></div></td>
  </tr>
  <?php } mysqli_close($con);?>
</tbody>
</table>
