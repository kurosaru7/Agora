<?php
    require('template/top.php');
    require('template/navbar.php');
    ?>
    <br><center>
    <?php if(isset($_SESSION['pseudo'])){
        $pseudo = $_SESSION['pseudo'];
    }else {
        $pseudo = "";
    }?>
    <div class="row"><div class="col-2 card" style="width: 18rem;"><div class="card-header text-center">Profil</div><div class="card-avatar"><center><img src="<?= getAvatarPath($pseudo)?>" height="150px;"></center></div><ul id="profil" class="list-group list-group-flush"><form action="./index.php" method="get" class="form">
    <form action="./index.php" method="get">
    <?php foreach ($perso_data_arr as $key => $value) : ?>
        <?php if ($key == 'pseudo') {
            $keyD = $key;
            $key = 'pseudoE';
        }else {
            $keyD = $key;
        }?>
        <li class="param list-group-item"><input required class=" champP form-control" type="text" name="<?=$key?>" value=""><span class="texte"> <?=$keyD?> : <?=$value?></span></li>
    <?php endforeach;
    if (isset($delete)) :?>
        <li class="list-group-item"><?=$delete?><button type="submit" class="save btn">Enregistrer</button></li></ul></div>
    <?php  endif;
    if(isAdmin()) :?>
    <input type="hidden" name="action" value="editProfile">
    </form>
       <div class='col- ml-1'><a href='#' id='edit'>Editer le profil</a></div></div></center>
    <?php 
    elseif (!(isset($_GET['pseudo']))) :?>
        <div class='col- ml-1'><a href='#' id='edit'>Editer le profil</a></div></div></center>
    <?php endif;
    ?>
