<!DOCTYPE html>
<html>
<head>
	<title>
	Passwort Verschlüsselung
	</title>
	</head>

	<body>

	<form action=”phphash.php” method=”get”>
		Zu verschlüsselndes Wort: <input type=”text” name=”password”>
		<input type=”submit”>

	<?php
	$benutzername = “name”;
	$_GETmasterpassword = “password”;

	static $encryption_key = openssl_random_pseudo_bytes(32);
	$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

	openssl_encrypt($password, 'aes-256-cbc', $encryptionKey, 0, $iv);
	$encrypted = $encrypted . ':' . $iv;
	openssl_decrypt($encryptedData, 'aes-256-cbc', $encryptionKey, 0, 	$initializationVector);

?>


	</body>
</html>
