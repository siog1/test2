<?php
$page = 'competences';
session_start();
include '../controller/configwos.php';
include '../controller/main_function.php';
include 'head.php';
include 'navbar-dashboard.php';

?>

<section class="full-page home">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="content-list wow fadeInUp">
          <div class="title-content-list">
            <div class="text">
              <i class="fas fa-info-circle"></i><h1>Compétences SLAM</h1>
            </div>
            <div class="actions">
              <!-- Ajout Modal -->
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#AjoutModal">
                  <span class="btn-inner--icon"><i class="fas fa-user-plus"></i></span>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="AjoutModal" tabindex="-1" role="dialog" aria-labelledby="AjoutModal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="AjoutModal">Ajouter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Ajouter</button>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
          <div class="content-items">
            <div class="row">
              <div class="col-xl-8 col-lg-8 col-md-6 col-8">
                <span><strong>Situations obligatoires</strong></span>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-4">
                <span><strong>Actions</strong></span>
              </div>
            </div>

          </div>
        </div>


      </div>


    </div>
  </div>
</section>

<?php

include 'footer-dashboard.php';

?>
