<?php
session_start();
if (!isset($_SESSION['error'])) {
  $_SESSION['error'] = "";
}
require('controller/backend.php');
try{
  if(isset($_GET['action'])){
    switch($_GET['action']){
      case 'home' :
        home();
      break;
      case 'connection' :
        connection($_GET);
      break;
      case 'myProfile' :
        echo 'C';
      break;
      case 'addSubject' :
        if(isset($_GET['name'])){
          $onlyPrint = false;
        }else{
          $onlyPrint = true;
        }
        addSubjectC($onlyPrint);
      break;
      case 'deconnection':
        deconnection();  
      break;
    }
  }else{
    home();
  }


}catch(Exception $e){
  $message = $e->getMessage();
}