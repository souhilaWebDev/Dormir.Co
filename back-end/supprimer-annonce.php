<?php 
session_start();
require_once('../back-end/config.php');
require_once('../class/database.php');
require_once('../class/verification.php');


$verif = new Verification();
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
  $verif->setArray(["Votre Annonce a bien été supprimée"]);
  }

header('Location: '.URL.'/voir-mes-annonces.php?msg='.$verif->getIndexError(0));