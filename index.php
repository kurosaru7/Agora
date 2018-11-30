<?php
session_start();
if (!isset($_SESSION['error'])) {
  $_SESSION['error'] = "";
}
require_once('controller/backend.php');
require_once('controller/frontend.php');

try{
  if(isset($_GET['action'])){
    switch($_GET['action']){
      case 'home' :
        home();
      break;
      case 'connection' :
        connection($_GET);
      break;
      case 'addSubject' :
        if(isset($_GET['name'])){
          $onlyPrint = false;
        }else{
          $onlyPrint = true;
        }
        addSubjectC($onlyPrint);
      break;
      case 'printSubject' :
        printSubjectC($_GET['id']);
      break;
      case 'deconnection':
        deconnection();
      break;
      case 'register':
        register();
        break;
      case 'myProfile':
        displayProfile();
        break;
      case '':
        home();
        break;
      case 'addAnswer' :
        if(isset($_GET['message'])){
          $onlyPrint = false;
        }else{
          $onlyPrint = true;
        }
        addAnswerC($onlyPrint);
        break;
      case'addComment':
        if(isset($_GET['message'])){
         $onlyPrint = false;
        }else{
         $onlyPrint = true;
        }
        addCommentC($onlyPrint);
        break;
      case 'deleteMyProfile':
        deleteMyProfile();
        break;
      case 'displayCategory':
        displayCategory();
        break;
      case 'deleteSubject' : 
        deleteSubject($id);
        break;
      case 'deleteResponse' :
        deleteResponse($id);
        break;

      case 'administration':
        if (isAdmin()) {
          displayAdminPage();
        }else{
          $_SESSION['error'] = "Erreur : vous n'êtes pas administrateur.";
          header('Location: ./index.php');
        }
        break;
    }
  }else{
    home();
  }


}catch(Exception $e){
  $message = $e->getMessage();
}