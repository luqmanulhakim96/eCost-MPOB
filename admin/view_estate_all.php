<?php
session_start();

    if ($_SESSION['type'] <> "admin")
	{	
		header("location:../logout.php");
		exit();
    }

include('../Connections/connection.class.php');
include('baju.php');
include('../class/user.class.php');
include('../class/district.class.php');
include('../setstring.inc');
?>
<?php
extract($_REQUEST);

function updateesub($nolesen, $table, $column, $value) {
    $con = connect();
    $set = 0;
    $qupdate = "UPDATE $table SET $column='$value' "
            . "WHERE "
            . " No_Lesen_Baru='$nolesen'  "
            . " LIMIT 1";
    //echo "<br>".$qupdate; 
    mysql_query($qupdate, $con);
    if (mysql_affected_rows()) {
        $set = 1;
    }
    return $set;
}
?><style type="text/css">
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

        'cookie': "tabber", /* Name to use for the cookie */

        'onLoad': function (argsObj)
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
            if (isNaN(i)) {
                return;
            }
            t.tabShow(i);
            // alert('getCookie(' + t.cookie + ') = ' + i);
        },

        'onClick': function (argsObj)
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
        document.cookie = name + "=" + escape(value) +
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
            if (begin != 0)
                return null;
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
    $(document).ready(function () {


        $(".esub_edit").hide();
        $(".kemaskini").hide();

        $("#keluasan").live("blur", function (e) {
            $("#jumlah").val(eval($(this).val() + $("#belum_berhasil").val()));
        });
        $("#belum_berhasil").live("blur", function (e) {
            $("#jumlah").val(eval($(this).val() + $("#keluasan").val()));
        });

        var a = document.getElementById("tanaman_semula").value;
        if (a != null) {
            document.getElementById("tanaman_semula").value = "";
        }

        var b = document.getElementById("tanaman_baru").value;
        if (b != null) {
            document.getElementById("tanaman_baru").value = "";
        }


        var c = document.getElementById("tanaman_tukar").value;
        if (c != null) {
            document.getElementById("tanaman_tukar").value = "";
        }




    });

    function buka(x, y, z, a) {


        $("." + x).hide();
        $("." + y).show();
        $("." + z).hide();
        $("." + a).show();
    }

    function kiraTotal() {
        var immature = $("#belum_berhasil");
        var lastEsub = $("#keluasan");
        var total = $("#jumlah");

        total.val(eval(immature.val() + "+" + lastEsub.val()));
    }
</script>
<script language="javascript">
    function pergi(x)
    {
        window.location.href = 'add_estate_all.php?jenis=edit&lesen_lama=' + x;
    }
</script>


<script type="text/javascript" src="../js/tabber/tabber.js"></script>
<title>Estate Details</title>
<style type="text/css">
    <!--
    .style1 {font-weight: bold}
    .style2 {font-weight: bold}
    -->
</style>
<h3>Licenses No : <?php echo $nolesen; ?></h3>
<form action="save_all.php" method="post" name="form_esub" id="form_esub">
    <?php
    $tahun = $_COOKIE['tahun_report'];
    $pertama = $tahun - 3;
    $kedua = $tahun - 2;
    $ketiga = $tahun - 1;
    $tableesub = "";
    ?>
    <input  type="hidden" name="tahun1" value="<?= substr($ketiga, -2) ?>"/>
    <input  type="hidden" name="tahun2" value="<?= substr($kedua, -2) ?>"/>
    <input  type="hidden" name="tahun3" value="<?= substr($pertama, -2) ?>"/>
    <div class="tabber" id="mytabber1">




        <div class="tabbertab">
            <h2>E-Sub <?= $_COOKIE['tahun_report'] ?></h2>
            <?php
            if (date('Y') == $_COOKIE['tahun_report']) {
                $table = "esub";
                $tableesub = $table;
            } else {
                $table = "esub_" . $_COOKIE['tahun_report'];
                $tableesub = $table;
            }

            $con = connect();
            $qd = "select * FROM $table where no_lesen_baru ='$nolesen'";

            $rd = mysql_query($qd, $con);
            $rowd = mysql_fetch_array($rd);
            $total = mysql_num_rows($rd);
