<?php
    require('template/top.php');
    require('template/navbar.php');
    echo "<br><center>";
    if(isset($_SESSION['pseudo'])){
        $pseudo = $_SESSION['pseudo'];
    }else {
        $pseudo = "";
    }
    echo('<div class="row"><div class="col"></div><div class="col-2 card" style="width: 18rem;"><div class="card-header text-center">Profil</div><div class="card-avatar"><center><img src="'.getAvatarPath($pseudo).'" height="150px;"></center></div><ul id="profil" class="list-group list-group-flush"><form action="./index.php" method="get" class="form">');
    foreach ($perso_data_arr as $key => $value){
        if ($key == 'pseudo') {
            $keyD = $key;
            $key = 'pseudoE';
        }else {
            $keyD = $key;
        }
        echo('<li class="param list-group-item"><input required class=" champP form-control" type="text" name="'.$key.'" value=""><span class="texte"> '.$keyD.' : '.$value.'</span></li>');
    }
    if (isset($delete)) {
        echo('<li class="list-group-item">'.$delete.'<button type="submit" class="save btn">Enregistrer</button></li></ul></div>');
    }
    if(isAdmin()){
        echo "<div class='col- ml-1'><a href='#' id='edit'>Editer le profil</a></div></div></center>";
    }elseif (!(isset($_GET['pseudo']))) {
        echo "<div class='col- ml-1'><a href='#' id='edit'>Editer le profil</a></div></div></center>";
    }

?>