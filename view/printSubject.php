<?php
  require('template/navbar.php');
  require('template/top.php');
  ?>

<div class = "nomSujet">
  <h1>Sujet : <?php echo $nomSujet; ?></h1>
</div>

<div class="divCreator">
  <div class = "container">
    <br>
    <div class="card" style="width: 13rem;">
      <div class="card-body">
        <center>
          <div class="card-avatar">
            <img src = <?php echo $avatar ?>  height =150px;>
          </div>
        <h5 class="card-title">
          <font color="purple"><a href="./index.php?action=myProfile&pseudo=<?php echo($pseudoCreator); ?>"><?php echo($pseudoCreator); ?></a> </font>
          <br>
          <?php echo $scoreProfilCreator ?> Points
        </h5>
        Inscrit depuis le : <?php echo $dateInscriptionCreator ?>
        </center>
      </div>
    </div>
    <div class = "card-message">
      <div class="card" style="width: 60rem;">
        <div class="card-body">
         Message  :
          <div class ="content">
            <?php echo $content; ?>
          </div>
          <div class = "dateEnvoi">
            Envoyé le : <?php echo $dateEnvoi ?> à <?php echo $heureEnvoi?>
          </div>
          <div class ="administration">
            <a href ="index.php?action=report.png"><img src="public/images/administration/report.png" width =25px></a>
            <a href ="index.php?action=like.png"><img src="public/images/administration/like.png" width=35px></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class = "card-reponses">
<?php
for($i =0 ; $i < $count ;$i++){
  echo '<div class ="card-reponse">
    <div class="container">
      <div class="card" style="width: 13rem;">
        <div class="card-body">
          <center>
            <div class="card-avatar">
              <img src = '.$avatarProfil[$i].' height =100px;>
            </div>
          <h5 class="card-title">
            <font color="purple"><a href="./index.php?action=myProfile&pseudo='.$pseudoProfil[$i].'">'.$pseudoProfil[$i].'</a></font>
            <br>
            '.$pointsProfil[$i].' Points
          </h5>
          Inscrit depuis le : '.$dateInscription[$i].'
          </center>
        </div>
      </div>
      <div class = "card-message-reponse">
        <div class="card" style="width: 60rem;">
          <div class="card-body">
          Réponse :
            <div class ="content">
              '.$contentReponse[$i].'
            </div>
            <div class = "dateEnvoi">
              Envoyé le : '.$dateReponse[$i].'
            </div>
            <div class ="administration">
              <a href ="index.php?action=report.png"><img src="public/images/administration/report.png" width =25px></a>
              <a href ="index.php?action=like.png"><img src="public/images/administration/like.png" width=35px></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>';
}

?>
</div>

<?php require('template/bottom.php'); ?>