<?php
/*
 *  Updated by Hafez Hamid <fezcodework@gmail.my>  at Apr 18, 2020 10:28:33 AM
 *  Copyright (c) 2020 Gates IT Solution Sdn Bhd
 *
 */
ob_start();
session_start();
include('../Connections/connection.class.php');
include('../setstring.inc');

// Turn off all error reporting
error_reporting(0);
extract($_REQUEST);

$_SESSION['tahun'] = $tahun;

//mail configuration
define('MAIL_HOST','webmail.mpob.gov.my');        // sets SMTP server
define('MAIL_PORT','465');                     // set the SMTP port
define('MAIL_USERNAME','tekno@mpob.gov.my');  // mail username
define('MAIL_PASSWORD','@webmail99');      // mail password

?>
<head>
    <title>Login Verification</title>

</head>
<form action="" method="post" name="form1" id="form1">
</form>
<?php
$con = connect();

$username = addslashes(strip_tags($username));
$katalaluan = addslashes(strip_tags($katalaluan));
// $katalaluan = password_hash($katalaluan, PASSWORD_BCRYPT);

function getEstateInfo($username) {
    $con = connect();
    $qtest = "SELECT * FROM estate_info WHERE lesen = '$username'";
    $resultTest = mysqli_query($con, $qtest);
    return mysqli_num_rows($resultTest);
}


function getESub($username, $table) {
    $con = connect();
    $qtest = "SELECT * FROM $table WHERE No_Lesen_Baru = '$username'";
    $resultTest = mysqli_query($con, $qtest);
    return mysqli_num_rows($resultTest);
}

if (!isset($retrieveButton)) {
    if ($mill != "true") {
        // $qLogin = "select * from login_estate where lesen = '$username' and password = '$katalaluan'";
        $qLogin = "select * from login_estate where lesen = '$username' ";

    }
    if ($mill == "true") {
        // $qLogin = "select * from login_mill where lesen = '$username' and password = '$katalaluan'";
        $qLogin = "select * from login_mill where lesen = '$username' ";
    }
} else {
    if ($mill != "true") {
        $qLogin = "select * from login_estate
		INNER JOIN esub ON login_estate.lesen = esub.No_Lesen_Baru
		 where lesen = '$username'
		 and emel='$email'";
    }
    if ($mill == "true") {
        $qLogin = "select * from login_mill
		INNER JOIN alamat_ekilang ON login_mill.lesen = alamat_ekilang.lesen
		where login_mill.lesen = '$username'
		and alamat_ekilang.email='$email'";
    }
}
$r = mysqli_query($con, $qLogin);
$row = mysqli_fetch_array($r);
$total = mysqli_num_rows($r);

if (isset($retrieveButton) && ($total == 0)) {
	$stringAlert = setstring('mal', 'Reset kata laluan gagal. Sila pastikan no lesen dan emel anda berdaftar dengan Sistem e-Cost.', 'en', 'Password reset failed. Please make sure your license no. and e-mail are registered with e-Cost system');
    echo "<script>alert('" . $stringAlert . "'); </script>";
    echo "<script>window.location.href='../index1.php?fail=true';</script>";
}
// elseif ($total == 0) {  // jika login gagal
//     $stringAlert = setstring('mal', 'Log masuk GAGAL!!!, sila cuba semula.', 'en', 'Login FAILED!!!. Please try again.');
//     echo "<script>alert('" . $stringAlert . "'); </script>";
//     echo "<script>window.location.href='../index1.php?fail=true';</script>";
// }
if (!empty($katalaluan)) {
    if (!password_verify($katalaluan, $row['password'])) { //if password entered does not matched with encrypted password
        $stringAlert = setstring('mal', 'Log masuk GAGAL!!!, sila cuba semula.', 'en', 'Login FAILED!!!. Please try again.');
        echo "<script>alert('" . $stringAlert . "'); </script>";
        echo "<script>window.location.href='../index1.php?fail=true';</script>";
    } else {
        $firsttime = $row['firsttime'];
        $lesen = $row['lesen'];
        $password = $row['password'];

        echo $_SESSION['lesen'];
        $_SESSION['lesen'] = $lesen;
        $_SESSION['password'] = $password;
    }
}

// $firsttime = $row['firsttime'];
// $lesen = $row['lesen'];
// $password = $row['password'];
//
// echo $_SESSION['lesen'];
// $_SESSION['lesen'] = $lesen;
// $_SESSION['password'] = $password;

$var = $lesen;


