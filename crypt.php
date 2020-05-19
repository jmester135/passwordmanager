<?php
global define('AES_256_CBC', 'aes-256-cbc');

function key()
{
  //Key wird immer der selbe genutzt. er wird in einer extra php gespeichert und mit Getter geholt
  //$encryption_key = openssl_random_pseudo_bytes(32);
  $encryption_key = 'test123';
  return $encryption_key
}



function crypt($password)
{
    //Vorbereitung der Verschlüsselung
		$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(AES_256_CBC));
    //Key holen
    $encryption_key = key();
    //Verschlüsselung
		$encrypted = openssl_encrypt($password, AES_256_CBC, $encryption_key, 0, $iv);

    return $encrypted;
}

function decrypt($password)
{
    //Key holen
    $encryption_key = key();
    //Entschlüsselung
  	$encrypted = $encrypted . ':' . $iv;
    $parts = explode(':',$encrypted);
  	$decrypted = openssl_decrypt($parts[0], AES_256_CBC, $encryption_key, 0, $parts[1]);

    return $decrypted;
}

 ?>
