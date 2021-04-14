<?php

//print_r($_SESSION);

/*
 *  Filename: main/open_link.php
 *  Copyright 2010 Malaysia Palm Oil Board <azman@mpob.gov.my>
 *  Last update: 15.10.2010 11:46:16 am
 */
error_reporting(0);
$id = $_REQUEST['id'];
$q = $_REQUEST['q'];
//ob_start("ob_gzhandler");
//set_time_limit(0);
$id = preg_replace('/[^a-zA-Z0-9\-]/', ' ', $id);
$id = preg_replace('/^[\-`]+/', '', $id);
$id = preg_replace('/[\-]+$/', '', $id);
$id = preg_replace('/[\-]{2,}/', ' ', $id);

extract($_GET);
extract($_POST);

include ('../Connections/connection.class.php');
if ($id == "estate") {
    if ($_SESSION['type'] <> "admin")
        header("location:../logout.php");
    $open = "estate.php";
    $sub = $_REQUEST['sub'];
    if (!isset($_REQUEST['sub']))
        $open_detail = "estate_response_rate.php";

    else if ($sub == "response_rate")
        $open_detail = "estate_response_rate.php";

    // start details of estate response
    else if ($sub == "total_all")
        $open_detail = "estate_total_all.php";

    else if ($sub == "total_complete")
        $open_detail = "estate_total_complete.php";

    else if ($sub == "total_incomplete")
        $open_detail = "estate_total_incomplete.php";

    else if ($sub == "total_incomplete_peninsular")
        $open_detail = "estate_total_incomplete_peninsular.php";

    else if ($sub == "total_incomplete_sabah")
        $open_detail = "estate_total_incomplete_sabah.php";

    else if ($sub == "total_incomplete_sarawak")
        $open_detail = "estate_total_incomplete_sarawak.php";

    else if ($sub == "total_peninsular")
        $open_detail = "estate_total_peninsular.php";

    else if ($sub == "total_peninsular_complete")
        $open_detail = "estate_total_peninsular_complete.php";

    else if ($sub == "total_sabah")
        $open_detail = "estate_total_sabah.php";

    else if ($sub == "total_sabah_complete")
        $open_detail = "estate_total_sabah_complete.php";

    else if ($sub == "total_sarawak")
        $open_detail = "estate_total_sarawak.php";

    else if ($sub == "total_sarawak_complete")
        $open_detail = "estate_total_sarawak_complete.php";

    else if ($sub == "nonresponse_all")
        $open_detail = "estate_nonresponse_all.php";
    // end of mill response

    else if ($sub == "imm")
        $open_detail = "mi_all.php";

    else if ($sub == "profile_estate")
        $open_detail = "profile_estate.php";

    else if ($sub == "new_planting")
        $open_detail = "mi_new_planting.php";

    else if ($sub == "new_planting_state")
        $open_detail = "mi_new_planting_state.php";

    else if ($sub == "new_replanting")
        $open_detail = "mi_new_replanting.php";

    else if ($sub == "new_replanting_state")
        $open_detail = "mi_replanting_state.php";

    else if ($sub == "new_conversion")
        $open_detail = "mi_new_conversion.php";

    else if ($sub == "new_conversion_state")
        $open_detail = "mi_conversion_state.php";

    else if ($sub == "age_profile")
        $open_detail = "age_profile.php";

    else if ($sub == "ageprofile_view")
        $open_detail = "age_profile_view.php";

    else if ($sub == "outlier")
        $open_detail = "rate_estate.php";

    else if ($sub == "nonresponde")
        $open_detail = "non_responde.php";

    else if ($sub == "responde")
        $open_detail = "responde.php";

    else if ($sub == "details")
        $open_detail = "details.php";

    else if ($sub == "soiltype")
        $open_detail = "estate_soiltype.php";

	else if ($sub == "summary")
        $open_detail = "mi_summary.php";

    else if ($sub == "sum_upkeep")
        $open_detail = "mc_sumupkeep.php";

    else if ($sub == "sum")
        $open_detail = "mc_sum.php";

    else if ($sub == "upk")
        $open_detail = "mc_all.php";

    else if ($sub == "upk_fertiliser")
        $open_detail = "mc_all_fertiliser.php";

    else if ($sub == "upk_state")
        $open_detail = "mc_all_state.php";

    else if ($sub == "harvest_all")
        $open_detail = "harvest_all.php";

    else if ($sub == "harvest_all_state")
        $open_detail = "harvest_all_state.php";

    else if ($sub == "transportation_all")
        $open_detail = "transportation_all.php";

    else if ($sub == "transportation_all_state")
        $open_detail = "transportation_all_state.php";

    else if ($sub == "mature_summary")
        $open_detail = "mature_summary.php";



    else if ($sub == "gc")
        $open_detail = "gc_all.php";

        else if ($sub == "gc_kos_lain")
            $open_detail = "gc_kos_lain.php";

    else if ($sub == "cost_maturity")
        $open_detail = "cost_maturity.php";

    else if ($sub == "cost_of_ffb")
        $open_detail = "cost_ffb.php";

    else if ($sub == "owner")
        $open_detail = "estate_size_owner.php";

    else if ($sub == "topography")
        $open_detail = "estate_topography.php";

    else if ($sub == "size_estate")
        $open_detail = "everage_size_ownership.php";

    else if ($sub == "size_estate_detail")
        $open_detail = "everage_size_ownership_detail.php";

    else if ($sub == "size_percentage")
        $open_detail = "everage_size_percentage.php";

    else if ($sub == "yield_fbb")
        $open_detail = "yield_fbb.php";

    else if ($sub == "yield_distribution")
        $open_detail = "yield_distribution.php";

    else if ($sub == "view_estate")
        $open_detail = "view_estate.php";
    else
        $open_detail = "estate_response_rate.php";
}
else if ($id == "adm_mill") {
    if ($_SESSION['type'] <> "admin")
        header("location:../logout.php");
    $open = "mill.php";
    $sub = $_REQUEST['sub'];
    if (!isset($_REQUEST['sub']))
        $open_detail = "mill_response_rate.php";

    else if ($sub == "response_rate")
        $open_detail = "mill_response_rate.php";

    // start details of mill response
    else if ($sub == "total_all")
        $open_detail = "total_all.php";

    else if ($sub == "total_complete")
        $open_detail = "total_complete.php";

    else if ($sub == "total_incomplete")
        $open_detail = "total_incomplete.php";

    else if ($sub == "total_peninsular")
        $open_detail = "total_peninsular.php";

    else if ($sub == "total_peninsular_complete")
        $open_detail = "total_peninsular_complete.php";

    else if ($sub == "total_sabah")
        $open_detail = "total_sabah.php";

    else if ($sub == "total_sabah_complete")
        $open_detail = "total_sabah_complete.php";

    else if ($sub == "total_sarawak")
        $open_detail = "total_sarawak.php";

    else if ($sub == "total_sarawak_complete")
        $open_detail = "total_sarawak_complete.php";

    else if ($sub == "nonresponse_all")
        $open_detail = "nonresponse_all.php";

    else if ($sub == "nonresponse_peninsular")
        $open_detail = "nonresponse_peninsular.php";


    // end of mill response

    else if ($sub == "responde_mill")
        $open_detail = "responde_mill.php";

    else if ($sub == "all_process_cost")
        $open_detail = "all_process_cost.php";
    else if ($sub == "all_other_cost")
        $open_detail = "all_other_cost.php";
    else if ($sub == "all_process_summary")
        $open_detail = "all_process_summary.php";

    else if ($sub == "mill_owner")
        $open_detail = "mill_owner.php";

    else if ($sub == "mill_process_capacity")
        $open_detail = "mill_process_capacity.php";

    else if ($sub == "cpo_output_mills")
        $open_detail = "cpo_output_mills.php";

    else if ($sub == "cpo_output_mills_size")
        $open_detail = "cpo_output_mills_size.php";

    else if ($sub == "mill_integration")
        $open_detail = "mills_integration.php";

    else if ($sub == "mill_oilextraction")
        $open_detail = "mills_oil_extraction.php";

    else if ($sub == "kernel_credit")
        $open_detail = "kernel.php";

    else if ($sub == "view_mill")
        $open_detail = "view_mill.php";

    else if ($sub == "all_mill")
        $open_detail = "all_mill.php";
    else
        $open_detail = "mill_response_rate.php";
}
else if ($id == "labour") {
    $open = "labour.php";
    $sub = $_REQUEST['sub'];
    if (!isset($_REQUEST['sub']))
        $open_detail = "estate_labour.php";

    else if ($sub == "manpower")
        $open_detail = "estate_manpower.php";

    else if ($sub == "profile_estate")
        $open_detail = "profile_estate.php";

    else if ($sub == "profile_mill")
        $open_detail = "profile_mill.php";

    else if ($sub == "mecha")
        $open_detail = "mecha.php";


    else if ($sub == "sub")
        $open_detail = "";
}
else if ($id == "summary") {
    if ($_SESSION['type'] <> "admin")
        header("location:../logout.php");
    $open = "summary.php";
    $sub = $_REQUEST['sub'];
    if (!isset($_REQUEST['sub']))
        $open_detail = "summary_compare_new.php";
    //$open_detail = "summary_compare.php";
    else if ($sub == "summary_all")
        $open_detail = "summary_all.php";

    else if ($sub == "summary_map")
        $open_detail = "map.php";

    else if ($sub == "summary_graf")
        $open_detail = "all_cop_graf.php";

    else if ($sub == "summary_outliers")
        $open_detail = "summary_outliers.php";
}

