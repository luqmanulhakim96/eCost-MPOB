<style>
#menu{
		background:#0826b7;
		font-size:12px;
		height:30px;
		line-height:30px;
		text-align:left;
	}
	
#menu li{ display:inline; }
#menu a{
		color:#fff;
		margin:0 10px;
	}

#menu a:hover{
		color:#d9003d;
		background:#ffa300;
		margin:0 10px;
	}
#menu a.current{
		background:#ffa300;
		color:#fff;
	}

</style>
<!-- Menu -->


<script type="text/javascript">
	$(document).ready(function() {
	
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
			height:"50%", 
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
			if(($_GET['id'] == 'home')or(eregi("^po",$_GET['id']))) {
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
			if(eregi("^print",$_GET['id'])) {
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
			if(eregi("^profile",$_GET['id']) or eregi("^view_message",$_GET['id']) or eregi("^compose",$_GET['id']) or eregi("^read",$_GET['id'])) {
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
			if($_GET['id'] == 'buruh') {
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
			window.location="home.php?id=buruh";
		});
		$("#buruh_normal")
		.show()
		.mouseover(function() {
			$("#buruh_normal").hide();
			$("#buruh_hover").show();
		});
		<?php
			}
			if($_GET['id'] == 'belum_matang&view=first') {
		?>
		$("#belum_matang_hover").show();
		$("#belum_matang_normal").hide();
		<?php
			}
			else {
		?>
		$("#belum_matang_hover")
		.hide()
		.css("cursor","pointer")
		.mouseout(function() {
			$("#belum_matang_normal").show();
			$("#belum_matang_hover").hide();
		})
		.click(function() {
			window.location="home.php?id=belum_matang&view=first";
		});
		$("#belum_matang_normal")
		.show()
		.mouseover(function() {
			$("#belum_matang_normal").hide();
			$("#belum_matang_hover").show();
		});
		<?php
			}
			if($_GET['id'] == 'matang') {
		?>
		$("#matang_hover").show();
		$("#matang_normal").hide();
		<?php
			}
			else {
		?>
		$("#matang_hover")
		.hide()
		.css("cursor","pointer")
		.mouseout(function() {
			$("#matang_normal").show();
			$("#matang_hover").hide();
		})
		.click(function() {
			window.location="home.php?id=matang&penjagaan";
		});
		$("#matang_normal")
		.show()
		.mouseover(function() {
			$("#matang_normal").hide();
			$("#matang_hover").show();
		});
		<?php
			}
			if($_GET['id'] == 'umum') {
		?>
		$("#umum_hover").show();
		$("#umum_normal").hide();
		<?php
			}
			else {
		?>
		$("#umum_hover")
		.hide()
		.css("cursor","pointer")
		.mouseout(function() {
			$("#umum_normal").show();
			$("#umum_hover").hide();
		})
		.click(function() {
			window.location="home.php?id=umum";
		});
		$("#umum_normal")
		.show()
		.mouseover(function() {
			$("#umum_normal").hide();
			$("#umum_hover").show();
		});
		<?php
			}
			if($_GET['id'] == 'ringkasan') {
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
			window.location="home.php?id=ringkasan";
		});
		$("#ringkasan_normal")
		.show()
		.mouseover(function() {
			$("#ringkasan_normal").hide();
			$("#ringkasan_hover").show();
		});
		<?php
			}
		?>
	});
</script>

<?php if($_COOKIE['lang']=="mal"){?>
<div id="menu-other">
<img src="../nav/hm2.png" name="home_normal" width="140" height="24" border="0" id="home_normal" /><img src="../nav/hm1.png" name="home_hover" width="140" height="24" border="0" id="home_hover" /><img src="../nav/profil1.png" name="profile_normal" width="140" height="24" border="0" id="profile_normal" /><img src="../nav/profil2.png" name="profile_hover" width="140" height="24" border="0" id="profile_hover" /><img src="../nav/belum_matang_normal.png" name="belum_matang_normal" width="140" height="24" id="belum_matang_normal" /><img src="../nav/belum_matang_hover.png" name="belum_matang_hover" width="140" height="24" id="belum_matang_hover" /><img src="../nav/matang_normal.png" name="matang_normal" width="140" height="24" id="matang_normal" /><img src="../nav/matang_hover.png" name="matang_hover" width="140" height="24" id="matang_hover" /><img src="../nav/umum_normal.png" name="umum_normal" width="140" height="24" id="umum_normal" /><img src="../nav/umum_hover.png" name="umum_hover" width="140" height="24" id="umum_hover" /><img src="../nav/buruh_meka_normal.png" name="buruh_normal" width="140" height="24" id="buruh_normal" /><img src="../nav/buruh_meka_hover.png" name="buruh_hover" width="140" height="24" id="buruh_hover" /><img src="../nav/ringkasan_normal.png" name="ringkasan_normal" width="140" height="24" id="ringkasan_normal" /><img src="../nav/ringkasan_hover.png" alt="" name="ringkasan_hover" width="140" height="24" id="ringkasan_hover" />
</div>
<?php } ?>
<?php if($_COOKIE['lang']=="en"){?>
<div id="menu-other">
<img src="../nav/en/hm2.png" name="home_normal" width="140" height="24" border="0" id="home_normal" />
<img src="../nav/en/hm1.png" name="home_hover" width="140" height="24" border="0" id="home_hover" />

<img src="../nav/en/profil1.png" name="profile_normal" width="140" height="24" border="0" id="profile_normal" />
<img src="../nav/en/profil2.png" name="profile_hover" width="140" height="24" border="0" id="profile_hover" />

<img src="../nav/en/belum_matang_normal.png" name="belum_matang_normal" width="140" height="24" id="belum_matang_normal" />
<img src="../nav/en/belum_matang_hover.png" name="belum_matang_hover" width="140" height="24" id="belum_matang_hover" />

<img src="../nav/en/matang_normal.png" name="matang_normal" width="140" height="24" id="matang_normal" />
<img src="../nav/en/matang_hover.png" name="matang_hover" width="140" height="24" id="matang_hover" />


<img src="../nav/en/umum_normal.png" name="umum_normal" width="140" height="24" id="umum_normal" />
<img src="../nav/en/umum_hover.png" name="umum_hover" width="140" height="24" id="umum_hover" />

<img src="../nav/en/labour_normal.png" name="buruh_normal"  height="24" id="buruh_normal" />
<img src="../nav/en/labour_hover.png" name="buruh_hover"  height="24" id="buruh_hover" />

<img src="../nav/en/summary_normal.png" name="ringkasan_normal" width="140" height="24" id="ringkasan_normal" />
<img src="../nav/en/summary_hover.png" alt="" name="ringkasan_hover" width="140" height="24" id="ringkasan_hover" />
</div>
<?php } ?>