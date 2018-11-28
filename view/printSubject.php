<?php
  require('template/navbar.php');
  require('template/top.php');
  ?>

<div class = "nomSujet">
  <h1>Sujet : <?php echo $nomSujet; ?></h1>
</div>
<br>
  <div class = "container">
    <div class="global-sujet">
      <div class="card">
        <div class="card-header">
          <center>
            <div class="card-avatar">
              <img src = <?php echo $avatar ?>  height = 80px;>
            </div>
              <h5 class="card-title">
                <font color="purple"><a href="./index.php?action=myProfile&pseudo=<?php echo($pseudoCreator); ?>"><?php echo($pseudoCreator); ?></a> </font>
                <br>
                <div class="profilPoints">
                  <?php echo $scoreProfilCreator ?> Points
                </div>
              </h5>
            <div class="dateInscription">
              Inscrit depuis le :
              <?php echo $dateInscriptionCreator ?>
            </div>
          </center>
        </div>
        <div class="card-body">
            <div class ="content">
              <?php echo $content; ?>
            </div>
        </div>
        <div class="card-footer text-muted">
              <div class = "dateEnvoi">
              Envoyé le <?php echo $dateEnvoiC ?> à <?php echo $heureEnvoiC?>
            </div>
            <div class ="administration">
              <a href ="index.php?action=report.png"><img src="public/images/administration/report.png" width = 20px></a>
              <a href ="index.php?action=like.png"><img src="public/images/administration/like.png" width = 20px></a>
              
          </div>
          </div>
      </div>

        <div class = "card-reponses">
          <?php
          for($i =0 ; $i < $count ;$i++){
            echo '

            <br><div class="global-sujet">
      <div class="card">
        <div class="card-header">
          <center>
            <div class="card-avatar">
              <img src ='.$avatarProfil[$i].'  height = 80px;>
            </div>
              <h5 class="card-title">
                <font color="purple"><a href="./index.php?action=myProfile&pseudo='.$pseudoProfil[$i].'">'.$pseudoProfil[$i].'</a></font>
                <br>
                <div class="profilPoints">
                  '.$pointsProfil[$i].' Points
                </div>
              </h5>
            <div class="dateInscription">
              Inscrit depuis le :
              '.$dateInscription[$i].'
            </div>
          </center>
        </div>
        <div class="card-body">
            <div class ="content">
              '.$contentReponse[$i].'
            </div>
        </div>
            <div class="card-footer text-muted">
              <div class = "dateEnvoi">
              Envoyé le '.$dateEnvoi[$i].'  à '.$heureEnvoi[$i].'
            </div>
            <div class ="administration">
              <a href ="index.php?action=report.png"><img src="public/images/administration/report.png" width =20px></a>
              <a href ="index.php?action=like.png"><img src="public/images/administration/like.png" width=20px></a>
              <a hef ="index.php?action=sup.png"><img src="public/images/administration/sup.png" width = 20px></a>
            </div>
          </div>
      </div>
    </div>';
          }
          ?>
        </div>
      </div>
          <br><br>
      <div class="card">
        <div class="card-header">
            Ajouter une réponse
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <form class="form" id="form1" action = "index.php" method = "GET">
              <input type = "hidden" name = "action" value = "addAnswer">
                <p class="text">
                  <textarea name="message" class="validate[required,length[6,300]] feedback-input" id="message" placeholder="Ecrivez votre réponse"></textarea>
                </p>
                <div class="submit">
                  <input type="submit" value="Envoyer" id="button-blue"/>
                </div>
              <input type="hidden" name="idSujet" value= <?php echo $idSujet ?>>
            </form>
          </blockquote>
        </div>
      </div>

    </div>

<?php require('template/bottom.php'); ?>