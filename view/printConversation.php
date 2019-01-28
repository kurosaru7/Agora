<?php
    require('template/navbar.php');
    require('template/top.php');
    ?>
        <br><br><br>
          <center>
              <?php echo $sujet.' | Conversation commencé le '.$dateCrea?>
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

  </center>
<?php require('template/bottom.php'); ?>
