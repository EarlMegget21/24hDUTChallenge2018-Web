<?php

if(isset($_SESSION['login'])) {
    if (isset($new)) {
        echo "<div><p>Voici l'url que vous pouvez partager à vos amis pour leur permettre d'accéder à votre évènement: " . $data['hash'] .

            "</p>";
    }
    echo "<div><p>"
        . htmlspecialchars($v->get("titre"))
        . " "
        . htmlspecialchars($v->get("date"))
        . " "
        . htmlspecialchars($v->get("heure"))
        . " "
        . htmlspecialchars($v->get("description"))
        . "</p></div>";
}else{
    echo "Erreur 404";
}