<?php
    echo "<div>User "
        .htmlspecialchars($v->get("prenom"))
        ." "
        .htmlspecialchars($v->get("nom"));
    if(Session::is_user($_GET['login'])||Session::is_admin()) {
        echo " <a id='updateButton' href='#'>Modifier Profil</a><a id='deleteButton' href='#'>Supprimer Compte</a> <br>";
    }
    echo "</div>";
?>
<script>
    profilLogin='<?php echo $_GET['login']; ?>'
</script>
<script src="/Web/js/users.js" async defer></script>
