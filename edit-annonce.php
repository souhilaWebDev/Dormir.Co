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

    $id_ad = $_GET['id_ad'];
    $form = new Form();
    $database = new Database();
    $pdo = $database->connectDb();
    $result = $database->select($pdo, '*', 'ad', ['id_ad',$id_ad ]);
    $annonce = $result->fetch(PDO::FETCH_ASSOC);

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
                         <?php 
                            echo isset($_GET['error']) ? '
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <i class="bi bi-exclamation-octagon me-1"></i>
                             Erreur : ! '.$_GET['error'].'
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>': ''; 
                          ?>

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Modifier mon annonce</h5>
     <?php                      
      // Vérification si l'user existe
    if (!$annonce) {
        echo'<div class="card">
        <div class="col-lg-6">
            <div class="card-body">
                <h4 class="card-title"> l\'annonce n\'existe pas </h4>
            </div>
        </div>
      </div>';
    }else{    
        ?>    
            <form action="back-end/edit-annonce.php" method="post" class="row g-3 needs-validation" novalidate>
                      <?php 
                echo'<input type="hidden" id="id_ad" name="id_ad" value="'.$id_ad.'">
                ';
                echo $form->Input("6", "title", "Le titre", "text", "Entrer un  titre", $annonce['title'] ?? '');
                echo $form->Input("6", "address", "L'adresse", "text", "Entrer une adresse", $annonce['address'] ??  '');
                // ($size, $name, $label, $type, $placeholder, $value)
                echo'<div class="col-5">
                <label for="ville" class="form-label">La ville</label>
                <select id="ville" name="ville" class="form-select">
                
                <option value="" >Choisir la ville...</option>
                ';
                while($res = $result->fetch(PDO::FETCH_ASSOC)) { 
                    echo'<option value="'.$res['ville_id'].'" '.($res['ville_id'] == $annonce['id_ville_france'] ? 'selected' : '' ).'>'.$res['ville_nom'].'</option>';
                }
                echo'</select>
                </div>';
                // '.$annonce['ville'] ??  ''.'
                
                echo $form->Input("3", "price", "Le prix", "number\" step='.01'", "Entrer un prix", $annonce['price'] ?? '');
                echo $form->Input("4", "phone", "Le téléphone", "tel", "Entrer un téléphone", $annonce['phone'] ?? '');

                echo'<div class="col-12">
                    <label for="description" class="form-label">Votre discription</label>
                    <textarea name="description" id="description" class="form-control" style="height: 100px" required>'.($annonce['description'] ??  '').'</textarea>
                </div>';
                 echo $form->Input("12", "modifier", "", "submit", "Mettre à jour l'annonce", 'modifier');
                ?>
                  </form>

                        </div> 
                    </div>     
                </div>
            </div>
        </section>

    </main><!-- End #main -->

<?php }
require_once('composant/footer.php');
?>

