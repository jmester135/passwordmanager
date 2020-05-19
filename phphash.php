<!DOCTYPE html>
<html>
	<head>
		<title>
			Passwort Verschlüsselung
		</title>
	</head>
	<body>
		<?php
				//include('C:\xampp\htdocs\dashboard/crypt.php');
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
				$decrypted = decrypt($encrypted);
				echo nl2br("$decrypted\n");
			}else{
				echo "Login Fehlgeschlagen";
				header("Location: http://localhost/dashboard/Login.php");
				exit;
			}

			function crypt($password) {
			    //Vorbereitung der Verschlüsselung
					$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(aes-256-cbc));
			    //Key holen
			    $encryption_key = 'test123';
			    //Verschlüsselung
					$encrypted = openssl_encrypt($password, aes-256-cbc, $encryption_key, 0, $iv);
			    echo nl2br("$encrypted\n");
			    $encrypted = $encrypted . ':' . $iv;


			    return $encrypted;
			}

			function decrypt($password) {
			    //Key holen
			    $encryption_key = 'test123';
			    //Entschlüsselung
			    $parts = explode(':',$encrypted);
			  	$decrypted = openssl_decrypt($parts[0], aes-256-cbc, $encryption_key, 0, $parts[1]);

			    return $decrypted;
			}
				 ?>
	</body>
</html>
