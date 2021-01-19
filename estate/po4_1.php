<?php
$con = connect();
$valuebelanjaAmTahunSebelum[0] = $session_lesen;
$valuebelanjaAmTahunSebelum[1] = $_SESSION['tahun'] - 1;
$belanjaAmTahunSebelum = new user("belanja_am", $valuebelanjaAmTahunSebelum);
$umur = new user('age_profile', $session_lesen);
$umur2 = new user('esub', $session_lesen);

function kiraPerubahan($valueBaru, $valueLama) {
    $result = (($valueBaru - $valueLama) / $valueLama) * 100;
    return number_format($result, 2);
}

$q = "select * from belanja_am_kos where lesen = '" . $_SESSION['lesen'] . "' and thisyear = '" . $_SESSION['tahun'] . "'";
$r = mysql_query($q, $con);
$totalr = mysql_num_rows($r);
if ($totalr == 0) {
    $q = "INSERT INTO belanja_am_kos (
thisyear ,
lesen ,
emolumen ,
kos_ibupejabat ,
kos_agensi ,
kebajikan ,
sewa_tol ,
penyelidikan ,
perubatan ,
penyelenggaraan ,
cukai_keuntungan ,
penjagaan ,
kawalan ,
air_tenaga ,
perbelanjaan_pejabat ,
susut_nilai ,
perbelanjaan_lain ,
total_perbelanjaan,status
)
VALUES (
'" . $_SESSION['tahun'] . "', '" . $_SESSION['lesen'] . "', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0','0'
);
";
    $r = mysql_query($q, $con);
}

$var_nilai[0] = $_SESSION['lesen'];
$var_nilai[1] = $_SESSION['tahun'];
$belanja = new user('belanja_am', $var_nilai);
?>

<?php

function luas_data($table, $data, $tahunsebelum) {

    if (strlen($tahunsebelum) == 1) {
        $table = $table . "0" . substr($tahunsebelum, -2);
    } else {
        $table = $table . substr($tahunsebelum, -2);
    }
    $con = connect();
    $qblm = "SELECT sum($data) as $data FROM $table WHERE lesen = '" . $_SESSION['lesen'] . "' group by lesen";

    $rblm = mysql_query($qblm, $con);
    $rowblm = mysql_fetch_array($rblm);
    //echo "<br>";
    $data1 = $rowblm[$data];
    $jum_data = $data1;

    return $jum_data;
}

$ps1 = luas_data("tanam_semula", "tanaman_semula", $_SESSION['tahun'] - 1);
$ps2 = luas_data("tanam_semula", "tanaman_semula", $_SESSION['tahun'] - 2);
$ps3 = luas_data("tanam_semula", "tanaman_semula", $_SESSION['tahun'] - 3);

$pb1 = luas_data("tanam_baru", "tanaman_baru", $_SESSION['tahun'] - 1);
$pb2 = luas_data("tanam_baru", "tanaman_baru", $_SESSION['tahun'] - 2);
$pb3 = luas_data("tanam_baru", "tanaman_baru", $_SESSION['tahun'] - 3);



$pt1 = luas_data("tanam_tukar", "tanaman_tukar", $_SESSION['tahun'] - 1);
$pt2 = luas_data("tanam_tukar", "tanaman_tukar", $_SESSION['tahun'] - 2);
$pt3 = luas_data("tanam_tukar", "tanaman_tukar", $_SESSION['tahun'] - 3);
$jumlah_semua = $umur2->jumlahluasterakhir + $pb1 + $pb2 + $pb3 + $ps1 + $ps2 + $ps3 + $pt1 + $pt2 + $pt3;
//echo $pengguna->luastuai;
//echo $pengguna->jumlahakhir;
// jumlah (esub) + sum (penanaman_baru + penanaman_semula + penanaman_tukar)
$hektar = $jumlah_semua;
$fbb = new user('bts', $_SESSION['lesen']);
$bts = $fbb->purata_hasil_buah;
?>

<script type="text/javascript">
    $(function () {

        $("#helper").hide();
    });

    function tunjuk_bantu(str) {
        $("#penerangan").html(str);
        $().mousemove(function (e) {
            $("#helper").css("top", e.pageY + 3);
            $("#helper").css("left", e.pageX + 3);
        });
        $("#helper").show();
    }

    function sembunyi_bantu() {
        $("#helper").hide();
    }
