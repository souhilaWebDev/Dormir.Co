
<?php
require_once 'back-end/config.php';
require('./class/database.php');
require_once('./composant/header.php');
require_once('./composant/navbar.php');


if(isset($_POST['submit'])) {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];


  // Requête SQL pour insérer une nouvelle annonce dans la table "annonces"
    $sql = "INSERT INTO annonces (titre, description, prix) VALUES ('$titre', '$description', '$prix')";

    if ($conn->query($sql) === TRUE) {
    echo "Annonce créée avec succès";
    } else {
    echo "Erreur lors de la création de l'annonce: " . $conn->error;
    }
}
?>
