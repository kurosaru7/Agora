<?php require('template/top.php'); ?>
<?php require('template/navbar.php'); ?>

<div id="form-main">
  <div id="form-div">
  <h1 class="h3 mb-3 font-weight-normal"> Créer un sujet </h1>
    <form class="form" id="form1" action = "index.php" method = "GET">
      <input type = "hidden" name = "action" value = "addSubject">
      <p class="name">
        <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Titre du sujet" />
      </p>

      <p class="text">
        <textarea name="message" class="validate[required,length[6,300]] feedback-input" id="message" placeholder="Ecrivez votre problème..."></textarea>
      </p>


      <div class="submit">
        <input type="submit" value="Créer" id="button-blue"/>
        <div class="ease"></div>

         <div class="center-on-page">
        <div class="select">
          <select name="categorie" id = "slct">
            <?php
              for($i = 0 ; $i < count($listCategories) ; $i++){
                echo '<option value = '.$id[$i].'>'.strtoupper($listCategories[$i]).'</option>';
              }
            ?>
          </select>
        </div>
      </div>

      </div>


    </form>
  </div>


<?php require('template/bottom.php'); ?>
