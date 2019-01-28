<?php
  require('template/top.php');
  require('template/navbar.php');
  ?>
<div class="container mt-3">
  <div class="row">
    <div class="card w-100">
      <div class="card-header text-center">
        Créer un sujet
      </div>
      <div class="card-body">
        <form class="form" id="form1" action = "index.php" method = "GET">
          <input type = "hidden" name = "action" value = "addSubject">
          <input name="name" type="text" class="text-center w-50 validate[required,custom[onlyLetter],length[0,100]] feedback-input" required placeholder="Titre du sujet" />
          <textarea name="message" id="message"></textarea>
          <select class="center-on-page" name="categorie" id = "slct">
                <?php
                  for($i = 0 ; $i < count($listCategories) ; $i++){
                    echo '<option value = '.$id[$i].'>'.strtoupper($listCategories[$i]).'</option>';
                  }
                ?>
              </select>

            <input type="submit" value="Créer" id="button-blue"/>
        </form>
      </div>
    </div>
  </div>
  </div>
  <?php require('template/bottom.php'); ?>
