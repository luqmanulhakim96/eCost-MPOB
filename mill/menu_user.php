<div id="menu-user">
<!-- Menu -->

<script type="text/javascript">

	$(function() {
		<?php
			if(isset($_GET['finished'])) {
		?>
		$.fn.colorbox({
			<?php if(isset($_GET['ringkasan'])) {?>
			href:'ringkasan_end.php?page=mill',
			<?php } else {?>
			href:'po_end.php?page=mill',
			<?php } ?>
			open:true,
			width:"50%",
			height:"35%",
			iframe:false
		});

		<?php
			}
			if(isset($_GET['logging'])) {
		?>
		$.fn.colorbox({
			href:'welcome.php?page=mill',
			open:true,
			width:"50%",
			height:"35%",
			iframe:false
		});
		<?php
			}
			if(isset($_GET['mill'])) {
		?>
		$.fn.colorbox({
			href:'welcome.php?mill=true',
			open:true,
			width:"50%",
			height:"50%",
			iframe:false
		});
		<?php
			}
			// if(($_GET['id'] == 'home')or(eregi("^cpo",$_GET['id']))) {
			if(($_GET['id'] == 'home')or(preg_match("^cpo",$_GET['id']))) {

		?>
		$("#home_hover").show();
		$("#home_normal").hide();
		<?php
			}
			else {
		?>
		$("#home_hover")
		.hide()
		.css("cursor","pointer")
		.mouseout(function() {
			$("#home_normal").show();
			$("#home_hover").hide();
		})
		.click(function() {
			window.location="home.php?id=home";
		});
		$("#home_normal")
		.show()
		.mouseover(function() {
			$("#home_normal").hide();
			$("#home_hover").show();
		});
		<?php
			}
			// if(eregi("^print",$_GET['id'])) {
			if(preg_match("^print",$_GET['id'])) {

		?>
		$("#print_hover").show();
		$("#print_normal").hide();
		<?php
			}
			else {
		?>
		$("#print_hover")
		.hide()
		.css("cursor","pointer")
		.mouseout(function() {
			$("#print_normal").show();
			$("#print_hover").hide();
		})
		.click(function() {
			window.location="home.php?id=print_borang&print=true";
		});
		$("#print_normal")
		.show()
		.mouseover(function() {
			$("#print_normal").hide();
			$("#print_hover").show();
		});
		<?php
			}
			// if(eregi("^profile",$_GET['id']) or eregi("^view_message",$_GET['id']) or eregi("^compose",$_GET['id']) or eregi("^read",$_GET['id'])) {
			if(preg_match("^profile",$_GET['id']) or preg_match("^view_message",$_GET['id']) or preg_match("^compose",$_GET['id']) or preg_match("^read",$_GET['id'])) {

		?>
		$("#profile_hover").show();
		$("#profile_normal").hide();
		<?php
			}
			else {
		?>
		$("#profile_hover")
		.hide()
		.css("cursor","pointer")
		.mouseout(function() {
			$("#profile_normal").show();
			$("#profile_hover").hide();
		})
		.click(function() {
			window.location="home.php?id=profile";
		});
		$("#profile_normal")
		.show()
		.mouseover(function() {
			$("#profile_normal").hide();
			$("#profile_hover").show();
		});
		<?php
			}
			if($_GET['id'] == 'bantuan') {
		?>
		$("#bantuan_hover").show();
		$("#bantuan_normal").hide();
		<?php
			}
			else {
		?>
		$("#bantuan_hover")
		.hide()
		.css("cursor","pointer")
		.mouseout(function() {
			$("#bantuan_normal").show();
			$("#bantuan_hover").hide();
		})
		.click(function() {
			window.location="home.php?id=bantuan";
		});
		$("#bantuan_normal")
		.show()
		.mouseover(function() {
			$("#bantuan_normal").hide();
			$("#bantuan_hover").show();
		});
		<?php
			}
			if($_GET['id'] == 'forum') {
		?>
		$("#pertanyaan_hover").show();
		$("#pertanyaan_normal").hide();
		<?php
			}
			else {
		?>
		$("#pertanyaan_hover")
		.hide()
		.css("cursor","pointer")
		.mouseout(function() {
			$("#pertanyaan_normal").show();
			$("#pertanyaan_hover").hide();
		})
		.click(function() {
			window.location="home.php?id=forum";
		});
		$("#pertanyaan_normal")
		.show()
		.mouseover(function() {
			$("#pertanyaan_normal").hide();
			$("#pertanyaan_hover").show();
		});
		<?php
			}
			if($_GET['id'] == 'kos_proses') {
		?>
		$("#kos_proses_hover").show();
		$("#kos_proses_normal").hide();
		<?php
			}
			else {
		?>
		$("#kos_proses_hover")
		.hide()
		.css("cursor","pointer")
		.mouseout(function() {
			$("#kos_proses_normal").show();
			$("#kos_proses_hover").hide();
		})
		.click(function() {
			window.location="home.php?id=kos_proses";
		});
		$("#kos_proses_normal")
		.show()
		.mouseover(function() {
			$("#kos_proses_normal").hide();
			$("#kos_proses_hover").show();
		});
		<?php
			}
			if($_GET['id'] == 'kos_lain') {
		?>
		$("#kos_lain_hover").show();
		$("#kos_lain_normal").hide();
		<?php
			}
			else {
		?>
		$("#kos_lain_hover")
		.hide()
		.css("cursor","pointer")
		.mouseout(function() {
			$("#kos_lain_normal").show();
			$("#kos_lain_hover").hide();
		})
		.click(function() {
			window.location="home.php?id=kos_lain";
		});
		$("#kos_lain_normal")
		.show()
		.mouseover(function() {
			$("#kos_lain_normal").hide();
			$("#kos_lain_hover").show();
		});
		<?php
			}
			if($_GET['id'] == 'ringkasan_mill') {
		?>
		$("#ringkasan_hover").show();
		$("#ringkasan_normal").hide();
		<?php
			}
			else {
		?>
		$("#ringkasan_hover")
		.hide()
		.css("cursor","pointer")
		.mouseout(function() {
			$("#ringkasan_normal").show();
			$("#ringkasan_hover").hide();
		})
		.click(function() {
			window.location="home.php?id=ringkasan_mill";
		});
		$("#ringkasan_normal")
		.show()
		.mouseover(function() {
			$("#ringkasan_normal").hide();
			$("#ringkasan_hover").show();
		});
		<?php
			}
			if($_GET['id'] == 'buruh_mill') {
		?>
		$("#buruh_hover").show();
		$("#buruh_normal").hide();
		<?php
			}
			else {
		?>
		$("#buruh_hover")
		.hide()
		.css("cursor","pointer")
		.mouseout(function() {
			$("#buruh_normal").show();
			$("#buruh_hover").hide();
		})
		.click(function() {
			window.location="home.php?id=buruh_mill";
		});
		$("#buruh_normal")
		.show()
		.mouseover(function() {
			$("#buruh_normal").hide();
			$("#buruh_hover").show();
		});
		<?php
			}
		?>
	});
