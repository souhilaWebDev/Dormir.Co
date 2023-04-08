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
$verif->Texte($_POST['adress'], 'adress');
//$verif->Texte($_SESSION['id_user'], 'id_user'); 
//$verif->Texte($_POST['ville'], 'ville');
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

//update($pdo, $champs_valeur, $table, $where)
$champs_valeur="title=?, description=?, price=?, phone=?, address=?";
$where=["id_user",$_SESSION['id_user'],"id_ad",$_POST['id_ad']];
$array = [
    $_POST['title'],
    $_POST['description'],
    $_POST['price'],
    $_POST['phone'],
    $_POST['adress']
];
$table='ad';

$update = $database->update($pdo, $champs_valeur, $table,$array, $where);

if ($update == false) {
    $verif->setArray(["L'annonce n'a pas pu être modifiée"]);
} else {
    echo 'votre  annonce a été bien modifiée';
}


