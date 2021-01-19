<?php

$con = connect();

$year = $_COOKIE['tahun_report'];
$list = 1;
$starttime = microtime();
$table = '';

if ($year == date('Y')) {
    $table = 'esub';
} else {
    $table = "esub_" . $year;
}

//negeri 
function negeri($negeri, $district, $year) {
    global $con;

    if ($year == date('Y')) {
        $table = "esub";
    } else {
        $table = "esub_" . $year;
    }

    $sql = "SELECT b.Nama_Estet FROM login_estate a
				 INNER JOIN $table b
				 ON a.lesen=b.No_Lesen_Baru
				 WHERE b.No_Lesen_Baru NOT LIKE '%123456%'
				 AND b.negeri_premis = '$negeri'";
    if ($district != "") {
        $sql.=" AND b.daerah_premis = '$district'";
    }
    $sql.=" GROUP BY b.No_Lesen_Baru
				 ORDER BY b.Nama_Estet ASC";
    $result = mysql_query($sql, $con);
    $total_p = mysql_num_rows($result);

    $sql = "SELECT b.lesen, a.nama_estet, a.syarikat_induk, a.emel, a.Negeri_Premis, a.Daerah_Premis, c.total_b Pengangkuta, d.total_b Penjagaan, e.total_b Penuaian, f.total_perbelanjaan Belanja, b.`password`, b.success
			FROM $table a 
			INNER JOIN login_estate b on a.No_Lesen_Baru = b.lesen
			LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
			LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year' 
			LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
			LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year' 
			WHERE  
			a.No_Lesen_Baru <> ''
			and a.No_Lesen_Baru not like '%123456%' 
			and a.nama_estet!='' 
			and (c.total_b > 0 or d.total_b > 0 or e.total_b > 0 or f.total_perbelanjaan > 0)
			and a.negeri_premis = '$negeri'";
    if ($district != "") {
        $sql.=" AND a.daerah_premis = '$district'";
    }
    $sql.=" GROUP BY a.No_Lesen_Baru ORDER BY a.Negeri_Premis ASC";
    $result = mysql_query($sql, $con);
    $total_peninsular = mysql_num_rows($result);

    $total_peninsular_complete = $total_peninsular; //TODO:checking
    $total_peninsular_incomplete = $total_p - $total_peninsular;
    $percent_peninsular = number_format(($total_peninsular / $total_p) * 100, 2);
    $nonresponse_peninsular = $total_peninsular_incomplete; //TODO:checkin

    $state[0] = $total_p; //DONE
    $state[1] = $total_peninsular; //DONE
    $state[2] = $total_peninsular_complete; //DONE
    $state[3] = $total_peninsular_incomplete; //DONE
    $state[4] = $percent_peninsular; //DONE
    $state[5] = $nonresponse_peninsular;

    return $state;
}

//Total Respondent in Malaysia
$total = "SELECT b.Nama_Estet FROM login_estate a
			 INNER JOIN $table b
			 ON a.lesen=b.No_Lesen_Baru
			 WHERE b.No_Lesen_Baru NOT LIKE '%123456%' and b.Nama_Estet!='' and b.No_Lesen_Baru <> '' 
			 GROUP BY b.No_Lesen_Baru
			 ORDER BY b.Nama_Estet ASC";
$result_total = mysql_query($total, $con);
$total = mysql_num_rows($result_total);

//Total Respondent in Peninsular Malaysia
$total_p = "SELECT b.Nama_Estet FROM login_estate a
			 INNER JOIN $table b
			 ON a.lesen=b.No_Lesen_Baru
			 WHERE b.No_Lesen_Baru <> '' AND b.No_Lesen_Baru NOT LIKE '%123456%' and b.Nama_Estet!='' AND b.negeri_premis NOT LIKE '%SARAWAK%' AND b.negeri_premis NOT LIKE '%SABAH%'";

if (isset($negeri)) {
    $total_p.=" AND b.negeri_premis = '$negeri'";
}
if (isset($district)) {
    $total_p.=" AND b.daerah_premis = '$district'";
}
$total_p.=" GROUP BY b.No_Lesen_Baru
			 ORDER BY b.Nama_Estet ASC";
$result_total_p = mysql_query($total_p, $con);
$total_p = mysql_num_rows($result_total_p);

