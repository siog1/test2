<?php
$page = 'competences';
session_start();
include '../controller/configwos.php';
include '../controller/main_function.php';
include 'head.php';
include 'navbar-dashboard.php';
sessionVerif();
?>

<section class="full-page dashboard">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="content-list wow fadeInUp">
          <div class="title-content-list">
            <div class="text">
              <i class="fas fa-info-circle"></i><h1>Compétences</h1>
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
                  <form method="POST" action="../controller/main_function.php">
                  <div class="modal-body">

                    <div class="form-group">
                          <div class="input-group input-group-alternative mb-4">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="material-icons">assignment</i></span>
                              </div>

                              <input class="form-control" type="text" name="comp" placeholder="Intitulé de la compétence">
                          </div>
                        <div class="input-group input-group-alternative mb-4">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="material-icons">assignment</i></span>
                              </div>

                              <input class="form-control" type="text" name="opt" placeholder="SLAM/SISR">
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-default">Ajouter</button>
                </div>
                </form>
              </div>
              </div>
            </div>
            <?php
              $select = $pdo->query('SELECT * FROM specialite');
              while($resu = $select->fetch()) {
                $idSpec = $resu['id_spec'];
                $option = $resu['option'];

            ?>
            <div class="content-items">
              <div class="row text-md-left text-center">
                <div class="col-lg-3 col-md-3 p-3">
                  <span class="primary">Spécialité</span>
                  <span class="primary bold"><?= $option;?></span>
                </div>
                <div class="col-lg-6 col-md-6 p-3">
                  <span class="secondary">87 Compétences<br> Différentes</span>
                </div>
                <div class="col-lg-3 col-md-3 text-md-left text-center p-2"><?php  ?>
                  <div class="row justify-content-center">
                    <div class="col-4 p-1">

                          <!-- Voir  -->
                          <a href="<? echo $url;?>/view/list-competences-specialite.php">
                            <button class="btn btn-primary btn-lg btn-block" type="button">
                              <span class="btn-inner--icon"><i class="material-icons">remove_red_eye</i></span>
                            </button>
                          </a>
                        </div>
                        <?php if ($_SESSION['grade'] == "1") {?>
                        <div class="col-4 p-1">
                          <!-- Modifier Modal -->
                          <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#ModifModal">
                            <span class="btn-inner--icon"><i class="material-icons">settings</i></span>
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="ModifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="ModifModal">Modifier</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="#">
                      						<fieldset>

                      							<div class="form-group">
                      						        <div class="input-group input-group-alternative mb-4">
                      						            <div class="input-group-prepend">
                      						                <span class="input-group-text"><i class="material-icons">assignment</i></span>
                      						            </div>

                      						            <input class="form-control" type="text" placeholder="Nom de la spécialité">
                      						        </div>
                      					        </div>

                      						</fieldset>
                      					</form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-warning">Appliquer</button>
                              </div>
                            </div>
                          </div>
                          </div>
                        </div>
                        <div class="col-4 p-1">
                          <!-- Supprimer Modal -->
                          <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#SuprrModal">
                           <span class="btn-inner--icon"><i class="material-icons">close</i></span>
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="SuprrModal" tabindex="-1" role="dialog" aria-labelledby="ModalSuprr" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="SuprrModal">Supprimer <?= $fName;?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Nous vous rappelons que vous allez supprimer cet élément de façon définitive, vous ne pourrez pas revenir en arrière !</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-color="danger" data-placement="top" data-content="Vous ne pourrez plus revenir en arrière !">Supprimer</button>
                              </div>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


            <?php
          }
            }
            ?>
          </div>

        </div>


      </div>


    </div>
  </div>

  <div class="elements">
    <div class="rond rond-2 parallax-effect"></div>
    <div class="rond rond-3 parallax-effect"></div>
    <div class="rond rond-4 parallax-effect"></div>
    <div class="rond rond-5 parallax-effect"></div>
    <div class="rond rond-6 parallax-effect"></div>
    <div class="rond rond-8 parallax-effect"></div>
    <div class="rond rond-10 parallax-effect"></div>
  </div>

</section>

<?php

include 'footer-dashboard.php';

?>
