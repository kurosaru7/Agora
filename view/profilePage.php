<?php
    require('template/top.php');
    require('template/navbar.php');
    ?>
    
    <?php if(isset($_SESSION['pseudo'])){
        $pseudo = $_SESSION['pseudo'];
    }else {
        $pseudo = "";
    }?>
    <br>
    <div class="container">
    <div class="row">
    <div class="card mr-3">
    <!-- Affiche les derniers sujets de l'utilisateur -->
                <table class="table-fill mt-3 mb-3 ">
                    <thead>
                        <tr>
                            <th class="text-left">Sujets de <?= $pseudo ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            if (isset($list) && $list != NULL) :
                                foreach ($list as $key => $value) :?>
                                <tr>
                                    <td class="text-left"><a href ="index.php?action=printSubject&id=<?=$value["id"]?>"><?=$value["nom"]?></a><font color="purple"> | Sujet créé par :  </font><a href="./index.php?action=myProfile&pseudo=<?=getUserNameById($value["profil"])["pseudo"]?>"><?=getUserNameById($value["profil"])["pseudo"]?></a><font color="purple"> | Créé le : </font><?=$value["dateS"]?> | <font color="purple">Catégorie d'appartenance </font> : <?= getCatNameById($value['categorie'])['nom'];?></td>
                                </tr>
                            <?php $i++; endforeach; 
                            else :?>
                                <tr>
                                    <td>Auncun sujet correspondant</td> 
                                </tr>
                            <?php endif;
                            ?>
                    </tbody>
                </table>
        </div>


<div class="card mr-3" style="width: 18rem;">
    <div class="card-header text-center">Profil</div>
<div class="card-avatar"><center><?php if(isAdmin()) : ?><form action="./index.php" method="get"><input type="hidden" name="action" value="changeAvatar"><input type="file" name="avatar" id="uploadField"><i id="uploadAv" class="fas fa-upload"></i></form><?php endif; ?><img id="avatar"src="<?= getAvatarPath($pseudo)?>" height="150px;"></center></div>
    <ul id="profil" class="list-group list-group-flush"><form action="./index.php" method="get" id="editeur" class="form">
  
    <?php foreach ($perso_data_arr as $key => $value) : ?>
        <?php if ($key == 'pseudo') :
            $keyD = $key;
            $key = 'pseudoE';?>
            <li class="list-group-item"><input type="hidden" name="pseudoE" value="<?= $value?>"><span><?=$keyD?> : <?=$value?></span></li>
        <?php  elseif($key == "id"):
            elseif($key == "avatar"):
         else :
            
            $keyD = $key;?>
            <li class="param list-group-item"><input required class=" champP form-control" type="text" name="<?=$key?>" value=""><span class="texte"> <?=$keyD?> : <?=$value?></span></li>
            <?php endif;?>
    <?php endforeach;?>
    <li class="list-group-item"><input type="hidden" name="action" value="editProfile"></li>
    </form>
    
    </div>

    </div>
    <div class="row mt-3">
    <?php if (isset($delete)) :?>
    <div class="card text-center" style="width: 18rem;">
    <ul  class="list-group list-group-flush">
        <li class="list-group-item"><?=$delete?></li>
    <?php if(isAdmin() || !(isset($_GET['pseudo']))) :?>
    <li class="list-group-item"><a href='#' class="badge badge-light"id='edit'>Editer le profil</a></li>
    <li class="list-group-item "><button id="save" class="save btn badge badge-success">Enregistrer les modifications</button></li>
    <?php endif; endif;?>
    </div>


    <form action ="index.php?action=updateimageProfil" method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <button type="submit" class="btn btn-link">modifier</button>
    </form>

