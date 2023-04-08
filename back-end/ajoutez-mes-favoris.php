<?php
$database = new Database();
$pdo = $database->connectDb();
$id_annonce = $_GET['id_annonce'];

$insert = $database->insert($pdo, "id_user, id_ad", " favorite ", $array, '?,?,?,?,?');

$sql = 'SELECT * FROM favorite WHERE ad.id_ad = ?';

$statement = $pdo->prepare($sql);
// autre solution plus sécuriser
// $stmt->bindParam(':id_annonce', $id_annonce, PDO::PARAM_INT);
// // Exécuter la requête SQL
// $stmt->execute();
$statement->execute([$id_annonce]);
// Récupérer les résultats
$result =$statement->fetch(PDO::FETCH_ASSOC);
?>