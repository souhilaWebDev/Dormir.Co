<?php
session_start();
if(!isset($_SESSION['email'])) { // Vérifie si l'utilisateur n'est pas connecté
    header("Location: login.php?error=Merci de vous connecter ! "); // Redirige l'utilisateur vers login
    exit;
}
require_once 'back-end/config.php';
require('class/database.php');
require_once('back-end/voir-detail-annonce.php');
require_once('composant/header.php');
require_once('composant/navbar.php');
require_once('composant/sidebar.php');

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
                    <?php 
                            echo isset($_GET['msg']) ? '
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                              Voici mon message : '.$_GET['msg'].'
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>': ''; 
                          ?>

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Voir le détail d'une annonce </h5>
                        </div>

                    <?php
                        if($result){
                    ?>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><?=$result['title']?></h4>
                                        <h6 class="card-subtitle mb-2 text-muted"><i class="bi bi-pin-angle"></i>
                                        <i class="bi bi-map"></i> 
                                        
                                        <?=$result['address'] ?></h6>
                                        <p><?= $result['description']?>.</p>
                                    
                                        <div class="row pb-3">
                                            <div class="col-lg-6 text-danger">Prix : <?=$result['price']?> <i class="bi bi-currency-euro"></i></div>
                                            <div class="col-lg-6 text-primary"><i class="bi bi-geo-alt-fill"></i> Téléphone : <?=$result['phone']; ?>
                                            </div>
                                            
                                        </div>
                                        <div class="pb-3"><i class="bi bi-geo-alt-fill"></i> Ville : <?=$result['ville_slug'] ?>
                                        </div>
                                        <div class="pb-3"><i class="bi bi-mailbox2"></i> Code postal : <?=$result['ville_code_postal'] ?>
                                        </div>
                                        <div class="pb-3">cree par : <?=$result['firstname'].' '.$result['lastname']; ?><i class="bi bi-currency-euro"></i></div>
                                        <div class="pb-3">cree le : <?=$result['date_created']?><i class="bi bi-currency-euro"></i></div>
                                        <?php if($result['email'] ===  $_SESSION['email']){ ?>
                                            <p class="card-text text-center d-grid gap-2"><a href="edit-annonce.php?id_user=<?=$result['id_user']?>&msg=1" class="btn btn-primary">Mettre à jour l'annonce <i class="bi bi-pencil-square"></i></a></p>

                                        <?php }else{ ?>
                                        
                                            <p class="card-text text-center d-grid gap-2"><a href="voir-mes-favories.php?id_user=<?=$result['id_user']?>&msg=1" class="btn btn-warning">Ajouter à mes favoris <i class="bi bi-star me-1"></i></a></p>
                                        <?php } ?>
                                    </div>
                                </div>
                           


                                  
                                <?php
                               
                        }else{
                        echo'<div class="col-lg-6">
                                <div class="card-body">
                                    <h4 class="card-title"> Aucune annonce existe ! </h4>
                                </div>
                            </div>';

                        }?>
                    </div>
                </div>

             </div>
        </section>

    </main><!-- End #main -->

<?php 
require_once('composant/footer.php');
?>