//echo $qd."<br>".$total;
            if ($total > 1) {
                $total = $total - 1;
                $qddelete = " delete from login_estate where lesen ='500778-202000' limit $total; ";
                $rddelete = mysql_query($qddelete, $con);
            }

            if ($total == 0) {
                $qadd = "insert into esub (no_lesen_baru) values ('$nolesen')";
                $radd = mysql_query($qadd, $con);
                echo "<script>window.location.href='view_estate_all.php'</script>";
            }
            ?>


            <table width="100%" class="esub">

                <tr>
                    <td width="15%">NAMA_ESTET</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Nama_Estet']; ?></td>
                </tr>
                <tr>
                    <td width="15%">NO_LESEN</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['No_Lesen']; ?></td>
                </tr>
                <tr>
                    <td width="15%">NO_LESEN_BARU</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['No_Lesen_Baru']; ?></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT1</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Alamat1']; ?></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT2</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Alamat2']; ?></td>
                </tr>
                <tr>
                    <td width="15%">POSKOD</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Poskod']; ?></td>
                </tr>
                <tr>
                    <td width="15%">BANDAR</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Bandar']; ?></td>
                </tr>
                <tr>
                    <td width="15%">NEGERI</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Negeri']; ?></td>
                </tr>
                <tr>
                    <td width="15%">NO_TELEPON</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['No_Telefon']; ?></td>
                </tr>
                <tr>
                    <td width="15%">NO_FAX</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['No_Fax']; ?></td>
                </tr>
                <tr>
                    <td width="15%">EMEL</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Emel']; ?></td>
                </tr>
                <tr>
                    <td width="15%">NEGERI_PREMIS</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Negeri_Premis']; ?></td>
                </tr>
                <tr>
                    <td width="15%">DAERAH_PREMIS</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Daerah_Premis']; ?></td>
                </tr>
                <tr>
                    <td width="15%">SYARIKAT_INDUK</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Syarikat_Induk']; ?></td>
                </tr>
                <tr>
                    <td width="15%">JUMLAH (TANAM BARU + TANAM SEMULA +TANAM TUKAR)</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Belum_Berhasil']; ?></td>
                </tr>
                <tr>
                    <td width="15%">TERAKHIR DRPD E-SUB</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Keluasan_Yang_Dituai']; ?></td>
                </tr>
                <tr>
                    <td width="15%">KELUASAN KAWASAN MATANG (PURATA)</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php $Berhasil = $rowd['Keluasan_Yang_Dituai']; ?><?php echo $rowd['Berhasil']; ?></td>
                </tr>
                <tr>
                    <td width="15%">JUMLAH (BERHASIL + BELUM BERHASIL)</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['Jumlah']; ?></td>
                </tr>

            </table>

            <table width="100%" class="esub_edit">

                <tr>
                    <td width="15%">NAMA_ESTET</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input name="nama_estet" type="text" id="nama_estet" value="<?php echo $rowd['Nama_Estet']; ?>" size="60" />
                        <script language="javascript">
    var nama_estet = new LiveValidation('nama_estet');
    nama_estet.add(Validate.Presence);
                        </script>
                    </td>
                </tr>
                <tr>
                    <td width="15%">NO_LESEN</td>
                    <td width="1%">:</td>
                    <td width="84%"><input type="text" name="no_lesen" id="no_lesen" value="<?php echo $rowd['No_Lesen']; ?>" />
                        <script language="javascript">
                            var no_lesen_baru = new LiveValidation('no_lesen');
                            no_lesen_baru.add(Validate.Presence);
                        </script>
                    </td>
                </tr>
                <tr>
                    <td width="15%">NO_LESEN_BARU</td>
                    <td width="1%">:</td>
                    <td width="84%">

                        <?php echo $rowd['No_Lesen_Baru']; ?></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT1</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input name="alamat1" type="text" id="alamat1" value="<?php echo $rowd['Alamat1']; ?>" size="60" /></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT2</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input name="alamat2" type="text" id="alamat2" value="<?php echo $rowd['Alamat2']; ?>" size="60" /></td>
                </tr>
                <tr>
                    <td width="15%">POSKOD</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="poskod" id="poskod" value="<?php echo $rowd['Poskod']; ?>" /></td>
                </tr>
                <tr>
                    <td width="15%">BANDAR</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="bandar" id="bandar" value="<?php echo $rowd['Bandar']; ?>" /></td>
                </tr>
                <tr>
                    <td width="15%">NEGERI</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="negeri" id="negeri" value="<?php echo $rowd['Negeri']; ?>"  /></td>
                </tr>
                <tr>
                    <td width="15%">NO_TELEPON</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="no_telefon" id="no_telefon" value="<?php echo $rowd['No_Telefon']; ?>" /></td>
                </tr>
                <tr>
                    <td width="15%">NO_FAX</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="no_fax" id="no_fax" value="<?php echo $rowd['No_Fax']; ?>" /></td>
                </tr>
                <tr>
                    <td width="15%">EMEL</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="emel" id="emel" value="<?php echo $rowd['Emel']; ?>" /></td>
                </tr>
                <tr>
                    <td width="15%">NEGERI_PREMIS</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="negeri_premis" id="negeri_premis" value="<?php echo $rowd['Negeri_Premis']; ?>" /></td>
                </tr>
                <tr>
                    <td width="15%">DAERAH_PREMIS</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="daerah_premis" id="daerah_premis" value="<?php echo $rowd['Daerah_Premis']; ?>" /></td>
                </tr>
                <tr>
                    <td width="15%">SYARIKAT_INDUK</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="syarikat_induk" id="syarikat_induk" value="<?php echo $rowd['Syarikat_Induk']; ?>" /></td>
                </tr>
                <tr>
                    <td width="15%">JUMLAH (TANAM BARU + TANAM SEMULA +TANAM TUKAR)</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="belum_berhasil" id="belum_berhasil" value="<?php echo $rowd['Belum_Berhasil']; ?>" onchange="kiraTotal();" /> 
                        <script language="javascript">
                            var belum_berhasil = new LiveValidation('belum_berhasil');
                            belum_berhasil.add(Validate.Numericality);
                        </script>


                        Ha</td>
                </tr>
                <tr>
                    <td width="15%">TERAKHIR DRPD E-SUB</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="keluasan" id="keluasan" value="<?php echo $rowd['Keluasan_Yang_Dituai']; ?>" onchange="kiraTotal();" /> 

                        <script language="javascript">
                            var keluasan = new LiveValidation('keluasan');
                            keluasan.add(Validate.Numericality);
                        </script>
                        Ha</td>
                </tr>
                <tr>
                    <td width="15%">KELUASAN KAWASAN MATANG (PURATA)</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="berhasil" id="berhasil" value="<?php echo $rowd['Berhasil']; ?>" />
                        <script language="javascript">
                            var berhasil = new LiveValidation('berhasil');
                            berhasil.add(Validate.Numericality);
                        </script>

                        Ha</td>
                </tr>
                <tr>
                    <td width="15%">JUMLAH (BERHASIL + BELUM BERHASIL)</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <input type="text" name="jumlah" id="jumlah" value="<?php echo $rowd['Jumlah']; ?>" /> 
                        <script language="javascript">
                            var jumlah = new LiveValidation('jumlah');
                            jumlah.add(Validate.Numericality);
                        </script>

                        Ha </td>
                </tr>

            </table>



        </div>


        <div class="tabbertab">
            <h2>FFB</h2>
            <?php
            if (date('Y') == $_COOKIE['tahun_report']) {
                $table = "fbb_production";
                $nolesenffb = $nolesen;
            } else {
                $table = "fbb_production" . $_COOKIE['tahun_report'];
                if ($_COOKIE['tahun_report'] >= 2012) {
                    $nolesenffb = $nolesen;
                } else {
                    $nolesenffb = substr($nolesen, 0, -1);
                }
            }

            $con = connect();
            $q = "SHOW COLUMNS FROM $table";
            $r = mysql_query($q, $con);
            $totalffb = mysql_num_rows($r);
            if (!$r) {
                echo "<script>alert('No values in table $table !!! Please upload data in UPLOAD DATA NEXT YEAR > FFB PRODUCTION');window.close();</script>";
            }
            ?>
            <p><table width="100%" class="esub">    <td colspan="3"><strong>MAKLUMAT FBB PRODUCTION E-COST</strong></td>
                </tr>
                <tr>
                    <?php
                    while ($row = mysql_fetch_array($r)) {
                        $qd = "select " . $row['Field'] . " as jenis FROM $table where lesen ='$nolesenffb'";
                        $rd = mysql_query($qd, $con);
                        $rowd = mysql_fetch_array($rd);
                        ?>
                    <tr>

                        <td width="11%"><?php echo strtoupper($row['Field']); ?></td>
                        <td width="1%">:</td>
                        <td width="88%"><?php echo $rowd['jenis']; ?></td>
                    </tr>
                <?php } ?>
            </table>


            <?php
            $con = connect();


            $qfbb = "select * FROM $table where lesen ='$nolesenffb'";
            $rfbb = mysql_query($qfbb, $con);
            $rowfbb = mysql_fetch_array($rfbb);
            $totalfbb = mysql_num_rows($rfbb);

