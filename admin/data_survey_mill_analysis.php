<?php
/* include('../Connections/connection.class.php');
  $tahun='2010'; */
/* header("Content-type: application");
  header("Content-Disposition: attachment; filename=excel_data_mill_$tahun.xls"); */


include("baju.php");
$con = connect();
extract($_REQUEST);
?>
<h2>Analysis Data Survey Mill for <?php echo $tahun; ?></h2>

<style>
    body {
        font-family:Tahoma ;
        font-size: 12px; 

    }td,th {
        font-size: 12px;
    }

</style>


<?php
$type = explode("_", $sub);
$qt1 = "select * from analysis where type='" . $type[1] . "' and year = '$tahun'";
$rt1 = mysql_query($qt1, $con);
$total = mysql_num_rows($rt1);

if ($total == 0) {
    $qa = "INSERT INTO `analysis` "
            . "(`type` ,`year` ,`modifiedby` ,`modified`) "
            . "VALUES "
            . "('" . $type[1] . "', '$tahun', '" . $_SESSION['email'] . "',NOW()) ";
    $ra = mysql_query($qa, $con);
}
if ($total > 0) {
    $qa = "update  analysis "
            . "set modifiedby = '" . $_SESSION['email'] . "', "
            . "modified=NOW() "
            . "where "
            . "type='" . $type[1] . "' "
            . "and year = '$tahun'";
    $ra = mysql_query($qa, $con);
}


$qdeletedata = "delete from analysis_mill_kos_lain where pb_thisyear = '$tahun' ";
$rdeletedata = mysql_query($qdeletedata, $con);

$qdeletedata = "delete from analysis_mill_pemprosesan where pb_thisyear = '$tahun' ";
$rdeletedata = mysql_query($qdeletedata, $con);

function ekilang($lesen, $tahun) {
    $con = connect();
    $q = "select NAMA_KILANG, "
            . "NEGERI, "
            . "SYARIKAT_INDUK, "
            . "SUM(FFB_PROSES) as FFB_PROSES "
            . "from ekilang where "
            . "NO_LESEN = '$lesen' "
            . "AND tahun='$tahun' "
            . "group by NO_LESEN "
            . "limit 1 ";
    //echo $q;
    $r = mysql_query($q, $con);
    $row = mysql_fetch_array($r);

    $sub[0] = $row['NAMA_KILANG'];
    $sub[1] = $row['NEGERI'];
    $sub[2] = $row['SYARIKAT_INDUK'];
    $sub[3] = $row['FFB_PROSES'];

    return $sub;
}

