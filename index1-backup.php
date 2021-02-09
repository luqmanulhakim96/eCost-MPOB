<?php
/* session_start();
  session_destroy();
  extract($_REQUEST);
  error_reporting(0); */

include('Connections/connection.class.php');
include('setstring.inc');
include('class/user.class.php');
if ($_COOKIE['lang'] == '') {
    $value = 'mal';
    setcookie("lang", $value);
    echo "<script>window.location.href='index1.php'</script>";
}

$tarikhestet[0] = "estate";
$tarikhestet[1] = date('Y-m-d');

$tarikhmill[0] = "mill";
$tarikhmill[1] = date('Y-m-d');

$p_estet = new user("period_open", $tarikhestet);
$p_mill = new user("period_open", $tarikhmill);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistem e-COST | Welcome to e-COST System</title>
        <script type="text/javascript" src="jquery-1.3.2.js"></script>
        <script src="BrowserCompatible.js?opt=yes&enc=utf-8" type="text/javascript"></script>
        <script type="text/javascript">
            BrowserCompatible.compatibleBrowsers = {
                "Firefox": 3,
                "Safari": 525.17,
                "Flock": 1.1,
                "Opera": 9.25,
                "Chrome": 1
            };
            BrowserCompatible.offeredBrowsers = [
                "Firefox"
            ];
            BrowserCompatible.check();
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#img3")
                        .css("cursor", "pointer")
                        .mouseover(function () {
                            $("#img3").hide();
                            $("#img4").show();
                        });

                $("#img4")
                        .hide()
                        .css("cursor", "pointer")
                        .mouseout(function () {
                            $("#img4").hide();
                            $("#img3").show();
                        })


                        .click(function () {//bm
<?php if ($p_estet->total > 0) { ?>
                                window.location = "estate/home.php?id=login&welcome=true";
<?php } ?>
<?php if ($p_estet->total == 0) { ?>
                                //window.location = "estate/home.php?id=login&accessing=true";
                                alert("Tempoh kemasukan borang kaji selidik telah tamat. Sila rujuk admin untuk maklumat lanjut.");
<?php } ?>
                        });

                $("#img7")
                        .css("cursor", "pointer")
                        .mouseover(function () {
                            $("#img7").hide();
                            $("#img8").show();
                        });

                $("#img8")
                        .hide()
                        .css("cursor", "pointer")
                        .mouseout(function () {
                            $("#img8").hide();
                            $("#img7").show();
                        })


                        .click(function () {//bi
<?php if ($p_estet->total > 0) { ?>
                                window.location = "estate/home.php?id=login&welcome=true";
<?php } ?>
<?php if ($p_estet->total == 0) { ?>
                                //window.location = "estate/home.php?id=login&accessing=true";
                                alert("Survey entry period expired. Please consult the admin for more information.");

<?php } ?>
                        });

                $("#img5")
                        .css("cursor", "pointer")
                        .mouseover(function () {
                            $("#img5").hide();
                            $("#img6").show();
                        });

                $("#img6")
                        .hide()
                        .css("cursor", "pointer")
                        .mouseout(function () {
                            $("#img6").hide();
                            $("#img5").show();
                        })


                        .click(function () {
<?php if ($p_mill->total > 0) { ?>
                                window.location = "estate/home.php?id=profil&welcome=true&mill=true";
<?php } ?>
<?php if ($p_mill->total == 0) { ?>
                                //window.location = "estate/home.php?id=profil&accessing=true";
                                alert("Tempoh kemasukan borang kaji selidik telah tamat. Sila rujuk admin untuk maklumat lanjut.");


<?php } ?>
                        });

                $("#img9")
                        .css("cursor", "pointer")
                        .mouseover(function () {
                            $("#img9").hide();
                            $("#img10").show();
                        });

                $("#img10")
                        .hide()
                        .css("cursor", "pointer")
                        .mouseout(function () {
                            $("#img10").hide();
                            $("#img9").show();
                        })


                        .click(function () {//english
<?php if ($p_mill->total > 0) { ?>
                                window.location = "estate/home.php?id=profil&welcome=true&mill=true";
<?php } ?>
<?php if ($p_mill->total == 0) { ?>
                                window.location = "estate/home.php?id=profil&accessing=true";
                                alert("Survey entry period expired. Please consult the admin for more information.");

<?php } ?>
                        });



                $("#bahasa")
                        .click(function () {
                            //$("#bi_tujuan").hide('slow');
                            //$("#akta_bi").hide("slow");
                            //$("#quote_bi").hide('slow');
                            //$("#p_bi").hide('slow');
                            //$("#tajuk_bi").hide('slow');
                            $("#bi_picture").hide('slow');

                            //$("#bm_tujuan").show('slow');
                            //$("#akta_bm").show("slow");
                            //$("#quote_bm").show('slow');
                            //$("#p_bm").show("slow");
                            //$("#tajuk_bm").show('slow');
                            $("#bm_picture").show('slow');
                        });

                $("#english")
                        .click(function () {
                            //$("#bm_tujuan").hide('slow');
                            //$("#akta_bm").hide('slow');
                            //$("#quote_bm").hide('slow');
                            //$("#p_bm").hide('slow');
                            //$("#tajuk_bm").hide('slow');
                            $("#bm_picture").hide('slow');

                            //$("#bi_tujuan").show('slow');
                            //$("#akta_bi").show("slow");
                            //$("#quote_bi").show('slow');
                            //$('#p_bi').show('slow');
                            //$("#tajuk_bi").show('slow');
                            $("#bi_picture").show('slow');
                        });

