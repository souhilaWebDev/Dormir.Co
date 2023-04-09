<?php
require('./class/database.php');
$database = new Database();
$pdo = $database->connectDb();
$result = $database->selectLeftJoinWhereLike($pdo , '*','ad', 'villes_france', 'ad.id_ville_france = villes_france.ville_id',['ville_slug', $_GET['text'].'%']);
$result =$result->fetchAll(PDO::FETCH_ASSOC);

?>