<?php
    if (isset($new)) {
        echo "<div><p>Voici l'url que vous pouvez partager à vos amis pour leur permettre d'accéder à votre évènement: <METTRE ICI LE DEBUT D'URL>" . $data['hash'] .

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
    if(Session::is_user($v->get('login'))){
        echo "<div>Liste des Participants:</div><div>";
        ControllerParticipant::readById($v->get('login'));
    }
?>
<script src="/Web/js/event.js" async defer></script>
