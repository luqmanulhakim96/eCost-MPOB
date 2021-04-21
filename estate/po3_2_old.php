<?php
extract($_REQUEST);

$umur = new user('age_profile', $session_lesen);
$nilai_bts = new user('bts', $session_lesen);

$var = "";
if (isset($_GET['penjagaan'])) {
    $var = "matang&penuaian&jaga=true";
}

if (isset($_GET['penuaian'])) {
    $var = "matang&pengangkutan&tuai=true&jaga=true";
}
if (isset($_GET['pengangkutan'])) {
    $var = "matang&pengangkutan&tuai=true&jaga=true&angkut=true";
}
$luas_ha = $pengguna->jumlahluas;
//echo "<br>"
//echo $pengguna->jumlahakhir
if (!isset($luas_ha)) {
    $luas_ha = 0;
}
$tan_ha = $nilai_bts->purata_hasil_buah;
if (!isset($tan_ha)) {
    $tan_ha = 0;
}
//echo "<br>"
?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<script type="text/javascript" src="../text_js.js"></script>
<script type="text/javascript" src="../jquery.numberformatter-1.1.2.js"></script>
<script language="javascript">


    function kiraan_baru(obj, jenis)
    {
        var total_ha = <?= $luas_ha ?>;
        var total_tan = <?= $tan_ha ?>;
        //alert(jenis);
        if (number_only(obj)) {

            jumlah_jaga = 0;
            jumlah_jaga_kos = 0;
            jumlah_jaga_tan = 0;


            if (jenis == "anak") {
                //alert(jenis);
                tanambaru = total_ha;
                tanbaru = total_tan;
                a = document.getElementById("b_1a").value;
                a = a.replace(/,/g, "");
                a1 = Number(a) / Number(tanambaru);
                a2 = Number(a1) / Number(tanbaru);
                $("#s1").html(a1);
                $("#s1").format({format: "#,###.00", locale: "us"});
                //alert(a2);
                $("#s1a_tan").html(a2);
                $("#s1a_tan").format({format: "#,###.00", locale: "us"});

                b = document.getElementById("b_1b").value;
                b = b.replace(/,/g, "");
                b1 = Number(b) / Number(tanambaru);
                $("#s2").html(b1);
                $("#s2").format({format: "#,###.00", locale: "us"});
                b2 = Number(b1) / Number(tanbaru);
                $("#s2a_tan").html(b2);
                $("#s2a_tan").format({format: "#,###.00", locale: "us"});

                c = document.getElementById("b_1c").value;
                c = c.replace(/,/g, "");
                c1 = Number(c) / Number(tanambaru);
                $("#s3").html(c1);
                $("#s3").format({format: "#,###.00", locale: "us"});
                c2 = Number(c1) / Number(tanbaru);
                $("#s3a_tan").html(c2);
                $("#s3a_tan").format({format: "#,###.00", locale: "us"});


                abc = Number(a) + Number(b) + Number(c);

                if (abc > 0) {
                    document.getElementById("total_b_1").value = abc;
                    $("#total_b_1").format({format: "#,###.00", locale: "us"});
                }



                d = document.getElementById("b_3a").value;
                d = d.replace(/,/g, "");
                d1 = Number(d) / Number(tanambaru);
                $("#s6").html(d1);
                $("#s6").format({format: "#,###.00", locale: "us"});
                d2 = Number(d1) / Number(tanbaru);
                $("#s6a_tan").html(d2);
                $("#s6a_tan").format({format: "#,###.00", locale: "us"});

                e = document.getElementById("b_3b").value;
                e = e.replace(/,/g, "");
                e1 = Number(e) / Number(tanambaru);
                $("#s7").html(e1);
                $("#s7").format({format: "#,###.00", locale: "us"});
                e2 = Number(e1) / Number(tanbaru);
                $("#s7a_tan").html(e2);
                $("#s7a_tan").format({format: "#,###.00", locale: "us"});

                f = document.getElementById("b_3c").value;
                f = f.replace(/,/g, "");
                f1 = Number(f) / Number(tanambaru);
                $("#s8").html(f1);
                $("#s8").format({format: "#,###.00", locale: "us"});
                f2 = Number(f1) / Number(tanbaru);
                $("#s8a_tan").html(f2);
                $("#s8a_tan").format({format: "#,###.00", locale: "us"});

                g = document.getElementById("b_3d").value;
                g = g.replace(/,/g, "");
                g1 = Number(g) / Number(tanambaru);
                $("#s9").html(g1);
                $("#s9").format({format: "#,###.00", locale: "us"});
                g2 = Number(g1) / Number(tanbaru);
                $("#s9a_tan").html(g2);
                $("#s9a_tan").format({format: "#,###.00", locale: "us"});

                defg = Number(d) + Number(e) + Number(f) + Number(g);
                if (defg > 0) {
                    document.getElementById("total_b_3").value = defg;
                    $("#total_b_3").format({format: "#,###.00", locale: "us"});
                }

            }


            if (jenis == "a") {
                document.getElementById("b_1a").value = 0;
                $("#b_1a").format({format: "#,###.00", locale: "us"});
                document.getElementById("b_1b").value = 0;
                $("#b_1b").format({format: "#,###.00", locale: "us"});
                document.getElementById("b_1c").value = 0;
                $("#b_1c").format({format: "#,###.00", locale: "us"});
            }
            if (jenis == "b") {
                document.getElementById("b_3a").value = 0;
                $("#b_3a").format({format: "#,###.00", locale: "us"});
                document.getElementById("b_3b").value = 0;
                $("#b_3b").format({format: "#,###.00", locale: "us"});
                document.getElementById("b_3c").value = 0;
                $("#b_3c").format({format: "#,###.00", locale: "us"});
                document.getElementById("b_3d").value = 0;
                $("#b_3d").format({format: "#,###.00", locale: "us"});

            }





            for (j = 1; j <= 12; j++) {
                jumlahj = document.getElementById("total_b_" + j).value;
                jumlahj = jumlahj.replace(/,/g, "");

                jumlah_jaga = Number(jumlah_jaga) + Number(jumlahj);//kos penjagaan
                jumlahj_kos = Number(jumlahj) / Number(total_ha);
                jumlahj_kos = bulatkan(jumlahj_kos);
                //alert(total_tan);
                jumlahj_tan = Number(jumlahj_kos) / Number(total_tan);
                /** handle infinity division (if jumlahtan=0) */
                if(!isFinite(jumlahj_tan)){
                    jumlahj_tan=0;
                }
                /** end of handle infinity division (if jumlahtan=0) */
                jumlahj_tan = bulatkan(jumlahj_tan);

                jumlah_jaga_tan = Number(jumlah_jaga_tan) + Number(jumlahj_tan);
                jumlah_jaga_kos = Number(jumlah_jaga_kos) + Number(jumlahj_kos);//kos perbelanjaan per ha

                $("#total_b_" + j).format({format: "#,###.00", locale: "us"});
                $("#jaga" + j).html(jumlahj_kos);
                $("#jaga" + j).format({format: "#,###.00", locale: "us"});

                $("#s" + j + "_tan").html(jumlahj_tan);
                $("#s" + j + "_tan").format({format: "#,###.00", locale: "us"});

            }
            //alert(jumlah_jaga_tan);
            document.getElementById("total_a").value = jumlah_jaga;
            $("#total_a").format({format: "#,###.00", locale: "us"});
            $("#total_a_perha").html(jumlah_jaga_kos);
            $("#total_a_perha").format({format: "#,###.00", locale: "us"});
            $("#total_b_kos_per_hektar").val(jumlah_jaga_kos);

            $("#total_a_pertan").html(jumlah_jaga_tan);
            $("#total_a_pertan").format({format: "#,###.00", locale: "us"});



            //------------------------------------------------- keseluruhan -------------------------------------
        } else {
            $("#" + obj).html("0.00");
        }
        $(obj).format({format: "#,###.00", locale: "us"});

    }
</script>


