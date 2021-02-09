<?php
	$var[0] = $session_lesen;
	$var[1] = $_COOKIE['tahun_report'];

	$tahunsemasa = $_COOKIE['tahun_report'];

	$variable[0] = $_SESSION['lesen'];
	$keluasan = new user('keluasan',$variable);

	$value[0] = $session_lesen;
	$value[1] = $_COOKIE['tahun_report'];
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

<?php
	$con = connect();

	$lesen = $_SESSION['lesen'];

	$qblm1="SELECT * FROM tanam_baru09 tb1 WHERE tb1.lesen = '$lesen' LIMIT 1";
	$rblm1=mysqli_query($con, $qblm1);
	$totalblm1 = mysqli_num_rows($rblm1);

	$qblm11="SELECT * FROM tanam_baru08 tb2 WHERE tb2.lesen = '$lesen' LIMIT 1";
	$rblm11=mysqli_query($con, $qblm11);
	$totalblm11 = mysqli_num_rows($rblm11);

	$qblm111="SELECT * FROM tanam_baru07 tb3 WHERE tb3.lesen = '$lesen' LIMIT 1";
	$rblm111=mysqli_query($con, $qblm111);
	$totalblm111 = mysqli_num_rows($rblm111);

	$qblm2="SELECT * FROM tanam_semula09 ts1 WHERE ts1.lesen = '$lesen' LIMIT 1";
	$rblm2=mysqli_query($con, $qblm2);
	$totalblm2 = mysqli_num_rows($rblm2);

	$qblm22="SELECT * FROM tanam_semula08 ts2 WHERE ts2.lesen = '$lesen' LIMIT 1";
	$rblm22=mysqli_query($con, $qblm22);
	$totalblm22 = mysqli_num_rows($rblm22);

	$qblm222="SELECT * FROM tanam_semula07 ts3 WHERE ts3.lesen = '$lesen' LIMIT 1";
	$rblm222=mysqli_query($con, $qblm222);
	$totalblm222 = mysqli_num_rows($rblm222);

	$qblm3="SELECT * FROM tanam_tukar09 tt1 WHERE tt1.lesen = '$lesen' LIMIT 1";
	$rblm3=mysqli_query($con, $qblm3);
	$totalblm3 = mysqli_num_rows($rblm3);

	$qblm33="SELECT * FROM tanam_tukar08 tt2 WHERE tt2.lesen = '$lesen' LIMIT 1";
	$rblm33=mysqli_query($con, $qblm33);
	$totalblm33 = mysqli_num_rows($rblm33);

	$qblm333="SELECT * FROM tanam_tukar07 tt3 WHERE tt3.lesen = '$lesen' LIMIT 1";
	$rblm333=mysqli_query($con, $qblm333);
	$totalblm333 = mysqli_num_rows($rblm333);

	$baru = $totalblm1+$totalblm11+$totalblm111;
	$semula = $totalblm2+$totalblm22+$totalblm222;
	$tukar = $totalblm3+$totalblm33+$totalblm333;
?>

<div id="main">
	<img src="../images/Bcase.png" width="16" height="16" />&nbsp;&nbsp;
	<strong><?=setstring ( 'mal', 'KOS BELUM MATANG', 'en', 'IMMATURE COST'); ?></strong>
    <ul id="browser" class="filetree">
