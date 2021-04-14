	<?php //include ('../class/district.class.php');?>
	<link rel="stylesheet" href="../text_style.css" type="text/css" />
    <link rel="stylesheet" href="../css/jquery.treeview.css" />
	<link rel="stylesheet" href="../css/screen.css" />

    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="menu_estate.js" type="text/javascript"></script>

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



    <strong><img src="../images/Bcase.png" width="16" height="16" /> ESTATE</strong>
    <ul id="browser" class="filetree">
		<li id="home"><img src="../nav/file.gif" /> <strong><a href="home.php?id=estate">Response Rate</a></strong></li>
	  <li id="ageprofile"><img src="../nav/file.gif" /> <strong><a href="home.php?id=estate&sub=age_profile">Age Profile</a></strong></li>

        <li><img src="../nav/folder.gif" alt="folder" /> <strong>Survey Response</strong>
              <ul>
                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=owner">Types Ownership</a></li>
                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=size_estate">Size of Estates According To Ownership Types</a></li>
               <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=size_percentage">Distributions of Oil Palm Estate</a></li><li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=topography">Estate Topography</a></li>
                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=yield_fbb">Yield of FFB</a></li>
                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=yield_distribution">Yield Distribution</a></li>

              </ul>




     		<li><img src="../nav/folder.gif" /> <strong>Immature Cost
           <!-- <a href="home.php?id=estate&sub=imm">Immature Cost</a>-->
            </strong>
     		  <ul>
     		    <li><img src="../nav/folder.gif" alt="d" /> New Planting
     		      <ul>
     		        <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=new_planting&year=1">Malaysia</a></li>
   		            <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=new_planting&state=pm&year=1">Peninsular Malaysia</a>
   		              <ul>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_planting&state=jhr&year=1">Johor</a>						</li>
	                    <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_planting&state=kdh&year=1">Kedah</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_planting&state=kln&year=1">Kelantan</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_planting&state=mlk&year=1">Melaka</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_planting&state=n9&year=1">N. Sembilan</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_planting&state=phg&year=1">Pahang</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_planting&state=prk&year=1">Perak</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_planting&state=pls&year=1">Perlis</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_planting&state=pp&year=1">Pulau Pinang</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_planting&state=sgr&year=1">Selangor</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_planting&state=trg&year=1">Terengganu</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_planting&state=wp&year=1">Wilayah Persekutuan</a></li>
	                  </ul>
   		            </li>
     		        <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=new_planting&state=sbh&year=1">Sabah</a></li>
     		        <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=new_planting&state=swk&year=1">Sarawak</a></li>
     		      </ul>
     		    </li>
   		        <li><img src="../nav/folder.gif" alt="d" /> Replanting
   		          <ul>
   		            <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=new_replanting&year=1">Malaysia</a></li>
   		            <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&amp;sub=new_replanting&amp;year=1&amp;state=pm">Peninsular Malaysia</a>
   		              <ul>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_replanting&state=jhr&year=1">Johor</a></li>
	                    <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_replanting&state=kdh&year=1">Kedah</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_replanting&state=kln&year=1">Kelantan</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_replanting&state=mlk&year=1">Melaka</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_replanting&state=n9&year=1">N. Sembilan</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_replanting&state=phg&year=1">Pahang</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_replanting&state=prk&year=1">Perak</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_replanting&state=pls&year=1">Perlis</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_replanting&state=pp&year=1">Pulau Pinang</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_replanting&state=sgr&year=1">Selangor</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_replanting&state=trg&year=1">Terengganu</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_replanting&state=wp&year=1">Wilayah Persekutuan</a></li>
   		              </ul>
   		            </li>
   		            <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=new_replanting&state=sbh&year=1">Sabah</a></li>
   		            <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=new_replanting&state=swk&year=1">Sarawak</a></li>
	              </ul>
   		        </li>
     		    <li><img src="../nav/folder.gif" alt="d" /> Conversion
     		      <ul>
     		        <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=new_conversion&year=1">Malaysia</a></li>
     		        <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&amp;sub=new_conversion&amp;year=1&amp;state=pm">Peninsular Malaysia</a>
     		          <ul>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_conversion&state=jhr&year=1">Johor</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_conversion&state=kdh&year=1">Kedah</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_conversion&state=kln&year=1">Kelantan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_conversion&state=mlk&year=1">Melaka</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_conversion&state=n9&year=1">N. Sembilan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_conversion&state=phg&year=1">Pahang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_conversion&state=prk&year=1">Perak</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_conversion&state=pls&year=1">Perlis</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_conversion&state=pp&year=1">Pulau Pinang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_conversion&state=sgr&year=1">Selangor</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_conversion&state=trg&year=1">Terengganu</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=new_conversion&state=wp&year=1">Wilayah Persekutuan</a></li>
     		          </ul>
     		        </li>
     		        <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=new_conversion&state=sbh&year=1">Sabah</a></li>
     		        <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=new_conversion&state=swk&year=1">Sarawak</a></li>
   		          </ul>
     		    </li>
     		    <!--<li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=summary">Summary</a></li>-->
     		  </ul>
     		</li>