<script language="javascript">
    function kiraan_baru_tuai(obj)
    {
        var total_ha = <?= $luas_ha ?>;
        var total_tan = <?= $tan_ha ?>;


        if (number_only(obj)) {

            jumlah_jaga = 0;
            jumlah_jaga_kos = 0;
            jumlah_jaga_tan = 0;

            for (j = 1; j <= 4; j++) {
                jumlahj = document.getElementById("a_" + j).value;
                jumlahj = jumlahj.replace(/,/g, "");

                jumlah_jaga = Number(jumlah_jaga) + Number(jumlahj);//kos penjagaan
                jumlahj_kos = Number(jumlahj) / Number(total_ha);
                jumlahj_kos = bulatkan(jumlahj_kos);
                jumlahj_tan = Number(jumlahj_kos) / Number(total_tan);
                /** handle infinity division (if jumlahtan=0) */
                if(!isFinite(jumlahj_tan)){
                    jumlahj_tan=0;
                }
                /** end of handle infinity division (if jumlahtan=0) */
                jumlahj_tan = bulatkan(jumlahj_tan);

                jumlah_jaga_tan = Number(jumlah_jaga_tan) + Number(jumlahj_tan);
                jumlah_jaga_kos = Number(jumlah_jaga_kos) + Number(jumlahj_kos);//kos perbelanjaan per ha

                $("#a_" + j).format({format: "#,###.00", locale: "us"});
                $("#t" + j).html(jumlahj_kos);
                $("#t" + j).format({format: "#,###.00", locale: "us"});

                $("#t" + j + "_tan").html(jumlahj_tan);
                $("#t" + j + "_tan").format({format: "#,###.00", locale: "us"});

            }
            //alert(jumlah_jaga_tan);
            document.getElementById("total_b").value = jumlah_jaga;
            $("#total_b").format({format: "#,###.00", locale: "us"});
            $("#total_b_perha").html(jumlah_jaga_kos);
            $("#total_b_kos_per_hektar").val(jumlah_jaga_kos);
            $("#total_b_perha").format({format: "#,###.00", locale: "us"});
            $("#total_b_pertan").html(jumlah_jaga_tan);

            $("#total_b_pertan").format({format: "#,###.00", locale: "us"});



            //------------------------------------------------- keseluruhan -------------------------------------
        } else {
            $("#" + obj).html("0.00");
        }
        $(obj).format({format: "#,###.00", locale: "us"});

    }
</script>


<script language="javascript">
    function kiraan_baru_angkut(obj, jenis)
    {
        var total_ha = <?= $luas_ha ?>;
        var total_tan = <?= $tan_ha ?>;

//alert(obj);
//alert(jenis);

        if (number_only(obj)) {

            jumlah_jaga = 0;
            jumlah_jaga_kos = 0;
            jumlah_jaga_tan = 0;

            if (jenis == "anak") {
                tanambaru = total_ha;
                tanbaru = total_tan;
                a = document.getElementById("a_1").value;
                a = a.replace(/,/g, "");
                a1 = Number(a) / Number(tanambaru);
                a2 = Number(a1) / Number(tanbaru);
                $("#a1").html(a1);
                $("#a1").format({format: "#,###.00", locale: "us"});
                $("#a1_tan").html(a2);
                $("#a1_tan").format({format: "#,###.00", locale: "us"});

                b = document.getElementById("a_2").value;
                b = b.replace(/,/g, "");
                b1 = Number(b) / Number(tanambaru);
                $("#a2").html(b1);
                $("#a2").format({format: "#,###.00", locale: "us"});
                b2 = Number(b1) / Number(tanbaru);
                $("#a2_tan").html(b2);
                $("#a2_tan").format({format: "#,###.00", locale: "us"});

                c = document.getElementById("a_3").value;
                c = c.replace(/,/g, "");
                c1 = Number(c) / Number(tanambaru);
                $("#a3").html(c1);
                $("#a3").format({format: "#,###.00", locale: "us"});
                c2 = Number(c1) / Number(tanbaru);
                $("#a3_tan").html(c2);
                $("#a3_tan").format({format: "#,###.00", locale: "us"});

                abc = Number(a) + Number(b) + Number(c);
                //alert(abc);
                if (abc > 0) {
                    document.getElementById("total_b_1").value = abc;
                    $("#total_b_1").format({format: "#,###.00", locale: "us"});
                }


                d = document.getElementById("b_1a").value;
                d = d.replace(/,/g, "");
                d1 = Number(d) / Number(tanambaru);
                $("#a4").html(d1);
                $("#a4").format({format: "#,###.00", locale: "us"});
                d2 = Number(d1) / Number(tanbaru);

                $("#a4_tan").html(d2);
                $("#a4_tan").format({format: "#,###.00", locale: "us"});
                e = document.getElementById("b_1b").value;
                e = e.replace(/,/g, "");
                e1 = Number(e) / Number(tanambaru);
                $("#a5").html(e1);
                $("#a5").format({format: "#,###.00", locale: "us"});
                e2 = Number(e1) / Number(tanbaru);
                $("#a5_tan").html(e2);
                $("#a5_tan").format({format: "#,###.00", locale: "us"});



                f = document.getElementById("b_1c").value;
                f = f.replace(/,/g, "");
                f1 = Number(f) / Number(tanambaru);
                $("#a6").html(f1);
                $("#a6").format({format: "#,###.00", locale: "us"});
                f2 = Number(f1) / Number(tanbaru);
                $("#a6_tan").html(f2);
                $("#a6_tan").format({format: "#,###.00", locale: "us"});

                def = Number(d) + Number(e) + Number(f);

                if (def > 0) {
                    document.getElementById("total_b_2").value = def;
                    $("#total_b_2").format({format: "#,###.00", locale: "us"});
                }





            } else {
                if (jenis == "a") {
                    document.getElementById("a_1").value = 0;
                    $("#a_1").format({format: "#,###.00", locale: "us"});
                    document.getElementById("a_2").value = 0;
                    $("#a_2").format({format: "#,###.00", locale: "us"});
                    document.getElementById("a_3").value = 0;
                    $("#a_3").format({format: "#,###.00", locale: "us"});
                }
                if (jenis == "b") {
                    document.getElementById("b_1a").value = 0;
                    $("#b_1a").format({format: "#,###.00", locale: "us"});
                    document.getElementById("b_1b").value = 0;
                    $("#b_1b").format({format: "#,###.00", locale: "us"});
                    document.getElementById("b_1c").value = 0;
                    $("#b_1c").format({format: "#,###.00", locale: "us"});
                }
            }


            for (j = 1; j <= 3; j++) {
                jumlahj = document.getElementById("total_b_" + j).value;

                jumlahj = jumlahj.replace(/,/g, "");
                jumlah_jaga = Number(jumlah_jaga) + Number(jumlahj);//kos penjagaan
                jumlahj_kos = Number(jumlahj) / Number(total_ha);
                jumlahj_kos = bulatkan(jumlahj_kos);
                jumlahj_tan = Number(jumlahj_kos) / Number(total_tan);
                /** handle infinity division (if jumlahtan=0) */
                if(!isFinite(jumlahj_tan)){
                    jumlahj_tan=0;
                }
                /** end of handle infinity division (if jumlahtan=0) */
                jumlahj_tan = bulatkan(jumlahj_tan);

                jumlah_jaga_tan = Number(jumlah_jaga_tan) + Number(jumlahj_tan);
                jumlah_jaga_kos = Number(jumlah_jaga_kos) + Number(jumlahj_kos);//kos perbelanjaan per ha

                $("#total_b_" + j).format({format: "#,###.00", locale: "us"});
                $("#jaga" + j).html(jumlahj_kos);
                $("#jaga" + j).format({format: "#,###.00", locale: "us"});

                $("#s" + j + "_tan").html(jumlahj_tan);
                $("#s" + j + "_tan").format({format: "#,###.00", locale: "us"});

            }

            document.getElementById("total_a").value = jumlah_jaga;
            $("#total_a").format({format: "#,###.00", locale: "us"});
            $("#total_a_perha").html(jumlah_jaga_kos);
            $("#total_a_perha").format({format: "#,###.00", locale: "us"});
            $("#total_b_kos_per_hektar").val(jumlah_jaga_kos);

            $("#total_a_pertan").html(jumlah_jaga_tan);
            $("#total_a_pertan").format({format: "#,###.00", locale: "us"});

            jumlah_all = document.getElementById("jumlah_allb").value;
            //jumlah_all = jumlah_all.replace(/,/g,"");
            jumlah_all = Number(jumlah_all) + Number(jumlah_jaga);
            $("#jumlah_all").html(jumlah_all);
            $("#jumlah_all").format({format: "#,###.00", locale: "us"});

            jumlah_all_kos = document.getElementById("jumlah_all_kosb").value;
            //jumlah_all_kos = jumlah_all_kos.replace(/,/g,"");
            jumlah_all_kos = Number(jumlah_all_kos) + Number(jumlah_jaga_kos);
            $("#jumlah_all_kos").html(jumlah_all_kos);
            $("#jumlah_all_kos").format({format: "#,###.00", locale: "us"});

            jumlah_all_tan = document.getElementById("jumlah_all_tanb").value;
            //jumlah_all_tan = jumlah_all_tan.replace(/,/g,"");
            jumlah_all_tan = Number(jumlah_all_tan) + Number(jumlah_jaga_tan);
            $("#jumlah_all_tan").html(jumlah_all_tan);
            $("#jumlah_all_tan").format({format: "#,###.00", locale: "us"});



            //------------------------------------------------- keseluruhan -------------------------------------
        } else {
            $("#" + obj).html("0.00");
        }
        $(obj).format({format: "#,###.00", locale: "us"});

    }
</script>



