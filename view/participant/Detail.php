<?php
    echo "<div>Participation de "
        .htmlspecialchars($v->get("nom"))
        ." à l'event "
        .htmlspecialchars($v->get("idEvent"))
        ." Participation :";
    if($v->get("isPresent")==1){
        echo "Oui";
    }else {
        echo "Non";
    }
        echo "</div>";
    ?>
<script src="/Web/js/participation.js" async defer></script>