</script>
<script type="text/javascript">
    function hantar(x)
    {
        document.form1.action = "save_perbelanjaan_am_kos.php?status=" + x;
        document.form1.target = "_parent";
        document.form1.submit();
    }

    function kiraanbaru(x) {

<?php
if (($jumlah_semua * 1) == 0) {
    $jumlah_semua = 0;
}
if (($bts * 1) == 0) {
    $bts = 0;
}
?>

        var hektar = <?= $jumlah_semua; ?>;
        var bts = <?= $bts; ?>;


        var nilai_x = $("#" + x).val();
        nilai_x = nilai_x.replace(",", "");

        var kos = nilai_x * 1;

        /** handle infinity division (if jumlahtan=0) */

        var kos_hektar = kos / hektar;
        var kos_tan = kos_hektar / bts;
        if (!isFinite(kos_hektar)) {
            kos_hektar = 0;
        }
        if (!isFinite(kos_tan)) {
            kos_tan = 0;
        }
        /** end of handle infinity division (if jumlahtan=0) */



        //alert("kos_hektar"+kos_hektar);
        //alert("kos_tan"+kos_tan); 





        $("#" + x + "_per_ha").html(kos_hektar);
        $("#" + x + "_per_ha").format({format: "#,###.00", locale: "us"});
        $("#" + x + "_per_bts").html(kos_tan);
        $("#" + x + "_per_bts").format({format: "#,###.00", locale: "us"});
        $("#" + x).format({format: "#,###.00", locale: "us"});

        var a = $("#emolumen").val();
        a = a.replace(",", "");
        var a_ha = $("#emolumen_per_ha").html();
        a_ha = a_ha.replace(",", "");
        var a_tan = $("#emolumen_per_bts").html();
        a_tan = a_tan.replace(",", "");

        var b = $("#kos_ibupejabat").val();
        b = b.replace(",", "");
        var b_ha = $("#kos_ibupejabat_per_ha").html();
        b_ha = b_ha.replace(",", "");
        var b_tan = $("#kos_ibupejabat_per_bts").html();
        b_tan = b_tan.replace(",", "");

        var c = $("#kos_agensi").val();
        c = c.replace(",", "");
        var c_ha = $("#kos_agensi_per_ha").html();
        c_ha = c_ha.replace(",", "");
        var c_tan = $("#kos_agensi_per_bts").html();
        c_tan = c_tan.replace(",", "");

        var d = $("#kebajikan").val();
        d = d.replace(",", "");
        var d_ha = $("#kebajikan_per_ha").html();
        d_ha = d_ha.replace(",", "");
        var d_tan = $("#kebajikan_per_bts").html();
        d_tan = d_tan.replace(",", "");

        var e = $("#sewa_tol").val();
        e = e.replace(",", "");
        var e_ha = $("#sewa_tol_per_ha").html();
        e_ha = e_ha.replace(",", "");
        var e_tan = $("#sewa_tol_per_bts").html();
        e_tan = e_tan.replace(",", "");

        var f = $("#penyelidikan").val();
        f = f.replace(",", "");
        var f_ha = $("#penyelidikan_per_ha").html();
        f_ha = f_ha.replace(",", "");
        var f_tan = $("#penyelidikan_per_bts").html();
        f_tan = f_tan.replace(",", "");

        var g = $("#perubatan").val();
        g = g.replace(",", "");
        var g_ha = $("#perubatan_per_ha").html();
        g_ha = g_ha.replace(",", "");
        var g_tan = $("#perubatan_per_bts").html();
        g_tan = g_tan.replace(",", "");

        var h = $("#penyelenggaraan").val();
        h = h.replace(",", "");
        var h_ha = $("#penyelenggaraan_per_ha").html();
        h_ha = h_ha.replace(",", "");
        var h_tan = $("#penyelenggaraan_per_bts").html();
        h_tan = h_tan.replace(",", "");

        var i = $("#cukai_keuntungan").val();
        i = i.replace(",", "");
        var i_ha = $("#cukai_keuntungan_per_ha").html();
        i_ha = i_ha.replace(",", "");
        var i_tan = $("#cukai_keuntungan_per_bts").html();
        i_tan = i_tan.replace(",", "");

        var j = $("#penjagaan").val();
        j = j.replace(",", "");
        var j_ha = $("#penjagaan_per_ha").html();
        j_ha = j_ha.replace(",", "");
        var j_tan = $("#penjagaan_per_bts").html();
        j_tan = j_tan.replace(",", "");

        var k = $("#kawalan").val();
        k = k.replace(",", "");
        var k_ha = $("#kawalan_per_ha").html();
        k_ha = k_ha.replace(",", "");
        var k_tan = $("#kawalan_per_bts").html();
        k_tan = k_tan.replace(",", "");

        var l = $("#air_tenaga").val();
        l = l.replace(",", "");
        var l_ha = $("#air_tenaga_per_ha").html();
        l_ha = l_ha.replace(",", "");
        var l_tan = $("#air_tenaga_per_bts").html();
        l_tan = l_tan.replace(",", "");

        var m = $("#perbelanjaan_pejabat").val();
        m = m.replace(",", "");
        var m_ha = $("#perbelanjaan_pejabat_per_ha").html();
        m_ha = m_ha.replace(",", "");
        var m_tan = $("#perbelanjaan_pejabat_per_bts").html();
        m_tan = m_tan.replace(",", "");

        var n = $("#susut_nilai").val();
        n = n.replace(",", "");
        var n_ha = $("#susut_nilai_per_ha").html();
        n_ha = n_ha.replace(",", "");
        var n_tan = $("#susut_nilai_per_bts").html();
        n_tan = n_tan.replace(",", "");

        var o = $("#perbelanjaan_lain").val();
        o = o.replace(",", "");
        var o_ha = $("#perbelanjaan_lain_per_ha").html();
        o_ha = o_ha.replace(",", "");
        var o_tan = $("#perbelanjaan_lain_per_bts").html();
        o_tan = o_tan.replace(",", "");

        var total = myParse(a) + myParse(b) + myParse(c) + myParse(d) + myParse(e) + myParse(f) + myParse(g) + myParse(h) + myParse(i) + myParse(j) + myParse(k) + myParse(l) + myParse(m) + myParse(n) + myParse(o);
        //alert(myParse(a_ha));
        var total_ha = myParse(a_ha) + myParse(b_ha) + myParse(c_ha) + myParse(d_ha) + myParse(e_ha) + myParse(f_ha) + myParse(g_ha) + myParse(h_ha) + myParse(i_ha) + myParse(j_ha) + myParse(k_ha) + myParse(l_ha) + myParse(m_ha) + myParse(n_ha) + myParse(o_ha);

        var total_tan = myParse(a_tan) + myParse(b_tan) + myParse(c_tan) + myParse(d_tan) + myParse(e_tan) + myParse(f_tan) + myParse(g_tan) + myParse(h_tan) + myParse(i_tan) + myParse(j_tan) + myParse(k_tan) + myParse(l_tan) + myParse(m_tan) + myParse(n_tan) + myParse(o_tan);

        $("#total_perbelanjaan").val(total);
        $("#total_perbelanjaan").format({format: "#,###.00", locale: "us"});

        $("#total_kos_hektar").html(total_ha);
        $("#total_b_kos_per_hektar").val(total_ha);
        $("#total_b_kos_per_hektar").format({format: "#,###.00", locale: "us"});
        $("#total_kos_hektar").format({format: "#,###.00", locale: "us"});

        $("#total_bts_all").html(total_tan);
        $("#total_bts_all").format({format: "#,###.00", locale: "us"});



    }

    function myParse(num) {
        var n2 = num.split(",")
        out = 0
        for (var i = 0; i < n2.length; i++) {
            out *= 1000;
            out += parseFloat(n2[i])
        }
        return out
    }
