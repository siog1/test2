<?php
include('configwos.php');
$url = 'https://world-of-sio.katmakov.com';
$error = "https://world-of-sio.katmakov.com/view/error.php";

//connexion a la bdd
$host = '185.98.131.90';
$user = 'katma918629_1qae4k';
$pass = 'WorldofSIODATA';
$db = 'katma918629_1qae4k';
$charset = 'utf8';
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dsn = "mysql:host=".$host.";dbname=".$db.";charset=".$charset;
try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch(PDOException $e){
  die( "Connection failed: " . $e->getMessage());
}


function returnPDO(){
  //connexion a la bdd
  $host = '185.98.131.90';
  $user = 'katma918629_1qae4k';
  $pass = 'WorldofSIODATA';
  $db = 'katma918629_1qae4k';
  $charset = 'utf8';
  $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
      ];
      $dsn = "mysql:host=".$host.";dbname=".$db.";charset=".$charset;
  $pdo = new PDO($dsn, $user, $pass, $options);
  return $pdo;
}


/********************
Execute une commande $req
Retourne le resultat (non trier)
*********************/
function pdoReq($req){
    $requete = returnPDO()->query($req);
    return $requete;
    $requete->closeCursor();
}

/********************
Recupère une valeur par la commande $req
Retourne le resultat directement
*********************/
function pdoSelectOne($req){
    $requete = returnPDO()->prepare($req);
    $requete->execute();
    $requete->fetch();
    return $requete[0];
    $requete->closeCursor();
}

/********************
Execute la commande $req
Ne retourne rien
*********************/
function pdoExec($req){
    $requete = returnPDO()->prepare($req);
    $requete->execute();
    $requete->closeCursor();
}

/********************
Si la session n'existe pas redirection sur login.php
Si il y a 'die' dans l'url destruction de la session et actualisation
*********************/
function sessionVerif() {
    session_start();
    if(isset($_GET['die'])) {
      sessionLogout();
    }
    if(!isset($_SESSION['id'])) {
      header("Location: ./login.php");
    }
    compter_visite();
}

/********************
Si la permission passer dans $id n'ai pas
celle de l'utilisateur redirection.
*********************/
function sessionPermision($id_permission) {
    if($_SESSION['grade']!=$id_permission) {
      header("Location: ./error.php?code=1");
    }
}

/********************
Détruit la session actuel
Actualise la page
*********************/
function sessionLogout() {
  session_destroy();
  header("Refresh:0");
}

/********************
Faire apparaitre un bonton de connexion.
*********************/
function htmlConexionBtn() {
  if (!isset($_SESSION['id'])) {
    ?>
    <a href="<?echo $url ;?>/view/login.php">
      <button class="btn btn-primary" type="button">
        Me connecter
      </button>
    </a>
    <?php
  }else{
    ?>
    <a href="<?echo $url ;?>/view/dashboard.php">
      <button class="btn btn-primary" type="button">
        Accèder au Dashboard
      </button>
    </a>
    <?php
  }
}

/*************************************
Role de connexion de la session en cours
*****************************************/
function phpConnexionName($sessionGrade) {
  if($sessionGrade == 3) {
    echo "Élève";
  } elseif ($sessionGrade == 2) {
    echo "Professeur";
  } else {
    echo "Administrateur";
  }
}

/*************************************
Ecrit dans la table notif.
*****************************************/
function notif($text,$iduser,$page) {
  $insertion = returnPDO()->prepare('INSERT INTO `notif`(`text`, `id_user`, `page`) VALUES ( ? , ? , ? )');
  $insertion->execute(array($text,$iduser,$page));
}

/*************************************
id_user to prenom Nom
*****************************************/
function idtoname($id_user) {
  $req = pdoReq("SELECT * FROM users WHERE id_user='".$id_user."'");
  $req->execute();
  $res = $req->fetch();
  $nick = substr($res['lastname'], 0, 1);
  return $res['firstname'].' '.$nick;
}

/*************************************
return les 8 dernières notifications de l'utilisateur id_user
*****************************************/
function last_notif($id_user) {
  $requete = returnPDO()->prepare('SELECT * FROM notif WHERE active=true AND id_user = ? ORDER BY id_notif DESC LIMIT 5');
  $requete->execute(array($id_user));
  while ($res = $requete->fetch()) {
    $html .= "<a href='".$res['page']."' class='card'>".$res['text']."</a>";
  }
  return $html;
}

/*************************************
Fonction de suppression $base = nom de la base et $id = id a supprimer
*****************************************/
function delete($base,$id) {
  pdoExec("DELETE FROM ".$base." WHERE id_user=".$id);
}

/*************************************
list des matières, $selected = id près selectionner si il y en a une.
*****************************************/
function listOfMatter($selected) {
  $requete = returnPDO()->prepare('SELECT * FROM users');
  while ($res = $requete->fetch()) {
    $imselect = "";
    if (!empty($selected) AND $selected==$id) {
      $imselect == "selected";
    }
    $html .= "<option value='".$res['id_matter']."' ".$imselect.">".$res['title']."</option>";
  }
  echo "cca".$html;
}

/*************************************
Id d'une matière vers titre de la matière
*****************************************/
function matter($id) {
  $requete = returnPDO()->prepare('SELECT * FROM matter WHERE id_matter= ?');
  $requete->execute(array($id));
  $res = $requete->fetch();
  return $res['title'];
}

/*************************************/

