<?php
session_start();

if ($_SESSION['type'] <> "admin")
    header("location:../logout.php");

include('../Connections/connection.class.php');

include('baju.php');
?>
<?php
extract($_REQUEST);


if ($type == 'delete') {
    $con = connect();
    $qall = "update ekilang  set ffb_proses='0' where no_lesen ='$nolesen' and tahun='$tahun' and bulan ='$bulan' ";
    $rall = mysql_query($qall, $con);
    $tahun = $tahun + 1;
    echo "<script>location.href='view_mill_all.php?nolesen=$nolesen&tahun=$tahun';</script>";
}

$tahunaddkilang = $tahun;
$no_lesen = $nolesen;
$tahun = $tahun - 1;
?><style type="text/css">
    <!--
    body,td,th {
        font-family: Geneva, Arial, Helvetica, sans-serif;
        font-size: 12px;
    }
    -->
</style>

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
    function closeWindow() {
        window.opener.location.reload();
        window.close();
    }
</script>
<script language="javascript">
    $(document).ready(function () {

        $(".esub_edit").hide();
        $(".kemaskini").hide();


        /*  var a = document.getElementById("tanaman_semula").value;
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
         }*/




    });

    function buka(x, y, z, a) {
        $("." + x).hide();
        $("." + y).show();
        $("." + z).hide();
        $("." + a).show();
    }

</script>
<script language="javascript">
    function pergi(x)
    {
        window.location.href = 'add_estate_all.php?jenis=edit&lesen_lama=' + x;
    }
</script>


