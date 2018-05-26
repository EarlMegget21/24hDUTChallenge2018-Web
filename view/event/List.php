<div class="list">
<?php

foreach ($tab_v as $v) { // Display of the beers stored in $tab_v
    echo "<div id='" . htmlspecialchars($v->get('id')) . "' class=\"mdc-card demo-card undefined listeEvent\">
            <div class=\"mdc-card__primary-action mdc-ripple-upgraded\" tabindex=\"0\"><div class=\"demo-card__primary\">
            <h2 class=\"demo-card__title mdc-typography--headline6\">" . htmlspecialchars($v->get("titre")) . "</h2>
            <h3 class=\"demo-card__subtitle mdc-typography--subtitle2\">" . htmlspecialchars($v->get("date")) . "</h3>
        </div>
        <div class=\"demo-card__secondary mdc-typography--body2\">" . htmlspecialchars($v->get('titre')) . "</div>
        </div>
        <div class=\"mdc-card__actions\">
        <div class=\"mdc-card__action-buttons\">
        <button class=\"mdc-button mdc-card__action mdc-card__action--button mdc-ripple-upgraded\">Detail</button>
        </div>
        </div></div>";
    echo "<div><a href=#"
        . "></a><p>"
        . "</p></div>";

}
?>
</div>