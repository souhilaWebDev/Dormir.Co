<?php 
session_start();
require_once('./class/database.php');
require_once('./class/verification.php');


/*$verif = new Verification();
// Verifier le nom 
$verif->Texte($_POST['title'], 'title');
// Verifier le prenom 
$verif->Texte($_POST['description'], 'description');
// Verifier l'email et vérifier en base de donnée si il l'existe
$verif->Texte($_POST['price'], 'price');
// Verifier le téléphone
$verif->Phone($_POST['phone']);
$verif->Texte($_SESSION['id_user'], 'id_user'); 
$verif->Texte($_POST['ville'], 'ville');*/

/*if (count($verif->getArray()) > 0) {
  //  return header('Location: '.URL.'/?error='.$verif->getIndexError(0).'&title='.$_POST['title'].'&description='.$_POST['description'].'&price='.$_POST['price'].'&phone='.$_POST['telephone'].'&ville='.$_POST['ville']);
}*/
// init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

/*$title =  isset($_POST['title']) ? $_POST['title']: '';
$description =  isset($_POST['description']) ? $_POST['description']: '';
$price =  isset($_POST['price']) ? $_POST['price']: '';
$phone =  isset($_POST['phone']) ? $_POST['phone']: '';
//$id_user =  isset($_POST['id_user']) ? $_POST['id_user']: '';
$id_ville_france =  isset($_POST['ville']) ? $_POST['ville']: '';
$id_ad = $_GET['id_ad'];*/

//$update = $database->update($pdo, "title, description, price, phone, id_user, id_ville_france", "ad", $array, '?,?,?,?,?,?');
$sql = "DELETE ad SET titre = '', description = '', price = '', phone = '', id_ville_france = '', WHERE id_ad = :id_ad";


if ($sql == false) {
    $verif->setArray(["Erreur lors de la suppression des éléments:"]);
} else {
    echo 'votre  annonce a été bien été supprimé';
}

/*if (count($verif->getArray()) > 0) {
  //  return header('Location: '.URL.'/?error='.$verif->getIndexError(0).'&title='.$_POST['title'].'&description='.$_POST['description'].'&price='.$_POST['price'].'&phone='.$_POST['telephone'].'&ville='.$_POST['ville']);
}*/

// header('Location: '.URL.'/search.php');

// }else{
//     header('Location: '.URL.'/index.php');
// }
// header('Location: '.URL.'/voir-annonce.php');