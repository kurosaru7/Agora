<?php
require('template/top.php');
require('template/navbar.php'); ?>


<?php

for($i=0 ; $i < count($tab_categories); $i++){
  echo '<table class="table-fill">
<thead>
<tr>
<th class="text-left">'.$tab_categories[$i].'</th>
</tr>
</thead>';
?>
<tbody class="table-hover">
<?
for($y = 0 ; $y < count($nomSujet[$i]) ; $y++) {
  echo '<tr>
<td class="text-left">'.$nomSujet[$i][$y].'</td>
</tr>';

}
echo '</tbody></table>';

}
 ?>
<?php require('template/bottom.php'); ?>
