<?php
session_start();
include '../controller/configwos.php';
include '../controller/function-login.php';
include 'head.php';
include 'navbar-landing.php';


?>
<section class="full-page home">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="contents-form">
					<div class="title-section text-center">
						<h1>Login</h1>
						<p>Connectez vous ou inscrivez vous en un seul clic</p>
					</div>

					<form method="POST" action="<?= $url;?>/controller/function-login.php">
						<fieldset>

							<div class="form-group">
						        <div class="input-group input-group-alternative mb-4">
						            <div class="input-group-prepend">
						                <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
						            </div>

						            <input class="form-control" type="text" id="identifiant" name="user" placeholder="Votre identifiant">
						        </div>
					        </div>

					        <div class="form-group">
						        <div class="input-group input-group-alternative mb-4">
						            <div class="input-group-prepend">
						                <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
						            </div>

						            <input class="form-control" type="password" id="mdp" name="pass" placeholder="Mot de passe">
						        </div>
					        </div>

						</fieldset>

						<button class="btn btn-default btn-round btn-block btn-lg" type="submit" name="connexionWos">
                			<span class="btn-inner--icon"><i class="fas fa-paper-plane"></i></span>
                			<span class="btn-inner--text">Se connecter</span>
              			</button>

					</form>

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
