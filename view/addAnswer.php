<?php  
  require('template/navbar.php');
  require('template/top.php'); 
  ?>

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

        

      </div>


    </form>
  </div>


<?php require('template/bottom.php'); ?>