<!DOCTYPE html>
<html>
<head>
	<title>
	Passwort Verschlüsselung
	</title>
	</head>
	<body>
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
	</body>
</html>
