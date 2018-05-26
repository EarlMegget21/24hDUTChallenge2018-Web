<form id="chercher" method="get" action="/Web/index.php">
    <input type="hidden" name="action" value="searched"/>
    <input type="hidden" name="controller" value="Event"/>
    <!--<input > Localisation -->
    <input id="" type="text" name="title" placeholder="Titre">
    <input id="" type="text" name="description" placeholder="Mots-clés de description">
    <input id="" type="date" name="date">
    <input id="" type="time" name="time">
    <input id="search_button" type="submit">
</form>
<?php
/**
 * Created by PhpStorm.
 * User: Kazoku
 * Date: 26/05/2018
 * Time: 00:06
 */
foreach ($tab_v as $v) {
        echo "<div><a href=http://localhost/Web/index.php?action=read&controller=event&id="
        . rawurlencode($v->get("id"))
        . "><p>"
        . htmlspecialchars($v->get("titre"))
        . " "
        . htmlspecialchars($v->get("date"))
        . " "
        . htmlspecialchars($v->get("heure"))
        . " "
        . htmlspecialchars($v->get("description"))
        . "</p></a></div>";
}