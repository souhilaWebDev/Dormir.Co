<?php require('./class/database.php');
    require_once('composant/header.php');
require_once('./class/verification.php');
require('class/form.php');
?>

    <h1>Modifier une annonce</h1>
<?php 
$verif = new Verification();
$database = new Database();
$pdo = $database->connectDb();
$result = $database->select($pdo, '*', 'ad', ['id_ad', $_GET['id_ad']]);
$result = $result->fetchAll();
$form = new Form();


//$requete = "SELECT * FROM ad WHERE titre = :titre, description = :description, price = :price, phone = :phone, id_user = :id_user, id_ville_france = :id_ville_france";

?>

<main>
        
                  <form action="back-end/edit-annonce.php" method="post" id="ajout">
               <?php 
                foreach ($result as $key => $value) {
                  echo $form->Input("6", "title", "Le titre", "text", "", $value['title']);
                  echo $form->Input("6", "description", "La description", "text", "Entrer une description", $value['description']);
                  echo $form->Input("6", "price", "Le prix", "prix", "Entrer un prix", $value['price']);
                  echo $form->Input("6", "phone", "Votre téléphone", "tel", "Entrer un téléphone", $value['phone']);
                  echo $form->Input("6", "adress", "Votre adresse", "adresse", "Entrer une adresse", $value['address']);
                  $form->select($value['address']);
                  echo $form->Input("12", "Modifier", "", "submit", "Modifier", 'Modifier');
              }
                
                ?>
                  </form>


              <div class="credits">
              Réaliser par :<a href="#"> Les Perles Du Code <i class="bi bi-gem"></i></a>
              </div>


  </main><!-- End #main -->

</body>
</html>