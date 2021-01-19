<?php
	$con = connect();
	
	$year = $_COOKIE['tahun_report'];
	$list = 1;
	$starttime = microtime();
	
	// Total all estate records
	$total = "SELECT lesen FROM login_estate";
	$total .= " GROUP BY lesen";

	$result_total = mysql_query($total,$con);
	$total = mysql_num_rows($result_total);
	
	
	
	// Total all estate records (peninsular)
	$total_p = "SELECT le.lesen,es.no_lesen_baru FROM login_estate le, esub es";
	$total_p .= " WHERE 
	le.lesen=es.no_lesen_baru and 
	es.negeri NOT LIKE '%SARAWAK%'";
	$total_p .= " AND es.negeri NOT LIKE '%SABAH%'";
	$total_p .= " GROUP BY le.lesen";
	
	//echo $total_p;
	
	$result_total_p = mysql_query($total_p,$con);
	$total_p = mysql_num_rows($result_total_p);
	
	// Total all estate records (Sabah)
	$total_sb = "SELECT le.lesen, es.no_lesen_baru FROM login_estate le, esub es";
	$total_sb .= " WHERE 
	le.lesen = es.no_lesen_baru 
	AND
	es.negeri LIKE '%SABAH%'";
	$total_sb .= " GROUP BY le.lesen";
	//echo $total_sb; 
	$result_total_sb = mysql_query($total_sb,$con);
	$total_sb = mysql_num_rows($result_total_sb);
	
	// Total all estate records (Sarawak)
	$total_sw = "SELECT le.lesen, es.no_lesen_baru FROM esub es,login_estate le";
	$total_sw .= " WHERE 
	le.lesen = es.no_lesen_baru
	AND
	es.negeri LIKE '%SARAWAK%'";
	$total_sw .= " GROUP BY le.lesen";
	
	//echo $total_sw;
	
	$result_total_sw = mysql_query($total_sw,$con);
	$total_sw = mysql_num_rows($result_total_sw);
	
	// Total all estate response
	
	
/*	$all = "SELECT esub.no_lesen_baru lesen, esub.nama_estet nama, esub.no_lesen_baru lesen_baru, esub.syarikat_induk syarikat_induk, login_estate.success access, esub.emel email FROM esub";
	$all .= " JOIN estate_info ON esub.no_lesen_baru = estate_info.lesen";
	$all .= " JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen";
*/	
	$all ="select lesen from login_estate";
	if($year=="2010"){$all .= " WHERE login_estate.success != '0000-00-00 00:00:00'";
	}
	if($year!="2010"){	$all .= " WHERE login_estate.success like '%$year%'";
	}
	$all.=" group by lesen";
	//echo $all;

	$result_all = mysql_query($all,$con);
	$total_all = mysql_num_rows($result_all);
	
	// Total all estate response COMPLETED
	$all_complete = "SELECT esub.no_lesen_baru lesen, esub.nama_estet nama,esub.syarikat_induk syarikat_induk, login_estate.success access, esub.emel email FROM esub";
	$all_complete .= " LEFT JOIN buruh ON esub.no_lesen_baru = buruh.lesen";
	$all_complete .= " LEFT JOIN kos_belum_matang ON esub.no_lesen_baru = kos_belum_matang.lesen";
	$all_complete .= " LEFT JOIN kos_matang_pengangkutan ON esub.no_lesen_baru = kos_matang_pengangkutan.lesen";
	$all_complete .= " LEFT JOIN kos_matang_penjagaan ON esub.no_lesen_baru = kos_matang_penjagaan.lesen";
	$all_complete .= " LEFT JOIN kos_matang_penuaian ON esub.no_lesen_baru = kos_matang_penuaian.lesen";
	$all_complete .= " LEFT JOIN warga_estate ON esub.no_lesen_baru = warga_estate.lesen";
	$all_complete .= " LEFT JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen";
	$all_complete .= " LEFT JOIN estate_info ON esub.no_lesen_baru = estate_info.lesen";
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
	$all_complete .= " GROUP BY esub.no_lesen_baru";
	$all_complete .= " ORDER BY login_estate.success DESC";
	
