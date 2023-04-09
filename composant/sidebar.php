<?php
  require_once './back-end/config.php';
?>  
  
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?=URL?>/search.php">
          <i class="bi bi-grid"></i>
          <span>Tableau de bord</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=URL?>/voir-profil.php">
          <i class="bi bi-person-lines-fill"></i>
          <span>Voir profil</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=URL?>/edit-profil.php">
        <i class="bi bi-pencil-square"></i>
          <span>Modifier profil</span>
        </a>
      </li><!-- End Profile Page Nav -->
      

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=URL?>/voir-annonces.php">
        <i class="bi bi-card-list"></i>
          <span>Voir les Annonces</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=URL?>/search.php">
        <i class="bi bi-search"></i>
          <span>Recherche une annonce</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=URL?>/voir-mes-annonces.php">
        <i class="bi bi-card-checklist"></i>
          <span>Mes Annonces</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=URL?>/creer-une-annonce.php">
        <i class="bi bi-clipboard-plus"></i>
          <span>Ajouter une Annonce</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=URL?>/voir-mes-favories.php">
          <i class="bi bi-bookmark-star"></i>
          <span>Mes Favoris</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=URL?>/back-end/deconnexion.php">
          <i class="bi bi-box-arrow-right"></i>
          <span>Déconnexion</span>
        </a>
      </li><!-- End Logout Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->