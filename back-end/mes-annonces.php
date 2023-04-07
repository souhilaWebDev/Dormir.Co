<?php 
session_start();
require('./class/database.php');
require_once('./class/verification.php');

$verif = new Verification();

$database = new Database();
$pdo = $database->connectDb();
$email = "email";
//$result = $database->select($pdo, '*', 'ad', ['email', $_SESSION['email']]);
$sql = "SELECT * FROM ad WHERE email = :email";
$result = $result->fetchAll();

if (count($result) > 0) {
    $verif->setArray(["Aucun annonce"]);
} else{
    $_SESSION['id_user'] = $result['id_user'];
    var_dump($result);

}

if (count($verif->getArray()) > 0) {
}

?>