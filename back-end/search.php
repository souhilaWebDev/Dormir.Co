<?php
require('./class/database.php');
$database = new Database();
//  Il SELECT - from ad LEFT JOIN villes_france on ad.id_ville_france . villes_france.ville_id where ville_slug like
$pdo = $database->connectDb();
$result = $database->selectLeftJoinWhereLike($pdo , '*','ad', 'villes_france', 'ad.id_ville_france = villes_france.ville_id',['ville_slug', $_GET['text'].'%']);
$result =$result->fetchAll(PDO::FETCH_ASSOC);

?>