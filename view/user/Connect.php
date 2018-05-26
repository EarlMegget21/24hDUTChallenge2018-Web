
<form class="mdc-card" id="logincard">
  <div class="mdc-typography--title" id="title">Connexion</div>
  <div class="mdc-text-field" id="identifiant">
    <input type="text" id="login_id" name="login" class="mdc-text-field__input">
    <label class="mdc-floating-label" for="login_id">Identifiant</label>
    <div class="mdc-line-ripple"></div>
  </div>
  <div class="mdc-text-field" id="password">
    <input type="password" id="mdpConnect" name="mdp" class="mdc-text-field__input">
    <label class="mdc-floating-label" for="mdpConnect">Password</label>
    <div class="mdc-line-ripple"></div>
  </div>
  <input id="logbutton" class="mdc-fab material-icons" type="submit" aria-label="Favorite">
  </input>
</form>


<style>
  #logincard{
    width:250px;

  }
  #identifiant,#password {
    width:90px;
  }

</style>


<script src="/Web/js/users.js" async defer></script>
<script>
  const buttonRipple = new mdc.ripple.MDCRipple(document.querySelector('#logbutton'));
 </script>
 <script>
   const textField = new mdc.textField.MDCTextField(document.querySelector('#identifiant'));
   const textFieldPass = new mdc.textField.MDCTextField(document.querySelector('#password'));
 </script>

 <?php
     require File::build_path(array('view','user','Create.php'));
 ?>
