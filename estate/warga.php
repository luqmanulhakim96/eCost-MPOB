<?php
	session_start();
	include ('../Connections/connection.class.php');
	include ('../class/user.class.php');
	include('../setstring.inc');

	extract($_POST);
	extract($_GET);

	$buruh = new user('buruh','');

	$con = connect();

	$q = "select * from warganegara where jenis = '$type'";
	$r = mysql_query($q,$con);
	$totalrekod = mysql_num_rows($r);

	$var[0]=$field;
	$var[1]=$_SESSION['lesen'];
	$var[2]=date('Y');
	//$var[3]="MAL";
	$warga = new user('','');
	//echo $warga->viewwargawhere($var);

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

<form id="form1" name="form1" method="post" action="save_warga.php">
  <table width="300px">
    <tr>
      <td colspan="2"><h3><u><strong><?=setstring ( 'mal', 'Tambah Data', 'en', 'Add Data'); ?>
 (<?php $table = ucwords(str_replace("_k_"," kontraktor ", $field)); echo $table; ?>) </strong></u></h3></td>
    </tr>
	
	<?php 
	$d=0;
	while($row=mysql_fetch_array($r)){
	 ++$d;
	?>
    <tr>
      <td><?= ucwords(strtolower($row['keterangan']));?></td>
      <td>:
	  <?php $var[3]=$row['kod_warga']; ?>
        <input name="warga[<?= $row['kod_warga']; ?>]" type="text" class="field_active" id="warga[<?= $d; ?>]" onchange="kira(this,'<?= $warga->viewwargawhere($var);?>');" value="<?php echo $warga->viewwargawhere($var); ?>" autocomplete="off" onKeypress="keypress(event)" /></td>
    </tr>
	<?php } ?>
    <tr>
      <td><strong><?=setstring ( 'mal', 'Jumlah', 'en', 'Total'); ?></strong></td>
      <td>:      
        <label>
        <input name="total" type="text" class="field_total" id="total" value="<?php echo $warga->viewwargatotal($var); ?>" size="20" readonly="true" onKeypress="keypress(event)"/>
        <input name="tahun" type="hidden" id="tahun" value="<?= date('Y');?>" />
        <input name="jenis" type="hidden" id="jenis" value="<?= $field; ?>" />
        <input name="fieldtotal" type="hidden" id="fieldtotal" value="<?= $fieldtotal; ?>" />
      </label></td>
    </tr>
    <tr>
      <td width="26%">&nbsp;</td>
      <td width="74%"><input type="submit" name="Submit" value=<?=setstring ( 'mal', '"Simpan"', 'en', '"Save"'); ?>
/>
      <input type="reset" name="Submit2" value=<?=setstring ( 'mal', '"Batal" ', 'en', '"Cancel"'); ?>
/></td>
    </tr>
  </table>
</form>
