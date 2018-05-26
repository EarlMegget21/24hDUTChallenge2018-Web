<?php
    echo "<ul>";
    foreach ($tab_v as $v) {
        echo "<li>Participation de <a id='read-".htmlspecialchars($v->get("nom"))."' class='listParticipation' href='#'>"
            .htmlspecialchars($v->get("nom"))
            ."</a> à l'event <a id='read-".htmlspecialchars($v->get("idEvent"))."' class='listEvent' href='#'>"
            .htmlspecialchars($v->get("idEvent"))
            ."</a> Participation :";
        if($v->get("isPresent")==1){
            echo "Oui";
        }else {
            echo "Non";
        }
        echo  "<a id='delete-".htmlspecialchars($v->get("nom"))."' class='listParticipation' href='#'>Supprimer Participation</a></li>";
    }
    echo "</ul>";
    echo "<a id='createParticipation' href='#'>Créer Participation</a>";
?>
<script src="/Web/js/participation.js" async defer></script>