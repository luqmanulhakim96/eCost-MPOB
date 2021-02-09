<?php
/*
 *      Filename: mill/warga.php
 *      Copyright 2010 Malaysia Palm Oil Board <azman@mpob.gov.my>
 *		Last update: 15.10.2010 11:46:16 am
 */
session_start();
include ('../Connections/connection.class.php');
include ('../class/mill.class.php');


include('../setstring.inc');

extract($_POST);
extract($_GET);

$buruh = new user('buruh_mill','');

$con = connect();

$q = "select * from warganegara where jenis = '$type'";
$r = mysqli_query($con, $q);
$totalrekod = mysqli_num_rows($r);

$var[0]=$field;
$var[1]=$_SESSION['lesen'];
$var[2]=$_SESSION['tahun'];
$warga = new user('warga','');

?>

<link rel="shortcut icon" href="../images/icon.ico" />
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<script type="text/javascript" src="../jquery-1.3.2.js"></script>
<script type="text/javascript" src="../text_js.js"></script>
<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>

<script type="text/javascript">
function kira(obj,nilaiasal)
{
		if(number_only(obj)) {

		nilai_baru =0;

		for(b=1; b<=<?= $totalrekod; ?>; b++ ){
					jumlahb= document.getElementById("warga["+b+"]").value;
					jumlahb = jumlahb.replace(/,/g,"");

					nilai_baru = Number(nilai_baru)+Number(jumlahb);
		}


		$(obj).format({format:"#,###", locale:"us"});


		document.getElementById("total").value= nilai_baru;
		$("#total").format({format:"#,###", locale:"us"});

		}
}
</script>

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<form id="form1" name="form1" method="post" action="save_warga.php">
  <table width="300px">
    <tr>
      <td colspan="2"><h3><u><strong><?=setstring ( 'mal', 'Tambah Data', 'en', 'Add Data'); ?>

        <?php //$table = str_replace("_"," ", $field); echo ucwords($table);?>
         </strong></u></h3></td>
    </tr>

	<?php
	$d=0;
	while($row=mysqli_fetch_array($r)){
	 ++$d;
	?>
    <tr>
      <td><?= ucwords(strtolower($row['keterangan']));?></td>
      <td>:
	  <?php  $var[3]=$row['kod_warga']; ?>
        <input name="warga[<?= $row['kod_warga']; ?>]" type="text" class="field_active" id="warga[<?= $d; ?>]" onchange="kira(this,'<?= $warga->viewwargawhere($var);?>');" value="<?php echo $warga->viewwargawhere($var); ?>" autocomplete="off" onKeypress="keypress(event)" /></td>
    </tr>
	<?php } ?>
    <tr>
      <td><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?>
</strong></td>
      <td>:
        <label>
        <input name="total" type="text" class="field_total" id="total" value="<?php echo $warga->viewwargatotal($var); ?>"   onKeypress="keypress(event)"/>
        <input name="tahun" type="hidden" id="tahun" value="<?= $_SESSION['tahun'];?>" />
        <input name="jenis" type="hidden" id="jenis" value="<?= $field; ?>" />
        <input name="fieldtotal" type="hidden" id="fieldtotal" value="<?= $fieldtotal; ?>" />
      </label></td>
    </tr>
    <tr>
      <td width="26%">&nbsp;</td>
      <td width="74%"><input type="submit" name="Submit" value=<?=setstring ( 'mal', '"   Simpan   " ', 'en', ' "   Save   " '); ?>
/>
      <input type="reset" name="Submit2" value=<?=setstring ( 'mal', '"      Batal     " ', 'en', '"   Cancel   "'); ?>
/></td>
    </tr>
    <tr>
      <td colspan="2"><span class="style1">aaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaa</span></td>
    </tr>
  </table>
</form>
