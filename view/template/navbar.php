<nav class="navbar navbar-expand-lg navbar-light ">
  <img src = 'public/images/agora.png' width = 50px;>&nbsp;
  <a class="navbar-brand" href="index.php?action=home">Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="nav-list collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catégories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="categorie-card">
          <a class="dropdown-item" href="./index.php?action=displayCategory&cat=php">PHP</a>
          <a class="dropdown-item" href="./index.php?action=displayCategory&cat=html">HTML</a>
          <a class="dropdown-item" href="./index.php?action=displayCategory&cat=sql">SQL</a>
          <a class="dropdown-item" href="./index.php?action=displayCategory&cat=js">JS</a>
        </div>
      </li>&nbsp;
      <form class="form-inline">
        <input class="nav-element form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
        <button  class="btn nav-element my-2 my-sm-0" type="submit">Rechercher un sujet</button>
       </form>
    
    <?php
    if(isset($_SESSION['status'])) {
      if($_SESSION['status'] == 'connected'){
        echo "&nbsp <a href = 'index.php?action=addSubject'><button  class='btn nav-element my-2 my-sm-0' type='submit'>Créer un sujet</button></a>";
      }
    }
    ?>
    </ul>
  </div>
  <?php
  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'connected'){
      echo "<div class='row mr-2'><span class='navbar-text'> Bonjour </span>";
      echo ('<div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pseudo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            '.$_SESSION['pseudo'].'
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="profil-card" >
            <a class="dropdown-item" href="index.php?action=myProfile">Profil</a>
            ');
            $type = selectInfoUser($_SESSION['pseudo']);
            if ($type['statut'] == 'admin'){
              echo('<a class="dropdown-item" href="index.php?action=administration">Administration</a>');
            }
            echo('
            <a class="dropdown-item" href="index.php?action=deconnection">Se deconnecter</a>
          </div>
        </li></div>');
    }
  }else {
    echo "
    <form id='formAccueil' method='get' action='./index.php'>
    <div class='formulaire form-row'>
      <div class='col' >
        <input type='text' class='form-control' name='pseudo' placeholder='Pseudo'>
        <div class='row error'>
        <span></span>
        </div>
      </div>
      <div class='col'>
        <input type='password' class='form-control' name='pw' placeholder='Mot de passe'>
      </div>
      <div class='col'>
      <button type='submit' class='btn connection' name='action' value='connection'>Se connecter</button>
      </div>
      <div class='col'>
      <a href ='index.php?action=register'>Créer un compte</a>
      </div>
    </div>
  </form>";
  }


  ?>
</nav>
<?php 
if ($_SESSION['error'] != ''){

 echo('<div class="alert alert-warning alert-dismissible">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <strong>Attention!</strong> '.$_SESSION['error'].'
</div>');
}
?>
<div class="container">
