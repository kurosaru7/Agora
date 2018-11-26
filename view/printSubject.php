<?php require('template/top.php'); ?>
<?php require('template/navbar.php'); ?>

<div class="divCreator">
  <div class = "container">
    <div class = "nomSujet">
      Sujet : <?php echo $nomSujet; ?>
    </div>
    <div class="card" style="width: 13rem;">
      <div class="card-body">
        <center>
          <div class="card-avatar">
            <img src = <?php echo $avatar ?>  height =150px;>
          </div>
          <br>
        <h5 class="card-title">
          <font color="purple"><?php echo $pseudoCreator ?></font>
          <br>
          <?php echo $scoreProfilCreator ?> Points
        </h5>
        <br>
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
        </div>
      </div>
    </div>
  </div>
</div>


<?php require('template/bottom.php'); ?>