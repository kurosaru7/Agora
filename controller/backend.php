<?php require('model/backend.php');

function home(){
  $title = 'Agora';
  $categories = getCategories() ;
  $count = 0;
  $count2 = 0;
  $count3 = 0;
  $lastSubjects = printLastSubjects();

  while($data3 = $lastSubjects->fetch()){
      $idLastSujet[$count3][0] = $data3['idSujet'];
      $lastNomSujet[$count3][0] = $data3['nom'];
      $lastDateSujet[$count3][0] = $data3['dateS'];
      $lastHeure[$count3][0] = explode(' ',$lastDateSujet[$count3][0]);
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
    header('Location: index.php');
  }
}

function printSubjectC($id){
  $subjectInfo = printSubject($id);
  $data = $subjectInfo->fetch();
  $nomSujet = $data['nomSujet'];
  $pseudoCreator = $data['pseudo'];
  $scoreProfilCreator = $data['scoreProfil'];

  $dateInscriptionCreator = $data['dateInscription'];
  $dateInscriptionCreator = explode('-',$dateInscriptionCreator);
  $dateInscriptionCreator = $dateInscriptionCreator[2].'-'.$dateInscriptionCreator[1].'-'.$dateInscriptionCreator[0];


  $dateCreationSujet = $data['dateCreationSujet'];
  $dateHeure = explode(' ',$dateCreationSujet);
  $dateEnvoi = $dateHeure[0];
  $dateEnvoi = explode('-',$dateEnvoi);
  $dateEnvoi = $dateEnvoi[2].'-'.$dateEnvoi[1].'-'.$dateEnvoi[0];


  $heureEnvoi = $dateHeure[1];


  $statutSujet = $data['statutSujet'];
  $categorieSujet = $data['statutSujet'];
  $avatar = 'public/images/avatar/'.$data['avatar'];
  $data = fopen('public/sujet/'.$data['adresseSujet'],'r');
  $content = "";
  while(false !== ($line = fgets($data))){
    $content .= $line;
  }

  $idCategorieSujet = $data['idcategorieSujet'];
  require('view/printSubject.php');
}

function isConnect(){
  if(isset($_SESSION['status'])){
    return true;
  }
}

function deconnection(){
  session_destroy();
  header('Location: index.php');
}
function register(){
  if (isset($_GET['pseudo'])){
    $test = selectInfoUser($_GET['pseudo']);
    if (!$test) {
      if (isset($_GET['pw']) && isset($_GET['pwV']) && $_GET['pwV'] == $_GET['pw']){
        addUser($_GET['pseudo'],$_GET['pw']);
        connection($_GET);
      }
    }else{
      $_SESSION['error'] = "<script>
      function myFunction() {
          alert('Erreur : Compte déjà existant!');
      }
      myFunction();
      </script>";
      header('Location: index.php?action=register');
    }

  }else{
    require('view/template/navbar.php');
    require('view/template/top.php');
    require('view/formRegister.php');
    require('view/template/bottom.php');
  }
}
function displayProfile(){
  $perso_data_arr = selectInfoUser($_SESSION['pseudo']);
  $title = 'Profil';
  unset($perso_data_arr['id'], $perso_data_arr['statut'], $perso_data_arr['password'], $perso_data_arr['datep'], $perso_data_arr['pseudo'], $perso_data_arr['score']);
  require('./view/profilePage.php');
}