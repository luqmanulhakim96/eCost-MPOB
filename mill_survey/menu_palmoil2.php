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
    <strong><img src="../images/Bcase.png" width="16" height="16" /> ESTATE RESPONDENTS ONLY</strong>
	<ul id="browser" class="filetree">
		<li><img src="../nav/folder.gif" /> <strong>1. General Information </strong>
          <ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=po1_1">1.1 - 1.7</a></li>
			<li><img src="../nav/file.gif" /><a href="home.php?id=po1_2">1.8 - 1.9</a></li>
		  </ul>
		</li>
<li><img src="../nav/folder.gif" />
			<strong>2. Immature Area Information </strong>
			<ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=po1year">First Year</a></li>
                <li><img src="../nav/file.gif" /><a href="home.php?id=po2year">Second Year</a></li>
                <li><img src="../nav/file.gif" /><a href="home.php?id=po3year">Third Year</a></li>
	  </ul>
		</li>
<?php /*?><li class="closed">this is closed! <img src="../nav/folder.gif" /><?php */?>
        <li class="filetree"><img src="../nav/folder.gif" />
          <strong>3. Mature Area Information</strong>
<ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=po3_1">3.1 - 3.2</a></li>
              <li><img src="../nav/file.gif" /><a href="home.php?id=po3_2" onclick="return confirm('Sila pastikan anda telah menyimpan transaksi ini sebelum ke halaman lain \n Please save your survey before go to another page')">3.3</a></li>
		  </ul>
		</li>
      <li class="filetree"><img src="../nav/folder.gif" />
        <strong>4. General Cost Information</strong>
<ul>
				<li><img src="../nav/file.gif" /><a href="home.php?id=po4_1">4.1</a></li>
		   </ul>
		</li>
<!--		<li><img src="../nav/file.gif" /></li>-->
	</ul>
		
</div>