<!-- Penanaman Baru -->
<?php if ($baru>0) { ?>
<li><img src="../nav/folder.gif" /><strong><?=setstring ( 'mal', 'Penanaman Baru', 'en', 'New Planting'); ?></strong>
	<ul>
		<?php if ($totalblm1>0){ ?>
			<li><img src="../nav/file.gif" alt="open" />
				<?php
					$var[2] = 1;
					$var[3] = "Penanaman Baru";
					$pb= new user('penanaman_baru',$var);
					if($pb->total == 0 or $pb->status==0) { ?>
						<a  href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Baru">
						<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 1 </a>
						<img src="../images/warning_16.png" alt="dah" width="16" height="16" />
					<?php } else { ?>
						<a href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Baru">
						<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 1</a>
						<img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
					<?php } ?>
			</li>
		<?php } ?>

		<?php if($totalblm11>0){ ?>
            <li><img src="../nav/file.gif" alt="open" />
                <?php
					$var[2] = 2;
					$var[3] = "Penanaman Baru";
					$pb= new user('penanaman_baru',$var);
					if($pb->total == 0 or $pb->status==0) { ?>
						<a  href="home.php?id=belum_matang&amp;year=2&amp;t=Penanaman+Baru">
						<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 2 </a>
						<img src="../images/warning_16.png" alt="dah" width="16" height="16" />
					<?php } else { ?>
						<a href="home.php?id=belum_matang&amp;year=2&amp;t=Penanaman+Baru">
						<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 2 </a>
						<img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
					<?php } ?>
            </li>
		<?php } ?>

		<?php if($totalblm111>0){ ?>
            <li><img src="../nav/file.gif" alt="open" />
                <?php
					$var[2] = 3;
					$var[3] = "Penanaman Baru";
					$pb= new user('penanaman_baru',$var);
					if($pb->total == 0 or $pb->status==0) { ?>
						<a href="home.php?id=belum_matang&amp;year=3&amp;t=Penanaman+Baru">
						<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 3 </a>
						<img src="../images/warning_16.png" alt="dah" width="16" height="16" />
                <?php } else { ?>
					<a href="home.php?id=belum_matang&amp;year=3&amp;t=Penanaman+Baru">
					<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 3 </a>
					<img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
                <?php } ?>
            </li>
		<?php } ?>
	  </ul>
	</li>
<?php } ?>
<!-- Penanaman Semula -->
<?php if ($semula>0) { ?>
<li><img src="../nav/folder.gif" /><strong><?=setstring ( 'mal', 'Penanaman Semula', 'en', 'Replanting'); ?></strong>
	<ul>
		<?php if($totalblm2>0){ ?>
			<li><img src="../nav/file.gif" alt="open" />
				<a href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Semula"></a>
				<?php
					$var[2] = 1;
					$var[3] = "Penanaman Semula";
					$pb= new user('penanaman_baru',$var);
					if($pb->total == 0 or $pb->status==0) { ?>
						<a href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Semula">
						<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 1 </a>
						<img src="../images/warning_16.png" alt="dah" width="16" height="16" />
					<?php } else { ?>
						<a href="home.php?id=belum_matang&amp;year=1&amp;t=Penanaman+Semula">
						<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 1 </a>
						<img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
					<?php } ?>
			</li>
		<?php } ?>

		<?php if($totalblm22>0){ ?>
			<li><img src="../nav/file.gif" alt="s" />
				<a href="home.php?id=belum_matang&amp;year=2&amp;t=Penanaman+Semula"></a>
				<?php
					$var[2] = 2;
					$var[3] = "Penanaman Semula";
					$pb= new user('penanaman_baru',$var);
					if($pb->total == 0 or $pb->status==0) { ?>
						<a href="home.php?id=belum_matang&amp;year=2&amp;t=Penanaman+Semula">
						<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 2 </a>
						<img src="../images/warning_16.png" alt="dah" width="16" height="16" />
					<?php } else { ?>
						<a href="home.php?id=belum_matang&amp;year=2&amp;t=Penanaman+Semula">
						<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 2 </a>
						<img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
					<?php } ?>
			</li>
		<?php } ?>

		<?php if($totalblm222>0){ ?>
			<li><img src="../nav/file.gif" alt="s" />
				<a href="home.php?id=belum_matang&amp;year=3&amp;t=Penanaman+Semula"></a>
				<?php
					$var[2] = 3;
					$var[3] = "Penanaman Semula";
					$pb= new user('penanaman_baru',$var);
					if($pb->total == 0 or $pb->status==0) { ?>
						<a href="home.php?id=belum_matang&amp;year=3&amp;t=Penanaman+Semula">
						<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 3 </a>
						<img src="../images/warning_16.png" alt="dah" width="16" height="16" />
					<?php } else { ?>
						<a href="home.php?id=belum_matang&amp;year=3&amp;t=Penanaman+Semula">
						<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 3 </a>
						<img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
					<?php } ?>
			</li>
		<?php } ?>
    </ul>
</li>
<?php } ?>
<!-- Penukaran -->
<?php if ($tukar>0) { ?>
<li><img src="../nav/folder.gif" /><strong><?=setstring ( 'mal', ' Penukaran', 'en', ' Conversion'); ?></strong>
    <ul>
		<?php if($totalblm3>0){ ?>
            <li><img src="../nav/file.gif" alt="u" />
			<?php
				$var[2] = 1;
				$var[3] = "Penukaran";
				$pb= new user('penanaman_baru',$var);
				if($pb->total == 0 or $pb->status==0) { ?>
					<a href="home.php?id=belum_matang&amp;year=1&amp;t=Penukaran">
					<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 1 </a>
					<img src="../images/warning_16.png" alt="dah" width="16" height="16" />
				<?php } else { ?>
					<a href="home.php?id=belum_matang&amp;year=1&amp;t=Penukaran">
					<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 1 </a>
					<img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
			<?php } ?>
			</li>
		<?php } ?>

		<?php if($totalblm33>0){ ?>
		    <li><img src="../nav/file.gif" alt="u" />
			<?php
				$var[2] = 2;
				$var[3] = "Penukaran";
				$pb= new user('penanaman_baru',$var);
				if($pb->total == 0 or $pb->status==0) { ?>
					<a href="home.php?id=belum_matang&amp;year=2&amp;t=Penukaran">
					<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 2 </a>
					<img src="../images/warning_16.png" alt="dah" width="16" height="16" />
				<?php } else { ?>
					<a href="home.php?id=belum_matang&amp;year=2&amp;t=Penukaran">
					<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 2 </a>
					<img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
			<?php } ?>
			</li>
		<?php } ?>

		<?php if($totalblm333>0){ ?>
            <li><img src="../nav/file.gif" alt="s" />
			<?php
				$var[2] = 3;
				$var[3] = "Penukaran";
				$pb= new user('penanaman_baru',$var);
				if($pb->total == 0 or $pb->status==0) { ?>
					<a href="home.php?id=belum_matang&amp;year=3&amp;t=Penukaran">
					<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 3 </a>
					<img src="../images/warning_16.png" alt="dah" width="16" height="16" />
				<?php } else { ?>
					<a href="home.php?id=belum_matang&amp;year=3&amp;t=Penukaran">
					<?=setstring ( 'mal', 'Tahun', 'en', 'Year'); ?> 3 </a>
					<img src="../images/accepted_48.png" alt="dah" width="16" height="16" />
			<?php } ?>
            </li>
		<?php } ?>
    </ul>
</li>
<?php } ?>
</ul>
</div>
<?php
	if ($view =='first')
	{
		if($totalblm1>0){
		echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penanaman+Baru'</script>";
		}

		else if($totalblm11>0){
		echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penanaman+Baru'</script>";
		}

		else if($totalblm111>0){
		echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman+Baru'</script>";
		}

		else if($totalblm2>0){
		echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penanaman+Semula'</script>";
		}

		else if($totalblm22>0){
		echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penanaman+Semula'</script>";
		}

		else if($totalblm222>0){
		echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penanaman+Semula'</script>";
		}

		else if($totalblm3>0){
		echo "<script>window.location.href='home.php?id=belum_matang&year=1&t=Penukaran'</script>";
		}

		else if($totalblm33>0){
		echo "<script>window.location.href='home.php?id=belum_matang&year=2&t=Penukaran'</script>";
		}

		else if($totalblm333>0){
		echo "<script>window.location.href='home.php?id=belum_matang&year=3&t=Penukaran'</script>";
		}
	}
?>
