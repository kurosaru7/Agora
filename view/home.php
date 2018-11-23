<?php
require('template/top.php');
require('template/navbar.php'); ?>


<table class="table-fill">
<thead>
  <tr>
    <th class="text-left">Sujets les plus récents</th>
  </tr>
</thead>
<?php

for($x = 0 ; $x < 5 ; $x++){
  echo '<tr>
<td class="text-left"><font color="purple">Nom du sujet</font> : '.$lastNomSujet[$x][0].'<font color="purple"> | Créateur </font>: '.$lastPseudo[$x][0].'<font color="purple"> | Créer le : </font>'.$lastHeure[$x][0][0].' <font color="purple">à</font> '. $lastHeure[$x][0][1]. '</td>
</tr>';
}

for($i=0 ; $i < count($tab_categories); $i++){
  echo '<table class="table-fill">
<thead>
<tr>
<th class="text-left">'.$tab_categories[$i].'</th>
</tr>
</thead>';
?>
<tbody class="table-hover">
<?php
for($y = 0 ; $y < count($nomSujet[$i]) ; $y++) {
  echo '<tr>
<td class="text-left"><font color="purple">Nom du sujet</font> : '.$nomSujet[$i][$y].'<font color="purple"> | Créateur </font>: '.$pseudo[$i][$y].'<font color="purple"> | Créer le : </font>'.$heure[$i][$y][0].' <font color="purple">à</font> '. $heure[$i][$y][1].'</td>
</tr>';

}
echo '</tbody></table>';

}

?>

<?php require('template/bottom.php'); ?>