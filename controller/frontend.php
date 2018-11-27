<?php 
require('model/frontend.php');
function addAnswerC($onlyPrint){
    
  
    if($onlyPrint == false){
      $idSujet = $_GET['idSujet'];
  
      $rdm = uniqid();
      $address = $rdm.'.txt';
      $info = selectInfoUser($_SESSION['pseudo']);
      $idUser = $info['id'];
      $content = fopen('public/reponse/'.$address, 'w+');
      fwrite($content,$_GET['message']);
      fclose($content);      

        addAnswer($address,inval($idSujet),inval($idUser));
   
      header('Location: index.php?action=addAnswer');
  
    }
    require('view/addAnswer.php');
  }

function addCommentC($onlyPrint){  
    if(!$onlyPrint){
    $idAnswer = $_GET['idAnswer'];
      $rdm = uniqid();
      $address = $rdm.'.txt';
      $info = selectInfoUser($_SESSION['pseudo']);
      $id_user = $info['id'];
  
      $content = fopen('public/comment/'.$address, 'w+');
      fwrite($content,$_GET['message']);
      fclose($content);
      addAnswer($address,inval($idAnswer),inval($id_user));
  
      header('Location: index.php?action=addComment');
  
    }
    require('view/addComment.php');
  }

function editAnswerE($editPrint){

  if($editPrint){
    $answer= getAnswer($_GET['idAnswer']->fetch());
    $idAnswer= $answer['id'];
    $answer= $_GET['answer'];
    $name = $_GET['name'];

    $content= fopen('public/reponse/'.$adress, 'w+');
    editAnswer($adresse,$profil);
    fwrite($content,$_GET['message']);
    fclose($content);
  }
}  

?>