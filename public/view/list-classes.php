<?php
session_start();
$page = 'liste-classes';
include '../controller/main_function.php';
include 'head.php';
include 'navbar-dashboard.php';
sessionVerif();

if(isset($_GET['new']) && isset($_POST['nameClasse'])) {
  echo $_POST['nameClasse'];
  $insert = $pdo->prepare("INSERT INTO classe(intitule,etude,promotion) VALUES (?,?,?)");
  $insert->execute(array($_POST['nameClasse'],$_POST['nameEtude'],$_POST['namePromo']));
}
if (isset($_GET['del'])) {
  delete("classe","id_classe",$_GET['del']);
}
?>


<section class="full-page dashboard">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="content-list wow fadeInUp">
          <div class="title-content-list">
            <div class="text">
              <i class="fas fa-info-circle"></i><h1>Classes <?php dateOnMyWomb() ?></h1>
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
                    <form method="POST" action="?new">
                    <div class="form-group">

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text">Nom</label>
                        </div>
                        <select class="custom-select" name="nameClasse" required>
                          <option value="SIO">SIO</option>
                          <option value="CG">CG</option>
                          <option value="CI">CI</option>
                          <option value="ESF">ESF</option>
                          <option value="FED">FED</option>
                          <option value="TC">TC</option>
                          <option value="PIM">PIM</option>
                          <option value="SAM">SAM</option>
                          <option value="DCG">DCG</option>
                          <option value="SP3S">SP3S</option>
                          <option value="MCO">MCO</option>
                          <option value="G PME">G PME</option>
                          <option value="NDRC">NDRC</option>
                          <option value="ASI">ASI</option>

                        </select>
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text">Année</label>
                        </div>
                        <select class="custom-select" name="namePromo" required>
                          <option value="2019 - 2021">2019-2021</option>
                          <option value="2018 - 2020">2018-2020</option>
                          <option value="2017 - 2019">2017-2019</option>
                        </select>
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text">Étude</label>
                        </div>
                          <select class="custom-select" name="nameEtude" required>
                            <option value="BTS">BTS</option>
                          </select>
                      </div>

                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-default">Ajouter</button>
                  </div>
                </form>
                </div>
              </div>
              </div>
            </div>
          </div>
          <?php
          $requete = $pdo->query("SELECT * FROM classe");
          while ($res = $requete->fetch()) {
            $idClasse = $res['id_classe'];
            $intitule = $res['intitule'];
            $promotion = $res['promotion'];
            $etude = $res['etude'];

          ?>
            <!--- début boucle php --->
            <div class="content-items">
              <div class="row text-md-left text-center">
                <div class="col-lg-9 col-md-9 p-3">
                  <span class="primary"><?= $intitule;?><strong></strong></span>
                  <span class="primary"><strong><?= $promotion;?></strong></span>
                </div>
                <div class="col-lg-3 col-md-3 text-md-left text-center p-2"><?php // XXX:  ?>
                  <div class="row justify-content-center">
                    <div class="col-4 p-1">
                      <!-- Voir  -->
                      <a href="<? echo $url;?>/view/list-classes-eleve.php?classe=<?= $idClasse;?>">
                        <button class="btn btn-primary btn-lg btn-block" type="button">
                          <span class="btn-inner--icon"><i class="material-icons">remove_red_eye</i></span>
                        </button>
                      </a>
                    </div>
                    <?php if ($_SESSION['grade'] == "1") {?>
                    <div class="col-4 p-1">
                      <!-- Modifier Modal -->
                      <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#ModifModal<?= $idClasse;?>">
                        <span class="btn-inner--icon"><i class="material-icons">settings</i></span>
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="ModifModal<?= $idClasse;?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <form action="?edit=<?= $idClasse;?>" method="POST">
                          <div class="modal-header">
                            <h5 class="modal-title">Modifier <?= $intitule.' '.$promotion;?></h5>
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

                                          <input class="form-control" type="text" placeholder="Nom de la classe" value="<?= $intitule;?>">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                          <div class="input-group input-group-alternative mb-4">
                                              <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="material-icons">assignment</i></span>
                                              </div>

                                              <input class="form-control" type="text" placeholder="Promotion" value="<?= $promotion;?>">
                                          </div>
                                        </div>

                              </fieldset>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-warning">Appliquer</button>
                          </div>
                        </form>
                        </div>
                      </div>
                      </div>
                    </div>
                    <div class="col-4 p-1">
                      <!-- Supprimer Modal -->
                      <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#SuprrModal<?= $idClasse;?>">
                       <span class="btn-inner--icon"><i class="material-icons">close</i></span>
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="SuprrModal<?= $idClasse;?>" tabindex="-1" role="dialog" aria-labelledby="ModalSuprr" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Supprimer <?= $intitule.' '.$promotion;?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Nous vous rappelons que vous allez supprimer cet élément de façon définitive, vous ne pourrez pas revenir en arrière !</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-color="danger" data-placement="top" data-content="Vous ne pourrez plus revenir en arrière !" onclick="window.location.replace('?del=<?=$idClasse;?>');">Supprimer</button>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  <?php }?>
                  </div>
                </div>
              </div>
            </div>
            <!--- fin boucle php --->
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
