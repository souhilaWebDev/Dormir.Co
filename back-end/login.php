<?php 
session_start();
require('../class/verification.php');
require('../class/database.php');
require('./config.php');

$verif = new Verification();
// Verifier l'email et vérifier en base de donnée si il l'existe
$verif->Email($_POST['email']); 
// Récuperer si utilisateur existe
// init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->select($pdo, '*', 'user', ['email', $_POST['email']]);
// formalisation du résultat
$result = $result->fetchAll();

// Verfier si l'email de l'utilisateur existe 
if (count($result) <= 0) {
    $verif->setArray(["Email/Mot de passe incorrecte"]);
}

if (count($verif->getArray()) > 0) {
    return header('Location: '.URL.'/login.php?error='.$verif->getIndexError(0).'&email='.$_POST['email']);
    // return header('Location: http://localhost/login.php?error='.$verif->getIndexError(0).'&email='.$_POST['email']);
}

$verif->PasswordVerify($result[0]['password'], $_POST['password']);

if (count($verif->getArray()) > 0) {
    return header('Location:'.URL.'/login.php?error='.$verif->getIndexError(0).'&email='.$_POST['email']);
}

$_SESSION['id_user'] = $result[0]['id_user'];
$_SESSION['nom']     = $result[0]['firstname'];
$_SESSION['prenom']  = $result[0]['lastname'];
$_SESSION['email']   = $_POST['email'];

header('Location: '.URL.'/main.php'); 

?>