<?php
	$var[0] = $session_lesen; 
	$var[1] = date('Y');

	$tahunsemasa = date('Y');

	$variable[0] = $_SESSION['lesen'];
	$keluasan = new user('keluasan',$variable);

	$value[0] = $session_lesen; 
	$value[1] = date('Y');
	$value[2] = $year;
	$value[3] = $t; 

	$nilai = new user('penanaman_baru',$value);

	$tanamvar[0] = $session_lesen; 

?>
	
	<link rel="stylesheet" href="../css/jquery.treeview.css" />
	<link rel="stylesheet" href="../css/screen.css" />
	
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/jquery.cookie.js" type="text/javascript"></script>
	<script src="../js/jquery.treeview.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function() {
			$("#browser").treeview({
				animated: "slow",
				collapsed: false
			});
		});
		/*
		function hantar() {
			window.location.href = "home.php?id=belum_matang&year=<?php
			if($_GET['year'] != 3) {
				echo ($_GET['year'] + 1)."&t=".$_GET['t'];
			}
			else {
				if($_GET['t'] == "Penanaman Baru")
					echo "1&t=Penanaman+Semula";
				else if($_GET['t'] == "Penanaman Semula")
					echo "1&t=Penukaran";
				else
					echo "1&t=Penanaman+Baru";
			}
			 ?>";
		}
		*/
		function next(url) {
			ok = confirm("Anda pasti untuk menukar halaman?");
			return ok;
		}
	</script>
	

	
	<div id="main">

    <strong><img src="../images/Bcase.png" width="16" height="16" />&nbsp;&nbsp;<?=setstring ( 'mal', 'KOS BELUM MATANG', 'en', 'IMMATURE COST'); ?></strong>
    <ul id="browser" class="filetree">
    <?php 
		//$tanambaru = $tanambaru1->total+$tanambaru2->total+$tanambaru3->total;
	?>
   
   
<li><img src="../nav/folder.gif" />
			<strong><?=setstring ( 'mal', 'Penanaman Baru', 'en', 'New Planting'); ?></strong>
			<ul>
			
			<?php 
			echo $tahunvar = date('y')-1;
			$tanamvar[1] = "tanam_baru".'0'.$tahunvar;
			$tanambaru = new user('tanaman', $tanamvar);
			
			if($tanambaru->total!=0){
			?>
			  <li><img src="../nav/file.gif" /><?php $var[2] = 1;$var[3] = "Penanaman Baru";$pb= new user('penanaman_baru',$var);if($pb->total == 0 or $pb->status==0) { ?><a  href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Baru"><?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 1 </a><img src="../images/warning_16.png" alt="dah" width="16" height="16" /><?php } else { ?><a href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Baru"> <?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 1</a> <img src="../images/accepted_48.png" alt="dah" width="16" height="16" /><?php } ?></li>
			  <?php } ?>
			  
			  
			  <?php 
			$tahunvar = date('y')-2;
			$tanamvar[1] = "tanam_baru".'0'.$tahunvar;
			$tanambaru = new user('tanaman', $tanamvar);
			
			if($tanambaru->total!=0){
			?>
              <li><img src="../nav/file.gif" alt="" /> 
                <?php $var[2] = 2;$var[3] = "Penanaman Baru";$pb= new user('penanaman_baru',$var);if($pb->total == 0 or $pb->status==0) { ?>
                <a  href="home.php?id=belum_matang&amp;year=2&amp;t=Penanaman+Baru"><?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 2 </a><img src="../images/warning_16.png" alt="dah" width="16" height="16" />
                <?php } else { ?><a href="home.php?id=belum_matang&amp;year=2&amp;t=Penanaman+Baru"> <?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 2 </a>
                <img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
                <?php } ?>
              </li>
			  <?php } ?>
			  
			  
			  <?php 
			$tahunvar = date('y')-3;
			$tanamvar[1] = "tanam_baru".'0'.$tahunvar;
			$tanambaru = new user('tanaman', $tanamvar);
			
			if($tanambaru->total!=0){
			?>
              <li><img src="../nav/file.gif" alt="" /> 
                <?php $var[2] = 3;$var[3] = "Penanaman Baru";$pb= new user('penanaman_baru',$var);if($pb->total == 0 or $pb->status==0) { ?>
                <a  href="home.php?id=belum_matang&amp;year=3&amp;t=Penanaman+Baru"><?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 3 </a><img src="../images/warning_16.png" alt="dah" width="16" height="16" />
                <?php } else { ?><a href="home.php?id=belum_matang&amp;year=3&amp;t=Penanaman+Baru"> <?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 3</a>
                <img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
                <?php } ?>
              </li>
			  <?php } ?>
			  
	  </ul>
	</li>

