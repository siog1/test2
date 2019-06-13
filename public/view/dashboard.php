<?php
session_start();
$page = 'accueil-dashboard';
include '../controller/main_function.php';
sessionVerif();
include 'head.php';
include 'navbar-dashboard.php';
returnPDO();
?>
<section class="full-page dashboard">
  <div class="container">

    <div class="grid wow fadeInUp content-list">

      <div class="grid-sizer col-md-3">

      </div>

      <!-- Statistique 1 --->
      <div class="grid-item col-md-6">
        <div class="grid-item-content contents-form text-md-left text-center p-4">
          <div class="row">
            <div class="col-md-8 col-12">
              <span class="d-block">Bienvenue <strong><?php echo $_SESSION['prenom']; ?> <?php echo $_SESSION['nom']; ?> !</strong></span>
              <span>Vous voici sur le tableau de bord, ici vous retrouvez toutes les informations de la plateforme.</span>
            </div>
            <div class="col-md-4 col-12">
              <img src="<? echo $url ?>/assets/img/svg/selfie.svg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Statistique 1 --->

      <!-- Statistique 2 --->
      <div class="grid-item col-md-6">
        <div class="grid-item-content contents-form text-md-left text-center p-4">
          <div class="row">
            <div class="col-md-1 col-12">
              <i class="material-icons">group</i>
            </div>
            <div class="col-md-11 col-12">
              <span class="d-block">Vous êtes
                <strong >
                  <?php
                    $reqNbrVisit1 = $pdo->query('SELECT * FROM visiteur');
                    $res = $reqNbrVisit1->rowCount();

                    echo $res;
                  ?>
                </strong>
                <?php if(compter_visite() > 1){echo "personnes ce soir à être connectées sur la plateforme.";} else {echo "personne ce soir à être connectée sur la plateforme.";};?>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Statistique 2 --->

      <!-- Statistique 3 --->
      <div class="grid-item col-md-3">
            <div class="grid-item-content contents-form text-md-left text-center p-4">
              <div class="row">
                <div class="col-md-3">
                  <i class="material-icons d-block">school</i>
                </div>
                <div class="col-md-9">
                  <span class="d-block">
                    <strong>
                      <?php
                        $requete = $pdo->query('SELECT * FROM users WHERE grade = 3');
                         echo $requete->rowcount();
                      ?>
                    </strong>
                    <?php if($requete > 0){echo "élèves";} else {echo "élève";};?>
                  </span>
                  <span>inscrits</span>
                </div>
              </div>
            </div>
      </div>
      <!-- Fin Statistique 3 --->

      <!-- Statistique 4 --->
      <div class="grid-item col-md-3">
            <div class="grid-item-content contents-form text-md-left text-center p-4">
              <div class="row">
                <div class="col-md-3">
                  <i class="material-icons d-block">supervisor_account</i>
                </div>
                <div class="col-md-9">
                  <span class="d-block">
                    <strong>
                      <?php
                        $requete = $pdo->query('SELECT * FROM users WHERE grade = 2');
                         echo $requete->rowcount();
                      ?>
                    </strong>
                    <?php if($requete > 0){echo "professeurs";} else {echo "professeur";};?>
                  </span>
                  <span>inscrits</span>
                </div>
              </div>
            </div>
      </div>
      <!-- Fin Statistique 4 --->

      <!-- Statistique 5 --->
      <div class="grid-item col-md-3">
            <div class="grid-item-content contents-form text-md-left text-center p-4">
              <div class="row">
                <div class="col-md-3">
                  <i class="material-icons d-block">view_agenda</i>
                </div>
                <div class="col-md-9">
                  <span class="d-block">
                    <strong>
                      <?php
                        $requete = $pdo->query('SELECT * FROM classe');
                         echo $requete->rowcount();
                      ?>
                    </strong>
                    <?php if($requete > 0){echo "classes";} else {echo "classe";};?>
                  </span>
                  <span>sur le site</span>
                </div>
              </div>
            </div>
      </div>
      <!-- Statistique 5 --->


      <!-- Statistique 6 --->
      <div class="grid-item col-md-3">
            <div class="grid-item-content contents-form text-md-left text-center p-4">
              <div class="row">
                <div class="col-md-3">
                  <i class="material-icons d-block">extension</i>
                </div>
                <div class="col-md-9">
                  <span class="d-block">
                    <strong>
                      <?php
                        $requete = $pdo->query('SELECT * FROM activites');
                         echo $requete->rowcount();
                      ?>
                    </strong>
                    <?php if($requete > 0){echo "activités";} else {echo "activité";};?>
                  </span>
                  <span>réalisés</span>
                </div>
              </div>
            </div>
      </div>
      <!-- Statistique 6 --->

      <!-- Statistique 7 --->
      <div class="grid-item col-md-3">
        <div class="contents-form text-md-left text-center p-4">
          <span>Salut les <strong>Devs</strong>, vous devriez regarder ceci pour améliorer ce tableau de board :</span>
          <a href="https://masonry.desandro.com/" target="_blank">Masonry</a>
        </div>
      </div>
      <!-- Statistique 7 --->

      <!-- Statistique 8 --->

      <div class="grid-item col-md-3">
            <div class="grid-item-content contents-form text-md-left text-center p-4">
              <div class="row">
                <div class="col-md-3">
                  <i class="material-icons d-block">extension</i>
                </div>
                <div class="col-md-9">
                  <span class="d-block">
                    <strong>
                      <?php
                        $reqNbVisit = $pdo->query('SELECT vue FROM compteurVisiteur');
                        $resNb = $reqNbVisit->fetch();
                        echo $resNb['vue'];
                      ?>
                    </strong>
                    visiteurs aujourd'hui
                  </span>
                </div>
              </div>
            </div>
      </div>
      <!-- Statistique 8 --->

      <div class="grid-item col-md-6">
        <div class="contents-form text-center">
          <span>Ma dernière activité</span>
        </div>
      </div>

      <div class="grid-item col-md-6">
        <div class="contents-form text-center">
          <span>Ma dernière activité</span>
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
