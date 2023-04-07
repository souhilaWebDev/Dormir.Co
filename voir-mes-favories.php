<?php
session_start();
if (!isset($_SESSION['email'])) { // Vérifie si l'utilisateur n'est pas connecté
    header("Location: login.php?error=Merci de vous connecter ! "); // Redirige l'utilisateur vers login
    exit;
}
require_once './back-end/config.php';
require('./back-end/voir-favoris.php');
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
                              Voici mon message : ' . $_GET['msg'] . '
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>' : '';
                    ?>

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title">Les favoris de <?= $result['firstname'] ?></h5>
                    </div>

                    <!-- taper votre partie de code  ici  -->
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> <?= $result['id_user'] ?></h4>
                            <h6 class="card-subtitle mb-2 text-muted"><i class="bi bi-pin-angle"></i> <?= $nameResult['title'] ?></h6>
                            <p><?= $nameResult['description'] ?></p>
                           
                            <div class="row pb-3">
                                <div class="col-lg-4 text-danger"><?= $nameResult[0]->price ?> <i class="bi bi-currency-euro"></i></div>
                                <div class="col-lg-4 text-primary"><i class="bi bi-geo-alt-fill"></i> <?= $nameResult['address'] ?></div>
                                <div class="col-lg-4 text-body-bg"> <a href="./back-end/voir-favoris.php" method="POST"><i class="bi bi-heart"> </a></i> </div>
                            </div>
                                <div class="row pb-3">
                                <div class="col  text-danger">
                                <p class="card-text text-center d-grid gap-2"><a href="#" class="btn btn-primary"> Retirer des favoris<i class="bi bi-trash3"></i></a></p>
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
?>