//Total Respondent in Sabah
$total_sb = "SELECT b.Nama_Estet FROM login_estate a
			 INNER JOIN $table b
			 ON a.lesen=b.No_Lesen_Baru
			 WHERE b.No_Lesen_Baru <> '' AND b.No_Lesen_Baru NOT LIKE '%123456%' AND b.Nama_Estet!='' and b.negeri_premis LIKE '%SABAH%'
			 GROUP BY b.No_Lesen_Baru
			 ORDER BY b.Nama_Estet ASC";
$result_total_sb = mysql_query($total_sb, $con);
$total_sb = mysql_num_rows($result_total_sb);

//Total Respondent in Sarawak
$total_sw = "SELECT b.Nama_Estet FROM login_estate a
			 INNER JOIN $table b
			 ON a.lesen=b.No_Lesen_Baru
			 WHERE b.No_Lesen_Baru <> '' AND b.No_Lesen_Baru NOT LIKE '%123456%' and Nama_Estet!='' AND b.negeri_premis LIKE '%SARAWAK%'
			 GROUP BY b.No_Lesen_Baru
			 ORDER BY b.Nama_Estet ASC";
$result_total_sw = mysql_query($total_sw, $con);
$total_sw = mysql_num_rows($result_total_sw);

//Total Respondent response
$all = "SELECT a.alamat1, 
            a.alamat2, 
            a.poskod, 
            a.bandar, 
            a.negeri, 
            a.no_telepon, 
            a.no_fax, 
            b.lesen, 
            a.nama_estet, 
            a.no_lesen_baru, 
            a.syarikat_induk, 
            a.emel, 
            a.Negeri_Premis, 
            a.Daerah_Premis, 
            c.total_b Pengangkuta, 
            d.total_b Penjagaan, 
            e.total_b Penuaian, 
            f.total_perbelanjaan Belanja, 
            b.`password`, b.success
			FROM $table a 
			INNER JOIN login_estate b on a.No_Lesen_Baru = b.lesen
            LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
			LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year' 
			LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
			LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year' 
			WHERE  
            b.lesen not like '%123456%' 
		    and a.No_Lesen_Baru <> ''
			and a.No_Lesen_Baru not like '%123456%' 
			and a.nama_estet!='' 
			and 
                        (c.total_b > 0 or d.total_b > 0 or e.total_b > 0 or f.total_perbelanjaan > 0)";
if (isset($negeri)) {
    $all.=" AND a.negeri_premis = '$negeri'";
}
if (isset($district)) {
    $all.=" AND a.daerah_premis = '$district'";
}
$all.="	GROUP BY a.No_Lesen_Baru ORDER BY a.Negeri_Premis ASC";
//and  b.success!='0000-00-00 00:00:00'
//echo $all;
$result_all = mysql_query($all, $con); 
$total_all = mysql_num_rows($result_all);

//Total Respondent not response
$all_incomplete = "SELECT a.alamat1, a.alamat2, a.poskod, a.bandar, a.negeri, a.no_telepon, a.no_fax, b.lesen, a.nama_estet, a.no_lesen_baru, a.syarikat_induk, a.emel, a.Negeri_Premis, a.Daerah_Premis, c.total_b Pengangkuta, d.total_b Penjagaan, e.total_b Penuaian, f.total_perbelanjaan Belanja, b.`password`, b.success
			FROM $table a 
			INNER JOIN login_estate b on a.No_Lesen_Baru = b.lesen
			LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
			LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year' 
			LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
			LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year' 
			WHERE  
			a.No_Lesen_Baru <> ''
			and a.No_Lesen_Baru not like '%123456%' 
			and nama_estet!='' 
			and (c.total_b is null or c.total_b = 0) and (d.total_b is null or d.total_b = 0) and (e.total_b is null or e.total_b = 0) and (f.total_perbelanjaan = 0 or f.total_perbelanjaan is null)";
if (isset($negeri)) {
    $all_incomplete.=" AND a.negeri_premis = '$negeri'";
}
if (isset($district)) {
    $all_incomplete.=" AND a.daerah_premis = '$district'";
}
$all_incomplete.=" GROUP BY a.No_Lesen_Baru ORDER BY a.Negeri_Premis ASC";
$result_all_incomplete = mysql_query($all_incomplete, $con);
$total_all_incomplete = mysql_num_rows($result_all_incomplete);