function compter_visite(){
    $datestamp = 900; // 15 min (900)
    $ip   = $_SERVER['REMOTE_ADDR'];
    $date = date("U");

    $req1 = returnPDO()->prepare('SELECT * FROM visiteur WHERE ip = ?');
    $req1->execute(array($ip));
    $ip_on = $req1->rowCount();
    if ($ip_on == 0) {
      $insert = returnPDO()->prepare('INSERT INTO visiteur(ip, temps) VALUES(?,?)');
      $insert->execute(array($ip,$date));
      $insertVisitS = returnPDO()->query('SELECT vue FROM compteurVisiteur WHERE id_cpVr = 1');
      $result = $insertVisitS->fetch();
      $newnumber = $result["vue"] + 1;
      $insertVisit = returnPDO()->prepare('UPDATE compteurVisiteur SET vue = ? WHERE id_cpVr = 1');
      $insertVisit->execute(array($newnumber));
    } else {
      $update = returnPDO()->prepare('UPDATE visiteur SET temps = ? WHERE ip = ?');
      $update->execute(array($date,$ip));
    }

    $delete = $date - $datestamp;

    $delIp = returnPDO()->prepare('DELETE FROM visiteur WHERE temps < ?');
    $delIp->execute(array($delete));

}
/********************/

function autolink($string){

$content_array = explode(" ", $string);
$output1 = '';
foreach($content_array as $content1){
  if(substr($content1, 0, 7) == "http://"){
  $content1 = '<a class="text-warning font-weight-bold" href="' . $content1 . '">' . $content1 . '</a>';
  }
  if(substr($content1, 0, 8) == "https://"){
  $content1 = '<a class="text-warning font-weight-bold" href="' . $content1 . '">' . $content1 . '</a>';
  }
  if(substr($content1, 0, 4) == "www."){
  $content1 = '<a class="text-warning font-weight-bold" href="http://' . $content1 . '">' . $content1 . '</a>';
  }
  $output1 .= " " . $content1;
}

$output1 = trim($output1);
return $output1;

}

/**************


varchar | $req = requete SQL ( exemple = 'SELECT * FROM users WHERE active=1' )
varchar | $id = le nom de la collone id ( exemple = id_user )
varchar | $col1 -2 -3 = Collone qui doivent apparaitre (nom des champ)(exemple = 'id, name, nickname,' OU " 'id','','','' ")
bool    | $show - $edit - $delete = bouton a afficher (exemple = 'true,false,false')

function htmlRowsPdoReq($req,$id,$col1,$col2,$col3,$show,$edit,$delete) {
//echo $req . ' ' . $col1 . ' ' . $col2 . ' ' . $show . ' ' . $edit . ' ' . $delete . ' ' ;
$requete = returnPDO()->prepare($req);
$requete->execute();
  while($res = $requete->fetch()) {
    ?>
                <div class="content-items">
                  <div class="row text-md-left text-center">
                  <?php
                  if(isset($col1) && !empty($col1)){
                    ?>
                    <div class="col-lg-3 col-md-3 p-3">
                      <span class="primary"><?=$res[$col1];?></span>
                    </div>
                    <?php
                  }
                  if(isset($col2) && !empty($col2)){
                    ?>
                    <div class="col-lg-6 col-md-6 p-3">
                      <span class="secondary"><?=$res[$col2];?></span>
                    </div>
                    <?php
                      }
                    ?>
                  <div class="col-lg-3 col-md-3 text-md-left text-center p-2"><?php // XXX:  ?>
                    <div class="row">
                      <?php
                      if(isset($show) && !empty($show) && $show===true){
                      ?>
                      <div class="col-4 p-1">
                        <!-- Voir  -->
                        <a href="">
                          <button class="btn btn-primary btn-lg btn-block" type="button">
                            <span class="btn-inner--icon"><i class="material-icons">remove_red_eye</i></span>
                          </button>
                        </a>
                      </div>
                      <?php
                      }
                      if(isset($edit) && !empty($edit) && $edit===true){
                      ?>
                      <div class="col-4 p-1">
                        <!-- Modifier Modal -->
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#ModifModal">
                          <span class="btn-inner--icon"><i class="material-icons">settings</i></span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="ModifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModifModal">Modifier</h5>
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

                                            <input class="form-control" type="text" placeholder="Nom de la classe">
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
                      <?php
                      }
                      if(isset($delete) && !empty($delete) && $delete===true){
                      ?>
                      <div class="col-4 p-1">
                        <!-- Supprimer Modal -->
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#SuprrModal">
                         <span class="btn-inner--icon"><i class="material-icons">close</i></span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="SuprrModal" tabindex="-1" role="dialog" aria-labelledby="ModalSuprr" aria-hidden="true">
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
                              <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-color="danger" data-placement="top" data-content="Vous ne pourrez plus revenir en arrière !">Supprimer</button>
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>
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
                <?php
                if(isset($edit) && !empty($edit) && $edit===true){
                ?>
                <div class="col-4 p-1">
                  <!-- Modifier Modal -->
                  <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#ModifModal">
                    <span class="btn-inner--icon"><i class="material-icons">settings</i></span>
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="ModifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModifModal">Modifier</h5>
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

                                      <input class="form-control" type="text" placeholder="Nom de la spécialité">
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
                <?php
                }
                if(isset($delete) && !empty($delete) && $delete===true){
                ?>
                <div class="col-4 p-1">
                  <!-- Supprimer Modal -->
                  <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#SuprrModal">
                   <span class="btn-inner--icon"><i class="material-icons">close</i></span>
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="SuprrModal" tabindex="-1" role="dialog" aria-labelledby="ModalSuprr" aria-hidden="true">
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
                        <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-color="danger" data-placement="top" data-content="Vous ne pourrez plus revenir en arrière !">Supprimer</button>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

              <?php
              }
              ?>
    <?php
  }
}
*********************/
