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
    <strong><img src="../images/Bcase.png" width="16" height="16" /> Maintenance and Establishment</strong>
    <ul id="browser" class="filetree">
		<li><img src="../nav/folder.gif" /> <strong>1. New Planting</strong>
   		  <ul>
			<li><img src="../nav/folder.gif" /><a href="home.php?id=new_planting">Region</a>
            	<ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=new_planting&amp;region=1">Peninsular</a></li>
                </ul>
                <ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=new_planting&amp;region=3">Sabah</a></li>
                </ul>
                <ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=new_planting&amp;region=2">Sarawak</a></li>
                </ul>
            </li>
			<li><img src="../nav/file.gif" /><a href="home.php?id=new_planting_state">State</a></li>
            <li><img src="../nav/file.gif" /><a href="home.php?id=new_planting_company">Outliers Company</a></li>
            <li><img src="../nav/file.gif" /><a href="home.php?id=topografi">Topography</a></li>
			<li><img src="../nav/folder.gif" /><a href="home.php?id=new_planting_soil">Soil Type</a>
            	<ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=soil_new_plant&amp;type=coastal">Coastal</a></li>
              </ul>
                <ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=soil_new_plant&amp;type=Inland">Inland</a></li>
                </ul>
            </li>
		  </ul>
		</li>
<li><img src="../nav/folder.gif" />
			<strong>2. Replanting</strong>
<ul>
				<li><img src="../nav/folder.gif" /><a href="home.php?id=replanting">Region</a>
           	  <ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=replanting&amp;region=1">Peninsular</a></li>
                </ul>
                <ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=replanting&amp;region=3&amp;title=Replanting">Sabah</a></li>
                </ul>
                <ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=replanting&amp;region=2&amp;title=Replanting">Sarawak</a></li>
                </ul>
            </li>
        <li><img src="../nav/file.gif" /><a href="home.php?id=replanting_state">State</a></li>
        <li><img src="../nav/file.gif" /><a href="home.php?id=replanting_company&amp;title=Replanting">Outliers Company</a></li>
        <li><img src="../nav/file.gif" /><a href="home.php?id=soil_new_plant&amp;type=Coastal">Topography</a><a href="home.php?id=po4"></a></li>
<li><img src="../nav/folder.gif" /><a href="home.php?id=new_planting_soil">Soil Type</a>
            	<ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=soil_replant&amp;type=Coastal">Coastal</a></li>
          </ul>
                <ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=soil_replant&amp;type=Inland">Inland</a></li>
          </ul>
            </li>
	  </ul>
	</li>
<?php /*?><li class="closed">this is closed! <img src="../nav/folder.gif" /><?php */?>
        <li class="filetree"><img src="../nav/folder.gif" />
          <strong>3. Conversion</strong>
<ul>
				<li><img src="../nav/folder.gif" /><a href="home.php?id=conversion">Region</a>
           	  <ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=conversion&amp;region=1">Peninsular</a></li>
                </ul>
                <ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=conversion&amp;region=3">Sabah</a></li>
                </ul>
                <ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=conversion&amp;region=2">Sarawak</a></li>
                </ul>
            </li>
        <li><img src="../nav/file.gif" /><a href="home.php?id=conversion_state">State</a></li>
        <li><img src="../nav/file.gif" /><a href="home.php?id=conversion_company">Outliers Company</a></li>
        <li><img src="../nav/file.gif" /><a href="home.php?id=topografi&amp;title=Conversion">Topography</a><a href="home.php?id=po1_2"></a></li>
  <li><img src="../nav/folder.gif" /><a href="home.php?id=new_planting_soil">Soil Type</a>
            	<ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=soil_conversion&amp;type=Coastal">Coastal</a></li>
          </ul>
                <ul>
                	<li><img src="../nav/file.gif" /><a href="home.php?id=soil_conversion&amp;type=Inland">Inland</a></li>
          </ul>
            </li>
		  </ul>
		</li>
<!--		<li><img src="../nav/file.gif" /></li>-->
	</ul>
		
</div>