<?php require_once('testAdmin.php') ?>
<?php require_once('bib/header.inc.php') ?>
<h1>Les livres <a href="productAdd.php">Ajouter</a></h1>
<?php 
//préparer une requete pour récupérer TOUS les users
$query = "SELECT * FROM livres ORDER BY titre ASC";

$result = $connectPDO->query($query);

if($result->rowCount()>0){

echo 'ok';
}else{
echo '<h3>Aucun livre dans la base de données</h3>';
}


require_once('bib/footer.inc.php') ?>