</script>

<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="facebox/facebox.js" type="text/javascript"></script> 
<script>
    jQuery(document).ready(function ($) {
        $('a[rel*=facebox]').facebox()
    })
</script>

<style type="text/css">
    <!--
    .active_field {
        border: 1px #CC3300 solid;
        text-align: center;
        font-size: 13px;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
    }
    .field_active {
        border-color: #FFCC99;
        border-width: 1px;
        border-style: solid;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        color: #CCCCCC;
    }
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }
    #bantuan {
        position:absolute;
        left:522px;
        top:36px;
        width:500px;
        height:218px;
        z-index:1;
        background-image: url(../themes/base/images/ui-bg_flat_0_aaaaaa_40x100.png);
        opacity: 0.99;
    }
    -->
</style>
<script>
    var check = 0;
    function checkProgress()
    {

        for (i = 0; i <= document.form1.elements.length; i++)
        {
            if (document.form1.elements[i].value == "")
            {
                document.form1.action = 'home.php?id=home&finished=true&po2=<? echo $_GET['po2']; ?>&pol=<? echo $_GET['pol']; ?>&po3=<? echo $_GET['po3']; ?>&po4=<? echo $_GET['po4'];?>&po5=<? echo $_GET['po5']; ?>&po6=<? echo $_GET['po6']; ?>&po7=<? echo $_GET['po7']; ?>&po8=false';
            }
        }

    }

</script>

<script type="text/javascript">

    function openScript(url, width, height) {
        var Win = window.open(url, "openScript", 'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no');
    }

</script>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<script type="text/javascript" src="../text_js.js"></script>
<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>

<script language="javascript">
    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    function field_click(obj) {
        $(obj).format({format: "#,###,###.00", locale: "us"});
        document.getElementById("emolumen").className = "field_edited";
        $(obj).removeClass("field_edited");
        $(obj).addClass("field_active");
    }


    var hektar = <?= $jumlah_semua; ?>;
    var bts = <?= $bts; ?>;
    var total_perbelanjaan = 0.00;

    function field_blur_1(obj, obj_id) {

        kos = obj * 1;
        total_perbelanjaan += kos;

        kos_hektar = kos / hektar;
        kos_tan = kos / bts;

        kos_hektar = bulatkan(kos_hektar);
        kos_tan = bulatkan(kos_tan);
        total_perbelanjaan = bulatkan(kos);

        $("#" + obj_id + "_per_ha").html(kos_hektar);
        $("#" + obj_id + "_per_ha").format({format: "#,###.00", locale: "us"});
        $("#" + obj_id + "_per_bts").html(kos_tan);
        $("#" + obj_id + "_per_bts").format({format: "#,###.00", locale: "us"});


        document.form1.total_perbelanjaan.value = total_perbelanjaan;
        $("#total_perbelanjaan").format({format: "#,###.00", locale: "us"});

        $(obj_id).format({format: "#,###.00", locale: "us"});
    }
</script>

