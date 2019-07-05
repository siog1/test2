<?php
session_start();
$page = 'mon-profil';
include '../controller/main_function.php';
include 'head.php';
include 'navbar-dashboard.php';

sessionVerif();
?>
<?php 
  if($_SESSION['id'] == $_GET['session'] || $_SESSION['id'] == $_GET['profil'] || $_SESSION['id'] == $_GET['classe'] ) {?>
    <section class="full-page dashboard">
  <main class="profile-page">
      <div class="container">
        <div class="content-items shadow">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3">
                <a href="#">
                  <img src="<?php echo $url; ?>/assets/img/user/avatar-<?= $_SESSION['idImg'];?>.jpg" class="rounded-circle img-fluid">
                </a>
              </div>
            </div>
            <div class="row justify-content-center">   
              <div class="card-profile-actions py-4 mt-lg-0">
                <a href="#" class="btn btn-sm btn-default float-right">Paramètres</a>
              </div>              
            </div>
            <div class="text-center mt-2">
              <h3><?= $_SESSION['prenom'];?> <strong><?= $_SESSION['nom'];?></strong>
                <span class="font-weight-light">, <?= $_SESSION['age'];?></span>
              </h3>
              <?php $idCls = $_SESSION['classe']; $send = $pdo->query('SELECT * FROM classe INNER JOIN users ON classe.id_classe = users.classe WHERE users.classe ="'.$idCls.'"'); 
              while ($gift = $send->fetch()) {
                $intitule = $gift['intitule'];
                $etude = $gift['etude']; 
                $promo = $gift['promotion'];
              }?> 
              <div class="h6 font-weight-300"><?= $etude;?> <?= $intitule;?> promotion <?= $promo;?></div>
              <div class="h6 mt-4">Travaille à : <?= $_SESSION['entreprise'];?></div>
              <div><i class="ni education_hat mr-2"></i><?= $_SESSION['adresse_ent'];?></div>
            </div>
            <div class="mt-2 py-5 border-top text-center">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                  <p><?= $_SESSION['description'];?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
</section>
<?php
  } elseif($_SESSION['id'] != $_GET['profil'] || $_SESSION['id'] != $_GET['classe']) {
      $requete = $pdo->prepare('SELECT * FROM users WHERE id_user = ?');
      $requete->execute(array($_GET['profil']));
      while ($gift = $requete->fetch()) {
        $prenom = $gift['firstname'];
        $nom = $gift['lastname'];
        $age = $gift['age'];
        $idImg = $gift['img'];
        $classeId = $gift['classe'];
        $entreprise = $gift['entreprise'];
        $adresse_ent = $gift['adresse_ent'];
        $description = $gift['description'];
      }
?>
    <section class="full-page dashboard">
  <main class="profile-page">
      <div class="container">
        <div class="content-items shadow">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3">
                <a href="#">
                  <img src="<?php echo $url; ?>/assets/img/user/avatar-<?= $idImg;?>.jpg" class="rounded-circle img-fluid">
                </a>
              </div>
            </div>
            <div class="row justify-content-center">        
              <div class="card-profile-actions py-4 mt-lg-0">
                <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                    Message
                  </button>
              </div>        
            </div>
            <div class="text-center mt-2">
              <h3><?= $prenom;?> <strong><?= $nom;?></strong>
                <span class="font-weight-light">, <?= $age;?></span>
              </h3>
              <div class="h6 font-weight-300"></div>
              <div class="h6 mt-4">Job : <?= $entreprise;?></div>
              <div><i class="ni education_hat mr-2"></i><?= $adresse_ent;?></div>
            </div>
            <div class="mt-2 py-5 border-top text-center">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                  <p></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



<!-- Modal -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/js/emojionearea/dist/emojionearea.css" media="screen">
<script type="text/javascript" src="../assets/js/emojionearea/dist/emojionearea.js"></script>

<?php

?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Communications avec <span class="font-weight-bold"><?php echo $prenom.' '.substr($nom, 0, 1);?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="input-group ml-3 pr-3" method="POST" id="formchat">
          <input type="text" class="form-control" placeholder="Message" aria-label="message"
            aria-describedby="message" id="message" name="message" required>
          <div class="input-group-append">
            <input type="submit" name="submit" id="submit" style="height: 5ex;" class="btn btn-outline-primary" value="Envoyer"></input>
          </div>
        </form>
        <hr class="my-2">
        <div class="container ht-tm-container" style="max-height: 75vh;overflow: auto;" id="messages">
          <div id="0"></div>
        </div>

      </div>
    </div>
  </div>
</div>
  </main>
</section>
<script>
  $(document).ready(function() {
    $("#message").emojioneArea({
      buttonTitle: "Utilise TAB pour afficher le menu rapidement.",
      searchPosition: "bottom",
      saveEmojisAs: "image",
      pickerPosition: "bottom",
      searchPlaceholder: "Rechercher",
    });
  });
</script>
<script>
$(document).ready(function(){
  function loadTchat(){
    var firstId = $('#messages div:first').attr('id');
    $.ajax({
        url: "./main_tchat.php?id=" + firstId + "&o=<?=$_GET['profil'];?>&me=<?=$_SESSION['id'];?>",
        cache: false,
        success: function(html){
            $("#messages").prepend(html);
        },
    });
  }
  loadTchat();
  setInterval (loadTchat, 2000);
});
</script>
<script>
$('#submit').click(function(e){
    e.preventDefault();
    var message = encodeURIComponent( $('#message').val() );
    document.getElementById("message").value = "";
    if(message != ""){
        $.ajax({
            type: "post", 
            url: "./post_tchat.php", 
            data: "message=" + message + "&user=<?=$_SESSION['id'];?>&for=<?=$_GET['profil'];?>",
        });
        $('.emojionearea-editor').text('');
    }  
});
</script>
<?php
} 

//include 'footer-dashboard.php';

?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
    <script src="<?php echo $url;?>/assets/js/wow.min.js"></script>
    <script src="<?php echo $url;?>/assets/js/argon.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
  </body>
</html>
<style type="text/css">
.emojioneemoji {
  font-size: inherit;
  height: 2ex;
  width: 2.1ex;
  min-height: 20px;
  min-width: 20px;
  display: inline-block;
  margin:0;
  line-height: normal;
  vertical-align: middle;
  max-width: 100%;
  top: 0;
  font-size: 1rem;
  line-height: 0.5;
}

.emojionearea .emojionearea-editor{
  color: #fff!important;
}
.emojionearea, .emojionearea.form-control{
    display: block!important;
    position: relative!important;
    -webkit-box-flex: 1!important;
    -webkit-flex: 1 1 auto!important;
    -ms-flex: 1 1 auto!important;
    flex: 1 1 auto!important;
    width: 1%!important;
    margin-bottom: 0!important;
    height: calc(1.5em + 0.75rem + 2px)!important;
    padding: 0.375rem 0.75rem!important;
    font-size: 1rem!important;
    font-weight: 400!important;
    line-height: 1.5!important;
    background-color: #28293e!important;
    background-clip: padding-box!important;
    border: 1px solid #11111d!important;
    border-radius: 6px!important;
    border-top-right-radius: 0!important;
    border-bottom-right-radius: 0!important;
}
</style>