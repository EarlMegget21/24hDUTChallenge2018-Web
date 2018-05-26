<div class="organizer">
    <div class="carte" style="    width: 100%;">
        <form class="mdc-card form" id="loginForm" method="post" action="?controller=user&action=connected">
            <h2 class="card-h2 card-padding mdc-typography--title">Connexion</h2>
            <div class="mdc-text-field" id="identifiant">
                <input autocomplete="off" type="text" id="login_id" name="login" class="mdc-text-field__input">
                <label class="mdc-floating-label" for="login_id">Identifiant</label>
                <div class="mdc-line-ripple"></div>
            </div>
            <div class="mdc-text-field" id="password">
                <input autocomplete="off" type="password" id="mdpConnect" name="mdp" class="mdc-text-field__input">
                <label class="mdc-floating-label" for="mdpConnect">Password</label>
                <div class="mdc-line-ripple"></div>
            </div>
            <button type="submit" class="mdc-fab material-icons">
                <span class="mdc-fab__icon">
                    send
                </span>
            </button>
        </form>
    </div>

    <style>
        .mdc-text-field {
            width: 90%;
            margin: auto;
        }
        #logincard {
            width: 100%;
            max-width: 500px;
        }

    </style>


    <script src="/Web/js/users.js" async defer></script>
    <script>
        buttonRipple = new mdc.ripple.MDCRipple(document.querySelector('#logbutton'));
    </script>
    <script>
        textField = new mdc.textField.MDCTextField(document.querySelector('#identifiant'));
        textFieldPass = new mdc.textField.MDCTextField(document.querySelector('#password'));
    </script>

    <?php
    require File::build_path(array('view', 'user', 'Create.php'));
    ?>
</div>