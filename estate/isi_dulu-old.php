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
				title:"<?=setstring ( 'mal', 'Login ke E-COST Estet', 'en', 'Login to E-COST Estate'); ?>",
				close:function() {
					window.location.href = "home.php?id=";
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
    <h3>
    <?=setstring ( 'mal', 'Sila Kemaskini Maklumat Anda', 'en', 'Please update your information'); ?>
    </h3>
    <p>

        <?=setstring ( 'mal', 'Selamat Datang Ke Sistem E-COST! Sila Kemaskini Maklumat Anda Sebelum Menggunakan Sistem.', 'en', 'Welcome to E-COST System! Please update your details information before proceed'); ?>
    </p>
    </div>