<style type="text/css">
    <!--
    .style3 {color: #0000FF}
    .style4 {font-weight: bold}
    .kecil{ font-size:11px;}

    -->
</style>
<form id="form1" name="form1" method="post" action="">
    <table class="tableCss" align="center">

        <tr>
            <td colspan="3"><b>
                    <h2><?= setstring('mal', 'MAKLUMAT  PERBELANJAAN AM', 'en', 'GENERAL EXPENSES INFORMATION'); ?></h2></b></td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td width="198"><strong><?= setstring('mal', 'Jumlah Keluasan Tanaman', 'en', 'Total Crop Area'); ?></strong></td>
            <td width="422"><strong><span class="style3"><?php echo number_format($jumlah_semua, 3); ?></span> <?= setstring('mal', 'Hektar', 'en', 'Hectares'); ?></strong></td>
            <td> </td>
        </tr>
        <tr>
            <td colspan="2"> </td>
            <td> </td>
        </tr>
      <!--  <tr>
          <td colspan="3"><h1><strong><?= setstring('mal', 'Nota : Klik pada butiran kos untuk isi maklumat berkaitan', 'en', 'Notes: Click on cost details to fill the related information'); ?> </strong></h1></td>
          </tr>
        <tr>
          <td colspan="2"> </td>
          <td width="290"> </td>
        </tr>
        <tr>-->
        <td colspan="3"><table width="100%" cellspacing="0"  frame="box" class="subTable">
                <tr>
                    <td height="41" align="center" background="../images/tb_BG.gif"> </td>
                    <td background="../images/tb_BG.gif"><b><u><?= setstring('mal', 'Butiran-butiran kos', 'en', 'Cost details'); ?> </u></b></td>
                    <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></strong></div>          <div align="center"><strong>(RM)</strong></div></td>
                    <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></strong></div>
                        <div align="center"><strong>(RM)</strong></div></td>
                    <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?></strong></div>
                        <div align="center"><strong>(RM)</strong></div></td>
                    <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Perubahan Kos Per Hektar dengan Tahun Lepas', 'en', 'Cost Different with Last year'); ?></strong></div>          
                        <div align="center"><strong> (%)</strong></div></td>
                </tr>

                <tr valign="top">
                    <td width="24" height="37" align="center" bgcolor="#AEFFAE">1.</td>
                    <td width="296" bgcolor="#AEFFAE"> <span class="style4">
                            <?= setstring('mal', 'Emolumen untuk eksekutif dan bukan eksekutif', 'en', 'Executive and non-executive emoluments '); ?>
                        </span>          <br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Gaji dan elaun', 'en', 'Emoluments and allowances'); ?>
                            , 
                            <?= setstring('mal', 'Kerja lebih masa', 'en', 'Overtime'); ?>
                            , 
                            <?= setstring('mal', 'Perubatan', 'en', 'Medical'); ?>
                            , 
                            <?= setstring('mal', 'Perjalanan', 'en', 'Travelling'); ?>
                            , 
                            <?= setstring('mal', 'Bonus', 'en', 'Bonuses'); ?>
                            , 
                            <?= setstring('mal', 'Insuran peribadi', 'en', 'Personal Insurance'); ?>
                            , 
                            <?= setstring('mal', 'Insentif', 'en', 'Incentive'); ?>
                            , 
                            <?= setstring('mal', 'KWSP', 'en', 'EPF'); ?>
                            , 
                            <?= setstring('mal', 'PERKESO', 'en', 'SOCSO'); ?>
                            , 
                            <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                            )        </span></td>
                    <td width="158" bgcolor="#AEFFAE"><div align="center">
                            <input onKeypress="keypress(event)" name="emolumen" type="text" onchange="kiraanbaru('emolumen')"  autocomplete="off" class="active_field" onclick="field_click(this)"  id="emolumen" value="<?= number_format($belanja->emolumen, 2); ?>" />
                        </div></td>
                    <td width="100" bgcolor="#AEFFAE"><div align="center">
                            <span id="emolumen_per_ha"><?php
                                $per_ha1 = $belanja->emolumen / $hektar;
                                $per_ha1 = round($per_ha1, 2);
                                echo number_format($per_ha1, 2);
                                ?></span>
                        </div></td>
                    <td width="109" bgcolor="#AEFFAE"><div align="center" id="emolumen_per_bts">
                            <?php
                            $per_bts1 = $per_ha1 / $bts;
                            echo number_format($per_bts1, 2);
                            ?>
                        </div></td>
                    <td width="260" bgcolor="#AEFFAE">
                        <div align="center" id="emolumen_per_kos">
                            <?php echo kiraPerubahan($per_ha1, $belanjaAmTahunSebelum->emolumen / $hektar); ?>
                        </div></td>
                </tr>
                <tr valign="top">
                    <td height="33" align="center">2.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Kos ibu pejabat', 'en', 'Headquarters Cost'); ?>
                        </span>
                        <br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Yuran/bayaran pentadbiran', 'en', 'Administration fees'); ?>
                            , 
                            <?= setstring('mal', 'Yuran/bayaran lesen', 'en', 'Licensing fees'); ?>
                            , 
                            <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                            )        </span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="kos_ibupejabat" type="text" onchange="kiraanbaru('kos_ibupejabat')"  autocomplete="off" onclick="field_click(this)" class="active_field" id="kos_ibupejabat" value="<?= number_format($belanja->kos_ibupejabat, 2); ?>" />
                        </div></td>
                    <td><div align="center" id="kos_ibupejabat_per_ha"><?php
                            $per_ha2 = $belanja->kos_ibupejabat / $hektar;
                            $per_ha2 = round($per_ha2, 2);
                            echo number_format($per_ha2, 2);
                            ?></div></td>
                    <td><div align="center" id="kos_ibupejabat_per_bts">
                            <?php
                            $per_bts2 = $per_ha2 / $bts;
                            echo number_format($per_bts2, 2);
                            ?>        </div></td>
                    <td>
                        <div align="center">
                            <?php echo kiraPerubahan($per_ha2, $belanjaAmTahunSebelum->kos_ibupejabat / $hektar); ?>
                        </div></td>
                </tr>
                <tr valign="top">
                    <td height="32" align="center" bgcolor="#AEFFAE">3.</td>
                    <td bgcolor="#AEFFAE"  ><span class="style4">
                            <?= setstring('mal', 'Kos agensi dan yuran professional', 'en', 'Agency cost and professional fees'); ?>
                        </span>
                        <br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Perbelanjaan lawatan agen', 'en', 'Visiting agent fees'); ?>
                            ,
                            <?= setstring('mal', 'Perbelanjaan perundangan dan lain-lain profesional', 'en', 'Legal and others professional fees'); ?>
                            , 
                            <?= setstring('mal', 'Yuran/bayaran khidmat nasihat lawatan/penanaman', 'en', 'Visiting/planting consultation fees'); ?>
                            , 
                            <?= setstring('mal', 'Yuran/bayaran ahli agromoni', 'en', 'Agronomist fees'); ?>
                            , 
                            <?= setstring('mal', 'Yuran/bayaran audit', 'en', 'Audit fees'); ?>
                            , 
                            <?= setstring('mal', 'Yuran/bayaran sokongan sistem komputer estet', 'en', 'Estate\'s computer system support'); ?>
                            , 
                            <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                            )        </span></td>
                    <td bgcolor="#AEFFAE"><div align="center">
                            <input onKeypress="keypress(event)" name="kos_agensi" type="text" onchange="kiraanbaru('kos_agensi')"  autocomplete="off" onclick="field_click(this)" class="active_field" id="kos_agensi" value="<?= number_format($belanja->kos_agensi, 2); ?>" />
                        </div></td>
                    <td bgcolor="#AEFFAE"><div align="center" id="kos_agensi_per_ha"><?php
                            $per_ha3 = $belanja->kos_agensi / $hektar;
                            $per_ha3 = round($per_ha3, 2);

                            echo number_format($per_ha3, 2);
                            ?></div></td>
                    <td bgcolor="#AEFFAE"><div align="center" id="kos_agensi_per_bts"> <?php
                            $per_bts3 = $per_ha3 / $bts;
                            echo number_format($per_bts3, 2);
                            ?></div></td>
                    <td bgcolor="#AEFFAE">
                        <div align="center">
                            <?php echo kiraPerubahan($per_ha3, $belanjaAmTahunSebelum->kos_agensi / $hektar); ?>
                        </div></td>
                </tr>
                <tr valign="top">
                    <td height="36" align="center">4.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Kebajikan yang tidak dibayar kepada buruh', 'en', 'Welfare not directly paid to labour'); ?>
                        </span> <br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                            , 
                            <?= setstring('mal', 'Ganjaran persaraan', 'en', 'Retirement rewards'); ?>
                            , 
                            <?= setstring('mal', 'Pampasan kepada pekerja', 'en', 'Compensation'); ?>
                            , 
                            <?= setstring('mal', 'Subsidi', 'en', 'Subsidies'); ?>
                            , 
                            <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                            )</span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="kebajikan" type="text" onchange="kiraanbaru('kebajikan')"  autocomplete="off" onclick="field_click(this)" class="active_field" id="kebajikan" value="<?= number_format($belanja->kebajikan, 2); ?>"  />
                        </div></td>
                    <td><div align="center" id="kebajikan_per_ha"><?php
                            $per_ha4 = $belanja->kebajikan / $hektar;
                            $per_ha4 = round($per_ha4, 2);
                            echo number_format($per_ha4, 2);
                            ?></div></td>
                    <td><div align="center" id="kebajikan_per_bts"> <?php
                            $per_bts4 = $per_ha4 / $bts;
                            echo number_format($per_bts4, 2);
                            ?>
                        </div></td>
                    <td><div align="center">
                            <?php echo kiraPerubahan($per_ha4, $belanjaAmTahunSebelum->kebajikan / $hektar); ?>
                        </div></td>
                </tr>
                <tr valign="top" bgcolor="#AEFFAE">
                    <td height="36" align="center">5.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Sewa, TOL dan insuran', 'en', 'Rent, TOL and insurance'); ?>
                        </span>
                        <br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Cukai tanah', 'en', 'Quit rent'); ?>
                            , 
                            <?= setstring('mal', 'Yuran/bayaran TOL', 'en', 'TOL fees'); ?>
                            ,
                            <?= setstring('mal', 'Insurans kebakaran/kecurian', 'en', 'Fire Insurance'); ?>
                            , 
                            <?= setstring('mal', 'Insuran', 'en', 'Insurances'); ?>
                            , 
                            <?= setstring('mal', 'Penghantaran', 'en', 'Delivery'); ?>
                            ,
                            <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                            )        </span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="sewa_tol" type="text" onchange="kiraanbaru('sewa_tol')"  autocomplete="off" onclick="field_click(this)" class="active_field" id="sewa_tol" value="<?= number_format($belanja->sewa_tol, 2); ?>"  />
                        </div></td>
                    <td><div align="center" id="sewa_tol_per_ha"><?php
                            $per_ha5 = $belanja->sewa_tol / $hektar;
                            $per_ha5 = round($per_ha5, 2);
                            echo number_format($per_ha5, 2);
                            ?></div></td>
                    <td><div align="center" id="sewa_tol_per_bts"> <?php
                            $per_bts5 = $per_ha5 / $bts;
                            echo number_format($per_bts5, 2);
                            ?>
                        </div></td>
                    <td>
                        <div align="center">
                            <?php echo kiraPerubahan($per_ha5, $belanjaAmTahunSebelum->sewa_tol / $hektar); ?>
                        </div></td>
                </tr>
                <tr valign="top">
                    <td height="35" align="center">6.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Penyelidikan dan pembangunan', 'en', 'Research and development'); ?>
                        </span>
                        <br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Penyelidikan dan pembangunan', 'en', 'Research and development'); ?>
                            )        </span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="penyelidikan" type="text" onchange="kiraanbaru('penyelidikan')"  autocomplete="off" onclick="field_click(this)" class="active_field" id="penyelidikan" value="<?= number_format($belanja->penyelidikan, 2); ?>"  />
                        </div></td>
                    <td><div align="center" id="penyelidikan_per_ha"><?php
                            $per_ha6 = $belanja->penyelidikan / $hektar;
                            $per_ha6 = round($per_ha6, 2);
                            echo number_format($per_ha6, 2);
                            ?></div></td>
                    <td><div align="center" id="penyelidikan_per_bts"> <?php
                            $per_bts6 = $per_ha6 / $bts;
                            echo number_format($per_bts6, 2);
                            ?>
                        </div></td>
                    <td>
                        <div align="center">
                            <?php echo kiraPerubahan($per_ha6, $belanjaAmTahunSebelum->penyelidikan / $hektar); ?>
                        </div></td>
                </tr>
                <tr valign="top" bgcolor="#AEFFAE">
                    <td height="36" align="center">7.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Perubatan', 'en', 'Medical'); ?>
                        </span>
                        <br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Bayaran lawatan pegawai perubatan (VMO)', 'en', 'Visiting Medical Officer fees'); ?>
                            , 
                            <?= setstring('mal', 'Pelbagai ubat dan peralatan', 'en', 'Medicine and Instrument'); ?>
                            , 
                            <?= setstring('mal', 'Peralatan sukan/permainan', 'en', 'Sports/recreations equipment'); ?>
                            , 
                            <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                            )        </span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="perubatan" type="text" onchange="kiraanbaru('perubatan')"  autocomplete="off" onclick="field_click(this)" class="active_field" id="perubatan" value="<?= number_format($belanja->perubatan, 2); ?>"/>
                        </div></td>
                    <td><div align="center" id="perubatan_per_ha"><?php
                            $per_ha7 = $belanja->perubatan / $hektar;
                            $per_ha7 = round($per_ha7, 2);
                            echo number_format($per_ha7, 2);
                            ?></div></td>
                    <td><div align="center" id="perubatan_per_bts" > <?php
                            $per_bts7 = $per_ha7 / $bts;
                            echo number_format($per_bts7, 2);
                            ?>
                        </div></td>
                    <td>
                        <div align="center">
                            <?php echo kiraPerubahan($per_ha7, $belanjaAmTahunSebelum->perubatan / $hektar); ?>
                        </div></td>
                </tr>
                <tr valign="top">
                    <td height="33" align="center">8.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Penyelenggaraan bangunan', 'en', 'Building maintenance'); ?>
                        </span><br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Pembaikan dan pengecatan', 'en', 'Painting and repair'); ?>
                            , 
                            <?= setstring('mal', 'Perabut dan <em>fitting</em> untuk banglow/kuaters/rumah kedai/bengkel', 'en', 'Fitting for bungalow/quarters/shophouse/workshop'); ?>
                            , 
                            <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                            )        </span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="penyelenggaraan" type="text" onchange="kiraanbaru('penyelenggaraan')"  autocomplete="off" onclick="field_click(this)" class="active_field" id="penyelenggaraan" value="<?= number_format($belanja->penyelenggaraan, 2); ?>" />
                        </div></td>
                    <td><div align="center" id="penyelenggaraan_per_ha"><?php
                            $per_ha8 = $belanja->penyelenggaraan / $hektar;
                            $per_ha8 = round($per_ha8, 2);
                            echo number_format($per_ha8, 2);
                            ?></div></td>
                    <td><div align="center" id="penyelenggaraan_per_bts">
                            <?php
                            $per_bts8 = $per_ha8 / $bts;
                            echo number_format($per_bts8, 2);
                            ?>
                        </div></td>
                    <td>
                        <div align="center">
                            <?php echo kiraPerubahan($per_ha8, $belanjaAmTahunSebelum->penyelenggaraan / $hektar); ?>
                        </div></td>
                </tr>
                <tr valign="top" bgcolor="#AEFFAE">
                    <td height="34" align="center">9.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Cukai keuntungan luar biasa', 'en', 'Windfall profit tax'); ?>
                        </span><br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Cukai keuntungan', 'en', 'Profit tax'); ?>
                            )</span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="cukai_keuntungan" type="text" onchange="kiraanbaru('cukai_keuntungan')"  autocomplete="off" onclick="field_click(this)" class="active_field" id="cukai_keuntungan" value="<?= number_format($belanja->cukai_keuntungan, 2); ?>" />
                        </div></td>
                    <td><div align="center" id="cukai_keuntungan_per_ha"><?php
                            $per_ha9 = $belanja->cukai_keuntungan / $hektar;
                            $per_ha9 = round($per_ha9, 2);
                            echo number_format($per_ha9, 2);
                            ?></div></td>
                    <td><div align="center" id="cukai_keuntungan_per_bts">
                            <?php
                            $per_bts9 = $per_ha9 / $bts;
                            echo number_format($per_bts9, 2);
                            ?>        </div></td>
                    <td>
                        <div align="center">
                            <?php echo kiraPerubahan($per_ha9, $belanjaAmTahunSebelum->cukai_keuntungan / $hektar); ?>
                        </div></td>
                </tr>
                <tr valign="top">
                    <td height="36" align="center">10.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Penjagaan dan pemuliharaan', 'en', 'Upkeep and conservation'); ?>
                        </span><br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Anti-vektor', 'en', 'Anti-vector'); ?>
                            , 
                            <?= setstring('mal', 'Pembersihan part-parit monsun', 'en', 'Drain repair and cleaning'); ?>
                            , 
                            <?= setstring('mal', 'Pengorekan lubang sampah', 'en', 'Pits and upkeep'); ?>
                            , 
                            <?= setstring('mal', 'Parit dan bentung', 'en', 'Drainage and culvert'); ?>
                            , 
                            <?= setstring('mal', 'Pemotongan rumput', 'en', 'Grass cutting expenses'); ?>
                            ,
                            <?= setstring('mal', 'Penjagaan pejabat/banglow/kuaters/taman', 'en', 'Upkeep of office/buanglow/quarters/park'); ?>
                            , 
                            <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                            )</span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="penjagaan" type="text" onchange="kiraanbaru('penjagaan')" autocomplete="off" onclick="field_click(this)" class="active_field" id="penjagaan" value="<?= number_format($belanja->penjagaan, 2); ?>" />
                        </div></td>
                    <td><div align="center" id="penjagaan_per_ha"><?php
                            $per_ha10 = $belanja->penjagaan / $hektar;
                            $per_ha10 = round($per_ha10, 2);

                            echo number_format($per_ha10, 2);
                            ?></div></td>
                    <td><div align="center" id="penjagaan_per_bts"> <?php
                            $per_bts10 = $per_ha10 / $bts;
                            echo number_format($per_bts10, 2);
                            ?>

                        </div></td>
                    <td>
                        <div align="center">
                            <?php echo kiraPerubahan($per_ha10, $belanjaAmTahunSebelum->penjagaan / $hektar); ?>
                        </div></td>
                </tr>
                <tr valign="top" bgcolor="#AEFFAE">
                    <td height="33" align="center">11.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Kawalan keselamatan', 'en', 'Security Control'); ?>
                        </span><br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Gaji pegawai keselamatan', 'en', 'Auxillary police/watchman salary'); ?>
                            , 
                            <?= setstring('mal', 'Penjagaan pos keselamatan dan pagar ', 'en', 'Routine upkeep of security post and fences'); ?>
                            , 
                            <?= setstring('mal', 'Yuran/bayaran lesen senjata', 'en', 'Guns license fees'); ?>
                            , 
                            <?= setstring('mal', 'Pembaikan senjata dan peluru', 'en', 'Guns and repair'); ?>
                            , 
                            <?= setstring('mal', 'Yuran/bayaran penghantaran wang gaji', 'en', 'Securicor/payroll collect fees'); ?>
                            , 
                            <?= setstring('mal', 'Tiket jambatan timbang dan <em>seals</em>', 'en', 'Seals and Weighbrigde Ticket'); ?>
                            )</span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="kawalan" type="text" onchange="kiraanbaru('kawalan')" autocomplete="off" onclick="field_click(this)" class="active_field" id="kawalan" value="<?= number_format($belanja->kawalan, 2); ?>" />
                        </div></td>
                    <td><div align="center" id="kawalan_per_ha"><?php
                            $per_ha11 = $belanja->kawalan / $hektar;
                            $per_ha11 = round($per_ha11, 2);

                            echo number_format($per_ha11, 2);
                            ?></div></td>
                    <td><div align="center" id="kawalan_per_bts">
                            <?php
                            $per_bts11 = $per_ha11 / $bts;
                            echo number_format($per_bts11, 2);
                            ?>        </div></td>
                    <td>
                        <div align="center">
                            <?php echo kiraPerubahan($per_ha11, $belanjaAmTahunSebelum->kawalan / $hektar); ?>
                        </div></td>
                </tr>
                <tr valign="top">
                    <td height="30" align="center">12.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Air dan tenaga', 'en', 'Water and power'); ?>
                        </span><br />

                        <span class="kecil">(
                            <?= setstring('mal', 'Perbelanjaan elektrik/air', 'en', 'Water and power bills'); ?>
                            , 
                            <?= setstring('mal', 'Wayar kabel', 'en', 'Cabling'); ?>
                            ,
                            <?= setstring('mal', 'Mentol lampu', 'en', 'Replace bulbs'); ?>
                            , 
                            <?= setstring('mal', 'Bahan kimia', 'en', 'Chemicals'); ?>
                            , 
                            <?= setstring('mal', 'Penyelenggaraan dan servis pam air ', 'en', 'Maintenance and services of water pump'); ?>
                            , 
                            <?= setstring('mal', 'Penyelenggaraan kawasan tadahan', 'en', 'Maintenance of water reservoir'); ?>
                            , 
                            <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                            )</span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="air_tenaga" type="text" onchange="kiraanbaru('air_tenaga')"  autocomplete="off" onclick="field_click(this)" class="active_field" id="air_tenaga" value="<?= number_format($belanja->air_tenaga, 2); ?>" />
                        </div></td>
                    <td><div align="center" id="air_tenaga_per_ha"><?php
                            $per_ha12 = $belanja->air_tenaga / $hektar;
                            $per_ha12 = round($per_ha12, 2);

                            echo number_format($per_ha12, 2);
                            ?></div></td>
                    <td><div align="center" id="air_tenaga_per_bts">
                            <?php
                            $per_bts12 = $per_ha12 / $bts;
                            echo number_format($per_bts12, 2);
                            ?>        </div></td>
                    <td><div align="center"><?php echo kiraPerubahan($per_ha12, $belanjaAmTahunSebelum->air_tenaga / $hektar); ?></div></td>
                </tr>
                <tr valign="top" bgcolor="#AEFFAE">
                    <td height="31" align="center">13.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Perbelanjaan pejabat', 'en', 'Office expenses'); ?>
                        </span> <br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Telefon/fax/telegram', 'en', 'Telephone/fax/telegram fees'); ?>
                            , 
                            <?= setstring('mal', 'Yuran/bayaran post/kurier', 'en', 'Postage and parcel freight fees'); ?>
                            , 
                            <?= setstring('mal', 'Alatan pelbagai', 'en', 'Miscellanous'); ?>
                            , 
                            <?= setstring('mal', 'Alatan komputer', 'en', 'Computer stationaries and supplies'); ?>
                            , 
                            <?= setstring('mal', 'Majalah dan suratkhabar', 'en', 'Magazine and newspaper'); ?>
                            , 
                            <?= setstring('mal', 'Buku cek', 'en', 'Cheque book'); ?>
                            , 
                            <?= setstring('mal', 'Caj bank', 'en', 'Bank charges'); ?>
                            , 
                            <?= setstring('mal', 'Servis komputer/peralatan pejabat', 'en', 'Computer/office equipment services'); ?>
                            , 
                            <?= setstring('mal', 'Pembersih pejabat ', 'en', 'Office cleaners'); ?>
                            , 
                            <?= setstring('mal', 'Pelbagai barang pejabat', 'en', 'Misc. office equipments'); ?>
                            , 
                            <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                            )</span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="perbelanjaan_pejabat" type="text" onchange="kiraanbaru('perbelanjaan_pejabat')"  autocomplete="off" onclick="field_click(this)" class="active_field" id="perbelanjaan_pejabat" value="<?= number_format($belanja->perbelanjaan_pejabat, 2); ?>"/>
                        </div></td>
                    <td><div align="center" id="perbelanjaan_pejabat_per_ha"><?php
                            $per_ha13 = $belanja->perbelanjaan_pejabat / $hektar;
                            $per_ha13 = round($per_ha13, 2);

                            echo number_format($per_ha13, 2);
                            ?></div></td>
                    <td><div align="center" id="perbelanjaan_pejabat_per_bts">
                            <?php
                            $per_bts13 = $per_ha13 / $bts;
                            echo number_format($per_bts13, 2);
                            ?>        </div></td>
                    <td><div align="center"><?php echo kiraPerubahan($per_ha13, $belanjaAmTahunSebelum->perbelanjaan_pejabat / $hektar); ?></div></td>
                </tr>
                <tr valign="top">
                    <td height="31" align="center">14.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Susutnilai', 'en', 'Value depreciation'); ?>
                        </span><br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Pelunasan tanah pajakan', 'en', 'Statutory Payment cess'); ?>
                            , 
                            <?= setstring('mal', 'Susutnilai bangunan/mesin/kenderaan/ peralatan pejabat', 'en', 'Depreciation of building/machine/transport/office equipment'); ?>
                            )</span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="susut_nilai" type="text" onchange="kiraanbaru('susut_nilai')"  autocomplete="off" onclick="field_click(this)" class="active_field" id="susut_nilai" value="<?= number_format($belanja->susut_nilai, 2); ?>" />
                        </div></td>
                    <td><div align="center" id="susut_nilai_per_ha"><?php
                            $per_ha14 = $belanja->susut_nilai / $hektar;
                            $per_ha14 = round($per_ha14, 2);

                            echo number_format($per_ha14, 2);
                            ?></div></td>
                    <td><div align="center" id="susut_nilai_per_bts">
                            <?php
                            $per_bts14 = $per_ha14 / $bts;
                            echo number_format($per_bts14, 2);
                            ?>
                        </div></td>
                    <td><div align="center"><?php echo kiraPerubahan($per_ha14, $belanjaAmTahunSebelum->susut_nilai / $hektar); ?></div></td>
                </tr>
                <tr valign="top" bgcolor="#AEFFAE">
                    <td height="31" align="center">15.</td>
                    <td><span class="style4">
                            <?= setstring('mal', 'Perbelanjaan lain', 'en', 'Other expenses'); ?>
                        </span><br />
                        <span class="kecil">(
                            <?= setstring('mal', 'Keraian pelawat', 'en', 'Entertain visitors'); ?>
                            , 
                            <?= setstring('mal', 'Penerbitan pertanian', 'en', 'Agricultural publication'); ?>
                            , 
                            <?= setstring('mal', 'Yuran/bayaran seminar/persidangan', 'en', 'Seminar/conference fees'); ?>
                            , 
                            <?= setstring('mal', 'Pembaikan notis/papan tanda', 'en', 'Repairs to Notices/signboard'); ?>
                            , 
                            <?= setstring('mal', 'Derma/sumbangan', 'en', 'Sundry charitable donation'); ?>
                            , 
                            <?= setstring('mal', 'Lain-lain', 'en', 'Others'); ?>
                            )        </span></td>
                    <td><div align="center">
                            <input onKeypress="keypress(event)" name="perbelanjaan_lain" type="text" onchange="kiraanbaru('perbelanjaan_lain')"  autocomplete="off" onclick="field_click(this)" class="active_field" id="perbelanjaan_lain" value="<?= number_format($belanja->perbelanjaan_lain, 2); ?>"/>
                        </div></td>
                    <td><div align="center" id="perbelanjaan_lain_per_ha"><?php
                            $per_ha15 = $belanja->perbelanjaan_lain / $hektar;
                            $per_ha15 = round($per_ha15,2);

                            echo number_format($per_ha15, 2);
                            ?></div></td>
                    <td><div align="center" id="perbelanjaan_lain_per_bts">
                            <?php
                            $per_bts15 = $per_ha15 / $bts;
                            echo number_format($per_bts15, 2);
                            ?>        </div></td>
                    <td><div align="center"><?php echo kiraPerubahan($per_ha15, $belanjaAmTahunSebelum->perbelanjaan_lain / $hektar); ?></div></td>
                </tr>
                <tr>
                    <td height="17" align="center"> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td height="31" align="center"> </td>
                    <td><div align="right"><strong><?= setstring('mal', 'Jumlah :', 'en', 'Total'); ?> </strong></div></td>
                    <td bgcolor="#FFCC66"><div align="center">
                            <?php $total_belanja_all = $belanja->emolumen + $belanja->kos_ibupejabat + $belanja->kos_agensi + $belanja->kebajikan + $belanja->sewa_tol + $belanja->penyelidikan + $belanja->perubatan + $belanja->penyelenggaraan + $belanja->cukai_keuntungan + $belanja->penjagaan + $belanja->kawalan + $belanja->air_tenaga + $belanja->perbelanjaan_pejabat + $belanja->susut_nilai + $belanja->perbelanjaan_lain; ?>
                            <input onKeypress="keypress(event)" name="total_perbelanjaan" type="text"  autocomplete="off" id="total_perbelanjaan"  style="font-weight:bold; text-align:center" value="<?php
                            echo number_format($total_belanja_all, 2);
                            ?>" size="15"  />
                        </div></td>
                    <td bgcolor="#FFCC66"><div align="center" id="total_kos_hektar">
                            <?php
                            //echo $per_ha1 ."+". $per_ha2 ."+". $per_ha3 ."+". $per_ha4 ."+". $per_ha5 ."+". $per_ha6 ."+". $per_ha7 ."+". $per_ha8 ."+". $per_ha9 ."+". $per_ha10 ."+". $per_ha11 ."+". $per_ha12 ."+". $per_ha13 ."+". $per_ha14 ."+". $per_ha15."<br>";
                            //$total_kos_hektar = $per_ha1 + $per_ha2 + $per_ha3 + $per_ha4 + $per_ha5 + $per_ha6 + $per_ha7 + $per_ha8 + $per_ha9 + $per_ha10 + $per_ha11 + $per_ha12 + $per_ha13 + $per_ha14 + $per_ha15;
                            $total_kos_hektar =round($total_belanja_all/$jumlah_semua,2);
                            echo number_format($total_kos_hektar, 2);
                            //$total_kos_hektar = round($total_kos_hektar, 2, PHP_ROUND_HALF_UP);
                            ?>
                        </div>
                        <input name="total_b_kos_per_hektar" type="hidden" id="total_b_kos_per_hektar" value="<?php echo round($total_kos_hektar, 2); ?>" />
                    </td>
                    <td bgcolor="#FFCC66"><div align="center" id="total_bts_all">
                            <?php
                            $total_bts_all = $per_bts1 + $per_bts2 + $per_bts3 + $per_bts4 + $per_bts5 + $per_bts6 + $per_bts7 + $per_bts8 + $per_bts9 + $per_bts10 + $per_bts11 + $per_bts12 + $per_bts13 + $per_bts14 + $per_bts15;
                            echo number_format($total_bts_all, 2);
                            ?>        </div></td>
                    <td bgcolor="#FFCC66">
                        <div align="center"><strong>
                                <?php echo kiraPerubahan($total_kos_hektar, $belanjaAmTahunSebelum->total_perbelanjaan / $hektar); ?>
                            </strong></div></td>
                </tr>
                <tr>
                    <td height="17" align="center"> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>


            </table></td>


        <tr>
            <td colspan="3">
                <div align="center">
                    <input name="thisyear" type="hidden" id="thisyear" value="<?= $_SESSION['tahun']; ?>" />
                    <input name="type" type="hidden" id="type" value="pengangkutan" />
                    <?php
                    if (isset($_GET['print'])) {
                        ?>
                        <input type="submit" value="Print" />
                        <?php
                    } else {
                        ?><div id="no-print">
                            <input type="button" name="simpan_sementara" id="simpan_sementara" value=<?= setstring('mal', '"Simpan"', 'en', '"Save"'); ?> onclick="hantar(2);" />
                            <input type="button" name="simpan" id="simpan" value=<?= setstring('mal', '"Simpan & Seterusnya"', 'en', '"Save &amp; Next"'); ?> onclick="hantar(1);" />

                            <input type="button" name="simpan" id="simpan" value=<?= setstring('mal', '"Kembali"', 'en', '"Back"'); ?> onclick="history.go(-1);" />
                        </div>
                        <?php
                    }
                    ?>
                </div></td>
        </tr>
        <tr>
            <td colspan="3"> </td>
        </tr>
    </table>
</form> 
