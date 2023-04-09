<?php 
session_start();
require_once('../back-end/config.php');
require_once('../class/database.php');
require_once('../class/verification.php');

$verif = new Verification();
$database = new Database();
$pdo = $database->connectDb();
$array = [
            $_GET['id_user'],
            $_GET['id_annonce']
         ];
$sql = 'DELETE FROM favorite WHERE id_user = ? AND id_ad = ? ';
$statement = $pdo->prepare($sql);
$delete  = $statement->execute($array);
  if ($delete == false) {
  $verif->setArray(["Erreur de suppression"]);
  }else {
  $verif->setArray(["Votre favoris a bien été retirer"]);
  }

header('Location: '.URL.'/voir-mes-favories.php?msg='.$verif->getIndexError(0));