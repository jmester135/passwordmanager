<?php
include('../config.inc');

//Stellt die Verbindung zur Datenbank her
public function connect()
{
  global $dbconfig;
  global $db_name;
  global $dbconnect;
  global $dbtype;

  //Auslesen der Werte aus der Config Datei
  $server = $dbconfig['db_servername'];
  $db_user = $dbconfig['db_username'];
  $db_pass = $dbconfig['db_password'];
  $db_name = $dbconfig['db_name'];
  $dbtype = $dbconfig['db_type'];

  // Verbindung zur Datenbank herstellen
  $dbconnect = mysqli_connect($server, $db_user, $db_pass) or die("Aufbauen der Verbindung zur Datenbank ist fehlgeschlagen");
  mysqli_select_db($dbconnect,$db_name) or die ("Auswählen der Datenbank ". $db_name ."Fehlgeschlagen");
  mysqli_set_charset($dbconnect, "utf8");
}
 //schliesst die verbindung zur Datenbank
public function close_DBConnection($dbconnect){
  mysqli_close($dbconnect);
}
  // $sql = SQL Statment
 //führt ein sql update befehl aus
public function SQL_Update($sql,$dbconnect){
  $result = false;
  if($dbconnect != null && $sql != null){
    $result = mysqli_query($sql, $dbh) or die("SQL Update fehlgeschlagen" . $sql);
  }
  return $result;
}
//führt ein sql delete befehl aus
public function SQL_Delete($sql,$dbconnect){
  $result = false;
  if($dbconnect != null && $sql != null){
    $result = mysqli_query($sql, $dbh) or die("SQL Delete fehlgeschlagen" . $sql);
  }
  return $result;
}
 //führt ein sql insert befehl aus
public function SQL_Insert($sql,$dbconnect){
  $result = false;
  if($dbconnect != null && $sql != null){
    $result = mysqli_query($sql, $dbh) or die("SQL Insert fehlgeschlagen" . $sql);
  }
  return $result;
}

public function Resultset_From_SQL_Select($sql,$dbconnect){
  $result = false;
  if($dbconnect != null && $sql != null){
    $result = mysqli_query($sql, $dbh) or die("Query zur Datenbank mit MYSQLI fehlgeschlagen ". $sql ." Error: " . mysqli_errno($dbh) . " : " . mysqli_error($dbh) );
  }
  return $result;
}

public function Row_From_Resultset($result){
  $row = Null;
  if ($result) {
    $row = msqli_fetch_row($result);
  }
  return $row;
}

 ?>
