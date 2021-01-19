<?php



/*

 *  Filename: estate/index.php

 *  Copyright 2010 Malaysia Palm Oil Board <azman@mpob.gov.my>

 *	Last update: 15.10.2010 11:46:16 am

 * 	- added check to progress bar

 */


$var[0]					= $session_lesen;

$var[1]					= date('Y');



$var[2]					= "kos_belum_matang";

$kos_belum_matang 		= new user('survey',$var);

$var[2]					= "kos_matang_penjagaan";

$kos_matang_penjagaan 	= new user('survey',$var);

$var[2]					= "kos_matang_penuaian";

$kos_matang_penuaian 	= new user('survey',$var);

$var[2]					= "kos_matang_pengangkutan";

$kos_matang_pengangkutan = new user('survey',$var);



		$kbm 		= $kos_belum_matang->status;

		$kmjaga		= $kos_matang_penjagaan->status;

		$kmtuai		= $kos_matang_penuaian->status;

		$kmangkut	= $kos_matang_pengangkutan->status;



if(!$totalblm) {

	$bil_total_kos 	= 4;

	$percent_kos 	= (($kbm+$kmjaga+$kmtuai+$kmangkut)/$bil_total_kos)*100; 

	}

else {

	$bil_total_kos 	= 3;

	$percent_kos 	= (($kmjaga+$kmtuai+$kmangkut)/$bil_total_kos)*100; 

	}



	if(isset($_GET['firsttime'])) {

?>

<link type="text/css" href="../themes/base/ui.all.css" rel="stylesheet" />

<script type="text/javascript" src="../ui/ui.core.js"></script>

<script type="text/javascript" src="../ui/ui.draggable.js"></script>

<script type="text/javascript" src="../ui/ui.resizable.js"></script>

<script type="text/javascript" src="../ui/ui.dialog.js"></script>

<script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>



<script type="text/javascript">

	$(function() {

		$("#dialog_1").dialog( {

			autoOpen:true,

			modal:true

		});

	});

</script>



<div id="dialog_1">

	<p>

	 <?=setstring ( 'mal', 'Selamat Datang Ke Sistem E-COST Estet', 'en', 'Welcome to E-COST System for Estate'); ?>

	</p>

	<p><?=setstring ( 'mal', 'Sila Kemaskini Profil Anda Terlebih Dahulu', 'en', 'Please Update Your Profile'); ?></p>

</div>

<?php

	}

?>

<link type="text/css" href="../themes/base/ui.all.css" rel="stylesheet" />

<script type="text/javascript" src="../ui/ui.core.js"></script>

<script type="text/javascript" src="../ui/ui.draggable.js"></script>

<script type="text/javascript" src="../ui/ui.resizable.js"></script>

<script type="text/javascript" src="../ui/ui.dialog.js"></script>

<script type="text/javascript" src="../ui/ui.progressbar.js"></script>

<script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>

<script type="text/javascript">

	$(function() {

		$("#progress").progressbar({ 

			value:<?php $unpercent_kos = (100 - $percent_kos); echo number_format($unpercent_kos,2);?>

		});

	});

</script>

<p><strong><?=setstring ( 'mal', 'Selamat Datang', 'en', 'Welcome'); ?> <?= strtoupper($pengguna->namaestet);?></strong></p>



<table width="100%" border="0">

  <tr>

    <td width="49%" rowspan="4"><div style=" background-color: #ccc;

-moz-border-radius: 5px;

-webkit-border-radius: 5px;

border: 1px solid #000;

padding: 10px;">

      <table>

        <tr>

          <td><strong><img src="../folder.png" alt="aaa" width="100" height="100" /></strong></td>

          <td><ul>

              <li> <?=setstring ( 'mal', 'Login berjaya terakhir anda pada', 'en', 'Last success login on'); ?> 

                <?= $pengguna->success; ?>

              </li>

            <br />

              <li> <?=setstring ( 'mal', 'Login gagal terakhir anda pada', 'en', 'Last failed login on'); ?>

                <?= $pengguna->fail;  ?>

              </li>

            <br />

              <li><?=setstring ( 'mal', 'Sila klik pada menu di atas untuk navigasi.', 'en', 'Please click on the menu to navigate.'); ?></li>

          </ul></td>

        </tr>

      </table>

    </div></td>

  </tr>

</table>
