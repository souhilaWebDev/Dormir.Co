<?php 
session_start();
require_once('../class/database.php');
require_once('../class/verification.php');

// init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
$array = [
$_GET["id_ad"]
  
  ];
  
  $delete = $database->delete($pdo, "ad", "id_ad",$array,'?');
  if ($delete == false) {
  $verif->setArray(["Erreur de suppression"]);
  }else {
  echo $_GET["id_ad"].'<br>';
  echo 'données supprimées';
}
