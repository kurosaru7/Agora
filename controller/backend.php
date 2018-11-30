<?php
require('model/backend.php');

function home(){
  $title = 'Agora';
  $categories = getCategories();
  $count = 0;
  $count2 = 0;
  $count3 = 0;
  $lastSubjects = printLastSubjects();

  while($data3 = $lastSubjects->fetch()){
      $idLastSujet[$count3][0] = $data3['idSujet'];
      $lastNomSujet[$count3][0] = $data3['nom'];
      $lastDateSujet[$count3][0] = getFrenchDate($data3['dateS']);
      // $lastHeure[$count3][0] = explode(' ',$lastDateSujet[$count3][0]);
      $lastCategorie[$count3]= $data3['nom_categorie'];
      $idLastProfil[$count3][0] = $data3['profil'];
      $lastPseudo[$count3][0] = $data3['pseudo'];
      $count3++;
  }
  while($data2 = $categories->fetch()){
    $tab_categories[$count2] = $data2['nom'];
    $subjects = printSubjectbycategories($data2['id']);
    $count = 0;
    while($data = $subjects->fetch()){

      $nomSujet[$count2][$count] = $data['nom'];
      $idSujet[$count2][$count] = $data['idSujet'];
      $contenu_date[$count2][$count] = $data['dateS'];
      $dateHeure[$count2][$count] = explode(' ',$contenu_date[$count2][$count]);
      $idProfil[$count2][$count] = $data['profil'];
      $nomCategorie[$count2][$count] = $data['nom_categorie'];
      $pseudo[$count2][$count] = $data['pseudo'];
      $count++;
    }
    $count2++;
  }
  require('view/home.php');
}

function connection($array){
  $pseudo = $_GET['pseudo'];
  $pw = $_GET['pw'];
  $isRegister = isRegister($pseudo,$pw)->fetch();
    if($isRegister){
      $_SESSION['status'] = 'connected';
      $_SESSION['pseudo'] = $pseudo;
      $_SESSION['error'] = "";
  }else{
    $_SESSION['error'] = "Erreur : Pseudo ou mot de passe inconnu !";

  }
  header('Location: index.php');
}

function addSubjectC($onlyPrint){
  if(isConnect()){
    $title = 'Créer mon sujet';
    $categories = getCategories();
    $count = 0;
    while($data = $categories->fetch()){
      $listCategories[$count] = $data['nom'];
      $id[$count] = $data['id'];
      $count++;
    }
    if(!$onlyPrint){
      $categorie = $_GET['categorie'];
      $message = $_GET['message'];
      $name = $_GET['name'];
      $rdm = uniqid();
      $address = $rdm.'.txt';
      $info = selectInfoUser($_SESSION['pseudo']);
      $id_user = $info['id'];
      $content = fopen('public/sujet/'.$address, 'w+');
      fwrite($content,$message);
      fclose($content);
      addSubject($name,$id_user,intval($categorie),$address);
      header('Location: index.php?action=home');
    }
    require('view/addSubject.php');
  }else{
    $_SESSION['error'] = "";
    header('Location: index.php');
  }

}
function deleteSubject($id) {
  $subjectId = $_GET['id'];
  delsubject($subjectId);
  header('location: index.php?action=home');
}

function deleteResponse($id) {
  $responseId = $_GET['repId'];
  delCommentary($responseId);
  delresponse($responseId);
  header('location: index.php?action=home');
  }