<li><img src="../nav/folder.gif" alt="folder" /> <strong>Mature Cost
<!--<a href="home.php?id=estate&sub=sum_upkeep">Mature Cost</a>-->
</strong>
<ul>
                <li><img src="../nav/folder.gif" /> Upkeep

                  <ul>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=upk">Malaysia</a></li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=upk&state=pm">Peninsular Malaysia
                      </a>
                      <ul>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=jhr">Johor</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=kdh">Kedah</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=kln">Kelantan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=mlk">Melaka</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=n9">N. Sembilan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=phg">Pahang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=prk">Perak</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=pls">Perlis</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=pp">Pulau Pinang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=sgr">Selangor</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=trg">Terengganu</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=wp">Wilayah Persekutuan</a></li>
     		          </ul>
                    </li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=upk&state=sbh">Sabah</a></li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=upk&state=swk">Sarawak</a></li>
					<li><img src="../nav/file.gif" alt="d" />Company Type
                      <ul>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=publicagencies">Public Agencies</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=cooperatives">Co-operatives</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=publiclimitedcompany">Public Limited Company</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=partnership">Partnership</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=solepropriertorship">Sole Propriertorship</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=upk&state=privatelimitedcompany">Private Limited Company</a></li>
     		          </ul>
                    </li>
                  </ul>
                </li>
		        <li><img src="../nav/folder.gif" /> Harvesting
		          <ul>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=harvest_all">Malaysia</a></li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=harvest_all&state=pm">Peninsular Malaysia</a>
                      <ul>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=jhr">Johor</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=kdh">Kedah</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=kln">Kelantan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=mlk">Melaka</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=n9">N. Sembilan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=phg">Pahang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=prk">Perak</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=pls">Perlis</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=pp">Pulau Pinang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=sgr">Selangor</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=trg">Terengganu</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=wp">Wilayah Persekutuan</a></li>
                      </ul>
                    </li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=harvest_all&state=sbh">Sabah</a></li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=harvest_all&state=swk">Sarawak</a></li>
					<li><img src="../nav/file.gif" alt="d" />Company Type
                      <ul>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=publicagencies">Public Agencies</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=cooperatives">Co-operatives</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=publiclimitedcompany">Public Limited Company</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=partnership">Partnership</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=solepropriertorship">Sole Propriertorship</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=harvest_all&state=privatelimitedcompany">Private Limited Company</a></li>
     		          </ul>
                    </li>
                  </ul>
		        </li>
        <li><img src="../nav/folder.gif" /> Transportation

  <ul>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=transportation_all">Malaysia</a></li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=transportation_all&state=pm">Peninsular Malaysia</a>
                      <ul>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=jhr">Johor</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=kdh">Kedah</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=kln">Kelantan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=mlk">Melaka</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=n9">N. Sembilan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=phg">Pahang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=prk">Perak</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=pls">Perlis</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=pp">Pulau Pinang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=sgr">Selangor</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=trg">Terengganu</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=wp">Wilayah Persekutuan</a></li>
     		          </ul>
                    </li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=transportation_all&state=sbh">Sabah</a></li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=transportation_all&state=swk">Sarawak</a></li>
					<li><img src="../nav/file.gif" alt="d" />Company Type
                      <ul>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=publicagencies">Public Agencies</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=cooperatives">Co-operatives</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=publiclimitedcompany">Public Limited Company</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=partnership">Partnership</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=solepropriertorship">Sole Propriertorship</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=transportation_all&state=privatelimitedcompany">Private Limited Company</a></li>
     		          </ul>
                    </li>
                  </ul>
                </li>







                <!--<li><img src="../nav/file.gif" /> <a href="home.php?id=estate&sub=mature_summary">Summary</a></li>-->
      </ul>
      </li>


      <li><img src="../nav/folder.gif" alt="folder" /> <strong>General Charges</strong>
              <ul>

                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=gc">Malaysia</a></li>
										<li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=gc_kos_lain">Other cost</a></li>

                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=gc&state=pm">Peninsular Malaysia
                      </a>
                      <ul>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=jhr">Johor</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=kdh">Kedah</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=kln">Kelantan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=mlk">Melaka</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=n9">N. Sembilan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=phg">Pahang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=prk">Perak</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=pls">Perlis</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=pp">Pulau Pinang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=sgr">Selangor</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=trg">Terengganu</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=wp">Wilayah Persekutuan</a></li>
     		          </ul>
                    </li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=gc&state=sbh">Sabah</a></li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=gc&state=swk">Sarawak</a></li>
					<li><img src="../nav/file.gif" alt="d" />Company Type
                      <ul>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=publicagencies">Public Agencies</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=cooperatives">Co-operatives</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=publiclimitedcompany">Public Limited Company</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=partnership">Partnership</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=solepropriertorship">Sole Propriertorship</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=privatelimitedcompany">Private Limited Company</a></li>
     		          </ul>
                    </li>
              </ul></li>
              <!--
        <li><img src="../nav/folder.gif" alt="folder" /><strong>FFB Production</strong>
        	<ul>

                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=gc">Malaysia</a></li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=gc&state=pm">Peninsular Malaysia
                      </a>
                      <ul>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=jhr">Johor</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=kdh">Kedah</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=kln">Kelantan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=mlk">Melaka</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=n9">N. Sembilan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=phg">Pahang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=prk">Perak</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=pls">Perlis</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=pp">Pulau Pinang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=sgr">Selangor</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=trg">Terengganu</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=gc&state=wp">Wilayah Persekutuan</a></li>
     		          </ul>
                    </li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=gc&state=sbh">Sabah</a></li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=gc&state=swk">Sarawak</a></li>

              </ul></li>-->

