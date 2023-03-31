<?php
require_once 'back-end/config.php';
require('./class/database.php');
require_once('./composant/header.php');
require_once('./composant/navbar.php');


// Requête SQL pour récupérer toutes les annonces de la table "annonces"
$sql = "SELECT * FROM annonces";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Affichage des annonces sous forme de tableau
    echo "<table>
    <tr>
    <th>ID</th>
    <th>Titre</th>
    <th>Description</th>
    <th>Prix</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["titre"]."</td>
        <td>".$row["description"]."</td>
        <td>".$row["prix"]."</td>
    </tr>";
    }
    echo "</table>";
} else {
    echo "Aucune annonce trouvée";
}
?>