function printSubjectC($id){

  $subjectInfo = printSubject($id);
  $data = $subjectInfo->fetch();
  $nomSujet = $data['nomSujet'];
  $pseudoCreator = $data['pseudo'];
  $scoreProfilCreator = $data['scoreProfil'];
  $dateInscriptionCreator = getFrenchDate($data['dateInscription']);
  $idSujet = $data['idSujet'];
  $dateCreationSujet = getFrenchDate($data['dateCreationSujet']);
  $statutSujet = $data['statutSujet'];
  $categorieSujet = $data['statutSujet'];
  $avatar = 'public/images/avatar/'.$data['avatar'];
  if(!file_exists($avatar)){
    $avatar = 'public/images/avatar/default.png';
  }
  $data = fopen('public/sujet/'.$data['adresseSujet'],'r');
  $content = "";
  while(false !== ($line = fgets($data))){
    $content .= htmlspecialchars($line);
  }
  if(isset($_GET['closeSubject']))
  {
    closeSubject($idSujet);   
  }
  if(getReponse($id)){
    $reponses = getReponse($id);
    $count = 0;
    while($data2 = $reponses->fetch()){
      $avatarProfil[$count] = getAvatarPath($data2['pseudoProfil']);
      if(!file_exists($avatarProfil[$count])){
        $avatarProfil[$count] = 'public/images/avatar/default.png';
      }
      $pseudoProfil[$count] = $data2['pseudoProfil'];
      $idReponse[$count] = $data2['idReponse'];
      $pointsProfil[$count] = $data2['profilPoints'];
      $dateReponse[$count] = getFrenchDate($data2['dateReponse']);
      $dateInscription[$count] = getFrenchDate($data2['dateInscription']);
      $dataReponse[$count] = fopen('public/reponse/'.$data2['adresseReponse'],'r');
      while(false !== ($line = fgets($dataReponse[$count]))){
        $contentReponse[$count] .= htmlspecialchars($line);
      }
      $count2 = 0;
      if(getComment($idReponse[$count])){
        $comments = getComment($idReponse[$count]);
        while($data3 = $comments->fetch()){
          $pseudoProfilComment[$count][$count2] = $data3['pseudoCommentaire'];
          $idReponseComment[$count][$count2] = $data3['idCommentaire'];
          $pointsProfilComment[$count][$count2] = $data3['profilPointsCommentaire'];
          $dateReponseComment[$count][$count2] = getFrenchDate($data3['dateCommentaire']);
          $dateInscriptionComment[$count][$count2] = getFrenchDate($data3['dateInscriptionCommentaire']);
          $dataReponseComment[$count][$count2] = fopen('public/comment/'.$data3['adresseCommentaire'],'r');
          while(false !== ($lineC = fgets($dataReponseComment[$count][$count2]))){
            $contentComment[$count][$count2] .= htmlspecialchars($lineC);
          }
          $count2++;
        }
      }
    $count++;
    }
  }
  


  require('view/printSubject.php');
}

function getMonth($integer){
    switch($integer){
      case 1 :
        return 'Janvier';
      break;
      case 2 :
        return 'Février';
      break;
      case 3 :
        return 'Mars';
      break;
      case 4 :
        return 'Avril';
      break;
      case 5 :
        return 'Mai';
      break;
      case 6 :
        return 'Juin';
      break;
      case 7 :
        return 'Juillet';
      break;
      case 8 :
        return 'Aôut';
      break;
      case 9 :
        return 'Septembre';
      break;
      case 10 :
        return 'Octobre';
      break;
      case 11 :
        return 'Novembre';
      break;
      case 12 :
        return 'Décembre';
      break;
    }
  }

function getFrenchDate($dateFormatSQL) {

  if(strlen($dateFormatSQL) <= 10){
    $date = explode('-',$dateFormatSQL);
    $date= $date[2].' '.getMonth($date[1]).' '.$date[0];
    $result = $date;
  }else{
    $dateAndHeure = explode(' ',$dateFormatSQL);
    $date = $dateAndHeure[0];
    $date = explode('-',$date);
    $date = $date[2]." ".getMonth($date[1])." ".$date[0];
    $heure = $dateAndHeure[1];
    $result = $date.' à '.$heure;
  }
  return $result;
}

