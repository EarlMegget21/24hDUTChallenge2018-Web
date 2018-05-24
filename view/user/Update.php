<form method="post" id="signupForm" class="form" action="/Web/index.php?action=updated&controller=User"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
  <h3>Modifier mon compte</h3>

    <div id="alreadyExist"></div>
  <label for="login_id">Login *</label>
    <input type='text' value='<?php echo htmlspecialchars($_GET['login']); ?>' name='login' id='login_id' readonly/>

    <div id="emailErreur"></div>
  <label for="email_id">Email *</label>
  <input type="email" value='<?php echo htmlspecialchars($v->get("email")); ?>' name="email" id="email_id" required/>

    <div id="mdpErreur"></div>
  <label for="mdp_id">Mot de passe *</label>
  <input type="password" placeholder="Ex:azerty" name="mdp" id="mdp_id" required/>

  <label for="mdp2_id">Confirmez mot de passe *</label>
  <input type="password" placeholder="Ex:azerty" name="mdp2" id="mdp2_id" required/>

  <label for="nom_id">Nom *</label>
  <input type="text" value='<?php echo htmlspecialchars($v->get("nom")); ?>' name="nom" id="nom_id" required/>

  <label for="prenom_id">Prenom *</label>
  <input type="text" value='<?php echo htmlspecialchars($v->get("prenom")); ?>' name="prenom" id="prenom_id" required/>

  <?php
      if(Session::is_admin()){
          echo "<label for='admin_id'>Administrateur </label>
              <input type='checkbox' ";
              if($v->isAdmin()){
                  echo "checked";
              }
          echo " name='isAdmin' id='admin_id'/>";
      }
  ?>
  <input type="submit" class="submitButton" value="Valider les modifications"/>
  <p>Les champs marqués d'une * sont obligatoires</p>
</form>

<script src="/Web/js/users.js" async defer></script>