</script>

<?php if($_COOKIE['lang']=='mal'){?>
<img src="../nav/hm2.png" name="home_normal" width="140" height="24" border="0" id="home_normal" />
<img src="../nav/hm1.png" name="home_hover" width="140" height="24" border="0" id="home_hover" />

<img src="../nav/profil_kilang_normal.png" name="profile_normal" width="140" height="24" border="0" id="profile_normal" />
<img src="../nav/profil_kilang_hover.png" name="profile_hover" width="140" height="24" border="0" id="profile_hover" />

<img src="../nav/kos_proses_normal.png" alt="kos_proses_normal" id="kos_proses_normal" width="140" height="24">
<img src="../nav/kos_proses_hover.png" alt="kos_proses_hover" id="kos_proses_hover" width="140" height="24">

<img src="../nav/kos_lain_normal.png" alt="kos lain" width="140" height="24" id="kos_lain_normal">
<img id="kos_lain_hover" src="../nav/kos_lain_hover.png" alt="kos kos lain" width="140" height="24">
<!--
<img src="../nav/buruh_normal.png" id="buruh_normal" width="140" height="24">
<img src="../nav/buruh_hover.png" width="140" height="24" id="buruh_hover">
-->
<img id="ringkasan_normal" src="../nav/ringkasan_normal.png" alt="ringkasan" width="140" height="24">
<img src="../nav/ringkasan_hover.png" id="ringkasan_hover" alt="ringkasan" width="140" height="24">
<?php } ?>

<?php if($_COOKIE['lang']=='en'){?>
<img src="../nav/en/hm2.png" name="home_normal" width="140" height="24" border="0" id="home_normal" />
<img src="../nav/en/hm1.png" name="home_hover" width="140" height="24" border="0" id="home_hover" />

<img src="../nav/en/profil_kilang_normal1.png" name="profile_normal" width="140" height="24" border="0" id="profile_normal" />
<img src="../nav/en/profil_kilang_hover1.png" name="profile_hover" width="140" height="24" border="0" id="profile_hover" />

<img src="../nav/en/kos_proses_normal1.png" alt="kos_proses_normal" id="kos_proses_normal" width="140" height="24">
<img src="../nav/en/kos_proses_hover1.png" alt="kos_proses_hover" id="kos_proses_hover" width="140" height="24">

<img src="../nav/en/kos_lain_normal1.png" alt="kos lain" width="140" height="24" id="kos_lain_normal">
<img id="kos_lain_hover" src="../nav/en/kos_lain_hover1.png" alt="kos kos lain" width="140" height="24">

<!--<img src="../nav/en/buruh_normal1.png" id="buruh_normal" width="140" height="24">
<img src="../nav/en/buruh_hover1.png" width="140" height="24" id="buruh_hover">-->

<img id="ringkasan_normal" src="../nav/en/cost_summary_normal1.png" alt="ringkasan" width="140" height="24">
<img src="../nav/en/cost_summary_hover1.png" id="ringkasan_hover" alt="ringkasan" width="140" height="24">


<?php } ?>

</div>
