<?php
    require('./view/template/top.php');
    require('./view/template/navbar.php');
?>
<table class="table-fill">
<thead>
<tr>
    <th class="text-left"><?php echo(strtoupper($_GET['cat'])) ?></th>
</tr>
</thead>
<tbody class="table-hover">
<?php
foreach ($subjects as $key => $value) {
        $pseudo = getUserById($value['profil']);
        $dateHeure = explode(" ",$value['dateS']);
        echo '<tr>
                <td class="text-left"><a href = index.php?action=printSubject&id='.$value['id'].'>'.$value['nom'].'</a><font color="purple"> | Créateur </font>: '.$pseudo['pseudo'].'<font color="purple"> | Crée le : </font>'.$dateHeure[0].' <font color="purple">à</font> '. $dateHeure[1].'</td>
            </tr>';
}
echo '</tbody></table>';