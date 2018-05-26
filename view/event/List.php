<?php
foreach ($tab_v as $v) { // Display of the beers stored in $tab_v
    echo "<div><a href=#>"
        . rawurlencode($v->get("id"))
        . "</a><p>"
        . htmlspecialchars($v->get("titre"))
        . " "
        . htmlspecialchars($v->get("date"))
        . " "
        . htmlspecialchars($v->get("heure"))
        . " "
        . htmlspecialchars($v->get("description"))
        . "</p></div>";
}
?>