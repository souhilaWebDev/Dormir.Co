<?php 
session_start();
require_once('./config.php');
require_once('../class/database.php');
require_once('../class/verification.php');

$verif = new Verification();

if(!isset($_SESSION['id_user'])){
  $database = new Database();
  $pdo = $database->connectDb();
  // on recupere le id_user 
  $result = $database->select($pdo, '*', 'user', ['email', $_SESSION['email']]);
  $result = $result->fetchAll();
  $_SESSION['id_user'] = $result[0]['id_user'];
}
// enregistrer la demande
$array = [
    $_SESSION['id_user'],
    $_GET['id_ad']
];
// var_dump($array);die();
$database = new Database();
$pdo = $database->connectDb();
$insert = $database->insert($pdo, "id_user, id_ad", "favorite", $array, '?,?');

if ($insert == false) {
    $verif->setArray(["L'annonce n'a pas pu être ajouter comme favoris"]);
} else {
  $verif->setArray(["Nouvelle annonce favorite ajoutée"]);
}

if (count($verif->getArray()) > 0) {
   return header('Location: '.URL.'/voir-mes-favories.php?msg='.$verif->getIndexError(0));
}
