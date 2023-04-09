<?php
session_start();
if(!isset($_SESSION['email'])) { // Vérifie si l'utilisateur n'est pas connecté
    header("Location: login.php?error=Merci de vous connecter ! "); // Redirige l'utilisateur vers login
    exit;
}
require_once 'back-end/config.php';
require('class/form.php');
require_once('back-end/voir-mes-annonces.php');
require_once('composant/header.php');
require_once('composant/navbar.php');
require_once('composant/sidebar.php');
 
$form = new Form();

    ?>
    
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Annonces</h1>
        </div><!-- End Page Title -->
        <div class="card">
            <?php 
              echo isset($_GET['msg']) ? '
              <div class="m-4 alert alert-success alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle me-1"></i>
                Voici mon message : '.$_GET['msg'].'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>': ''; 
            ?>
            <div class="row">
            <?php if(empty($result)){
            echo'
                    <div class="col-lg-6">
                        <div class="card-body">
                            <h4 class="card-title"> Aucun résultat pour l\'instant </h4>
                        </div>
                    </div>
                  </div>';

            }else{?>

<!-- // debut du tableau  -->
                
                <div class="card-body">
                  <h5 class="card-title">Toutes Mes annonces</h5>
                 
                  <!-- Table with hoverable rows -->
                  <table class="table table-hover ">
                    <thead>
                      <tr >
                        <th scope="col">#</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Date de mise à jour</th>
                        <th class=" text-center" scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
             $i = 1;
             foreach ($result as $key => $value) {
                
                 ?>   
                      <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?=$value['title']?></td>
                        <td><?=$value['ville_slug']?> </td>
                        <td><?=$value['price']?> </td>
                        <td><?=date('d-m-Y', strtotime($value['date_updated']))?></td>
                        <td class=" text-center">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a  href="<?=URL?>/back-end/supprimer-annonce.php?id_ad=<?=$value['id_ad']?>" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Supprimer"><i class="bi bi-trash"></i></a>
                                <a href="<?=URL?>/edit-annonce.php?id_ad=<?=$value['id_ad']?>" class="btn btn-primary" data-bs-toggle="tooltip"  data-bs-placement="bottom" data-bs-original-title="Modifier"><i class="bi bi-pencil-square"></i></a>
                                <a href="voir-detail-annonce.php?id_annonce=<?=$value['id_ad']?>" class="btn btn-success" data-bs-toggle="tooltip"  data-bs-placement="right" data-bs-original-title="Consulter"><i class="bi bi-text-paragraph"></i></a>

                               
                            </div>
                        </td>
                      </tr>
                 
                <?php $i++; }  ?>      
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->
    
                </div>
              </div>
              <?php  } ?>  
                </div>
               
    </main><!-- End #main -->

<?php require_once('composant/footer.php');
?>