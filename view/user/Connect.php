<form method="post" id="signinForm" class="form" action="/Web/index.php?action=connected&controller=user">
    <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
    <h3>Connexion:</h3>
    <label for="login_id">Login</label>
    <input type="text" name="login" id="login_id" required/>

    <label for="mdpConnect">Mot de passe</label>
    <input type="password" name="mdp" id="mdpConnect" required/>

    <input class="submitButton" type="submit" value="Se Connecter"/>
</form>

<script src="/Web/js/users.js" async defer></script>