if ($mill != "true") {
    if (date('Y') == $tahun) {
        $table = "esub";
    } else {
        $table = "esub_" . $tahun;
    }

    $qtest = "SELECT * FROM $table WHERE no_lesen_baru = '$username'";
    $resultTest = mysqli_query($con, $qtest);
    $rowTest = mysqli_num_rows($resultTest);

    if ($rowTest == 0) {
        /* if retrieve password */
        if (isset($retrieveButton)) {
            echo "<script>alert('Recovery password for estate is failed. Please contact Administrator for assistance.'); window.location.href='../index1.php';</script>";
        } else {
            /** echo "<script>alert('Login failed.There is no data eSub for your estate in $tahun'); window.location.href='../index1.php';</script>"; */
        }
    }

    $q = "select
			es.No_Lesen, es.Jumlah, es.Nama_Estet, 	es.No_Lesen_Baru, es.Alamat1,es.Alamat2, es.Poskod, es.Bandar, es.Negeri,
			es.No_Telepon,
	es.No_Fax,
	es.Emel,
	es.Negeri_Premis,
	es.Daerah_Premis,
	es.Syarikat_Induk,
	es.Berhasil,
	es.Belum_Berhasil,
	es.Keluasan_Yang_Dituai,
	le.password , ei.pegawai, ei.syarikat, ei.integrasi, ei.keahlian,
	 	ei.lanar,
		ei.pedalaman ,
		ei.gambutcetek ,
		ei.gambutdalam ,
		ei.laterit ,
		ei.asidsulfat ,
		ei.tanahpasir ,
		ei.percentrata ,
		ei.percentalun ,
		ei.percentbukit ,
		ei.percentcerun, le.success, le.fail
		from
			$table es,estate_info ei, login_estate le
		where es.no_lesen_baru = '$username' and ei.lesen ='$username' and le.lesen='$username'  "
            . "group by es.no_lesen_baru";
    //echo $q;
    $r = mysqli_query($con, $q);
    $res_total = 0;
    if ($r) {
        $res_total = mysqli_num_rows($r);
        /** Bug #11035 : masalah login keluar thn 1970 jadi lg hari ni  */
        $esubExist = getESub($username, $table);
        if($esubExist==0){
           echo "<script>alert('". ($_SESSION['lang'] == "mal" ? "Tiada data wujud untuk $table ".$_SESSION['tahun'].". Mohon rujuk admin untuk tindakan selanjutnya" : "No data exist for $table ".$_SESSION['tahun'].". Please refer admin for futher assistance. ")."');</script>";
           echo "<script>window.location.href='../logout.php';</script>";
        }
         /** end Bug #11035 : masalah login keluar thn 1970 jadi lg hari ni  */
    }
    if ($res_total > 0) {
        //echo "<script>window.location.href='home.php?id=home';</script>";
    }
}


if ($mill != "true") {
    $_SESSION['type'] = "estate";
    $q1 = "update login_estate set success= now() where lesen = '$lesen'";
    $r1 = mysqli_query($con, $q1);
}
if ($mill == "true") {
    $_SESSION['type'] = "mill";
    $q1 = "update login_mill set success= now() where lesen = '$lesen'";
    $r1 = mysqli_query($con, $q1);
}

if ($total == 0 && $mill != "true") {
    $q = "update login_estate set fail= NOW() where lesen = '$username'";
    $r = mysqli_query($con, $q);
    echo "<script>alert('Tiada data kemaskini login estate dijumpai. Mohon berhubung admin untuk tindakan lanjut.'); </script>";
    echo "<script>window.location.href='../index1.php?fail=true';</script>";
}

