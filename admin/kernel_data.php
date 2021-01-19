<?php session_start();
  header("Content-type:application/xml");

?><pie>
  <!-- <message bg_color="#CCBB00" text_color="#FFFFFF"><![CDATA[You can broadcast any message to chart from data XML file]]></message> -->
  <slice title="Peninsular Malaysia" pull_out="true"><?php echo $_SESSION['kernel_malaysia'];?></slice>
  <slice title="Sabah"><?php echo $_SESSION['kernel_sabah'];?></slice>
  <slice title="Sarawak"><?php echo $_SESSION['kernel_sarawak'];?></slice>
<!--  <slice title="Des" description="Click on the slice to find more information" alpha="50">114</slice>-->
</pie>
