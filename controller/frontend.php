<?php 

function addAnswerC($onlyPrint){
    
  
    if(!$onlyPrint){
      $sujet = getSujet($_GET['idSujet'])->fetch();
      $idSujet = $sujet['id'];
      $sujet = $_GET['sujet'];
      $message = $_GET['message'];
      $name = $_GET['name'];
  
      $rdm = uniqid();
      $address = $rdm.'.txt';
      $info = selectInfoUser($_SESSION['pseudo']);
      $id_user = $info['id'];
  
      $content = fopen('public/reponse/'.$address, 'w+');
      fwrite($content,$_GET['message']);
      fclose($content);
      addAnswer($address,$idSujet,$id_user);
  
      header('Location: index.php?action=addAnswer');
  
    }
    require('view/addAnswer.php');
  }
  ?>