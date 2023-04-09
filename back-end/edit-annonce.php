<?php 
session_start();
require('./config.php');
require_once('../class/database.php');
require_once('../class/verification.php');
// var_dump($_POST);
// Vérifier si le formulaire a été envoyer
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$verif = new Verification();
   // Verification des inputs
$verif->Texte($_POST['title'], 'title');
$verif->Texte($_POST['address'], 'address');
$verif->Number($_POST['ville'], 'ville');
$verif->Number($_POST['price'], 'price');
$verif->Phone($_POST['phone']);
$verif->Textelong($_POST['description'], 'description');
    
if (count($verif->getArray()) > 0) {
    return header('Location: '.URL.'/edit-annonce.php?error='.$verif->getIndexError(0));
}
if(!isset($_SESSION['id_user'])){
    $database = new Database();
    $pdo = $database->connectDb();
    // on recupere le id_user 
    $result = $database->select($pdo, '*', 'user', ['email', $_SESSION['email']]);
    $result = $result->fetchAll();
    $_SESSION['id_user'] = $result[0]['id_user'];
  }  

    $champs_updated =[
        
        'title = \''.$_POST['title'].'\'',
        'description = \''.addslashes(strip_tags($_POST['description'])).'\'',
        'price = '.$_POST['price'].'',
        'phone = \''.$_POST['phone'].'\'',
        'address = \''.$_POST['address'].'\'',
        'date_updated = \''.date("Y-m-d H:i:s").'\'',
        'id_user = \''.$_SESSION['id_user'].'\'',
        'id_ville_france = \''.$_POST['ville'].'\''
    ];

 
    $database = new Database();
    $pdo = $database->connectDb();
  
    $update = $database->update($pdo, $champs_updated, "ad", ['id_ad', $_POST['id_ad']]);
// var_dump($update);die();
    if ($update == false) {
        $verif->setArray(["L'annonce n'a pas pu être mise à jour"]);
    }
    
    if (count($verif->getArray()) > 0) {
    return header('Location: '.URL.'/edit-annonce.php?error='.$verif->getIndexError(0));
    }

    $verif->setArray(["Annonce mis à jour avec success"]);
    // Rediriger l'utilisateur vers la page de ses annonces
    header('Location:'.URL.'/voir-mes-annonces.php?msg='.$verif->getIndexError(0));
    exit();
}else{
    header('Location:'.URL.'/voir-mes-annonces.php');
}
?>
