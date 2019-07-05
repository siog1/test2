<?php

 $page = 'index';
 include 'controller/main_function.php';
 include 'view/head.php';
 include 'view/navbar-landing.php';

?>

<!-- header -->
<section class="full-page home">
	<div class="container">
    <div class="extra-text">
            <div class="row">
                  <div class="col-lg-7">
                        <div class="row">
                              <div class="col-lg-12">
                                <div class="hero">
                                  <h1>Découvrez le nouvel outil pour vos élèves !</h1>
                                  <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet lorem a mi sollicitudin finibus.</h2>
                                  <a href="#">
                                        <button class="btn btn-primary" type="button">
                                              Découvrir
                                        </button>
                                  </a>
                                </div>
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
      </div>
</section>

<!-- nos plus -->
<section class="nos-plus">
      <div class="container">
            <div class="row text-center">
                  <div class="col-md-4">
                        <img src="<?php echo $url;?>/assets/img/connection.svg" class="img-fluid">
                        <h3>Faites le suivis de vos élèves</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit lorem que se. In imperdiet lorem a mi sollicitudin finibus.</p>
                  </div>
                  <div class="col-md-4">
                        <img src="<?php echo $url;?>/assets/img/dashboard.svg" class="img-fluid">
                        <h3>Maitrisez les compétences</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. comp ce lorem inibis seleca. In imperdiet lorem a mi sollicitudin finibus.</p>
                  </div>
                  <div class="col-md-4">
                        <img src="<?php echo $url;?>/assets/img/awards.svg" class="img-fluid">
                        <h3>Obtenez votre diplôme</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit por la amet. In imperdiet lorem a mi sollicitudin finibus.</p>
                  </div>
            </div>
      </div>
</section>

<!-- second-text -->
<section class="second-text">
      <div class="container">
            <div class="row">
                  <div class="col-lg-6">
                       <img src="<?echo $url ;?>/assets/img/team.svg" alt="team" class="img-fluid">
                  </div>
                  <div class="col-lg-6">
                    <div class="mt-5 p-4">
                      <span class="text-uppercase">Toujours aller plus loin</span>
                      <h3><strong>Améliorer vos compétences</strong></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet lorem a mi sollicitudin finibus.</p>
                      <?php htmlConexionBtn(); ?>
                    </div>
                  </div>
            </div>
      </div>
</section>
<!-- blocks redirection -->
<section class="blocks">
      <div class="container-fluid">
            <div class="row">
                  <div class="col-md-6 blue">
                    <div class="row justify-content-center">
                      <div class="col-md-8">
                        <div class="content text-center p-4">
                              <h3>Notre équipe</h3>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet lorem a mi sollicitudin finibus.</p>
                              <a href="<? echo $url;?>/view/equipe.php">
                                    <button class="btn btn-secondary" type="button">
                                          Découvrir
                                    </button>
                              </a>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6 grey">
                    <div class="row justify-content-center">
                      <div class="col-md-8">
                        <div class="content text-center p-4">
                              <h3>Le projet</h3>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet lorem a mi sollicitudin finibus.</p>
                              <a href="<? echo $url;?>/view/projet.php">
                                    <button class="btn btn-primary" type="button">
                                          Découvrir
                                    </button>
                              </a>
                        </div>
                      </div>
                    </div>

                  </div>
            </div>
      </div>
</section>
<!-- Statistiques -->
<section class="stats-home">
      <div class="container">
        <div class="extra-text">
            <div class="row">
                  <div class="col-lg-7 mb-4">
                        <h2 class="mb-3"><strong>Ils nous font confiance</strong></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet lorem a mi sollicitudin finibus.</p>
                  </div>
                  <div class="col-lg-6 mb-5 mt-3">
                        <div class="row">
                              <div class="col-lg-4">
                                    <span>8<strong> Professeurs</strong></span>
                              </div>
                              <div class="col-lg-4">
                                    <span>5<strong> Classes</strong></span>
                              </div>
                              <div class="col-lg-4">
                                    <span>64<strong> Elèves</strong></span>
                              </div>
                        </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-12">
                        <h3 class="mb-3"><strong>Notre équipe</strong></h3>
                  </div>
                  <div class="col-lg-3">
                        <h4><strong class="d-block">Luca Mercier,</strong> Chef de projet</h4>
                        <p>Luca est présent en soutien pour tous les autres membres de l'équipe...  <a class="d-block" href="<?php echo $url;?>/view/equipe.php">Voir Plus</a></p>

                  </div>
                  <div class="col-lg-3">
                        <h4><strong class="d-block">Maxence Garbin,</strong>Back-end</h4>
                        <p>Maxence est un jeune fan de jeux vidéos et de code informatique...  <a class="d-block" href="<?php echo $url;?>/view/equipe.php">Voir Plus</a></p>
                  </div>
                  <div class="col-lg-3">
                        <h4><strong class="d-block">Arno Coulat,</strong>Back-end</h4>
                        <p>Arno est lui aussi développeur Back-end, il possèdes déja de grandes...  <a class="d-block" href="<?php echo $url;?>/view/equipe.php">Voir Plus</a></p>
                  </div>
                  <div class="col-lg-3">
                        <h4><strong class="d-block">Igor Gomes,</strong>Front-end</h4>
                        <p>Igor est notre web-designer Russo-Français. Il maîtrise des langages Html...  <a class="d-block" href="<?php echo $url;?>/view/equipe.php">Voir Plus</a></p>

                  </div>
            </div>
        </div>
      </div>
      <div class="elements">
        <div class="rond rond-2 parallax-effect"></div>
        <div class="rond rond-3 parallax-effect"></div>
        <div class="rond rond-5 parallax-effect"></div>
        <div class="rond rond-10 parallax-effect"></div>
      </div>
</section>
<?php

 include 'view/footer-view-landing.php';

?>
