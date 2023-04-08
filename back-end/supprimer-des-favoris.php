<?php
require('../class/database.php');
$database = new Database();
$pdo = $database->connectDb();

$email = ['email', $_SESSION['email']];

$sql = 'DELETE FROM favorite WHERE id_user = :? and id_ad = :?';
$statement = $pdo->prepare($sql);

$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
header('Location: '.URL.'/voir-mes-favories.php?msg=1');
?>