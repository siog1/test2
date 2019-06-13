<?php
session_start();
include '../controller/configwos.php';
include 'head.php';
include 'navbar-landing.php';


?>
<section class="full-page home">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="contents-form">
					<div class="title-section text-center">
						<?php 
						if ($_GET['code']=="1") {
							?>
							<h1>Erreur</h1>
							<p>Vous n'avez pas les droits pour accèdez a cette page.</p>
							<?php
						}else{
							?>
							<h1>Erreur</h1>
							<p>il se peut que vous rencontriez un problème.</p>
							<?php
						}
						?>
					</div>

        <div class="row">
          <div class="col-6">
            <a href="#">
              <button class="btn btn-default btn-round btn-block btn-lg">
                  <span class="btn-inner--icon"><i class="fas fa-envelope"></i></span>
                  <span class="btn-inner--text">contact</span>
              </button>
            </a>
          </div>
          <div class="col-6">
            <a href="<?php echo $url;?>/index.php">
              <button class="btn btn-warning btn-round btn-block btn-lg">
                  <span class="btn-inner--icon"><i class="fas fa-home"></i></span>
                  <span class="btn-inner--text">accueil</span>
              </button>
            </a>
          </div>
        </div>







				</div>
			</div>
		</div>
		<!---
		<div class="elements">
			<div class="rond rond-1"></div>
			<div class="rond rond-2"></div>
			<div class="rond rond-3"></div>
			<div class="rond rond-4"></div>
			<div class="rond rond-5"></div>
			<div class="rond rond-6"></div>
			<div class="rond rond-7"></div>
			<div class="rond rond-8"></div>
			<div class="rond rond-9"></div>
			<div class="rond rond-10"></div>
			<div class="rond rond-11"></div>
		</div>
		-->
	</div>
</section>


<?php

include 'footer-view-landing.php';

?>
