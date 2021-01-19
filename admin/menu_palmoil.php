<?php
session_start();

if ($_SESSION['type'] <> "admin")
    header("location:../logout.php");
?>
<link rel="stylesheet" href="../css/jquery.treeview.css" />
<link rel="stylesheet" href="../css/screen.css" />
<script src="../jquery-1.3.2.js" type="text/javascript"></script>
<script src="../js/jquery.treeview.js" type="text/javascript"></script>
<script src="../js/jquery.cookie.js" type="text/javascript"></script>
<link type="text/css" media="screen" rel="stylesheet" href="js/colorbox/colorbox.css" />
<script type="text/javascript" src="js/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript">
    $(function () {
        $("#browser").treeview({
            animated: "slow",
            collapsed: true,
            persist: "cookie"
        });
    });
</script>
<div id="main">
    <ul id="browser" class="filetree treeview">
        <img src="../images/Bcase.png" width="16" height="16" /> <strong> USER SETTINGS</strong>
        <li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=password">Change Password</a></li>
        <li class="filetree last"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=user">Add User</a></li>
    </ul>
    <ul id="browser" class="filetree treeview">
        <img src="../images/Bcase.png" width="16" height="16" /> <strong> PAGE CONTENT CONFIGURATION</strong>
        <li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=people_set">Contact Person</a></li>
        <li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=announce_set">Announcement Settings</a></li>
        <li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=settingonoff">On / Off Annoucemnet</a></li>
        <li class="filetree"><img src="../nav/file.gif" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=upfile">Upload File</a></li>
        <li class="filetree last"><img src="../nav/file.gif" alt="sss " />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=help">FAQs</a></li>
    </ul>
    <ul id="browser" class="filetree treeview">
        <img src="../images/Bcase.png" width="16" height="16" /> <strong> QUESTIONNAIRE SETTINGS</strong>
        <li class="filetree"><img src="../nav/file.gif" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=range">Range Setting</a></li>
        <li class="filetree"><img src="../nav/file.gif" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=period">Period Survey</a></li>
    </ul>
    <ul id="browser" class="filetree treeview">
        <img src="../images/Bcase.png" width="16" height="16" /> <strong> ESTATE DATA</strong>
        <li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=allestate">Active Estate</a></li>
        <li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=esub_estate">Check List  for Immature Data</a></li>
		<li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=esub_comparison">Cost Comparison</a></li>
        <!--<li class="filetree last"><img src="../nav/file.gif" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=esub_ffb">FFB Production</a></li>-->
    </ul>
    <ul id="browser" class="filetree treeview">
        <img src="../images/Bcase.png" width="16" height="16" /> <strong> MILL DATA</strong>
        <li class="filetree last"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=esub_mill">Active Mill</a></li>
    </ul>
    <ul id="browser" class="filetree treeview">
        <img src="../images/Bcase.png" width="16" height="16" /> <strong>UPLOAD DATA NEXT YEAR</strong>
        <li class="filetree last"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=admin_upload_esub_new_year">Duplicate e-SUB for New Year</a></li>
        <li class="filetree last"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=admin_upload_newplanting">New Planting</a></li>
        <li class="filetree last"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=admin_upload_replanting">Replanting</a></li>
        <li class="filetree last"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=admin_upload_conversion">Conversion</a></li>
        <li class="filetree last"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=admin_upload_esub">e-SUB</a></li>
        <li class="filetree last"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=admin_upload_ffb_production">FFB Production</a></li>
        <li class="filetree last"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=upload_excel_mill">Upload eKilang</a></li>
    </ul>
    <!--<ul id="browser" class="filetree treeview"><img src="../images/Bcase.png" width="16" height="16" /> <strong> ACCCESS DATA</strong>
          <li class="filetree last"><img src="../nav/file.gif" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=access_data">Access Data</a></li>
      </ul>-->
    <!--    
    <img src="../images/Bcase.png" width="16" height="16" /> <strong> GENERATE REPORT BOOK</strong>
                  <li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=chapter">Add Chapter</a></li>
          <li class="filetree"><img src="../nav/file.gif" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=edit_generate">Compile Chapters into Book</a></li>
          <li class="filetree"><img src="../nav/file.gif" />&nbsp;&nbsp;<a href="cover_design.php" target="_blank">Cover and Design</a></li>
    -->
<!--<li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=import_data"><em>Import Data</em></a></li>-->
<!--<img src="../images/Bcase.png" width="16" height="16" /> <strong> DATA </strong>-->
<!--<li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="../migration/data_survey_estate.php">Data Survey Estate 2010</a></li>
            <li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="../migration/data_survey_mill.php">Data Survey Mill 2010</a></li>-->
<!--<li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=cop2008">Cost of Production (2008)</a></li>   -->
<!--        		<li class="filetree"><img src="../nav/file.gif" alt="sss" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=variable">Variables</a></li>
    <img src="../images/Bcase.png" width="16" height="16" /> <strong> ANALYSIS RANGE OUTLIERS</strong>
            <li class="filetree"><img src="../nav/file.gif" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=range_outliers">Estate Outliers</a></li>
            <li class="filetree"><img src="../nav/file.gif" />&nbsp;&nbsp;<a href="home.php?id=config&amp;sub=range_outliers_mill">Mill Outliers</a></li>-->
</div>
