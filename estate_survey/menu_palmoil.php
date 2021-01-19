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
    <strong><img src="../images/Bcase.png" width="16" height="16" /> RESPONDEN ESTET</strong>
    <ul id="browser" class="filetree">
<li><img src="../nav/folder.gif" />
			<strong>Kos Belum Matang</strong>
			<ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=po1year&pol=<? echo $_GET['pol']; ?>&po2=<? echo $_GET['po2']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page')">Penanaman Semula</a>
				  <?  if($_GET['po3']=="true") {?>
                  <img src="../images/accepted_48.png" alt="Saved" width="16" height="16" />
                  <? }else if($_GET['po3']=="false") { ?>
                  <img src="../images/warning_16.png" width="16" height="16" alt="Data not complete!" />
                  <? } ?>
</li>
                <li><img src="../nav/file.gif" /><a href="home.php?id=po2year&pol=<? echo $_GET['pol']; ?>&po2=<? echo $_GET['po2']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page')">Penanaman Baru</a>
                  <?  if($_GET['po4']=="true") {?>
                  <img src="../images/accepted_48.png" alt="Saved" width="16" height="16" />
                  <? }else if($_GET['po4']=="false") { ?>
                  <img src="../images/warning_16.png" width="16" height="16" alt="Data not complete!" />
                  <? } ?>
</li>
                <li><img src="../nav/file.gif" /><a href="home.php?id=po3year&pol=<? echo $_GET['pol']; ?>&po2=<? echo $_GET['po2']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page')">Penukaran</a>
                  <?  if($_GET['po5']=="true") {?>
                  <img src="../images/accepted_48.png" alt="Saved" width="16" height="16" />
                  <? }else if($_GET['po5']=="false") { ?>
                  <img src="../images/warning_16.png" width="16" height="16" alt="Data not complete!" />
                  <? } ?>
</li>
	  </ul>
	</li>
<?php /*?><li class="closed">this is closed! <img src="../nav/folder.gif" /><?php */?>
        <li class="filetree"><img src="../nav/folder.gif" />
          <strong>Kos Matang</strong><ul><li>
           	  <img src="../nav/file.gif" /><a href="home.php?id=po3_2&penjagaan=true&pol=<? echo $_GET['pol']; ?>&po2=<? echo $_GET['po2']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page')">Penjagaan</a>            </li>
            <li>
            	<img src="../nav/file.gif" /><a href="home.php?id=po3_2&pembajaan=true&pol=<? echo $_GET['pol']; ?>&po2=<? echo $_GET['po2']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page')">Pembajaan</a>            </li>
            <li>
            	<img src="../nav/file.gif" /><a href="home.php?id=po3_2&penuaian=true&pol=<? echo $_GET['pol']; ?>&po2=<? echo $_GET['po2']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page')">Penuaian BTS</a>            </li>
            <li>
            	<img src="../nav/file.gif" /><a href="home.php?id=po3_2&pengangkutan=true&pol=<? echo $_GET['pol']; ?>&po2=<? echo $_GET['po2']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=<? echo $_GET['po8']; ?>" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page')">Pengangkutan BTS</a>            </li>
		  </ul>
	  </li>
      <li class="filetree"><img src="../nav/folder.gif" />
      <strong><a href="home.php?id=po4_1&amp;pol=<? echo $_GET['pol']; ?>&amp;po2=<? echo $_GET['po2']; ?>&amp;po3=<? echo $_GET['po3']; ?>&amp;po4=<? echo $_GET['po5']; ?>&amp;po6=<? echo $_GET['po8']; ?>&amp;po7=<? echo $_GET['po7']; ?>&amp;po8=<? echo $_GET['po8']; ?>">Maklumat Kos Am</a></strong></li>
      <li><img src="../nav/folder.gif" /> <strong><a href="#">Ringkasan Kos</a></strong></li>
      <!--		<li><img src="../nav/file.gif" /></li>-->
  </ul>
		
</div>