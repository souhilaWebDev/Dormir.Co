<?php
require('../class/database.php');
$database = new Database();
$id_user = $_GET['id_user'];
$id_ad = $_GET['id_annonce'];
$pdo = $database->connectDb();
$sql = 'DELETE FROM favorite WHERE id_user = :user and id_ad = :ad' ;
$suppFav = $pdo->prepare();
$suppFav->execute([
    'user' => $id_user,
    'ad' => $id_ad
]) or die(print_r($db->errorInfo()));
header('Location: '.URL.'/voir-mes-favories.php?msg=1');
?>