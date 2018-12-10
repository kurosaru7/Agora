<div id="form-main">
    <div id="form-div">
    <h1 class="h3 mb-3 font-weight-normal"> Créer un compte administrateur </h1>
    <form class="form" id="form1" action = "index.php" method = "GET">
        <input type = "hidden" name= "action" value="addAdmin">
        <input class="form-control" name="pseudo" type="text" placeholder="Pseudo" />
        <input class="form-control" type="password" name="pw" placeholder="Mot de passe">
        <input class="form-control" type="password" name="pwV" placeholder="Vérifiez le mot de passe">
        <button class="btn btn-primary" type="submit" name="addAdmin">Créer</button>
    </div>
    </form>
    </div>
</div>