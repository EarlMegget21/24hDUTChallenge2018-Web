<form method="post" id="signupForm" class="form" action="/Web/index.php?action=created&controller=User"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
    <h3>Créer un compte</h3>

    <div id="alreadyExist"></div>
    <label for="login_id">Login *</label>
    <input type='text' placeholder='Ex:OutlawSpiritus' name='login' id='login_id' required/>

    <div id="emailErreur"></div>
    <label for="email_id">Email *</label>
    <input type="email" placeholder="ex:mail@gmail.com" name="email" id="email_id" required/>

    <div id="mdpErreur"></div>
    <label for="mdp_id">Mot de passe *</label>
    <input type="password" placeholder="Ex:azerty" name="mdp" id="mdp_id" required/>

    <label for="mdp2_id">Confirmez mot de passe *</label>
    <input type="password" placeholder="Ex:azerty" name="mdp2" id="mdp2_id" required/>

    <label for="nom_id">Nom *</label>
    <input type="text" placeholder="ex:Smith" name="nom" id="nom_id" required/>

    <label for="prenom_id">Prenom *</label>
    <input type="text" placeholder="ex:Will" name="prenom" id="prenom_id" required/>

    <?php
    if(Session::is_admin()){
        echo "<label for='admin_id'>Administrateur </label>
              <input type='checkbox' name='isAdmin' id='admin_id'/>";
        //TODO: reCaptcha+verif form, URL Rewrite+liens, accessibilité serveur, HeaderFooter mobile, Design inspi, vérif pour éviter erreurs SQL, retours d'erreur plus précis
    }
    ?>
    <input type="submit" class="submitButton" value="Valider l'inscription"/>
    <p>Les champs marqués d'une * sont obligatoires</p>
</form>

<script src="/Web/js/users.js" async defer></script>