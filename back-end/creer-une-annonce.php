<?php 
session_start();
require_once('./config.php');
require_once('../class/database.php');
require_once('../class/verification.php');

$verif = new Verification();
// Verification des inputs
$verif->Texte($_POST['title'], 'title');
$verif->Texte($_POST['address'], 'address');
$verif->Number($_POST['ville'], 'ville');
$verif->Number($_POST['price'], 'price');
$verif->Phone($_POST['phone']);
$verif->Textelong($_POST['description'], 'description');


if (count($verif->getArray()) > 0) {
   return header('Location: '.URL.'/creer-une-annonce.php?error='.$verif->getIndexError(0).'&title='.$_POST['title'].'&description='.$_POST['description'].'&price='.$_POST['price'].'&phone='.$_POST['phone'].'&address='.$_POST['address'].'&ville='.$_POST['ville']);
}

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
    $_POST['title'],
    $_POST['address'],
    $_POST['ville'],
    $_POST['price'],
    $_POST['phone'],
    htmlspecialchars($_POST['description']),
    $_SESSION['id_user']
];
$database = new Database();
$pdo = $database->connectDb();
$insert = $database->insert($pdo, "title ,address,id_ville_france, price, phone, description, id_user", "ad", $array, '?,?,?,?,?,?,?');

if ($insert == false) {
    $verif->setArray(["L'annonce n'a pas pu être inséré"]);
} else {
  $verif->setArray(["L'annonce a été bien inséré"]);
}

if (count($verif->getArray()) > 0) {
   return header('Location: '.URL.'/voir-mes-annonces.php?msg='.$verif->getIndexError(0));
}