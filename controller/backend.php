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

function addSubjectC($name,$categorie,$message,$onlyPrint){
  $title = 'Créer mon sujet';
  $categories = getCategories();
  $count = 0;
  while($data = $categories->fetch()){
    $name[$count] = $data['nom'];
    $id[$count] = $data['id'];
    $count++;
  }
  if(!$onlyPrint){
    $rdm = uniqid();
    $adresse = $rdm.'.txt';
    $info = selectInfoUser($_SESSION['pseudo']);
    $id_user = $info['id'];
    addSubject($nom,$id_user,$categorie);

    $content = fopen('public/sujet/'.$adresse, 'w+');
    fwrite($content,$message);
    fclose($content);

    header('Location:index.php?action=addSubject');
  }
  require('view/addSubject.php');
}