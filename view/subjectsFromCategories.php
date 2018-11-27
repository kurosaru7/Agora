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
for ($i=0; $i < count($subjects); $i++) { 
    foreach ($subjects[$i] as $key => $value) {
        $pseudo = getUserById($subjects[$i]['profil']);
        $dateHeure = explode(" ",$subjects[$i]['dateS']);
        echo '<tr>
                <td class="text-left"><a href = index.php?action=printSubject&id='.$subjects[$i]['id'].'>'.$subjects[$i]['nom'].'</a><font color="purple"> | Créateur </font>: '.$pseudo['pseudo'].'<font color="purple"> | Crée le : </font>'.$dateHeure[0].' <font color="purple">à</font> '. $dateHeure[1].'</td>
            </tr>';
    }
    // print_r($subjects[$i]);
    // echo('<br>');
}
// foreach ($subjects as $key => $value) {
//     echo '<tr>
//     <td class="text-left"><a href = index.php?action=printSubject&id='.$idSujet[$i][$y].'>'.$nomSujet[$i][$y].'</a><font color="purple"> | Créateur </font>: '.$pseudo[$i][$y].'<font color="purple"> | Créer le : </font>'.$dateHeure[$i][$y][0].' <font color="purple">à</font> '. $dateHeure[$i][$y][1].'</td>
//     </tr>';
// }
echo '</tbody></table>';