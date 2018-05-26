<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 26/05/2018
 * Time: 01:19
 */
    echo "<div><p>"
        . htmlspecialchars($v->get("titre"))
        . " "
        . htmlspecialchars($v->get("date"))
        . " "
        . htmlspecialchars($v->get("heure"))
        . " "
        . htmlspecialchars($v->get("description"))
        . "</p></div>";
