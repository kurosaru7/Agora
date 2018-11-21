<?php require('model/backend.php');

function home(){
  $title = 'Agora';
  if(isset($_SESSION['error'])){
    print_r($_SESSION['error']);
  }else{
    $_SESSION['error'] = "";
  }
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
    }
  }else {
    $_SESSION['error'] = "Erreur : Compte inconnu.";
  }
  home();
}