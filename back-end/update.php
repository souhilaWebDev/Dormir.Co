<?php
session_start();
require('../class/verification.php');
require('../class/database.php');
$verif = new Verification();
$update = "UPDATE ad SET titre = :titre, description = :description, price = :price, phone = :phone, id_ville_france = :id_ville_france, WHERE id_ad = :id_ad";

//var_dump($update);

if ($update == true) {
echo 'Modification prise en compte';
}else {
echo 'Erreur lors de la modification de l annonce';
}
?>