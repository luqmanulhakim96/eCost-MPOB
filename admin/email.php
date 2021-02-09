<?php include ('../Connections/connection.class.php');
extract($_REQUEST);
	$id 	= $_GET['bil'];

	$con = connect();
	$q ="SELECT Emel FROM esub WHERE Bil = $id LIMIT 1";
	$r = mysqli_query($con, $q);
	while($row=mysqli_fetch_array($r)){

		$to      = $row['Emel'];
		$subject = 'Peringatan untuk Survey E-COST, MPOB';
		$message = $mesej;
		$headers = 'From: ecost@mpob.gov.my' . "\r\n" .
			'Reply-To: azman@mpob.gov.my' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);
	}

?>

<form>
<h1>Messege sent!</h1>
<input type="button" value="Close" onclick="javascript:history.back(-3)" />
</form>
