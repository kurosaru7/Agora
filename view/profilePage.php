<?php
    require('template/navbar.php');
    require('template/top.php');
    echo('<div class="card" style="width: 18rem;"><div class="card-header text-center">Profil</div><div class="card-avatar"><center><img src="'.getAvatarPath($_SESSION["pseudo"]).'" height="150px;"></center><ul class="list-group list-group-flush">');
    unset($perso_data_arr['avatar']);
    foreach ($perso_data_arr as $key => $value){
        echo('<li class="list-group-item">'.$key.' : '.$value.'</li>');
    }
?>