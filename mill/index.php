<?php
/*
 *  Filename: mill/index.php
 *  Copyright 2010 Malaysia Palm Oil Board
 * 	Last update: 15.10.2010 11:46:16 am
 * 	2010-10-15 Fadli Saad  <fadlisaad@gmail.com> modified code to check progress
 */


if (isset($_GET['firsttime'])) {
    ?>
    <link type="text/css" href="../themes/base/ui.all.css" rel="stylesheet" />
    <script type="text/javascript" src="../ui/ui.core.js"></script>
    <script type="text/javascript" src="../ui/ui.draggable.js"></script>
    <script type="text/javascript" src="../ui/ui.resizable.js"></script>
    <script type="text/javascript" src="../ui/ui.dialog.js"></script>
    <script type="text/javascript" src="../ui/ui.progressbar.js"></script>
    <script type="text/javascript" src="../external/bgiframe/jquery.bgiframe.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#dialog_1").dialog({
                autoOpen: true,
                modal: true
            });
        });
    </script>
    <style type="text/css">
        <!--
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        -->
    </style>
    <div id="dialog_1">
        <p><?= setstring('mal', 'Selamat Datang Ke Sistem E-COST Kilang', 'en', 'Welcome to E-COST System for Mill'); ?>
        </p>
        <p><?= setstring('mal', 'Sila Kemaskini Profil Anda Terlebih Dahulu', 'en', 'Please Update Your Profile First'); ?>
        </p>
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
    $(function () {
        $("#progress").progressbar({
            value:<?php echo number_format($totalmill, 2); ?>
        });
    });
</script>
<p><strong><?= setstring('mal', 'Selamat Datang ', 'en', 'Welcome'); ?> <?= strtoupper($pengguna->nama); ?></strong></p>

<table width="100%" border="0" aria-describedby="index-home">
    <tr>
        <td width="53%" height="72">
            <div style=" background-color: #ccc;
                 -moz-border-radius: 5px;
                 -webkit-border-radius: 5px;
                 border: 1px solid #000;
                 padding: 10px;">
                <table  aria-describedby="index-home-2"><tr><td><strong><img src="../folder.png" alt="aaa" width="100" height="100" /></strong></td>
                        <td>
                            <ul>
                                <li><?= setstring('mal', 'Login berjaya terakhir anda pada', 'en', 'Last success login on'); ?> 
                                    <?php
                                    if ($pengguna->success != '') {
                                        echo date('d-F-Y g:i A', strtotime($pengguna->success));
                                    } else {
                                        echo setstring('mal', '<em>Tiada maklumat ditemui</em> ', 'en', '<em>No record found</em>');
                                    }
                                    ?>
                                </li>
                                <?php
                                if ($pengguna->fail != "0000-00-00 00:00:00") {
                                    ?>
                                    <br />
                                    <li><?= setstring('mal', 'Login gagal terakhir anda pada', 'en', 'Last failed login on'); ?>
                                        <?php
                                        if ($pengguna->fail != '') {
                                            echo date('d-F-Y g:i A', strtotime($pengguna->fail));
                                        } else {
                                            echo setstring('mal', '<em>Tiada maklumat ditemui</em> ', 'en', '<em>No record found</em>');
                                        }
                                        ?>          </li>
                                    <?php
                                }
                                ?>
                                <br />
                                <li><?= setstring('mal', 'Status terima borang oleh MPOB :', 'en', 'Survey form status by MPOB :'); ?>

                                    <?php
                                    $sql = "SELECT * FROM ringkasan_kos_hantar WHERE no_lesen = '" . $_SESSION['lesen'] . "' AND TAHUN = '" . $_SESSION['tahun'] . "' ORDER BY TARIKH_HANTAR DESC LIMIT 1";
                                    $result_hantar = mysql_query($sql);
                                    $hantar = mysql_fetch_array($result_hantar);

                                    if (!$hantar) {
                                        ?>
                                    <strong style="color: FF0000"><?= setstring('mal', 'Belum diterima', 'en', 'Not yet received'); ?></strong>

                                    </li>
                                <?php } else {
                                    ?>

                                    <strong><?= setstring('mal', 'Telah diterima', 'en', 'Received'); ?></strong>

                                    </li>

                                    <br />
                                    <li><?= setstring('mal', 'Tarikh terakhir terima borang pada ', 'en', 'Last form submit on '); ?>

                                        <strong><?php echo(date('d-F-Y', strtotime($hantar['TARIKH_HANTAR']))); ?></strong>

                                    </li>
                                <?php } ?>
                                <br />
                                <li><?= setstring('mal', 'Sila klik pada menu di atas untuk navigasi.', 'en', 'Please click on the menu to navigate.'); ?></li>
                            </ul></td>
                    </tr>
                </table>
            </div></td>
    </tr>
</table>