//------------------------------------------
else if ($id == "analysis") {
    if ($_SESSION['type'] <> "admin")
        header("location:../logout.php");
    $open = "analysis.php";
    $sub = $_REQUEST['sub'];
    if (!isset($_REQUEST['sub']))
        $open_detail = "analysis_main.php";
    else if ($sub == "analysis_estate")
        $open_detail = "data_survey_estate_analysis.php";
    else if ($sub == "analysis_estate_view")
        $open_detail = "analysis_estate_view.php";

    else if ($sub == "analysis_mill_view")
        $open_detail = "analysis_mill_view.php";

    else if ($sub == "analysis_mill")
        $open_detail = "data_survey_mill_analysis.php";
    else if ($sub == "linear_immature")
        $open_detail = "linear_immature.php";

    else if ($sub == "linear_mature_upkeep")
        $open_detail = "linear_mature.php";
    else if ($sub == "linear_mature_harvesting")
        $open_detail = "linear_mature_harvesting.php";
    else if ($sub == "linear_mature_transportation")
        $open_detail = "linear_mature_transportation.php";
	else if ($sub == "linear_mature_allcost")
        $open_detail = "linear_mature_allcost.php";

    else if ($sub == "linear_gc")
        $open_detail = "linear_gc.php";

    else if ($sub == "linear_mill_process")
        $open_detail = "linear_mill_process.php";

    else if ($sub == "linear_mill_other_cost")
        $open_detail = "linear_mill_other_cost.php";
}
//------------------------------------------