<style type="text/css">
    <!--
    .style55 {
        font-size: 14px;
        font-weight: bold;
    }
    .style2 {color: #CC0000}
    .style56 {font-weight: bold}
    .style57 {font-weight: bold}
    .style58 {font-weight: bold}
    -->
</style>
<?php if ($var != "matang&pengangkutan&tuai=true&jaga=true&angkut=true") { ?>

    <script language="javascript">
        function hantar(x)
        {
            document.form1.action = "save_kos_matang.php?status=" + x;
            document.form1.target = "_parent";
            document.form1.submit();
        }
        function hantar_a(x)
        {
            document.form2.action = "save_kos_matang.php?status=" + x;
            document.form2.target = "_parent";
            document.form2.submit();
        }
        function hantar_b(x)
        {
            document.form2.action = "save_kos_matang.php?status=" + x;
            document.form2.target = "_parent";
            document.form2.submit();
        }
    </script>
    <?php
    if (isset($_GET['penjagaan'])) {
        $stat = $jaga->status;
    }
    if (isset($_GET['penuaian'])) {
        $stat = $tuai->status;
    }
    if (isset($_GET['pengangkutan'])) {
        $stat = $angkut->status;
    }
    ?>



    <script language="javascript">
        var pitmid = false;
        window.onbeforeunload = function () {
            if (pitmid == false)
                var ok = confirm("<?= setstring('mal', 'Simpan sebelum keluar?', 'en', 'Save before proceed?'); ?>");
            if (ok == true) {
                document.form1.action = 'save_kos_matang.php?status=<?= $stat; ?>';
                document.form1.submit();
            }
        }



    </script>


    <script language="javascript">
        function gonext(a, b, c)
        {
            d = true;

            if (c == "delete") {
                var d = confirm('<?= setstring('mal', 'Buang data ini?', 'en', 'Delete this data?'); ?>');
            }
            if (d) {
                window.location.href = 'add_matang.php?jumlah=' + a + '&tahun=' + b + '&type=' + c;
            }
        }
    </script>

<?php } ?>
<?php
if (isset($button2)) {
    echo "<script>window.location.href='home.php?id=umum'</script>";
}
?>

<table width="90%" align="center" class="tableCss" aria-describedby="kosMatangEstate">

    <tr>
        <td colspan="5" class="style1">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5" class="style55"><strong><?= setstring('mal', 'MAKLUMAT KAWASAN MATANG', 'en', 'MATURED AREA INFORMATION'); ?></strong></td>
    </tr>
    <tr>
        <td colspan="5" class="style55"><strong><?= setstring('mal', '(DITANAM PADA TAHUN', 'en', '(PLANTED ON'); ?> <span class="style2"><?php
$tahun = $_SESSION['tahun'];
echo $tahun_sebelum = $tahun - 4;
?></span> <?= setstring('mal', 'ATAU SEBELUMNYA)', 'en', 'OR BEFORE)'); ?></strong></td>
    </tr>
    <tr>
        <td colspan="5">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="5"><span class="style56">
<?= setstring('mal', 'Keluasan kawasan matang pada tahun lepas (terakhir dari e-sub)', 'en', 'Matured area on last year (Final from e-sub)'); ?>
            </span></td>
    </tr>
    <tr>
        <td width="358" height="31"><span style="color:#0000CC; font-weight:bold;">
<?php
$a = $pengguna->luastuai;
echo number_format($a, 2);
?>
            </span> &nbsp;<?= setstring('mal', 'Hektar', 'en', 'Hectares'); ?></td>
        <td colspan="4">&nbsp;</td>
    </tr>
                <?php if (isset($_GET['penjagaan'])) { ?>
        <form action="" method="post" name="form1" id="form1">

            <tr>
                <td colspan="5"><?= setstring('mal', 'Sila nyatakan tanaman sawit mengikut tahun ditanam', 'en', 'Please state the palm crop according to planted year'); ?> </td>
            </tr>


            <tr>
                <td colspan="5"><table width="100%" aria-describedby="kosMatangEstate1">
                        <tr>
                            <td width="18%"><strong><?= setstring('mal', 'Tahun ditanam ', 'en', 'Planted Year'); ?></strong></td>
                            <td width="82%"><strong><?= setstring('mal', 'Keluasan (Hektar)', 'en', 'Area (Hectares)'); ?> </strong></td>
                        </tr>

    <?php
    $tahunnow = $_SESSION['tahun'];
    $sebelumtahun = $tahunnow - 44;

    if ($umur->total != 0) {
        $total_umur = 0;
        for ($j = 0; $j < $umur->total; $j++) {
            ?>
                                <tr valign="top">
                                    <td><select name="tahun2" id="tahun2">
                                            <option value="#">-Pilih-</option>
                                            <option value="sebelum <?= $sebelumtahun; ?>">Sebelum <?= $sebelumtahun; ?></option>
                                <?php
                                $up = $umur->keluasan[$j];
                                echo $total_umur = $total_umur + $up;
                                ?>
            <?php
            $tahun_y = $_SESSION['tahun'];
            $tahun_3 = $tahun_y - 4;


            for ($i = $sebelumtahun; $i <= $tahun_3; $i++) {
                ?>
                                                <option value="<?= $i; ?>" <?php if ($umur->tahun_tanam[$j] == $i) { ?>selected="selected"<?php } ?>><?= $i; ?></option>
                                            <?php } ?>

                                        </select></td>
                                    <td><input onKeypress="keypress(event)" name="jumlah2" type="text" id="jumlah2" style="background-color:#FFFF99; font-weight:bold" onchange="gonext(this.value,<?= $umur->tahun_tanam[$j]; ?>, 'edit')" value="<?= $up; ?>" />
                                        <span class="viewsahaja">    <a href="#" onclick="gonext('',<?= $umur->tahun_tanam[$j]; ?>, 'delete')">[<?= setstring('mal', 'Buang', 'en', 'Delete'); ?>]</a> </span></td>
                                </tr>  <?php } ?>
                                    <?php } ?>

                        <tr valign="top">
                            <td><select name="tahun" id="tahun">
                                    <option value="#"><?= setstring('mal', '-Pilih-', 'en', '-Choose-'); ?></option>
                                    <option value="sebelum <?= $sebelumtahun; ?>"><?= setstring('mal', 'Sebelum', 'en', 'Before'); ?> <?= $sebelumtahun; ?></option>

                        <?php
                        $tahun_y = $_SESSION['tahun'];
                        $tahun_3 = $tahun_y - 4;
                        for ($i = $sebelumtahun; $i <= $tahun_3; $i++) {
                            ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
    <?php } ?>
                                </select></td>
                            <td><input onKeypress="keypress(event)" name="jumlah" type="text" id="jumlah" style="background-color:#FFFF99; font-weight:bold" onchange="gonext(this.value, document.form1.tahun.value, 'add')" value="0" />        </td>
                        </tr>


                        <tr valign="top">
                            <td><div align="right"><strong><?= setstring('mal', 'Jumlah', 'en', 'Total'); ?></strong></div></td>
                            <td><input onKeypress="keypress(event)" name="totalj" type="text" id="totalj" style="background-color:#FFCC66; font-weight:bold" value="<?= $total_umur; ?>" />
    <?php
    $total_umur = (int) $total_umur;
    $a_semua = (int) $pengguna->luastuai;

    $pjl = (int) $pengguna->jumlahluas;

    if ($a_semua != $total_umur) {
        echo "<br>";
        echo setstring('mal', '<strong>Tanaman sawit mengikut tahun <span class=\"style3\">TIDAK SAMA</span> dengan keluasan kawasan matang</strong>', 'en', 'Total plantation by year is <span class=\"style3\">NOT EQUAL</span> to mature area');
    }
    if ($total_umur > $a_semua) {
        echo "<br>";
        echo setstring('mal', '<strong>Tanaman sawit mengikut tahun <span class=\"style3\">MELEBIHI</span> keluasan kawasan matang</strong>', 'en', 'Total plantation by year <span class=\"style3\">EXCEED</span> to mature area');
    }
    ?></td>
                        </tr>
                    </table></td>
            </tr>
                            <?php } ?>

        <tr>
            <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="5"><span class="style57">
<?= setstring('mal', 'Purata keluasan kawasan matang pada tahun lepas', 'en', 'Mean of matured area on last year'); ?>
                </span></td>
        </tr>
        <tr>
            <td height="27"><span style="color:#0000CC; font-weight:bold;">
<?php
$b = $pengguna->jumlahluas;
echo number_format($b, 2);
?>
                </span>      <?= setstring('mal', 'Hektar', 'en', 'Hectares'); ?></td>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td height="27" colspan="5"><span class="style58">
                    <?= setstring('mal', 'Purata hasil pada tahun lepas', 'en', 'Mean of yield on last year'); ?>
                </span></td>
        </tr>
        <tr>
            <td height="27"><span style="color:#0000CC; font-weight:bold;">
<?php
$c = $tan_ha;
if ($c == 0) {
    echo setstring('mal', 'Tiada Hasil', 'en', 'No yield');
} else {
    echo number_format($c, 2);
}
?>
                </span> &nbsp;<?= setstring('mal', 'Tan/Ha/Tahun', 'en', 'Tonne/Hectares/Year'); ?></td>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td width="124">&nbsp;</td>
            <td width="122">&nbsp;</td>
            <td width="97">&nbsp;</td>
            <td width="152">&nbsp;</td>
        </tr>
<?php
if (isset($_GET['penjagaan'])) {
    ?>

            <tr>
                <td colspan="5">
                    <table width="100%" cellpadding="0" cellspacing="0"  frame="box" class="subTable" aria-describedby="kosMatangEstate2">
                        <tr>
                            <td height="52" background="../images/tb_BG.gif"><div align="center"><strong>a.</strong></div></td>
                            <td background="../images/tb_BG.gif"><strong><?= setstring('mal', 'Penjagaan', 'en', 'Upkeep'); ?></strong></td>
                            <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos', 'en', 'Cost'); ?></strong></div>          <div align="center"><strong>(RM)</strong></div></td>
                            <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?></strong></div>
                                <div align="center"><strong>(RM)</strong></div></td>
                            <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?></strong> <strong></strong></div>
                                <div align="center"><strong>(RM)</strong></div></td>
                            <td background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Perubahan Kos Per Hektar dengan Tahun Lepas', 'en', 'Cost Different with Last year'); ?></strong></div>
                                <div align="center"><strong>(%)</strong></div></td>
                        </tr>

                        <tr bgcolor="#AEFFAE">
                            <td width="23" height="37" align="center">1.</td>
                            <td width="310"><?= setstring('mal', 'Meracun', 'en', 'Weeding'); ?> &nbsp;</td>
                            <td width="133"><div align="center">


    <?php
    if ($jaga->total_b_1 == 0) {
        $jaga->total_b_1 = $jaga->b_1a + $jaga->b_1b + $jaga->b_1c;
    }
    ?>
                                    <input onKeypress="keypress(event)" name="total_b_1" type="text" id="total_b_1"  style="font-weight:bold; text-align:center" value="<?= number_format($jaga->total_b_1, 2); ?>" size="20" class="field_active" onchange="kiraan_baru(this, 'a');" />


                                </div></td>
                            <td width="120"><div align="center"><span id="jaga1"><?php $x1 = ($jaga->total_b_1 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td width="139"><div align="center"><span id="s1_tan"><?php $y1 = ($x1 / $tan_ha);
                                echo number_format($y1, 2); ?></span></div></td>
                            <td width="149"><div align="center"><span id="total_racun_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->total_b_1 / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="32" align="center">&nbsp;</td>
                            <td bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pembelian racun', 'en', 'Purchase of weedicide'); ?></td>
                            <td bgcolor="#CCCCFF"><div align="center">
                                    <input onKeypress="keypress(event)" name="b_1a" type="text" class="field_active" id="b_1a" onchange="kiraan_baru(this, 'anak');
                                            ;"  value="<?= number_format($jaga->b_1a, 2); ?>" size="15" />
                                </div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s1"><?php $x1 = ($jaga->b_1a / $b);
                                echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s1a_tan"><?php $y1 = ($x1 / $tan_ha);
                                echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s1_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->b_1a / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="32" align="center">&nbsp;</td>
                            <td bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Upah meracun', 'en', 'Labour cost for weeding'); ?></td>
                            <td bgcolor="#CCCCFF"><div align="center">
                                    <input onKeypress="keypress(event)" name="b_1b" type="text" class="field_active" id="b_1b" onchange="kiraan_baru(this, 'anak');
                                            " value="<?= number_format($jaga->b_1b, 2); ?>" size="15" />
                                </div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s2"><?php $x1 = ($jaga->b_1b / $b);
                                echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s2a_tan">
    <?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?>
                                    </span></div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s2_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->b_1b / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="32" align="center">&nbsp;</td>
                            <td bgcolor="#CCCCFF">iii.  <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?></td>
                            <td bgcolor="#CCCCFF"><div align="center">
                                    <input onKeypress="keypress(event)" name="b_1c" type="text" class="field_active" id="b_1c" onchange="kiraan_baru(this, 'anak');
                                            "  value="<?= number_format($jaga->b_1c, 2); ?>" size="15" />
                                </div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s3"><?php $x1 = ($jaga->b_1c / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s3a_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#CCCCFF"><div align="center"><span id="s3_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->b_1c / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="32" align="center" bgcolor="#AEFFAE">2.</td>
                            <td bgcolor="#AEFFAE"><?= setstring('mal', 'Kawalan lalang', 'en', 'Lalang Control'); ?> </td>
                            <td bgcolor="#AEFFAE"><div align="center">
                                    <input onKeypress="keypress(event)" name="total_b_2" type="text" class="field_active" id="total_b_2" onchange="kiraan_baru(this, '')" onclick="field_click(this)" value="<?= number_format($jaga->total_b_2, 2); ?>" size="20" />
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga2"><?php $x1 = ($jaga->total_b_2 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s2_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s4_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->total_b_2 / $b); ?></span></div></td>
                        </tr>
                        <tr bgcolor="#AEFFAE">
                            <td height="39" align="center" bgcolor="#FFFFFF">3.</td>
                            <td bgcolor="#FFFFFF"><?= setstring('mal', 'Membaja', 'en', 'Fertilizing'); ?></td>
                            <td bgcolor="#FFFFFF"><div align="center">

    <?php
    if ($jaga->total_b_3 == 0) {
        $jaga->total_b_3 = $jaga->b_3a + $jaga->b_3b + $jaga->b_3c + $jaga->b_3d;
    }
    ?>

                                    <input onKeypress="keypress(event)" name="total_b_3" type="text" id="total_b_3"  style="font-weight:bold; text-align:center" value="<?= number_format($jaga->total_b_3, 2); ?>" size="20" class="field_active" onchange="kiraan_baru(this, 'b');" />
                                </div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="jaga3"><?php $x1 = ($jaga->total_b_3 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s3_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="total_baja_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->total_b_3 / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="39" align="center">&nbsp;</td>
                            <td bgcolor="#FFFFCC">i. <?= setstring('mal', 'Pembelian baja', 'en', 'Purchase of fertilizer'); ?></td>
                            <td bgcolor="#FFFFCC"><div align="center">
                                    <input onKeypress="keypress(event)" name="b_3a" type="text" class="field_active" id="b_3a" onchange="kiraan_baru(this, 'anak');
                                            ;"  value="<?= number_format($jaga->b_3a, 2); ?>" size="15" />
                                </div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s6"><?php $x1 = ($jaga->b_3a / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s6a_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s6_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->b_3a / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="39" align="center">&nbsp;</td>
                            <td bgcolor="#FFFFCC">ii.<?= setstring('mal', 'Upah membaja', 'en', 'Labour cost to apply fertilizers'); ?> </td>
                            <td bgcolor="#FFFFCC"><div align="center">
                                    <input onKeypress="keypress(event)" name="b_3b" type="text" class="field_active" id="b_3b" onchange="kiraan_baru(this, 'anak');
                                            ;"  value="<?= number_format($jaga->b_3b, 2); ?>" size="15" />
                                </div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s7"><?php $x1 = ($jaga->b_3b / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s7a_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s7_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->b_3b / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="39" align="center">&nbsp;</td>
                            <td bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance'); ?></td>
                            <td bgcolor="#FFFFCC"><div align="center">
                                    <input onKeypress="keypress(event)" name="b_3c" type="text" class="field_active" id="b_3c" onchange="kiraan_baru(this, 'anak');
                                            "  value="<?= number_format($jaga->b_3c, 2); ?>" size="15" />
                                </div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s8"><?php $x1 = ($jaga->b_3c / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s8a_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s8_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->b_3c / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="39" align="center">&nbsp;</td>
                            <td bgcolor="#FFFFCC">iv. <?= setstring('mal', 'Analisis tanah dan daun', 'en', 'Soil and foliar analysis'); ?></td>
                            <td bgcolor="#FFFFCC"><div align="center">
                                    <input onKeypress="keypress(event)" name="b_3d" type="text" class="field_active" id="b_3d" onchange="kiraan_baru(this, 'anak');;"  value="<?= number_format($jaga->b_3d, 2); ?>" size="15" />
                                </div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s9"><?php $x1 = ($jaga->b_3d / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s9a_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFCC"><div align="center"><span id="s9_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->b_3d / $b); ?></span></div></td>
                        </tr>
                        <tr bgcolor="#AEFFAE">
                            <td height="39" align="center">4.</td>
                            <td><?= setstring('mal', 'Pemuliharan tanah dan air', 'en', 'Soil and water conservation'); ?>&nbsp;</td>
                            <td bgcolor="#AEFFAE"><div align="center">
                                    <input onKeypress="keypress(event)" name="total_b_4" type="text" class="field_active" id="total_b_4" onchange="kiraan_baru(this, '')" onclick="field_click(this)" value="<?= number_format($jaga->total_b_4, 2); ?>" size="20" />
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga4"><?php $x1 = ($jaga->total_b_4 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s4_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s10_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->total_b_4 / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="38" align="center">5.</td>
                            <td><?= setstring('mal', 'Penjagaan jalan, jambatan, lorong dsb', 'en', 'Upkeep of roads, bridges, paths and etc.'); ?></td>
                            <td bgcolor="#FFFFFF"><div align="center">
                                    <input onKeypress="keypress(event)" name="total_b_5" type="text" class="field_active" id="total_b_5" onchange="kiraan_baru(this, '')" onclick="field_click(this)" value="<?= number_format($jaga->total_b_5, 2); ?>" size="20" />
                                </div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="jaga5"><?php $x1 = ($jaga->total_b_5 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s5_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s11_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->total_b_5 / $b); ?></span></div></td>
                        </tr>
                        <tr bgcolor="#AEFFAE">
                            <td height="36" align="center">6.</td>
                            <td><?= setstring('mal', 'Penjagaan parit', 'en', 'Upkeep of drains'); ?> </td>
                            <td bgcolor="#AEFFAE"><div align="center">
                                    <input onKeypress="keypress(event)" name="total_b_6" type="text" class="field_active" id="total_b_6" onchange="kiraan_baru(this, '')" onclick="field_click(this)" value="<?= number_format($jaga->total_b_6, 2); ?>" size="20" />
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga6"><?php $x1 = ($jaga->total_b_6 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s6_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s12_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->total_b_6 / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="36" align="center">7.</td>
                            <td><?= setstring('mal', 'Penjagaan ban dan pintu air', 'en', 'Upkeeps of bunds, boundaries and Watergates'); ?></td>
                            <td bgcolor="#FFFFFF"><div align="center">
                                    <input onKeypress="keypress(event)" name="total_b_7" type="text" class="field_active" id="total_b_7" onchange="kiraan_baru(this, '')" onclick="field_click(this)" value="<?= number_format($jaga->total_b_7, 2); ?>" size="20" />
                                </div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="jaga7"><?php $x1 = ($jaga->total_b_7 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s7_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s13_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->total_b_7 / $b); ?></span></div></td>
                        </tr>
                        <tr bgcolor="#AEFFAE">
                            <td height="37" align="center">8.</td>
                            <td><?= setstring('mal', 'Kawalan serangga dan penyakit', 'en', 'Pests and diseases control'); ?> </td>
                            <td bgcolor="#AEFFAE"><div align="center">
                                    <input onKeypress="keypress(event)" name="total_b_8" type="text" class="field_active" id="total_b_8" onchange="kiraan_baru(this, '')" onclick="field_click(this)" value="<?= number_format($jaga->total_b_8, 2); ?>" size="20" />
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga8"><?php $x1 = ($jaga->total_b_8 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s8_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s14_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->total_b_8 / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="35" align="center">9.</td>
                            <td><?= setstring('mal', 'Memangkas dan membersihkan pokok', 'en', 'Pruning and palm sanitation') ?> </td>
                            <td bgcolor="#FFFFFF"><div align="center">
                                    <input onKeypress="keypress(event)" name="total_b_9" type="text" class="field_active" id="total_b_9" onchange="kiraan_baru(this, '')" onclick="field_click(this)" value="<?= number_format($jaga->total_b_9, 2); ?>" size="20" />
                                </div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="jaga9"><?php $x1 = ($jaga->total_b_9 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s9_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s15_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->total_b_9 / $b); ?></span></div></td>
                        </tr>
                        <tr bgcolor="#AEFFAE">
                            <td height="36" align="center">10.</td>
                            <td><?= setstring('mal', 'Banci / sulaman', 'en', 'Census / supplies') ?> </td>
                            <td bgcolor="#AEFFAE"><div align="center">
                                    <input onKeypress="keypress(event)" name="total_b_10" type="text" class="field_active" id="total_b_10" onchange="kiraan_baru(this, '')" onclick="field_click(this)" value="<?= number_format($jaga->total_b_10, 2); ?>" size="20" />
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga10"><?php $x1 = ($jaga->total_b_10 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s10_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s16_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->total_b_10 / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="34" align="center">11.</td>
                            <td><?= setstring('mal', 'Upah mandur dan kos penyeliaan estet', 'en', 'Mandore wages/ direct field supervision costs') ?> </td>
                            <td bgcolor="#FFFFFF"><div align="center">
                                    <input onKeypress="keypress(event)" name="total_b_11" type="text" class="field_active" id="total_b_11" onchange="kiraan_baru(this, '')" onclick="field_click(this)" value="<?= number_format($jaga->total_b_11, 2); ?>" size="20" />
                                </div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="jaga11"><?php $x1 = ($jaga->total_b_11 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s11_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#FFFFFF"><div align="center"><span id="s17_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->total_b_11 / $b); ?></span></div></td>
                        </tr>
                        <tr bgcolor="#AEFFAE">
                            <td height="36" align="center">12.</td>
                            <td><?= setstring('mal', 'Perbelanjaan pelbagai', 'en', 'Other expenditure') ?> &nbsp;</td>
                            <td bgcolor="#AEFFAE"><div align="center">
                                    <input onKeypress="keypress(event)" name="total_b_12" type="text" class="field_active" id="total_b_12" onchange="kiraan_baru(this, '')" onclick="field_click(this)" value="<?= number_format($jaga->total_b_12, 2); ?>" size="20" />
                                </div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="jaga12"><?php $x1 = ($jaga->total_b_12 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s12_tan"><?php $y1 = ($x1 / $tan_ha);
                                echo number_format($y1, 2); ?></span></div></td>
                            <td bgcolor="#AEFFAE"><div align="center"><span id="s18_beza"><?php echo kiraPerubahan($x1, $jagaTahunSebelum->total_b_12 / $b); ?></span></div></td>
                        </tr>
                        <tr>
                            <td height="15" align="center">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="32" align="center">&nbsp;</td>
                            <td><div align="right"><strong> <?= setstring('mal', 'Jumlah kos penjagaan', 'en', 'Total of upkeep cost') ?>&nbsp (a)</strong></div></td>
                            <td bgcolor="#FFCC66"><div align="center"><strong>

                                        <input onKeypress="keypress(event)" name="total_a" type="text" id="total_a"  style="font-weight:bold; text-align:center" value="<?= number_format($jaga->total_b, 2); ?>" size="20" readonly="true" />
                                    </strong></div></td>
                            <td bgcolor="#FFCC66"><div align="center"><strong>
                                        <span id="total_a_perha"><?php
                                $x1a = ($jaga->total_b / $b);
                                $x1a = round($x1a, 2, PHP_ROUND_HALF_UP);
                                echo number_format($x1a, 2); ?></span>
                                    </strong></div>
                                <input name="total_b_kos_per_hektar" type="hidden" id="total_b_kos_per_hektar" value="<?php echo round($x1a, 2); ?>" />
                            </td>
                            <td bgcolor="#FFCC66"><div align="center"><strong>
                                        <span id="total_a_pertan"><?php $y1a = ($x1a / $tan_ha);
    echo number_format($y1a, 2); ?></span>
                                    </strong></div></td>
                            <td bgcolor="#FFCC66"><div align="center"><strong>
                                        <span id="total_a_beza"><?php echo kiraPerubahan($x1a, $jagaTahunSebelum->total_b / $b); ?></span>
                                    </strong></div></td>
                        </tr>
                        <tr>
                            <td height="32" colspan="6" align="center"><div align="center">
                                    <input onKeypress="keypress(event)" name="thisyear" type="hidden" id="thisyear" value="<?= $_SESSION['tahun']; ?>" />
                                    <input onKeypress="keypress(event)" name="type" type="hidden" id="type" value="penjagaan" />
    <?php
    if (isset($_GET['print'])) {
        ?>
                                        <input onKeypress="keypress(event)" name="Button3" type="button" value="Print" />
        <?php
    } else {
        ?>
                                        <input type="button" name="simpan_sementara3" id="simpan_sementara3" value=<?= setstring('mal', '"Simpan"', 'en', '"Save"'); ?>
                                               onclick="hantar(2);" />
                                        <input type="button" name="simpan" id="simpan" value=<?= setstring('mal', '"Simpan &amp; Seterusnya"', 'en', '"Save &amp; Next"'); ?>
                                               onclick="pitmid = true; hantar(1);" />

                                               <input type="button" name="simpan" id="simpan" value=<?= setstring('mal', '"Kembali"', 'en', '"Back"'); ?> onclick="history.go(-1);" />

        <?php
    }
    ?>
                                </div></td>
                        </tr>
                    </table>
        </form>

    </td>
    </tr>
    <?php
}
if (isset($_GET['pembajaan'])) {
    ?>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

    <?php
}
if (isset($_GET['penuaian'])) {
    ?>
    <tr>
        <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5">

            <form action="" method="post" name="form2" id="form2">
                <table width="100%" cellpadding="0" cellspacing="0"  frame="box" class="subTable" aria-describedby="kosMatangEstate3">
                    <tr>
                        <td height="52" align="center" background="../images/tb_BG.gif"><div align="center"><strong>b.</strong></div></td>
                        <td height="52" align="center" background="../images/tb_BG.gif"><div align="left"><strong><?= setstring('mal', 'Penuaian', 'en', 'Harvesting'); ?>
                                </strong></div></td>
                        <td background="../images/tb_BG.gif" class="tableCss"><div align="center"><strong><?= setstring('mal', 'Kos', 'en', 'Cost'); ?>
                                </strong></div>
                                <div align="center"><strong>&nbsp;(RM)</strong></div></td>
                        <td background="../images/tb_BG.gif" class="tableCss"><div align="center"><strong><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?>
                                </strong></div>
                            <div align="center"><strong>(RM)</strong></div></td>
                        <td background="../images/tb_BG.gif" class="tableCss"><div align="center"><strong><?= setstring('mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?>
                                </strong></div>
                            <div align="center"><strong>(RM)</strong></div></td>
                        <td background="../images/tb_BG.gif" class="tableCss"><div align="center"><strong><?= setstring('mal', 'Perubahan Kos Per Hektar dengan Tahun Lepas', 'en', 'Cost Different with Last year'); ?>
                                </strong></div>
                            <div align="center"><strong>(%)</strong></div></td>
                    </tr>

                    <tr>
                        <td width="16" height="44" align="center" bgcolor="#AEFFAE">1.</td>
                        <td width="284" bgcolor="#AEFFAE"><?= setstring('mal', 'Peralatan menuai', 'en', 'Harvesting tools'); ?></td>
                        <td width="141" bgcolor="#AEFFAE"><div align="center">
                                <input onKeypress="keypress(event)" name="a_1" type="text" class="field_active" id="a_1" onchange="kiraan_baru_tuai(this)" onclick="field_click(this)" value="<?= number_format($tuai->a_1, 2); ?>" size="20" />
                            </div></td>
                        <td width="119" bgcolor="#AEFFAE"><div align="center"><span id="t1"><?php $x1 = ($tuai->a_1 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                        <td width="116" bgcolor="#AEFFAE"><div align="center"><span id="t1_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                        <td width="186" bgcolor="#AEFFAE"><div align="center"><strong><span id="t1_beza"><?php echo kiraPerubahan($x1, $tuaiTahunSebelum->a_1 / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="43" align="center">2.</td>
                        <td><?= setstring('mal', 'Menuai, memungut BTS dan buah relai', 'en', 'Harvesting and collection of FFB and loose fruit'); ?></td>
                        <td><div align="center">
                                <input onKeypress="keypress(event)" name="a_2" type="text" class="field_active" id="a_2"  onchange="kiraan_baru_tuai(this)" onclick="field_click(this)" value="<?= number_format($tuai->a_2, 2); ?>" size="20" />
                            </div></td>
                        <td><div align="center"><span id="t2"><?php $x1 = ($tuai->a_2 / $b);
    echo number_format($x1, 2); ?></span></div></td>
                        <td><div align="center"><span id="t2_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                        <td><div align="center"><strong><span id="t2_beza"><?php echo kiraPerubahan($x1, $tuaiTahunSebelum->a_2 / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="43" align="center" bgcolor="#AEFFAE">3.</td>
                        <td bgcolor="#AEFFAE"><?= setstring('mal', 'Upah mandur dan kos penyeliaan estet', 'en', 'Mandore wages/ direct field supervision costs'); ?></td>
                        <td bgcolor="#AEFFAE"><div align="center">
                                <input onKeypress="keypress(event)" name="a_3" type="text" class="field_active" id="a_3"  onchange="kiraan_baru_tuai(this)" onclick="field_click(this)" value="<?= number_format($tuai->a_3, 2); ?>" size="20"/>
                            </div></td>
                        <td bgcolor="#AEFFAE"><div align="center"><span id="t3"><?php $x1 = ($tuai->a_3 / $b);
                                    echo number_format($x1, 2); ?></span></div></td>
                        <td bgcolor="#AEFFAE"><div align="center"><span id="t3_tan"><?php $y1 = ($x1 / $tan_ha);
                            echo number_format($y1, 2); ?></span></div></td>
                        <td bgcolor="#AEFFAE"><div align="center"><strong><span id="t3_beza"><?php echo kiraPerubahan($x1, $tuaiTahunSebelum->a_3 / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="38" align="center">4.</td>
                        <td><?= setstring('mal', 'Penggunaan dan penyelenggaraan jentera', 'en', 'Machinery use and maintenance') ?> </td>
                        <td><div align="center">
                                <input onKeypress="keypress(event)" name="a_4" type="text" class="field_active" id="a_4" onchange="kiraan_baru_tuai(this)" onclick="field_click(this)" value="<?= number_format($tuai->a_4, 2); ?>" size="20" />
                            </div></td>
                        <td><div align="center"><span id="t4"><?php $x1 = ($tuai->a_4 / $b);
                            echo number_format($x1, 2); ?></span></div></td>
                        <td><div align="center"><span id="t4_tan"><?php $y1 = ($x1 / $tan_ha);
                            echo number_format($y1, 2); ?></span></div></td>
                        <td><div align="center"><strong><span id="t4_beza"><?php echo kiraPerubahan($x1, $tuaiTahunSebelum->a_4 / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="15" align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="38" align="center">&nbsp;</td>
                        <td><div align="right"><strong><?= setstring('mal', 'Jumlah kos penuaian', 'en', 'Total of harvesting cost'); ?>
                                    (b) :</strong></div></td>
                                             <td bgcolor="#FFCC66"><div align="center"><strong>

                                    <input onKeypress="keypress(event)" name="total_b" type="text" id="total_b"  style="font-weight:bold; text-align:center" value="<?= number_format($tuai->total_b, 2); ?>" size="20" readonly="true" />
                                </strong></div></td>
                        <td bgcolor="#FFCC66"><div align="center"><strong> <span id="total_b_perha"><?php $x1b = ($tuai->total_b / $a);
                        $x1b = round($x1b, 2, PHP_ROUND_HALF_UP);
                            echo number_format($x1b, 2); ?></span> </strong></div>
                        <input name="total_b_kos_per_hektar" type="hidden" id="total_b_kos_per_hektar" value="<?php echo round($x1b, 2); ?>" />
                        </td>
                        <td bgcolor="#FFCC66"><div align="center"><strong> <span id="total_b_pertan"><?php $y1b = ($x1b / $tan_ha);
                            echo number_format($y1b, 2); ?></span> </strong></div></td>
                        <td bgcolor="#FFCC66"><div align="center"><strong> <span id="total_b_beza"><?php echo kiraPerubahan($x1b, $tuaiTahunSebelum->total_b / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="38" colspan="6" align="center"><div align="center">
                                <input onKeypress="keypress(event)" name="thisyear" type="hidden" id="thisyear" value="<?= $_SESSION['tahun']; ?>" />
                                <input onKeypress="keypress(event)" name="type" type="hidden" id="type" value="penuaian" />
    <?php
    if (isset($_GET['print'])) {
        ?>
                                    <input onKeypress="keypress(event)" name="Button2" type="button" value="Print" />
        <?php
    } else {
        ?>
                                    <input onKeypress="keypress(event)" type="button" name="simpan_sementara2" id="simpan_sementara2" value=<?= setstring('mal', '"Simpan "', 'en', '"Save"'); ?>
                                           onclick="hantar_a(2);" />
                                    <input onKeypress="keypress(event)" type="button" name="simpan2" id="simpan2" value=<?= setstring('mal', '"Simpan &amp; Seterusnya"', 'en', '"Save &amp; Next"'); ?>
                                           onclick="pitmid = true; hantar_a(1);" />

                                           <input type="button" name="simpan" id="simpan" value=<?= setstring('mal', '"Kembali"', 'en', '"Back"'); ?> onclick="history.go(-1);" />

        <?php
    }
    ?>
                            </div></td>
                    </tr>
                </table>
            </form>	</td>
    </tr>
    <?php
}
if (isset($_GET['pengangkutan'])) {
    ?>
    <tr>
        <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5">
            <form action="" method="post" name="form3" id="form3">
                <table width="100%" cellspacing="0"  frame="box" class="subTable" aria-describedby="kosMatangEstate4">
                    <tr>
                        <td height="47" align="center" valign="middle" background="../images/tb_BG.gif"><strong>c.</strong></td>
                        <td colspan="2" valign="middle" background="../images/tb_BG.gif"><strong><?= setstring('mal', 'Pengangkutan BTS', 'en', 'Transportation of FFB'); ?>
                            </strong></td>
                        <td width="164" valign="middle" background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos', 'en', 'Cost'); ?>
                                </strong></div>            <div align="center"><strong>(RM)</strong></div></td>
                        <td width="142" valign="middle" background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos Per Hektar', 'en', 'Cost Per Hectare'); ?>
                                </strong></div>
                            <div align="center"><strong>(RM)</strong></div></td>
                        <td width="124" valign="middle" background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Kos Per Tan BTS', 'en', 'Cost Per Tonne FFB'); ?>
                                </strong></div>            <div align="center"><strong> (RM)</strong></div></td>
                        <td width="154" valign="middle" background="../images/tb_BG.gif"><div align="center"><strong><?= setstring('mal', 'Perubahan Kos Per Hektar dengan Tahun Lepas', 'en', 'Cost Different with Last year'); ?>
                                </strong></div>
                            <div align="center"><strong> (%)</strong></div></td>
                    </tr>

                    <tr>
                        <td height="37" align="center" valign="middle" bgcolor="#AEFFAE">1.</td>
                        <td colspan="2" valign="middle" bgcolor="#AEFFAE"><?= setstring('mal', 'Dalaman', 'en', 'Internal'); ?></td>
                        <td valign="middle" bgcolor="#AEFFAE"><div align="center"><strong>
                                    <input onKeypress="keypress(event)" name="total_b_1" type="text" id="total_b_1"  style="font-weight:bold; text-align:center" value="<?php
    if ($angkut->total_a == 0) {
        $angkut->total_a = $angkut->a_1 + $angkut->a_2 + $angkut->a_3;
    }
    echo number_format($angkut->total_a, 2);
    ?>" size="20" class="field_active" onchange="kiraan_baru_angkut(this, 'a')" />
                                </strong></div></td>
                        <td valign="middle" bgcolor="#AEFFAE"><div align="center"><span id="jaga1"><?php $x1 = ($angkut->total_a / $b);
    echo number_format($x1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#AEFFAE"><div align="center"><span id="s1_tan"><?php $y1 = ($x1 / $tan_ha);
                                echo number_format($y1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#AEFFAE"><div align="center"><span id="total_racun_beza"><?php echo kiraPerubahan($x1, $angkutTahunSebelum->total_a / $b); ?></span></div></td>
                    </tr>
                    <tr>
                        <td width="15" height="37" align="center" valign="middle">&nbsp;</td>
                        <td colspan="6" valign="middle" bgcolor="#CCCCFF">i. <?= setstring('mal', 'Pemunggahan BTS ke', 'en', 'Loading of FFB to'); ?>
                            :</td>
                    </tr>
                    <tr>
                        <td height="39" align="center" valign="top">&nbsp;</td>
                        <td width="34" valign="middle" bgcolor="#CCCCFF">&nbsp;</td>
                        <td width="215" valign="middle" bgcolor="#CCCCFF">a) <?= setstring('mal', 'Platform', 'en', 'Platform'); ?></td>
                        <td valign="middle" bgcolor="#CCCCFF"><div align="center">
                                <input onKeypress="keypress(event)" name="a_1" type="text" class="field_active" id="a_1" onchange="kiraan_baru_angkut(this, 'anak');;" value="<?= number_format($angkut->a_1, 2); ?>" size="15" />
                            </div></td>
                        <td valign="middle" bgcolor="#CCCCFF"><div align="center"><span id="a1"><?php $x1 = ($angkut->a_1 / $b);
                                       echo number_format($x1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#CCCCFF"><div align="center"><span id="a1_tan"><?php $y1 = ($x1 / $tan_ha);
                                       echo number_format($y1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#CCCCFF"><div align="center"><strong><span id="a1_beza"><?php echo kiraPerubahan($x1, $angkutTahunSebelum->a_1 / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="39" align="center" valign="top">&nbsp;</td>
                        <td valign="middle" bgcolor="#CCCCFF">&nbsp;</td>
                        <td valign="middle" bgcolor="#CCCCFF">b) <?= setstring('mal', 'Ramp', 'en', 'Ramp'); ?></td>
                        <td valign="middle" bgcolor="#CCCCFF"><div align="center">
                                <input onKeypress="keypress(event)" name="a_2" type="text" class="field_active" id="a_2" onchange="kiraan_baru_angkut(this, 'anak');;"  value="<?= number_format($angkut->a_2, 2); ?>" size="15"/>
                            </div></td>
                        <td valign="middle" bgcolor="#CCCCFF"><div align="center"><span id="a2"><?php $x1 = ($angkut->a_2 / $b);
                                       echo number_format($x1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#CCCCFF"><div align="center"><span id="a2_tan"><?php $y1 = ($x1 / $tan_ha);
                                       echo number_format($y1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#CCCCFF"><div align="center"><strong><span id="a2_beza"><?php echo kiraPerubahan($x1, $angkutTahunSebelum->a_2 / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="39" align="center" valign="top">&nbsp;</td>
                        <td colspan="2" valign="middle" bgcolor="#CCCCFF">ii. <?= setstring('mal', 'Penjagaan ramp', 'en', 'Ramp upkeep'); ?></td>
                        <td valign="middle" bgcolor="#CCCCFF"><div align="center">
                                <input onKeypress="keypress(event)" name="a_3" type="text" class="field_active" id="a_3" onchange="kiraan_baru_angkut(this, 'anak');
                                        ;"  value="<?= number_format($angkut->a_3, 2); ?>" size="15" />
                            </div></td>
                        <td valign="middle" bgcolor="#CCCCFF"><div align="center"><span id="a3"><?php $x1 = ($angkut->a_3 / $b);
                                       echo number_format($x1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#CCCCFF"><div align="center"><span id="a3_tan"><?php $y1 = ($x1 / $tan_ha);
                                       echo number_format($y1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#CCCCFF"><div align="center"><strong><span id="a3_beza"><?php echo kiraPerubahan($x1, $angkutTahunSebelum->a_3 / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="39" align="center" valign="middle">2.</td>
                        <td colspan="2" valign="middle"><?= setstring('mal', 'Luaran', 'en', 'External'); ?></td>
                        <td valign="middle"><div align="center"><strong>
                                    <input onKeypress="keypress(event)" name="total_b_2" type="text" id="total_b_2"  style="font-weight:bold; text-align:center" value="<?php
                                       if ($angkut->total_b_1 == 0) {
                                           $angkut->total_b_1 = $angkut->b_1a + $angkut->b_1b + $angkut->b_1c;
                                       }

                                       echo number_format($angkut->total_b_1, 2);
                                       ?>" size="20" class="field_active" onchange="kiraan_baru_angkut(this, 'b')" />
                                </strong></div></td>
                        <td valign="middle"><div align="center" id="jaga2">
                            <?php $x1 = ($angkut->total_b_1 / $b);
                                       echo number_format($x1, 2); ?></div></td>
                        <td valign="middle"><div align="center" id="s2_tan"><?php $y1 = ($x1 / $tan_ha);
                                       echo number_format($y1, 2); ?></div></td>
                        <td valign="middle"><div align="center" id="total_baja_beza"><?php echo kiraPerubahan($x1, $angkutTahunSebelum->total_b_1 / $b); ?></div></td>
                    </tr>


                    <tr>
                        <td height="42" align="center" valign="top">&nbsp;</td>
                        <td colspan="2" valign="middle" bgcolor="#FFFFCC">i. <?= setstring('mal', 'Kos pengangkutan BTS dari platform atau ramp ke kilang', 'en', 'FFB transportation cost from platform or ramp to the mill'); ?></td>
                        <td valign="middle" bgcolor="#FFFFCC"><div align="center">
                                <input onKeypress="keypress(event)" name="b_1a" type="text" class="field_active" id="b_1a" onchange="kiraan_baru_angkut(this, 'anak');" value="<?= number_format($angkut->b_1a, 2); ?>" size="15" />
                            </div></td>
                        <td valign="middle" bgcolor="#FFFFCC"><div align="center"><span id="a4">
    <?php $x1 = ($angkut->b_1a / $b);
    echo number_format($x1, 2); ?>
                                </span></div></td>
                        <td valign="middle" bgcolor="#FFFFCC"><div align="center"><span id="a4_tan"><?php $y1 = ($x1 / $tan_ha);
    echo number_format($y1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#FFFFCC"><div align="center"><strong><span id="a4_beza"><?php echo kiraPerubahan($x1, $angkutTahunSebelum->b_1a / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="43" align="center" valign="middle">&nbsp;</td>
                        <td colspan="2" valign="middle" bgcolor="#FFFFCC">ii. <?= setstring('mal', 'Penjagaan lori, treler, traktor dsb', 'en', 'Upkeep of tractor & trailer, lorry, etc'); ?></td>
                        <td valign="middle" bgcolor="#FFFFCC"><div align="center">
                                <input onKeypress="keypress(event)" name="b_1b" type="text" class="field_active" id="b_1b" onchange="kiraan_baru_angkut(this, 'anak');"  value="<?= number_format($angkut->b_1b, 2); ?>" size="15"/>
                            </div></td>
                        <td valign="middle" bgcolor="#FFFFCC"><div align="center"><span id="a5"><?php $x1 = ($angkut->b_1b / $b);
    echo number_format($x1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#FFFFCC"><div align="center"><span id="a5_tan"><?php $y1 = ($x1 / $tan_ha);
                                    echo number_format($y1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#FFFFCC"><div align="center"><strong><span id="a5_beza"><?php echo kiraPerubahan($x1, $angkutTahunSebelum->b_1b / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="43" align="center" valign="middle">&nbsp;</td>
                        <td colspan="2" valign="middle" bgcolor="#FFFFCC">iii. <?= setstring('mal', 'Pengangkutan sungai', 'en', 'River transport'); ?></td>
                        <td valign="middle" bgcolor="#FFFFCC"><div align="center">
                                <input onKeypress="keypress(event)" name="b_1c" type="text" class="field_active" id="b_1c" onchange="kiraan_baru_angkut(this, 'anak');" value="<?= number_format($angkut->b_1c, 2); ?>" size="15"/>
                            </div></td>
                        <td valign="middle" bgcolor="#FFFFCC"><div align="center"><span id="a6"><?php $x1 = ($angkut->b_1c / $b);
                                    echo number_format($x1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#FFFFCC"><div align="center"><span id="a6_tan"><?php $y1 = ($x1 / $tan_ha);
                                    echo number_format($y1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#FFFFCC"><div align="center"><strong><span id="a6_beza"><?php echo kiraPerubahan($x1, $angkutTahunSebelum->b_1c / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="43" align="center" valign="middle" bgcolor="#AEFFAE">3.</td>
                        <td colspan="2" valign="middle" bgcolor="#AEFFAE"><?= setstring('mal', 'Perbelanjaan lain', 'en', 'Other Expenditure'); ?></td>
                        <td valign="middle" bgcolor="#AEFFAE"><div align="center">
                                <input onKeypress="keypress(event)" name="total_b_3" type="text" class="field_active" id="total_b_3" onchange="kiraan_baru_angkut(this, '')" onclick="field_click(this)" value="<?= number_format($angkut->total_b_2, 2); ?>" size="20"/>
                            </div></td>
                        <td valign="middle" bgcolor="#AEFFAE"><div align="center"><span id="jaga3"><?php $x1 = ($angkut->total_b_2 / $b);
                                    echo number_format($x1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#AEFFAE"><div align="center"><span id="s3_tan"><?php $y1 = ($x1 / $tan_ha);
                            echo number_format($y1, 2); ?></span></div></td>
                        <td valign="middle" bgcolor="#AEFFAE"><div align="center"><strong><span id="a7_beza"><?php echo kiraPerubahan($x1, $angkutTahunSebelum->total_b_2 / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="17" align="center" valign="middle">&nbsp;</td>
                        <td colspan="2" valign="middle">&nbsp;</td>
                        <td valign="middle">&nbsp;</td>
                        <td valign="middle">&nbsp;</td>
                        <td valign="middle">&nbsp;</td>
                        <td valign="middle">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="35" align="center" valign="middle">&nbsp;</td>
                        <td colspan="2" valign="middle"><div align="right"><strong><?= setstring('mal', 'Jumlah kos pengangkutan ', 'en', 'Total of transportation cost'); ?>
                                    (c) : </strong></div></td>
                        <td valign="middle" bgcolor="#FFCC66"><div align="center"><strong>
                                    <input onKeypress="keypress(event)" name="total_a" type="text" id="total_a"  style="font-weight:bold; text-align:center" value="<?= number_format($angkut->total_b, 2); ?>" size="20" readonly="true" />
                                </strong></div></td>
                        <td valign="middle" bgcolor="#FFCC66"><div align="center"><strong> <span id="total_a_perha"><?php $x1c = ($angkut->total_b / $a);
                        $x1c = round($x1c, 2, PHP_ROUND_HALF_UP);
                            echo number_format($x1c, 2); ?></span> </strong></div>
                        <input name="total_b_kos_per_hektar" type="hidden" id="total_b_kos_per_hektar" value="<?php echo round($x1c, 2); ?>" /></td>
                        <td valign="middle" bgcolor="#FFCC66"><div align="center"><strong> <span id="total_a_pertan"><?php $y1c = ($x1c / $tan_ha);
                            echo number_format($y1c, 2); ?></span> </strong></div></td>
                        <td valign="middle" bgcolor="#FFCC66"><div align="center"><strong> <span id="total_a_beza"><?php echo kiraPerubahan($x1c, $angkutTahunSebelum->total_b / $b); ?></span> </strong></div></td>
                    </tr>
                    <tr>
                        <td height="17" align="center" valign="middle">&nbsp;</td>
                        <td colspan="2" valign="middle">&nbsp;</td>
                        <td valign="middle">&nbsp;</td>
                        <td valign="middle">&nbsp;</td>
                        <td valign="middle">&nbsp;</td>
                        <td valign="middle"><div align="center"></div></td>
                    </tr>
                    <tr>
                        <td height="35" align="center" valign="middle">&nbsp;</td>
                        <td colspan="2" valign="middle"><div align="right"><strong><?= setstring('mal', 'Jumlah kos kawasan matang', 'en', 'Total cost of matured area'); ?>
                                    (a + b + c) : </strong></div></td>
                        <td valign="middle" bgcolor="#FFCCFF"><div align="center"><strong>
                                    <span id="jumlah_all">
    <?php $total_all = $angkut->total_b + $tuai->total_b + $jaga->total_b;
    echo number_format($total_all, 2); ?></span></strong>
                                <input onKeypress="keypress(event)" name="jumlah_allb" type="hidden" id="jumlah_allb" value="<?= $allb = $jaga->total_b + $tuai->total_b; ?>" />

                            </div></td>
                        <td valign="middle" bgcolor="#FFCCFF"><div align="center"><strong><span id="jumlah_all_kos"><?php
    $total_all_hektar = ($jaga->total_b / $b) + ($tuai->total_b / $b) + ($angkut->total_b / $b);
    //$total_all_hektar = $x1a+$x1b+$x1c
    echo number_format($total_all_hektar, 2);
    ?></span></strong>
                                <input onKeypress="keypress(event)" name="jumlah_all_kosb" type="hidden" id="jumlah_all_kosb" value="<?= $all_kosa = ($jaga->total_b / $b) + ($tuai->total_b / $b) ?>" />
                            </div></td>
                        <td valign="middle" bgcolor="#FFCCFF"><div align="center"><strong><span id="jumlah_all_tan"><?php
    $total_all_bts = ($angkut->total_b / $b / $tan_ha) + ($jaga->total_b / $b / $tan_ha) + ($tuai->total_b / $b / $tan_ha);
    // $total_all_bts = $y1a+$y1b+$y1c
    echo number_format($total_all_bts, 2);
    ?></span></strong>
                                <input onKeypress="keypress(event)" name="jumlah_all_tanb" type="hidden" id="jumlah_all_tanb" value="<?= $all_tana = ($tuai->total_b / $b / $tan_ha) + ($jaga->total_b / $b / $tan_ha); ?>" />
                            </div></td>
                        <td valign="middle" bgcolor="#FFCCFF"><div align="center"><strong><?php echo kiraPerubahan($total_all_hektar, ($jagaTahunSebelum->total_b / $b) + ($tuaiTahunSebelum->total_b / $b) + ($angkutTahunSebelum->total_b / $b)); ?></strong></div></td>
                    </tr>
                    <tr>
                        <td height="35" colspan="7" align="center" valign="middle"><div align="center">
                                <input onKeypress="keypress(event)" name="thisyear" type="hidden" id="thisyear" value="<?= $_SESSION['tahun']; ?>" />
                                <input onKeypress="keypress(event)" name="type" type="hidden" id="type" value="pengangkutan" />
    <?php
    if (isset($_GET['print'])) {
        ?>
                                    <input onKeypress="keypress(event)" name="Button22" type="button" value="Print" />
        <?php
    } else {
        ?><div id="no-print">



                                        <input type="button" name="simpan_sementara22" id="simpan_sementara22" value="<?= setstring('mal', 'Simpan', 'en', 'Save'); ?>" onclick="document.form3.action = 'save_kos_matang.php?status=2';
                                                document.form3.target = '_parent';
                                                document.form3.submit();" />


                                        <input type="button" name="simpan22" id="simpan22" value="<?= setstring('mal', 'Simpan &amp; Seterusnya', 'en', 'Save &amp; Next'); ?>" onclick="pitmid = true;
                                                document.form3.action = 'save_kos_matang.php?status=1';
                                                document.form3.target = '_parent';
                                                document.form3.submit();
                                                ;" />

                                        <input type="button" name="simpan" id="simpan" value=<?= setstring('mal', '"Kembali"', 'en', '"Back"'); ?> onclick="history.go(-1);" />

                                    </div>
        <?php
    }
    ?>
                            </div></td>
                    </tr>
                </table>
            </form>	</td>
    </tr>
<?php } ?>
<tr>
    <td colspan="5">&nbsp;</td>
</tr>
<tr>
    <td colspan="5">&nbsp;</td>
</tr>
</table>
</table>
