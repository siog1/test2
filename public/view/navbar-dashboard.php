<div class="menu-dashboard">

	<div class="menu">

      				<div id="menuToggle">

          	<input type="checkbox" />

	          <span></span>
	          <span></span>
	          <span></span>

	          <ul id="menu">
							<li><a href="<?echo $url ;?>/view/dashboard.php" class="<?php if($page=='accueil-dashboard'){echo 'active';}?>"><i class="material-icons">dashboard</i> Tableau de board</a></li>
							<li><a href="<?echo $url ;?>/view/list-professeurs.php" class="<?php if($page=='liste-professeurs'){echo 'active';}?>"><i class="material-icons">people</i> Professeurs</a></li>
							<li><a href="<?echo $url ;?>/view/list-classes.php" class="<?php if($page=='liste-classes'){echo 'active';}?>"><i class="material-icons">school</i> Classes</a></li>
							<li><a href="<?echo $url ;?>/view/list-competences.php" class="<?php if($page=='competences'){echo 'active';}?>"><i class="material-icons">business_center</i> Compétences</a></li>
							<li><a href="<?echo $url ;?>/view/list-activites.php" class="<?php if($page=='liste-activites'){echo 'active';}?>"><i class="material-icons">extension</i> Activités</a></li>
							<li><a href="<?echo $url ;?>/view/parametres.php" class="<?php if($page=='parametres'){echo 'active';}?>"><i class="material-icons">settings</i> Paramètres</a></li>
							<li><a href="#"><i class="material-icons">waves</i> Actualités</a></li>
							<li><a href="#"><i class="material-icons">flag</i> Ticket</a></li>
	          </ul>
        </div>
		</div>

	<div class="info">
		<a href="<?php echo $url;?>/view/dashboard.php">
			<div class="logo"></div>
			<h1>World of SIO<span class="version">.alpha</span></h1>
		</a>
	</div>



 <div class="extra">

	 <div class="connection-off">
 		<a href="?die">
 				<button type="button" class="btn btn-primary btn-lg btn-block">
 					<span class="btn-inner--icon"><i class="material-icons">power_settings_new</i></span>
 				</button>
 		</a>
 	</div>

	 <div class="search-btn">
 		<a href="#search">
 			<button type="button" class="btn btn-primary btn-lg btn-block">
 				<span class="btn-inner--icon"><i class="material-icons">search</i></span>
 			</button>
 		</a>

 		<!-- Search Form -->
 		<div id="search">
 			<form role="search" id="searchform" action="/search" method="get">
 				<input value="" name="q" type="search" placeholder="Rechercher..."/>
 			</form>
 		</div>
 	</div>

	<div class="compte p-1">
		<a href="<?php echo $url; ?>/view/profil.php?session=<?= $_SESSION['id'];?>">
			<div class="photo">
				<img src="<?php echo $url; ?>/assets/img/user/avatar-<?= $_SESSION['idImg'];?>.jpg" class="rounded-circle img-fluid">
			</div>
			<div class="naming p-1">
				<span><?php phpConnexionName($_SESSION['grade']);?>,</span>
				<span><strong><?php echo idtoname($_SESSION['id']);?>.</strong></span>
			</div>
		</a>
	</div>

	<div class="notifications">
		<a href="Javascript:void(0);">
			<?php
			$requete = returnPDO()->prepare("SELECT * FROM notif WHERE id_user=".$_SESSION['id']);
		    $requete->execute();
		    $res = $requete->fetch();
			$notif = $res["id_notif"];
			if(empty($notif)){
			?>
				<button type="button" class="btn btn-primary btn-lg btn-block" data-placement="bottom" data-toggle="popover" title="Centre de notification" data-html="true"
				data-content="
				Vous n'avez pas de notifications...
				<br /><br />
				<hr class='mb-2'>
				<a href='#' class='text-center text-uppercase'>acceder au centre</a>
				">
					<span class="btn-inner--icon"><i class="material-icons">notifications</i></span>
				</button>
			<?php
			}else{
			?>
				<button type="button" class="btn btn-primary btn-lg btn-block text-danger" data-placement="bottom" data-toggle="popover" title="Centre de notification" data-html="true"
				data-content="
				<br />
				<?php echo last_notif($_SESSION['id']); ?>
				<br />
				<hr class='mb-2'>
				<a href='#' class='text-center text-uppercase'>acceder au centre</a>
				">
					<span class="btn-inner--icon"><i class="material-icons">notifications_active</i></span>
				</button>
			<?php
			}
			?>
		</a>
	</div>

	<div class="parametres">
		<a href="#">
				<button type="button" class="btn btn-primary btn-lg btn-block">
					<span class="btn-inner--icon"><i class="material-icons">settings</i></span>
				</button>
		</a>
	</div>


  </div>
</div>
