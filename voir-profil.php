<?php
require_once 'back-end/config.php';
require('./class/database.php');
require_once('./composant/header.php');
require_once('./composant/navbar.php');
require_once('./composant/sidebar.php');

if(!isset($_SESSION['id_user'])) {
    return header('Location: '.URL.'/login.php?error=Merci de vous connecter');
}else{

    $database = new Database();
    $pdo = $database->connectDb();
    $result = $database->select($pdo, '*', 'user', ['id_user', $_SESSION['id_user']]);
    $user = $result->fetch(PDO::FETCH_ASSOC);

    // Vérification si l'utilisateur existe
    if (!$user) {
        echo "Utilisateur n'existe pas.";
        exit();
    }
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

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        
                            <h5 class="card-title">Détails du profil</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Prénom : </div>
                                <div class="col-lg-9 col-md-8"><?=$user['firstname']?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Nom</div>
                                <div class="col-lg-9 col-md-8"><?=$user['lastname']?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">email</div>
                                <div class="col-lg-9 col-md-8"><?=$user['email']?></div>
                            </div>

                            
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Téléphone</div>
                                <div class="col-lg-9 col-md-8"><?=$user['phone']?></div>
                            </div>

                            
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Date de création</div>
                                <div class="col-lg-9 col-md-8">
                                    <?=date('d-m-Y', strtotime($user['date_created']))?>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Date de dernière mise à jour</div>
                                <div class="col-lg-9 col-md-8">
                                <?=date('d-m-Y', strtotime($user['date_updated']))?>
                                </div>
                            </div>
                        </div>

                    

                    </div>
                </div>

                </div>
             </div>
        </section>

    </main><!-- End #main -->

<?php 
require_once('composant/footer.php');
}?>