else if ($id == "") {
    //$open = "indexb4createsurvey.php"; // fail ni ape kegunaannya?

    header("location:../logout.php");
} else if ($id == "integration") {
    if (($_SESSION['type'] <> "estate") && ($_SESSION['type'] <> "admin"))
        header("location:../logout.php");

    $open = "integration.php"; // half done, check variable mane yang perlu untuk dijadikan checking acc
} else if ($id == "belum_matang") {
    if (($_SESSION['type'] <> "estate") && ($_SESSION['type'] <> "admin"))
        header("location:../logout.php");

    $open = "palmoil.php"; // half done, check variable mane yang perlu untuk dijadikan checking acc
    $open_detail = "po1year.php"; // done
}
else if ($id == "matang") {
    if (($_SESSION['type'] <> "estate") && ($_SESSION['type'] <> "admin"))
        header("location:../logout.php");
    $open = "palmoil.php"; // done
}
else if ($id == "umum") {
    if (($_SESSION['type'] <> "estate") && ($_SESSION['type'] <> "admin"))
        header("location:../logout.php");
    $open = "po4_1.php"; //done
}
else if ($id == "buruh") {
    if ($_SESSION['type'] <> "estate")
        header("location:../logout.php");
    $open = "po1_2.php"; // should be done
}
else if ($id == "home") {
    $open = "index.php";
    if (isset($_GET['firsttime']))
        $open = "isi_dulu.php";
    if (isset($_GET['secondtime']))
        $open = "isi_dulu2.php";
    //$open = "palmoil.php";
    //$open_detail = "index.php";
}
else if ($id == "bantuan") {
    $open = "bantuan.php";
} else if ($id == "print") {
    //$open = "print.php"; //xpasti lagi
    $open = "print_all.php";
}
	else if ($id == "print_estate") {
    $open = "print_ringkasankos_estate.php";
}else if ($id == "login") {
    $open = "";
} else if ($id == "ringkasan") {
    if (($_SESSION['type'] <> "estate") && ($_SESSION['type'] <> "admin"))
        header("location:../logout.php");
    $open = "cpo4_1.php"; // done
}