//--------------------------
function mill_pemprosesan($lesen, $tahun, $ffb, $negeri, $daerah) {
    $con = connect();
     $q = "select * from mill_pemprosesan where lesen ='$lesen' and tahun='$tahun' ";
    //echo "<br>";
    $r = mysql_query($q, $con);
    $row = mysql_fetch_array($r);
    //echo $row['kp_1'].'<br/>'.$ffb;
    $sub[0] = round($row['kp_1'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[0], "Water, chemical and power");
    $sub[1] = round($row['kp_2'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[1], "Fuel and Lubricant");
    $sub[2] = round($row['kp_3'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[2], "Mill Worker");
    $sub[3] = round($row['kp_4'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[3], "Effluent Control");
    $sub[4] = round($row['kp_5'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[4], "Management and Administration");
    $sub[5] = round($row['kp_6'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[5], "Office Expenses");
    $sub[6] = round($row['kp_7'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[6], "Sampling and laboratory testing");
    $sub[7] = round($row['kp_8'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[7], "Labour welfare not paid directly to workers");
    $sub[8] = round($row['kp_9'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[8], "Mill upgrading");
    $sub[9] = round($row['kp_10'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[9], "Maintenance and repair of palm oil mill");
    $sub[10] = round($row['kp_11'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[10], "Rents, land quit rent, fees");
    $sub[11] = round($row['kp_12'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[11], "Palm oil mill security");
    $sub[12] = round($row['kp_13'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[12], "Palm oil mill research and development ");
    $sub[13] = round($row['kp_14'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[13], "Depreciation of palm oil mill");
    $sub[14] = round($row['kp_15'] / $ffb, 2);
    add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $sub[14], "Headquaters management charges");
    $sub[15] = round($row['total_kp'] / $ffb, 2); //add_mill_pemprosesan ($lesen,$tahun, $negeri, $daerah, $sub[15], "Total Pemprosesan");

    return $sub;
}

//-----------------------------------------------------
function add_mill_pemprosesan($lesen, $tahun, $negeri, $daerah, $nilai, $km_nama) {
    $con = connect();


    $q = "INSERT INTO analysis_mill_pemprosesan "
            . "(pb_thisyear ,lesen ,bkm_nama ,nilai ,negeri ,daerah) "
            . "VALUES "
            . "('$tahun', '$lesen', '$km_nama', '$nilai', '$negeri', '$daerah');";
    //echo $q . "<br>";
    $r = mysql_query($q, $con);

    $qdelete = "delete from analysis_mill_pemprosesan where nilai=0";
    $rdelete = mysql_query($qdelete, $con);
}

//------------------------------------
function mill_koslain($lesen, $tahun, $ffb, $negeri, $daerah) {
    $con = connect();
    $q = "select * from mill_kos_lain where lesen ='$lesen' and tahun='$tahun' ";
    $r = mysql_query($q, $con);
    $row = mysql_fetch_array($r);

    $sub[0] = round($row['kl_1'] / $ffb, 2);
    add_mill_kos_lain($lesen, $tahun, $negeri, $daerah, $sub[0], "Forwarding Expenses");
    $sub[1] = round($row['kl_2'] / $ffb, 2);
    add_mill_kos_lain($lesen, $tahun, $negeri, $daerah, $sub[1], "Sales tax (for mills in Sabah and Sarawak)");
    $sub[2] = round($row['kl_3'] / $ffb, 2);
    add_mill_kos_lain($lesen, $tahun, $negeri, $daerah, $sub[2], "Selling expenses (including commission)");
    $sub[3] = round($row['kl_4'] / $ffb, 2);
    add_mill_kos_lain($lesen, $tahun, $negeri, $daerah, $sub[3], "Cess MPOB");
    $sub[4] = round($row['kl_5'] / $ffb, 2);
    add_mill_kos_lain($lesen, $tahun, $negeri, $daerah, $sub[4], "Other Expenditure");
    $sub[5] = round($row['total_kl'] / $ffb, 2); //add_mill_kos_lain($lesen,$tahun, $negeri, $daerah, $sub[5], "Total Kos Lain");

    return $sub;
}

//------------------------------------------------- 
function add_mill_kos_lain($lesen, $tahun, $negeri, $daerah, $nilai, $km_nama) {
    $con = connect();


    $q = "INSERT INTO analysis_mill_kos_lain "
            . "(pb_thisyear ,lesen ,bkm_nama ,nilai ,negeri ,daerah) "
            . "VALUES "
            . "('$tahun', '$lesen', '$km_nama', '$nilai', '$negeri', '$daerah');";
    $r = mysql_query($q, $con);

    $qdelete = "delete from analysis_mill_kos_lain where nilai=0";
    $rdelete = mysql_query($qdelete, $con);
}

//-------------------------------------------------- 


function mill_buruh($lesen, $tahun) {
    $con = connect();
    $q = "select * from mill_buruh where lesen ='$lesen' and tahun='$tahun' ";
    $r = mysql_query($q, $con);
    $row = mysql_fetch_array($r);

    $sub[0] = $row['mb_1'];
    $sub[1] = $row['mb_2'];
    $sub[2] = $row['mb_3'];
    $sub[3] = $row['mb_4'];
    $sub[4] = $row['mb_5'];
    $sub[5] = $row['total_mb'];
    $sub[6] = $row['mb_1b'];
    $sub[7] = $row['mb_2b'];
    $sub[8] = $row['mb_3b'];
    $sub[9] = $row['mb_4b'];
    $sub[10] = $row['mb_5b'];
    $sub[11] = $row['total_mb_b'];
    $sub[12] = $row['mb_1c'];
    $sub[13] = $row['mb_2c'];
    $sub[14] = $row['mb_3c'];
    $sub[15] = $row['mb_4c'];
    $sub[16] = $row['mb_5c'];
    $sub[17] = $row['total_mb_c'];

    return $sub;
}

//-------------------------------------------------	
?>
<link rel="stylesheet" href="styles/progressbar.css">
<div class="progress"> <span class="blue" style="width:0%;"><span>0%</span></span> </div>
<script type='text/javascript'>
    function loading(percent) {
        $('.progress span').animate({width: percent}, 100, function () {
            $(this).children().html(percent);
            if (percent == '100%') {
                $(this).children().html('All data has been finish analysis');
            }
        })
    }
</script> 



<?php
//echo $tahun;
$con = connect();
/*$q = "select * from "
        . " login_mill "
        . " where "
        . " success!='0000-00-00 00:00:00' "
        . " and lesen like '500%' "
        . " and lesen not like '123456%'  "
        . " group by lesen order by lesen  ";*/
		
 $tahunsebelum = $tahun-1;		
$q = "SELECT ekilang.no_lesen as lesen FROM ekilang
      LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen
      LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen AND mill_kos_lain.tahun = '$tahun'
	  LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen AND mill_pemprosesan.tahun ='$tahun'
	  LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen
	  LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen
	  WHERE
	  ekilang.tahun = '$tahunsebelum'
	 AND (mill_kos_lain.total_kl > 0 or mill_pemprosesan.total_kp > 0)
	 GROUP BY ekilang.no_lesen";
	 
$r = mysql_query($q, $con);
$total_data_proses = mysql_num_rows($r);
//echo "total_data_proses ". $total_data_proses."<br>";
$kiraan = 1;
while ($row = mysql_fetch_array($r)) {
    $percentage = round($kiraan / $total_data_proses, 2) * 100;
    //echo "percentage:".$percentage."<br>";
    //$pbar->set_percent_adv($bil, $total_data_proses);
    echo "<script type=\"text/javascript\">loading('" . $percentage . "%');</script> ";
    $nl = ekilang($row['lesen'], $tahun - 1);
    $ffb = $nl[3];
    $ml = mill_pemprosesan($row['lesen'], $tahun, $ffb, $nl[1], $nl[4]);
    $mk = mill_koslain($row['lesen'], $tahun, $ffb, $nl[1], $nl[4]);
    $mb = mill_buruh($row['lesen'], $tahun);
    $kiraan = $kiraan + 1;
}
?><br />

<br />
To download raw data, go to menu <a href="home.php?id=summary&amp;sub=summary_map">Summary</a>
<script>
    alert('All data has been finish analysis');
</script>
