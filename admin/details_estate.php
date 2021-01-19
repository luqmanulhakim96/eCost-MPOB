<?php 
	include('../Connections/connection.class.php'); 
	session_start(); 
	extract($_REQUEST);
?>
<style type="text/css">
<!--
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<script src="../js/live/livevalidation_standalone.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../js/live/consolidated_common.css">
  
<link rel="stylesheet" href="../js/tabber/example.css" TYPE="text/css" MEDIA="screen">
<script type="text/javascript" src="../jquery-1.3.2.js"></script>

<script type="text/javascript">

/* Optional: Temporarily hide the "tabber" class so it does not "flash"
   on the page as plain HTML. After tabber runs, the class is changed
   to "tabberlive" and it will appear. */

document.write('<style type="text/css">.tabber{display:none;}<\/style>');

/*==================================================
  Set the tabber options (must do this before including tabber.js)
  ==================================================*/
var tabberOptions = {

  'cookie':"tabber", /* Name to use for the cookie */

  'onLoad': function(argsObj)
  {
    var t = argsObj.tabber;
    var i;

    /* Optional: Add the id of the tabber to the cookie name to allow
       for multiple tabber interfaces on the site.  If you have
       multiple tabber interfaces (even on different pages) I suggest
       setting a unique id on each one, to avoid having the cookie set
       the wrong tab.
    */
    if (t.id) {
      t.cookie = t.id + t.cookie;
    }

    /* If a cookie was previously set, restore the active tab */
    i = parseInt(getCookie(t.cookie));
    if (isNaN(i)) { return; }
    t.tabShow(i);
   // alert('getCookie(' + t.cookie + ') = ' + i);
  },

  'onClick':function(argsObj)
  {
    var c = argsObj.tabber.cookie;
    var i = argsObj.index;
   // alert('setCookie(' + c + ',' + i + ')');
    setCookie(c, i);
  }
};

/*==================================================
  Cookie functions
  ==================================================*/
function setCookie(name, value, expires, path, domain, secure) {
    document.cookie= name + "=" + escape(value) +
        ((expires) ? "; expires=" + expires.toGMTString() : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    } else {
        begin += 2;
    }
    var end = document.cookie.indexOf(";", begin);
    if (end == -1) {
        end = dc.length;
    }
    return unescape(dc.substring(begin + prefix.length, end));
}
function deleteCookie(name, path, domain) {
    if (getCookie(name)) {
        document.cookie = name + "=" +
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    }
}

</script>
<script language="javascript">
	$(document).ready(function() {
	
	$(".esub_edit").hide();
	$(".kemaskini").hide();
	
	
	var a = document.getElementById("tanaman_semula").value;
	if(a !=null){
	document.getElementById("tanaman_semula").value="";
	}
	
	var b = document.getElementById("tanaman_baru").value;
	if(b !=null){
	document.getElementById("tanaman_baru").value="";
	}

	
	var c = document.getElementById("tanaman_tukar").value;
	if(c !=null){
	document.getElementById("tanaman_tukar").value="";
	}

	
	
	
		});

function buka(x,y,z,a){
	
	
	$("."+x).hide();
	$("."+y).show();
	$("."+z).hide();
	$("."+a).show();
}

</script>
<script language="javascript">
function pergi(x)
{
	window.location.href='add_estate_all.php?jenis=edit&lesen_lama='+x;
}
</script>


<script type="text/javascript" src="../js/tabber/tabber.js"></script>
<title>Estate Details</title>
<h3>License No : <?php echo $nolesen;?></h3>
      <form action="save_all.php" method="post" name="form_esub" id="form_esub">
<div class="tabber" id="mytabber1">




     <div class="tabbertab">
	  <h2>E-Sub</h2>
   <?php 
		$con =connect();
		$qd="select * FROM esub where no_lesen_baru ='$nolesen'";
		$rd=mysql_query($qd,$con);
		$rowd=mysql_fetch_array($rd);
		$total=mysql_num_rows($rd);
  ?>
    
