<?php
require('./class/database.php');
$email = $_SESSION['email'];
// $msg = $_GET['msg'] ;
$database = new Database();
$pdo = $database->connectDb();
// $sql = 'SELECT * FROM favorite JOIN ad on favorite.id_ad = ad.id_ad JOIN user ON favorite.id_user = user.id_user WHERE email = ?';
// ($pdo, $champs, $table,$table2, $fusion, $where
$sql = 'SELECT ad.* ,user.email, favorite.* , villes_france.ville_slug FROM favorite 
JOIN ad on favorite.id_ad = ad.id_ad
JOIN user ON favorite.id_user = user.id_user
JOIN villes_france ON ad.id_ville_france = villes_france.ville_id
WHERE email = ?';

$statement = $pdo->prepare($sql);

// autre solution plus sécuriser
// $stmt->bindParam(':id_annonce', $id_annonce, PDO::PARAM_INT);
// // Exécuter la requête SQL
// $stmt->execute();
$statement->execute([$email]);
// Récupérer les résultats
$result =$statement->fetchAll(PDO::FETCH_ASSOC);

?>