//echo "<br>";

            if ($totalfbb == 0) {
                $qaddfbb = "insert into $table (lesen) values ('$nolesenffb')";
                $raddfbb = mysql_query($qaddfbb, $con);
                echo "<script>window.location.href='view_estate_all.php'</script>";
            }
            ?>

            <table width="100%" class="esub_edit">
                <tr>
                    <td colspan="3"><strong>MAKLUMAT FFB PRODUCTION E-COST</strong></td>
                </tr>

                <tr>
                    <td width="11%">NAMA</td>
                    <td width="1%">:</td>
                    <td width="88%"><input name="fbb_nama" type="text" id="fbb_nama" value="<?php echo $rowfbb['nama']; ?>" size="60" /></td>
                </tr>
                <tr>
                    <td width="11%">LESEN</td>
                    <td width="1%">:</td>
                    <td width="88%">
                        <?php echo $rowfbb['lesen']; ?>
                    </td>
                </tr>
                <tr>
                    <td width="11%">NEGERI</td>
                    <td width="1%">:</td>
                    <td width="88%"><input type="text" name="fbb_negeri" id="fbb_negeri" value="<?php echo $rowfbb['negeri']; ?>" /></td>
                </tr>
                <tr>
                    <td width="11%">DAERAH</td>
                    <td width="1%">:</td>
                    <td width="88%"><input type="text" name="fbb_daerah" id="fbb_daerah" value="<?php echo $rowfbb['daerah']; ?>" /></td>
                </tr>
                <tr>
                    <td width="11%">JUMLAH_PENGELUARAN</td>
                    <td width="1%">:</td>
                    <td width="88%"><input type="text" name="fbb_jumlah_pengeluaran" id="fbb_jumlah_pengeluaran" value="<?php echo $rowfbb['jumlah_pengeluaran']; ?>" />

                        <script language="javascript">
                            var fbb_jumlah = new LiveValidation('fbb_jumlah');
                            fbb_jumlah.add(Validate.Numericality);
                        </script>

                    </td>
                </tr>
                <tr>
                    <td width="11%">PURATA_HASIL_BUAH</td>
                    <td width="1%">:</td>
                    <td width="88%"><input type="text" name="purata_hasil_buah" id="purata_hasil_buah" value="<?php echo number_format($rowfbb['purata_hasil_buah'], 2); ?>" />


                        <script language="javascript">
                            var purata_hasil_buah = new LiveValidation('purata_hasil_buah');
                            purata_hasil_buah.add(Validate.Numericality);
                        </script>
                        <input name="lesen_singkat" type="hidden" id="lesen_singkat" value="<?php echo $nolesenffb; ?>" /></td>
                </tr>
            </table>
            </p>



        </div>


        <div class="tabbertab">
            <h2>Login</h2>
            <?php
            $con = connect();
            //$q = "SHOW COLUMNS FROM login_estate";
            //$r = mysql_query($q, $con);
            ?>
            <p><table width="100%" class="esub">
                <?php
                //while ($row = mysql_fetch_array($r)) {
                    $qd = "select lesen,firsttime,success,fail FROM login_estate where lesen ='$nolesen'";
                    $rd = mysql_query($qd, $con);
                    $rowd = mysql_fetch_array($rd);
                    ?>
                    <tr>
                        <td width="11%"><?php echo "LESEN"; ?></td>
                        <td width="1%">:</td>
                        <td width="88%"><?php echo $rowd['lesen']; ?></td>
                    </tr>
					<tr>
                        <td width="11%"><?php echo "FIRSTTIME"; ?></td>
                        <td width="1%">:</td>
                        <td width="88%"><?php echo $rowd['firsttime']; ?></td>
                    </tr>
					<tr>
                        <td width="11%"><?php echo "SUCCESS"; ?></td>
                        <td width="1%">:</td>
                        <td width="88%"><?php echo $rowd['success']; ?></td>
                    </tr>
					<tr>
                        <td width="11%"><?php echo "FAIL"; ?></td>
                        <td width="1%">:</td>
                        <td width="88%"><?php echo $rowd['fail']; ?></td>
                    </tr>
                <?php //} ?>
            </table>
            </p>


            <?php
            $con = connect();
            $qdlogin = "select * FROM login_estate where lesen ='$nolesen'";
