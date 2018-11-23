<?php 

function addAnswer($adresse,$sujet,$profil){
  $db = dbConnect();
  $query = $db->prepare('INSERT INTO reponse(points,dateM,adresse,sujet,profil) VALUES(1,:dateM,:adresse,:sujet,:profil)');
  $query->execute(array(
    'sujet' => $sujet,
    'adresse' => $adresse,
    'dateM' => date('Y-m-d H:i:s'),
    'profil' => $profil
  ));
}


function getSujet($idSujet){
  $db = dbConnect();
  $query = $db->query('SELECT * FROM sujet where id =:idSujet');
  $query->execute(array(
      'idSujet'=>$idSujet
  ));
  return $query;
}
?>