if ($total != 0 && $mill != "true") {

    $q = "update login_estate set succes= NOW() where lesen = '$username'";
    $r = mysqli_query($con, $q);

    $rLogin = mysqli_query($con, $qLogin);
    $rowLogin = mysqli_fetch_array($rLogin);

    /* if retrieve password */
    if (isset($retrieveButton)) {
        $q = "update login_estate set success= NOW(), password='" . password_hash(substr($rowLogin['No_Lesen_Baru'], 0, 6),PASSWORD_BCRYPT) . "' where lesen = '$username'";
        $r = mysqli_query($con, $q);

        $title = 'e-COST - Password Recovery (Estate)';



		$from = MAIL_USERNAME; //WEBMASTER_EMEL;
		$to = $email;
		$cc = $from;
		$subject = $title. "-". $rowLogin['No_Lesen_Baru'];
		$Message = "<html lang=\"en\">"
                . "  <head>
        <title>" . $title . "</title>
        </head>
        <body>
        Dear " . $rowLogin['Nama_Estet'] . ", <br>
        <br>
        Thank you for your email.<br>
        Please be informed that we have reset your login password. You may log in e-COST system with the information below:<br>
        Homepage (http://ecost.mpob.gov.my)<br>
        User ID: " . $rowLogin['No_Lesen_Baru'] . "<br>
        Password: " . substr($rowLogin['No_Lesen_Baru'], 0, 6) . " (please change the password after login)<br>
        <br>
        Best regards,<br>
        e-COST Admin.  </body></html>";


		$body = "<pre style=\"font-size:14px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; \">$Message</pre>";


        require_once('scripts/phpmailer/PHPMailerAutoload.php');

        $mail = new PHPMailer(true);

        try{
            $mail->IsSMTP();                       // telling the class to use SMTP

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->SMTPDebug = 1;
            // 0 = no output, 1 = errors and messages, 2 = messages only.

            $mail->SMTPAuth = true;                // enable SMTP authentication
            $mail->SMTPSecure = "ssl";              // sets the prefix to the servier
            $mail->Host = MAIL_HOST;        // sets Gmail as the SMTP server
            $mail->Port = MAIL_PORT;                     // set the SMTP port for the GMAIL

            $mail->Username = MAIL_USERNAME;  // Gmail username
            $mail->Password = MAIL_PASSWORD;      // Gmail password

            $mail->CharSet = 'iso-8859-1';
            $mail->SetFrom($from);
            //$mail->AddBCC ($emailadd);

            $mail->AddCC($from);

            $mail->Subject = $subject;
            $mail->ContentType = 'text/plain';
            $mail->IsHTML(true);

            //$mail->Body = $email_kandungan;
            // you may also use $mail->Body = file_get_contents('your_mail_template.html');
            $mail->MsgHTML($body);
            $mail->AddAddress($to);

            if (!$mail->Send()) {
                		 echo "<script>alert('Email failed sent to $to... Please contact admin for futher assistance'); "
                . "window.location.href='../index1.php';</script>";
            } else {

                // 			  echo "<script>alert('Email successfully sent to $to. Your password has been reset, please check your email'); "
                // . "window.location.href='../logout.php';</script>";

            }
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
            $errorMessage = $e->getMessage();
            echo "<script>alert('$errorMessage'); "
            . "window.location.href='../index1.php';</script>";
        } catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
            $errorMessage = $e->getMessage();
            echo "<script>alert('$errorMessage'); "
            . "window.location.href='../index1.php';</script>";
        }

    }
}
if ($total == 0 && $mill == "true") {
    $qtest = "SELECT * FROM ekilang WHERE no_lesen = '$username' AND tahun='$tahun'";
    $resultTest = mysqli_query($con, $qtest);
    $rowTest = mysqli_num_rows($resultTest);

    if ($rowTest == 0) {
        if (isset($retrieveButton)) {
            echo "<script>alert('Recovery password for mill is failed. Please contact Administrator for assistance.'); window.location.href='../index1.php';</script>";
        } else {
            echo "<script>alert('Login failed. There is no data for your mill in $tahun'); window.location.href='../index1.php';</script>";
        }
    }

    $q1 = "select * from ekilang where no_lesen ='$username' ";
    $r1 = mysqli_query($con, $q1);
    $row1 = mysqli_fetch_array($r1);
    $total1 = mysqli_num_rows($r1);
    if ($total1 > 0) {
        $q = "insert into login_mill (lesen, password, firsttime) values('$username', '$katalaluan', '1') ";
        $r = mysqli_query($con, $q);

        $q = "update login_mill set success= NOW() where lesen = '$username'";
        $r = mysqli_query($con, $q);

        $qadd = "INSERT INTO `alamat_ekilang` (`lesen`, `nama`, `alamat1`, `alamat2`, `alamat3`, `alamatsurat1`, `alamatsurat2`, `alamatsurat3`, `notel`, `nofax`, `email`, `pegawai`, `jpg`, `kategori`) VALUES ('" . $row1['NO_LESEN'] . "', '" . $row1['NAMA_KILANG'] . "', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
        $radd = mysqli_query($con, $qadd);

        echo "<script>location.href='../mill/home.php?id=profile&logging=true&tahun=$tahun';</script>";
    }

    $q = "update login_mill set fail= NOW() where lesen = '$username'";
    $r = mysqli_query($con, $q);
    echo "<script>window.location.href='../index1.php?fail=true';</script>";
}

