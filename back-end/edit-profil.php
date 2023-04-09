<?php 
session_start();
require('./config.php');
require_once('../class/database.php');
require_once('../class/verification.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $verif = new Verification();
    // Verifier le nom 
    $verif->Texte($_POST['nom'], 'nom');
    // Verifier le prenom 
    $verif->Texte($_POST['prenom'], 'prenom');
    // Verifier l'email et vérifier en base de donnée si il l'existe
    $verif->Email($_POST['email']); 
    // Verifier le téléphone
    $verif->Phone($_POST['telephone']);
    // Verifier le mot de passe
    // Verifier le mot de passe et que le confirme mot de passe soit identique
    if($_POST['password'] !== '12345678'){
        $hash = $verif->Password($_POST['password'], $_POST['password2']);
    }
    
if (count($verif->getArray()) > 0) {
    return header('Location: '.URL.'/edit-profil.php?error='.$verif->getIndexError(0));
}
    
$database = new Database();
$pdo = $database->connectDb();
if($_POST['password'] !== '12345678'){
    $champs_updated =[

        'lastname = \''.$_POST['nom'].'\'',
        'firstname = \''.$_POST['prenom'].'\'',
        'email = \''.$_POST['email'].'\'',
        'phone = \''.$_POST['telephone'].'\'',
        'date_updated = \''.date("Y-m-d H:i:s").'\'',
        'password = \''.$hash.'\''
        // ($_POST['password'] !== '12345678')? "password=.{$hash}" :" "
    ];
}else{
    $champs_updated =[
        'lastname = \''.$_POST['nom'].'\'',
        'firstname = \''.$_POST['prenom'].'\'',
        'email = \''.$_POST['email'].'\'',
        'phone = \''.$_POST['telephone'].'\'',
        'date_updated = \''.date("Y-m-d H:i:s").'\''
    ];
}

// Préparer la requête SQL pour mettre à jour l'utilisateur
// $requete = $connexion->prepare("UPDATE utilisateurs SET nom = :nom, email = :email WHERE id = :id");

// Exécuter la requête avec les valeurs des paramètres
// $requete->execute(array(
    //     'nom' => $nom,
    //     'email' => $email,
    //     'id' => $utilisateur['id']
    // ));
  
    $update = $database->update($pdo, $champs_updated, "user", ['email', $_POST['email']]);



    if ($update == false) {
        $verif->setArray(["L'utilisateur n'a pas pu être mise à jour"]);
    }
    
    if (count($verif->getArray()) > 0) {
        return header('Location: '.URL.'/edit-profil?error='.$verif->getIndexError(0).'&nom='.$_POST['nom'].'&prenom='.$_POST['prenom'].'&email='.$_POST['email'].'&telephone='.$_POST['telephone']);
    }

    
    $verif->setArray(["Profil mis à jour avec success"]);
    // Rediriger l'utilisateur vers sa page de profil
    header('Location:'.URL.'/voir-profil.php?msg='.$verif->getIndexError(0));
    exit();
}
?>
