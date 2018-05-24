<?php
    echo "<ul>";
    foreach ($tab_v as $v) { // Display of the cars stored in $tab_v
        echo "<li>User <a id='read-".htmlspecialchars($v->get("login"))."' class='listUsers' href='#'>"
            . htmlspecialchars($v->get("prenom"))
            . " "
            . htmlspecialchars($v->get("nom"))
            . "</a> <a id='delete-".htmlspecialchars($v->get("login"))."' class='listUsers' href='#'>Supprimer User</a></li>";
    }
    echo "</ul>";
    if (Session::is_admin()) {
        echo "<a id='createUser' href='#'>Créer User</a>";
    }
?>
<script src="/Web/js/users.js" async defer></script>