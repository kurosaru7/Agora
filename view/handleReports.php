<?php
    require('./view/template/top.php');
    require('./view/template/navbar.php');
?>
<div class="container mt-3">
<table id="reportTab" class="display">
    <thead>
        <tr>
            <th>Signalement</th>
            <th>Date</th>
            <th>Type de connection_status</th>
            <th>Demandeur</th>
            <th>Contenu signalé</th>
            <th>Supprimer le signalement</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($list as $key => $value) :?>
            <tr>
                <?php foreach ($value as $colonne => $valeur) :?>
                <td>
                <?php 
                    if ($colonne == "profil") :
                        $valeur = getUserNameById($valeur);
                        print("<a href='./index.php?action=myProfile&pseudo=".$valeur['pseudo']."'>".$valeur['pseudo']."</a>");
                    elseif ($colonne == "id_contenu") :
                        $valeur = printSubject($valeur)->fetch();
                        print("<a href='./index.php?action=printSubject&id=".$valeur['idSujet']."'>".$valeur['nomSujet']."</a>");
                    else : 
                        print($valeur);
                    endif;?>
                </td>
                <?php endforeach;?>
                <td><a class='badge badge-danger'href="./index.php?action=deleteReport&id=<?=$value["id"]?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach;?>
        
    </tbody>
</table>
</div>