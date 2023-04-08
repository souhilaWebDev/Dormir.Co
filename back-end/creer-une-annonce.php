<?php 
session_start();
require_once('./config.php');
require_once('../class/database.php');
require_once('../class/verification.php');
// var_dump($_POST);die();

$verif = new Verification();
// Verifier le nom 
$verif->Texte($_POST['title'], 'title');
$verif->Texte($_POST['address'], 'address');
$verif->Number($_POST['ville'], 'ville');
$verif->Number($_POST['price'], 'price');
$verif->Phone($_POST['phone']);
$verif->Textelong($_POST['description'], 'description');
$verif->Number($_SESSION['id_user'], 'id_user'); 



if (count($verif->getArray()) > 0) {
   return header('Location: '.URL.'/creer-une-annonce.php?error='.$verif->getIndexError(0).'&title='.$_POST['title'].'&description='.$_POST['description'].'&price='.$_POST['price'].'&phone='.$_POST['telephone'].'&address='.$_POST['address'].'&ville='.$_POST['ville']);
}
$database = new Database();
$pdo = $database->connectDb();

// enregistrer la demande
$array = [
    $_POST['title'],
    $_POST['description'],
    $_POST['price'],
    $_POST['phone'],
    $_POST['address'],
    $_SESSION['id_user'],
    $_POST['ville']
];
$insert = $database->insert($pdo, "title, description, price, phone,address, id_user, id_ville_france", "ad", $array, '?,?,?,?,?,?,?');


if ($insert == false) {
    $verif->setArray(["L'annonce n'a pas pu être inséré"]);
} else {
  $verif->setArray(["L'annonce a été bien inséré"]);
}

if (count($verif->getArray()) > 0) {
   return header('Location: '.URL.'/voir-mes-annonces.php?msg='.$verif->getIndexError(0).'&title='.$_POST['title'].'&description='.$_POST['description'].'&price='.$_POST['price'].'&phone='.$_POST['telephone'].'&address='.$_POST['address'].'&ville='.$_POST['ville']);
}

// header('Location: '.URL.'/search.php');

// }else{
//     header('Location: '.URL.'/index.php');
// }
// header('Location: '.URL.'/voir-annonce.php');