// Total all estate response COMPLETED
$all_complete = "SELECT $table.no_lesen_baru lesen, $table.nama_estet nama,$table.syarikat_induk syarikat_induk, login_estate.success access, $table.emel email FROM $table";
$all_complete .= " LEFT JOIN buruh ON $table.no_lesen_baru = buruh.lesen";
$all_complete .= " LEFT JOIN kos_belum_matang ON $table.no_lesen_baru = kos_belum_matang.lesen";
$all_complete .= " LEFT JOIN kos_matang_pengangkutan ON $table.no_lesen_baru = kos_matang_pengangkutan.lesen";
$all_complete .= " LEFT JOIN kos_matang_penjagaan ON $table.no_lesen_baru = kos_matang_penjagaan.lesen";
$all_complete .= " LEFT JOIN kos_matang_penuaian ON $table.no_lesen_baru = kos_matang_penuaian.lesen";
$all_complete .= " LEFT JOIN warga_estate ON $table.no_lesen_baru = warga_estate.lesen";
$all_complete .= " LEFT JOIN login_estate ON $table.no_lesen_baru = login_estate.lesen";
$all_complete .= " LEFT JOIN estate_info ON $table.no_lesen_baru = estate_info.lesen";
$all_complete .= " WHERE buruh.tahun = $year";
$all_complete .= " AND kos_belum_matang.pb_thisyear = $year";
$all_complete .= " AND kos_matang_pengangkutan.pb_thisyear = $year";
$all_complete .= " AND kos_matang_penjagaan.pb_thisyear = $year";
$all_complete .= " AND kos_matang_penuaian.pb_thisyear = $year";
$all_complete .= " AND warga_estate.tahun = $year";
$all_complete .= " AND buruh.tahun = $year";
$all_complete .= " AND kos_belum_matang.status = 1";
$all_complete .= " AND kos_matang_pengangkutan.status = 1";
$all_complete .= " AND kos_matang_penjagaan.status = 1";
$all_complete .= " AND kos_matang_penuaian.status = 1";
$all_complete .= " GROUP BY $table.no_lesen_baru";
$all_complete .= " ORDER BY login_estate.success DESC";
$result_complete = mysql_query($all_complete, $con);
$total_complete = mysql_num_rows($result_complete);

// Total all estate response INCOMPLETED
$all_incomplete = "SELECT $table.no_lesen_baru lesen, $table.nama_estet nama, login_estate.success access,$table.syarikat_induk syarikat_induk, $table.emel email FROM $table JOIN login_estate ON $table.no_lesen_baru = login_estate.lesen  ";
if ($year == "2010") {
    $all_incomplete.= " WHERE login_estate.success != '0000-00-00 00:00:00'";
}
if ($year != "2010") {
    $all_incomplete .= " WHERE login_estate.success like '%$year%'";
}

//echo $all_incomplete;
$result_incomplete = mysql_query($all_incomplete, $con);
$total_incomplete = mysql_num_rows($result_incomplete);
$total_incomplete = $total_all - $total_complete;

//Total responsdent response in Peninsular Malaysia
$peninsular = "SELECT a.alamat1, a.alamat2, a.poskod, a.bandar, a.negeri, a.no_telepon, a.no_fax, b.lesen, a.nama_estet, a.no_lesen_baru, a.syarikat_induk, a.emel, a.Negeri_Premis, a.Daerah_Premis, c.total_b Pengangkuta, d.total_b Penjagaan, e.total_b Penuaian, f.total_perbelanjaan Belanja, b.`password`, b.success
					FROM $table a 
					INNER JOIN login_estate b on a.No_Lesen_Baru = b.lesen
					LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
					LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year' 
					LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
					LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year' 
					WHERE  
					a.No_Lesen_Baru <> ''
					and a.No_Lesen_Baru not like '%123456%' 
					and a.nama_estet!='' 
					and (c.total_b > 0 or d.total_b > 0 or e.total_b > 0 or f.total_perbelanjaan > 0)
					and a.Negeri_Premis NOT LIKE '%SARAWAK%' AND a.Negeri_Premis NOT LIKE '%SABAH%'";
if (isset($negeri)) {
    $peninsular.=" AND a.negeri_premis = '$negeri'";
}
if (isset($district)) {
    $peninsular.=" AND a.daerah_premis = '$district'";
}
$peninsular.=" GROUP BY a.No_Lesen_Baru ORDER BY a.Negeri_Premis ASC";
$result_peninsular = mysql_query($peninsular, $con);
$total_peninsular = mysql_num_rows($result_peninsular);

