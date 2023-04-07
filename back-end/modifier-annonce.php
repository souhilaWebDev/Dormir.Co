<?php 
session_start();
require_once('./config.php');
require_once('../class/database.php');
require_once('../class/verification.php');


$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

$title =  isset($_POST['title']) ? $_POST['title']: '';
$description =  isset($_POST['description']) ? $_POST['description']: '';
$price =  isset($_POST['price']) ? $_POST['price']: '';
$phone =  isset($_POST['phone']) ? $_POST['phone']: '';
//$id_user =  isset($_POST['id_user']) ? $_POST['id_user']: '';
$id_ville_france =  isset($_POST['id_ville_france']) ? $_POST['id_ville_france']: '';
$id_ad = $_GET['id_ad'];

//$update = $database->update($pdo, "title, description, price, phone, id_user, id_ville_france", "ad", $array, '?,?,?,?,?,?');
$sql = "UPDATE ad SET titre = :titre, description = :description, price = :price, phone = :phone, id_ville_france = :id_ville_france, WHERE id_ad = :id_ad";


if ($sql == false) {
    $verif->setArray(["L'annonce n'a pas pu être modifié"]);
} else {
    echo 'votre  annonce a été bien modifié';
}