<li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=soiltype">Soil Type</a></li>
<li><img src="../nav/folder.gif" alt="folder" /> <strong>Summary</strong>
              <ul>




                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=summary">Cost to Maturity</a></li>

                <li><img src="../nav/folder.gif" /> <strong>Cost of FFB Production
                  </strong>
                  <ul>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=mature_summary">Malaysia</a></li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=mature_summary&state=pm">Peninsular Malaysia
                      </a>
                      <ul>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=mature_summary&state=jhr">Johor</a></li>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=mature_summary&state=kdh">Kedah</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=mature_summary&state=kln">Kelantan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=mature_summary&state=mlk">Melaka</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=mature_summary&state=n9">N. Sembilan</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=mature_summary&state=phg">Pahang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=mature_summary&state=prk">Perak</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=mature_summary&state=pls">Perlis</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=mature_summary&state=pp">Pulau Pinang</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=mature_summary&state=sgr">Selangor</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=mature_summary&state=trg">Terengganu</a></li>
     		            <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=estate&sub=mature_summary&state=wp">Wilayah Persekutuan</a></li>
     		          </ul>
                    </li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=mature_summary&state=sbh">Sabah</a></li>
                    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=estate&sub=mature_summary&state=swk">Sarawak</a></li>
                  </ul>
                </li>


      </ul>
            </li>
            </ul>

</div>
