<?php
require_once 'back-end/config.php';
require_once('./class/form.php');
require_once('./composant/header.php');
require_once('./composant/navbar.php');
require_once('./composant/sidebar.php');

if (!$_SESSION['email']) {
    return header('Location: '.URL.'/login.php?error=Merci de vous connecter');
}else{
  $form = new Form();
  ?>
  <main id="main" class="main">

      <div class="pagetitle">
        <h1>Data Tables</h1>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                
                <!-- End Table with stripped rows -->

              </div>
            </div>

          </div>
        </div>
      </section>
  </main><!-- End #main -->


<?php 
require_once('./composant/footer.php');
}?>