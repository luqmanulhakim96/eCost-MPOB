<?php
	$con = connect();
	extract($_REQUEST);
	$year = $_COOKIE['tahun_report'];
	$tahun = $year-1;
	$list = 1;
	$starttime = microtime();	
	
	//function negeri
	function negeri_mill ($state, $district, $year){
		global $con;
		global $tahun;
		
		$total_p_query = "SELECT ekilang.no_lesen lesen, syarikat_induk, nama_kilang, success access, email
							FROM ekilang 
							LEFT JOIN login_mill ON login_mill.lesen = ekilang.no_lesen 
							LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen
							WHERE ekilang.tahun = $tahun AND ekilang.no_lesen <> '' AND ekilang.no_lesen not like '%123456%' 
							AND ekilang.negeri LIKE '%$state%'
							GROUP BY no_lesen";
		$result_total_p = mysql_query($total_p_query,$con);
		$total_p = mysql_num_rows($result_total_p);
		
		$all = "SELECT login_mill.password, ekilang.no_lesen lesen, ekilang.syarikat_induk syarikat_induk, ekilang.nama_kilang nama, login_mill.success access, alamat_ekilang.email email FROM ekilang";
		$all .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
		$all .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen AND mill_kos_lain.tahun = $year";
		$all .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen AND mill_pemprosesan.tahun = $year";
		$all .= " LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen";
		$all .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
		$all .= " WHERE";
		$all .= " ekilang.tahun = $tahun";
		$all .= " AND ekilang.negeri LIKE '%$state%'";
		$all .= " AND (mill_kos_lain.total_kl > 0 or mill_pemprosesan.total_kp > 0)";
		$all .= " GROUP BY ekilang.no_lesen";
		$all .= " ORDER BY login_mill.success DESC";
		$result_all = mysql_query($all,$con);
		$total_peninsular = mysql_num_rows($result_all);
		$total_peninsular_complete = $total_peninsular;//TODO:checking
		
		$all_incomplete = "SELECT login_mill.password, ekilang.no_lesen lesen, ekilang.syarikat_induk syarikat_induk, ekilang.nama_kilang nama, login_mill.success access, alamat_ekilang.email email FROM ekilang";
		$all_incomplete .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
		$all_incomplete .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen AND mill_kos_lain.tahun = $year";
		$all_incomplete .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen AND mill_pemprosesan.tahun = $year";
		$all_incomplete .= " LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen";
		$all_incomplete .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
		$all_incomplete .= " WHERE";
		$all_incomplete .= " ekilang.tahun = $tahun";
		$all_incomplete .= " AND ekilang.negeri LIKE '%$state%'";
		$all_incomplete .= " AND (mill_kos_lain.total_kl = 0 OR mill_kos_lain.total_kl is null) AND (mill_pemprosesan.total_kp = 0 OR mill_pemprosesan.total_kp is null)";
		$all_incomplete .= " GROUP BY ekilang.no_lesen";
		$all_incomplete .= " ORDER BY login_mill.success DESC";
		$result_all_incomplete = mysql_query($all_incomplete,$con);
		$nonresponse_peninsular = mysql_num_rows($result_all_incomplete);
		$total_peninsular_incomplete = $nonresponse_peninsular;//TODO:checking
		
		$percent_peninsular = number_format(($total_peninsular/$total_p)*100,2);
		
		$var[0] = $total_p; //DONE
		$var[1] = $total_peninsular; //DONE
		$var[2] = $total_peninsular_complete; //DONE
		$var[3] = $total_peninsular_incomplete;  //DONE
		$var[4] = $percent_peninsular; //DONE
		$var[5] = $nonresponse_peninsular;	//DONE
	
		
		return $var; 
	}
	
	// Total all mill records
	$total = "SELECT ekilang.no_lesen lesen, syarikat_induk, nama_kilang, success access, email
				FROM ekilang 
				LEFT JOIN login_mill ON login_mill.lesen = ekilang.no_lesen 
				LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen
				WHERE ekilang.tahun = $tahun AND ekilang.no_lesen <> '' AND ekilang.no_lesen not like '%123456%' GROUP BY no_lesen";
	$result_total = mysql_query($total,$con);
	$total = mysql_num_rows($result_total);
	
	// Total respondent all mill records (peninsular)
	$total_p = "select ekilang.NO_LESEN lesen, syarikat_induk, nama_kilang, success access , email
				FROM ekilang 
				LEFT JOIN login_mill ON login_mill.lesen = ekilang.no_lesen
				LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen
				where ekilang.NEGERI not like '%sarawak%' and ekilang.NEGERI not like '%sabah%' and ekilang.tahun = $tahun AND ekilang.no_lesen <> '' AND ekilang.no_lesen not like '%123456%' GROUP BY no_lesen";	
	$result_total_p = mysql_query($total_p,$con);
	$total_p = mysql_num_rows($result_total_p);
	
	// Total respondent all mill records (Sabah)
	$total_sb = "select ekilang.NO_LESEN lesen, syarikat_induk, nama_kilang, success access, email
				FROM ekilang 
				LEFT JOIN login_mill ON login_mill.lesen = ekilang.no_lesen
				LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen
				where ekilang.NEGERI like '%sabah%' and ekilang.tahun = $tahun AND ekilang.no_lesen <> '' AND ekilang.no_lesen not like '%123456%' GROUP BY no_lesen";				
	$result_total_sb = mysql_query($total_sb,$con);
	$total_sb = mysql_num_rows($result_total_sb);
	
	// Total respondent all mill records (Sarawak)
	$total_sw = "select ekilang.NO_LESEN lesen, syarikat_induk, nama_kilang, success access, email 
				FROM ekilang 
				LEFT JOIN login_mill ON login_mill.lesen = ekilang.no_lesen
				LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen
				where ekilang.NEGERI like '%sarawak%' and ekilang.tahun = $tahun AND ekilang.no_lesen <> '' AND ekilang.no_lesen not like '%123456%' GROUP BY no_lesen";
	$result_total_sw = mysql_query($total_sw,$con);
	$total_sw = mysql_num_rows($result_total_sw);
	
	// Total all mill response
	$all = "SELECT alamat_ekilang.alamatsurat1, alamat_ekilang.alamatsurat2, alamat_ekilang.alamatsurat3, alamat_ekilang.notel, alamat_ekilang.nofax, login_mill.password, ekilang.no_lesen lesen, ekilang.syarikat_induk syarikat_induk, ekilang.nama_kilang nama, login_mill.success access, alamat_ekilang.email email FROM ekilang";
	$all .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
	$all .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen AND mill_kos_lain.tahun = $year";
	$all .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen AND mill_pemprosesan.tahun = $year";
	$all .= " LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen";
	$all .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
	$all .= " WHERE";
	$all .= " ekilang.tahun = $tahun";
	$all .= " AND (mill_kos_lain.total_kl > 0 or mill_pemprosesan.total_kp > 0)";
	$all .= " GROUP BY ekilang.no_lesen";
	$all .= " ORDER BY login_mill.success DESC";
	$result_all = mysql_query($all,$con);
	$total_all = mysql_num_rows($result_all);
	
	//Total all mill non-response
	$all_incomplete = "SELECT alamat_ekilang.alamatsurat1, alamat_ekilang.alamatsurat2, alamat_ekilang.alamatsurat3, alamat_ekilang.notel, alamat_ekilang.nofax, login_mill.password, ekilang.no_lesen lesen, ekilang.syarikat_induk syarikat_induk, ekilang.nama_kilang nama, login_mill.success access, alamat_ekilang.email email FROM ekilang";
	$all_incomplete .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
	$all_incomplete .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen AND mill_kos_lain.tahun = $year";
	$all_incomplete .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen AND mill_pemprosesan.tahun = $year";
	$all_incomplete .= " LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen";
	$all_incomplete .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
	$all_incomplete .= " WHERE";
	$all_incomplete .= " ekilang.tahun = $tahun";
	$all_incomplete .= " AND (mill_kos_lain.total_kl = 0 OR mill_kos_lain.total_kl is null) AND (mill_pemprosesan.total_kp = 0 OR mill_pemprosesan.total_kp is null)";
	$all_incomplete .= " GROUP BY ekilang.no_lesen";
	$all_incomplete .= " ORDER BY login_mill.success DESC";
	$result_all_incomplete = mysql_query($all_incomplete,$con);
	$total_incomplete = mysql_num_rows($result_all_incomplete);
	
	// Total peninsular mill response
	$peninsular = "SELECT alamat_ekilang.alamatsurat1, alamat_ekilang.alamatsurat2, alamat_ekilang.alamatsurat3, alamat_ekilang.notel, alamat_ekilang.nofax, login_mill.password, ekilang.no_lesen lesen, ekilang.nama_kilang nama, ekilang.syarikat_induk syarikat_induk,login_mill.success access, alamat_ekilang.email email FROM ekilang";
	$peninsular .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
	$peninsular .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen AND mill_kos_lain.tahun = $year";
	$peninsular .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen AND mill_pemprosesan.tahun = $year";
	$peninsular .= " LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen";
	$peninsular .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
	$peninsular .= " WHERE";
	$peninsular .= " ekilang.tahun = $tahun";
	$peninsular .= " AND ekilang.negeri NOT LIKE '%SARAWAK%'";
	$peninsular .= " AND ekilang.negeri NOT LIKE '%SABAH%'";
	$peninsular .= " AND (mill_kos_lain.total_kl > 0 or mill_pemprosesan.total_kp > 0)";
	if(isset($negeri)){
		$peninsular .= " AND ekilang.negeri LIKE '%$negeri%'";
	}
	$peninsular .= " GROUP BY ekilang.no_lesen";
	$peninsular .= " ORDER BY login_mill.success DESC";
	$result_peninsular = mysql_query($peninsular,$con);
	$total_peninsular = mysql_num_rows($result_peninsular);
	
	//Total peninsular mill non-response
	$peninsular_incomplete = "SELECT alamat_ekilang.alamatsurat1, alamat_ekilang.alamatsurat2, alamat_ekilang.alamatsurat3, alamat_ekilang.notel, alamat_ekilang.nofax, login_mill.password, ekilang.no_lesen lesen, ekilang.syarikat_induk syarikat_induk, ekilang.nama_kilang nama, login_mill.success access, alamat_ekilang.email email FROM ekilang";
	$peninsular_incomplete .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
	$peninsular_incomplete .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen AND mill_kos_lain.tahun = $year";
	$peninsular_incomplete .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen AND mill_pemprosesan.tahun = $year";
	$peninsular_incomplete .= " LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen";
	$peninsular_incomplete .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
	$peninsular_incomplete .= " WHERE";
	$peninsular_incomplete .= " ekilang.tahun = $tahun";
	$peninsular_incomplete .= " AND (mill_kos_lain.total_kl = 0 OR mill_kos_lain.total_kl is null) AND (mill_pemprosesan.total_kp = 0 OR mill_pemprosesan.total_kp is null)";
	$peninsular_incomplete .= " AND ekilang.negeri NOT LIKE '%sarawak%' AND ekilang.negeri NOT LIKE '%sabah%'";
	if(isset($negeri)){
		$peninsular_incomplete .= " AND ekilang.negeri LIKE '%$negeri%'";
	}
	$peninsular_incomplete .= " GROUP BY ekilang.no_lesen";
	$peninsular_incomplete .= " ORDER BY login_mill.success DESC";
	$result_peninsular_incomplete = mysql_query($peninsular_incomplete,$con);
	$total_peninsular_incomplete = mysql_num_rows($result_peninsular_incomplete);
	
	// Total sabah mill response
	$sabah = "SELECT alamat_ekilang.alamatsurat1, alamat_ekilang.alamatsurat2, alamat_ekilang.alamatsurat3, alamat_ekilang.notel, alamat_ekilang.nofax, login_mill.password, ekilang.no_lesen lesen, ekilang.nama_kilang nama, ekilang.syarikat_induk syarikat_induk,login_mill.success access, alamat_ekilang.email email FROM ekilang";
	$sabah .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
	$sabah .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen AND mill_kos_lain.tahun = $year";
	$sabah .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen AND mill_pemprosesan.tahun = $year";
	$sabah .= " LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen";
	$sabah .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
	$sabah .= " WHERE";
	$sabah .= " ekilang.tahun = $tahun";	
	$sabah .= " AND ekilang.negeri LIKE '%SABAH%'";
	$sabah .= " AND (mill_kos_lain.total_kl > 0 or mill_pemprosesan.total_kp > 0)";
	$sabah .= " GROUP BY ekilang.no_lesen";
	$sabah .= " ORDER BY login_mill.success DESC";
	$result_sabah = mysql_query($sabah,$con);
	$total_sabah = mysql_num_rows($result_sabah);
	
	//Total sabah mill non-response
	$sabah_incomplete = "SELECT alamat_ekilang.alamatsurat1, alamat_ekilang.alamatsurat2, alamat_ekilang.alamatsurat3, alamat_ekilang.notel, alamat_ekilang.nofax, login_mill.password, ekilang.no_lesen lesen, ekilang.syarikat_induk syarikat_induk, ekilang.nama_kilang nama, login_mill.success access, alamat_ekilang.email email FROM ekilang";
	$sabah_incomplete .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
	$sabah_incomplete .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen AND mill_kos_lain.tahun = $year";
	$sabah_incomplete .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen AND mill_pemprosesan.tahun = $year";
	$sabah_incomplete .= " LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen";
	$sabah_incomplete .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
	$sabah_incomplete .= " WHERE";
	$sabah_incomplete .= " ekilang.tahun = $tahun";
	$sabah_incomplete .= " AND (mill_kos_lain.total_kl = 0 OR mill_kos_lain.total_kl is null) AND (mill_pemprosesan.total_kp = 0 OR mill_pemprosesan.total_kp is null)";
	$sabah_incomplete .= " AND ekilang.negeri LIKE '%sabah%'";
	$sabah_incomplete .= " GROUP BY ekilang.no_lesen";
	$sabah_incomplete .= " ORDER BY login_mill.success DESC";
	$result_sabah_incomplete = mysql_query($sabah_incomplete,$con);
	$total_sabah_incomplete = mysql_num_rows($result_sabah_incomplete);	
	
	// Total sarawak mill response
	$sarawak = "SELECT alamat_ekilang.alamatsurat1, alamat_ekilang.alamatsurat2, alamat_ekilang.alamatsurat3, alamat_ekilang.notel, alamat_ekilang.nofax, login_mill.password, ekilang.no_lesen lesen, ekilang.nama_kilang nama, ekilang.syarikat_induk syarikat_induk,login_mill.success access, alamat_ekilang.email email FROM ekilang";
	$sarawak .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
	$sarawak .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen AND mill_kos_lain.tahun = $year";
	$sarawak .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen AND mill_pemprosesan.tahun = $year";
	$sarawak .= " LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen";
	$sarawak .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
	$sarawak .= " WHERE";
	$sarawak .= " ekilang.tahun = $tahun";
	$sarawak .= " AND ekilang.negeri LIKE '%SARAWAK%'";
	$sarawak .= " AND (mill_kos_lain.total_kl > 0 or mill_pemprosesan.total_kp > 0)";
	$sarawak .= " GROUP BY ekilang.no_lesen";
	$sarawak .= " ORDER BY login_mill.success DESC";
	$result_sarawak = mysql_query($sarawak,$con);
	$total_sarawak = mysql_num_rows($result_sarawak);
	
	//Total sabah mill non-response
	$sarawak_incomplete = "SELECT alamat_ekilang.alamatsurat1, alamat_ekilang.alamatsurat2, alamat_ekilang.alamatsurat3, alamat_ekilang.notel, alamat_ekilang.nofax, login_mill.password, ekilang.no_lesen lesen, ekilang.syarikat_induk syarikat_induk, ekilang.nama_kilang nama, login_mill.success access, alamat_ekilang.email email FROM ekilang";
	$sarawak_incomplete .= " LEFT JOIN mill_info ON ekilang.no_lesen = mill_info.lesen";
	$sarawak_incomplete .= " LEFT JOIN mill_kos_lain ON ekilang.no_lesen = mill_kos_lain.lesen AND mill_kos_lain.tahun = $year";
	$sarawak_incomplete .= " LEFT JOIN mill_pemprosesan ON ekilang.no_lesen = mill_pemprosesan.lesen AND mill_pemprosesan.tahun = $year";
	$sarawak_incomplete .= " LEFT JOIN login_mill ON ekilang.no_lesen = login_mill.lesen";
	$sarawak_incomplete .= " LEFT JOIN alamat_ekilang ON ekilang.no_lesen = alamat_ekilang.lesen";
	$sarawak_incomplete .= " WHERE";
	$sarawak_incomplete .= " ekilang.tahun = $tahun";
	$sarawak_incomplete .= " AND (mill_kos_lain.total_kl = 0 OR mill_kos_lain.total_kl is null) AND (mill_pemprosesan.total_kp = 0 OR mill_pemprosesan.total_kp is null)";
	$sarawak_incomplete .= " AND ekilang.negeri LIKE '%sarawak%'";
	$sarawak_incomplete .= " GROUP BY ekilang.no_lesen";
	$sarawak_incomplete .= " ORDER BY login_mill.success DESC";
	$result_sarawak_incomplete = mysql_query($sarawak_incomplete,$con);
	$total_sarawak_incomplete = mysql_num_rows($result_sarawak_incomplete);	
	
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