//echo $qdlogin . "<br>";
            $rdlogin = mysql_query($qdlogin, $con);
            $rowdlogin = mysql_fetch_array($rdlogin);
            $totallogin = mysql_num_rows($rdlogin);

            if ($totallogin == 0) {
                $qaddlogin = "insert into login_estate (lesen) values ('$nolesen')";
                $raddlogin = mysql_query($qaddlogin, $con);
                //echo "<script>window.location.href='view_estate_all.php'</script>";
            }
            ?>
            <table width="100%" class="esub_edit">
                <tr>
                    <td width="11%">LESEN</td>
                    <td width="1%">:</td>
                    <td width="88%"><?php echo $rowdlogin['lesen']; ?>


                    </td>
                </tr>
                <!--<tr>
                    <td width="11%">PASSWORD</td>
                    <td width="1%">:</td>
                    <td width="88%"><input type="text" name="password" id="password" value="<?php echo $rowdlogin['password']; ?>" /></td>
                </tr>-->
                <tr>
                    <td width="11%">FIRSTTIME</td>
                    <td width="1%">:</td>
                    <td width="88%"><input type="text" name="firsttime" id="firsttime"  value="<?php echo $rowdlogin['firsttime']; ?>" /></td>
                </tr>
                <tr>
                    <td width="11%">SUCCESS</td>
                    <td width="1%">:</td>
                    <td width="88%"><input type="text" name="success" id="success" value="<?php echo $rowdlogin['success']; ?>" /></td>
                </tr>
                <tr>
                    <td width="11%">FAIL</td>
                    <td width="1%">:</td>
                    <td width="88%"><input type="text" name="fail" id="fail" value="<?php echo $rowdlogin['fails']; ?>" /></td>
                </tr>
            </table>
        </div>


        <div class="tabbertab">

            <div class="esub_edit"><table width="100%">
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td>

                            <?php
                            $tahun = $_COOKIE['tahun_report'];

                            $pertama = $tahun - 3;
                            $kedua = $tahun - 2;
                            $ketiga = $tahun - 1;

                            $pertama = substr($pertama, -2);
                            $kedua = substr($kedua, -2);
                            $ketiga = substr($ketiga, -2);
                            ?>


                            <select name="tahun_baru" id="tahun_baru">
                                <option value="<?php echo $ketiga; ?>">Pertama</option>
                                <option value="<?php echo $kedua; ?>">Kedua</option>
                                <option value="<?php echo $pertama; ?>">Ketiga</option>
                            </select>    </td>
                    </tr>

                    <tr>
                        <td width="11%">Bulan </td>
                        <td width="1%">:</td>
                        <td width="88%"><select name="bulan_baru" id="bulan_baru">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">Jun</option>
                                <option value="07">Julai</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">Disember</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Luas Tanaman</td>
                        <td>:</td>
                        <td><input type="text" name="tanaman_baru" id="tanaman_baru" />

                            <script language="javascript">
                                var tanaman_baru = new LiveValidation('tanaman_baru');
                                tanaman_baru.add(Validate.Numericality);
                            </script>

                            Ha</td>
                    </tr>
                </table>
            </div>


            <div class="esub">
                <h2>Tanam Baru</h2>
                <?php
                $con = connect();

                $qdelete = "delete FROM tanam_baru$pertama where tanaman_baru='0' and lesen ='$nolesen'";
                mysql_query($qdelete, $con);


                $q = "select * FROM tanam_baru$pertama where lesen ='$nolesen'";
                $r = mysql_query($q, $con);
                $total = mysql_num_rows($r);
                ?>
                <p>
                    <b>TANAMAN BARU PADA <?php echo $pertama; ?></b>
                <table width="60%" align="center" cellpadding="2" cellspacing="2" class="baju" >

                    <tr>
                        <th>Bulan</th>
                        <th>Tanaman Baru</th>
                        <th>Tindakan</th>
                    </tr>
                    <?php
                    $jumlah1 = 0;
                    $rs = 0;
                    while ($row = mysql_fetch_array($r)) {
                        ?> 		<tr <?php if (++$rs % 2 == 0) { ?>class="alt"<?php } ?>>

                            <td width="29%"><?php echo $row['bulan']; ?></td>
                            <td width="62%"><?php
                                echo $row['tanaman_baru'];
                                $jumlah1 = $jumlah1 + $row['tanaman_baru'];
                                ?></td>
                            <td width="9%"><div align="center"><a href="save_all.php?type=delete&amp;lesen=<?php echo $nolesen; ?>&amp;bulan=<?php echo $row['bulan']; ?>&amp;luas=<?php echo $row['tanaman_baru']; ?>&amp;table=<?php echo "tanam_baru$pertama"; ?>&amp;field=<?php echo "tanaman_baru"; ?>&tahun1=<?= $pertama ?>&tahun2=<?= $kedua ?>&tahun3=<?= $ketiga ?>"><img src="../images/remove.png" alt="" width="20" height="20" border="0" onclick="return confirm('Buang data ini?');" /></a></div></td>
                        </tr>


                    <?php } ?>
                </table>
                <b><em>JUMLAH KESELURUHAN : <?php echo $jumlah1; ?></em></b>
                </p>




                <?php
                $con = connect();

                $qdelete = "delete FROM tanam_baru$kedua where tanaman_baru='0' and lesen ='$nolesen'";
                mysql_query($qdelete, $con);


                $q = "select * FROM tanam_baru$kedua where lesen ='$nolesen'";
                $r = mysql_query($q, $con);
                ?>
                <p>
                    <b>TANAMAN BARU PADA <?php echo $kedua; ?></b>
                <table width="60%" align="center" cellpadding="2" cellspacing="2"  class="baju">

                    <tr>
                        <th>Bulan</th>
                        <th>Tanaman Baru</th>
                        <th>Tindakan</th>
                    </tr> <?php
                    $jumlah2 = 0;

                    $rs1 = 0;
                    while ($row = mysql_fetch_array($r)) {
                        ?>
                        <tr <?php if (++$rs % 2 == 0) { ?>class="alt"<?php } ?>>
                            <td width="29%"><?php echo $row['bulan']; ?></td>
                            <td width="62%"><?php
                                echo $row['tanaman_baru'];
                                $jumlah2 = $jumlah2 + $row['tanaman_baru'];
                                ?></td>
                            <td width="9%"><div align="center"><a href="save_all.php?type=delete&amp;lesen=<?php echo $nolesen; ?>&amp;bulan=<?php echo $row['bulan']; ?>&amp;luas=<?php echo $row['tanaman_baru']; ?>&amp;table=<?php echo "tanam_baru$kedua"; ?>&amp;field=<?php echo "tanaman_baru"; ?>&tahun1=<?= $pertama ?>&tahun2=<?= $kedua ?>&tahun3=<?= $ketiga ?>"><img src="../images/remove.png" width="20" height="20" border="0" onclick="return confirm('Buang data ini?');" /></a></div></td>
                        </tr>


                    <?php } ?>
                </table>
                <b><em>JUMLAH KESELURUHAN : <?php echo $jumlah2; ?></em></b>
                </p>




                <?php
                $con = connect();

                /* to delete data tanaman =0 if not applicable */
                $qdelete = "delete FROM tanam_baru$ketiga where tanaman_baru='0' and lesen ='$nolesen'";
                mysql_query($qdelete, $con);

                $q = "select * FROM tanam_baru$ketiga where lesen ='$nolesen'";
                $r = mysql_query($q, $con);
                if($r){
                ?>
                <p>
                    <b>TANAMAN BARU PADA <?php echo $ketiga; ?></b>
                <table width="60%" align="center" cellpadding="2" cellspacing="2" class="baju">

                    <tr>
                        <th>Bulan</th>
                        <th>Tanaman Baru</th>
                        <th>Tindakan</th>
                    </tr><?php
                    $jumlah3 = 0;
                    $rs2 = 0;
                    while ($row = mysql_fetch_array($r)) {
                        ?>		<tr <?php if (++$rs2 % 2 == 0) { ?>class="alt"<?php } ?>>
                            <td width="29%"><?php echo $row['bulan']; ?></td>
                            <td width="62%"><?php
                                echo $row['tanaman_baru'];
                                $jumlah3 = $jumlah3 + $row['tanaman_baru'];
                                ?></td>
                            <td width="9%"><div align="center"><a href="save_all.php?type=delete&amp;lesen=<?php echo $nolesen; ?>&amp;bulan=<?php echo $row['bulan']; ?>&amp;luas=<?php echo $row['tanaman_baru']; ?>&amp;table=<?php echo "tanam_baru$ketiga"; ?>&amp;field=<?php echo "tanaman_baru"; ?>&tahun1=<?= $pertama ?>&tahun2=<?= $kedua ?>&tahun3=<?= $ketiga ?>"><img src="../images/remove.png" width="20" height="20" border="0" onclick="return confirm('Buang data ini?');" /></a></div></td>
                        </tr>
                    <?php } ?>
                </table>
                <?php } //show if valid sql  ?>
                <?php if(!$r){?>
                <p><strong style="color:red">TIADA DATA UNTUK TANAMAN BARU PADA <?php echo $ketiga; ?> </strong></p>
                  <?php } // show only query valid ?>
                <b><em>JUMLAH KESELURUHAN : <?php echo $jumlah3; ?></em></b>

                <br><br>
                <b style="font-size: 16px">JUMLAH : <?php
                    $total123 = $jumlah1 + $jumlah2 + $jumlah3;
                    echo $total123;
                    ?></b>
                </p>
            </div>
        </div>



        <div class="tabbertab">
            <h2>Tanam Semula</h2>

            <div class="esub_edit"><table width="100%">
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td>

                            <?php
                            //$tahun = $_SESSION['tahun'];

                            $pertama = $tahun - 3;
                            $kedua = $tahun - 2;
                            $ketiga = $tahun - 1;

                            $pertama = substr($pertama, -2);
                            $kedua = substr($kedua, -2);
                            $ketiga = substr($ketiga, -2);
                            ?>


                            <select name="tahun_semula" id="tahun_semula">
                                <option value="<?php echo $ketiga; ?>">Pertama</option>
                                <option value="<?php echo $kedua; ?>">Kedua</option>
                                <option value="<?php echo $pertama; ?>">Ketiga</option>
                            </select>    </td>
                    </tr>

                    <tr>
                        <td width="11%">Bulan </td>
                        <td width="1%">:</td>
                        <td width="88%"><select name="bulan_semula" id="bulan_semula">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">Jun</option>
                                <option value="07">Julai</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">Disember</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Luas Tanaman</td>
                        <td>:</td>
                        <td><input type="text" name="tanaman_semula" id="tanaman_semula" />
                            <script language="javascript">
                                var tanaman_semula = new LiveValidation('tanaman_semula');
                                tanaman_semula.add(Validate.Numericality);
                            </script>

                            Ha</td>
                    </tr>
                </table>
            </div>

            <div class="esub">
                <?php
                $con = connect();

                $qdelete = "delete FROM tanam_semula$pertama where lesen ='$nolesen' and tanaman_semula='0'";
                mysql_query($qdelete, $con);


                $q = "select * FROM tanam_semula$pertama where lesen ='$nolesen'";
                $r = mysql_query($q, $con);
                ?>
                <p>
                    <b>TANAMAN SEMULA PADA <?php echo $pertama; ?></b>
                <table width="60%" align="center" cellpadding="2" cellspacing="2" class="baju">

                    <tr>
                        <th>Bulan</th>
                        <th>Tanaman Semula</th>
                        <th>Tindakan</th>
                    </tr>  <?php
                    $jumlaha1 = 0;
                    $rs3 = 0;
                    while ($row = mysql_fetch_array($r)) {
                        ?>
                        <tr <?php if (++$rs3 % 2 == 0) { ?>class="alt"<?php } ?>>    <td width="29%"><?php echo $row['bulan']; ?></td>
                            <td width="62%"><?php
                                echo $row['tanaman_semula'];
                                $jumlaha1 = $jumlaha1 + $row['tanaman_semula'];
                                ?></td>
                            <td width="9%"><div align="center"><a href="save_all.php?type=delete&amp;lesen=<?php echo $nolesen; ?>&amp;bulan=<?php echo $row['bulan']; ?>&amp;luas=<?php echo $row['tanaman_semula']; ?>&amp;table=<?php echo "tanam_semula$pertama"; ?>&amp;field=<?php echo "tanaman_semula"; ?>&tahun1=<?= $pertama ?>&tahun2=<?= $kedua ?>&tahun3=<?= $ketiga ?>"><img src="../images/remove.png" alt="" width="20" height="20" border="0" onclick="return confirm('Buang data ini?');" /></a></div></td>
                        </tr>
<?php } ?>
                </table>
                <b><em>JUMLAH KESELURUHAN : <?php echo $jumlaha1; ?></em></b>

                </p>


                <?php
                $con = connect();

                $qdelete = "delete FROM tanam_semula$kedua where lesen ='$nolesen' and tanaman_semula='0'";
                mysql_query($qdelete, $con);


                $q = "select * FROM tanam_semula$kedua where lesen ='$nolesen'";
                $r = mysql_query($q, $con);
                ?>
                <p>
                    <b>TANAMAN SEMULA PADA <?php echo $kedua; ?></b>
                <table width="60%" align="center" cellpadding="2" cellspacing="2" class="baju">

                    <tr>
                        <th>Bulan</th>
                        <th>Tanaman Semula</th>
                        <th>Tindakan</th>
                    </tr>

                    <?php
                    $jumlaha2 = 0;
                    $rs5 = 0;
                    while ($row = mysql_fetch_array($r)) {
                        ?>
                        <tr <?php if (++$rs5 % 2 == 0) { ?>class="alt"<?php } ?>>   
                            <td width="29%"><?php echo $row['bulan']; ?></td>
                            <td width="61%"><?php
                                echo $row['tanaman_semula'];
                                $jumlaha2 = $jumlaha2 + $row['tanaman_semula'];
                                ?></td>
                            <td width="10%"><div align="center"><a href="save_all.php?type=delete&amp;lesen=<?php echo $nolesen; ?>&amp;bulan=<?php echo $row['bulan']; ?>&amp;luas=<?php echo $row['tanaman_semula']; ?>&amp;table=<?php echo "tanam_semula$kedua"; ?>&amp;field=<?php echo "tanaman_semula"; ?>&tahun1=<?= $pertama ?>&tahun2=<?= $kedua ?>&tahun3=<?= $ketiga ?>"><img src="../images/remove.png" alt="" width="20" height="20" border="0" onclick="return confirm('Buang data ini?');" /></a></div></td>
                        </tr>
<?php } ?>
                </table>
                <b><em>JUMLAH KESELURUHAN : <?php echo $jumlaha2; ?></em></b>
                </p>


                <?php
                $con = connect();

                $qdelete = "delete FROM tanam_semula$ketiga where lesen ='$nolesen' and tanaman_semula='0'";
                mysql_query($qdelete, $con);


                $q = "select * FROM tanam_semula$ketiga where lesen ='$nolesen'";
                //echo $q; 
                $r = mysql_query($q, $con);
                ?>
                <p>
                    <b>TANAMAN SEMULA PADA <?php echo $ketiga; ?></b>
                    <?php if($r){?>
                <table width="60%" align="center" cellpadding="2" cellspacing="2" class="baju">

                    <tr>
                        <th>Bulan</th>
                        <th>Tanaman Semula</th>
                        <th>Tindakan</th>
                    </tr>  <?php
                    $jumlaha3 = 0;
                    $rs6 = 0;
                    while ($row = mysql_fetch_array($r)) {
                        ?>
                        <tr <?php if (++$rs6 % 2 == 0) { ?>class="alt"<?php } ?>> 
                            <td width="28%"><?php echo $row['bulan']; ?></td>
                            <td width="61%"><?php
                                echo $row['tanaman_semula'];
                                $jumlaha3 = $jumlaha3 + $row['tanaman_semula'];
                                ?></td>
                            <td width="11%"><div align="center"><a href="save_all.php?type=delete&amp;lesen=<?php echo $nolesen; ?>&amp;bulan=<?php echo $row['bulan']; ?>&amp;luas=<?php echo $row['tanaman_semula']; ?>&amp;table=<?php echo "tanam_semula$ketiga"; ?>&amp;field=<?php echo "tanaman_semula"; ?>&tahun1=<?= $pertama ?>&tahun2=<?= $kedua ?>&tahun3=<?= $ketiga ?>"><img src="../images/remove.png" alt="" width="20" height="20" border="0" onclick="return confirm('Buang data ini?');" /></a></div></td>
                        </tr>
<?php } ?>
                </table>
                    <?php } // show only query valid ?>
                <?php if(!$r){?>
                <p><strong style="color:red">TIADA DATA UNTUK TANAMAN SEMULA PADA <?php echo $ketiga; ?> </strong></p>
                  <?php } // show only query valid ?>
                <b><em>JUMLAH KESELURUHAN : <?php echo $jumlaha3; ?></em></b>
                <br><br>
                <b style="font-size: 16px">JUMLAH : <?php
                    $totala123 = $jumlaha1 + $jumlaha2 + $jumlaha3;
                    echo $totala123;
                    ?></b>
                </p>


                <br>

            </div></div>



        <div class="tabbertab">
            <h2>Tanam Tukar</h2>

            <div class="esub_edit"><table width="100%">
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td>

                            <?php
                            //$tahun = $_SESSION['tahun'];

                            $pertama = $tahun - 3;
                            $kedua = $tahun - 2;
                            $ketiga = $tahun - 1;

                            $pertama = substr($pertama, -2);
                            $kedua = substr($kedua, -2);
                            $ketiga = substr($ketiga, -2);
                            ?>


                            <select name="tahun_tukar" id="tahun_tukar">
                                <option value="<?php echo $ketiga; ?>">Pertama</option>
                                <option value="<?php echo $kedua; ?>">Kedua</option>
                                <option value="<?php echo $pertama; ?>">Ketiga</option>
                            </select>    </td>
                    </tr>

                    <tr>
                        <td width="11%">Bulan </td>
                        <td width="1%">:</td>
                        <td width="88%"><select name="bulan_tukar" id="bulan_tukar">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">Jun</option>
                                <option value="07">Julai</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">Disember</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Luas Tanaman</td>
                        <td>:</td>
                        <td><input type="text" name="tanaman_tukar" id="tanaman_tukar" />
                            <script language="javascript">
                                var tanaman_tukar = new LiveValidation('tanaman_tukar');
                                tanaman_tukar.add(Validate.Numericality);
                            </script>

                            Ha</td>
                    </tr>
                </table>
            </div>

            <div class="esub">
                <?php
                $con = connect();

                $qdelete = "delete FROM tanam_tukar$pertama where lesen ='$nolesen' and tanaman_tukar='0'";
                mysql_query($qdelete, $con);


                $q = "select * FROM tanam_tukar$pertama where lesen ='$nolesen'";
                $r = mysql_query($q, $con);
                ?>
                <p>
                    <b>TANAMAN TUKAR PADA <?php echo $pertama; ?></b>
                <table width="60%" align="center" cellpadding="2" cellspacing="2" class="baju">

                    <tr>
                        <th>Bulan</th>
                        <th>Tanaman Baru</th>
                        <th>Tindakan</th>
                    </tr>


                    <?php
                    $jumlahb1 = 0;
                    $rs7 = 0;
                    while ($row = mysql_fetch_array($r)) {
                        ?>
                        <tr <?php if (++$rs7 % 2 == 0) { ?>class="alt"<?php } ?>> 
                            <td width="27%"><?php echo $row['bulan']; ?></td>
                            <td width="62%"><?php
                                echo $row['tanaman_tukar'];
                                $jumlahb1 = $jumlahb1 + $row['tanaman_tukar'];
                                ?></td>
                            <td width="11%"><div align="center"><a href="save_all.php?type=delete&amp;lesen=<?php echo $nolesen; ?>&amp;bulan=<?php echo $row['bulan']; ?>&amp;luas=<?php echo $row['tanaman_tukar']; ?>&amp;table=<?php echo "tanam_tukar$pertama"; ?>&amp;field=<?php echo "tanaman_tukar"; ?>&tahun1=<?= $pertama ?>&tahun2=<?= $kedua ?>&tahun3=<?= $ketiga ?>"><img src="../images/remove.png" alt="" width="20" height="20" border="0" onclick="return confirm('Buang data ini?');" /></a></div></td>
                        </tr>
<?php } ?>
                </table>
                <b><em>JUMLAH KESELURUHAN : <?php echo $jumlahb1; ?></em></b>

                </p>     

                <?php
                $con = connect();

                $qdelete = "delete FROM tanam_tukar$kedua where lesen ='$nolesen' and tanaman_tukar='0'";
                mysql_query($qdelete, $con);


                $q = "select * FROM tanam_tukar$kedua where lesen ='$nolesen'";
                $r = mysql_query($q, $con);
                ?>
                <p>
                    <b>TANAMAN TUKAR PADA <?php echo $kedua; ?></b>
                <table width="60%" align="center" cellpadding="2" cellspacing="2" class="baju">

                    <tr>
                        <th>Bulan</th>
                        <th>Tanaman Semula</th>
                        <th>Tindakan</th>
                    </tr> <?php
                    $jumlahb2 = 0;
                    while ($row = mysql_fetch_array($r)) {
                        ?>
                        <tr <?php if (++$rs6 % 2 == 0) { ?>class="alt"<?php } ?>> 
                            <td width="27%"><?php echo $row['bulan']; ?></td>
                            <td width="63%"><?php
                                echo $row['tanaman_tukar'];
                                $jumlahb2 = $jumlahb2 + $row['tanaman_tukar'];
                                ?></td>
                            <td width="10%"><div align="center"><a href="save_all.php?type=delete&amp;lesen=<?php echo $nolesen; ?>&amp;bulan=<?php echo $row['bulan']; ?>&amp;luas=<?php echo $row['tanaman_tukar']; ?>&amp;table=<?php echo "tanam_tukar$kedua"; ?>&amp;field=<?php echo "tanaman_tukar"; ?>&tahun1=<?= $pertama ?>&tahun2=<?= $kedua ?>&tahun3=<?= $ketiga ?>"><img src="../images/remove.png" alt="" width="20" height="20" border="0" onclick="return confirm('Buang data ini?');" /></a></div></td>
                        </tr>

<?php } ?>
                </table>
                <b><em>JUMLAH KESELURUHAN : <?php echo $jumlahb2; ?></em></b>

                </p>

                <?php
                $con = connect();

                $qdelete = "delete FROM tanam_tukar$ketiga where lesen ='$nolesen' and tanaman_tukar='0'";
                mysql_query($qdelete, $con);


                $q = "select * FROM tanam_tukar$ketiga where lesen ='$nolesen'";
                $r = mysql_query($q, $con);
                
                if($r){
                ?>
                <p>
                    <b>TANAMAN TUKAR PADA <?php echo $ketiga; ?></b>
                <table width="60%" align="center" cellpadding="2" cellspacing="2" class="baju">

                    <tr>
                        <th>Bulan</th>
                        <th>Tanaman Semula</th>
                        <th>Tindakan</th>
                    </tr>

                    <?php
                    $jumlahb3 = 0;
                    while ($row = mysql_fetch_array($r)) {
                        ?>
                        <tr <?php if (++$rs6 % 2 == 0) { ?>class="alt"<?php } ?>> 



                            <td width="26%"><?php echo $row['bulan']; ?></td>
                            <td width="64%"><?php
                                echo $row['tanaman_tukar'];
                                $jumlahb3 = $jumlahb3 + $row['tanaman_tukar'];
                                ?></td>
                            <td width="10%"><div align="center"><a href="save_all.php?type=delete&amp;lesen=<?php echo $nolesen; ?>&amp;bulan=<?php echo $row['bulan']; ?>&amp;luas=<?php echo $row['tanaman_tukar']; ?>&amp;table=<?php echo "tanam_tukar$ketiga"; ?>&amp;field=<?php echo "tanaman_tukar"; ?>&tahun1=<?= $pertama ?>&tahun2=<?= $kedua ?>&tahun3=<?= $ketiga ?>"><img src="../images/remove.png" alt="" width="20" height="20" border="0" onclick="return confirm('Buang data ini?');" /></a></div></td>
                        </tr>
<?php } ?>
                        
                </table>
                <?php } //not show if no data ?>
                
                 <?php if(!$r){?>
                <p><strong style="color:red">TIADA DATA UNTUK TANAMAN TUKAR PADA <?php echo $ketiga; ?> </strong></p>
                  <?php } // show only query valid ?>
                <b><em>JUMLAH KESELURUHAN : <?php echo $jumlahb3; ?></em></b>

                <br><br>
                <b style="font-size: 16px">JUMLAH : <?php
                    $totalb123 = $jumlahb1 + $jumlahb2 + $jumlahb3;
                    echo $totalb123;

                    $totalbelumberhasil = $total123 + $totala123 + $totalb123;
                    $yesupdate = updateesub($nolesen, $tableesub, 'Belum_Berhasil', $totalbelumberhasil);
                    //echo "<br><br>".$yesupdate; 
                    $totaljumlah = $totalbelumberhasil + $Berhasil;
                    updateesub($nolesen, $tableesub, 'Jumlah', $totaljumlah);
                    if ($yesupdate === 1) {
                        //echo "<script>alert('yuo');</script>";
                        echo "<script>location.reload();</script>";
                    }
                    ?></b>


