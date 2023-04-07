<?php
require('./back-end/mes-annonces.php');
require_once('./composant/header.php');
//require_once('./composant/navbar.php');
require_once('./composant/sidebar.php');


    ?>
    
    <main id="main" class="main">
    <?php 
            
                echo '<div class="card-body">
                            <div class="row">';
                foreach ($result as $key => $value) {
                    echo '<div class="col-md-4">
                        <div class="card">'
                            .'<h1 class="m-2">'.$value['title'].'</h1>'
                            .'<h6 class="m-2">'.$value['description']. '</h6>'.
                            '<p class="text-danger m-5">'.
                                $value['price']. ' € ||| Téléphone : 
                            '. $value['phone']  .'</p>'.   
                        '
                        <a href="http://localhost/dormir.co/voir-plus.php/?id_ad=' . $value['id_ad']. '" class="btn btn-primary">Voir plus</a>
                        <a href="http://localhost/dormir.co/modifier-annonce.php/?id_ad=' . $value['id_ad']. '" class="btn btn-success mt-2">Modifier</a>
                        <a href="http://localhost/dormir.co/supprimer-annonce.php/?id_ad=' . $value['id_ad']. '" class="btn btn-success mt-2">Supprimer</a>
                        <a href="#" class="btn btn-warning mt-2">Favoris</a>
                        </div>
                    </div>';
                }
                echo '</div>
                
                 </div>';
            
        ?>
        
    </main><!-- End #main -->

<?php 
//require_once('composant/footer.php');
//}
?>

