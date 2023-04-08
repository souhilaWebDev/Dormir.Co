<?php require('./class/database.php');
require('./back-end/supprimer-annonce.php');
require_once('./composant/header.php');

require('class/form.php');
?>

<?php 
$database = new Database();
$pdo = $database->connectDb();
//$result = $result->fetchAll();
//$form = new Form();
?>

<main>
                <?php 
                echo '<div class="card-body">
                <div class="row">';
                foreach ($result as $key => $value) {
                echo '<div class="col-md-4">
                <div class="card">'
                .'<h1 class="m-2">'.$value[''].'</h1>'
                .'<h6 class="m-2">'.$value['']. '</h6>'.
                '<p class="text-danger m-5">'.
                $value['']. ' € ||| Téléphone : 
                '. $value['']  .'</p>'.  
                '<p class="text-danger m-5">'.$value[''].'</p>'.
                '<i>'.$value['date_created'].'</i>'.
                '<i>'.getVille($value['']).'</i>'.'
                /div>
                </div>';
            }
                echo '</div>
                </div>';

                function delete($id) {
                       // init object class database
    $database = new Database();
   // connexion bdd
    $pdo = $database->connectDb();
        $result = $database->select($pdo, '*', 'id_ad', ['id_ad',$id]);
        foreach ($result as $key => $value) {
            return $value['ville_slug'];
            }
        }
    ?>
            <div class="credits">
            Réaliser par :<a href="#"> Les Perles Du Code <i class="bi bi-gem"></i></a>
            </div>

</main><!-- End #main -->

</body>
</html>
