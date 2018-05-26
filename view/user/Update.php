<form method="post" id="signupForm" class="mdc-card carte form" action="/Web/index.php?action=updated&controller=User">
    <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
    <h2 class="card-h2 card-padding mdc-typography--title">Modification de profil</h2>

    <div class="mdc-text-field" id="identifiantsignup">
        <label class="mdc-floating-label" for="ipisignup">Login *</label>
        <input type='text' value='<?php echo htmlspecialchars($_GET['login']); ?>' name='login' id='ipisignup' readonly
               class="mdc-text-field__input"/>
        <div class="mdc-line-ripple"></div>
    </div>

    <div class="mdc-text-field" id="mailsignup">
        <label class="mdc-floating-label" for="mailsingup">Email *</label>
        <input type="email" value='<?php echo htmlspecialchars($v->get("email")); ?>' name="email" id="mailsingup"
               class="mdc-text-field__input"
               required/>
        <div class="mdc-line-ripple"></div>
    </div>

    <div class="mdc-text-field" id="passwordsignup">
        <label class="mdc-floating-label" for="ippsignup">Mot de passe *</label>
        <input type="password" name="mdp" id="ippsignup" class="mdc-text-field__input" required/>
        <div class="mdc-line-ripple"></div>
    </div>

    <div class="mdc-text-field" id="passwordsignupconfirm">
        <label class="mdc-floating-label" for="ippconfirmsignup">Confirmez mot de passe *</label>
        <input type="password" name="mdp2" id="ippconfirmsignup" class="mdc-text-field__input" required/>
        <div class="mdc-line-ripple"></div>
    </div>

    <div class="mdc-text-field" id="nom">
        <label class="mdc-floating-label" for="namesignup">Nom *</label>
        <input type="text" value='<?php echo htmlspecialchars($v->get("nom")); ?>' name="nom" id="namesignup" required
               class="mdc-text-field__input"/>
        <div class="mdc-line-ripple"></div>
    </div>

    <div class="mdc-text-field" id="prenom">
        <label class="mdc-floating-label" for="prenomsignup">Prenom *</label>
        <input type="text" value='<?php echo htmlspecialchars($v->get("prenom")); ?>' name="prenom" id="prenomsignup"
               class="mdc-text-field__input"
               required/>
        <div class="mdc-line-ripple"></div>
    </div>
    <?php
    if (Session::is_admin()) {
        echo "<label for='admin_id'>Administrateur </label>
              <input type='checkbox' ";
        if ($v->isAdmin()) {
            echo "checked";
        }
        echo " name='isAdmin' id='admin_id'/>";
    }
    ?>
    <style>
        .mdc-text-field {
            width: 90%;
            margin: auto;
        }

        .form p {
            padding: 15px;
        }

        button.mdc-fab.material-icons {
            margin: auto;
            margin-top: 15px;
            margin-bottom: 15px;
        }
    </style>
    <button type="submit" class="mdc-fab material-icons">
                <span class="mdc-fab__icon">
                    send
                </span>
    </button>
    <p>Les champs marqués d'une * sont obligatoires</p>
</form>

<script src="/Web/js/users.js" async defer></script>

<script>

    textFieldidsingup = new mdc.textField.MDCTextField(document.querySelector('#identifiantsignup'));
    textFieldPasssignup = new mdc.textField.MDCTextField(document.querySelector('#passwordsignup'));
    textFieldPassMail = new mdc.textField.MDCTextField(document.querySelector('#mailsignup'));
    textFieldPassConf = new mdc.textField.MDCTextField(document.querySelector('#passwordsignupconfirm'));
    textFieldPassNom = new mdc.textField.MDCTextField(document.querySelector('#nom'));
    textFieldPassPrenom = new mdc.textField.MDCTextField(document.querySelector('#prenom'));
</script>