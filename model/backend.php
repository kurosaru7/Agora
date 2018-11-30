<?php

function dbConnect() {
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=agora;charset=utf8','red','');
  }
  catch(Exception $e)
  {
    die('Erreur :' .$e->getMessage());
  }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function delSubject($subjectId) {
  $db = dbConnect();
  $req = $db->prepare("DELETE FROM sujet WHERE id = :id");
  $req->execute(array(
  ":id" => $subjectId,
  ));
}


function closeSubject () {
$db = $this->dbConnect();



}

// function getIdSujet($idReponse){
//   $db = dbConnect();
//   $req = $db->prepare('SELECT * FROM reponse WHERE id = :idReponse ');
//   $req->execute(array(
//     'idReponse' => $idReponse,
//   ));
//   return $req;
// }

function delResponse ($responseId) {
  $db = dbConnect();
  $req = $db->prepare("DELETE FROM reponse WHERE id = :id");
  $req->execute(array(
  ":id" => $responseId,
  ));
}

function delCommentary ($responseId) {
  $db = dbConnect();
  $req = $db->prepare("DELETE FROM commentaire WHERE reponse =:id");
  $req->execute(array(
  ":id" => $responseId,
  ));
}

function delCommentarywithID($responseId)
{
  $db = dbConnect();
  $req = $db->prepare("DELETE FROM commentaire WHERE id =:id");
  $req->execute(array(
    ":id" => $responseId,
  ));
}

function selectInfoUser($user){
  $db = dbConnect();
  $req = $db->prepare("SELECT * FROM profil WHERE pseudo LIKE :pseudo");
  $req->execute(array(
    ":pseudo" => $user,
  ));
  $result = $req->fetch(PDO::FETCH_ASSOC);
  return $result;
}


function isRegister($pseudo,$password){
$db = dbConnect();
$req = $db->prepare('SELECT * FROM profil WHERE pseudo LIKE :pseudo AND password LIKE :password');
$req->execute(array(
  'pseudo' => $pseudo,
  'password' => $password
));
return $req;
}

function addSubject($nom,$profil,$categorie,$adresse){
  $db = dbConnect();
  $query = $db->prepare('INSERT INTO sujet(nom,dateS,statut,profil,categorie,adresse) VALUES(:nom,:dateS,"ouvert",:profil,:categorie,:adresse)');
  $query->execute(array(
    'nom' => $nom,
    'profil' => $profil,
    'categorie' => $categorie,
    'adresse' => $adresse,
    'dateS' => date('Y-m-d H:i:s')
  ));
}

function getCategories(){
  $db = dbConnect();
  $query = $db->query('SELECT * FROM categorie');
  return $query;
}

function printSubjectbycategories($idCategorie){
  $db = dbConnect();
  $query = $db->prepare('SELECT S.id AS idSujet,S.nom,S.dateS,S.profil,C.nom AS nom_categorie,P.pseudo
                      FROM sujet S JOIN categorie C
                      ON S.categorie = C.id
                      JOIN profil P
                      ON P.id = S.profil
                      WHERE C.id = :idCategorie
                      ORDER BY dateS');
  $query->execute(array(
    'idCategorie' => $idCategorie
  ));
  return $query;
}
function addUser($pseudo,$pw){
  $db = dbConnect();
  $query = $db->prepare('INSERT INTO profil(pseudo,password,datep) VALUES(:pseudo,:password,:datep)');
  $query->execute(array(
    'pseudo' => $pseudo,
    'password' => $pw,
    'datep' => date('Y-m-d')
  ));
}

function printLastSubjects(){
  $db = dbConnect();
  $query = $db->query('SELECT S.id AS idSujet,S.nom,S.dateS,S.profil,C.nom AS nom_categorie,P.pseudo
                      FROM sujet S JOIN categorie C
                      ON S.categorie = C.id
                      JOIN profil P
                      ON P.id = S.profil
                      ORDER BY dateS DESC');
  return $query;
}

function printSubject($id){
$db = dbConnect();
$query = $db->prepare('SELECT S.nom AS nomSujet ,S.id AS idSujet,P.id AS idProfil,P.pseudo AS pseudo,P.score AS scoreProfil ,P.datep AS dateInscription ,P.avatar AS avatar,S.dateS AS dateCreationSujet,S.statut AS statutSujet,S.categorie AS idcategorieSujet,S.adresse AS adresseSujet,CA.nom AS nomCategorie FROM categorie CA JOIN sujet S ON CA.id = S.categorie JOIN profil P ON S.profil = P.id WHERE S.id = :idSujet ');
$query->execute(array(
  'idSujet' => $id
));
return $query;
}

function getReponse($id){
  $db = dbConnect();
  $query = $db->prepare('SELECT R.id AS idReponse,R.adresse AS adresseReponse,R.points AS pointsReponse,R.datem AS dateReponse,P.score AS profilPoints, P.pseudo AS pseudoProfil,P.id as idProfilReponse,P.datep AS dateInscription,P.avatar AS avatar
                         FROM reponse R JOIN sujet S
                         ON R.sujet = S.id
                         JOIN profil P
                         ON R.profil = P.id
                         WHERE sujet = :sujet
                         ORDER BY dateReponse');
  $query->execute(array(
    'sujet' => $id
  ));
return $query;
}


function getComment($id){
  $db = dbConnect();
  $query = $db->prepare('SELECT C.id AS idCommentaire,C.adresse AS adresseCommentaire,C.points AS pointsCommentaire,C.datecom AS dateCommentaire,P.score AS profilPointsCommentaire, P.pseudo AS pseudoCommentaire,P.datep AS dateInscriptionCommentaire,P.avatar AS avatar,P.id AS idProfil
                         FROM reponse R
                         JOIN commentaire C
                         ON C.reponse = R.id
                         JOIN profil P
                         ON C.profil = P.id
                         WHERE R.id = :reponse
                         ORDER BY dateCommentaire');
  $query->execute(array(
    'reponse' => $id
  ));
return $query;
}


function deleteTuppleUser($profil){
  $db = dbConnect();
  $query = $db->prepare('DELETE FROM profil WHERE pseudo LIKE :pseudo ');
  $query->execute(array(
    'pseudo' => $profil
  ));
  return 1;
}
function  getSubjectsByCategory($cat){
  $db = dbConnect();
  $query = $db->prepare('SELECT * FROM sujet WHERE categorie = (SELECT id FROM categorie WHERE nom LIKE :categorie)');
  $query->execute(array(
    'categorie' => $cat,
  ));
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
function getUserById($id){
  $db = dbConnect();
  $query = $db->prepare('SELECT * FROM profil WHERE id = :id ');
  $query->execute(array(
    'id' => $id,
  ));
  $result = $query->fetch(PDO::FETCH_ASSOC);
  return $result;
}
















?>