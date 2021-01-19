<?php include ('../class/district.class.php');?>
	<link rel="stylesheet" href="../text_style.css" type="text/css" />
    <link rel="stylesheet" href="../css/jquery.treeview.css" />
	<link rel="stylesheet" href="../css/screen.css" />
	
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/jquery.cookie.js" type="text/javascript"></script>
	<script src="../js/jquery.treeview.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		$(function() {
			$("#browser").treeview({
				animated: "slow",
				collapsed: true,
				 persist: "cookie"
			});
		});
	</script>
<div id="main">
    <strong><img src="../images/Bcase.png" width="16" height="16" /> Labour &amp; Mechanization</strong>
    <ul id="browser" class="filetree">
		<li><img src="../nav/folder.gif" /> <strong>Estate Labour</strong>
          <ul>
					<li><img src="../nav/file.gif" /> <a href="home.php?id=labour">Malaysia</a></li>
	  <li><img src="../nav/file.gif" /> <a href="home.php?id=labour&amp;state=pm">Peninsular Malaysia</a>
<ul>
   		               
					    <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=labour&amp;state=jhr">Johor</a></li>
						
						
  <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=labour&amp;state=kdh">Kedah</a></li>
  <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=labour&amp;state=kln">Kelantan</a></li>
  <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=labour&amp;state=mlk">Melaka</a></li>
  <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=labour&amp;state=n9">N. Sembilan</a></li>
  <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=labour&amp;state=phg">Pahang</a></li>
  <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=labour&amp;state=prk">Perak</a></li>
  <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=labour&amp;state=pls">Perlis</a></li>
  <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=labour&amp;state=pp">Pulau Pinang</a></li>
  <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=labour&amp;state=sgr">Selangor</a></li>
  <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=labour&amp;state=trg">Terengganu</a></li>
  <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=labour&amp;state=wp">Wilayah Persekutuan</a></li>
          </ul>
					</li>
	  <li><img src="../nav/file.gif" /> <a href="home.php?id=labour&amp;state=sbh">Sabah</a></li>
	  <li><img src="../nav/file.gif" /> <a href="home.php?id=labour&amp;state=swk">Sarawak</a></li>
			<li><img src="../nav/file.gif" /> <a href="home.php?id=labour&amp;sub=manpower">Total Manpower</a></li>
          </ul>
		</li>
        
    <li><img src="../nav/folder.gif" /> <strong>Mechanization</strong><ul><li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=labour&amp;sub=mecha">Summary</a></li></ul>
	  </li>   
      <!--		<li><img src="../nav/file.gif" /></li>-->
	</ul>
		
</div>