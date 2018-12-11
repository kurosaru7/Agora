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
        echo('<li class="param list-group-item"><input required class=" champP form-control" type="text" name="'.$key.'" value=""><span class="texte"> '.$key.' : '.$value.'</span></li>');
    }
    echo('<input type="hidden" name="action" value="editProfile">');
    if (isset($delete)) {
        echo('<li class="list-group-item">'.$delete.'<button type="submit" class="save btn">Enregistrer</button></li></ul></div>');
    }
echo "<div class='col- ml-1'><a href='#' id='edit'>Editer mon profil</a></div></div></center>";

?>