<?php 
    require('class/form.php');
    require_once('composant/header.php');
    session_start();
    if(isset($_SESSION['id_user'])) { // Vérifie si l'utilisateur est déjà connecté
        header("Location: main.php"); // Redirige l'utilisateur vers le tableau de bord
        exit;
    }
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
                    <h5 class="card-title text-center pb-0 fs-4">Inscription</h5>

                    <?php 
                    echo isset($_GET['error']) ? '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i>
                      Voici mon erreur! '.$_GET['error'].'
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>': ''; 

                  ?>
                    <p class="text-center small">Créer votre compte</p>
                  </div>

                  <form action="back-end/index.php" method="post" class="row g-3 needs-validation" novalidate>
                  
                  <?php 
                echo $form->Input("6", "nom", "Votre nom", "text", "Entrer un nom", $_GET['nom'] ?? '');
                echo $form->Input("6", "prenom", "Votre prénom", "text", "Entrer un prenom", $_GET['prenom'] ?? '');
                echo $form->Input("6", "email", "Votre email", "email", "Entrer un email", $_GET['email'] ?? '');
                echo $form->Input("6", "telephone", "Votre téléphone", "tel", "Entrer un téléphone", $_GET['telephone'] ?? '');
                echo $form->Input("6", "password", "Votre mot de passe", "password", "Entrer un mot de passe", '');
                echo $form->Input("6", "password2", "Votre confirmation de mot de passe", "password", "Entrer un mot de passe", '');
                echo $form->Input("12", "envoyer", "", "submit", "Inscription", 'Envoyer');
                ?>

                    <div class="col-12 d-flex justify-content-center">
                      <p class="medium mb-0">Vous avez déjà un compte? <a href="login.php">Se connecter</a></p>
                    </div>  
                  </form>

                </div>
              </div>

              <div class="credits">
              Réaliser par :<a href="#"> Les Perles Du Code</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

</body>
</html>