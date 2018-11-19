<?php require('model/backend.php');
session_start();

function home(){
  $title = 'Agora';
  require('view/home.php');
}