<?php require('template/top.php'); ?>
<?php require('template/navbar.php'); ?>

<div class="container">
<div class="align-center">
<br>
<h1 class="h3 mb-3 font-weight-normal"> Créer un sujet </h1>

  <form class="form-signin" action = "index.php" method = "GET" enctype="multipart/form-data">
      <input type = "hidden" name = "action" value = "addSubject">
      <input type = "text" name = "name" placeholder = "Titre du sujet"><br>
    <textarea rows="4" cols="50" placeholder="Ecrivez votre message..." name = "message"></textarea><br>
      <select name="categorie">
        <?php
          for($i = 0 ; $i < count($name) ; $i++){
            echo '<option value = '.$id[$i].'>'.strtoupper($name[$i]).'</option>';
          }
        ?>
      </select>
      <input type = "submit" value = "Créer">
    </form>
</div>


<?php require('template/bottom.php'); ?>