<?php /* start of update belum berhasil in e_sub */
?>
                </p></div>
        </div>

        <div class="tabbertab">
            <h2>Estate Info</h2>

            <?php
            $pengguna = new user('estate', $nolesen);
            $negeri = new daerah('negeri', '');
            ?>
            <div class="esub">
                <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" >

                    <tr>
                        <td width="1%" height="33">&nbsp;</td>
                        <td width="15%"><strong>Alamat 1 </strong></td>
                        <td width="3%"><strong>:</strong></td>
                        <td width="81%" colspan="2">
<?= $pengguna->alamat1; ?>
<?= $nolesen; ?></td>
                    </tr>
                    <tr>
                        <td height="35">&nbsp;</td>
                        <td><strong>Alamat 2</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">


<?= $pengguna->alamat2; ?></td>
                    </tr>
                    <tr>
                        <td height="35">&nbsp;</td>
                        <td><strong>Poskod</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">


<?= $pengguna->poskod; ?></td>
                    </tr>
                    <tr>
                        <td height="31">&nbsp;</td>
                        <td><strong>Daerah</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">

                            <?php
                            $pb = $pengguna->bandar;
                            echo str_replace(",", "", $pb);
                            ?></td>
                    </tr>
                    <tr>
                        <td height="36">&nbsp;</td>
                        <td><strong>Negeri</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">
