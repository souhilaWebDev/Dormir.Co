<?php
session_start();
if(!isset($_SESSION['email'])) { // Vérifie si l'utilisateur n'est pas connecté
    header("Location: login.php?error=Merci de vous connecter ! "); // Redirige l'utilisateur vers login
    exit;
}
require_once 'back-end/config.php';
require('class/database.php');
require_once 'back-end/voir-profil.php';
require_once('composant/header.php');
require_once('composant/navbar.php');
require_once('composant/sidebar.php');
    ?>
    
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profil</h1>
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
                            <h5 class="card-title">Détails du profil</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">
                                    <i class="bx bxs-contact"></i> Prénom : 
                                </div>
                                <div class="col-lg-9 col-md-8"><?=$user['firstname']?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                    <i class="bx bxs-contact"></i> Nom :
                                </div>
                                <div class="col-lg-9 col-md-8"><?=$user['lastname']?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                    <i class="bx bxs-envelope"></i> email :
                                </div>
                                <div class="col-lg-9 col-md-8"><?=$user['email']?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label"> 
                                <i class="bx bxs-phone"></i> Téléphone :
                                </div>
                                <div class="col-lg-9 col-md-8"><?=$user['phone']?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">
                                    <i class="bx bxs-calendar"></i> Date de création :
                                </div>
                                <div class="col-lg-9 col-md-8">
                                    <?=date('d-m-Y', strtotime($user['date_created']))?>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-lg-3 col-md-6 label">
                                    <i class="bi alarm-fille"></i><i class="bx bxs-calendar"></i> Date de mise à jour :</div>
                                <div class="col-lg-9 col-md-8">
                                <?=date('d-m-Y', strtotime($user['date_updated']))?>
                                </div>
                            </div>
                        </div>

<!-- file-earmark-person
file-person-fill -->


                    </div>
                </div>

                </div>
             </div>
        </section>

    </main><!-- End #main -->

<?php 
require_once('composant/footer.php');
?>

