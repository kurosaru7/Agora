
<form id='formAccueil' method='get' action='./index.php'>
    <div class='formulaire'>
      <div class='col' >
        <input type='text' class='form-control' name='pseudo' placeholder='Pseudo'>
        <div class='row error'>
        <span>".$_SESSION['error']."</span>
        </div>
      </div>
      <div class='col'>
        <input type='password' class='form-control' name='pw' placeholder='Mot de passe'>
      </div>
      <div class='col'>
        <input type='password' class='form-control' name='pwV' placeholder='Vérifiez votre mot de passe'>
      </div>
      <div class='col'>
      <button type='submit' class='btn connection' name='action' value='register'>S'inscrire</button>
      </div>
    </div>
  </form>