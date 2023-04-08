<?php
session_start();
if(!isset($_SESSION['email'])) { // Vérifie si l'utilisateur n'est pas connecté
    header("Location: login.php?error=Merci de vous connecter ! "); // Redirige l'utilisateur vers login
    exit;
}
require_once 'back-end/config.php';
require('class/database.php');
require('class/form.php');
require_once('composant/header.php');
require_once('composant/navbar.php');
require_once('composant/sidebar.php');
$form = new Form();
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->select($pdo, 'ville_id, ville_nom', 'villes_france','');

                
               
                
?>
    
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Annonce</h1>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Ajouter une annonce</h5>
                        </div>
                        <?php 
                            echo isset($_GET['error']) ? '
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <i class="bi bi-exclamation-octagon me-1"></i> '.$_GET['error'].'
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>': ''; 
                          ?>

                  <form action="back-end/creer-une-annonce.php" method="post" class="row g-3 needs-validation" novalidate>
                      <?php 
                echo $form->Input("6", "title", "Le titre", "text", "Entrer un  titre", $_GET['title'] ?? '');
                echo $form->Input("6", "address", "L'adresse", "text", "Entrer une adresse", $_GET['address'] ??  '');
                // ($size, $name, $label, $type, $placeholder, $value)
                echo'<div class="col-5">
                <label for="ville" class="form-label">La ville</label>
                <select id="ville" name="ville" class="form-select">
                
                <option value="" selected>Choisir la ville...</option>
                ';
                while($res = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo'<option value="'.$res['ville_id'].'">'.$res['ville_nom'].'</option>';
                }
                echo'</select>
                </div>';
                // '.$_GET['ville'] ??  ''.'
                
                echo $form->Input("3", "price", "Le prix", "number\" step='.01'", "Entrer un prix", $_GET['price'] ?? '');
                echo $form->Input("4", "phone", "Le téléphone", "tel", "Entrer un téléphone", $_GET['phone'] ?? '');

                echo'<div class="col-12">
                    <label for="description" class="form-label">Votre discription</label>
                    <textarea name="description" id="description" class="form-control" style="height: 100px" required></textarea>
                </div>';
                 echo $form->Input("12", "ajouter", "", "submit", "Ajouter une annonce", 'ajouter');
                ?>
                  </form>


                  </div>
                </div>

             </div>
        </section>

    </main><!-- End #main -->

<?php 
require_once('composant/footer.php');
?>
