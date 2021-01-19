	<link rel="stylesheet" href="../css/jquery.treeview.css" />
	<link rel="stylesheet" href="../css/screen.css" />
	
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/jquery.cookie.js" type="text/javascript"></script>
	<script src="../js/jquery.treeview.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		$(function() {
			$("#browser").treeview({collapsed: true});
		});
	</script>
<div id="main">
    <strong><img src="../images/Bcase.png" width="16" height="16" /> Fresh Fruit Bunch </strong>
    <ul id="browser" class="filetree">
		<li><img src="../nav/folder.gif" /> <strong>1. Cost to Mature </strong>
   		  <ul>
			<li><img src="../nav/file.gif" /><a href="home.php?id=po1_1">Yearly</a></li>
		  </ul>
	  </li>
<li><img src="../nav/folder.gif" />
			<strong>2. FFB Production</strong>
	        <ul>
		<li><img src="../nav/file.gif" /><a href="home.php?id=po1year">Malaysia</a></li>
        <li><img src="../nav/file.gif" /><a href="home.php?id=po1year">Province</a></li>
	  </ul>
	</li>
		<?php /*?><li class="closed">this is closed! <img src="../nav/folder.gif" /><?php */?>
        <li class="filetree"><img src="../nav/folder.gif" />
          <strong>3. FFB Sales Processing</strong>
		  <ul>
			  <li><img src="../nav/file.gif" /><a href="home.php?id=po3_1">Peninsular Malaysia</a></li>
              <li><img src="../nav/file.gif" /><a href="home.php?id=po3_1">Sabah</a></li>
              <li><img src="../nav/file.gif" /><a href="home.php?id=po3_1">Sarawak</a></li>
		  </ul>
	  </li>
      <li class="filetree"><img src="../nav/folder.gif" />
          <strong>4. Total Cost Comparison</strong>
		  <ul>
              <li><img src="../nav/file.gif" /><a href="home.php?id=po3_1">FFB and CPO</a></li>
		  </ul>
	  </li>
<!--		<li><img src="../nav/file.gif" /></li>-->
	</ul>
		
</div>