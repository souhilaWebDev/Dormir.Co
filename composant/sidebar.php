<?php
  require_once './back-end/config.php';
?>  
  
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="bi bi-grid"></i>
          <span>Tableau de bord</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=URL?>/voir-profil.php">
          <i class="bi bi-person-lines-fill"></i>
          <span>Voire profil</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=URL?>/edit-profil.php">
        <i class="bi bi-pencil-square"></i>
          <span>Modifier profil</span>
        </a>
      </li><!-- End Profile Page Nav -->
      

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=URL?>/annonce.php">
        <i class="bi bi-card-list"></i>
          <span>Voir les Annonces</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
        <i class="bi bi-card-checklist"></i>
          <span>Mes Annonces</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
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