<?php

session_start();

if ($_SESSION['type']<>"admin")
       header("location:../logout.php");


$video = new admin('video','');
$komponen = new admin ('koskomponen','');
?>
<script type="text/javascript">

function edit(id)
{

		document.getElementById(id).contentEditable='true';

}


function ubah(key,id_name,jenis)
{
			var ok=confirm('Save this data?');
				if(ok)
				{
					newValue = document.getElementById(id_name).innerHTML;
					newValue = newValue.replace(/&/g, "zxz");
			    	window.location.href="save_video.php?jenis="+jenis+"&var="+newValue+"&id="+key;
				}
				else
				{
					window.location.href='home.php?id=config&sub=help';
					//ie supportable
				}
}




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




<link href="editableText.css" rel="stylesheet" type="text/css">

<link type='text/css' href='../js/basic/css/basic.css' rel='stylesheet' media='screen' />
<script type='text/javascript' src='../js/basic/js/jquery.simplemodal.js'></script>

<script type='text/javascript'>

$(document).ready(function () {
	$('#basic-modal a.basic').click(function (e) {
		e.preventDefault();
		$('#basic-modal-content').modal();
	});
});
</script>


<script type='text/javascript'>
function deletedata(x)
{
	answer = confirm("Delete this data?");
	if (answer !=0)
	{
	window.location.href='save_video.php?jenis=delete&id='+x;
	}
}
</script>
<style type="text/css">
<!--
.style1 {	font-size: 14px;
	font-weight: bold;
}
.style3 {font-size: 18px; font-weight: bold; }
.style4 {font-weight: bold}
.style5 {
	color: #0066FF;
	font-weight: bold;
}
-->
</style>
<body onLoad="MM_CheckFlashVersion('7,0,0,0','Content on this page requires a newer version of Macromedia Flash Player. Do you want to download it now?');"><form action="save_video.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="0">
  <tr>
    <td width="6%"><div align="center"><strong><img src="../images/Get_Info.jpg" width="40" height="40"></strong></div></td>
    <td width="94%"><strong><?= $video->title; ?></strong></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%">
      <tr>
        <td><strong>Title : </strong></td>
        <td><input name="title" type="text" id="title" value="<?=  $video->title;?>" size="60"></td>
      </tr>
      <tr>
        <td width="14%"><strong>Add New Video : </strong></td>
        <td width="86%"><input name="ufile" type="file" id="ufile" size="40" />
              <input name="upload" type="submit" id="upload" value="Upload" />
              <input name="idvideo" type="hidden" id="idvideo" value="<?= $video->id; ?>">
              <input name="jenis" type="hidden" id="jenis" value="video"></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td colspan="2"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="600" height="450" id="FLVPlayer">
      <param name="movie" value="FLVPlayer_Progressive.swf" />
      <param name="salign" value="lt" />
      <param name="quality" value="high" />
      <param name="scale" value="noscale" />
	  <param name="wmode" value="transparent" />
      <param name="FlashVars" value="&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=<?= $video->path; ?>&autoPlay=false&autoRewind=false" />
      <embed src="FLVPlayer_Progressive.swf" flashvars="&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=<?= $video->path; ?>&autoPlay=false&autoRewind=false" quality="high" scale="noscale" wmode="transparent" width="600" height="450" name="FLVPlayer" salign="LT" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object></td>
  </tr>
</table>
</form>

<br />
<table width="100%" border="0">
  <tr>
    <td width="5%"><div align="left"><img src="../images/window_osx.png" width="48" height="48"></div></td>
    <td width="95%"><span class="style1">Singkatan</span></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" style="border:#333333 1px solid;">
      <tr>
        <td width="34%"><u><strong>Singkatan</strong></u></td>
        <td width="66%"><strong><u>Penerangan</u></strong></td>
      </tr>
      <tr>
        <td><img src="../images/warning_16.png" width="16" height="16"></td>
        <td>Soalan survei yang belum dilengkapkan </td>
      </tr>
      <tr>
        <td><img src="../images/accepted_48.png" width="16" height="16"></td>
        <td>Soalan survei yang sudah dilengkapkan </td>
      </tr>
      <tr>
        <td><img src="../images/cetakr.png" width="16" height="16"></td>
        <td>Cetak </td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="5%"><div align="left"><img src="../images/Symbol - Check.png" width="40" height="40"></div></td>
    <td width="95%"><span class="style1">Cost Component </span></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" style="border:#333333 1px solid;">
      <tr>
        <td>&nbsp;</td>
        <td><u><strong>Cost Component </strong></u></td>
        <td width="52%"><strong><u>Description</u></strong></td>
      </tr>
      <tr>
        <td colspan="3" valign="middle"><div id="basic-modal"><a href="#" class="basic"><strong><img src="../images/add_48.png" width="24" height="24" border="0"> Click to add new cost component </strong></a></div></td>
        </tr>
      <tr>
        <td colspan="3" valign="middle"><span class="style5">Click on text to edit </span></td>
      </tr>
      <tr>
        <td colspan="3" valign="middle">&nbsp;</td>
      </tr>
		<?php for($i=0; $i<$komponen->total; $i++){ ?>
      <tr valign="top">
        <td width="2%"><a href="#" onClick="deletedata('<?= $komponen->title[$i]; ?>');"><img src="remove.png" width="20" height="20" border="0" ></a></td>
        <td width="46%"><span class="style4">
        <span  id="j<?=$i; ?>" class="editableText" onClick="edit('j<?=$i;?>')" onblur="ubah('<?=$komponen->title[$i]; ?>','j<?=$i; ?>','title')"><?= $komponen->title[$i]; ?></span></span>
        </td>
        <td>

		<span id="<?=$i; ?>" class="editableText" onClick="edit('<?=$i;?>')" onblur="ubah('<?=$komponen->title[$i]; ?>','<?=$i; ?>','description')" ><?= $komponen->description[$i]; ?></span>


				</td>
      </tr>
	  <?php }?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
			<div id="basic-modal-content">
			  <form name="form2" method="post" action="save_video.php">
			    <table width="100%">
                  <tr>
                    <td colspan="3"><u><span class="style3">Cost Component </span></u></td>
                  </tr>
                  <tr>
                    <td width="15%"><strong>Title</strong></td>
                    <td width="1%"><strong>:</strong></td>
                    <td width="84%"><input name="title2" type="text" id="title2" size="50">
					<script type="text/javascript">
					var f1 = new LiveValidation('title2');
f1.add( Validate.Presence );
					</script>
					</td>
                  </tr>
                  <tr valign="top">
                    <td><strong>Description</strong></td>
                    <td><strong>:</strong></td>
                    <td><textarea name="description2" cols="40" rows="5" id="description2"></textarea>
                    <script type="text/javascript">
					var f11 = new LiveValidation('description2');
f11.add( Validate.Presence );</script>
					</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3"><input type="submit" name="Submit" value="Submit">
                    <input type="reset" name="Submit2" value="Reset">
                    <input name="jenis" type="hidden" id="jenis" value="costcomponent"></td>
                  </tr>
                </table>
              </form>
</div>
