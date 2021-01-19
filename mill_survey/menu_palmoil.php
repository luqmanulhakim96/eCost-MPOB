	<link rel="stylesheet" href="../css/jquery.treeview.css" />
	<link rel="stylesheet" href="../css/screen.css" />
	
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/jquery.cookie.js" type="text/javascript"></script>
	<script src="../js/jquery.treeview.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		$(function() {
			$("#browser").treeview();
		});
	</script>
<div id="main">
    <strong><img src="../images/Bcase.png" width="16" height="16" /> RESPONDEN KILANG</strong><ul id="browser" class="filetree">
      <li><img src="../nav/folder.gif" />
	  <strong> Maklumat Kos</strong>
			<ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=cpo2_1" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page')">Kos Pemprosesan</a></li>
	            <li><img src="../nav/file.gif" alt="ss" /><a href="home.php?id=cpo3_1" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page \n Click Cancel Back')">Kos-Kos Lain &amp; Harga Isirong</a></li>
		</ul>
	  </li>
<?php /*?><li class="closed">this is closed! <img src="../nav/folder.gif" /><?php */?>
<li class="filetree"><img src="../nav/folder.gif" />
  <strong><a href="home.php?id=cpo4_1">Ringkasan Kos</a></strong></li>
<!--		<li><img src="../nav/file.gif" /></li>-->
	</ul>
		
</div>