<?php
include '../controller/main_function.php';
if(isset($_GET['id']) and isset($_GET['o'])){

    $id = (int) $_GET['id'];

    $requete = returnPDO()->query('SELECT * FROM `message` WHERE `id_receiver` = '.$_GET['o'].' AND `id_msg` > '.$id.' AND `id_sender` = '.$_GET['me'].' OR `id_receiver` = '.$_GET['me'].' AND `id_msg` > '.$id.' AND `id_sender` = '.$_GET['o'].' ORDER BY `id_msg` DESC');
    $requete->execute();


    $messages = null;

    date_default_timezone_set('Europe/Paris');
    setlocale(LC_TIME, "fr_FR");

    while($donnees = $requete->fetch()){
      $req = returnPDO()->query('SELECT * FROM users WHERE id_user="'.$donnees["id_sender"].'"');
      $req->execute();
      $nob = $req->fetch();

      $messages .= '
          <div class="card mb-2 border-primary text-left" id="'.$donnees["id_msg"].'">
            <div class="card-body msg-card">
              <p>'.$donnees["message"].'</p>
              <footer style="min-height: 10px!important;padding: 0px;" class="text-right">'.date("d/m/y - H:i", strtotime($donnees["date_time"])).'
                  <cite title="Source Title">'.$nob['firstname'].' '.substr($nob['lastname'], 0, 1).'</cite>
              </footer>
            </div>
          </div>
      ';
    }
    echo $messages; 
}

?>