//Total Respondent not response in Peninsular
$peninsular_incomplete = "SELECT a.alamat1, a.alamat2, a.poskod, a.bandar, a.negeri, a.no_telepon, a.no_fax, b.lesen, a.no_lesen_baru, a.nama_estet, a.syarikat_induk, a.emel, a.Negeri_Premis, a.Daerah_Premis, c.total_b Pengangkuta, d.total_b Penjagaan, e.total_b Penuaian, f.total_perbelanjaan Belanja, b.`password`, b.success
			FROM $table a 
			INNER JOIN login_estate b on a.No_Lesen_Baru = b.lesen
			LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
			LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year' 
			LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
			LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year' 
			WHERE  
			a.No_Lesen_Baru <> ''
			and a.No_Lesen_Baru not like '%123456%' 
			and a.nama_estet!='' 
			and (c.total_b is null or c.total_b = 0) and (d.total_b is null or d.total_b = 0) and (e.total_b is null or e.total_b = 0) and (f.total_perbelanjaan = 0 or f.total_perbelanjaan is null)
			and a.Negeri_Premis NOT LIKE '%SARAWAK%' AND a.Negeri_Premis NOT LIKE '%SABAH%'";

if (isset($negeri)) {
    $peninsular_incomplete.=" AND a.negeri_premis = '$negeri'";
}
if (isset($district)) {
    $peninsular_incomplete.=" AND a.daerah_premis = '$district'";
}
$peninsular_incomplete.=" GROUP BY a.No_Lesen_Baru ORDER BY a.Negeri_Premis ASC";
$result_peninsular_incomplete = mysql_query($peninsular_incomplete, $con);
$total_peninsular_incomplete = mysql_num_rows($result_peninsular_incomplete);

// Total all peninsular response COMPLETED
$all_peninsular = "SELECT $table.no_lesen_baru lesen, $table.nama_estet nama, login_estate.success access,$table.syarikat_induk syarikat_induk, $table.emel email FROM $table";
$all_peninsular .= " LEFT JOIN buruh ON $table.no_lesen_baru = buruh.lesen";
$all_peninsular .= " LEFT JOIN kos_belum_matang ON $table.no_lesen_baru = kos_belum_matang.lesen";
$all_peninsular .= " LEFT JOIN kos_matang_pengangkutan ON $table.no_lesen_baru = kos_matang_pengangkutan.lesen";
$all_peninsular .= " LEFT JOIN kos_matang_penjagaan ON $table.no_lesen_baru = kos_matang_penjagaan.lesen";
$all_peninsular .= " LEFT JOIN kos_matang_penuaian ON $table.no_lesen_baru = kos_matang_penuaian.lesen";
$all_peninsular .= " LEFT JOIN warga_estate ON $table.no_lesen_baru = warga_estate.lesen";
$all_peninsular .= " LEFT JOIN login_estate ON $table.no_lesen_baru = login_estate.lesen";
$all_peninsular .= " LEFT JOIN estate_info ON $table.no_lesen_baru = estate_info.lesen";
$all_peninsular .= " WHERE buruh.tahun = $year";
$all_peninsular .= " AND kos_belum_matang.pb_thisyear = $year";
$all_peninsular .= " AND kos_matang_pengangkutan.pb_thisyear = $year";
$all_peninsular .= " AND kos_matang_penjagaan.pb_thisyear = $year";
$all_peninsular .= " AND kos_matang_penuaian.pb_thisyear = $year";
$all_peninsular .= " AND warga_estate.tahun = $year";
$all_peninsular .= " AND buruh.tahun = $year";
$all_peninsular .= " AND kos_belum_matang.status = 1";
$all_peninsular .= " AND kos_matang_pengangkutan.status = 1";
$all_peninsular .= " AND kos_matang_penjagaan.status = 1";
$all_peninsular .= " AND kos_matang_penuaian.status = 1";
$all_peninsular .= " AND $table.negeri NOT LIKE '%SARAWAK%'";
$all_peninsular .= " AND $table.negeri NOT LIKE '%SABAH%'";
$all_peninsular .= " GROUP BY $table.no_lesen_baru";
$all_peninsular .= " ORDER BY login_estate.success DESC";
$result_peninsular_complete = mysql_query($all_peninsular, $con);
$total_peninsular_complete = mysql_num_rows($result_peninsular_complete);

