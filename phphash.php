<!DOCTYPE html>
<html>
<head>
	<title>
	Passwort Verschlüsselung
	</title>
	</head>
	<body>
<<<<<<< HEAD

	<form action="phpinfo.php" method="get">
		Zu verschlüsselndes Wort: <input type="text" name="cipher">
		<br>
		<input type="submit">
	</form>
	<br>
	<?php
<<<<<<< HEAD
=======
	$benutzername = “name”;
	$_GETmasterpassword = “password”;

	static $encryption_key = openssl_random_pseudo_bytes(32);
	$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

	openssl_encrypt($password, 'aes-256-cbc', $encryptionKey, 0, $iv);
	$encrypted = $encrypted . ':' . $iv;
	openssl_decrypt($encryptedData, 'aes-256-cbc', $encryptionKey, 0, 	$initializationVector);

	echo"test123";

>>>>>>> 898ed20a8d90ac8631846ece9009cd6835f128b9

		define('AES_256_CBC', 'aes-256-cbc');
		$password = $_GET["cipher"];

		echo nl2br("$password\n");
		//Vorbereitung der Verschlüsselung
		$encryption_key = openssl_random_pseudo_bytes(32);
		$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(AES_256_CBC));
		//Verschlüsselung
		$encrypted = openssl_encrypt($password, AES_256_CBC, $encryption_key, 0, $iv);
		echo nl2br("$encrypted\n");
		$encrypted = $encrypted . ':' . $iv;
		//Entschlüsselung
		$parts = explode(':',$encrypted);
		$decrypted = openssl_decrypt($parts[0], AES_256_CBC, $encryption_key, 0, $parts[1]);
		echo nl2br("$decrypted\n");

	?>
=======
		<?php
		include('../crypt.php');
		session_start();
		$login=$_SESSION['login'];
		if($login==1){
			echo '	<form action="phphash.php" method="get">
					Zu verschlüsselndes Wort: <input type="text" name="cipher">
					<br>
					<input type="submit">
				</form>
				<br>';


		$password = $_GET["cipher"];

		echo nl2br("$password\n");
		$encrypted = crypt($password);
		echo nl2br("$encrypted\n");
		$decrypted = decrypt($encrypted);
		echo nl2br("$decrypted\n");
	}else{
		echo "Login Fehlgeschlagen";
		header("Location: http://localhost/dashboard/Login.php");
		exit;
	}
		 ?>
>>>>>>> c920818ffb8f752c44eea299730ffd09ab15222e
	</body>
</html>
