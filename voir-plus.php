<?php
require('./back-end/voir-plus.php');
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
                            '<p class="text-danger m-5">'.$value['address'].'</p>'.
                            '<i>'.$value['date_created'].'</i>'.
                            '<i>'.getVille($value['id_ville_france']).'</i>'.
                            
                        '
                        </div>
                    </div>';
                }
                echo '</div>
                </div>';


                function getVille($id) {
                    // init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
                    $result = $database->select($pdo, '*', 'villes_france', ['ville_id',$id]);
                    foreach ($result as $key => $value) {
                        return $value['ville_slug'];
                    }
                }
        ?>
        
    </main><!-- End #main -->

<?php 
//require_once('composant/footer.php');
//}
?>

