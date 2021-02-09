<?php
include ('../Connections/connection.class.php');
include('baju_merah.php');
$con = connect();
extract($_REQUEST);

$satu = $_COOKIE['tahun_report'] - 0;
$dua = $_COOKIE['tahun_report'] - 1;
$con = connect();

function soalan($jenis, $subjenis, $tahun1, $tahun2, $state, $district) {
    global $con;

    $q = "select * from q_km where type='$jenis' ";
    if ($subjenis == "fertiliser" && $jenis == "upk") {
        $q.=" and sub_type = '$subjenis'";
    }

    $r = mysqli_query($con, $q);

    $jas1 = 0;
    $jas2 = 0;
    $jb1 = 0;
    $jb2 = 0;

    while ($row = mysqli_fetch_array($r)) {
        if ($subjenis != "fertiliser") {
            if ($row['isChild'] == "N" && strlen($row['sub_type']) > 0) {
                continue;
            }
            $a1 = pertama($tahun2, $row['name'], '0', $state, $district); //2011
            $b1 = pertama($tahun1, $row['name'], '0', $state, $district); //2012

            $jas1+=$a1[0]; //hectre 2011
            $jas2+=$a1[1]; //tonne 2011

            $jb1+=$b1[0]; //hectre 2012
            $jb2+=$b1[1]; //tonne 2012
        } else {
            $total1 = pertama($tahun1, "i. Purchase of fertilizer", '0', $state, $district);
            $total2 = pertama($tahun1, "ii.Labour cost to apply fertilizers", '0', $state, $district);
            $total3 = pertama($tahun1, "iii. Machinery use and maintenance", '0', $state, $district);
            $total4 = pertama($tahun1, "iv. Soil and foliar analysis", '0', $state, $district);

            $total5 = pertama($tahun2, "i. Purchase of fertilizer", '0', $state, $district);
            $total6 = pertama($tahun2, "ii.Labour cost to apply fertilizers", '0', $state, $district);
            $total7 = pertama($tahun2, "iii. Machinery use and maintenance", '0', $state, $district);
            $total8 = pertama($tahun2, "iv. Soil and foliar analysis", '0', $state, $district);

            $jas1+=($total5[0] + $total6[0] + $total7[0] + $total8[0]); //hectre 2011
            $jas2+=($total5[1] + $total6[1] + $total7[1] + $total8[1]); //tonne 2011

            $jb1+=($total1[0] + $total2[0] + $total3[0] + $total4[0]); //hectre 2012
            $jb2+=($total1[1] + $total2[1] + $total3[1] + $total4[1]); //tonne 2012
        }
    }
    $vari[0] = $jas1;  //2011
    $vari[1] = $jas2; //2011

    $vari[2] = $jb1; //2012
    $vari[3] = $jb2; //2012
    return $vari;
}

function pertama($tahun, $nama, $status, $negeri, $daerah) {
    global $con;

    $qavg = "SELECT AVG(y) as purata "
            . "FROM "
            . "graf_km "
            . "where "
            . "sessionid='$nama' "
            . "and tahun ='$tahun' "
            . "and (status='$status' or status='9')  ";
    if ($negeri != "" && $negeri != "pm") {
        $qavg.=" and negeri = '$negeri'";
    }
    if ($negeri != "" && $daerah != "") {
        $qavg.=" and daerah = '$daerah'";
    }
    if ($negeri == "pm") {
        $qavg.=" and negeri not like 'SARAWAK' and negeri not like 'SABAH' ; ";
    }

    $ravg = mysqli_query($con, $qavg);
    $rrow = mysqli_fetch_array($ravg);

    $qavg2 = "SELECT AVG(y) as purata "
            . "FROM "
            . "graf_km_tan "
            . "where "
            . "sessionid='$nama' "
            . "and tahun ='$tahun' "
            . "and (status='$status' or status='9')  ";
    if ($negeri != "" && $negeri != "pm") {
        $qavg2.=" and negeri = '$negeri'";
    }
    if ($negeri != "" && $daerah != "") {
        $qavg2.=" and daerah = '$daerah'";
    }
    if ($negeri == "pm") {
        $qavg2.=" and negeri not like 'SARAWAK' and negeri not like 'SABAH'";
    }

    $ravg2 = mysqli_query($con, $qavg2);
    $rrow2 = mysqli_fetch_array($ravg2);

    $var[0] = $rrow['purata'];
    $var[1] = $rrow2['purata'];

    //echo $tahun." : ".$nama." - ".$var[0]."<br/>";
    return $var;
}

