<?php 
    require('class/form.php');
    require('composant/header.php');
    $form = new Form();
 
    session_start();
    if(isset($_SESSION['id_user'])) { // Vérifie si l'utilisateur est déjà connecté
        header("Location: main.php"); // Redirige l'utilisateur vers le tableau de bord
        exit;
    }
?>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">Dormir Co.</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

              <div class="card-body">
                        
                      <div class="pt-4 pb-2">
                      <?php 
                            echo isset($_GET['error']) ? '
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <i class="bi bi-exclamation-octagon me-1"></i> '.$_GET['error'].'
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>': ''; 
                          ?>
                        <h5 class="card-title text-center pb-0 fs-4">Se connecter</h5>
                      </div>

                      <form class="row g-3 needs-validation" novalidate  action="<?=URL?>/back-end/login.php" method="post">

                            <?php 
                          echo $form->Input("12", "email", "Votre email", "email", "Entrer un email", '');
                          echo $form->Input("12", "password", "Votre mot de passe", "password", "Entrer un mot de passe", '');
                          echo $form->Input("12 mt-3 pt-3", "login", "", "submit", "Se Connecter", 'Valider');
                          ?>

                        <div class="col-12">
                          <p class="small mb-0">Vous n'avez pas de compte ? <a href="index.php">Créer un compte</a></p>
                        </div>
                      </form>

                    </div>
                  </div>

                  </div>
                </div>
              </div>
              <div class="credits">
                Réaliser par :  <a href="#">Les Perles Du Code <i class="bi bi-gem"></i></a>
              </div>
      </section>
    </div>
  </body>
</html>