<?
  require('./view/template/top.php');
  require('./view/template/navbar.php');
?>

<br>
<center>
  <div class = "row">
    <div class="col-sm">
      <div class="card" style="width: 39rem;">
        <div class="card-header">
          Démarrer une conversation
        </div>
        <div class="card-body">
          <form>
            <div class = "form-inline">
              <label class="sr-only" for="inlineFormInputName2">Destinataire</label>
              <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Pseudo du destinataire">

              <label class="sr-only" for="inlineFormInputName2">Objet</label>
              <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Objet">
            </div>
            <textarea name="message" class="validate[required,length[6,300]] feedback-input" id="message" placeholder="Ecrivez votre message"></textarea>
            <input type="submit" value="Envoyer" id="button-blue">
          </form>
        </div>
    </div>
  </div>
    <div class="col-sm">
      <div class="col-sm">
      <div class="card" style="width: 39rem;">
      <div class="card-header">
          Mes conversations
      </div>
        <div class="card-body">
          <?php echo $empty ?>
          <?php
          for($i = 0; $i < count($pseudoConversation); $i++){
            echo '<p><a href =index.php?action=printConversation&id='. $idConversation[$i].'>'.$pseudoConversation[$i].'</a><br></p>';
          }
          ?>
        </div>
    </div>
    </div>
  </div>
</center>
<?php require('template/bottom.php'); ?>