<table width="100%" class="esub">
  
  <tr>
    <td width="15%">NAMA_ESTET</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Nama_Estet'];?></td>
  </tr>
  <tr>
    <td width="15%">NO_LESEN</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['No_Lesen'];?></td>
  </tr>
  <tr>
    <td width="15%">NO_LESEN_BARU</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['No_Lesen_Baru'];?></td>
  </tr>
  <tr>
    <td width="15%">ALAMAT1</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Alamat1'];?></td>
  </tr>
  <tr>
    <td width="15%">ALAMAT2</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Alamat2'];?></td>
  </tr>
  <tr>
    <td width="15%">POSKOD</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Poskod'];?></td>
  </tr>
  <tr>
    <td width="15%">BANDAR</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Bandar'];?></td>
  </tr>
  <tr>
    <td width="15%">NEGERI</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Negeri'];?></td>
  </tr>
  <tr>
    <td width="15%">NO_TELEPON</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['No_Telepon'];?></td>
  </tr>
  <tr>
    <td width="15%">NO_FAX</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['No_Fax'];?></td>
  </tr>
  <tr>
    <td width="15%">EMEL</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Emel'];?></td>
  </tr>
  <tr>
    <td width="15%">NEGERI_PREMIS</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Negeri_Premis'];?></td>
  </tr>
  <tr>
    <td width="15%">DAERAH_PREMIS</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Daerah_Premis'];?></td>
  </tr>
  <tr>
    <td width="15%">SYARIKAT_INDUK</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Syarikat_Induk'];?></td>
  </tr>
  <tr>
    <td width="15%">BERHASIL</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Berhasil'];?></td>
  </tr>
  <tr>
    <td width="15%">BELUM_BERHASIL</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Belum_Berhasil'];?></td>
  </tr>
  <tr>
    <td width="15%">JUMLAH</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Jumlah'];?></td>
  </tr>
  <tr>
    <td width="15%">KELUASAN_YANG_DITUAI</td>
    <td width="1%">:</td>
    <td width="84%"><?php echo $rowd['Keluasan_Yang_Dituai'];?></td>
  </tr>
</table>
     </div>
     <div class="tabbertab">
	  <h2>FBB</h2>
	        <?php
      		$con = connect();
			$q="SHOW COLUMNS FROM fbb_production";
			$r=mysql_query($q,$con);
			
			$nolesenffb = substr($nolesen,0,-1);
	  ?>
 <p><table width="100%" class="esub">    <td colspan="3"><strong>MAKLUMAT FBB PRODUCTION E-COST</strong></td>
    </tr>
  <tr>
  <?php while($row = mysql_fetch_array($r)){
  				$qd="select ".$row['Field']." as jenis FROM fbb_production where lesen ='$nolesenffb'";
				$rd=mysql_query($qd,$con);
				$rowd=mysql_fetch_array($rd);
  ?>
  <tr>

    <td width="31%"><?php echo strtoupper($row['Field']);?></td>
    <td width="1%">:</td>
    <td width="68%"><?php echo $rowd['jenis'];?></td>
  </tr>
  <?php } ?>
</table>


   <?php 
  				$con =connect();
				$lesen_singkat = substr($nolesen, 0,-1);
				$qfbb="select * FROM fbb_production where lesen ='$lesen_singkat'";
				$rfbb=mysql_query($qfbb,$con);
				$rowfbb=mysql_fetch_array($rfbb);
				$totalfbb=mysql_num_rows($rfbb);
				
				if($totalfbb==0){
					$qaddfbb="insert into fbb_production (lesen) values ('$lesen_singkat')";
					$raddfbb=mysql_query($qaddfbb,$con);
					echo "<script>window.location.href='view_estate_all.php'</script>";
				}
  ?>
   </p>
     </div>
     <div class="tabbertab">
	  <h2>Login</h2>
	        <?php
      		$con = connect();
			$q="SHOW COLUMNS FROM login_estate";
			$r=mysql_query($q,$con);
	  ?>
	        <p><table width="100%" class="esub">
  <?php while($row = mysql_fetch_array($r)){
  				$qd="select ".$row['Field']." as jenis FROM login_estate where lesen ='$nolesen'";
				$rd=mysql_query($qd,$con);
				$rowd=mysql_fetch_array($rd);
  ?>
  <tr>
    <td width="31%"><?php echo strtoupper($row['Field']);?></td>
    <td width="1%">:</td>
    <td width="68%"><?php echo $rowd['jenis'];?></td>
  </tr>
  <?php } ?>
