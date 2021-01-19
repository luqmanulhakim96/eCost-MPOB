<?php //include('../class/admin.class.php');
$pekerja = new admin('workers','Local');


$worker = new admin('workerslist', $kod_warga);
?>
<script type="text/javascript" src="../js/tabber/tabber.js"></script>
<link rel="stylesheet" href="../js/tabber/example.css" TYPE="text/css" MEDIA="screen">


<script type="text/javascript">

/* Optional: Temporarily hide the "tabber" class so it does not "flash"
   on the page as plain HTML. After tabber runs, the class is changed
   to "tabberlive" and it will appear. */

document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>

<div><?php include ('menu_var.php');?></div>

<table width="100%">
  <tr>
    <td colspan="3">
	<?php if($kod_warga==''){?>
	<form id="form1" name="form1" method="post" action="save_workers.php">
      <table width="100%">
        <tr>
          <td colspan="3"><h3><u><strong>Add  Workers List </strong></u></h3></td>
          </tr>
        <tr>
          <td width="12%">Citizen Code </td>
          <td width="1%">:</td>
          <td width="87%"><input name="code" type="text" id="code" size="40" autocomplete="off" style="text-transform:uppercase" />
		 <script type="text/javascript">
				var code= new LiveValidation('code');
				code.add( Validate.Presence );
		</script>		  </td>
        </tr>
        <tr>
          <td>Description</td>
          <td>:</td>
          <td>            <input name="description" type="text" id="description" autocomplete="off" size="40" style="text-transform:uppercase" />  
				  <script type="text/javascript">
						var description= new LiveValidation('description');
						description.add( Validate.Presence );
					</script>		          </td>
        </tr>
        <tr>
          <td>Type </td>
          <td>:</td>
          <td><select name="type" id="type">
            <option value="Local">Local</option>
            <option value="Foreign">Foreign</option>
          </select>          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>
            <input type="submit" name="Submit" value="   Save   " />            <input type="reset" name="Submit2" value="  Reset  " />
            <input name="var" type="hidden" id="var" value="add" /></td>
        </tr>
      </table>
      </form>  
		<?php } ?>
		
		<?php if($kod_warga!=''){?>
		<form id="form2" name="form2" method="post" action="save_workers.php">
      <table width="100%">
        <tr>
          <td colspan="3"><h3><u><strong>Update  Workers List </strong></u></h3></td>
          </tr>
        <tr>
          <td width="12%">Citizen Code </td>
          <td width="1%">:</td>
          <td width="87%"><input name="code" type="text" id="code" style="text-transform:uppercase" value="<?= $worker->kod_warga;?>" size="40" autocomplete="off" />
		 <script type="text/javascript">
				var code= new LiveValidation('code');
				code.add( Validate.Presence );
		</script>		  </td>
        </tr>
        <tr>
          <td>Description</td>
          <td>:</td>
          <td>            <input name="description" type="text" id="description" style="text-transform:uppercase" value="<?= $worker->keterangan;?>" size="40" autocomplete="off" />  
				  <script type="text/javascript">
						var description= new LiveValidation('description');
						description.add( Validate.Presence );
					</script>		          </td>
        </tr>
        <tr>
          <td>Type </td>
          <td>:</td>
          <td><select name="type" id="type">
            <option value="Local" <?php if($worker->jenis=='Local'){?>selected="selected"<?php } ?>>Local</option>
            <option value="Foreign" <? if($worker->jenis=='Foreign'){?>selected="selected"<?php } ?>>Foreign</option>
          </select>
            <input name="kod_warga" type="hidden" id="kod_warga" value="<?= $kod_warga; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>
            <input type="submit" name="Submit" value="   Save Changes   " />            
            <input type="reset" name="Submit2" value="  Reset  " />
            <input name="var" type="hidden" id="var" value="update" /></td>
        </tr>
      </table>
      </form>
		<?php } ?>
		
	    </td>
  </tr>
  <tr>
    <td colspan="3"><h3><u><strong>List of Workers </strong></u></h3></td>
  </tr>
  <tr>
    <td colspan="3">
	
	<div class="tabber">

     <div class="tabbertab">
	  <h2>Local</h2>
	  <table width="100%">
        <tr>
          <td>&nbsp;</td>
          <td><u><strong>Description</strong></u></td>
          <td><u><strong>Type</strong></u></td>
        </tr>
          <?php for($j=0; $j<$pekerja->total; $j++){?>
  
  <tr>
    <td width="5%"><a href="save_workers.php?var=delete&amp;code=<?= $pekerja->kod_warga[$j];?>"><img src="../images/remove.png" width="20" height="20" border="0" title="Delete data" onclick="return confirm('Delete this data?');" /></a> <a href="home.php?id=config&amp;sub=variable&amp;kod_warga=<?= $pekerja->kod_warga[$j];?>"><img src="../images/edit.png" width="20" height="20" border="0" title="Edit data" /></a></td>
    <td width="18%"><span class="style1">
      <?= $pekerja->kod_warga[$j];?>
    </span>
    - <?= $pekerja->keterangan[$j];?></td>
    <td width="77%"><?= $pekerja->jenis[$j];?></td>
  </tr>
  
  <?php } ?><tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
      </table>
     </div>

<?php $pekerja_asing = new admin('workers','Foreign');?>
     <div class="tabbertab">
	  <h2>Foreign</h2>
	  <table width="100%">
        <tr>
          <td>&nbsp;</td>
          <td><u><strong>Description</strong></u></td>
          <td><u><strong>Type</strong></u></td>
        </tr>
        <?php for($j=0; $j<$pekerja_asing->total; $j++){?>
        <tr>
          <td width="5%"><a href="save_workers.php?var=delete&amp;code=<?= $pekerja_asing->kod_warga[$j];?>"><img src="../images/remove.png" width="20" height="20" border="0" title="Delete data" onclick="return confirm('Delete this data?');" /></a> <a href="home.php?id=config&amp;sub=variable&amp;kod_warga=<?= $pekerja_asing->kod_warga[$j];?>"><img src="../images/edit.png" width="20" height="20" border="0" title="Edit data" /></a></td>
          <td width="18%"><span class="style1">
            <?= $pekerja_asing->kod_warga[$j];?>
            </span> -
            <?= $pekerja_asing->keterangan[$j];?></td>
          <td width="77%"><?= $pekerja_asing->jenis[$j];?></td>
        </tr>
        <?php } ?>
	    <tr>
          <td>&nbsp;</td>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	      </tr>
      </table>
	  </div>
	</div>
	</td>
  </tr>
  


</table>
