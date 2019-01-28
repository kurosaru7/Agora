<?php
  require('template/navbar.php');
  require('template/top.php');
  ?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href='index.php?action=displayCategory&cat=<?= $nomCategorie?>'><?= $nomCategorie?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $nomSujet?></li>
    </ol>
  </nav>

  <div class = "container">
    <div class="global-sujet">

      <div class = "nomSujet">
        <h1> <?= $nomSujet?></h1>
      </div>
      <div class="card border-secondary mb-3">
        <div class="card-header">
          <center>
            <div class="card-avatar">
              <img src = <?= $avatar ?>  height = 90px; width =90px;>
            </div>
              <h5 class="card-title">
                <font color="purple"><a href="./index.php?action=myProfile&pseudo=<?=$pseudoCreator ?>"><?=$pseudoCreator?></a> </font>
                <br>
                <div class="profilPoints">
                  <?= $scoreProfilCreator ?> Points
                </div>
              </h5>
            <div class="dateInscription">
              Inscrit depuis le :
              <?= $dateInscriptionCreator ?>
            </div>
          </center>
        </div>
        <div class="card-body">
            <div class ="content">
              <?= $content?>
            </div>
        </div>
        <div class="card-footer text-muted">
              <div class = "dateEnvoi">
              Envoyé le <?= $dateCreationSujet ?>
            </div>
            <div class ="administration">
              <a href ="index.php?action=report&type=sujet&id=<?=$idSujet?>"><i class="fas fa-flag"></i></a>Signaler
              <a href ="index.php?action=like&type=sujet&id=<?=$idSujet?>"><i class="fas fa-thumbs-up"></i></a>Like
              <?php if(isset($optionsCreatorSujet )){print($optionsCreatorSujet);} if(isset($optionsAdminSujet)){print($optionsAdminSujet);} ?>

          </div>
          </div>
      </div>
      <br>
      <?php if ($statutSujet == "ouvert") : ?>
      <div class="card">
        <div class="card-header">
            Ajouter une réponse

        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <form class="form" id="form1" action = "index.php" method = "GET">
              <input type = "hidden" name = "action" value = "addAnswer">
                <p class="text">
                  <textarea name="message" class="validate[required,length[6,300]] feedback-input" id="message" placeholder="Ecrivez votre réponse"></textarea>
                </p>
                <div class="submit">
                  <input type="submit" value="Envoyer" id="button-blue"/>
                </div>
              <input type="hidden" name="idSujet" value=<?=$idSujet?>>
            </form>
          </blockquote>
        </div>
        <?= $printCloseSubject ?>
      </div>
      <?php else : ?> 
      sujet fermé
      <?php endif; ?>
        <br><br>
        <div class = "card-reponses">
          <?php
            for ($i =0 ; $i < $count ;$i++) : ?>
    <br><div class="global-sujet">
      <div class="card">
        <div class="card-header">
          <center>
            <div class="card-avatar">
              <img src ="<?=$avatarProfil[$i]?>"  height = 90px; width =90px;>
            </div>
              <h5 class="card-title">
                <font color="purple"><a href="./index.php?action=myProfile&pseudo=<?=$pseudoProfil[$i]?>"><?=$pseudoProfil[$i]?></a></font>
                <br>
                <div class="profilPoints">
                  <?=$pointsProfil[$i]?> Points
                </div>
              </h5>
            <div class="dateInscription">
              Inscrit depuis le :
              <?=$dateInscription[$i]?>
            </div>
          </center>
        </div>
        <div class="card-body">
            <div class ="content">
              <?=$contentReponse[$i]?><br><br><ul class="list-group list-group-flush">
              <?php if(isset($pseudoProfilComment[$i])){ ?>
              <?php
               for ($y = 0 ; $y < count($pseudoProfilComment[$i]) ; $y++) :?>
                    <br>
                       <li class="list-group-item"><font color ="purple"><?=$pseudoProfilComment[$i][$y] ?></font> :<?=$contentComment[$i][$y] ?>
              <?php if(isset($optionsCreatorComment)) { ?><?=$optionsAdminComment[$i][$y].$optionsCreatorComment[$i][$y]?><?php } ?>
                      <small class="text-muted"><div class = "date-comment">Envoyé le <?=$dateReponseComment[$i][$y]?></div></small></li>
                  <br>
<?php endfor; ?>
              <?php } ?>
            </ul></div>
            <br> <div class ="comment">
                <form class="form" class="form-signin" action = "index.php" method = "GET">
                      <input type = "hidden" name = "action" value = "addComment">
                      <div class="input-type-comment">
                        <input placeholder="Répondre" type="text" name="message" class="form-control">
                      </div>
                      <div class="submit-comment">
                        <input type="submit" value="Envoyer"/>
                      </div>
                <input type="hidden" name="idAns" value=<?=$idReponse[$i]?>>
                <input type="hidden" name="idSujet" value=<?=$idSujet?>>
              </form>
        </div>
        </div>
            <div class="card-footer text-muted">
              <div class = "dateEnvoi">
              Envoyé le <?=$dateReponse[$i]?>
            </div>
            <div class ="administration">
              <a href ="index.php?action=report&type=reponse&id=<?=$idReponse[$i]?>"><i class="fas fa-flag"></i></a>Signaler
              <a href ="index.php?action=like&type=reponse&id=<?=$idReponse[$i]?>"><i class="fas fa-thumbs-up"></i></a>Like
              <?php if(isset($optionsCreatorReponse)) { ?><?=$optionsAdminReponse[$i]. $optionsCreatorReponse[$i]?><?php } ?>
            </div>
          </div>
      </div>
    </div>
    <br>
<?php endfor; ?>
        </div>
      </div>
    </div>
<!-- <?= $isCreator ?> -->
<?php require('template/bottom.php'); ?>