//palm oil menu/ minyak sawit
else if ($id == "kos_proses") {
    if (($_SESSION['type'] <> "mill") && ($_SESSION['type'] <> "admin"))
        header("location:../logout.php");
    $open = "cpo2_1.php";
}
else if ($id == "kos_lain") {
    if (($_SESSION['type'] <> "mill") && ($_SESSION['type'] <> "admin"))
        header("location:../logout.php");
    $open = "cpo3_1.php";
}
else if ($id == "ringkasan_mill") {
    if (($_SESSION['type'] <> "mill") && ($_SESSION['type'] <> "admin"))
        header("location:../logout.php");
    $open = "cpo4_1.php";
}
else if ($id == "buruh_mill") {
    if ($_SESSION['type'] <> "mill")
        header("location:../logout.php");
    $open = "buruh.php";
}
else if ($id == "po") {
    $open = "select_month.php";
} else if ($id == "profile") {
    $open = "profile.php";
} else if ($id == "editprofile") {
    $open = "editprofile.php";
} else if ($id == "printprofile") {
    $open = "profile-print.php";
} else if ($id == "po1_1") {
    $open = "palmoil.php";
    $open_detail = "po1_1.php";
} else if ($id == "po1_2") {
    $open = "palmoil.php";
    $open_detail = "po1_2.php";
} else if ($id == "po1year") {
    $open = "palmoil.php";
    $open_detail = "po1year.php";
} else if ($id == "po2year") {
    $open = "palmoil.php";
    $open_detail = "po2year.php";
} else if ($id == "po3year") {
    $open = "palmoil.php";
    $open_detail = "po3year.php";
} else if ($id == "po3_1") {
    $open = "palmoil.php";
    $open_detail = "po3_1.php";
} else if ($id == "po3_2") {
    $open = "palmoil.php";
    $open_detail = "po3_2.php";
} else if ($id == "po4_1") {
    $open = "palmoil.php";
    $open_detail = "po4_1.php";
} else if ($id == "view_message") {
    $open = "view_message.php";
} else if ($id == "view_message1") {
    $open = "view_message1.php";
} else if ($id == "compose_msg") {
    $open = "compose_msg.php";
} else if ($id == "read_msg") {
    $open = "read_msg.php";
} else if ($id == "msg_success") {
    $open = "success_msg.php";
} else if ($id == "print_borang") {
    $open = "print_borang.php";
    $open_detail = "po1_1.php";
} else if ($id == "maklumat_syarikat") {
    $open = "print_borang.php";
    $open_detail = "maklumat_syarikat.php";
} else if ($id == "maklumat_jentera") {
    $open = "print_borang.php";
    $open_detail = "maklumat_jentera.php";
} else if ($id == "maklumat_pekerja") {
    $open = "print_borang.php";
    $open_detail = "maklumat_pekerja.php";
} else if ($id == "pra_pertama") {
    $open = "print_borang.php";
    $open_detail = "pra_pertama.php";
} else if ($id == "pra_kedua") {
    $open = "print_borang.php";
    $open_detail = "pra_kedua.php";
} else if ($id == "pra_ketiga") {
    $open = "print_borang.php";
    $open_detail = "pra_ketiga.php";
} else if ($id == "matang_bts") {
    $open = "print_borang.php";
    $open_detail = "matang_bts.php";
} else if ($id == "matang_jaga") {
    $open = "print_borang.php";
    $open_detail = "matang_jaga.php";
} else if ($id == "matang_baja") {
    $open = "print_borang.php";
    $open_detail = "matang_baja.php";
} else if ($id == "matang_tuai") {
    $open = "print_borang.php";
    $open_detail = "matang_tuai.php";
} else if ($id == "matang_angkut") {
    $open = "print_borang.php";
    $open_detail = "matang_angkut.php";
} else if ($id == "butiran_kos") {
    $open = "print_borang.php";
    $open_detail = "butiran_kos.php";
} else if ($id == "print_po1_1") {
    $open = "print_borang.php";
    $open_detail = "po1_1.php";
} else if ($id == "print_po1_2") {
    $open = "print_borang.php";
    $open_detail = "po1_2.php";
} else if ($id == "print_po1year") {
    $open = "print_borang.php";
    $open_detail = "po1year.php";
} else if ($id == "print_po2year") {
    $open = "print_borang.php";
    $open_detail = "po2year.php";
} else if ($id == "print_po3year") {
    $open = "print_borang.php";
    $open_detail = "po3year.php";
} else if ($id == "print_po3_1") {
    $open = "print_borang.php";
    $open_detail = "po3_1.php";
} else if ($id == "print_po3_2") {
    $open = "print_borang.php";
    $open_detail = "po3_2.php";
} else if ($id == "print_po4_1") {
    $open = "print_borang.php";
    $open_detail = "po4_1.php";
}
//end of menu palm oil
//Crude Menu
else if ($id == "cpo") {
    $open = "select_month.php";
} else if ($id == "cpo1_1") {
    $open = "palmoil.php";
    $open_detail = "cpo1_1.php";
} else if ($id == "cpo2_1") {
    $open = "palmoil.php";
    $open_detail = "cpo2_1.php";
} else if ($id == "cpo3_1") {
    $open = "palmoil.php";
    $open_detail = "cpo3_1.php";
} else if ($id == "cpo4_1") {
    $open = "palmoil.php";
    $open_detail = "cpo4_1.php";
} else if ($id == "profil") {
    $open = "profil.php";
}

