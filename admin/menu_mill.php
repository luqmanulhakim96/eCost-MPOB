	<?php include ('../class/district.class.php');?>

	<link rel="stylesheet" href="../text_style.css" type="text/css" />
    <link rel="stylesheet" href="../css/jquery.treeview.css" />
	<link rel="stylesheet" href="../css/screen.css" />
	

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
    <strong><img src="../images/Bcase.png" width="16" height="16" /> MILL</strong>
    <ul id="browser" class="filetree">
	  <li><img src="../nav/file.gif" /> <strong><a href="home.php?id=adm_mill">Response Rate</a></strong></li>
       
       
       
       
       
       <li><img src="../nav/folder.gif" /> <strong>Survey Response</strong>        
     		  <ul>
     		    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=mill_owner">Mill Ownership</a></li>
     		    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=mill_process_capacity">Mill Processing Capacity</a></li>
     		    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=cpo_output_mills">CPO Output</a></li>
                <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=cpo_output_mills_size">CPO Output by Size</a></li>
     		    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=mill_integration">Mill Integration</a></li>
				<li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=mill_oilextraction">OER and CPO Yield</a></li>
				<li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=kernel_credit">Kernel Credit</a></li>
   		      </ul>
	  </li>
       
       
        
<li><img src="../nav/folder.gif" /> <strong>Processing Cost</strong>        
     		  <ul>
     		    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&amp;sub=all_process_cost">Malaysia</a></li>
     		    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=all_process_cost&area=Peninsular Malaysia">Peninsular Malaysia</a>
				<ul>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_process_cost&state=jhr">Johor</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_process_cost&state=kdh">Kedah</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_process_cost&state=kln">Kelantan</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_process_cost&state=mlk">Melaka</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_process_cost&state=n9">N. Sembilan</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_process_cost&state=phg">Pahang</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_process_cost&state=prk">Perak</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_process_cost&state=pls">Perlis</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_process_cost&state=pp">Pulau Pinang</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_process_cost&state=sgr">Selangor</a></li>
      <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_process_cost&state=trg">Terengganu</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_process_cost&state=wp">Wilayah Persekutuan</a></li>
                  </ul>
				</li>
     		    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=all_process_cost&state=sbh">Sabah</a></li>
	      <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=all_process_cost&state=swk">Sarawak</a></li>
      </ul>
	  </li> 
      
      <li><img src="../nav/folder.gif" /> <strong>Other Cost</strong>        
     		  <ul>
     		    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&amp;sub=all_other_cost">Malaysia</a></li>
     		    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=all_other_cost&area=Peninsular Malaysia">Peninsular Malaysia</a>
				<ul>
   		                <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_other_cost&state=jhr">Johor</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_other_cost&state=kdh">Kedah</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_other_cost&state=kln">Kelantan</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_other_cost&state=mlk">Melaka</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_other_cost&state=n9">N. Sembilan</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_other_cost&state=phg">Pahang</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_other_cost&state=prk">Perak</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_other_cost&state=pls">Perlis</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_other_cost&state=pp">Pulau Pinang</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_other_cost&state=sgr">Selangor</a></li>
      <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_other_cost&state=trg">Terengganu</a></li>
              <li><img src="../nav/file.gif" alt="d" /> <a href="home.php?id=adm_mill&sub=all_other_cost&state=wp">Wilayah Persekutuan</a></li>
                  </ul>
				</li>
     		    <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=all_other_cost&state=sbh">Sabah</a></li>
	      <li><img src="../nav/file.gif" alt="d" /><a href="home.php?id=adm_mill&sub=all_other_cost&state=swk">Sarawak</a></li>
      </ul>
	  </li>   

      
	</ul>
		
</div>