function isConnect(){
  if(isset($_SESSION['status'])){
    return true;
  }
}
//Disconnect the user
function deconnection(){
  session_destroy();
  $_SESSION['error'] = "";
  header('Location: index.php');
}
//Check if the user is registering and register him in the database or asking for the register form
function register(){
  $title = "Inscription";

  if (isset($_GET['pseudo'])){
    foreach ($_GET as $key => $value){
      $value = htmlspecialchars($value);
    }
    if ($_GET['pseudo'] != ""){
      $test = selectInfoUser($_GET['pseudo']);
      if (!$test){
        if (isset($_GET['pw']) && isset($_GET['pwV']) && $_GET['pwV'] == $_GET['pw'] && $_GET['pw'] != "" ){
          addUser($_GET['pseudo'],$_GET['pw']);
          $_SESSION['error'] = "";
          connection($_GET);
        }else{
          $_SESSION['error'] = "Erreur : les mots de passe ne correspondent pas !";
          header('Location: index.php?action=register');
        }
      }else{
        $_SESSION['error'] = "Erreur : Compte déjà existant !";
        header('Location: ./index.php?action=register');
      }
    }else {
      $_SESSION['error'] = "Erreur : Un des champs est mal rempli.";
      header('Location: ./index.php?action=register');
    }
  }else{
    require('view/template/navbar.php');
    require('view/template/top.php');
    print_r($_GET);
    require('view/formRegister.php');
    require('view/template/bottom.php');
  }
}
//Display the profile page of a given user via $_GET['pseudo'] as a string
function displayProfile(){
  if (!isset($_GET['pseudo'])){
    $perso_data_arr = selectInfoUser($_SESSION['pseudo']);
    $delete = "<a href='./index.php?action=deleteMyProfile'>Supprimer mon compte</a>";
  }else{
    $perso_data_arr = selectInfoUser($_GET['pseudo']);
    if (isConnect() && $_GET['pseudo'] == $_SESSION['pseudo']){
      $delete = "<a href='./index.php?action=deleteMyProfile'>Supprimer mon compte</a>";
    }
  }
  $title = 'Profil';
  unset($perso_data_arr['avatar'],$perso_data_arr['id'], $perso_data_arr['statut'], $perso_data_arr['password'], $perso_data_arr['datep'], $perso_data_arr['pseudo'], $perso_data_arr['score']);
  require('./view/profilePage.php');
}
//Return avatar path as a string for a given $pseudo as a string
function getAvatarPath($pseudo){
  $path ="./public/images/avatar/";
  if (isset($_GET['pseudo'])){
    $infoUser = selectInfoUser($_GET['pseudo']);
  }elseif (isset($pseudo) && $pseudo != "") {
    $infoUser = selectInfoUser($pseudo);
  }else{
    $infoUser = selectInfoUser($_SESSION['pseudo']);
  }

  if (isset($infoUser['avatar'])){
    $name = $infoUser['avatar'];
  }else{
    $name = 'default.png';
  }
  $path .= $name;

  return $path;
}
function deleteMyProfile(){
  $profile = $_SESSION['pseudo'];
  deleteTuppleUser($profile);
  deconnection();
  header('Location: ./index.php');
}
function displayCategory(){
  $cat = $_GET['cat'];
  $title = strtoupper($cat);
  $subjects = getSubjectsByCategory($cat);
  require('./view/subjectsFromCategories.php');

}
function displayAdminPage(){
  $title = "Administration";
  if (isset($_GET['admin'])) {
    if ($_GET['admin'] == "closeSubject") {
      home();
      
    } else {
    require('./view/template/top.php');
    require('./view/template/navbar.php');
    if ($_GET['admin'] == "addAdmin") {
      require('./view/formAddAdmin.php');
    }
  }
  }else {
    require('./view/adminPage.php');
  }
}
function isAdmin(){
  $role = selectInfoUser($_SESSION['pseudo']);
  if ($role['statut'] == 'admin') {
    return true;
  }else {
    return false;
  }
}