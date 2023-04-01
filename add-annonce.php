<?php 
    require('class/form.php');
    require_once('composant/header.php');
    session_start();
    // if(isset($_SESSION['id_user'])) { // Vérifie si l'utilisateur est déjà connecté
    //     header("Location: main.php"); // Redirige l'utilisateur vers le tableau de bord
    //     exit;
    // }
    $form = new Form();
?>
<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class=" d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">Dormir Co.</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">


                  <div class="pt-2 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Annonce</h5>

                    <?php 
                    echo isset($_GET['error']) ? '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i>
                      Voici mon erreur! '.$_GET['error'].'
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>': ''; 

                  ?>
                    <p class="text-center small">Créer une annonce</p>
                  </div>

                  <form action="back-end/add-annonce.php" method="post" class="row g-3 needs-validation" novalidate>
                  
                  <?php 
                echo $form->Input("6", "title", "Le titre", "text", "Entrer un  titre", $_GET['title'] ?? '');
                echo $form->Input("6", "description", "La description", "text", "Entrer une description", $_GET['description'] ?? '');
                echo $form->Input("6", "price", "Le prix", "prix", "Entrer un prix", $_GET['price'] ?? '');
                echo $form->Input("6", "phone", "Votre téléphone", "tel", "Entrer un téléphone", $_GET['phone'] ?? '');
                echo $form->Input("6", "adress", "Votre adresse", "adresse", "Entrer une adresse", $_GET['adress'] ??  '');
                // echo $form->Input("6", "ville", "Votre ville", "ville", "Entrer une ville", $_GET['ville'] ??  '');
                 $form->select();
                 echo $form->Input("12", "Ajouter", "", "submit", "Ajouter", 'Ajouter');
                ?>

                    <div class="col-12 d-flex justify-content-center">
                      <p class="medium mb-0">Vous avez déjà un compte? <a href="login.php">Se connecter</a></p>
                    </div>  
                  </form>

                </div>
              </div>

              <div class="credits">
              Réaliser par :<a href="#"> Les Perles Du Code <i class="bi bi-gem"></i></a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

</body>
</html>