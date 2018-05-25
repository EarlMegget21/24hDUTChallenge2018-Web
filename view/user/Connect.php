<form method="post" id="signinForm" class="form" action="/Web/index.php?action=connected&controller=user">
    <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
    <h3>Connexion:</h3>
    <label for="login_id">Login</label>
    <input type="text" name="login" id="login_id" required/>

    <label for="mdpConnect">Mot de passe</label>
    <input type="password" name="mdp" id="mdpConnect" required/>

    <input class="submitButton" type="submit" value="Se Connecter"/>
</form>
<div class="mdc-card" id="logincard">
  <div class="mdc-typography--title" id="title">Connexion</div>
  <div class="mdc-text-field">
    <input type="text" id="identifiant" class="mdc-text-field__input">
    <label class="mdc-floating-label" for="identifiant">Identifiant</label>
    <div class="mdc-line-ripple"></div>
  </div>
  <div class="mdc-text-field">
    <input type="password" id="password" class="mdc-text-field__input">
    <label class="mdc-floating-label" for="password">Password</label>
    <div class="mdc-line-ripple"></div>
  </div>
  <button class="mdc-fab material-icons" aria-label="Favorite">
    <span class="mdc-fab__icon">
      favorite
    </span>
  </button>
</div>


<style>
  #logincard{
    width:250px;

  }
  #identifiant,#password {
    width:90px;
  }

</style>


<script src="/Web/js/users.js" async defer></script>
