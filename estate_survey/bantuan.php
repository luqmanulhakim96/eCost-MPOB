<?php $video = new user('video','');
$komponen = new user('koskomponen','');
?>
<script type="text/javascript">
function MM_CheckFlashVersion(reqVerStr,msg){
  with(navigator){
    var isIE  = (appVersion.indexOf("MSIE") != -1 && userAgent.indexOf("Opera") == -1);
    var isWin = (appVersion.toLowerCase().indexOf("win") != -1);
    if (!isIE || !isWin){
      var flashVer = -1;
      if (plugins && plugins.length > 0){
        var desc = plugins["Shockwave Flash"] ? plugins["Shockwave Flash"].description : "";
        desc = plugins["Shockwave Flash 2.0"] ? plugins["Shockwave Flash 2.0"].description : desc;
        if (desc == "") flashVer = -1;
        else{
          var descArr = desc.split(" ");
          var tempArrMajor = descArr[2].split(".");
          var verMajor = tempArrMajor[0];
          var tempArrMinor = (descArr[3] != "") ? descArr[3].split("r") : descArr[4].split("r");
          var verMinor = (tempArrMinor[1] > 0) ? tempArrMinor[1] : 0;
          flashVer =  parseFloat(verMajor + "." + verMinor);
        }
      }
      // WebTV has Flash Player 4 or lower -- too low for video
      else if (userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 4.0;

      var verArr = reqVerStr.split(",");
      var reqVer = parseFloat(verArr[0] + "." + verArr[2]);

      if (flashVer < reqVer){
        if (confirm(msg))
          window.location = "http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash";
      }
    }
  }
}
</script>

<body onLoad="MM_CheckFlashVersion('7,0,0,0','Content on this page requires a newer version of Macromedia Flash Player. Do you want to download it now?');">
<table width="80%" border="0" align="center">
  <tr>
    <td><div align="left"><strong><img src="../images/Get_Info.jpg" width="30" height="30"></strong></div></td>
    <td><strong><?=setstring ( 'mal', 'Muat Turun', 'en', 'Download'); ?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table width="60%" id="box-table-a">
      <tr bgcolor="#8A1602">
        <th height="26" colspan="2"><div align="left"><span class="style5">&nbsp;File Name</span></div></th>
        </tr>
      <?php
		  $con =connect();
          $qfile = "select * from file_upload order by title";
		  $rfile = mysqli_query($con, $qfile);
		  while($rowfile = mysqli_fetch_array($rfile)){
		  ?>
      <tr>
        <td width="12%"><div align="center"><a href="<?= $rowfile['path'];?>"><img src="../images/Autoship-icon.png" width="20" height="20" border="0" title="View File" /></a></div></td>
        <td width="88%"><?= $rowfile['title'];?></td>
      </tr>
      <?php } ?>
    </table>
    <br></td>
  </tr>
  <tr>
    <td width="4%"><div align="left"><strong><img src="../images/Get_Info.jpg" width="30" height="30"></strong></div></td>
    <td width="96%"><strong><?= $video->title; ?></strong></td>
  </tr>
  <tr>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="left">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="600" height="450" id="FLVPlayer">
        <param name="movie" value="FLVPlayer_Progressive.swf" />
        <param name="salign" value="lt" />
        <param name="quality" value="high" />
        <param name="scale" value="noscale" />
        <param name="wmode" value="transparent" />
        <param name="FlashVars" value="&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=../ecost&autoPlay=false&autoRewind=false" />
        <embed src="FLVPlayer_Progressive.swf" flashvars="&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=<?= $video->path; ?>&autoPlay=false&autoRewind=false" quality="high" scale="noscale" wmode="transparent" width="600" height="450" name="FLVPlayer" salign="LT" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
      </object>
    </div></td>
  </tr>
  </table>
<br />
<table width="80%" border="0" align="center">
  <tr>
    <td width="5%"><div align="left"><img src="../images/window_osx.png" width="48" height="48"></div></td>
    <td width="95%"><span class="style1"><?=setstring ( 'mal', 'Singkatan', 'en', 'Symbolization'); ?></span></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" align="center" style="border:#333333 1px solid;">
      <tr>
        <td width="33%"><u><strong><?=setstring ( 'mal', '', 'en', ''); ?><?=setstring ( 'mal', 'Singkatan', 'en', 'Symbol'); ?></strong></u></td>
        <td width="67%"><strong><u><?=setstring ( 'mal', 'Penerangan', 'en', 'Description'); ?></u></strong></td>
      </tr>
      <tr>
        <td><img src="../images/warning_16.png" width="16" height="16"></td>
        <td><?=setstring ( 'mal', 'Soalan survei yang belum dilengkapkan', 'en', 'Incomplete Survey Questionnaire'); ?> </td>
      </tr>
      <tr>
        <td><img src="../images/accepted_48.png" width="16" height="16"></td>
        <td> <?=setstring ( 'mal', 'Soalan survei yang sudah dilengkapkan', 'en', 'Completed Survey Questionnaire'); ?></td>
      </tr>
      <tr>
        <td><img src="../images/cetakr.png" width="16" height="16"></td>
        <td> <?=setstring ( 'mal', 'Cetak', 'en', 'Print'); ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="80%" border="0" align="center">
  <tr>
    <td width="5%"><div align="left"><img src="../images/Symbol - Check.png" width="40" height="40"></div></td>
    <td width="95%"><span class="style1">Cost Component </span></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" style="border:#333333 1px solid;">
      <tr>
        <td><u><strong>Cost Component </strong></u></td>
        <td width="66%"><strong><u>Description</u></strong></td>
      </tr>

		<?php for($i=0; $i<$komponen->total; $i++){ ?>
      <tr valign="top">
        <td width="32%">         <strong> <?= $komponen->title[$i]; ?></strong>        </td>
        <td><?= $komponen->description[$i]; ?></td>
      </tr>
	  <?php }?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