if ($total != 0 && $mill == "true") {

    $q = "update login_mill set succes= NOW() where lesen = '$username'";
    $r = mysqli_query($con, $q);

    /* if retrieve password */
    if (isset($retrieveButton)) {
        $rLogin = mysqli_query($con, $qLogin);
        $rowLogin = mysqli_fetch_array($rLogin);

        $password= password_hash(substr($rowLogin['lesen'], 0, 6), PASSWORD_BCRYPT);
        $qedit = "update login_mill set success= NOW(), password= $password where lesen = '$username'";
        $redit = mysqli_query($con, $qedit);

        $title = 'e-COST - Password Recovery (Mill)';

		$from = MAIL_USERNAME; //WEBMASTER_EMEL;
		$to = $email;
		$cc = $from;
		$subject = $title. "-". $rowLogin['lesen'];
		$Message = "<html lang=\"en\">"
                . "  <head>
        <title>" . $title . "</title>
        </head>
        <body>
        Dear " . $rowLogin['nama'] . ", <br>
        <br>
        Thank you for your email.<br>
        Please be informed that we have reset your login password. You may log in e-COST system with the information below:<br>
        Homepage (http://ecost.mpob.gov.my)<br>
        User ID: " . $rowLogin['lesen'] . "<br>
        Password: " . substr($rowLogin['lesen'], 0, 6) . " (please change the password after login)<br>
        <br>
        Best regards,<br>
        e-COST Admin.  </body></html>";


		$body = "<pre style=\"font-size:14px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; \">$Message</pre>";

        require_once('scripts/phpmailer/PHPMailerAutoload.php');

        $mail = new PHPMailer(true);

        try{
            $mail->IsSMTP();                       // telling the class to use SMTP

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->SMTPDebug = 0;
            // 0 = no output, 1 = errors and messages, 2 = messages only.

            $mail->SMTPAuth = true;                // enable SMTP authentication
            $mail->SMTPSecure = "ssl";              // sets the prefix to the servier
            $mail->Host = MAIL_HOST;        // sets Gmail as the SMTP server
            $mail->Port = MAIL_PORT;                     // set the SMTP port for the GMAIL

            $mail->Username = MAIL_USERNAME;  // Gmail username
            $mail->Password = MAIL_PASSWORD;      // Gmail password

            $mail->CharSet = 'iso-8859-1';
            $mail->SetFrom($from);
            //$mail->AddBCC ($emailadd);

            $mail->AddCC($from);

            $mail->Subject = $subject;
            $mail->ContentType = 'text/plain';
            $mail->IsHTML(true);

            //$mail->Body = $email_kandungan;
            // you may also use $mail->Body = file_get_contents('your_mail_template.html');
            $mail->MsgHTML($body);
            $mail->AddAddress($to);

            if (!$mail->Send()) {
                echo "<script>alert('Email failed sent to $to... Please contact admin for futher assistance'); "
                . "window.location.href='../index1.php';</script>";
            } else {

                echo "<script>alert('Email successfully sent to $to. Your password has been reset, please check your email'); "
                . "window.location.href='../logout.php';</script>";
            }
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
            $errorMessage = $e->getMessage();
            echo "<script>alert('$errorMessage'); "
            . "window.location.href='../index1.php';</script>";
        } catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
            $errorMessage = $e->getMessage(); 
            echo "<script>alert('$errorMessage'); "
            . "window.location.href='../index1.php';</script>";
        }
    }
}

if (isset($lesen)) {

    if ($firsttime == '2' && $mill != "true") {
        ?>
        <script language="javascript">
            document.form1.action = "home.php?id=profile&logging=true<?php
        if (isset($_GET['mill'])) {
            echo "&mill=true";
        }
        ?>";
            document.form1.target = "_parent";
            document.form1.submit();
        </script>
        <?php
    }
    if ($firsttime == '1' && $mill != "true") {

      $q="update login_estate set firsttime ='2' where lesen = '".$_SESSION['lesen']."'";
      $r = mysqli_query($con, $q);

      $qinfo="INSERT INTO estate_info (lesen ,gambut, percentrata ,percentalun ,percentbukit ,percentcerun)
     VALUES (
     '".$lesen."',  '0', '0', '0', '0', '0')";
     $rinfo = mysqli_query($con, $qinfo);

        ?>
        <script language="javascript">
            document.form1.action = "home.php?id=profile";
            document.form1.target = "_parent";
            document.form1.submit();
        </script>
    <?php } ?>
    <?php
    if ($firsttime == '2' && $mill == "true") {
        ?>
        <script language="javascript">
            document.form1.action = "../mill/home.php?id=profile&logging=true&mill=true";
            document.form1.submit();
        </script>

        <?php
    }
    if ($firsttime == '1' && $mill == "true") {
        ?>
        <script language="javascript">
            document.form1.action = "../mill/home.php?id=profile&logging=true&tahun=$tahun";
            document.form1.target = "_parent";
            document.form1.submit();
        </script>
        <?php
    }
}
?>
