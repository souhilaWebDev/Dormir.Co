<?php 
session_start();
require('./class/database.php');
require_once('./class/verification.php');

$verif = new Verification();
/*// Verifier le nom 
$verif->Texte($_POST['title'], 'title');
// Verifier le prenom 
$verif->Texte($_POST['description'], 'description');
// Verifier l'email et vérifier en base de donnée si il l'existe
$verif->Texte($_POST['price'], 'price');
// Verifier le téléphone
$verif->Phone($_POST['phone']);
$verif->Texte($_SESSION['id_user'], 'id_user'); 
$verif->Texte($_POST['ville'], 'ville');*/

// init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
$result = $database->select($pdo, '*', 'ad', []);
// formalisation du résultat
$result = $result->fetchAll();

// Verfier si l'email de l'utilisateur existe 
if (count($result) <= 0) {
    $verif->setArray(["Aucun annonce"]);
} else{
   // $_SESSION['id_user'] = $result['id_user'];
  // var_dump($result);

}

if (count($verif->getArray()) > 0) {
  //  return header('Location: '.URL.'/search.php?error='.$verif->getIndexError(0).'&email='.$_POST['email']);
    // return header('Location: http://localhost/login.php?error='.$verif->getIndexError(0).'&email='.$_POST['email']);
}


/*if (count($verif->getArray()) > 0) {
    return header('Location:'.URL.'/login.php?error='.$verif->getIndexError(0).'&email='.$_POST['email']);
}*/


//header('Location: '.URL.'/main.php'); 

?>