<?php if ($_COOKIE["lang"] == "en") { ?>
                    $("#bm_picture").hide('slow');
                    $("#bi_picture").show('slow');
    <?php
}
if ($_COOKIE["lang"] == "mal") {
    ?>
                    $("#bi_picture").hide('slow');
                    $("#bm_picture").show('slow');
<?php } ?>
            });
        </script>
        <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
        <link rel="shortcut icon" href="images/icon.ico" />

        <style type="text/css">
            <!--
            .style6 {font-size: 11px; font-family: Arial, Helvetica, sans-serif; color: #666666; }
            .style7 {
                font-family: Arial, Helvetica, sans-serif;
                font-weight: bold;
            }
            .style8 {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 13px;
            }
            .style9 {font-family: Arial, Helvetica, sans-serif}
            .style11 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
            -->
        </style>

        <style type="text/css">
            <!--
            .style12 {
                color: #FF0000;
                font-weight: bold;
            }
            -->
        </style>
    </head>



    <style type="text/css">

        /* styles for error box */
        .error {
            background:#FBE3E4;
            color:#8a1f11;
            border-color:#FBC2C4;
            padding:20px;
            border:dashed 2px red;
            width:90%;
            margin:0px auto;
            font-family:Arial, Arial, Helvetica, sans-serif;
            font-size:1em;
            line-height:1.3em;
        }

        .error a, .error a:hover{
            color:#8a1f11;
        }

        /* simply moves close box to right */
        .kickRight {
            text-align:right;
        }
    </style>
    <?php
//**************************************//
//										//
//	Graceful IE6 Detect Advise w/jQuery	//
//		by: Joe Watkins					//
//		http://www.thatgrafix.com		//
//										//
//**************************************//
// IE6 string from user_agent
    $ie6 = "MSIE 6.0";

// detect browser
    $browser = $_SERVER['HTTP_USER_AGENT'];

// yank the version from the string
    $browser = substr("$browser", 25, 8);

// html for error
    $error = "<div class=\"error\" id=\"error\"><strong>Alert:</strong> It appears that you are using an out dated web browser Internet Explorer 6.  While you may still visit this website we encourage you to upgrade your web browser so you can enjoy all the rich features this website offers as well as other websites. Follow this link to <a href=\"http://www.microsoft.com/windows/downloads/ie/getitnow.mspx\"><strong>Upgrade your Internet Explorer</strong></a><br /></div>";

// if IE6 set the $alert
    if ($browser == $ie6) {
        $alert = TRUE;
    }
    ?>

    <body >
        <!--<body>-->
        <?php
        if ($alert) {
            echo $error;
        }
        ?>
        <div id="google_translate_element"></div>
        <br />
        <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="2" align="left">

                    <span class="style7" id="tajuk_bm">
                        <?php echo setstring('mal', 'Selamat Datang ke Sistem e-COST', 'en', 'Welcome to e-COST System'); ?>
                    </span>    </td>
            </tr>
            <tr>
                <td colspan="2" align="left"> </td>
            </tr>
            <tr>
                <td colspan="2" align="left"></td>
            </tr>
            <tr>
                <td align="left"><a href="index1.php"><img src="logo.png" width="179" height="61" border="0" /></a></td>
                <td align="left"><div align="right">
                        <script type="text/javascript">
            AC_FL_RunContent('codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0', 'width', '118', 'height', '87', 'src', 'logo', 'quality', 'high', 'pluginspage', 'http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash', 'movie', 'logo'); //end AC code
                        </script>
                        <noscript>
                            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="118" height="87">
                                <param name="movie" value="logo.swf" />
                                <param name="quality" value="high" />
                                <embed src="logo.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="118" height="87"></embed>
                            </object>
                        </noscript>
                    </div></td>
            </tr>

            <tr>
                <td colspan="2" align="right"><span class="style6">Malaysian Palm Oil Board</span></td>
            </tr>
            <tr>
                <td align="right" class="style6"><div align="left"><a href="admin/"></a></div></td>
                <td align="right" class="style6"><div align="right"><span style="cursor:pointer; color:#000099" id="bahasa"><a href="index1.php?lang=mal"><img src="images/ms.gif" width="73" height="19" border="0" /></a></span>  <span id="english" style="cursor:pointer; color:#990033"><a href="index1.php?lang=en"><img src="images/en.gif" width="73" height="19" border="0" /></a></span></div></td>
            </tr>

            <tr>
                <td colspan="2" background="images/line.png" height="7px"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><div align="left"><a href="admin/" class="style6">Admin Login    <?php echo setstring('mal', 'Untuk MPOB sahaja', 'en', 'Only for MPOB.'); ?></a></div></td>
            </tr>
            <tr>
                <td width="376"> </td>
                <td width="424"> </td>
            </tr>
            <?php echo setstring('mal', '<td width="376" align="center"><img src="images/estet_normal.png" name="Image3" width="275" height="139" border="0" id="img3" /><img src="images/estet_hover.png" alt="ecost-estate" width="275" height="139" id="img4" /></td>
    <td width="424" align="center"><img src="images/kilang_normal.png" name="Image4" width="275" height="139" border="0" id="img5" /><img src="images/kilang_hover.png" width="275" height="139" border="0" alt="ecost-kilang" id="img6" /></td>', 'en', '<td width="376" align="center"><img src="images/estate_m1.png" name="Image3" width="275" height="139" border="0" id="img7" /><img src="images/estate_mo.png" alt="ecost-estate" width="275" height="139" id="img8" /></td>
    <td width="424" align="center"><img src="images/mill_m1.png" name="Image4" width="275" height="139" border="0" id="img9" /><img src="images/mill_mo.png" width="275" height="139" border="0" alt="ecost-kilang" id="img10" /></td>'); ?>

            <tr>
                <td colspan="2"><p class="style8" id="bm_tujuan">

                        <?php if ($fail == 'true') { ?>  <span class="style12">
                            <?php echo setstring('mal', 'Sila masukkan maklumat login yang sah.', 'en', 'Please enter the right login information.	'); ?>
                            </span><br /><?php } ?>



                        <?php if ($session == 'false') { ?>  <span class="style12">

                                <?php echo setstring('mal', 'Sila login terlebih dahulu sebelum masuk ke dalam sistem.', 'en', 'Please login into system to proceed.'); ?>
                            </span><br /><?php } ?>


                        <?php echo setstring('mal', 'Tujuan e-COST adalah untuk menggantikan borang soal selidik kajian kos pengeluaran minyak sawit secara manual kepada elektronik (sistem berasaskan web). Sistem ini akan diaktifkan setahun sekali. ', 'en', 'e-COST System is intended to replace survey forms for palm oil production cost research to electronic forms (web system). This system will be activated once per year.'); ?></p>    </td>
            </tr>

            <?php
            $con = connect();
            $query = "select * from setting where st_name ='Annoucement' and st_value ='1'";
            $res = mysqli_query($con, $query);
            $row = mysqli_fetch_array($res);
            $res_total = mysqli_num_rows($res);
            if ($res_total == 0) {

                $qupdate = "update pengumuman set status=0";
                mysqli_query($con, $qupdate);
            } else if ($res_total > 0) {

                $qupdate = "update pengumuman set status=1";
                mysqli_query($con, $qupdate);

                $qumum = "select * from  pengumuman where status=1";
                $rumum = mysqli_query($con, $qumum);
                $rowumum = mysqli_fetch_array($rumum);
                $totalumum = mysqli_num_rows($rumum);
                if ($totalumum > 0) {
                    ?>
                    <tr>
                        <td colspan="2">
                            <p  class="style8" align="center">
                                <?php echo setstring('mal', $rowumum['PENGUMUMAN'], 'en', $rowumum['PENGUMUMAN_BI']); ?>
                            </p>

                        </td>
                    </tr><?php
                }
            }
            ?>

            <tr>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
                <td colspan="2"><div align="center"><span class="style9" id="akta_bm"><strong>
                                <?php echo setstring('mal', 'AKTA LEMBAGA MINYAK SAWIT MALAYSIA 1998', 'en', 'MALAYSIAN PALM OIL BOARD ACT 1998'); ?>

                            </strong><br />
                            <?php echo setstring('mal', 'Peraturan-peraturan Lembaga Minyak Sawit Malaysia 2005', 'en', 'Malaysian Palm Oil Board Regulation 2005'); ?>

                        </span></div>    </td>
            </tr>





            <tr>
                <td colspan="2" bgcolor="#FFFFFF"><p class="style11"> </p>
                    <p class="style11" id="p_bm">
                        <?php echo setstring('mal', 'Pada menjalankan kuasa yang diberikan oleh seksyen 78 Akta Lembaga Minyak Sawit Malaysia 1998 [Akta 582], Menteri membuat peraturan', 'en', 'IN exercise of the powers conferred by section 78 of the Malaysian Palm Oil Board Act 1998 [Act 582], the Minister makes the following regulation'); ?>
                    </p>

                    <blockquote id="quote_bm">
                        <p class="style11">
                            <?php echo setstring('mal', '<strong>"</strong><em>Mana-mana orang yang tidak mematuhi kehendak-kehendak notis di bawah peraturan ini; atau dengan mengetahuinya atau melulu memberikan atau mengemukakan atau menyebabkan diberikan atau dikemukakan apa-apa butir, dokumen atau maklumat yang tidak lengkap, tidak tepat atau tidak benar yang dinyatakan dalam notis itu, <strong>melakukan suatu kesalahan</strong> dan apabila disabitkan boleh didenda tidak melebihi satu ratus ribu ringgit atau dipenjarakan selama tempoh tidak melebihi dua tahun atau kedua-duanya.</em><strong>"</strong>', 'en', '<strong>"</strong><em>Any person who fails to comply with the requirements of a notice under this regulation or knowingly or recklessly submits or furnishes or causes to be submitted or furnished any incomplete, inaccurate or untrue in any particulars, document or information <strong>commits an offence</strong> and shall be liable on conviction to a fine not exceeding one hundred thousand ringgit or to imprisonment for a term not exceeding two years or to both.</em><strong>"</strong>'); ?>
                        </p>
                    </blockquote>


                    <p> </p></td>
            </tr>

            <tr>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
                <td colspan="2" background="images/line.png" height="7px"></td>
            </tr>
            <tr>
                <td height="7px" colspan="2" align="center"><span class="style6">
                        <?php echo setstring('mal', 'Hakcipta 2010. Malaysian Palm Oil Board', 'en', 'Copyright 2010. Malaysian Palm Oil Board'); ?>
                    </span></td>
            </tr>
            <tr>
                <td height="7px" colspan="2" align="center" class="style6">
                    <?php echo setstring('mal', 'Paparan terbaik dalam <a href="file/Firefox Setup 3.5.6.exe">Firefox 3.0 dan ke atas</a> atau <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx">Internet Explorer 7.0</a> ke atas dengan 1280x800 resolusi piksel', 'en', 'Best view in<a href="http://www.spreadfirefox.com/?q=affiliates&id=167974&t=218"> Firefox 3.0 and above </a> or <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx">Internet Explorer 7.0</a> an above with 1280x800 pixels resolution'); ?>	</td>
            </tr>
        </table>
    </body>
</html>
