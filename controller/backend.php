<?php require('model/backend.php');
session_start();

function home(){
  $title = 'Agora';
  require('view/home.php');
}

function connection($array){
  $pseudo = $_GET['pseudo'];
  $pw = $_GET['pw'];
  $infos = selectInfoUser($pseudo);
  if (isset($infos)){
    if ($infos['password'] == $pw){
      $_SESSION['status'] = 'connected';
      $_SESSION['pseudo'] = $pseudo;
      $_SESSION['error'] = '';
    }
  }else {
    $_SESSION['error'] = "Erreur : Compte inconnu.";
  }
}