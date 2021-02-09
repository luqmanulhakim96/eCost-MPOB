	<script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>
	<link type="text/css" href="../themes/base/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="../jquery-1.3.2.js"></script>
	<script type="text/javascript" src="../ui/ui.core.js"></script>
	<script type="text/javascript" src="../ui/ui.draggable.js"></script>
	<script type="text/javascript" src="../ui/ui.resizable.js"></script>
	<script type="text/javascript" src="../ui/ui.dialog.js"></script>
	<script type="text/javascript" src="../ui/effects.core.js"></script>
	<script type="text/javascript" src="../ui/effects.highlight.js"></script>
	<script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>
	<script type="text/javascript">

	$(document).ready(function() {
		$("#dialog").dialog({
			bgiframe: true,
			autoOpen: false,
			modal: true,
			title:"Discard message",
			buttons: {
				'Yes': function() {
					$(this).dialog('close');
					window.location = "home.php?id=forum&message=true";
				},
				'Cancel': function() {
					$(this).dialog('close');
				}
			}
		});

		$('#send').click(function() {
			$("#dialogTxt").html(<?=setstring ( 'mal', '"Mesej berjaya dihantar."', 'en', 'Message sent success.'); ?>);
			$("#dialog").dialog('option','buttons',{
				"OK":function() {
					window.location="home.php?id=forum&message=true";
				}
			});
			$("#dialog").dialog('option','title','Operasi Berjaya');
			$("#dialog").dialog("open");
		})
		.hover(
			function(){
				$(this).addClass("ui-state-hover");
			},
			function(){
				$(this).removeClass("ui-state-hover");
			}
		)
		.mousedown(
			function(){
				$(this).addClass("ui-state-active");
			}
		)
		.mouseup(
			function(){
				$(this).removeClass("ui-state-active");
			}
		);

		$('#save').click(function() {
			$("#dialog").dialog('option','title','Operasi Berjaya');
			$("#dialogTxt").html("Mesej berjaya disimpan");
			$("#dialog").dialog('option','buttons',{
				"OK":function() {
					window.location="home.php?id=forum&message=true";
				}
			});
			$("#dialog").dialog("open");
		})
		.hover(
			function(){
				$(this).addClass("ui-state-hover");
			},
			function(){
				$(this).removeClass("ui-state-hover");
			}
		)
		.mousedown(
			function(){
				$(this).addClass("ui-state-active");
			}
		)
		.mouseup(
			function(){
				$(this).removeClass("ui-state-active");
			}
		);

		$('#discard')
		.click(
			function() {
				$('#dialog').dialog('open');
			}
		)
		.hover(
			function(){
				$(this).addClass("ui-state-hover");
			},
			function(){
				$(this).removeClass("ui-state-hover");
			}
		)
		.mousedown(
			function(){
				$(this).addClass("ui-state-active");
			}
		)
		.mouseup(
			function(){
				$(this).removeClass("ui-state-active");
			}
		);
	});

	</script>
    <style type="text/css">
<!--
.style2 {color: #000000; font-weight: bold; }
-->
    </style>
    <div id="dialog">
	<p id="dialogTxt">
    	<?=setstring ( 'mal', 'Anda pasti?', 'en', 'Are you sure?'); ?>
    </p>
</div>
    <strong><?=setstring ( 'mal', 'Karang Mesej', 'en', 'Compose Message'); ?></strong><br>
	<br>
<table width="100%" height="309" border="0" cellpadding="3" cellspacing="0">
  <tr>
    <td width="913" valign="top"><table width="100%" border="0" cellpadding="0" style="border:1px solid #CCCCCC;">
      <tr>
        <td colspan="4">
          <button id="send" class="ui-button ui-state-default ui-corner-all"><?=setstring ( 'mal', 'Hantar', 'en', 'Send'); ?></button>
          <button id="save" class="ui-button ui-state-default ui-corner-all"><?=setstring ( 'mal', 'Simpan', 'en', 'Save'); ?></button>
          <button id="discard" class="ui-button ui-state-default ui-corner-all"><?=setstring ( 'mal', 'Buang', 'en', 'Discard'); ?></button>        </td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left" class="style2"><?=setstring ( 'mal', 'Kepada', 'en', 'To'); ?></div></td>
        <td><span class="style2">:</span></td>
        <td colspan="2"><label>
          <input name="textfield3" type="text" id="textfield3" value="admin@MPOB" size="50" disabled="disabled" />
        </label></td>
      </tr>

      <tr>
        <td width="9%"><div align="left" class="style2"><?=setstring ( 'mal', 'Subjek', 'en', 'Subject'); ?></div></td>
        <td width="1%"><span class="style2">:</span></td>
        <td width="90%" colspan="2"><label>
          <input name="textfield32" type="text" id="textfield32" value=<?=setstring ( 'mal', '"Pemasangan Sistem E-COST"', 'en', 'Installation of E-Cost system'); ?> size="50" />
        </label></td>
      </tr>
      <tr valign="top">
        <td>
          <div align="left" class="style2"><?=setstring ( 'mal', 'Butiran', 'en', 'Details'); ?></div></td>
        <td><span class="style2">:</span></td>
        <td><textarea name="textfield2" cols="60" rows="6" id="textfield2"><?=setstring ( 'mal', 'Sistem E-COST menawarkan fungsi-fungsi yang lebih mantap bagi membantu pengguna sistem ini bekerja dengan lebih efektif.', 'en', 'E-Cost system provides outstanding function to aid user to improve the efficiency'); ?></textarea></td>
      </tr>

    </table>
    <br /></td>
  </tr>
</table>
