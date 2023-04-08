<?php
session_start();
if(!isset($_SESSION['email'])) { // Vérifie si l'utilisateur n'est pas connecté
    header("Location: login.php?error=Merci de vous connecter ! "); // Redirige l'utilisateur vers login
    exit;
}
require_once 'back-end/config.php';
require('class/database.php');
require_once('composant/header.php');
require_once('composant/navbar.php');
require_once('composant/sidebar.php');
  
    $database = new Database();
    $pdo = $database->connectDb();
    $result = $database->select($pdo, '*', 'user', ['email', $_SESSION['email']]);
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
                    <?php 
                            echo isset($_GET['msg']) ? '
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                              Voici mon message : '.$_GET['msg'].'
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>': ''; 
                          ?>

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Titre de la page</h5>
                        </div>

                    <!-- taper votre partie de code  ici  -->


                 



                    </div>
                </div>

             </div>
        </section>

    </main><!-- End #main -->

<?php 
require_once('composant/footer.php');
?>

