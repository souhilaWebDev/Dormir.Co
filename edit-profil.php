<?php
session_start();
if(!isset($_SESSION['email'])) { // Vérifie si l'utilisateur n'est pas connecté
    header("Location: login.php?error=Merci de vous connecter ! "); // Redirige l'utilisateur vers login
    exit;
}
require_once ('back-end/config.php');
require_once('./class/database.php');
require_once('./class/form.php');
require_once('./composant/header.php');
require_once('./composant/navbar.php');
require_once('./composant/sidebar.php');

if(!isset($_SESSION['email'])) {
    header('Location: '.URL.'/login.php?error=Merci de vous connecter');
}else{
    $form = new Form();
    $database = new Database();
    $pdo = $database->connectDb();
    $result = $database->select($pdo, '*', 'user', ['email', $_SESSION['email']]);
    $user = $result->fetch(PDO::FETCH_ASSOC);
   
    // Vérification si l'user existe
    if (!$user) {
        echo "user n'existe pas.";
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
                         <?php 
                            echo isset($_GET['error']) ? '
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <i class="bi bi-exclamation-octagon me-1"></i>
                             Erreur : ! '.$_GET['error'].'
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>': ''; 
                          ?>



                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Modifier mon profil</h5>
                        

                            <form action="back-end/edit-profil.php" method="post" class="row g-3 needs-validation" novalidate> 
                            <?php 
                                echo $form->Input("6", "nom", "Votre nom", "text", "Entrer un nom", $user['lastname'] ?? '');
                                echo $form->Input("6", "prenom", "Votre prénom", "text", "Entrer un prenom", $user['firstname'] ?? '');
                                echo $form->Input("6", "email", "Votre email", "email", "Entrer un email", $user['email'] ?? '');
                                echo $form->Input("6", "telephone", "Votre téléphone", "tel", "Entrer un téléphone", $user['phone'] ?? '');
                                echo $form->Input("6", "password", "Votre nouveau mot de passe", "password", "Entrer un mot de passe", '12345678');
                                echo $form->Input("6", "password2", "Votre confirmation de mot de passe", "password", "Entrer un mot de passe", '12345678');
                                echo $form->Input("12", "envoyer", "", "submit", "Mettre à jour", 'Envoyer');
                            ?>
                            </form>
                        </div> 
                    </div>     
                </div>
            </div>
        </section>

    </main><!-- End #main -->

<?php 
require_once('composant/footer.php');
}?>

