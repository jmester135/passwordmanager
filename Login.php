<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>
      Passwort Login
    </title>
  </head>
  <body>
    <form action="Login.php" method="post">
      Email:<br>
      <input type="text" name="Email">
      <br> Login Passwort: <br>
      <input type = "password" name="password">
      <br>
      <input type = "submit"> <br>

    <?php
    session_start();
    $_SESSION['login']=0;
    /*
    //DB Login_Daten
    $db_server="Serververbindung";
    $db_user="";
    $db_password="";
    $db="";
    $db_verbindung=mysqli_connect($db_server,$db_user,$db_password,$db) or die ("Verbinduns Error");
    */
    $db_password = '098f6bcd4621d373cade4e832627b4f6';  //PW = test
    $hash_pw = $_POST["password"];

    $hash = md5($hash_pw);

    if($hash == $db_password) {
      $_SESSION['login']=1;
      header("Location: http://localhost/dashboard/phphash.php");
      exit();
    }else {
      echo "Fehlerhafte Eingabe";
    }
     ?>
  </body>
</html>
