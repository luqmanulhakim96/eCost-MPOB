<?php
  session_start();

if ($_SESSION['type']<>"admin")
       header("location:logout.php");

?>

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
    <td height="26" colspan="4"><div align="center"><strong>List of Response Survey in <?php echo $region; ?></strong></div></td>
  </tr>
  <tr bgcolor="#8A1602">
    <td width="4%" class="style1">No.</td>
    <td width="37%" height="33" class="style1">Mill Name</td>
    <td width="28%" class="style1">E-mail</td>
    <td class="style1">No.Telefon</td>
  </tr>
</thead>
<tbody>
<?php
    $con = connect();
        if($region=='pm')
        {
            $sqladd = "(mill_info.negeripremis NOT LIKE '%SABAH%' AND mill_info.negeripremis NOT LIKE '%SARAWAK%')";
            $q="SELECT alamat_ekilang.lesen lesen, alamat_ekilang.nama nama, alamat_ekilang.email email,alamat_ekilang.notel FROM alamat_ekilang LEFT JOIN mill_info ON alamat_ekilang.lesen = mill_info.lesen LEFT JOIN mill_buruh ON mill_buruh.lesen = alamat_ekilang.lesen WHERE mill_buruh.tahun = '".date('Y')."' AND mill_buruh.status = '1' AND $sqladd";
        }
        else if($region=='sabah')
        {
            $sqladd = "(mill_info.negeripremis LIKE '%SABAH%')";
            $q="SELECT alamat_ekilang.lesen lesen, alamat_ekilang.nama nama, alamat_ekilang.email email,alamat_ekilang.notel FROM alamat_ekilang LEFT JOIN mill_info ON alamat_ekilang.lesen = mill_info.lesen LEFT JOIN mill_buruh ON mill_buruh.lesen = alamat_ekilang.lesen WHERE mill_buruh.tahun = '".date('Y')."' AND mill_buruh.status = '1' AND $sqladd";
        }
        else if($region=='swk')
        {
            $sqladd = "(mill_info.negeripremis LIKE '%SARAWAK%')";
            $q="SELECT alamat_ekilang.lesen lesen, alamat_ekilang.nama nama, alamat_ekilang.email email,alamat_ekilang.notel FROM alamat_ekilang LEFT JOIN mill_info ON alamat_ekilang.lesen = mill_info.lesen LEFT JOIN mill_buruh ON mill_buruh.lesen = alamat_ekilang.lesen WHERE mill_buruh.tahun = '".date('Y')."' AND mill_buruh.status = '1' AND $sqladd";
        }
        else if($region=='my')
        {
            $q="SELECT alamat_ekilang.lesen lesen, alamat_ekilang.nama nama, alamat_ekilang.email email,alamat_ekilang.notel FROM alamat_ekilang LEFT JOIN mill_info ON alamat_ekilang.lesen = mill_info.lesen LEFT JOIN mill_buruh ON mill_buruh.lesen = alamat_ekilang.lesen WHERE mill_buruh.tahun = '".date('Y')."' AND mill_buruh.status = '1'";

        }
        $r=mysqli_query($con, $q);
        $j =0;
        //echo $q;
    while($row=mysqli_fetch_array($r)){
?>
  <tr valign="top">
    <td><?php echo ++$j; ?></td>
    <td><a href="profile_mill.php?lesen=<?php echo $row['lesen'];?>" rel="facebox"><?php echo $row['nama'];?></a></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['notel'];?></td>
  </tr>
  <?php } mysqli_close($con);?>
</tbody>
</table>
<br />
