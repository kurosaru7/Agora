<?php

require('template/navbar.php');
require('template/top.php'); ?>


<table class="table-fill">
<thead>
  <tr>
    <th class="text-left">Sujets les plus récents</th>
  </tr>
</thead>
<?php

for($x = 0 ; $x < 5 ; $x++){
  echo '<tr>
<td class="text-left"><a href = index.php?action=printSubject&id='.$idLastSujet[$x][0].'>'.$lastNomSujet[$x][0].'</a><font color="purple"> | Sujet créer par :  </font> '.$lastPseudo[$x][0].'<font color="purple"> | Créer le : </font>'.$lastHeure[$x][0][0].' <font color="purple">à</font> '. $lastHeure[$x][0][1]. ' | <font color="purple">Catégorie d\'appartenance </font> : '. $lastCategorie[$x].'</td>
</tr>';
}

for($i=0 ; $i < count($tab_categories); $i++){
  echo '<table class="table-fill">
<thead>
<tr>
<th class="text-left">'.strtoupper($tab_categories[$i]).'</th>
</tr>
</thead>';
?>
<tbody class="table-hover">
<?php
for($y = 0 ; $y < count($nomSujet[$i]) ; $y++) {
  echo '<tr>
<td class="text-left"><a href = index.php?action=printSubject&id='.$idSujet[$i][$y].'>'.$nomSujet[$i][$y].'</a><font color="purple"> | Créateur </font>: '.$pseudo[$i][$y].'<font color="purple"> | Créer le : </font>'.$dateHeure[$i][$y][0].' <font color="purple">à</font> '. $dateHeure[$i][$y][1].'</td>
</tr>';

}
echo '</tbody></table>';

}
?>

<?php require('template/bottom.php'); ?>