<li class="filetree"><img src="../nav/folder.gif" />
      <strong><?=setstring ( 'mal', 'Penanaman Semula', 'en', 'Replanting'); ?></strong><ul>
        
		<?php 
			$tahunvar = date('y')-1;
			$tanamvar[1] = "tanam_semula".'0'.$tahunvar;
			$tanambaru = new user('tanaman', $tanamvar);
			
			if($tanambaru->total!=0){
			?>
		<li><img src="../nav/file.gif" alt="" /> <a  href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Semula"></a>
          <?php $var[2] = 1;$var[3] = "Penanaman Semula";$pb= new user('penanaman_baru',$var);if($pb->total == 0 or $pb->status==0) { ?>
          <a  href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Semula"> <?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 1</a>          <img src="../images/warning_16.png" alt="dah" width="16" height="16" />
          <?php } else { ?><a href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Semula"> <?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 1 </a>
          <img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
          <?php } ?>
        </li>
		<?php } ?>
		
		
		<?php 
			$tahunvar = date('y')-2;
			$tanamvar[1] = "tanam_semula".'0'.$tahunvar;
			$tanambaru = new user('tanaman', $tanamvar);
			if($tanambaru->total!=0){
			?>
        <li><img src="../nav/file.gif" alt="s" /> <a  href="home.php?id=belum_matang&amp;year=2&amp;t=Penanaman+Semula"></a>
          <?php $var[2] = 2;$var[3] = "Penanaman Semula";$pb= new user('penanaman_baru',$var);if($pb->total == 0 or $pb->status==0) { ?>
          <a  href="home.php?id=belum_matang&amp;year=2&amp;t=Penanaman+Semula"><?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 2</a>          <img src="../images/warning_16.png" alt="dah" width="16" height="16" />
          <?php } else { ?><a href="home.php?id=belum_matang&amp;year=2&amp;t=Penanaman+Semula"> <?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 2</a>
          <img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
          <?php } ?>
        </li>
		<?php } ?>
		
		
		
		<?php 
			$tahunvar = date('y')-1;
			$tanamvar[1] = "tanam_semula".'0'.$tahunvar;
			$tanambaru = new user('tanaman', $tanamvar);
			if($tanambaru->total!=0){
			?>
        <li><img src="../nav/file.gif" alt="s" /> <a  href="home.php?id=belum_matang&amp;year=3&amp;t=Penanaman+Semula"></a>
          <?php $var[2] = 3;$var[3] = "Penanaman Semula";$pb= new user('penanaman_baru',$var);if($pb->total == 0 or $pb->status==0) { ?>
          <a  href="home.php?id=belum_matang&amp;year=3&amp;t=Penanaman+Semula"><?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 3</a>          <img src="../images/warning_16.png" alt="dah" width="16" height="16" />
          <?php } else { ?><a href="home.php?id=belum_matang&amp;year=3&amp;t=Penanaman+Semula"> <?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 3</a>
          <img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
          <?php } ?>
        </li>
		<?php } ?>
		
      </ul>
	  </li>
      <li class="filetree"><img src="../nav/folder.gif" /><strong><?=setstring ( 'mal', ' Penukaran', 'en', ' Conversion'); ?></strong>
      	<ul>
		
		<?php 
			$tahunvar = date('y')-1;
			$tanamvar[1] = "tanam_tukar".'0'.$tahunvar;
			$tanambaru = new user('tanaman', $tanamvar);
			if($tanambaru->total!=0){
			?>
            <li><img src="../nav/file.gif" alt="" /> 
              <?php $var[2] = 1;$var[3] = "Penukaran";$pb= new user('penanaman_baru',$var);if($pb->total == 0 or $pb->status==0) { ?>
              <a  href="home.php?id=belum_matang&amp;year=1&amp;t=Penukaran"><?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 1 </a><img src="../images/warning_16.png" alt="dah" width="16" height="16" />
              <?php } else { ?>
              <a href="home.php?id=belum_matang&amp;year=1&amp;t=Penukaran"> <?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 1</a>
              <img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
              <?php } ?>
            </li>
			<?php } ?>
			
			<?php 
			$tahunvar = date('y')-2;
			$tanamvar[1] = "tanam_tukar".'0'.$tahunvar;
			$tanambaru = new user('tanaman', $tanamvar);
			if($tanambaru->total!=0){
			?>
		    <li><img src="../nav/file.gif" alt="" /> 
		     <?php $var[2] = 2;$var[3] = "Penukaran";$pb= new user('penanaman_baru',$var);if($pb->total == 0 or $pb->status==0) { ?>
			  <a  href="home.php?id=belum_matang&amp;year=2&amp;t=Penukaran"> <?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 2</a>
		      <img src="../images/warning_16.png" alt="dah" width="16" height="16" />
		      <?php } else { ?>
              <a href="home.php?id=belum_matang&amp;year=2&amp;t=Penukaran"><?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 2</a>
              <img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
              <?php } ?>
		    </li>
			<?php } ?>
			
			
			<?php 
			$tahunvar = date('y')-3;
			$tanamvar[1] = "tanam_tukar".'0'.$tahunvar;
			$tanambaru = new user('tanaman', $tanamvar);
			if($tanambaru->total!=0){
			?>
            <li><img src="../nav/file.gif" alt="s" /> 
             <?php $var[2] = 3;$var[3] = "Penukaran";$pb= new user('penanaman_baru',$var);if($pb->total == 0 or $pb->status==0) { ?>
			  <a  href="home.php?id=belum_matang&amp;year=3&amp;t=Penukaran"> <?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 3</a>
              <img src="../images/warning_16.png" alt="dah" width="16" height="16" />
              <?php } else { ?>
              <a href="home.php?id=belum_matang&amp;year=3&amp;t=Penukaran"><?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 3</a>
              <img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
              <?php } ?>
            </li>
			<?php } ?>
			
      	</ul>
      </li>
  </ul>
</div>