<?php echo $pengguna->negeri; ?>

                        </td>
                    </tr>
                    <tr>
                        <td height="35">&nbsp;</td>
                        <td><strong>No. Telefon</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">
<?= $pengguna->notelefon; ?>

                        </td>
                    </tr>
                    <tr>
                        <td height="32">&nbsp;</td>
                        <td><strong>No. Faks</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">

<?= $pengguna->nofax; ?></td>
                    </tr>
                    <tr>
                        <td height="31">&nbsp;</td>
                        <td><strong>Emel</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">	  

<?= $pengguna->email; ?></td>
                    </tr>




                </table>
            </div>


            <div class="esub_edit">
                <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" style="border:1px #333333 solid">

                    <tr>
                        <td width="1%" height="33">&nbsp;</td>
                        <td width="15%"><strong>Alamat 1 </strong></td>
                        <td width="3%"><strong>:</strong></td>
                        <td width="81%" colspan="2">
                            <input name="alamat1" type="text" id="alamat1" value="<?= $pengguna->alamat1; ?>" size="50" />
                            <input name="nolesen" type="hidden" id="nolesen" value="<?= $nolesen ?>" /></td>
                    </tr>
                    <tr>
                        <td height="35">&nbsp;</td>
                        <td><strong>Alamat 2</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">
                            <input name="alamat2" type="text" id="alamat2" value="<?= $pengguna->alamat2; ?>" size="50" /></td>
                    </tr>
                    <tr>
                        <td height="35">&nbsp;</td>
                        <td><strong>Poskod</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">
                            <input name="poskod" type="text" id="poskod" value="<?= $pengguna->poskod; ?>" size="50" class="poskod"/></td>
                    </tr>
                    <tr>
                        <td height="31">&nbsp;</td>
                        <td><strong>Daerah</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">
                            <input name="daerah" type="text" id="daerah" value="<?php
                                   $pb = $pengguna->bandar;
                                   echo str_replace(",", "", $pb);
                                   ?>" size="50" /></td>
                    </tr>
                    <tr>
                        <td height="36">&nbsp;</td>
                        <td><strong>Negeri</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2"><select name="negeri" id="negeri">
                                <?php for ($i = 0; $i < $negeri->total; $i++) { ?>
                                    <option value="<?= $negeri->namanegeri[$i]; ?>" <?php if ($negeri->namanegeri[$i] == $pengguna->negeri) { ?>selected="selected"<?php } ?>><?= $negeri->namanegeri[$i]; ?></option>
<?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td height="35">&nbsp;</td>
                        <td><strong>No. Telefon</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">
                            <input name="notelefon" type="text" id="notelefon" value="<?= $pengguna->notelefon; ?>" size="50" class="telefon" /></td>
                    </tr>
                    <tr>
                        <td height="32">&nbsp;</td>
                        <td><strong>No. Faks</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">
                            <input name="nofax" type="text" id="nofax" value="<?= $pengguna->nofax; ?>" size="50" class="telefon" /></td>
                    </tr>
                    <tr>
                        <td height="31">&nbsp;</td>
                        <td><strong>Emel</strong></td>
                        <td><strong>:</strong></td>
                        <td colspan="2">
                            <input name="email" type="text" id="email" value="<?= $pengguna->email; ?>" size="50" /></td>
                    </tr>




                </table>
            </div>   
        </div>



        <div class="tabbertab">
            <h2>Estate Details</h2>
            <?php
            include('../class/syarikat.class.php');
            $company = new syarikat('syarikat', '');
            $ahli = new syarikat('keahlian', '');
            $muka = new syarikat('mukabumi', '');
            $pengguna = new user('estate', $nolesen);
            ?>

            <div class="esub">
                <table width="100%" align="center" cellspacing="0" class="tableCss">
                    <tr>
                        <td height="29" >&nbsp;</td>
                        <td width="190" ><strong>
<?= setstring('mal', 'Nama pegawai melapor', 'en', 'Name of Reporting Officer'); ?>
                            </strong> </td>
                        <td width="19" ><div align="center">:</div></td>
                        <td width="808" colspan="4" >

<?= $pengguna->pegawai; ?>
                            <input name="nolesen2" type="hidden" id="nolesen2" value="<?= $_SESSION['lesen']; ?>" />          </td>
                    </tr>
                    <tr>
                        <td width="25" height="37">&nbsp;</td>
                        <td><b>
<?= setstring('mal', 'Jenis syarikat', 'en', 'Company Type'); ?>
                            </b></td>
                        <td><div align="center">:</div></td>
                        <td colspan="4"><?php echo $pengguna->jenissyarikat; ?></td>
                    </tr>
                    <tr>
                        <td height="32" >&nbsp;</td>
                        <td ><strong>
<?= setstring('mal', 'Keahlian dalam persatuan', 'en', 'Membership in Union'); ?>
                                </b></strong></td>
                        <td ><div align="center">:</div></td>
                        <td colspan="4" ><?php echo $pengguna->keahlian; ?></td>
                    </tr>
                    <tr>
                        <td height="31">&nbsp;</td>
                        <td><strong>
<?= setstring('mal', 'Integrasi dengan kilang buah sawit', 'en', 'Integration with Palm Factory'); ?>
                            </strong></td>
                        <td><div align="center">:</div></td>
                        <td width="808">
<?php echo $pengguna->integrasi; ?>          </td>
                    </tr>
                </table>
            </div>

            <div class="esub_edit">
                <table width="100%" align="center" cellspacing="0" class="tableCss">
                    <tr>
                        <td height="29" >&nbsp;</td>
                        <td width="189" ><strong>
<?= setstring('mal', 'Nama pegawai melapor', 'en', 'Name of Reporting Officer'); ?>
                            </strong> </td>
                        <td width="20" ><div align="center">:</div></td>
                        <td width="807" ><input name="pegawai" type="text" id="pegawai" style="text-align:left; font-weight:normal;" value="<?= $pengguna->pegawai; ?>" size="50" width="50" />
                            <input name="nolesen2" type="hidden" id="nolesen2" value="<?= $_SESSION['lesen']; ?>" />          </td>
                    </tr>
                    <tr>
                        <td width="26" height="37">&nbsp;</td>
                        <td><b>
<?= setstring('mal', 'Jenis syarikat', 'en', 'Company Type'); ?>
                            </b></td>
                        <td><div align="center">:</div></td>
                        <td><select name="syarikat" id="syarikat" style="width:330px">
                                <option>-
                                <?= setstring('mal', 'Pilih', 'en', 'Select'); ?>
                                    -</option>
                                    <?php for ($i = 0; $i < $company->total; $i++) { ?>
                                    <option value="<?= $company->comp_name[$i]; ?>" <?php if ($company->comp_name[$i] == $pengguna->jenissyarikat) { ?>selected="selected"<?php } ?>>
                                    <?= $company->comp_alt[$i]; ?>
                                    </option>
<?php } ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td height="32" >&nbsp;</td>
                        <td ><strong>
<?= setstring('mal', 'Keahlian dalam persatuan', 'en', 'Membership in Union'); ?>
                                </b></strong></td>
                        <td ><div align="center">:</div></td>
                        <td ><select name="keahlian" id="keahlian" style="width:330px">
                                <option>-
                                <?= setstring('mal', 'Pilih', 'en', 'Select'); ?>
                                    -</option>
                                    <?php for ($i = 0; $i < $ahli->total; $i++) { ?>
                                    <option value="<?= $ahli->ahli_name[$i]; ?>" <?php if ($ahli->ahli_name[$i] == $pengguna->keahlian) { ?>selected="selected"<?php } ?>>
                                    <?= $ahli->ahli_alt[$i]; ?>
                                    </option>
<?php } ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td height="31">&nbsp;</td>
                        <td><strong>
<?= setstring('mal', 'Integrasi dengan kilang buah sawit', 'en', 'Integration with Palm Factory'); ?>
                            </strong></td>
                        <td><div align="center">:</div></td>
                        <td><input type="radio" name="integrasi" id="radio" value="Y" <?php if ($pengguna->integrasi == 'Y') { ?>checked="checked"<?php } ?> />
                            <?= setstring('mal', 'Ya', 'en', 'Yes'); ?>
                            <input type="radio" name="integrasi" id="radio2" value="N" <?php if ($pengguna->integrasi == 'N') { ?>checked="checked"<?php } ?> />
<?= setstring('mal', 'Tidak', 'en', 'No'); ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <br />
        <input type="button" name="edit" class="edit" value="Edit Maklumat"  onclick="buka('esub', 'kemaskini', 'edit', 'esub_edit')"  />
        <input type="submit" name="Kemaskini" class="kemaskini" value="Kemaskini Maklumat"/>
        <input type="button" name="button" id="button" value="Tukar No Lesen" onclick="pergi('<?php echo $nolesen; ?>');" />
        <label>
            <input type="button" name="Tutup" id="Tutup" value="Tutup Tetingkap" onclick="window.close();" />
        </label>
        <input name="nolesen" type="hidden" id="nolesen" value="<?php echo $nolesen; ?>" />
</form>

<?php mysql_close($con); ?>