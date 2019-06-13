<?php

 $page = 'equipe';
 include '../controller/configwos.php';
 include '../view/head.php';
 include '../view/navbar-landing.php';

?>

<!-- header -->
<section class="full-page home">
	<div class="container">
    <article> 
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="contents-form p-4">
            <h2 class="d-block"><strong>Car c'est notre projet :</strong></h2>
              <p>Nous devrons développer une application web qui aura pour but de visualiser les compétences que l’on va valider tout le long de nos projets de l’année. L’application web permettra donc aux élèves de créer des activités, de sélectionner les compétences sur lesquelles ils ont travaillé. Les élèves Il pourront ensuite visualiser leurs avancements et avoir un bilan de compétences. Les Professeurs eux pourront créer des classes d’élèves et suivre l’avancement des compétences de chacun des élèves de leur classes.</p>
              <a href="<?php echo $url;?>/view/equipe.php"><button class="btn btn-primary" type="button" >Notre équipe</button></a>
          </div>
        </div>
      </div>
    </article>
  </div>
</section>



<?php

 include '../view/footer-view-landing.php';

?>

