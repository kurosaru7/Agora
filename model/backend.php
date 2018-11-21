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

function addSubject($nom,$profil,$categorie){
  $db = dbConnect();
  $adresse = uniqid();
  $query = $db->prepare('INSERT INTO profil(nom,dateS,statut,profil,categorie,adresse) VALUES(:nom,NOW(),"ouvert",:profil,:categorie,:adresse');
  $query->execute(array(
    'nom' => $nom,
    'profil' => $profil,
    'categorie' => $categorie,
    'adresse' => $adresse
  ));
}

function getCategories(){
  $db = dbConnect();
  $query = $db->query('SELECT * FROM categorie');
  return $query;
}
















?>