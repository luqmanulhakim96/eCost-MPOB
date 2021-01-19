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
				title:"Confirm delete",
				modal:true,
				autoOpen:false,
				buttons:{
					"Proceed":function() {
						window.location = "home.php?id=forum&message=true&delete=true";
					},
					"Cancel":function() {
						$(this).dialog('close');
					}
				}
			});
			
			$("#del1")
			.click(function() {
				$("#dialog").html("<p>Are you sure to delete this message?</p>");
				$("#dialog").dialog('open');
			});
		});
    </script>    
<div id="dialog">
</div>
    <strong><?=setstring ( 'mal', 'Peti Masuk', 'en', 'Inbox'); ?></strong><br>
	<br>
<table width="100%" height="309" border="0" cellpadding="3" cellspacing="0">
  <tr>
    <td width="90%" valign="top"><br />
      <table width="100%" border="0" cellspacing="0">
        <tr>
          <td width="3%" height="45" background="images/fon04_1.gif"><div align="center">
            <label></label>
          </div></td>
          <td width="14%" background="images/fon04_1.gif"><?=setstring ( 'mal', 'Penghantar', 'en', 'Sender'); ?></td>
          <td width="51%" background="images/fon04_1.gif"><div align="left"><?=setstring ( 'mal', 'Perkara', 'en', 'Subject'); ?></div></td>
          <td width="17%" background="images/fon04_1.gif"><?=setstring ( 'mal', 'Masa', 'en', 'Time'); ?></td>
          <td width="15%" background="images/fon04_1.gif"><div align="center"><?=setstring ( 'mal', 'Operasi', 'en', 'Operation'); ?></div></td>
        </tr>
        <?php 
		if(!isset($_GET['delete'])) {
		?>
        <tr>
          <td bgcolor="#CCCCCC"><div align="center">
            <label>
            <input type="checkbox" name="checkbox2" id="checkbox2">
            </label>
          </div></td>
          <td bgcolor="#CCCCCC">System Admin</td>
          <td bgcolor="#CCCCCC"><div align="left"><a href="home.php?id=forum&amp;message=true&amp;read=true">Welcome to E-Cost System.</a></div></td>
          <td bordercolor="#FFFF99" bgcolor="#CCCCCC">12:47:50, <?=setstring ( 'mal', 'Hari ini', 'en', 'Today'); ?></td>
          <td bordercolor="#FFFF99" bgcolor="#CCCCCC"><div align="center">&nbsp;&nbsp;<img id="del1" src="images/001_05.gif" alt="Delete" width="16" height="16" border="0" style="cursor:pointer" title="Delete" />&nbsp;&nbsp;</div></td>
        </tr>
        <?php
		}
		?>
        <tr>
          <td bgcolor="#CCCCCC"><div align="left">
            <label></label>
            <label>
            <div align="center">
              <input type="checkbox" name="checkbox3" id="checkbox3">
            </div>
            </label>
          </div></td>
          <td bgcolor="#CCCCCC">System Admin</td>
          <td bgcolor="#CCCCCC"><div align="left"><a href="home.php?id=forum&amp;message=true&amp;read=true">Admin Message</a></div></td>
          <td bgcolor="#CCCCCC">0140:30, Nov 15, 2009</td>
          <td bgcolor="#CCCCCC"><div align="center">&nbsp;&nbsp;<img title="Reply" style="cursor:pointer" src="images/001_05.gif" alt="Delete" width="16" height="16" />&nbsp;&nbsp;</div></td>
        </tr>
        <tr>
          <td colspan="5"><label>
          </label>
          <a href="home.php?id=forum&amp;message=true&amp;compose=true"><img src="images/Sent-Mail-icon-48.png" width="25" height="25" border="0"><?=setstring ( 'mal', 'Karang', 'en', 'Compose'); ?></a></td>
        </tr>
    </table></td></tr>
</table>
