<form class="mdc-card" id="signupcard">
  <div class="mdc-typography--title" id="titlesignup">Inscription</div>
  <div class="mdc-text-field" id="identifiantsignup">
    <input type="text" id="ipisingup" name ="login" class="mdc-text-field__input login_id">
    <label class="mdc-floating-label" for="ipisignup">Identifiant</label>
    <div class="mdc-line-ripple"></div>
  </div>
  <div id="mdpErreur"></div>
  <div class="mdc-text-field" id="mailsignup">
    <input type="email" id="mailsingup" name ="email" class="mdc-text-field__input email_id">
    <label class="mdc-floating-label" for="mailsignup">Mail</label>
    <div class="mdc-line-ripple"></div>
  </div>

  <div id="mdpErreur"></div>
  <div class="mdc-text-field" id="passwordsignup">
    <input type="password" id="ippsignup" name="mdp" class="mdc-text-field__input mdp_id">
    <label class="mdc-floating-label" for="ippsignup">Mot de passe</label>
    <div class="mdc-line-ripple"></div>
  </div>


  <div class="mdc-text-field" id="passwordsignupconfirm">
    <input type="password" id="ippconfirmsignup" name ="mdp2" class="mdc-text-field__input mdp2_id">
    <label class="mdc-floating-label" for="ippconfirmsignup">Confirmer Mot de Passe</label>
    <div class="mdc-line-ripple"></div>
  </div>

  <div class="mdc-text-field" id="nom">
    <input type="text" id="namesignup" name ="nom" class="mdc-text-field__input nom_id">
    <label class="mdc-floating-label" for="namesignup">Nom</label>
    <div class="mdc-line-ripple"></div>
  </div>

  <div class="mdc-text-field" id="prenom">
    <input type="text" id="prenomsignup" name ="prenom" class="mdc-text-field__input prenom_id">
    <label class="mdc-floating-label" for="prenomsignup">Prenom</label>
    <div class="mdc-line-ripple"></div>
  </div>

  <?php
 if(Session::is_admin()){
     echo "<div class='mdc-checkbox' id='checkadmin'><label for='admin_id'>Administrateur </label>
           <input type='checkbox' name='isAdmin' id='admin_id'class='mdc-checkbox__native-control'/></div>";
     //TODO: reCaptcha+verif form, URL Rewrite+liens, accessibilité serveur, HeaderFooter mobile, Design inspi, vérif pour éviter erreurs SQL, retours d'erreur plus précis
 }
 ?>
  <input id="createbutton" type="submit" id="#createbutton" class="mdc-fab material-icons" value="Go!"></input>
</form>


<style>
  #signupcard{
    width:250px;

  }
  #identifiantsignup,#password,#mailsignup,#passwordconfirm, #nom,#prenom {
    width:130px;
  }

</style>

<script>
  const buttonRipplesignup = new mdc.ripple.MDCRipple(document.querySelector('#createbutton'));
 </script>
 <script>
   const textFieldidsingup = new mdc.textField.MDCTextField(document.querySelector('#identifiantsignup'));
   const textFieldPasssignup = new mdc.textField.MDCTextField(document.querySelector('#passwordsignup'));
   const textFieldPassMail = new mdc.textField.MDCTextField(document.querySelector('#mailsignup'));
   const textFieldPassConf = new mdc.textField.MDCTextField(document.querySelector('#passwordsignupconfirm'));
   const textFieldPassNom = new mdc.textField.MDCTextField(document.querySelector('#nom'));
   const textFieldPassPrenom = new mdc.textField.MDCTextField(document.querySelector('#prenom'));
 </script>
