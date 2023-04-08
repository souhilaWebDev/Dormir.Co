<?php
session_start();
if(!isset($_SESSION['email'])) { // Vérifie si l'utilisateur n'est pas connecté
    header("Location: login.php?error=Merci de vous connecter ! "); // Redirige l'utilisateur vers login
    exit;
}
require_once 'back-end/config.php';
require('class/form.php');
require_once('back-end/voir-annonces.php');
require_once('composant/header.php');
require_once('composant/navbar.php');
require_once('composant/sidebar.php');
 
$form = new Form();

    ?>
    
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Annonces</h1>
        </div><!-- End Page Title -->
        <section class="section profile">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Toutes les annonces</h5>
                        </div>

            <div class="row">
            <?php if(empty($result)){
               echo'<div class="col-lg-6">
                        <div class="card-body">
                            <h4 class="card-title"> Aucun résultat pour l\'instant </h4>
                        </div>
                    </div>';
            }else{
             foreach ($result as $key => $value) {
                 ?>     
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?=$value['title']?></h4>
                            <h6 class="card-subtitle mb-2 text-muted"><i class="bi bi-pin-angle"></i> <?=$value['address'] ?></h6>
                            <p><?= substr($value['description'], 0, 100)?>.</p>
                           
                            <div class="row pb-3">
                                <div class="col-lg-6 text-danger">Prix : <?=$value['price']?> <i class="bi bi-currency-euro"></i></div>
                                <div class="col-lg-6 text-primary"><i class="bi bi-geo-alt-fill"></i> Ville : <?=$value['ville_slug']?> </div>
                            </div>
                            <p class="card-text text-center d-grid gap-2"><a href="voir-detail-annonce.php?id_annonce=<?=$value['id_ad']?>" class="btn btn-primary">Voir plus <i class="bi bi-plus-circle"></i></a></p>
                        </div>
                    </div>
                </div>
                <?php } } ?>        

            </div>
    </main><!-- End #main -->

<?php require_once('composant/footer.php');
?>