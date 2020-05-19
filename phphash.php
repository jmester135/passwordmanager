<!DOCTYPE html>
<html>
<head>
	<title>
	Passwort Verschlüsselung
	</title>
	</head>
	<body>
		<?php
		session_start();
		$login=$_SESSION['login'];
		if($login==1){
			echo '	<form action="phphash.php" method="get">
					Zu verschlüsselndes Wort: <input type="text" name="cipher">
					<br>
					<input type="submit">
				</form>
				<br>';

		define('AES_256_CBC', 'aes-256-cbc');
		$password = $_GET["cipher"];

		echo nl2br("$password\n");
		//Vorbereitung der Verschlüsselung
		$encryption_key = openssl_random_pseudo_bytes(32);  //Key wird immer der selbe genutzt. er wird in einer extra php gespeichert und mit Getter geholt
		$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(AES_256_CBC));
		//Verschlüsselung
		$encrypted = openssl_encrypt($password, AES_256_CBC, $encryption_key, 0, $iv);
		echo nl2br("$encrypted\n");
		$encrypted = $encrypted . ':' . $iv;
		//Entschlüsselung
		$parts = explode(':',$encrypted);
		$decrypted = openssl_decrypt($parts[0], AES_256_CBC, $encryption_key, 0, $parts[1]);
		echo nl2br("$decrypted\n");
	}else{
		echo "Login Fehlgeschlagen";
		header("Location: http://localhost/dashboard/Login.php");
		exit;
	}
		 ?>
	</body>
</html>
