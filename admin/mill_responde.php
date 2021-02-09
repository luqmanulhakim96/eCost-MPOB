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
    <td height="26" colspan="4"><div align="center"><strong>List of Response Survey in <?= $region; ?></strong></div></td>
  </tr>
  <tr bgcolor="#8A1602">
    <td width="4%" class="style1">No.</td>
    <td width="37%" height="33" class="style1">Mill Name</td>
    <td width="28%" class="style1">E-mail</td>
  </tr>
</thead>
<tbody>
<?php
	$con = connect();
		if($region=='pm')
		{
			$sqladd = "(e.negeri NOT LIKE '%SABAH%' AND e.negeri NOT LIKE '%SARAWAK%')";
			$q="SELECT * FROM mill_buruh b, esub e WHERE b.lesen = e.no_lesen_baru AND b.tahun = '".date('Y')."' AND $sqladd GROUP BY b.lesen";
		}
		else if($region=='sabah')
		{
			$sqladd = "(e.negeri LIKE '%SABAH%')";
			$q="SELECT * FROM mill_buruh b, esub e WHERE b.lesen = e.no_lesen_baru AND b.tahun = '".date('Y')."' AND $sqladd GROUP BY b.lesen";
		}
		else if($region=='swk')
		{
			$sqladd = "(e.negeri LIKE '%SARAWAK%')";
			$q="SELECT * FROM mill_buruh b, esub e WHERE b.lesen = e.no_lesen_baru AND b.tahun = '".date('Y')."' AND $sqladd GROUP BY b.lesen";
		}
		else if($region=='my')
		{
			$q="SELECT * FROM mill_buruh b, esub e WHERE b.lesen = e.no_lesen_baru AND b.tahun = '".date('Y')."' GROUP BY b.lesen";
		}
		$r=mysqli_query($con, $q);
		$j =0;
		//echo $q;
	while($row=mysqli_fetch_array($r)){
?>
  <tr valign="top">
    <td><?php echo ++$j; ?></td>
    <td><a href="home.php?id=adm_mill&sub=mill_details&lesen=<?= $row['No_Lesen_Baru'];?>"><?= $row['Nama_Estet'];?></a></td>
    <td><a href="emailnonresponde.php?bil=<?= $row['Bil'];?>" rel="facebox" ><?= $row['Emel'];?></a>
    <div align="center"></div></td>
  </tr>
  <?php } mysqli_close($con);?>
</tbody>
</table>
