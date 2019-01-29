<?php
require('model/frontend.php');

function addAnswerC($onlyPrint){
    if(isConnect()){

      if($onlyPrint == false){
        $idSujet = $_GET['idSujet'];

        $rdm = uniqid();
        $address = $rdm.'.txt';
        $info = selectInfoUser($_SESSION['pseudo']);
        $idUser = $info['id'];
        $content = fopen('public/reponse/'.$address, 'w+');
        fwrite($content,$_GET['message']);
        fclose($content);

        addAnswer($address,intval($idSujet),intval($idUser));

        header('Location: index.php?action=printSubject&id='.$idSujet);


      }
    }
  }

function addCommentC($onlyPrint){
  if(isConnect()){
    if($onlyPrint == false){
      $idSujet = $_GET['idSujet'];
      $idAns = $_GET['idAns'];

      $rdm = uniqid();
      $address = $rdm.'.txt';
      $info = selectInfoUser($_SESSION['pseudo']);
      $id_user = $info['id'];

      $content = fopen('public/comment/'.$address, 'w+');
      fwrite($content,$_GET['message']);
      fclose($content);
      addComment($address,intval($idAns),intval($id_user));

      header('Location: index.php?action=printSubject&id='.$idSujet);

    }
  }
}

function editAnswerE($editPrint){

  if($editPrint){
    $answer = getAnswer($_GET['idAnswer']->fetch());
    $idAnswer = $answer['id'];
    $answer = $_GET['answer'];
    $name = $_GET['name'];
    $content= fopen('public/reponse/'.$adress, 'w+');
    editAnswer($adresse,$profil);
    fwrite($content,$_GET['message']);
    fclose($content);
  }
}

function deleteAnswerD($deletePrint){
  if($deletePrint){
      $answer = getAnswer($_Get['idAnswer']->fetch());
      $idAnswer = $answer['id'];
      $answer = $_GET['answer'];
      $iduser = getUserById ($_Get['idUser']->fetch());
      deleteAnswer($idAnswer);
  }
}


function deleteCommentD($deletePrint){
  if(isConnect()){
    if($deletePrint){
      $comment = getComment($_Get['idComment']->fetch());
      $idComment = $comment['id'];
      $comment = $_GET['comment'];
      $iduser = getUserById ($_Get['idUser']->fetch());
      deleteComment($id);
    }
}
}

function addMesC($onlyPrint){
  if(isConnect()){

    if($onlyPrint == false){
      $idSujet = $_GET['idConv'];

      $rdm = uniqid();
      $address = $rdm.'.txt';
      $info = selectInfoUser($_SESSION['pseudo']);
      $idUser = $info['id'];
      $content = fopen('public/courrier/'.$address, 'w+');
      fwrite($content,$_GET['message']);
      fclose($content);

      addCourrier($address,intval($idConv));

      header('Location: index.php?action=printConversation&id='.$idConv);


    }
  }
}
?>