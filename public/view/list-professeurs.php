<?php
$page = 'liste-professeurs';
session_start();
include '../controller/configwos.php';
include '../controller/main_function.php';
include 'head.php';
include 'navbar-dashboard.php';
sessionVerif();
if (isset($_GET['del'])) {
  delete("users","id_users",$_GET['del']);
}
?>

<section class="full-page dashboard">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="content-list wow fadeInUp">
          <div class="title-content-list">
            <div class="text">
              <i class="fas fa-info-circle"></i><h1>Professeurs</h1>
            </div>
            <div class="actions">
              <!-- bouton inscription -->
              <a href="<?= $url;?>/view/inscription.php">
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#AjoutModal">
                  <span class="btn-inner--icon"><i class="fas fa-user-plus"></i></span>
              </button>
            </a>
            </div>
          </div>

            <?php
              $req = $pdo->prepare('SELECT * FROM users WHERE grade = 2');
              $req->execute();

              while($res = $req->fetch()) {
                $fName = $res['firstname'];
                $lName = $res['lastname'];
                $idUser = $res['id_user'];
                $idimg = $res['img'];
                $matiere = $res['matter_id'];

                ?>

              <div class="content-items">
                <div class="row text-md-left text-center">
                  <div class="col-lg-1 col-md-2 p-3">
                    <img src="<? echo $url; ?>/assets/img/user/avatar-<?=$idimg;?>.jpg" class="rounded-circle img-fluid">
                  </div>
                  <div class="col-lg-4 col-md-3 p-3">
                    <span class="primary"><?= $fName;?></span>
                    <span class="primary"><strong><?= $lName;?></strong></span>
                  </div>
                  <div class="col-lg-4 col-md-4 p-3">
                    <span class="secondary">Professeur de <?= matter($matiere);?></span>
                  </div>
                  <div class="col-lg-3 col-md-3 text-md-left text-center p-2"><?php // XXX:  ?>
                    <div class="row justify-content-center">
                      <div class="col-4 p-1">
                        <!-- Voir  -->
                        <a href="<?php echo $url; ?>/view/profil.php?profil=<?= $idUser;?>">
                        <button class="btn btn-primary btn-lg btn-block" type="button">
                          <span class="btn-inner--icon"><i class="material-icons">remove_red_eye</i></span>
                        </button>
                        </a>
                      </div>
                      <?php
                      if ($_SESSION['grade'] == "1") {?>
                      <div class="col-4 p-1">
                        <!-- Modifier Modal -->
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#ModifModal<?= $idUser;?>">
                          <span class="btn-inner--icon"><i class="material-icons">settings</i></span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="ModifModal<?= $idUser;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModifModal">Modifier <?= $fName;?></h5>
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
                    						                <span class="input-group-text"><i class="material-icons">person</i></span>
                    						            </div>

                    						            <input class="form-control" type="text" placeholder="Prénom" value="<?= $fName;?>">
                    						        </div>
                    					        </div>

                    					        <div class="form-group">
                    						        <div class="input-group input-group-alternative mb-4">
                    						            <div class="input-group-prepend">
                    						                <span class="input-group-text"><i class="material-icons">person_outline</i></span>
                    						            </div>

                    						            <input class="form-control" type="text" placeholder="Nom de famille" value="<?= $lName;?>">
                    						        </div>
                    					        </div>

                                      <div class="form-group">
                    						        <div class="input-group input-group-alternative mb-4">
                    						            <div class="input-group-prepend">
                    						                <span class="input-group-text"><i class="material-icons">school</i></span>
                    						            </div>

                    						            <select class="form-control" placeholder="Matière">
                                            <?php echo listOfMatter($matiere); ?>
                                            </select> 

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
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#SuprrModal<?= $idUser;?>">
                         <span class="btn-inner--icon"><i class="material-icons">close</i></span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="SuprrModal<?= $idUser;?>" tabindex="-1" role="dialog" aria-labelledby="ModalSuprr" aria-hidden="true">
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
                              <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-color="danger" data-placement="top" data-content="Vous ne pourrez plus revenir en arrière !" onclick="window.location.replace('?del=<?=$idUser;?>');">Supprimer</button>
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php
              }
            ?>

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
