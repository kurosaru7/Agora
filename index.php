<?php 
session_start();
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
    }
  }else{
    home();
  }


}catch(Exception $e){
  $message = $e->getMessage();
}