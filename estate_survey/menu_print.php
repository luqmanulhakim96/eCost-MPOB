	<link rel="stylesheet" href="../css/jquery.treeview.css" />
	<link rel="stylesheet" href="../css/screen.css" />
	
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
		<li><img src="../nav/folder.gif" /> <strong>Maklumat Am </strong>
          <ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=maklumat_syarikat" >Maklumat Syarikat</a>
                <?  if($_GET['pol']=="true") {?>
                <img src="../images/accepted_48.png" alt="Saved" width="16" height="16" />
                <? }else if($_GET['pol']=="false") { ?>
                <img src="../images/warning_16.png" width="16" height="16" alt="Data not complete!" />
                <? } ?>
				</li>
				<li><img src="../nav/file.gif" alt="s" /><a href="home.php?id=maklumat_pekerja" >Maklumat Pekerja</a></li>
                <li><img src="../nav/file.gif" alt="ss" /><a href="home.php?id=maklumat_jentera" >Maklumat Jentera</a></li>
          </ul>
	</li>
<li><img src="../nav/folder.gif" />
			<strong>Kos Pra-Matang</strong>
			<ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=pra_pertama" >Tahun Pertama</a>
				  <?  if($_GET['po3']=="true") {?>
                  <img src="../images/accepted_48.png" alt="Saved" width="16" height="16" />
                  <? }else if($_GET['po3']=="false") { ?>
                  <img src="../images/warning_16.png" width="16" height="16" alt="Data not complete!" />
                  <? } ?>
</li>
                <li><img src="../nav/file.gif" /><a href="home.php?id=pra_kedua" >Tahun Kedua</a>
                  <?  if($_GET['po4']=="true") {?>
                  <img src="../images/accepted_48.png" alt="Saved" width="16" height="16" />
                  <? }else if($_GET['po4']=="false") { ?>
                  <img src="../images/warning_16.png" width="16" height="16" alt="Data not complete!" />
                  <? } ?>
</li>
                <li><img src="../nav/file.gif" /><a href="home.php?id=pra_ketiga" >Tahun Ketiga</a>
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
          <strong>Kos Matang</strong>
          <ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=matang_bts">Penghasilan BTS</a>
				  <?  if($_GET['po6']=="true") {?>
                  <img src="../images/accepted_48.png" alt="Saved" width="16" height="16" />
                  <? }else if($_GET['po6']=="false") { ?>
                  <img src="../images/warning_16.png" width="16" height="16" alt="Data not complete!" />
                  <? } ?>
</li>
			<li>
            	<img src="../nav/file.gif" /><a href="home.php?id=matang_jaga" >Penjagaan</a>            </li>
            <li>
            	<img src="../nav/file.gif" /><a href="home.php?id=matang_baja" >Pembajaan</a>            </li>
            <li>
            	<img src="../nav/file.gif" /><a href="home.php?id=matang_tuai" >Penuaian Pokok</a>            </li>
            <li>
            	<img src="../nav/file.gif" /><a href="home.php?id=matang_angkut" >Pengangkutan BTS</a>            </li>
		  </ul>
		</li>
      <li class="filetree"><img src="../nav/folder.gif" />
        <strong>Maklumat Kos Am</strong>
        <ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=butiran_kos">Butiran-butiran Kos</a>
				  <?  if($_GET['po8']=="true") {?>
                  <img src="../images/accepted_48.png" alt="Saved" width="16" height="16" />
                  <? }else if($_GET['po8']=="false") { ?>
                  <img src="../images/warning_16.png" width="16" height="16" alt="Data not complete!" />
                  <? } ?>
</li>
	    </ul>
		</li>
<!--		<li><img src="../nav/file.gif" /></li>-->
	</ul>
		
</div>