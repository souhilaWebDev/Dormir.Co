<?php
$database = new Database();
$pdo = $database->connectDb();
$id_annonce = $_GET['id_annonce'];

$sql = 'SELECT * FROM ad
JOIN villes_france ON ad.id_ville_france = villes_france.ville_id
JOIN user ON ad.id_user = user.id_user
-- WHERE ad.id_ville = ?
 WHERE ad.id_ad = ?';

$statement = $pdo->prepare($sql);
// autre solution plus sécuriser
// $stmt->bindParam(':id_annonce', $id_annonce, PDO::PARAM_INT);
// // Exécuter la requête SQL
// $stmt->execute();
$statement->execute([$id_annonce]);
// Récupérer les résultats
$result =$statement->fetch(PDO::FETCH_ASSOC);
?>