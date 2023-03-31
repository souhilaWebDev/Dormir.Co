<?php
require_once 'back-end/config.php';
require('./class/database.php');

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=dormirco', 'root', '');

// Créer une nouvelle annoncez
if (isset($_POST['title']) && isset($_POST['description'])) {
    $titre = $_POST['title'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $requete = $bdd->prepare('INSERT INTO ad (title, description, prix) VALUES (:title, :description, :prix)');
    $requete->execute(array('title' => $title, 'description' => $description, 'prix' => $prix));
}

// Modifier une annonce existante
if (isset($_POST['id']) && isset($_POST['nouveau_titre']) && isset($_POST['nouvelle_description'])) {
    $id = $_POST['id'];
    $nouveau_titre = $_POST['nouveau_titre'];
    $nouvelle_description = $_POST['nouvelle_description'];
    $requete = $bdd->prepare('UPDATE ad SET titre = :nouveau_titre, description = :nouvelle_description WHERE id = :id');
    $requete->execute(array('nouveau_titre' => $nouveau_titre, 'nouvelle_description' => $nouvelle_description, 'id' => $id));
}

// Supprimer une annonce existante
if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];
    $requete = $bdd->prepare('DELETE FROM ad WHERE id = :id');
    $requete->execute(array('id' => $id));
}

// Afficher la liste des annonces
$requete = $bdd->query('SELECT * FROM ad');
while ($donnees = $requete->fetch()) {
    echo '<p>';
    echo '<strong>' . htmlspecialchars($donnees['title']) . '</strong> : ' . htmlspecialchars($donnees['description']) . htmlspecialchars($donnees['prix']);
    echo ' <a href="?supprimer=' . $donnees['id'] . '">Supprimer</a>';
    echo ' <a href="modifier.php?id=' . $donnees['id'] . '">Modifier</a>';
    echo '</p>';
}
?>