<script type="text/javascript" src="../js/tabber/tabber.js"></script>
<title>Mill Details</title>
<h3>License No : <?php echo $nolesen; ?></h3>
<form action="" method="post" name="form_esub" target="_self" id="form_esub">
    <div class="tabber" id="mytabber1">




        <div class="tabbertab">
            <h2>Alamat E-Kilang</h2>
            <?php
            $con = connect();

            $qfbb = "select * FROM ekilang where no_lesen ='$nolesen' and tahun='$tahun'";
            $rfbb = mysql_query($qfbb, $con);
            $rowfbb = mysql_fetch_array($rfbb);
            $totalfbb = mysql_num_rows($rfbb);

            $qd = "select * FROM alamat_ekilang where lesen ='$nolesen'";
            $rd = mysql_query($qd, $con);
            $rowd = mysql_fetch_array($rd);
            $total = mysql_num_rows($rd);
            if ($total == 0) {
                $qaddress = "INSERT INTO alamat_ekilang (lesen, nama) VALUES ('$no_lesen', '" . $rowfbb['NAMA_KILANG'] . "')";
                $raddress = mysql_query($qaddress, $con);
                if ($raddress) {
                    echo "<script>location.href='view_mill_all.php?nolesen=$no_lesen&tahun=$tahunaddkilang';</script>";
                }
            }
            ?>


            <table width="100%" class="esub">

                <tr>
                    <td width="15%">LESEN</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['lesen']; ?></td>
                </tr>
                <tr>
                    <td width="15%">NAMA </td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['nama']; ?></td>
                </tr>

                <tr>
                    <td width="15%">ALAMAT1</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['alamat1']; ?> <br /></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT2</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['alamat2']; ?></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT3</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['alamat3']; ?></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT SURAT1</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['alamatsurat1']; ?></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT SURAT2</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['alamatsurat2']; ?></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT SURAT3</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['alamatsurat3']; ?></td>
                </tr>
                <tr>
                    <td width="15%">NO TELEFON</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['notel']; ?></td>
                </tr>
                <tr>
                    <td width="15%">NO FAX</td>
                    <td width="1%">:</td>
                    <td width="84%"><?php echo $rowd['nofax']; ?></td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td>:</td>
                    <td><?php echo $rowd['email']; ?></td>
                </tr>
                <tr>
                    <td>PEGAWAI</td>
                    <td>:</td>
                    <td><?php echo $rowd['pegawai']; ?></td>
                </tr>

            </table>





            <table width="100%" class="esub_edit">

                <tr>
                    <td width="15%">LESEN</td>
                    <td width="1%">:</td> 
                    <td width="84%"><?php echo $rowd['lesen']; ?>       <label>
                            <input type="hidden" name="add_lesen" id="add_lesen" value="<?php echo $rowd['lesen']; ?>" />
                        </label></td>
                </tr>
                <tr>
                    <td width="15%">NAMA </td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <label><?php echo $rowd['nama']; ?>
                            <input type="hidden" name="add_nama" id="add_nama" value="<?php echo $rowd['nama']; ?>" />
                        </label></td>
                </tr>

                <tr>
                    <td width="15%">ALAMAT1</td>
                    <td width="1%">:</td>
                    <td width="84%"> <label>
                            <input type="text" name="add_alamat1" id="add_alamat1"  value="<?php echo $rowd['alamat1']; ?>"/>
                        </label>
                        <br /></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT2</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <label>
                            <input type="text" name="add_alamat2" id="add_alamat2" value="<?php echo $rowd['alamat2']; ?>" />
                        </label></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT3</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <label>
                            <input type="text" name="add_alamat3" id="add_alamat3" value="<?php echo $rowd['alamat3']; ?>" />
                        </label></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT SURAT1</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <label>
                            <input type="text" name="add_surat1" id="add_surat1" value="<?php echo $rowd['alamatsurat1']; ?>" />
                        </label></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT SURAT2</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <label>
                            <input type="text" name="add_surat2" id="add_surat2" value="<?php echo $rowd['alamatsurat2']; ?>" />
                        </label></td>
                </tr>
                <tr>
                    <td width="15%">ALAMAT SURAT3</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <label>
                            <input type="text" name="add_surat3" id="add_surat3" value="<?php echo $rowd['alamatsurat3']; ?>" />
                        </label></td>
                </tr>
                <tr>
                    <td width="15%">NO TELEFON</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <label>
                            <input type="text" name="add_telefon" id="add_telefon" value="<?php echo $rowd['notel']; ?>" />
                        </label></td>
                </tr>
                <tr>
                    <td width="15%">NO FAX</td>
                    <td width="1%">:</td>
                    <td width="84%">
                        <label>
                            <input type="text" name="add_fax" id="add_fax" value="<?php echo $rowd['nofax']; ?>" />
                        </label></td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td>:</td>
                    <td>
                        <label>
                            <input type="text" name="add_email" id="add_email" value="<?php echo $rowd['email']; ?>" />
                        </label></td>
                </tr>
                <tr>
                    <td>PEGAWAI</td>
                    <td>:</td>
                    <td>
                        <label>
                            <input type="text" name="add_pegawai" id="add_pegawai" value="<?php echo $rowd['pegawai']; ?>" />
                        </label></td>
                </tr>
            </table>








        </div>


        <div class="tabbertab">
            <h2>EKILANG</h2>
            <?php
            $con = connect();
            $q = "SHOW COLUMNS FROM ekilang WHERE Field in  ('NO_LESEN', 'NAMA_KILANG', 'TAHUN','NEGERI','SYARIKAT_INDUK');";
            $r = mysql_query($q, $con);

            $nolesenffb = substr($nolesen, 0, -1);
            ?>
            <p><table width="100%" class="esub">    <td colspan="3"><strong>MAKLUMAT E-KILANG</strong></td>
                </tr>
                <tr>
                    <?php
                    while ($row = mysql_fetch_array($r)) {
                        $qd = "select " . $row['Field'] . " as jenis FROM ekilang where no_lesen ='$nolesen' and tahun='$tahun'";
                        //echo $qd."<br>";
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
            $lesen_singkat = substr($nolesen, 0, -1);
            ?>

            <table width="100%" class="esub_edit">
                <tr>
                    <td colspan="3"><strong>MAKLUMAT EKILANG</strong></td>
                </tr>
                <tr>
                    <td width="11%">NO_LESEN</td>
                    <td width="1%">:</td>
                    <td width="88%">
                        <?php echo $rowfbb['NO_LESEN']; ?> </td>
                </tr>
                <tr>
                    <td width="11%">NAMA_KILANG</td>
                    <td width="1%">:</td>
                    <td width="88%"><?php echo $rowfbb['NAMA_KILANG']; ?>
                        <input type="hidden" name="nama_kilang" id="nama_kilang" value="<?php echo $rowfbb['NAMA_KILANG']; ?>" /></td>
                </tr>


                <tr>
                    <td>NEGERI</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="negeri" id="negeri" value="<?php echo $rowfbb['NEGERI']; ?>" /></td>
                </tr>

                <tr>
                    <td>SYARIKAT INDUK</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="syarikat_induk" id="syarikat_induk" value="<?php echo $rowfbb['SYARIKAT_INDUK']; ?>" /></td>
                </tr> <tr>
                    <td>TAHUN</td>
                    <td>&nbsp;</td>
                    <td><?php echo $rowfbb['TAHUN']; ?>
                        <input type="hidden" name="tahun" id="tahun" value="<?php echo $rowfbb['TAHUN']; ?>" />
                        <input type="hidden" name="bulan" id="bulan" value="<?php echo $rowfbb['BULAN']; ?>"  />       </td>
                </tr>
            </table>
            </p>



        </div>


        <div class="tabbertab">
            <h2>Login</h2>
            <?php
            $con = connect();
            $q = "select * FROM login_mill where lesen ='$nolesen'";
            $r = mysql_query($q, $con);
            $row = mysql_fetch_array($r)
            ?>
            <table width="100%" class="esub">
                <tr>
                    <td width="11%">LESEN</td>
                    <td width="1%">:</td>
                    <td width="88%"><?php echo $row['lesen']; ?>


                    </td>
                </tr>
                <tr>
                    <td width="11%">PASSWORD</td>
                    <td width="1%">:</td>
                    <td width="88%"><?php echo $row['password']; ?></td>
                </tr>
                <tr>
                    <td width="11%">FIRSTTIME</td>
                    <td width="1%">:</td>
                    <td width="88%"><?php echo $row['firsttime']; ?></td>
                </tr>
                <tr>
                    <td width="11%">SUCCESS</td>
                    <td width="1%">:</td>
                    <td width="88%"><?php echo $row['success']; ?></td>
                </tr>
                <tr>
                    <td width="11%">FAIL</td>
                    <td width="1%">:</td>
                    <td width="88%"><?php echo $row['fail']; ?></td>
                </tr>
            </table>
            </p>


            <?php
            $con = connect();
            $qdlogin = "select * FROM login_mill where lesen ='$nolesen'";
            $rdlogin = mysql_query($qdlogin, $con);
            $rowdlogin = mysql_fetch_array($rdlogin);
            $totallogin = mysql_num_rows($rdlogin);
            if ($totallogin === 0) {
                $qdloginmil = "INSERT INTO login_mill (lesen, password, firsttime) VALUES ('" . $nolesen . "', 'kilang', '0')";
                $rdloginmill = mysql_query($qdloginmil, $con);
                if ($rdloginmill) {
                    echo "<script>location.href='view_mill_all.php?nolesen=$nolesen&tahun=$tahun';</script>";
                }
            }
            ?>
            <table width="100%" class="esub_edit">
                <tr>
                    <td width="11%">LESEN</td>
                    <td width="1%">:</td>
                    <td width="88%"><?php echo $rowdlogin['lesen']; ?>


                    </td>
                </tr>
                <tr>
                    <td width="11%">PASSWORD</td>
                    <td width="1%">:</td>
                    <td width="88%"><input type="text" name="password" id="password" value="<?php echo $rowdlogin['password']; ?>" /></td>
                </tr>
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
                    <td width="88%"><input type="text" name="fail" id="fail" value="<?php echo $rowdlogin['fail']; ?>" /></td>
                </tr>
            </table>
        </div>

        <div class="tabbertab">
            <h2>Maklumat pada tahun <?php echo $tahun; ?></h2>
            <table width="60%" border="0" align="center" class="baju">

                <tr>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th><div align="right">Jumlah</div></th>
                <!--<th><div align="center">Tindakan</div></th>-->
                </tr>

                <?php
                $qa = "select * from ekilang where no_lesen ='$no_lesen' and tahun='$tahun' order by cast(bulan as signed) ";
                $ra = mysql_query($qa, $con);
                $totala = mysql_num_rows($ra);
                $all = 0;
                $row = mysql_fetch_array($ra);
                /*                 * ********initial 12 bulan********** */
                for ($m = 1; $m < 13; $m++) {
                    $qadd = "INSERT INTO ekilang (NO_LESEN, NAMA_KILANG, NEGERI, BULAN, TAHUN) VALUES ('" . $row['NO_LESEN'] . "', '" . $row['NAMA_KILANG'] . "', '" . $row['NEGERI'] . "', '" . $m . "', '" . $row['TAHUN'] . "')";
                    mysql_query($qadd, $con);
                }

                $qa = "select * from ekilang where no_lesen ='$no_lesen' and tahun='$tahun' order by cast(bulan as signed) ";
                $ra = mysql_query($qa, $con);
                $totala = mysql_num_rows($ra);
                $all = 0;
                while ($row = mysql_fetch_array($ra)) {
                    ?>
                    <tr>
                        <td><?php echo $row['TAHUN']; ?></td>
                        <td>
                            <input name="bulan[<?php echo $row['NO_LESEN']; ?>:<?php echo $row['TAHUN']; ?>:<?php echo $row['BULAN']; ?>]" type="text" id="bulan[<?php echo $row['NO_LESEN']; ?>:<?php echo $row['TAHUN']; ?>:<?php echo $row['BULAN']; ?>]" size="3" maxlength="2" value="<?php echo $row['BULAN']; ?>" /></td>



                        <td><div align="right"><?php $all = $all + $row['FFB_PROSES']; ?>
                                <input type="text" name="jumlah[<?php echo $row['NO_LESEN']; ?>:<?php echo $row['TAHUN']; ?>:<?php echo $row['BULAN']; ?>]" id="jumlah[<?php echo $row['NO_LESEN']; ?>:<?php echo $row['TAHUN']; ?>:<?php echo $row['BULAN']; ?>]" value="<?php echo number_format($row['FFB_PROSES'], 2); ?>" />
                            </div></td>
                     <!--   <td><div align="center">[<a href="view_mill_all.php?nolesen=<?php echo $row['NO_LESEN']; ?>&amp;tahun=<?php echo $row['TAHUN']; ?>&amp;bulan=<?php echo $row['BULAN']; ?>&amp;type=delete" onclick="return alert('Buang data ini?');">Buang</a>]</div></td>-->
                    </tr>
                    <?php
                } //while ada data 
                if ($totala == 0) {
                    $bulansemasa = 1;
                    for ($r = 0; $r < 12; ++$r) {
                        ?>
                        <tr>
                            <td><?php echo $tahun; ?></td>
                            <td>
                                <input name="bulan[<?php echo $no_lesen; ?>:<?php echo $tahun; ?>:<?php echo $bulansemasa; ?>]" type="text" id="bulan[<?php echo $no_lesen; ?>:<?php echo $tahun; ?>:<?php echo $r; ?>]" size="3" maxlength="2" value="<?php echo $bulansemasa; ?>" /></td>



                            <td><div align="right"><?php $all = $all + $row['FFB_PROSES']; ?>
                                    <input type="text" name="jumlah[<?php echo $no_lesen; ?>:<?php echo $tahun; ?>:<?php echo $bulansemasa; ?>]" id="jumlah[<?php echo $no_lesen; ?>:<?php echo $tahun; ?>:<?php echo $r; ?>]" value="<?php echo number_format($row['FFB_PROSES'], 2); ?>" />
                                </div></td>
                          <!--  <td><div align="center">[<a href="view_mill_all.php?nolesen=<?php echo $no_lesen; ?>&amp;tahun=<?php echo $tahun; ?>&amp;bulan=<?php echo $r; ?>&amp;type=delete" onclick="return alert('Buang data ini?');">Buang</a>]</div></td>-->
                        </tr>
                        <?php
                        $bulansemasa = $bulansemasa + 1;
                    }//for 12 bulan 
                }
                ?>
                <tr>
                    <th colspan="2">Total</th>
                    <th><div align="right" id="total_all"><?php echo number_format($all, 2); ?></div></th>
               <!-- <th>&nbsp;</th>-->
                </tr>
            </table>
        </div>

        <br />

        <input type="button" name="edit" class="edit" value="Edit Maklumat"  onclick="buka('esub', 'kemaskini', 'edit', 'esub_edit')"  />
        <input type="submit" name="kemaskini" id="kemaskini" class="kemaskini" value="Kemaskini Maklumat" onclick="return confirm('Are you sure to save this data?');"/>
        <!--<input type="button" name="button" id="button" value="Tukar No Lesen" onclick="pergi('<?php echo $nolesen; ?>');" />-->
        <input name="nolesen" type="hidden" id="nolesen" value="<?php echo $nolesen; ?>" />
        <input name="tahunkilang" type="hidden" id="tahunkilang" value="<?php echo $tahun; ?>" />

        <input name="batal" type="button" value="Batal" onclick="location.reload();" />
        <strong>
            <input type="button" name="close" id="close" value="Tutup Tetingkap" onclick="closeWindow();"/>
        </strong>
</form>
<?php
if (isset($kemaskini)) {
    if ($type != "delete") {

        $syarikat_induk = strtoupper($syarikat_induk);
        $negeri = strtoupper($negeri);

        $q_address = "UPDATE alamat_ekilang SET alamat1='$add_alamat1', alamat2='$add_alamat2', alamat3='$add_alamat3', alamatsurat1='$add_surat1', alamatsurat2='$add_surat2', alamatsurat3='$add_surat3', notel='$add_telefon', nofax='$add_fax', email='$add_email', pegawai='$add_pegawai' WHERE (lesen='$nolesen')";
        $r_address = mysql_query($q_address, $con);


        $q_fbb = "update ekilang "
                . " set "
                . " negeri='$negeri', "
                . " syarikat_induk='$syarikat_induk' "
                . " where "
                . " no_lesen = '$nolesen' "
                . " and tahun ='$tahunkilang' ";
        $r_fbb = mysql_query($q_fbb, $con);


        $q_login = "update "
                . " login_mill "
                . " set "
                . " password='$password', "
                . " firsttime='$firsttime', "
                . " success='$success', "
                . " fail='$fail' "
                . " where lesen ='$nolesen'	";
        $r_login = mysql_query($q_login, $con);


        $qall = "select "
                . "* "
                . "from ekilang "
                . "where "
                . "no_lesen ='$nolesen' "
                . "and tahun='$tahunkilang' ";
        $rall = mysql_query($qall, $con);
        $totalall = mysql_num_rows($rall);

        foreach ($jumlah as $id => $value) {
            $var = explode(":", $id);
            $value = str_replace(",", "", $value);
            $q = "update ekilang "
                    . "set "
                    . "ffb_proses='$value' "
                    . "where "
                    . "tahun = '$var[1]' "
                    . "and bulan ='$var[2]' "
                    . "and no_lesen='$var[0]'";
            if ($totalall == 0) {
                $q = "INSERT INTO ekilang "
                        . "(NO_LESEN, "
                        . "NAMA_KILANG,"
                        . " NEGERI,"
                        . " SYARIKAT_INDUK,"
                        . " BULAN,"
                        . " TAHUN,"
                        . " FFB_PROSES,"
                        . " ESTET_SENDIRI,"
                        . " LAIN,"
                        . " PENGELUARAN_CPO,"
                        . " PENGELUARAN_PK) "
                        . "VALUES "
                        . "('$var[0]', "
                        . "'$nama_kilang', "
                        . "'$negeri', "
                        . "'$syarikat_induk', "
                        . "'$var[2]', "
                        . "'$var[1]', "
                        . "'$value', "
                        . "'', "
                        . "'', "
                        . "'', "
                        . "'')";
            }//if total 0
            //echo $q."<br>";
            $a = mysql_query($q, $con);
        }

        $tahun = $tahun + 2;
//echo "tahun".$tahun;

        echo "<script>window.location.href='view_mill_all.php?nolesen=$nolesen&tahun=$tahun'</script>";
    }
}//isset kemaskini 
?>
<?php mysql_close($con); ?>