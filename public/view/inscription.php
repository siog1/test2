<?php

include '../controller/main_function.php';
include 'head.php';
include 'navbar-landing.php';

?>
<section class="full-page home">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="contents-form">
					<div class="title-section text-center">
						<h1>Inscription</h1>
					</div>

					<form method="POST" action="<?= $url;?>/controller/mail.php">
						<fieldset>

							<div class="form-group">
						        <div class="input-group input-group-alternative mb-4">
						            <div class="input-group-prepend">
						                <span class="input-group-text"></span>
						            </div>

						            <input class="form-control" type="text" placeholder="Votre nom.." name="nom" required>
						        </div>
					        </div>

					        <div class="form-group">
						        <div class="input-group input-group-alternative mb-4">
						            <div class="input-group-prepend">
						                <span class="input-group-text"></span>
						            </div>

						            <input class="form-control" type="text" placeholder="Votre prénom.." name="prenom" required>
						        </div>
					        </div>

                  <div class="form-group">
                      <div class="input-group input-group-alternative mb-4">
                          <div class="input-group-prepend">
                              <span class="input-group-text"></span>
                          </div>

                          <input class="form-control" type="text" placeholder="Votre email.." name="mail" required>
                      </div>
                  </div>
                  <div class="b-3">
					  <div class="row">
					  	<style type="text/css">
					  		.img_chosser{
	    						opacity: 0;
	    						position: absolute;
					  		}
							.img_chosser_label:hover {
								border-radius: 100%;
								border: 2px solid #0f0f0f;
								cursor: pointer;
							}
							.img_chosser:checked {
								border-radius: 100%;
								border: 4px solid #0f0f0f;
								opacity: 1;
							}
					  	</style>
						  	<?php
						    for($n=1; $n<=29; $n++){
						        echo '
								  <label class="form-check-label col-2" for="radio'.$n.'">
								  	<input class="form-check-input float-none position-relative img_chosser" type="radio" name="img_radios" id="radio'.$n.'" value="'.$n.'">
								    <img class="img-fluid rounded-circle img_chosser_label" src="'.$url.'/assets/img/user/avatar-'.$n.'.jpg">
								  </label>
						        ';
						    }
						    ?>
					  </div>
					</div>
				</fieldset>
                  <input class="form-control" type="hidden" name="password" value="<?= $create_login; ?>">
						<button class="btn btn-default btn-round btn-block btn-lg" type="submit" name="inscriptionWos">
                			<span class="btn-inner--icon"><i class="fas fa-paper-plane"></i></span>
                			<span class="btn-inner--text">Créer</span>
              			</button>

					</form>

				</div>
			</div>
		</div>
	</div>
</section>

<?php

include 'footer-view-landing.php';

?>