//end of menu crude palm oil/ minyak mentah
//Admin Site
else if ($id == "home_admin") {
    if ($_SESSION['type'] <> "admin")
        header("location:../logout.php");
    $open = "home_admin.php";
}
else if ($id == "idx") {
    $open = "utama.php";
} else if ($id == "sr") {
    $open = "estate_size_frame.php";
    $open_detail = "estate_size.php";
}
//sub estate
else if ($id == "es_size") {
    $open = "estate_size_frame.php";
    $open_detail = "estate_size_estate.php";
} else if ($id == "mill_size") {
    $open = "estate_size_frame.php";
    $open_detail = "estate_size_mill.php";
} else if ($id == "mill_capacity") {
    $open = "estate_size_frame.php";
    $open_detail = "mill_capacity.php";
} else if ($id == "ev_size") {
    $open = "estate_size_frame.php";
    $open_detail = "everage_size.php";
} else if ($id == "yield_ffb") {
    $open = "estate_size_frame.php";
    $open_detail = "yield_ffb.php";
} else if ($id == "manpower") {
    $open = "estate_size_frame.php";
    $open_detail = "manpower.php";
} else if ($id == "cpo_output") {
    $open = "estate_size_frame.php";
    $open_detail = "cpo_output.php";
} else if ($id == "estate_mill_integ") {
    $open = "estate_size_frame.php";
    $open_detail = "estate_mill.php";
} else if ($id == "oer_yield") {
    $open = "estate_size_frame.php";
    $open_detail = "oer_yield.php";
} else if ($id == "kernel") {
    $open = "estate_size_frame.php";
    $open_detail = "kernel.php";
}
//end sub estate
else if ($id == "mill") {
    $open = "menu_mill.php";
} else if ($id == "imm") {
    $open = "immature_frame.php";
    $open_detail = "mi_all.php";
} else if ($id == "soil_new_plant") {
    $open = "immature_frame.php";
    $open_detail = "soil_new_plant.php";
} else if ($id == "summary_compare") {
    $open = "summary_frame.php";
    $open_detail = "summary_compare.php";
} else if ($id == "new_planting") {
    $open = "immature_frame.php";
    $open_detail = "mi_region.php";
} else if ($id == "replanting") {
    $open = "immature_frame.php";
    $open_detail = "mi_region_replanting.php";
} else if ($id == "conversion") {
    $open = "immature_frame.php";
    $open_detail = "mi_region_conversion.php";
} else if ($id == "soil_replant") {
    $open = "immature_frame.php";
    $open_detail = "soil_replant.php";
} else if ($id == "soil_conversion") {
    $open = "immature_frame.php";
    $open_detail = "soil_conversion.php";
} else if ($id == "replanting_state") {
    $open = "immature_frame.php";
    $open_detail = "mi_state_replanting.php";
} else if ($id == "conversion_state") {
    $open = "immature_frame.php";
    $open_detail = "mi_state_conversion.php";
} else if ($id == "replanting_company") {
    $open = "immature_frame.php";
    $open_detail = "mi_company_replanting.php";
} else if ($id == "conversion_company") {
    $open = "immature_frame.php";
    $open_detail = "mi_company_conversion.php";
} else if ($id == "new_planting_state") {
    $open = "immature_frame.php";
    $open_detail = "mi_state.php";
} else if ($id == "new_planting_company") {
    $open = "immature_frame.php";
    $open_detail = "mi_company.php";
} else if ($id == "company_profile") {
    $open = "immature_frame.php";
    $open_detail = "profile.php";
} else if ($id == "send_msg_comp") {
    $open = "immature_frame.php";
    $open_detail = "send_msg.php";
} else if ($id == "new_planting_soil") {
    $open = "immature_frame.php";
    $open_detail = "new_planting.php";
} else if ($id == "topografi") {
    $open = "immature_frame.php";
    $open_detail = "topo.php";
} else if ($id == "mat") {
    $open = "mature_frame.php";
    $open_detail = "mc_all.php";
} else if ($id == "mc_region1") {
    $open = "mature_frame.php";
    $open_detail = "mc_region.php";
} else if ($id == "soiltype") {
    $open = "mature_frame.php";
    $open_detail = "soiltype.php";
} else if ($id == "mc_state") {
    $open = "mature_frame.php";
    $open_detail = "mc_state.php";
} else if ($id == "mc_company") {
    $open = "mature_frame.php";
    $open_detail = "mc_company.php";
} else if ($id == "topo_mc") {
    $open = "mature_frame.php";
    $open_detail = "topo.php";
} else if ($id == "ffb") {
    $open = "menu_ffb.php";
} else if ($id == 'config') {
    if ($_SESSION['type'] <> "admin")
        header("location:../logout.php");

    $open = "palmoil.php";
    $open_detail = "po1_1.php";

    if ($sub == 'password')
        $open_detail = "password.php";
    else if ($sub == 'faq')
        $open_detail = "faq.php";
    else if ($sub == 'chapter')
        $open_detail = "chapter.php";
    else if ($sub == "allestate")
        $open_detail = "estate_all.php";
    else if ($sub == "announce_set")
        $open_detail = "announce_set.php";
    else if ($sub == "people_set")
        $open_detail = "people_set.php";
    else if ($sub == "cop2008")
        $open_detail = "cop.php";
    else if ($sub == "range_outliers")
        $open_detail = "range_outliers.php";
    else if ($sub == "range_outliers_mill")
        $open_detail = "range_outliers_mill.php";
    else if ($sub == 'help') {
        $open_detail = "bantuan.php";
    } else if ($sub == 'range') {
        $open_detail = "range.php";
    } else if ($sub == "edit_generate") {
        $open_detail = "indexgenerate.php";
    } else if ($sub == "generate") {
        $open_detail = "generate.php";
    } else if ($sub == "variable") {
        $open_detail = "variables.php";
    } else if ($sub == "import_data") {
        $open_detail = "importdata.php";
    } else if ($sub == "upfile") {
        $open_detail = "upload_file.php";
    } else if ($sub == "settingonoff") {
        $open_detail = "setting_on_off.php";
    } else if ($sub == "period") {
        $open_detail = "period_survey.php";
    } else if ($sub == "esub_ffb") {
        $open_detail = "../migration/data_esub.php";
    }

    //else if($sub == "access_data")
    //{$open_detail = "access_data.php";}
    else if ($sub == "esub_mill") {
        $open_detail = "../migration/data_login_mill.php";
    } else if ($sub == "esub_estate") {
        $open_detail = "../migration/senarai_estet.php";
    } else if ($sub == "user") {
        $open_detail = "user.php";
    } else if ($sub == "admin_upload_esub") {
        $open_detail = "admin_upload_esub.php";
    } else if ($sub == "admin_upload_esub_new_year") {
        $open_detail = "admin_upload_esub_new_year.php";
    }else if ($sub == "admin_upload_ffb_production") {
        $open_detail = "admin_upload_ffb_production.php";
    } else if ($sub == "admin_upload_newplanting") {
        $open_detail = "admin_upload_newplanting.php";
    } else if ($sub == "admin_upload_replanting") {
        $open_detail = "admin_upload_replanting.php";
    } else if ($sub == "admin_upload_conversion") {
        $open_detail = "admin_upload_conversion.php";
    } else if ($sub == "upload_excel_mill") {
        $open_detail = "upload_excel_mill.php";
    } else if ($sub == "esub_comparison") {
        $open_detail = "costcomparison.php";
    }
} else if ($id == "cpo1_11") {
    $open = "palmoil.php";
    $open_detail = "cpo1_1.php";
} else if ($id == "cpo2_11") {
    $open = "palmoil.php";
    $open_detail = "cpo2_1.php";
} else if ($id == "cpo3_11") {
    $open = "palmoil.php";
    $open_detail = "cpo3_1.php";
} else if ($id == "cpo4_11") {
    $open = "palmoil.php";
    $open_detail = "cpo4_1.php";
} else if ($id == "forum") {
    $open = "profile-forum.php";
    $open_detail = "cpo4_1.php";
} else if ($id == "forumview") {
    $open = "../loginforum.php";
} else if ($id == "chat") {
    $open = "profile-chat.php";
    $open_detail = "cpo4_1.php";
} else if ($id == "forum1") {
    $open = "profile-forum1.php";
    $open_detail = "cpo4_1.php";
} else if ($id == "chat1") {
    $open = "profile-chat1.php";
    $open_detail = "cpo4_1.php";
} else if ($id == "sql") {
    $open = "run_sql.php";
    //$open_detail = "cpo4_1.php";
}

//end of admin menu
else {
    $open = "error.php";
}
error_reporting(0);
?>
