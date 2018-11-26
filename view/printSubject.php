<?php  
  require('template/navbar.php');
  require('template/top.php'); 
  ?>

<div class="divCreator">
  <div class = "container">
    <div class = "nomSujet">
       <h1>Sujet : <?php echo $nomSujet; ?></h1>
    </div>
    <br>
    <div class="card" style="width: 13rem;">
      <div class="card-body">
        <center>
          <div class="card-avatar">
            <img src = <?php echo $avatar ?>  height =150px;>
          </div>
        <h5 class="card-title">
          <font color="purple"><?php echo $pseudoCreator ?></font>
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
         Message :
          <div class ="content">
            <?php echo $content; ?>
          </div>
          <div class = "dateEnvoi">
            Envoyé le : <?php echo $dateEnvoi ?> à <?php echo $heureEnvoi?>
          </div>
          <div class ="administration">
            <a href ="index.php?action=report.png"><img src="public/images/administration/report.png" width =25px></a>
            <a href ="index.php?action=like.png"><img src="public/images/administration/like.png" width=40px></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php require('template/bottom.php'); ?>