<?php
require('./class/database.php');
$database = new Database();
$pdo = $database->connectDb();
// ($pdo, $champs, $table,$table2, $fusion, $where
$result = $database->selectLeftJoinWhereLike($pdo , '*','ad','villes_france','ad.id_ville_france = villes_france.ville_id','');

$result =$result->fetchAll(PDO::FETCH_ASSOC);
?>