// Total all peninsular response INCOMPLETED
$total_peninsular_incomplete = $total_peninsular - $total_peninsular_complete;

//Total respondent response in Sabah
$sabah = "SELECT a.alamat1, a.alamat2, a.poskod, a.bandar, a.negeri, a.no_telepon, a.no_fax, b.lesen, a.no_lesen_baru, a.nama_estet, a.syarikat_induk, a.emel, a.Negeri_Premis, a.Daerah_Premis, c.total_b Pengangkuta, d.total_b Penjagaan, e.total_b Penuaian, f.total_perbelanjaan Belanja, b.`password`, b.success
				FROM $table a 
				INNER JOIN login_estate b on a.No_Lesen_Baru = b.lesen
				LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
				LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year' 
				LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
				LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year' 
				WHERE  
				a.No_Lesen_Baru <> ''
				and a.No_Lesen_Baru not like '%123456%' 
				and a.nama_estet!='' 
				and (c.total_b > 0 or d.total_b > 0 or e.total_b > 0 or f.total_perbelanjaan > 0)
				and a.Negeri_Premis LIKE '%SABAH%'";
if (isset($negeri)) {
    $sabah.=" AND a.negeri_premis = '$negeri'";
}
if (isset($district)) {
    $sabah.=" AND a.daerah_premis = '$district'";
}
$sabah.=" GROUP BY a.No_Lesen_Baru ORDER BY a.Negeri_Premis ASC";
$result_sabah = mysql_query($sabah, $con);
$total_sabah = mysql_num_rows($result_sabah);

//Total Respondent not response in Sabah
$sabah_incomplete = "SELECT a.alamat1, a.alamat2, a.poskod, a.bandar, a.negeri, a.no_telepon, a.no_fax, b.lesen, a.no_lesen_baru, a.nama_estet, a.syarikat_induk, a.emel, a.Negeri_Premis, a.Daerah_Premis, c.total_b Pengangkuta, d.total_b Penjagaan, e.total_b Penuaian, f.total_perbelanjaan Belanja, b.`password`, b.success
			FROM $table a 
			INNER JOIN login_estate b on a.No_Lesen_Baru = b.lesen
			LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
			LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year' 
			LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
			LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year' 
			WHERE  
			a.No_Lesen_Baru <> ''
			and a.No_Lesen_Baru not like '%123456%' 
			and a.nama_estet!='' 
			and (c.total_b is null or c.total_b = 0) and (d.total_b is null or d.total_b = 0) and (e.total_b is null or e.total_b = 0) and (f.total_perbelanjaan = 0 or f.total_perbelanjaan is null)
			and a.Negeri_Premis LIKE '%SABAH%'";
if (isset($negeri)) {
    $sabah_incomplete.=" AND a.negeri_premis = '$negeri'";
}
if (isset($district)) {
    $sabah_incomplete.=" AND a.daerah_premis = '$district'";
}
$sabah_incomplete.=" GROUP BY a.No_Lesen_Baru ORDER BY a.Negeri_Premis ASC";
$result_sabah_incomplete = mysql_query($sabah_incomplete, $con);
$total_sabah_incomplete = mysql_num_rows($result_sabah_incomplete);

