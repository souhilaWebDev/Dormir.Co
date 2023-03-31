<?php
require_once 'back-end/config.php';
require('./class/database.php');
require_once('./composant/header.php');
require_once('./composant/navbar.php');


if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];


  // Requête SQL pour mettre à jour une annonce dans la table "annonces"
    $sql = "UPDATE annonces SET titre='$titre', description='$description', prix='$prix' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Annonce mise à jour avec succès";
        } else {
            echo "Erreur lors de la mise à jour de l'annonce: " . $conn->error;
        }
}
?>
