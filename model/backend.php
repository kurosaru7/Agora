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
  $query = $db->prepare('SELECT S.id,S.nom,S.dateS,S.profil,C.nom AS nom_categorie,P.pseudo
                      FROM sujet S JOIN categorie C
                      ON S.categorie = C.id
                      JOIN profil P
                      ON P.id = S.profil
                      WHERE C.id = :idCategorie
                      ORDER BY categorie');
  $query->execute(array(
    'idCategorie' => $idCategorie
  ));
  return $query;
}
function addUser($pseudo,$pw){
  $db = dbConnect();
  $query = $db->prepare('INSERT INTO profil(pseudo,password) VALUES(:pseudo,:password)');
  $query->execute(array(
    'pseudo' => $pseudo,
    'password' => $pw
  ));
}















?>