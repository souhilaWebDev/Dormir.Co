<?php
require('./class/database.php');
$database = new Database();
$pdo = $database->connectDb();

$sql = "SELECT * FROM ad INNER JOIN villes_france on ad.id_ville_france = villes_france.ville_id WHERE id_user = (SELECT id_user FROM user WHERE email = '".$_SESSION['email']."')";
$result = $pdo->prepare($sql);
$result->execute();
$result =$result->fetchAll(PDO::FETCH_ASSOC);
?>