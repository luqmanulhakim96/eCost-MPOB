<?php
/*
 *  Updated by Hafez Hamid <fezcodework@gmail.my>  at Apr 18, 2020 10:23:33 AM 
 *  Copyright (c) 2020 Gates IT Solution Sdn Bhd
 * 
 */
include ('../class/user.class.php');
$pengguna = new user('estate', $_SESSION['lesen']);
$session_lesen = $_SESSION['lesen'];
/*if (($_SESSION['lesen'] == NULL)) {
    echo "<script>window.location.href='../index1.php?session=false';</script>";
} else */
if (($_SESSION['lesen'] <> NULL)) 
{
    if (!isset($_GET['welcome'])) {
        ?>


        <?php if ($_SESSION['view'] == 'true') { ?>
            <script type="text/javascript">
                $(function () {
                    $('input').attr('disabled', true);
                    $('.viewsahaja').hide();
                });


            </script>
        <?php } ?>
        <script type="text/javascript">

            // Countdown timer for redirecting to another URL after several seconds

            var seconds = 7; // seconds for HTML
            var foo; // variable for clearInterval() function

            function redirect() {
                document.location.href = 'home.php?id=home&secondtime';
            }

            function updateSecs() {
                document.getElementById("seconds").innerHTML = seconds;
                seconds--;
                if (seconds == -1) {
                    clearInterval(foo);
                    redirect();
                }
            }

            function countdownTimer() {
                foo = setInterval(function () {
                    updateSecs()
                }, 1000);
            }
        <?php if ($pengguna->namaestet == '' && !isset($_GET['secondtime'])) { //initiate if estate info empty  ?>
                countdownTimer();
        <?php } ?>
        </script>

        <div id="no-print">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" aria-describedby="sessionEstate">
                <tr>
                    <td width="99%"><div align="right" style="margin-right:20px"> 
                            <table width="61%" border="0" cellpadding="0" cellspacing="0" aria-describedby="sessionEstate2">
                                <tr style="border-bottom:#333333 solid 1px;">
                                    <td width="28%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><a href="#" onclick="tukarbahasa('mal');"><img src="../images/ms.gif" width="73" height="19" border="0" alt="malay"/></a> <a href="#" onclick="tukarbahasa('en');"><img src="../images/en.gif" width="73" height="19" border="0" alt="english"/></a>&nbsp;</td>
                                    <td width="19%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><div align="center"><a href="#" onclick="window.print()"><img src="../images/Print.png" alt="Cetak" width="16" height="16" border="0" /></a> <a href="#" onclick="window.print()"><?= setstring('mal', 'Cetak', 'en', 'Print'); ?></a></div></td>
                                    <td width="17%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><div align="center"><a href="home.php?id=bantuan"><img src="../images/001_37.png" alt="aa" width="16" height="16" border="0" /></a> <a href="home.php?id=bantuan"><?= setstring('mal', 'Bantuan', 'en', 'Help'); ?></a></div></td>
                                    <td width="17%" align="center" valign="middle" style="border-bottom:#333333 solid 1px;"><div align="center"><a href="../"><img src="../images/Log.png" alt="Keluar" width="16" height="19" border="0" /></a> <a href="../logout.php"><?= setstring('mal', 'Keluar', 'en', 'Exit'); ?></a></div></td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="center" valign="middle"><div align="right"><strong>
                                                <?php
                                                if ($pengguna->namaestet == '') {
                                                    echo "<span style=\"font-weight:bold;color:#f00;text-align:center\">" . ($_SESSION['lang'] == "mal" ? "Tiada maklumat estate info ditemui, klik <a href=\"home.php?id=home&secondtime\">sini</a> untuk kemaskini. " : "No Estate address information found, click <a href=\"home.php?id=editprofile\">here</a> for updates.") . "</span>\n";
                                                    echo "<br><span style=\"font-size:10px\">" . setstring('mal', 'Anda akan diarahkan secara automatik dalam ', 'en', 'You should be automatically redirected in ') . " <span id=\"seconds\">7</span> " . setstring('mal', 'saat', 'en', 'seconds') . "</span>";
                                                }
                                                ?>
                                                <?php echo $_SESSION['tahun']; ?>
                                                <img src="../images/Client.png" alt="Orang" width="16" height="16" /> <?= $pengguna->namaestet; ?> 


                                            </strong></div></td>
                                </tr>
                            </table>
                        </div></td>
                </tr>
            </table>
        </div>
        <?php
    }
}
?>

