<?php

function addAnswer($address,$idSujet,$idUser){
  $db = dbConnect();
  $query = $db->prepare('INSERT INTO reponse(points,dateM,adresse,sujet,profil) VALUES(1,:dateM,:adresse,:sujet,:profil)');
  $query->execute(array(
    'sujet' => $idSujet,
    'adresse' => $address,
    'dateM' => date('Y-m-d H:i:s'),
    'profil' => $idUser
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

function addComment($adresse,$answer,$profil){
  $db = dbConnect();
  $query = $db->prepare('INSERT INTO reponse(points,datecom,adresse,reponse,profil) VALUES(1,:datecom,:adresse,:reponse,:profil)');
  $query->execute(array(
    'reponse'=> $answer,
    'adresse'=> $adresse,
    'datecom'=> date('Y-m-d H:i:s'),
    'profil'=> $profil
  ));
}

function getAnswer($idAnswer){
  $db = dbConnect();
  $query = $db->query('SELECT * FROM reponse where id =:idAnswer');
  $query->execute(array(
      'idAnswer'=>$idAnswer
  ));
  return $query;
}

function editAnswer($adresse,$profil){
  $db =dbConnect();
  $query =$db->prepare('UPDATE reponse SET adresse = :adresse WHERE id =:idAnswer');
  $query -> execute(array(
    'idAnswer'=> $idAnswer,
    'adresse'=> $adresse
  ));
}
?>