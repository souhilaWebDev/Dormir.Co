<?php
require_once('class/database.php');
//verification si id_user est deja stocker dans $_session
if(!isset($_SESSION['id_user'])){
    $database = new Database();
    $pdo = $database->connectDb();
    // on recupere le id_user 
    $result = $database->select($pdo, '*', 'user', ['email', $_SESSION['email']]);
    $result = $result->fetchAll();
    $_SESSION['id_user'] = $result[0]['id_user'];
  }
  $array = [
    $_SESSION['id_user'],
    $result['id_ad']
 ];
 //verification si l annonce est deja ajouté comme favoris 
$database = new Database();
$pdo = $database->connectDb();
$sql = 'SELECT * FROM favorite WHERE id_user = ? AND id_ad = ? ';
$statement = $pdo->prepare($sql);
$statement->execute($array);
$favoris = $statement->fetchAll();
if (count($favoris) > 0) {
}

if($result['email'] ===  $_SESSION['email']){ ?>
    <p class="card-text text-center d-grid gap-2"><a href="edit-annonce.php?id_user=<?=$result['id_user']?>&msg=1" class="btn btn-primary">Mettre à jour l'annonce <i class="bi bi-pencil-square"></i></a></p>
<?php 
}elseif(count($favoris) > 0){ ?>
    <p class="card-text text-center d-grid gap-2"><a href="voir-mes-favories.php" class="btn btn-warning">Annonce déja favorite<i class="bi bi-star-fill text-warning"></i></a></p>

<?php
}else{?>
    <p class="card-text text-center d-grid gap-2"><a href="back-end/ajouter-favoris.php?id_ad=<?=$result['id_ad']?>" class="btn btn-warning">Ajouter à mes favoris <i class="bi bi-star me-1"></i></a></p>
<?php } ?>