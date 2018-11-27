<?php
    require('template/top.php');
    require('template/navbar.php');
    echo('<div class="card" style="width: 18rem;"><div class="card-header text-center">Profil</div><div class="card-avatar"><center><img src="'.getAvatarPath().'" height="150px;"></center></div><ul class="list-group list-group-flush">');
    foreach ($perso_data_arr as $key => $value){
        echo('<li class="list-group-item">'.$key.' : '.$value.'</li>');
    }
    if (isset($delete)) {
        echo('<li class="list-group-item">'.$delete.'</li></ul></div>');
    }
?>