<?php
echo "<div><p>"
    . htmlspecialchars($v->get("titre"))
    . " "
    . htmlspecialchars($v->get("date"))
    . " "
    . htmlspecialchars($v->get("heure"))
    . " "
    . htmlspecialchars($v->get("description"))
    . "</p></div>";
