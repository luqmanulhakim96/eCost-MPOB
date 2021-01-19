<!--
 Created by Hafez Hamid <fezcodework@gmail.my>  at Apr 18, 2020 10:28:21 AM 
 Copyright (c) 2020 Gates IT Solution Sdn Bhd
 
-->
<script type="text/javascript">
    $(function () {
        $.fn.colorbox({
            href: 'po1_1_first.php',
            open: true,
            width: "90%",
            height: "100%",
            iframe: false,
            onClosed: function () {
                alert('<?= setstring('mal', 'Sila kemaskini maklumat profil anda terlebih dahulu', 'en', 'Please complete your profile first'); ?>');
                //window.location='../logout.php';
                window.location = 'home.php?id=home&secondtime';

            }
        });
    });
</script>