//	echo $all_complete;
	
	$result_complete 	= mysql_query($all_complete,$con);
	$total_complete 	= mysql_num_rows($result_complete);
	
	// Total all estate response INCOMPLETED
	$all_incomplete = "SELECT esub.no_lesen_baru lesen, esub.nama_estet nama, login_estate.success access,esub.syarikat_induk syarikat_induk, esub.emel email FROM esub JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen  ";
	if($year=="2010"){$all_incomplete.= " WHERE login_estate.success != '0000-00-00 00:00:00'";
	}
	if($year!="2010"){	$all_incomplete .= " WHERE login_estate.success like '%$year%'";
	}

	//echo $all_incomplete;
	$result_incomplete 	= mysql_query($all_incomplete,$con);
	$total_incomplete 	= mysql_num_rows($result_incomplete);
	$total_incomplete= $total_all-$total_complete;
	
	// Total peninsular estate response
	$peninsular = "SELECT count(le.lesen) as kira,es.no_lesen_baru, es.nama_estet , le.success , es.negeri, es.syarikat_induk, es.emel FROM login_estate le, esub  es WHERE 
le.lesen = es.no_lesen_baru  ";
	if($year=="2010"){
		$peninsular .= " and le.success != '0000-00-00 00:00:00'";
	}
	if($year!="2010"){	
		$peninsular .= " and le.success like '%$year%'";
	}
	$peninsular.=" AND es.negeri NOT LIKE '%SARAWAK%' AND es.negeri NOT LIKE '%SABAH%' group by le.lesen";
	
	
	//echo $peninsular;
	
	$result_peninsular = mysql_query($peninsular,$con);
	$total_peninsular = mysql_num_rows($result_peninsular);
	
	
	// Total all peninsular response COMPLETED
	$all_peninsular = "SELECT esub.no_lesen_baru lesen, esub.nama_estet nama, login_estate.success access,esub.syarikat_induk syarikat_induk, esub.emel email FROM esub";
	$all_peninsular .= " LEFT JOIN buruh ON esub.no_lesen_baru = buruh.lesen";
	$all_peninsular .= " LEFT JOIN kos_belum_matang ON esub.no_lesen_baru = kos_belum_matang.lesen";
	$all_peninsular .= " LEFT JOIN kos_matang_pengangkutan ON esub.no_lesen_baru = kos_matang_pengangkutan.lesen";
	$all_peninsular .= " LEFT JOIN kos_matang_penjagaan ON esub.no_lesen_baru = kos_matang_penjagaan.lesen";
	$all_peninsular .= " LEFT JOIN kos_matang_penuaian ON esub.no_lesen_baru = kos_matang_penuaian.lesen";
	$all_peninsular .= " LEFT JOIN warga_estate ON esub.no_lesen_baru = warga_estate.lesen";
	$all_peninsular .= " LEFT JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen";
	$all_peninsular .= " LEFT JOIN estate_info ON esub.no_lesen_baru = estate_info.lesen";
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
	$all_peninsular .= " AND esub.negeri NOT LIKE '%SARAWAK%'";
	$all_peninsular .= " AND esub.negeri NOT LIKE '%SABAH%'";
	$all_peninsular .= " GROUP BY esub.no_lesen_baru";
	$all_peninsular .= " ORDER BY login_estate.success DESC";
	
	//echo $all_peninsular; 
	
	$result_peninsular_complete = mysql_query($all_peninsular,$con);
	$total_peninsular_complete 	= mysql_num_rows($result_peninsular_complete);
	
	// Total all peninsular response INCOMPLETED
	$total_peninsular_incomplete = $total_peninsular-$total_peninsular_complete;	
	
	// Total sabah estate response
	
	$sabah = "SELECT count(le.lesen) as kira,es.no_lesen_baru, es.nama_estet , le.success , es.negeri FROM login_estate le, esub  es WHERE 
