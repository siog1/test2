<?php
session_start();
include 'configwos.php';

	  $user = htmlentities($_POST['user'], ENT_QUOTES, "ISO-8859-1");
	  $pass = htmlentities($_POST['pass'], ENT_QUOTES, "ISO-8859-1");
	  // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL

		echo $user;
		echo $pass;
	  if(!empty($user) && !empty($pass)){
	    //Nous allons demander le hash pour cet utilisateur à notre base de données :
	    $query = $pdo->prepare('SELECT password FROM users WHERE firstname = ?');
			$query->execute(array($user));
	    $result = $query->fetch();
	    $hash = $result['password'];
	    //Nous vérifions si le mot de passe utilisé correspond bien à ce hash à l'aide de password_verify :
	    $correctPassword = password_verify($pass, $hash);

	    if($correctPassword){
	      //Si oui nous accueillons l'utilisateur identifié


	      $req = $pdo->query("SELECT * FROM users WHERE firstname='".$user."'");
	        while ($row = $req->fetch())
	        {
	          $_SESSION['id'] = $row['id_user'];
	          $_SESSION['prenom'] = $row['firstname'];
	          $_SESSION['nom'] = $row['lastname'];
	          $_SESSION['age'] = $row['age'];
	          $_SESSION['grade'] = $row['grade'];
			  $_SESSION['classe'] = $row['classe'];
			  $_SESSION['idImg'] = $row['img'];
			  $_SESSION['entreprise'] = $row['entreprise'];
			  $_SESSION['adresse_ent'] = $row['adresse_ent'];
			  $_SESSION['description'] = $row['description'];

	        }

	      header('Location: ../view/dashboard.php');
	      exit();
	    }else{
	      header('Location: '.$error);//Sinon nous signalons une erreur d'identifiant ou de mot de passe
	    }
	  } else {

		}



?>
