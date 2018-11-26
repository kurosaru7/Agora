<?php
session_start();
if (!isset($_SESSION['error'])) {
  $_SESSION['error'] = "";
}
require('controller/backend.php');
require('controller/frontend.php');
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
        if(isset($_GET['name'])){
          $onlyPrint = false;
        }else{
          $onlyPrint = true;
        }
        addAnswerC($onlyPrint);
        break;
      case'addCommet':
        if(isset($_GET['name'])){
         $onlyPrint = false;
        }else{
         $onlyPrint = true;
        }
        addCommetC($onlyPrint);
        break;
    }
  }else{
    home();
  }


}catch(Exception $e){
  $message = $e->getMessage();
}