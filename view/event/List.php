<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 26/05/2018
 * Time: 01:18
 */
foreach ($tab_v as $v) { // Display of the beers stored in $tab_v
    echo "<div><a href=http://localhost/Web/index.php?action=read&controller=Event&id="
        . rawurlencode($v->get("id"))
        . "><p>"
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