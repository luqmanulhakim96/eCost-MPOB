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
    <strong><img src="../images/Bcase.png" width="16" height="16" /> RESPONDEN KILANG	</strong>
	<ul id="browser" class="filetree">
		<li><img src="../nav/folder.gif" /> <strong>1. Maklumat Am</strong>
		  <ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=maklumat_syarikat" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page')">a - e</a></li>
		  </ul>
	  </li>
<li><img src="../nav/folder.gif" />
	  <strong>2. Kos Pemprosesan</strong>
			<ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=print_borang&amp;cpo2_1" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page')">2.1</a></li>
	  </ul>
	  </li>
<?php /*?><li class="closed">this is closed! <img src="../nav/folder.gif" /><?php */?>
        <li class="filetree"><img src="../nav/folder.gif" />
          <strong>3. Kos-Kos Lain</strong>
          <ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=print_borang&amp;cpo3_1" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page \n Click Cancel Back')">3.1</a></li>
		  </ul>
		</li>
      <li class="filetree"><img src="../nav/folder.gif" />
        <strong>4. BTS Diproses Pada 2008</strong>
        <ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=print_borang&amp;cpo4_1" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page')">4.1</a></li>
		</ul>
	  </li>
<!--		<li><img src="../nav/file.gif" /></li>-->
	</ul>
		
</div>