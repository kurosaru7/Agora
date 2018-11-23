<?php require('template/top.php'); ?>
<?php require('template/navbar.php'); ?>

<div id="form-main">
  <div id="form-div">
  <h1 class="h3 mb-3 font-weight-normal"> Créer une réponse </h1>
    <form class="form" id="form1" action = "index.php" method = "GET">
      <input type = "hidden" name = "action" value = "addAnswer">

      </p>

      <p class="text">
        <textarea name="message" class="validate[required,length[6,300]] feedback-input" id="message" placeholder="Ecrivez votre réponse"></textarea>
      </p>
 

      <div class="submit">
        <input type="submit" value="Créer" id="button-blue"/>
        <div class="ease"></div>

         <div class="center-on-page">
        <div class="select">
          <select name="sujet" id = "slct">
            <?php
              for($i = 0 ; $i < count($listSujet) ; $i++){
                echo '<option value = '.$id[$i].'>'.strtoupper($listSujet[$i]).'</option>';
              }
            ?>
          </select>
        </div>
      </div>

      </div>


    </form>
  </div>


<?php require('template/bottom.php'); ?>