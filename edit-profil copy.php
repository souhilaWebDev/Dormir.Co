<?php
require_once 'back-end/config.php';
require('./class/database.php');
require_once('./composant/header.php');
require_once('./composant/navbar.php');
require_once('./composant/sidebar.php');

if(!isset($_SESSION['id_user'])) {
    return header('Location: '.URL.'/login.php?error=Merci de vous connecter');
}else{

    $database = new Database();
    $pdo = $database->connectDb();
    $result = $database->select($pdo, '*', 'user', ['id_user', $_SESSION['id_user']]);
    $user = $result->fetch(PDO::FETCH_ASSOC);

    // Vérification si l'user existe
    if (!$user) {
        echo "user n'existe pas.";
        exit();
    }
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

                    <form method="POST" action="<?=URL?>/back-end/edit-profil.php">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" value="<?php echo $user['lastname']; ?>"/><br/>
                        <label for="email">E-mail :</label>
                        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"/><br/>
                        <input type="submit" value="Modifier"/>
                    </form>


                    </div>
                </div>

                </div>
             </div>
        </section>

    </main><!-- End #main -->

<?php 
require_once('composant/footer.php');
}?>