// Total all sabah response COMPLETED
$all_sabah = "SELECT $table.no_lesen_baru lesen, $table.nama_estet nama, login_estate.success access, $table.syarikat_induk syarikat_induk,$table.emel email FROM $table";
$all_sabah .= " LEFT JOIN buruh ON $table.no_lesen_baru = buruh.lesen";
$all_sabah .= " LEFT JOIN kos_belum_matang ON $table.no_lesen_baru = kos_belum_matang.lesen";
$all_sabah .= " LEFT JOIN kos_matang_pengangkutan ON $table.no_lesen_baru = kos_matang_pengangkutan.lesen";
$all_sabah .= " LEFT JOIN kos_matang_penjagaan ON $table.no_lesen_baru = kos_matang_penjagaan.lesen";
$all_sabah .= " LEFT JOIN kos_matang_penuaian ON $table.no_lesen_baru = kos_matang_penuaian.lesen";
$all_sabah .= " LEFT JOIN warga_estate ON $table.no_lesen_baru = warga_estate.lesen";
$all_sabah .= " LEFT JOIN login_estate ON $table.no_lesen_baru = login_estate.lesen";
$all_sabah .= " LEFT JOIN estate_info ON $table.no_lesen_baru = estate_info.lesen";
$all_sabah .= " WHERE buruh.tahun = $year";
$all_sabah .= " AND kos_belum_matang.pb_thisyear = $year";
$all_sabah .= " AND kos_matang_pengangkutan.pb_thisyear = $year";
$all_sabah .= " AND kos_matang_penjagaan.pb_thisyear = $year";
$all_sabah .= " AND kos_matang_penuaian.pb_thisyear = $year";
$all_sabah .= " AND warga_estate.tahun = $year";
$all_sabah .= " AND buruh.tahun = $year";
$all_sabah .= " AND kos_belum_matang.status = 1";
$all_sabah .= " AND kos_matang_pengangkutan.status = 1";
$all_sabah .= " AND kos_matang_penjagaan.status = 1";
$all_sabah .= " AND kos_matang_penuaian.status = 1";
$all_sabah .= " AND $table.negeri LIKE '%SABAH%'";
$all_sabah .= " GROUP BY $table.no_lesen_baru";
$all_sabah .= " ORDER BY login_estate.success DESC";
$result_sabah_complete = mysql_query($all_sabah, $con);
$total_sabah_complete = mysql_num_rows($result_sabah_complete);

// Total all sabah response INCOMPLETED
$total_sabah_incomplete = $total_sabah - $total_sabah_complete;

//Total respondent response in Sarawak
$sarawak = "SELECT a.alamat1, a.alamat2, a.poskod, a.bandar, a.negeri, a.no_telepon, a.no_fax, b.lesen, a.nama_estet, a.no_lesen_baru, a.syarikat_induk, a.emel, a.Negeri_Premis, a.Daerah_Premis, c.total_b Pengangkuta, d.total_b Penjagaan, e.total_b Penuaian, f.total_perbelanjaan Belanja, b.`password`, b.success
				FROM $table a 
				INNER JOIN login_estate b on a.No_Lesen_Baru = b.lesen
				LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
				LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year' 
				LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
				LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year' 
				WHERE  
				a.No_Lesen_Baru <> ''
				and a.No_Lesen_Baru not like '%123456%' 
				and a.nama_estet!='' 				
				and (c.total_b > 0 or d.total_b > 0 or e.total_b > 0 or f.total_perbelanjaan > 0)
				 and a.Negeri_Premis LIKE '%SARAWAK%'";
if (isset($negeri)) {
    $sarawak.=" AND a.negeri_premis = '$negeri'";
}
if (isset($district)) {
    $sarawak.=" AND a.daerah_premis = '$district'";
}
$sarawak.=" GROUP BY a.No_Lesen_Baru ORDER BY a.Negeri_Premis ASC";
$result_sarawak = mysql_query($sarawak, $con);
$total_sarawak = mysql_num_rows($result_sarawak);

//Total Respondent not response in Sarawak
$sarawak_incomplete = "SELECT a.alamat1, a.alamat2, a.poskod, a.bandar, a.negeri, a.no_telepon, a.no_fax, b.lesen, a.no_lesen_baru, a.nama_estet, a.syarikat_induk, a.emel, a.Negeri_Premis, a.Daerah_Premis, c.total_b Pengangkuta, d.total_b Penjagaan, e.total_b Penuaian, f.total_perbelanjaan Belanja, b.`password`, b.success
			FROM $table a 
			INNER JOIN login_estate b on a.No_Lesen_Baru = b.lesen
			LEFT JOIN kos_matang_pengangkutan c on a.No_Lesen_Baru = c.lesen and c.pb_thisyear='$year'
			LEFT JOIN kos_matang_penjagaan d on a.No_Lesen_Baru = d.lesen and d.pb_thisyear='$year' 
			LEFT JOIN kos_matang_penuaian e on a.No_Lesen_Baru = e.lesen and e.pb_thisyear='$year'
			LEFT JOIN belanja_am_kos f on a.No_Lesen_Baru = f.lesen and f.thisyear='$year' 
			WHERE  
			a.No_Lesen_Baru <> ''
			and a.No_Lesen_Baru not like '%123456%' 
			and a.nama_estet!='' 			
			and (c.total_b is null or c.total_b = 0) and (d.total_b is null or d.total_b = 0) and (e.total_b is null or e.total_b = 0) and (f.total_perbelanjaan = 0 or f.total_perbelanjaan is null)
			and a.Negeri_Premis LIKE '%SARAWAK%'";
