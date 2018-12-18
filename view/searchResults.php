<?php
  require('./view/template/top.php');
  require('./view/template/navbar.php');
 ?>
<table class="table-fill">
    <thead>
        <tr>
            <th class="text-left">Résultats de la recherche</th>
        </tr>
    </thead>
    <?php
    
        $i = 0;
        foreach ($list as $key => $value) :?>
        
        <tr>
            <td class="text-left"><a href ="index.php?action=printSubject&id=<?=$value["id"]?>"><?=$value["nom"]?></a><font color="purple"> | Sujet créer par :  </font><a href="./index.php?action=myProfile&pseudo=<?=getUserNameById($value["profil"])["pseudo"]?>"><?=getUserNameById($value["profil"])["pseudo"]?></a><font color="purple"> | Créer le : </font><?=$value["dateS"]?> | <font color="purple">Catégorie d'appartenance </font> : <?= getCatNameById($value['categorie'])['nom'];?></td>
        </tr>
    <?php 
        $i++;
        endforeach;?>
    