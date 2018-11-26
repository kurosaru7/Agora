<?php

function dbConnect() {
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=agora;charset=utf8','root','');
  }
  catch(Exception $e)
  {
    die('Erreur :' .$e->getMessage());
  }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function deleteSubject() {
$db = $this->dbConnect();



}


function closeSubject () {
$db = $this->dbConnect();



}


function deleteResponse () {
$db = $this->dbConnect();



}

function deleteCommentary () {
$db = $this->dbConnect();




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
$query = $db->prepare('SELECT S.nom AS nomSujet ,P.pseudo AS pseudo,P.score AS scoreProfil ,P.datep AS dateInscription ,P.avatar AS avatar,S.dateS AS dateCreationSujet,S.statut AS statutSujet,S.categorie AS idcategorieSujet,S.adresse AS adresseSujet,CA.nom AS nomCategorie FROM categorie CA JOIN sujet S ON CA.id = S.categorie JOIN profil P ON S.profil = P.id WHERE S.id = :idSujet ');
$query->execute(array(
  'idSujet' => $id
));
return $query;
}

















?>