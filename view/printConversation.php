<?php
    require('template/navbar.php');
    require('template/top.php');
?>
        <br><br><br>
          <center>
              <?php echo $sujet.' | Conversation commencé le '.$dateCrea ?>
           <div class="message-screen">
                <?php
                for ($i = 0; $i < count($contentMessage); $i++) {
                    if ($i % 2 == 1) {
                        echo '<div class="timestamp"><span><b>' . getFrenchDate($dateCou[$i]) . '</span></div>
                        <div class="sender-text"><p>' . $contentMessage[$i] . '</p></div>';
                    } else {
                        echo '<div class="timestamp"><span><b>' . getFrenchDate($dateCou[$i]) . '</span></div>
                        <div class="receiver-text"><p>' . $contentMessage[$i] . '</p></div>';
                    }
                }
                ?>
            </div>
<div class ="courrier">
                <form class="form" class="form-signin" action = "index.php" method = "GET">
                      <input type = "hidden" name = "action" value = "addCourrier">
                      <input type = "hidden" name = "idConv" value= "<?php echo $idConv ?>">
                      <div class="input-type-comment">
                      <div class="submit-courrier">
                      <textarea name="message" class="validate[required,length[6,300]] feedback-input" id="message" placeholder="Ecrivez votre message"></textarea>
                        <input type="submit" value="Envoyer"/>
                      </div>
                </form>
  </center>
<?php require('template/bottom.php'); ?>
