<div class="mdc-card carte">
    <div class="mdc-list">
        <div class="mdc-list-item" tabindex="-1" data-mdc-tabindex="-1"
             data-mdc-tabindex-handled="true">
            Prénom : <?php echo htmlspecialchars($v->get("prenom")) ?>
        </div>
        <div class="mdc-list-item" tabindex="-1" data-mdc-tabindex="-1"
             data-mdc-tabindex-handled="true">
            Nom : <?php echo htmlspecialchars($v->get("nom")) ?>
        </div>
        <div class="mdc-list-item" tabindex="-1" data-mdc-tabindex="-1"
             data-mdc-tabindex-handled="true">
            E-mail : <?php echo htmlspecialchars($v->get("email")) ?>
        </div>
        <?php
        if (Session::is_user($_GET['login']) || Session::is_admin()) {
            ?>
            <section class="mdc-card__actions">
                <a id='updateButton' href="#" class="mdc-button mdc-button--compact mdc-card__action mdc-ripple">
                    <i class="mdc-button__icon material-icons">edit</i>
                    Modifier mon profil </a>
                <a id='deleteButton' href="#" class="mdc-button mdc-button--compact mdc-card__action mdc-ripple">
                    <i class="mdc-button__icon material-icons">delete</i>
                    Supprimer mon compte </a>
            </section>
            <?php
        }
        ?>
    </div>
</div>

<script>
    profilLogin = '<?php echo $_GET['login']; ?>'
</script>
<script src="/Web/js/users.js" async defer></script>
