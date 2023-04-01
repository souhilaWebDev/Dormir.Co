<?php 
session_start();
require_once('./config.php');
require_once('../class/database.php');
require_once('../class/verification.php');


$verif = new Verification();
// Verifier le nom 
$verif->Texte($_POST['title'], 'title');
// Verifier le prenom 
$verif->Texte($_POST['description'], 'description');
// Verifier l'email et vérifier en base de donnée si il l'existe
$verif->Texte($_POST['price'], 'price');
// Verifier le téléphone
$verif->Phone($_POST['phone']);
$verif->Texte($_SESSION['id_user'], 'id_user'); 
$verif->Texte($_POST['ville'], 'ville');

if (count($verif->getArray()) > 0) {
  //  return header('Location: '.URL.'/?error='.$verif->getIndexError(0).'&title='.$_POST['title'].'&description='.$_POST['description'].'&price='.$_POST['price'].'&phone='.$_POST['telephone'].'&ville='.$_POST['ville']);
}
// init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

echo $_POST['title'].'<br>';
echo $_POST['description'].'<br>';
echo $_POST['price'].'<br>';
echo $_POST['phone'].'<br>';
echo $_SESSION['id_user'].'<br>';
echo $_POST['ville'].'<br>';
// enregistrer la demande
$array = [
    $_POST['title'],
    $_POST['description'],
    $_POST['price'],
    $_POST['phone'],
    $_SESSION['id_user'],
    $_POST['ville']
];
$insert = $database->insert($pdo, "title, description, price, phone, id_user, id_ville_france", "ad", $array, '?,?,?,?,?,?');


if ($insert == false) {
    $verif->setArray(["L'annonce n'a pas pu être inséré"]);
} else {
    echo 'votre  annonce a été bien inséré';
}

if (count($verif->getArray()) > 0) {
  //  return header('Location: '.URL.'/?error='.$verif->getIndexError(0).'&title='.$_POST['title'].'&description='.$_POST['description'].'&price='.$_POST['price'].'&phone='.$_POST['telephone'].'&ville='.$_POST['ville']);
}

// header('Location: '.URL.'/search.php');

// }else{
//     header('Location: '.URL.'/index.php');
// }