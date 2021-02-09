<?php
include ('../class/mill.class.php');
$pengguna = new user('mill', $_SESSION['lesen']);
$ekilang = new user('ekilang', $_SESSION['lesen']);
$session_lesen = $_SESSION['lesen'];



if ($_SESSION['lesen'] == NULL) {
    echo "<script>window.location.href='../index1.php?session=false';</script>";

} else {
    ?>
    <style type="text/css">
        <!--
        .links {
        }
        a:visited {
            text-decoration: none;
        }
        a:link {
            text-decoration: none;
        }
        -->
    </style>


    <div id="no-print">

        <table width="100%" border="0" cellpadding="0" cellspacing="0" id="no-print" aria-describedby="sessionTable">
            <tr>
                <td width="90%"><div align="right" style="margin-right:20px">
                        <table width="57%" height="61" border="0" cellpadding="0" cellspacing="0" aria-describedby="sessionTable-2">
                            <tr>
                                <td width="33%" style="border-bottom:#000000 1px solid;"><a href="#" onclick="tukarbahasa('mal');"><img src="../images/ms.gif" width="73" height="19" border="0" alt="ms" /></a> <a href="#" onclick="tukarbahasa('en');"><img src="../images/en.gif" width="73" height="19" border="0" alt="en" /></a>&nbsp;</td>
                                <td width="15%" height="29" style="border-bottom:#000000 1px solid;"><div align="center"><img src="../images/Print.png" width="16" height="16" onclick="window.print()" alt="print" /> <a href="#" onclick="window.print()" ><?= setstring('mal', 'Cetak', 'en', 'Print'); ?></a></div></td>
                                <td width="17%" style="border-bottom:#000000 1px solid;"><div align="center"><img src="../images/001_37.png" alt="Help" width="16" height="16" /> <a href="home.php?id=bantuan"><?= setstring('mal', 'Bantuan', 'en', 'Help'); ?></a></div></td>
                                <td width="20%" style="border-bottom:#000000 1px solid;"><div align="center"><img src="../images/Log.png" alt="" width="16" height="16" /> <a href="../logout.php"><?= setstring('mal', 'Keluar', 'en', 'Exit'); ?></a></div></td>
                            </tr>
                            <tr>
                                <td colspan="5"><div align="right">
                                        <?php
                                        if ($pengguna->nama == '') {
                                            echo "<span style=\"font-weight:bold;color:#f00;text-align:center\">" . ($_SESSION['lang'] == "mal" ? "Tiada maklumat alamat eKilang ditemui, klik <a href=\"home.php?id=editprofile\">sini</a> untuk kemaskini. " : "No eKilang address information found, click <a href=\"home.php?id=editprofile\">here</a> for updates.") . "</span>\n";
                                        }
                                        ?>
                                        <strong><img src="../images/Client.png" alt="" width="16" height="16" />&nbsp;

                                            <?= $pengguna->nama; ?>



                                        </strong></div></td>
                            </tr>
                        </table>
                    </div></td>
            </tr>
        </table>
    </div>
<?php } ?>
