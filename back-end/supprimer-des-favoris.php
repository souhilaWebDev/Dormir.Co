<?php
require('../class/database.php');
$database = new Database();
$pdo = $database->connectDb();

$email = ['email', $_SESSION['email']];

$sql = 'DELETE  * FROM favorite WHERE id_ad = ?';
$statement = $pdo->prepare($sql);
//exactement

$statement->execute([$email]);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>