</table>
</p>


   <?php 
  				$con =connect();
				$qdlogin="select * FROM login_estate where lesen ='$nolesen'";
				$rdlogin=mysql_query($qdlogin,$con);
				$rowdlogin=mysql_fetch_array($rdlogin);
				$totallogin=mysql_num_rows($rdlogin);
				
				if($totallogin==0){
					$qaddlogin="insert into login_estate (lesen) values ('$nolesen')";
					$raddlogin=mysql_query($qaddlogin,$con);
					echo "<script>window.location.href='view_estate_all.php'</script>";
				}
  ?>
     </div>
     <div class="tabbertab">
       <div class="esub">
	  <h2>Tanam Baru</h2>
      <?php
		  	$tahun = $_SESSION['tahun'];
			
			$pertama = $tahun-3;
			$kedua = $tahun-2;
			$ketiga = $tahun-1; 
			
			$pertama = substr($pertama,-2);
			$kedua = substr($kedua,-2);
			$ketiga = substr($ketiga,-2);
		?>
			<?php
      		$con = connect();
			$q="select * FROM tanam_baru$pertama where lesen ='$nolesen'";
			$r=mysql_query($q,$con);
			$total=mysql_num_rows($r);
				
			
	  ?>
 <p>
 <b>TANAMAN BARU PADA <?php echo $pertama;?></b>
 <table width="100%" >
  <?php 
  $jumlah1=0;
  while($row = mysql_fetch_array($r)){
  				
  ?>
  <tr>
    <td width="31%">Bulan</td>
    <td width="1%">:</td>
    <td width="68%"><?php echo $row['bulan'];?></td>
  </tr>
  <tr>
    <td>Tanaman Baru</td>
    <td>&nbsp;</td>
    <td><?php echo $row['tanaman_baru'];$jumlah1=$jumlah1+$row['tanaman_baru'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>
<b><em>JUMLAH KESELURUHAN : <?php echo $jumlah1; ?></em></b>
</p>




			<?php
      		$con = connect();
			$q="select * FROM tanam_baru$kedua where lesen ='$nolesen'";
			$r=mysql_query($q,$con);
	  ?>
 <p>
 <b>TANAMAN BARU PADA <?php echo $kedua;?></b>
 <table width="100%">
  <?php 
  $jumlah2 =0; 
  while($row = mysql_fetch_array($r)){
  				
  ?>
  <tr>
    <td width="31%">Bulan</td>
    <td width="1%">:</td>
    <td width="68%"><?php echo $row['bulan'];?></td>
  </tr>
  <tr>
    <td>Tanaman Baru</td>
    <td>&nbsp;</td>
    <td><?php echo $row['tanaman_baru'];$jumlah2=$jumlah2 +$row['tanaman_baru'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>
<b><em>JUMLAH KESELURUHAN : <?php echo $jumlah2; ?></em></b>
</p>




			<?php
      		$con = connect();
			$q="select * FROM tanam_baru$ketiga where lesen ='$nolesen'";
			$r=mysql_query($q,$con);
	  ?>
 <p>
 <b>TANAMAN BARU PADA <?php echo $ketiga;?></b>
 <table width="100%">
  <?php 
  $jumlah3 = 0; 
  while($row = mysql_fetch_array($r)){
  				
  ?>
  <tr>
    <td width="31%">Bulan</td>
    <td width="1%">:</td>
    <td width="68%"><?php echo $row['bulan'];?></td>
  </tr>
  <tr>
    <td>Tanaman Baru</td>
    <td>&nbsp;</td>
    <td><?php echo $row['tanaman_baru'];$jumlah3 = $jumlah3 + $row['tanaman_baru'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>
<b><em>JUMLAH KESELURUHAN : <?php echo $jumlah3; ?></em></b>

</p>
</div>
     </div>
     
     
     
     <div class="tabbertab">
	  <h2>Tanam Semula</h2>
	
      <div class="esub">
			<?php
      		$con = connect();
			$q="select * FROM tanam_semula$pertama where lesen ='$nolesen'";
			$r=mysql_query($q,$con);
	  ?>
 <p>
 <b>TANAMAN SEMULA PADA <?php echo $pertama;?></b>
 <table width="100%">
  <?php 
  $jumlaha1=0;
  while($row = mysql_fetch_array($r)){
  				
  ?>
  <tr>
    <td width="31%">Bulan</td>
    <td width="1%">:</td>
    <td width="68%"><?php echo $row['bulan'];?></td>
  </tr>
  <tr>
    <td>Tanaman Semula</td>
    <td>&nbsp;</td>
    <td><?php echo $row['tanaman_semula'];$jumlaha1=$jumlaha1+$row['tanaman_semula'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>
<b><em>JUMLAH KESELURUHAN : <?php echo $jumlaha1; ?></em></b>

</p>


			<?php
      		$con = connect();
			$q="select * FROM tanam_semula$kedua where lesen ='$nolesen'";
			$r=mysql_query($q,$con);
	  ?>
 <p>
 <b>TANAMAN SEMULA PADA <?php echo $kedua;?></b>
 <table width="100%">
  <?php 
  
  $jumlaha2 =0; 
  while($row = mysql_fetch_array($r)){
  				
  ?>
  <tr>
    <td width="31%">Bulan</td>
    <td width="1%">:</td>
    <td width="68%"><?php echo $row['bulan'];?></td>
  </tr>
  <tr>
    <td>Tanaman Semula</td>
    <td>&nbsp;</td>
    <td><?php echo $row['tanaman_semula'];$jumlaha2=$jumlaha2+$row['tanaman_semula'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>
<b><em>JUMLAH KESELURUHAN : <?php echo $jumlaha2; ?></em></b>

</p>


			<?php
      		$con = connect();
			$q="select * FROM tanam_semula$ketiga where lesen ='$nolesen'";
			$r=mysql_query($q,$con);
	  ?>
 <p>
 <b>TANAMAN SEMULA PADA <?php echo $ketiga;?></b>
 <table width="100%">
  <?php 
  $jumlaha3=0;
  while($row = mysql_fetch_array($r)){
  				
  ?>
  <tr>
    <td width="31%">Bulan</td>
    <td width="1%">:</td>
    <td width="68%"><?php echo $row['bulan'];?></td>
  </tr>
  <tr>
    <td>Tanaman Semula</td>
    <td>&nbsp;</td>
    <td><?php echo $row['tanaman_semula'];$jumlaha3=$jumlaha3+$row['tanaman_semula'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>
<b><em>JUMLAH KESELURUHAN : <?php echo $jumlaha3; ?></em></b>

</p>

     </div></div>
     
     
     
     <div class="tabbertab">
	  <h2>Tanam Tukar</h2>
      
      <div class="esub">
			<?php
      		$con = connect();
			$q="select * FROM tanam_tukar$pertama where lesen ='$nolesen'";
			$r=mysql_query($q,$con);
	  ?>
 <p>
 <b>TANAMAN TUKAR PADA <?php echo $pertama;?></b>
 <table width="100%">
  <?php 
  $jumlahb1=0;
  while($row = mysql_fetch_array($r)){
  				
  ?>
  <tr>
    <td width="31%">Bulan</td>
    <td width="1%">:</td>
    <td width="68%"><?php echo $row['bulan'];?></td>
  </tr>
  <tr>
    <td>Tanaman Baru</td>
    <td>&nbsp;</td>
    <td><?php echo $row['tanaman_tukar'];$jumlahb1=$jumlahb1+$row['tanaman_tukar'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>
<b><em>JUMLAH KESELURUHAN : <?php echo $jumlahb1; ?></em></b>

</p>     

			<?php
      		$con = connect();
			$q="select * FROM tanam_tukar$kedua where lesen ='$nolesen'";
			$r=mysql_query($q,$con);
	  ?>
 <p>
 <b>TANAMAN TUKAR PADA <?php echo $kedua;?></b>
 <table width="100%">
  <?php 
  $jumlahb2 =0;
  while($row = mysql_fetch_array($r)){
  				
  ?>
  <tr>
    <td width="31%">Bulan</td>
    <td width="1%">:</td>
    <td width="68%"><?php echo $row['bulan'];?></td>
  </tr>
  <tr>
    <td>Tanaman Semula</td>
    <td>&nbsp;</td>
    <td><?php echo $row['tanaman_tukar']; $jumlahb2=$jumlahb2+$row['tanaman_tukar'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>
<b><em>JUMLAH KESELURUHAN : <?php echo $jumlahb2; ?></em></b>

</p>

			<?php
      		$con = connect();
			$q="select * FROM tanam_tukar$ketiga where lesen ='$nolesen'";
			$r=mysql_query($q,$con);
	  ?>
 <p>
 <b>TANAMAN TUKAR PADA <?php echo $ketiga;?></b>
 <table width="100%">
  <?php 
  $jumlahb3=0;
  while($row = mysql_fetch_array($r)){
  				
  ?>
  <tr>
    <td width="31%">Bulan</td>
    <td width="1%">:</td>
    <td width="68%"><?php echo $row['bulan'];?></td>
  </tr>
  <tr>
    <td>Tanaman Semula</td>
    <td>&nbsp;</td>
    <td><?php echo $row['tanaman_tukar'];$jumlahb3=$jumlahb3+$row['tanaman_tukar'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>
<b><em>JUMLAH KESELURUHAN : <?php echo $jumlahb3; ?></em></b>

</p></div>
</div>
<!-- Age Profile -->
<div class="tabbertab">
	  <h2>Age Profile</h2>
		<p>
			<table width="100%" class="esub">
				<?php
					$qd="SELECT * FROM age_profile WHERE lesen ='$nolesen'";
					$rd=mysql_query($qd,$con);
					
					while($rowd = mysql_fetch_assoc($rd)) { ?>
					<tr>
						<td width="31%">Umur Pokok</td>
						<td width="1%">:</td>
						<td width="68%"><?php echo $rowd['umur_pokok'];?> tahun</td>
					</tr>
					<tr>
						<td width="31%">Tahun</td>
						<td width="1%">:</td>
						<td width="68%"><?php echo $rowd['tahun_tanam'];?></td>
					</tr>
					<tr>
						<td width="31%">Keluasan</td>
						<td width="1%">:</td>
						<td width="68%"><?php echo $rowd['keluasan'];?> hektar</td>
					</tr>
				<?php } ?>
			</table>
		</p>
</div>
<!-- Kos Belanja Am -->
<div class="tabbertab">
	  <h2>Kos Belanja Am</h2>
	    <?php
      		$con = connect();
			$q="SHOW COLUMNS FROM belanja_am_kos";
			$r=mysql_query($q,$con);
			$year = date('Y');
		?>
		<p>
			<table width="100%" class="esub">
				<?php while($row = mysql_fetch_array($r)){
					$qd="select ".$row['Field']." as jenis FROM belanja_am_kos WHERE lesen ='$nolesen' and thisyear = '$year'";
					$rd=mysql_query($qd,$con);
					$rowd=mysql_fetch_array($rd);
				?>
				<tr>
					<td width="31%"><?php echo strtoupper($row['Field']);?></td>
					<td width="1%">:</td>
					<td width="68%"><?php echo $rowd['jenis'];?></td>
				</tr>
			<?php } ?>
			</table>
		</p>
</div>
<!-- Buruh -->
<div class="tabbertab">
	  <h2>Buruh</h2>
	    <?php
      		$con = connect();
			$q="SHOW COLUMNS FROM buruh";
			$r=mysql_query($q,$con);
			$year = date('Y');
		?>
		<p>
			<table width="100%" class="esub">
				<?php while($row = mysql_fetch_array($r)){
					$qd="select ".$row['Field']." as jenis FROM buruh WHERE lesen ='$nolesen' and tahun = '$year'";
					$rd=mysql_query($qd,$con);
					$rowd=mysql_fetch_array($rd);
				?>
				<tr>
					<td width="31%"><?php echo strtoupper($row['Field']);?></td>
					<td width="1%">:</td>
					<td width="68%"><?php echo $rowd['jenis'];?></td>
				</tr>
			<?php } ?>
			</table>
		</p>
</div>
<!-- Jentera -->
<div class="tabbertab">
	  <h2>Jentera</h2>
		<p>
			<table width="100%" class="esub">
				<?php
					$qd="SELECT * FROM estate_jentera WHERE lesen ='$nolesen' and tahun = '$year'";
					$rd=mysql_query($qd,$con);
					
					while($rowd = mysql_fetch_assoc($rd)) { ?>
					<tr>
						<td width="31%">Jentera</td>
						<td width="1%">:</td>
						<td width="68%"><?php echo $rowd['id_jentera'];?></td>
					</tr>
					<tr>
						<td width="31%">Bil.</td>
						<td width="1%">:</td>
						<td width="68%"><?php echo $rowd['value'];?></td>
					</tr>
					<tr>
						<td width="31%">Peratus</td>
						<td width="1%">:</td>
						<td width="68%"><?php echo $rowd['percent'];?></td>
					</tr>
					<tr>
						<td width="31%">Keluasan</td>
						<td width="1%">:</td>
						<td width="68%"><?php echo $rowd['type'];?></td>
					</tr>
				<?php } ?>
			</table>
		</p>
</div>
<!-- Kos Belum Matang Penanaman Baru Tahun Pertama-->
<div class="tabbertab">
	  <h2>Kos Belum Matang (Penanaman Baru)</h2>
	  <p><strong>TAHUN PERTAMA</strong></p><hr />
		<?php
			$qd="SELECT * FROM kos_belum_matang WHERE lesen ='$nolesen' AND pb_thisyear = '$year' AND pb_type = 'Penanaman Baru' AND pb_tahun = '1' LIMIT 1";
			$rd=mysql_query($qd,$con);
			$rowd = mysql_fetch_assoc($rd);
			
			if($rowd > 0) {
		?>
		<p>(a) Perbelanjaan tidak berulang</p>
			<table width="100%" class="esub">
				
				<tr>
					<td width="31%">Menebang dan membersih kawasan</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_1'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Membuat teres dan landasan  </td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_2'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Pembinaan jalan</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_3'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Pembinaan parit</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_4'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Pembinaan ban dan pintu air</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_5'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Membaris</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_6'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Melubang dan menanam</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_7'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Pembajaan awal</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_8'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Bahan tanaman</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_9'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Tanaman penutup bumi</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_10'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Perbelanjaan-perbelanjaan lain</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_11'],2);?></td>
				</tr>
				<tr>
					<td width="31%"><strong>Jumlah (a)</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_a'],2);?></strong></td>
				</tr>
			</table>
		<p>(b) Penjagaan</p>
			<table width="100%" class="esub">
				<tr>
					<td width="31%"><strong>1. Meracun</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_1'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%">i.Pembelian racun</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_1a'],2);?></td>
				</tr>
				<tr>
					<td width="31%">ii.Upah meracun</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_1b'],2);?></td>
				</tr>
				<tr>
					<td width="31%">iii.Penggunaan dan penyelenggaraan jentera</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_1c'],2);?></td>
				</tr>
				<tr>
					<td width="31%"><strong>2. Kawalan Lalang</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_2'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>3. Membaja</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_3'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%">i.Pembelian baja</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_3a'],2);?></td>
				</tr>
				<tr>
					<td width="31%">ii.Upah membaja</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_3b'],2);?></td>
				</tr>
				<tr>
					<td width="31%">iii.Penggunaan dan penyelenggaraan jentera</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_3c'],2);?></td>
				</tr>
				<tr>
					<td width="31%">iv.Analisis tanah dan daun</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_3d'],2);?></td>
				</tr>
				<tr>
					<td width="31%"><strong>4.Pemuliharaan tanah dan air</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_4'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>5.Penjagaan jalan, jambatan, lorong dan sebagainya</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_5'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>6.Penjagaan parit	</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_6'],2);?></strong></td>
				</tr>	
				<tr>
					<td width="31%"><strong>7.Penjagaan ban dan pintu air</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_7'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>8.Persempadanan dan survei	</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_8'],2);?></strong></td>
				</tr>	
				<tr>
					<td width="31%"><strong>9.Tanaman penutup bumi	</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_9'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>10.Kawalan serangga dan penyakit</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_10'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>11.Memangkas dan membersihkan pokok	</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_11'],2);?></strong></td>
				</tr>	
				<tr>
					<td width="31%"><strong>12.Banci / sulaman</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_12'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>13.Pengkasian</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_13'],2);?></strong></td>
				</tr>	
				<tr>
					<td width="31%"><strong>14.	Perbelanjaan pelbagai</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_14'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>Jumlah (b)</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b'],2);?></strong></td>
				</tr>
			</table>
			<?php } else { ?>
			<p>Tiada</p>
			<?php } ?>
			
			<p><strong>TAHUN KEDUA</strong></p><hr />
			<?php
				$qd="SELECT * FROM kos_belum_matang WHERE lesen ='$nolesen' AND pb_thisyear = '$year' AND pb_type = 'Penanaman Baru' AND pb_tahun = '2' LIMIT 1";
				$rd=mysql_query($qd,$con);
				$rowd = mysql_fetch_assoc($rd);
				
				if($rowd > 0) {
			?>
			<p>(a) Perbelanjaan tidak berulang</p>
			<table width="100%" class="esub">
				<tr>
					<td width="31%">Menebang dan membersih kawasan</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_1'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Membuat teres dan landasan  </td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_2'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Pembinaan jalan</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_3'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Pembinaan parit</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_4'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Pembinaan ban dan pintu air</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_5'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Membaris</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_6'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Melubang dan menanam</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_7'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Pembajaan awal</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_8'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Bahan tanaman</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_9'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Tanaman penutup bumi</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_10'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Perbelanjaan-perbelanjaan lain</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_11'],2);?></td>
				</tr>
				<tr>
					<td width="31%"><strong>Jumlah (a)</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_a'],2);?></strong></td>
				</tr>
			</table>
		<p>(b) Penjagaan</p>
			<table width="100%" class="esub">
				<tr>
					<td width="31%"><strong>1. Meracun</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_1'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%">i.Pembelian racun</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_1a'],2);?></td>
				</tr>
				<tr>
					<td width="31%">ii.Upah meracun</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_1b'],2);?></td>
				</tr>
				<tr>
					<td width="31%">iii.Penggunaan dan penyelenggaraan jentera</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_1c'],2);?></td>
				</tr>
				<tr>
					<td width="31%"><strong>2. Kawalan Lalang</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_2'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>3. Membaja</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_3'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%">i.Pembelian baja</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_3a'],2);?></td>
				</tr>
				<tr>
					<td width="31%">ii.Upah membaja</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_3b'],2);?></td>
				</tr>
				<tr>
					<td width="31%">iii.Penggunaan dan penyelenggaraan jentera</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_3c'],2);?></td>
				</tr>
				<tr>
					<td width="31%">iv.Analisis tanah dan daun</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_3d'],2);?></td>
				</tr>
				<tr>
					<td width="31%"><strong>4.Pemuliharaan tanah dan air</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_4'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>5.Penjagaan jalan, jambatan, lorong dan sebagainya</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_5'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>6.Penjagaan parit	</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_6'],2);?></strong></td>
				</tr>	
				<tr>
					<td width="31%"><strong>7.Penjagaan ban dan pintu air</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_7'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>8.Persempadanan dan survei	</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_8'],2);?></strong></td>
				</tr>	
				<tr>
					<td width="31%"><strong>9.Tanaman penutup bumi	</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_9'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>10.Kawalan serangga dan penyakit</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_10'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>11.Memangkas dan membersihkan pokok	</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_11'],2);?></strong></td>
				</tr>	
				<tr>
					<td width="31%"><strong>12.Banci / sulaman</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_12'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>13.Pengkasian</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_13'],2);?></strong></td>
				</tr>	
				<tr>
					<td width="31%"><strong>14.	Perbelanjaan pelbagai</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_14'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>Jumlah (b)</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b'],2);?></strong></td>
				</tr>
			</table>
			<?php } else { ?>
			<p>Tiada</p>
			<?php } ?>
			
			<p><strong>TAHUN KETIGA</strong></p><hr />
			<?php
				$qd="SELECT * FROM kos_belum_matang WHERE lesen ='$nolesen' AND pb_thisyear = '$year' AND pb_type = 'Penanaman Baru' AND pb_tahun = '3' LIMIT 1";
				$rd=mysql_query($qd,$con);
				$rowd = mysql_fetch_assoc($rd);
				
				if($rowd > 0) {
			?>
			<p>(a) Perbelanjaan tidak berulang</p>
			<table width="100%" class="esub">
				<tr>
					<td width="31%">Menebang dan membersih kawasan</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_1'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Membuat teres dan landasan  </td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_2'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Pembinaan jalan</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_3'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Pembinaan parit</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_4'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Pembinaan ban dan pintu air</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_5'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Membaris</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_6'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Melubang dan menanam</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_7'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Pembajaan awal</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_8'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Bahan tanaman</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_9'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Tanaman penutup bumi</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_10'],2);?></td>
				</tr>
				<tr>
					<td width="31%">Perbelanjaan-perbelanjaan lain</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['a_11'],2);?></td>
				</tr>
				<tr>
					<td width="31%"><strong>Jumlah (a)</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_a'],2);?></strong></td>
				</tr>
			</table>
		<p>(b) Penjagaan</p>
			<table width="100%" class="esub">
				<tr>
					<td width="31%"><strong>1. Meracun</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_1'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%">i.Pembelian racun</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_1a'],2);?></td>
				</tr>
				<tr>
					<td width="31%">ii.Upah meracun</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_1b'],2);?></td>
				</tr>
				<tr>
					<td width="31%">iii.Penggunaan dan penyelenggaraan jentera</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_1c'],2);?></td>
				</tr>
				<tr>
					<td width="31%"><strong>2. Kawalan Lalang</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_2'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>3. Membaja</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_3'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%">i.Pembelian baja</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_3a'],2);?></td>
				</tr>
				<tr>
					<td width="31%">ii.Upah membaja</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_3b'],2);?></td>
				</tr>
				<tr>
					<td width="31%">iii.Penggunaan dan penyelenggaraan jentera</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_3c'],2);?></td>
				</tr>
				<tr>
					<td width="31%">iv.Analisis tanah dan daun</td>
					<td width="1%">:</td>
					<td width="68%"><?php echo number_format($rowd['b_3d'],2);?></td>
				</tr>
				<tr>
					<td width="31%"><strong>4.Pemuliharaan tanah dan air</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_4'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>5.Penjagaan jalan, jambatan, lorong dan sebagainya</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_5'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>6.Penjagaan parit	</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_6'],2);?></strong></td>
				</tr>	
				<tr>
					<td width="31%"><strong>7.Penjagaan ban dan pintu air</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_7'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>8.Persempadanan dan survei	</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_8'],2);?></strong></td>
				</tr>	
				<tr>
					<td width="31%"><strong>9.Tanaman penutup bumi	</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_9'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>10.Kawalan serangga dan penyakit</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_10'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>11.Memangkas dan membersihkan pokok	</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_11'],2);?></strong></td>
				</tr>	
				<tr>
					<td width="31%"><strong>12.Banci / sulaman</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_12'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>13.Pengkasian</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_13'],2);?></strong></td>
				</tr>	
				<tr>
					<td width="31%"><strong>14.	Perbelanjaan pelbagai</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b_14'],2);?></strong></td>
				</tr>
				<tr>
					<td width="31%"><strong>Jumlah (b)</strong></td>
					<td width="1%">:</td>
					<td width="68%"><strong><?php echo number_format($rowd['total_b'],2);?></strong></td>
				</tr>
			</table>
			<?php } else { ?>
			<p>Tiada</p>
			<?php } ?>
</div>
<input name="nolesen" type="hidden" id="nolesen" value="<?php echo $nolesen; ?>" />
</form>
<?php mysql_close($con);?>