	<script type="text/javascript">
		$(function() {
		$("#sw-simpan").hide();
		$("#sw-simpan").click(function() {
			$("#borang").hide();
			$("#borang").html(html);
			$("#borang").show();
			$("#sw-sunting").show();
			$("#sw-simpan").hide();
		});
		$("#sw-sunting").click(function() {
			$("#sw-sunting").hide();
			$("#sw-simpan").show();
			$("#borang").hide();
			html = $("#borang").html();
			$.post("po1_1.php?r=1","",function(out) {
				$("#borang").html(out);
				$("#borang").show("slow");
			});
		});
		});
		var html = null;
	</script>
	<style type="text/css">
<!--
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-transform: none;
}

-->
    </style>
<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="facebox/facebox.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
})
</script>
<link rel="stylesheet" href="../js/tabber/example.css" TYPE="text/css" MEDIA="screen">
<link rel="stylesheet" href="../js/tabber/example-print.css" TYPE="text/css" MEDIA="print">

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
    //alert('setCookie(' + c + ',' + i + ')');
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

<!-- Include the tabber code -->
<script type="text/javascript" src="../js/tabber/tabber.js"></script>
<?php

	$id = $lesen;
	$con = connect();
	$q ="SELECT * FROM esub WHERE No_Lesen_Baru = '$id' LIMIT 1";
	$r = mysqli_query($con, $q);
	$j =0;
	while($row=mysqli_fetch_array($r)){
?>
<div class="tabber" id="profile">
<?php //echo $_GET['lesen']; ?>
     <div class="tabbertab">
	  <h2>Estate Profile</h2>
	  <p>

<table width="95%" border="0" align="center">
	<tr>
    	<td><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" style="border:1px #333333 solid">
          <tr>
            <td width="23%"><strong>Estate Name </strong></td>
            <td width="1%"><strong>:</strong></td>
            <td width="76%" colspan="2"><?php echo $row['Nama_Estet']; ?></td>
          </tr>
          <tr>
            <td><strong>License (New)</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php echo $row['No_Lesen_Baru']; ?></td>
          </tr>

          <tr>
            <td><strong>Address</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php echo $row['Alamat1']; $row['Alamat2']; ?></td>
          </tr>
          <tr>
            <td><strong>Postcode</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php echo $row['Poskod']; ?></td>
          </tr>
          <tr>
            <td><strong>District</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php echo $row['Bandar']; ?></td>
          </tr>
          <tr>
            <td><strong>State</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php echo $row['Negeri']; ?></td>
          </tr>
          <tr>
            <td><strong>Phone No. </strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php echo $row['No_Telepon']; ?></td>
          </tr>
          <tr>
            <td><strong>Fax No. </strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php echo $row['No_Fax']; ?></td>
          </tr>
          <tr>
            <td><strong>E-mail</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php echo $row['Email']; ?></td>
          </tr>
          <tr>
            <td><strong>Manager</strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php echo $row['Nama_Estet']; ?></td>
          </tr>
          <tr>
            <td><strong>Main Company </strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php echo $row['Syarikat_Induk']; ?></td>
          </tr>
          <tr>
            <td><strong>Premise District </strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php echo $row['Daerah_Premis']; ?></td>
          </tr>
          <tr>
            <td><strong>State Premise </strong></td>
            <td><strong>:</strong></td>
            <td colspan="2"><?php echo $row['Negeri_Premis']; ?></td>
          </tr>

          <tr>
            <td colspan="4" bgcolor="#999999"><label></label>
                <br /></td>
          </tr>
      </table></td>
    </tr>

    <tr>
    	<td><div id="borang">
   <table width="100%" align="center" class="tableCss" style="border:#333333 solid 1px;">
      <tr>
        <td width="201" align="left" valign="top">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="201" align="left" valign="top"><b>Company Type </b></td>
        <td width="7"><div align="center"><strong>:</strong></div></td>
        <td width="674"><?php echo $row['syarikat']; ?></td>
      </tr>
      <tr>
        <td width="201" align="left" valign="top"><strong></b>Association Member </strong></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td><?php echo $row['keahlian']; ?></td>
      </tr>
      <tr>
        <td width="201" align="left" valign="top"><strong>Palm Oil Mill Integration </strong></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td><?php if ($row['integrasi'] == 'Y') {
			echo "<img src='../images/accepted_48.png' width='16' height='16' /> YA";
			}
			else {
			echo "<img src='../images/remove.png' width='20' height='20' /> TIDAK";
			} ?>
		</td>
      </tr>
      <tr>
        <td width="201" align="left" valign="top"><strong>Mill Integration </strong></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td><img src="../images/accepted_48.png" width="16" height="16" /> Ya</td>
      </tr>
      <tr>
        <td colspan="3" align="left" valign="top"><strong>Land Usage Percentage </strong></td>
      </tr>
      <tr>
        <td colspan="3" align="left" valign="top"><div id="percent_soil"></div></td>
      </tr>
      <tr>
        <td width="201" align="left" valign="top"><strong>Estate Earth Surface </strong></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td>Berbukit</td>
      </tr>
      <tr>
        <td width="201" align="left" valign="top"><strong>Hilly Land Percentage </strong></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td>35 %</td>
      </tr>
      <tr>
        <td width="201" align="left" valign="top"><strong>Gradient Percentage over 25' </strong></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td>43 %</td>
      </tr>
</table>
    	</div></td>
    </tr>
</table>
<br />
<div align="center">
<script type="text/javascript" src="ampie/swfobject.js"></script>
	<script type="text/javascript">
		// <![CDATA[
		var so = new SWFObject("ampie/ampie.swf", "ampie", "520", "400", "8", "#FFFFFF");
		so.addVariable("path", "ampie/");
		so.addVariable("settings_file", encodeURIComponent("ampie/settings.xml"));
		so.addVariable("data_file", encodeURIComponent("ampie/data.xml"));
		so.write("percent_soil");
		// ]]>
	</script>
	</div>
	<br />
	  </p>
     </div>
</div>
<?php }  ?>
