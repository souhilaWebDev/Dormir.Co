<?php
require_once 'back-end/config.php';
require('./class/database.php');
require_once('./composant/header.php');
require_once('./composant/navbar.php');


if(isset($_POST['submit'])) {
    $id = $_POST['id'];

  // Requête SQL pour supprimer une annonce de la table "annonces"
    $sql = "DELETE FROM annonces WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
    echo "Annonce supprimée avec succès";
    } else {
        echo "Erreur lors de la suppression de l'annonce: " . $conn->error;
    }
}
