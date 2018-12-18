<?php
  require('./view/template/top.php');
  require('./view/template/navbar.php');
 ?>


<table class="table-fill">
<thead>
  <tr>
    <th class="text-left">Sujets les plus récents</th>
  </tr>
</thead>
<?php
for($x = 0 ; $x < count($idLastSujet) ; $x++) : ?>
  <tr>
    <td class="text-left"><a href ="index.php?action=printSubject&id=<?=$idLastSujet[$x][0]?>"><?=$lastNomSujet[$x][0]?></a><font color="purple"> | Sujet créer par :  </font><a href="./index.php?action=myProfile&pseudo=<?=$lastPseudo[$x][0]?>"><?=$lastPseudo[$x][0]?></a><font color="purple"> | Créer le : </font><?=$lastDateSujet[$x][0]?> | <font color="purple">Catégorie d'appartenance </font> : <?= $lastCategorie[$x]?></td>
  </tr>
<?php endfor;

for($i=0 ; $i < count($tab_categories); $i++): ?>
  <table class="table-fill">
<thead>
<tr>
<th class="text-left"><?= strtoupper($tab_categories[$i])?></th>
</tr>
</thead>
<tbody class="table-hover">
<?php
for($y = 0 ; $y < count($nomSujet[$i]) ; $y++) :?>
  <tr>
<td class="text-left"><a href ="index.php?action=printSubject&id=<?=$idSujet[$i][$y]?>"><?=$nomSujet[$i][$y]?></a><font color="purple"> | Créateur </font><a href="./index.php?action=myProfile&pseudo=<?=$pseudo[$i][$y]?>">: <?=$pseudo[$i][$y]?></a><font color="purple"> | Créer le : </font><?= $contenu_date[$i][$y]?></td>
</tr>

<?php endfor;?>
</tbody></table>

<?php endfor;?>
<?php require('template/bottom.php'); ?>