le.lesen = es.no_lesen_baru  ";
	if($year=="2010"){
		$sabah .= " and le.success != '0000-00-00 00:00:00'";
	}
	if($year!="2010"){	
		$sabah .= " and le.success like '%$year%'";
	}
	$sabah.=" AND es.negeri  LIKE '%SABAH%' group by le.lesen";
	//echo $sabah; 
	$result_sabah = mysql_query($sabah,$con);
	$total_sabah = mysql_num_rows($result_sabah);
	
	// Total all sabah response COMPLETED
	$all_sabah = "SELECT esub.no_lesen_baru lesen, esub.nama_estet nama, login_estate.success access, esub.syarikat_induk syarikat_induk,esub.emel email FROM esub";
	$all_sabah .= " LEFT JOIN buruh ON esub.no_lesen_baru = buruh.lesen";
	$all_sabah .= " LEFT JOIN kos_belum_matang ON esub.no_lesen_baru = kos_belum_matang.lesen";
	$all_sabah .= " LEFT JOIN kos_matang_pengangkutan ON esub.no_lesen_baru = kos_matang_pengangkutan.lesen";
	$all_sabah .= " LEFT JOIN kos_matang_penjagaan ON esub.no_lesen_baru = kos_matang_penjagaan.lesen";
	$all_sabah .= " LEFT JOIN kos_matang_penuaian ON esub.no_lesen_baru = kos_matang_penuaian.lesen";
	$all_sabah .= " LEFT JOIN warga_estate ON esub.no_lesen_baru = warga_estate.lesen";
	$all_sabah .= " LEFT JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen";
	$all_sabah .= " LEFT JOIN estate_info ON esub.no_lesen_baru = estate_info.lesen";
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
	$all_sabah .= " AND esub.negeri LIKE '%SABAH%'";
	$all_sabah .= " GROUP BY esub.no_lesen_baru";
	$all_sabah .= " ORDER BY login_estate.success DESC";
	
	$result_sabah_complete = mysql_query($all_sabah,$con);
	$total_sabah_complete 	= mysql_num_rows($result_sabah_complete);
	
	// Total all sabah response INCOMPLETED
	$total_sabah_incomplete = $total_sabah-$total_sabah_complete;	
	
	// Total sarawak estate response
	$sarawak = "SELECT count(le.lesen) as kira,es.no_lesen_baru, es.nama_estet , le.success , es.negeri FROM login_estate le, esub  es WHERE 
le.lesen = es.no_lesen_baru  ";
	if($year=="2010"){
		$sarawak.= " and le.success != '0000-00-00 00:00:00'";
	}
	if($year!="2010"){	
		$sarawak.= " and le.success like '%$year%'";
	}
	$sarawak.=" AND es.negeri  LIKE '%SARAWAK%'  group by le.lesen";
	
	$result_sarawak = mysql_query($sarawak,$con);
	$total_sarawak = mysql_num_rows($result_sarawak);
	
	// Total all sarawak response COMPLETED
	$all_sarawak = "SELECT esub.no_lesen_baru lesen, esub.nama_estet nama, login_estate.success access, esub.syarikat_induk syarikat_induk,esub.emel email FROM esub";
	$all_sarawak .= " LEFT JOIN buruh ON esub.no_lesen_baru = buruh.lesen";
	$all_sarawak .= " LEFT JOIN kos_belum_matang ON esub.no_lesen_baru = kos_belum_matang.lesen";
	$all_sarawak .= " LEFT JOIN kos_matang_pengangkutan ON esub.no_lesen_baru = kos_matang_pengangkutan.lesen";
	$all_sarawak .= " LEFT JOIN kos_matang_penjagaan ON esub.no_lesen_baru = kos_matang_penjagaan.lesen";
	$all_sarawak .= " LEFT JOIN kos_matang_penuaian ON esub.no_lesen_baru = kos_matang_penuaian.lesen";
	$all_sarawak .= " LEFT JOIN warga_estate ON esub.no_lesen_baru = warga_estate.lesen";
	$all_sarawak .= " LEFT JOIN login_estate ON esub.no_lesen_baru = login_estate.lesen";
	$all_sarawak .= " LEFT JOIN estate_info ON esub.no_lesen_baru = estate_info.lesen";
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
	$all_sarawak .= " AND esub.negeri LIKE '%SARAWAK%'";
	$all_sarawak .= " GROUP BY esub.no_lesen_baru";
	$all_sarawak .= " ORDER BY login_estate.success DESC";
	
	$result_sarawak_complete 	= mysql_query($all_sarawak,$con);
	$total_sarawak_complete 		= mysql_num_rows($result_sarawak_complete);
	
	// Total all sarawak response INCOMPLETED
	$total_sarawak_incomplete = $total_sarawak-$total_sarawak_complete;	
	
	$percent_all 		= number_format(($total_all/$total)*100,2);
	$percent_peninsular = number_format(($total_peninsular/$total)*100,2);
	$percent_sabah 		= number_format(($total_sabah/$total)*100,2);
	$percent_sarawak 	= number_format(($total_sarawak/$total)*100,2);
	
	$nonresponse_all		= $total-$total_all;
	$nonresponse_peninsular	= $total_p-$total_peninsular;
	$nonresponse_sabah		= $total_sb-$total_sabah;
	$nonresponse_sarawak	= $total_sw-$total_sarawak;
	
	$percent_a 		= number_format(($total_all/$total)*100,2);
	$percent_p = number_format(($total_peninsular/$total_p)*100,2);
	$percent_sb 		= number_format(($total_sabah/$total_sb)*100,2);
	$percent_sw 	= number_format(($total_sarawak/$total_sw)*100,2);
	
	$endtime = microtime();
	$time_diff = $endtime-$starttime;
	return $time_diff;
?>
