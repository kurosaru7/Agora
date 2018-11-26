<?php
    require('template/top.php');
    require('template/navbar.php');
    echo('<div class="card" style="width: 18rem;"><div class="card-header">Profil</div><ul class="list-group list-group-flush">');
    foreach ($perso_data_arr as $key => $value){
        echo('<li class="list-group-item">'.$key.' : '.$value.'</li>');
    }
?>