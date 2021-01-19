<?
session_start();
$title = $_SESSION['title'];
?>
<style type="text/css">
.popupHide{ /CSS for enlarged image/

opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: -308px;
	top: 375px;
	width: 297px;
}

.popupShow{
	opacity:1;
	filter:alpha(opacity=100);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	position: absolute;
	background-color: lightyellow;
	padding: 5px;
	border: 1px dashed gray;
	color: black;
	text-decoration: none;
	left: 250px;
	top: 281px;
	width: 256px;
}
.style1 {
	font-size: 11px;
	font-style: italic;
}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
.style3 {color: #FFFFFF}
</style>
<div align="center"><img src="images/peta.png" alt="aaa" width="648" height="288" border="0" usemap="#Map" />
  <map name="Map" id="Map">
    <area shape="poly" coords="159,197,171,212" href="#" />
    <area shape="poly" coords="161,196,183,211,203,216,210,208,221,233,229,249,233,263,225,266,209,266,203,271,193,263,172,248,156,234,153,221,158,204" href="#" onMouseOver="javascript:document.getElementById('johor').className='popupShow';" onClick="javascript:document.getElementById('johor').className='popupHide';" />
    <area shape="poly" coords="153,64,150,75,147,87,152,100,158,110,166,118,173,127,180,143,190,148,193,132,193,119,194,105,183,90,178,79,165,69,156,63" href="#" onMouseOver="javascript:document.getElementById('terengganu').className='popupShow';" onClick="javascript:document.getElementById('terengganu').className='popupHide';" />
    <area shape="poly" coords="58,22,48,37,51,48,53,54,54,62,57,75,62,79,68,90,79,77,84,57,90,45,73,32 href="#" onmouseover="javascript:document.getElementById('kedah').className='popupShow';" onClick="javascript:document.getElementById('kedah').className='popupHide';" />
    <area shape="poly" coords="88,64,81,80,67,94,57,93,67,111,69,127,74,141,81,149,99,157,107,151,99,95,107,78,108,62,112,54" href="#" onMouseOver="javascript:document.getElementById('perak').className='popupShow';" onClick="javascript:document.getElementById('perak').className='popupHide';" />
    <area shape="poly" coords="131,46,124,58,116,67,114,88,104,102,113,115,133,109,152,115,152,87,149,68,152,50,142,42" href="#" onMouseOver="javascript:document.getElementById('kelantan').className='popupShow';" onClick="javascript:document.getElementById('kelantan').className='popupHide';" />
    <area shape="poly" coords="155,115,139,117,114,117,108,137,109,161,125,173,140,185,163,199,187,209,204,216,199,192,193,163,184,149,173,131,162,115" href="#" onMouseOver="javascript:document.getElementById('pahang').className='popupShow';" onClick="javascript:document.getElementById('pahang').className='popupHide';"  />
    <area shape="poly" coords="477,156,492,161,488,184,473,199,458,224,456,239,428,248,414,258,382,249,358,256,336,275,294,272,279,265,260,242,392,188,419,162,429,143" href="#" onMouseOver="javascript:document.getElementById('sarawak').className='popupShow';" onClick="javascript:document.getElementById('sarawak').className='popupHide';"  />
  </map>
<br />
<span class="style1">Click on State To View Data and click again to close information </span></div>
<br />
<span id="terengganu" class="popupHide">
<table width="100%">
  <tr>
    <td><div>
      <div align="center"><a href="home.php?id=mc_state&amp;state=TRG&amp;district=KMN">Kemaman</a> &bull; <a href="home.php?id=mc_state&amp;state=TRG&amp;district=HL">Hulu Terengganu</a> &bull; <a href="home.php?id=mc_state&amp;state=TRG&amp;district=KT">Kuala Terengganu</a> &bull; <a href="home.php?id=mc_state&amp;state=TRG&amp;district=BST">Besut</a> &bull; <a href="home.php?id=mc_state&amp;state=TRG&amp;district=MRG">Marang</a> &bull; <a href="home.php?id=mc_state&amp;state=TRG&amp;district=DGN">Dungun</a> &bull;
    </div></td>
  </tr>
</table>
</span>
<span id="kedah" class="popupHide">
<table width="100%">
  <tr>
    <td><div>
      <div align="center"><a href="home.php?id=mc_state&amp;state=KDH&amp;district=KMN">Baling</a>&bull;<a href="home.php?id=mc_state&amp;state=KDH&amp;district=HL">Bandar Baharu</a> &bull; <a href="home.php?id=mc_state&amp;state=KDH&amp;district=KT">Kota Setar</a> &bull; <a href="home.php?id=mc_state&amp;state=KDH&amp;district=BST">Kulim</a> &bull; <a href="home.php?id=mc_state&amp;state=KDH&amp;district=MRG">Sik</a> &bull; <a href="home.php?id=mc_state&amp;state=KDH&amp;district=DGN">Pokok Sena</a> &bull;
    </div></td>
  </tr>
</table>
</span>
<span id="perak" class="popupHide">
<table width="100%">
  <tr>
    <td><div>
      <div align="center"><a href="home.php?id=mc_state&amp;state=PRK&amp;district=KMN">BATANG PADANG</a>&bull;<a href="home.php?id=mc_state&amp;state=PRK&amp;district=HL">KINTA</a> &bull; <a href="home.php?id=mc_state&amp;state=PRK&amp;district=KT">KUALA KANGSAR</a> &bull; <a href="home.php?id=mc_state&amp;state=PRK&amp;district=BST">LARUT</a> &bull; <a href="home.php?id=mc_state&amp;state=PRK&amp;district=MRG">KERIAN</a> &bull; <a href="home.php?id=mc_state&amp;state=PRK&amp;district=DGN">MANJUNG</a> &bull;
    </div></td>
  </tr>
</table>
</span>
<span id="kelantan" class="popupHide">
<table width="100%">
  <tr>
    <td><div>
      <div align="center"><a href="home.php?id=mc_state&amp;state=KTN&amp;district=KMN">KOTA BAHRU</a>&bull;<a href="home.php?id=mc_state&amp;state=KTN&amp;district=HL">GUA MUSANG</a> &bull; <a href="home.php?id=mc_state&amp;state=KTN&amp;district=KT">PASIR MAS</a> &bull; <a href="home.php?id=mc_state&amp;state=KTN&amp;district=BST">TUMPAT</a> &bull; <a href="home.php?id=mc_state&amp;state=KTN&amp;district=MRG">PASIR PUTIH</a> &bull; <a href="home.php?id=mc_state&amp;state=KTN&amp;district=DGN">BACHOK</a> &bull;
    </div></td>
  </tr>
</table>
</span>
<span id="pahang" class="popupHide">
<table width="100%">
  <tr>
    <td><div>
      <div align="center"><a href="home.php?id=mc_state&amp;state=PHG&amp;district=KMN">BENTONG</a>&bull;<a href="home.php?id=mc_state&amp;state=PHG&amp;district=HL">BERA</a> &bull; <a href="home.php?id=mc_state&amp;state=PHG&amp;district=KT">JERANTUT</a> &bull; <a href="home.php?id=mc_state&amp;state=PHG&amp;district=BST">KUANTAN</a> &bull; <a href="home.php?id=mc_state&amp;state=PHG&amp;district=MRG">LIPIS</a> &bull; <a href="home.php?id=mc_state&amp;state=PHG&amp;district=DGN">MARAN</a> &bull;
    </div></td>
  </tr>
</table>
</span>
<span id="sarawak" class="popupHide">
<table width="100%">
  <tr>
    <td><div>
      <div align="center"><a href="home.php?id=mc_state&amp;state=SRWK&amp;district=KMN">KAPIT</a>&bull;<a href="home.php?id=mc_state&amp;state=SRWK&amp;district=HL">MIRI</a> &bull; <a href="home.php?id=mc_state&amp;state=SRWK&amp;district=KT">BINTULU</a> &bull; <a href="home.php?id=mc_state&amp;state=SRWK&amp;district=BST">SIBU</a> &bull; <a href="home.php?id=mc_state&amp;state=SRWK&amp;district=MRG">LIMBANG</a> &bull; <a href="home.php?id=mc_state&amp;state=SRWK&amp;district=DGN">MUKAH</a> &bull;
    </div></td>
  </tr>
</table>
</span>
<br />
<br />
<table width="100%" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #000000;">
  <col width="204">
  <col width="108">
  <col width="103">
  <col width="86">
  <tr height="17">
    <td width="204" height="35" bgcolor="#8A1602"><span class="style2"><?=$title?></span></td>
    <td width="108" bgcolor="#8A1602"><span class="style3">          1,125.50 </span></td>
    <td width="103" bgcolor="#8A1602"><span class="style3">         1,359.00 </span></td>
    <td width="86" bgcolor="#8A1602"><span class="style3">       985.00 </span></td>
  </tr>
  <tr height="17">
    <td height="17" width="204"> Weeding</td>
    <td width="108">               250.00 </td>
    <td>             405.00 </td>
    <td width="86">         330.00 </td>
  </tr>
  <tr height="17">
    <td height="17" width="204"> Lalang control</td>
    <td width="108">               139.00 </td>
    <td>             110.00 </td>
    <td width="86">           79.00 </td>
  </tr>
  <tr height="17">
    <td height="17" width="204"> Drains</td>
    <td width="108">               125.00 </td>
    <td>               85.00 </td>
    <td width="86">           56.00 </td>
  </tr>
  <tr height="17">
    <td height="17" width="204"> Roads, bridges, paths, etc</td>
    <td width="108">               155.00 </td>
    <td>             160.00 </td>
    <td width="86">         122.00 </td>
  </tr>
  <tr height="17">
    <td height="17" width="204"> Soil/water conservation</td>
    <td width="108">                60.00 </td>
    <td>               92.00 </td>
    <td width="86">           31.00 </td>
  </tr>
  <tr height="17">
    <td height="17" width="204"> Boundaries and survey</td>
    <td width="108">                38.00 </td>
    <td>               22.00 </td>
    <td width="86">           16.00 </td>
  </tr>
  <tr height="17">
    <td height="17" width="204"> Cover crops</td>
    <td width="108">               160.00 </td>
    <td>             135.00 </td>
    <td width="86">           55.00 </td>
  </tr>
  <tr height="17">
    <td height="17" width="204"> Survey and supply</td>
    <td width="108">                28.00 </td>
    <td>               65.00 </td>
    <td width="86">           32.00 </td>
  </tr>
  <tr height="17">
    <td height="17" width="204"> Pruning</td>
    <td width="108">                22.00 </td>
    <td>               40.00 </td>
    <td width="86">           48.00 </td>
  </tr>
  <tr height="17">
    <td height="17" width="204"> Pests and diseases</td>
    <td width="108">               135.00 </td>
    <td>             190.00 </td>
    <td width="86">         150.00 </td>
  </tr>
  <tr height="17">
    <td height="17" width="204"> Castration</td>
    <td width="108">                13.50 </td>
    <td>               55.00 </td>
    <td width="86">           66.00 </td>
  </tr>
</table>