if (isset($negeri)) {
    $sarawak_incomplete.=" AND a.negeri_premis = '$negeri'";
}
if (isset($district)) {
    $sarawak_incomplete.=" AND a.daerah_premis = '$district'";
}
$sarawak_incomplete.=" GROUP BY a.No_Lesen_Baru ORDER BY a.Negeri_Premis ASC";
$result_sarawak_incomplete = mysql_query($sarawak_incomplete, $con);
$total_sarawak_incomplete = mysql_num_rows($result_sarawak_incomplete);

// Total all sarawak response COMPLETED
$all_sarawak = "SELECT $table.no_lesen_baru lesen, $table.nama_estet nama, login_estate.success access, $table.syarikat_induk syarikat_induk,$table.emel email FROM $table";
$all_sarawak .= " LEFT JOIN buruh ON $table.no_lesen_baru = buruh.lesen";
$all_sarawak .= " LEFT JOIN kos_belum_matang ON $table.no_lesen_baru = kos_belum_matang.lesen";
$all_sarawak .= " LEFT JOIN kos_matang_pengangkutan ON $table.no_lesen_baru = kos_matang_pengangkutan.lesen";
$all_sarawak .= " LEFT JOIN kos_matang_penjagaan ON $table.no_lesen_baru = kos_matang_penjagaan.lesen";
$all_sarawak .= " LEFT JOIN kos_matang_penuaian ON $table.no_lesen_baru = kos_matang_penuaian.lesen";
$all_sarawak .= " LEFT JOIN warga_estate ON $table.no_lesen_baru = warga_estate.lesen";
$all_sarawak .= " LEFT JOIN login_estate ON $table.no_lesen_baru = login_estate.lesen";
$all_sarawak .= " LEFT JOIN estate_info ON $table.no_lesen_baru = estate_info.lesen";
$all_sarawak .= " WHERE buruh.tahun = $year";
$all_sarawak .= " AND kos_belum_matang.pb_thisyear = $year";
$all_sarawak .= " AND kos_matang_pengangkutan.pb_thisyear = $year";
$all_sarawak .= " AND kos_matang_penjagaan.pb_thisyear = $year";
$all_sarawak .= " AND kos_matang_penuaian.pb_thisyear = $year";
$all_sarawak .= " AND warga_estate.tahun = $year";
$all_sarawak .= " AND buruh.tahun = $year";
$all_sarawak .= " AND kos_belum_matang.status = 1";
$all_sarawak .= " AND kos_matang_pengangkutan.status = 1";
$all_sarawak .= " AND kos_matang_penjagaan.status = 1";
$all_sarawak .= " AND kos_matang_penuaian.status = 1";
$all_sarawak .= " AND $table.negeri LIKE '%SARAWAK%'";
$all_sarawak .= " GROUP BY $table.no_lesen_baru";
$all_sarawak .= " ORDER BY login_estate.success DESC";
$result_sarawak_complete = mysql_query($all_sarawak, $con);
$total_sarawak_complete = mysql_num_rows($result_sarawak_complete);

// Total all sarawak response INCOMPLETED
$total_sarawak_incomplete = $total_sarawak - $total_sarawak_complete;

$percent_all = number_format(($total_all / $total) * 100, 2);
$percent_peninsular = number_format(($total_peninsular / $total) * 100, 2);
$percent_sabah = number_format(($total_sabah / $total) * 100, 2);
$percent_sarawak = number_format(($total_sarawak / $total) * 100, 2);

$nonresponse_all = $total - $total_all;
$nonresponse_peninsular = $total_p - $total_peninsular;
$nonresponse_sabah = $total_sb - $total_sabah;
$nonresponse_sarawak = $total_sw - $total_sarawak;

$percent_a = number_format(($total_all / $total) * 100, 2);
$percent_p = number_format(($total_peninsular / $total_p) * 100, 2);
$percent_sb = number_format(($total_sabah / $total_sb) * 100, 2);
$percent_sw = number_format(($total_sarawak / $total_sw) * 100, 2);

$endtime = microtime();
$time_diff = $endtime - $starttime;
return $time_diff;
?>
