<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #6C3483;">
  <img src = 'public/images/agora.png' width = 50px;>&nbsp;
  <a class="navbar-brand" href="index.php?action=home">Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catégories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">PHP</a>
          <a class="dropdown-item" href="#">HTML</a>
          <a class="dropdown-item" href="#">SQL</a>
          <a class="dropdown-item" href="#">JS</a>
        </div>
      </li>&nbsp;
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher un sujet</button>
       </form>
    </ul>
  </div>
  <form id="formAccueil" action="./index.php">
    <div class="form-row">
      <div class="col" >
        <input type="text" class="form-control" placeholder="Pseudo">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Mot de passe">
      </div>
      <button type="submit" class="btn btn-success" name='action' value='connexion'>Se connecter</button>
      <a href ='#'><button type="submit" name='action' value='inscription' class="btn btn-link">Créer un compte</button></a>
    </div>
  </form>
</nav>