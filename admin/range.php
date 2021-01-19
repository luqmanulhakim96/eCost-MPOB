<?php 
session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");

$range = new admin('rangekos','');
include('baju_merah.php');
?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<script type="text/javascript" src="../text_js.js"></script>
<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>
<script type="text/javascript">
function kiraan_baru(obj) {
		if(number_only(obj)) {
		$(obj).format({format:"#,###.00", locale:"us"});
		$(obj).removeClass("field_active");
		$(obj).addClass("field_edited");
		}
	}
</script>

<style type="text/css">
<!--
.style5 {color: #FFFFFF; font-size: 12px; font-weight: bold; }
-->
</style>
<form id="form1" name="form1" method="post" action="save_range.php">
  <table width="100%">
    <tr>
      <td colspan="3"><h2><strong>Range Setting </strong></h2></td>
    </tr>
    <tr>
      <td colspan="3"><table width="72%" align="center" class="baju">
        <tr bgcolor="#8A1602">
          <th height="28" colspan="2" bgcolor="#8A1602" class="style5">&nbsp;Range Name </th>
          <th width="17%"><div align="center"><span class="style5">Min</span></div></th>
          <th width="17%"><div align="center"><span class="style5">Max</span></div></th>
        </tr>
        
		  <?php for($i=0; $i<$range->total; $i++){?>
        <tr <?php if($i%2==0){?>class="alt"<?php } ?>>
          <td width="3%"><?= $i+1; ?></td>
          <td width="63%"><?= strtoupper($range->type[$i]); ?>
            <input name="type[<?= $i; ?>]" type="hidden" id="type[<?= $i; ?>]" value="<?= $range->type[$i]; ?>" /></td>
          <td><div align="center">
            <input name="minimum[<?= $i; ?>]" type="text" autocomplete="off" id="minimum[<?= $i; ?>]" value="<?= number_format($range->minimum[$i],2);?>" size="19" class="field_active" onchange="kiraan_baru(this)" />
          </div></td>
          <td><div align="center">
            <input name="maximum[<?= $i; ?>]" type="text" autocomplete="off" id="maximum[<?= $i; ?>]" value="<?= number_format($range->maximum[$i],2);?>" size="19"  class="field_active" onchange="kiraan_baru(this)"/>
          </div></td>
        </tr>
		<?php } ?>
        
        
      </table>
        <div align="center"><br />
          <input name="total" type="hidden" id="total" value="<?= $range->total; ?>" />
          <input type="submit" name="Submit" value="Save Range" />
          <input type="reset" name="Submit2" value="Reset" />
        </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
