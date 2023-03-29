<?php
  require_once './back-end/config.php';
  session_start();
?>
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="<?=URL?>/assets/img/logo.png" alt="Dormic.Co">
      </a>
      <?php if(isset($_SESSION['email'])){ ?>
      <i class="bi bi-list toggle-sidebar-btn"></i>
      <?php } ?>
    </div><!-- End Logo -->
<?php if(isset($_SESSION['email'])){ ?>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- PHOTO USER -->
            <span class="d-md-block dropdown-toggle ps-2"><?=$_SESSION['prenom'].' '.$_SESSION['nom']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=URL?>/voir-profil.php">
                <i class="bi bi-person"></i>
                <span>Mon Profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=URL?>/back-end/deconnexion.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Déconnexion</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
<?php } ?>
  </header><!-- End Header -->

<?php

  $a = '<nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">';
        $nav = isset($_SESSION['email']) ? '<ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Mon profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Mes annonces</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ">Mes favoris</a>
          </li>
        </ul>' : '<ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>';
    $button = isset($_SESSION['email']) ? '<a class="btn btn-outline-danger" href="'.URL.'/back-end/deconnexion.php">Deconnexion</a>' : '
      <a class="btn btn-outline-success m-1" href="'.URL.'/index.php">Inscription</a>
      <a class="btn btn-success m-1" href="'.URL.'/login.php">Connexion</a>
    ';
    $b = '</div>
    </div>
  </nav>';

  echo $a.$nav.$button.$b;
?>