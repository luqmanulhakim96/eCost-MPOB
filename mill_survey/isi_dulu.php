	<script type="text/javascript" src="../jquery-1.3.2.js"></script>
	<link type="text/css" href="../css/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
	<script type="text/javascript" src="../ui/ui.core.js"></script>
	<script type="text/javascript" src="../ui/ui.draggable.js"></script>
	<script type="text/javascript" src="../ui/ui.resizable.js"></script>
	<script type="text/javascript" src="../ui/ui.dialog.js"></script>
	<script type="text/javascript" src="../ui/effects.core.js"></script>
	<script type="text/javascript" src="../ui/effects.highlight.js"></script>
	<script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>
	<script type="text/javascript">
		$(function() {
			$("#dialog_box").dialog({
				autoOpen:true,
				modal:true,
				title:"Login ke e-Cost Mill",
				close:function() {
					window.location.href = "home.php?id=home&secondtime";
				},
				buttons:{
					"OK":function() {
						$(this).dialog('close');
					}
				},
				width:"50%",
				draggable:false,
				resizable:false
			});
		});
	</script>
    <div id="dialog_box">
    <table width="100%" border="0">
      <tr>
        <td width="24%"><img src="../logo.png" width="179" height="61" /></td>
        <td width="76%"><h3 style="font-size:14px;">Selamat Datang ke Sistem e-COST.</h3>
        <p style="font-size:12px;"> Sila Kemaskini Maklumat Anda Sebelum Menggunakan Sistem. </p></td>
      </tr>
    </table>
    <h3 style="font-size:14px;">&nbsp;</h3>
    </div>