function cop($name, $type, $year, $state, $district, $tahun_r) {
    global $con;

    $q_cop = "select  * from cop where"
            . "	NAME ='$name' "
            . "and TYPE= '$type' "
            . "and YEAR= '$year' "
            . "and STATE= '$state' "
            . "and DISTRICT= '$district' "
            . "and YEAR_REPORT='$tahun_r'";
    $r_cop = mysqli_query($con, $q_cop);
    $row_cop = mysqli_fetch_array($r_cop);

    $var[1] = $row_cop['VALUE_MEDIAN'];
    $var[0] = $row_cop['VALUE_MEAN'];
    return $var;
}
?>
<link rel="stylesheet" href="../text_style.css" type="text/css" />
<style type="text/css">
    <!--
    .style4 {font-size: 16px; font-weight: bold; color: #FFFFFF; }
    .style5 {
        color: #FFFFFF;
        font-weight: bold;
    }
    .style6 {
        font-size: 14px;
        font-weight: bold;
    }  body,td,th {
        font-size: 12px;
    }
    -->
</style>

<script type="text/javascript">
    function openScript(url, width, height) {
        var Win = window.open(url, "openScript", 'width=' + width + ',height=' + height + ',resizable=no,scrollbars=yes,menubar=no,status=no');
    }
</script>
<?php
$qstate = "select * from negeri where id like '$state'";
$rstate = mysqli_query($con, $qstate);
$rowstate = mysqli_fetch_array($rstate);
$totalstate = mysqli_num_rows($rstate);
if ($state == "pm") {
    $state = "pm";
} else {
    $state = $rowstate['nama'];
}
?>

<table width="80%" align="center" class="baju">



    <tr height="17">
        <td height="17" colspan="7"><div align="center" class="style6">Summary of Mature Costs in <?php echo $_COOKIE['tahun_report'] - 1; ?></div></td>
    </tr>
    <tr height="17">
        <td width="258" height="17" bgcolor="#8A1602"><div align="center"></div></td>
        <td colspan="3" bgcolor="#8A1602"><div align="center" class="style4">
                <div align="center">RM per hectare</div>
            </div></td>
        <td colspan="3" bgcolor="#8A1602"><div align="center" class="style4">
                <div align="center">RM per tonne FFB</div>
            </div>      </td>
    </tr>
    <tr height="18">
        <td width="258" height="18" bgcolor="#8A1602">&nbsp;</td>
        <td width="68" bgcolor="#8A1602"><div align="center"><span class="style5"><?php echo $_COOKIE['tahun_report'] - 2; ?></span></div></td>
        <td width="104" bgcolor="#8A1602"><div align="center"><span class="style5"><?php echo $_COOKIE['tahun_report'] - 1; ?></span></div></td>
        <td width="68" bgcolor="#8A1602"><div align="center"><span class="style5">% Change</span></div></td>
        <td width="68" bgcolor="#8A1602"><div align="center"><span class="style5"><?php echo $_COOKIE['tahun_report'] - 2; ?></span></div></td>
        <td width="84" bgcolor="#8A1602"><div align="center"><span class="style5"><?php echo $_COOKIE['tahun_report'] - 1; ?></span></div></td>
        <td width="69" bgcolor="#8A1602"><div align="center"><span class="style5">% Change</span></div></td>
    </tr>
    <tr height="17" class="alt">

        <td <?php if ($_COOKIE['tahun_report'] == 2010) { ?> ondblclick="javascript:openScript('add_cop_upk.php?name=Upkeep and Fertilizer&type=<?php echo "Mature_Summary"; ?>&tahun=<?php echo $_COOKIE['tahun_report']; ?>&year=<?php echo $year; ?>&state=<?php echo $state; ?>', '700', '200')"<?php } ?>>Upkeep &amp; Fertilizer</td>

        <td width="68"><div align="center">
                <?php
                if ($year == "") {
                    $year = 1;
                }
                if ($_COOKIE['tahun_report'] == 2010) {
                    $s = soalan("upk", '', $satu, $dua, $state, $district);
                    //$as1 = cop ( "Upkeep and Fertilizer",  "Mature_Summary", $year, $state, $district, $_COOKIE['tahun_report']);
                    $as1 = cop($rows['name'], "Harvesting", $year, $state, $district, $_COOKIE['tahun_report']);
                    $s[0] = $as1[0];
                    $s[1] = $as1[1];
                }
                if ($_COOKIE['tahun_report'] != 2010) {
                    $s = soalan("upk", '', $satu, $dua, $state, $district);
                }
                echo number_format($s[0], 2);
                ?>

            </div></td>
        <td width="104"><div align="center"><?php echo number_format($s[2], 2); ?></div></td>
        <td width="68"><div align="center"><?php
                $ah = (($s[2] - $s[0]) / $s[0]) * 100;
                echo number_format($ah, 2);
                ?></div></td>
        <td align="right"><div align="center"><?php echo number_format($s[1], 2); ?></div></td>
        <td align="right"><div align="center"><?php echo number_format($s[3], 2); ?></div></td>
        <td align="right"><div align="center"><?php
                $ah2 = (($s[3] - $s[1]) / $s[1]) * 100;
                echo number_format($ah2, 2);
                ?></div></td>
    </tr>
    <tr height="17" class="alt">
        <td <?php if ($_COOKIE['tahun_report'] == 2010) { ?> ondblclick="javascript:openScript('add_cop_upk.php?name=Fertilizer&amp;type=<?php echo "Mature_Summary"; ?>&amp;tahun=<?php echo $_COOKIE['tahun_report']; ?>&amp;year=<?php echo $year; ?>&amp;state=<?php echo $state; ?>', '700', '200')"<?php } ?>>&nbsp;&nbsp;&nbsp;&nbsp;<em>Fertilizer</em></td>
        <td><div align="center">
                <?php
                if ($year == "") {
                    $year = 1;
                }
                if ($_COOKIE['tahun_report'] == 2010) {
                    $sp = soalan("upk", 'fertiliser', $satu, $dua, $state, $district);
                    $asp1 = cop("Fertilizer", "Mature_Summary", $year, $state, $district, $_COOKIE['tahun_report']);
                    $sp[0] = $asp1[0];
                    $sp[1] = $asp1[1];
                }
                if ($_COOKIE['tahun_report'] != 2010) {
                    $sp = soalan("upk", 'fertiliser', $satu, $dua, $state, $district);
                }
                echo number_format($sp[0], 2);
                ?>
            </div></td>
        <td><div align="center"><?php echo number_format($sp[2], 2); ?></div></td>
        <td><div align="center">
                <?php
                $ahp = (($sp[2] - $sp[0]) / $sp[0]) * 100;
                echo number_format($ahp, 2);
                ?>
            </div></td>
        <td align="right"><div align="center"><?php echo number_format($sp[1], 2); ?></div></td>
        <td align="right"><div align="center"><?php echo number_format($sp[3], 2); ?></div></td>
        <td align="right"><div align="center">
<?php
$ahp2 = (($sp[3] - $sp[1]) / $sp[1]) * 100;
echo number_format($ahp2, 2);
?>
            </div></td>
    </tr>
    <tr height="17">


        <td <?php if ($_COOKIE['tahun_report'] == 2010) { ?> ondblclick="javascript:openScript('add_cop_upk.php?name=Harvesting&type=<?php echo "Mature_Summary"; ?>&tahun=<?php echo $_COOKIE['tahun_report']; ?>&year=<?php echo $year; ?>&state=<?php echo $state; ?>', '700', '200')"<?php } ?>>Harvesting</td>

        <td width="68"><div align="center">
                <?php
                if ($year == "") {
                    $year = 1;
                }
                if ($_COOKIE['tahun_report'] == 2010) {
                    $t = soalan("harvest_all", '', $satu, $dua, $state, $district);
                    $at1 = cop("Harvesting", "Mature_Summary", $year, $state, $district, $_COOKIE['tahun_report']);
                    $t[0] = $at1[0];
                    $t[1] = $at1[1];
                }
                if ($_COOKIE['tahun_report'] != 2010) {
                    $t = soalan("harvest_all", '', $satu, $dua, $state, $district);
                }
                echo number_format($t[0], 2);
                ?>
            </div></td>
        <td width="104"><div align="center"><?php echo number_format($t[2], 2); ?></div></td>
        <td width="68"><div align="center"><?php
                $bh = (($t[2] - $t[0]) / $t[0]) * 100;
                echo number_format($bh, 2);
                ?></div></td>
        <td align="right"><div align="center"><?php echo number_format($t[1], 2); ?></div></td>
        <td align="right"><div align="center"><?php echo number_format($t[3], 2); ?></div></td>
        <td align="right"><div align="center"><?php
                $bh2 = (($t[3] - $t[1]) / $t[1]) * 100;
                echo number_format($bh2, 2);
                ?></div></td>
    </tr>
    <tr height="17" class="alt">

        <td <?php if ($_COOKIE['tahun_report'] == 2010) { ?> ondblclick="javascript:openScript('add_cop_upk.php?name=Transportation&type=<?php echo "Mature_Summary"; ?>&tahun=<?php echo $_COOKIE['tahun_report']; ?>&year=<?php echo $year; ?>&state=<?php echo $state; ?>', '700', '200')"<?php } ?>>Transportation</td>

        <td width="68"><div align="center">
                <?php
                if ($year == "") {
                    $year = 1;
                }
                if ($_COOKIE['tahun_report'] == 2010) {
                    $u = soalan("transportation_all", '', $satu, $dua, $state, $district);
                    $au1 = cop("Transportation", "Mature_Summary", $year, $state, $district, $_COOKIE['tahun_report']);
                    $u[0] = $au1[0];
                    $u[1] = $au1[1];
                }
                if ($_COOKIE['tahun_report'] != 2010) {
                    $u = soalan("transportation_all", '', $satu, $dua, $state, $district);
                }
                echo number_format($u[0], 2);
                ?>
            </div></td>
        <td width="104"><div align="center"><?php echo number_format($u[2], 2); ?></div></td>
        <td width="68"><div align="center"><?php
                $ch = (($u[2] - $u[0]) / $u[0]) * 100;
                echo number_format($ch, 2);
                ?></div></td>
        <td align="right"><div align="center"><?php echo number_format($u[1], 2); ?></div></td>
        <td align="right"><div align="center"><?php echo number_format($u[3], 2); ?></div></td>
        <td align="right"><div align="center"><?php
                $ch2 = (($u[3] - $u[1]) / $u[1]) * 100;
                echo number_format($ch2, 2);
                ?></div></td>
    </tr>

    <tr height="17">
        <td>General Charges</td>
        <td width="68"><div align="center">
                <?php
                if ($year == "") {
                    $year = 1;
                }
                if ($_COOKIE['tahun_report'] == 2010) {
                    $u = soalan("gc", '', $satu, $dua, $state, $district);
                    $au1 = cop("Transportation", "General_Charges", $year, $state, $district, $_COOKIE['tahun_report']);
                    $g[0] = $au1[0];
                    $g[1] = $au1[1];
                }
                if ($_COOKIE['tahun_report'] != 2010) {
                    $g = soalan("gc", '', $satu, $dua, $state, $district);
                }
                echo number_format($g[0], 2);
                ?>
            </div></td>
        <td width="104"><div align="center"><?php echo number_format($g[2], 2); ?></div></td>
        <td width="68"><div align="center"><?php
                $gh = 0;
                if ($g[0] > 0) {
                    $gh = (($g[2] - $g[0]) / $g[0]) * 100;
                }
                echo number_format($gh, 2);
                ?></div></td>
        <td align="right"><div align="center"><?php echo number_format($g[1], 2); ?></div></td>
        <td align="right"><div align="center"><?php echo number_format($g[3], 2); ?></div></td>
        <td align="right"><div align="center"><?php
                $gh2 = 0;
                if ($g[1] > 0) {
                    $gh2 = (($g[3] - $g[1]) / $g[1]) * 100;
                }
                echo number_format($gh2, 2);
                ?></div></td>
    </tr>

    <tr height="17">
        <td width="258" height="17" bgcolor="#FF9966"><strong>Total FFB production cost </strong></td>
        <td align="right" bgcolor="#FF9966"><div align="center"><?php
                $sa = $s[0] + $t[0] + $u[0] + $g[0];
                echo number_format($sa, 2);
                ?></div></td>
        <td align="right" bgcolor="#FF9966"><div align="center"><?php
                $sb = $s[2] + $t[2] + $u[2] + $g[2];
                echo number_format($sb, 2);
                ?></div></td>
        <td align="right" bgcolor="#FF9966"><div align="center"><?php
                $jch = (($sb - $sa) / $sa) * 100;
                echo number_format($jch, 2);
                ?></div></td>
        <td align="right" bgcolor="#FF9966"><div align="center"><?php
                $sc = $s[1] + $t[1] + $u[1] + $g[1];
                echo number_format($sc, 2);
                ?></div></td>
        <td align="right" bgcolor="#FF9966"><div align="center"><?php
            $sd = $s[3] + $t[3] + $u[3] + $g[3];
            echo number_format($sd, 2);
            ?></div></td>
        <td align="right" bgcolor="#FF9966"><div align="center"><?php
            $jch2 = (($sd - $sc) / $sc) * 100;
            echo number_format($jch2, 2);
            ?></div></td>
    </tr>
</table>
<br />
<table width="80%" align="center">
    <tr>
        <td>
<?php
$_SESSION['upkeep_session'] = round($s[2] / $sb * 100, 2);
$_SESSION['harvesting_session'] = round($t[2] / $sb * 100, 2);
$_SESSION['transportation_session'] = round($u[2] / $sb * 100, 2);
$_SESSION['fertilizer_session'] = round($sp[2] / $sb * 100, 2);


$_SESSION['upkeep_session_before'] = round($s[0] / $sb * 100, 2);
$_SESSION['harvesting_session_before'] = round($t[0] / $sb * 100, 2);
$_SESSION['transportation_session_before'] = round($u[0] / $sb * 100, 2);
$_SESSION['fertilizer_session_before'] = round($sp[0] / $sb * 100, 2);
?>
            <!--
            <script type="text/javascript" src="ampie/swfobject.js"></script>
            <div id="flashcontent">
                    <strong>You need to upgrade your Flash Player</strong>
            </div>

            <script type="text/javascript">
                    // <![CDATA[
                    var so = new SWFObject("ampie/ampie.swf", "ampie", "620", "500", "8", "#FFFFFF");
                    so.addVariable("path", "ampie/");

                            so.addVariable("settings_file", encodeURIComponent("ampie/ampie_settings_mature.xml"));                // you can set two or more different settings files here (separated by commas)
                    so.addVariable("data_file", encodeURIComponent("ampie/ampie_data_mature.php"));

                    so.write("flashcontent");
                    // ]]>
            </script>-->
            <!-- end of ampie script -->

            <script type="text/javascript" src="amcolumn/swfobject.js"></script>
            <div id="flashcontent">
                <strong>You need to upgrade your Flash Player</strong>
            </div>

            <script type="text/javascript">
            // <![CDATA[
            var so = new SWFObject("amcolumn/amcolumn.swf", "amcolumn", "520", "380", "8", "#FFFFFF");
            so.addVariable("path", "amcolumn/");
            so.addVariable("settings_file", encodeURIComponent("amcolumn/amcolumn_settings_mature.xml"));
            so.addVariable("data_file", encodeURIComponent("amcolumn/amcolumn_data_mature.php"));
            so.addVariable("preloader_color", "#999999");
            so.write("flashcontent");
            // ]]>
            </script>
            <!-- end of amcolumn script -->

        </td>
    </tr>
</table>
<br />
