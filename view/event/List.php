<div class="list">
<?php

foreach ($tab_v as $v) { // Display of the events stored in $tab_v
	if($v->get('public')){ //if they're public
		echo "<div class=\"mdc-card demo-card undefined\">
            <div class=\"mdc-card__primary-action mdc-ripple-upgraded\" tabindex=\"0\">
            <div class=\"demo-card__primary\">
                <h2 class=\"demo-card__title mdc-typography--headline6\">".htmlspecialchars($v->get("titre"))."</h2>
                <h3 class=\"demo-card__subtitle mdc-typography--subtitle2\">".htmlspecialchars($v->get("date"))."</h3>
            </div>
            <div class=\"demo-card__secondary mdc-typography--body2\">".htmlspecialchars($v->get('titre'))."</div>
            </div>
            <div class=\"mdc-card__actions\">
                <div class=\"mdc-card__action-buttons\">
                    <button class=\"mdc-button mdc-card__action mdc-card__action--button mdc-ripple-upgraded listeEvent\" id='".$v->get('id')."'>Read</button>
                    <button class=\"mdc-button mdc-card__action mdc-card__action--button mdc-ripple-upgraded\">Bookmark</button>
                </div>
                <div class=\"mdc-card__action-icons\">
                    <i class=\"mdc-icon-toggle material-icons mdc-card__action mdc-card__action--icon mdc-ripple-upgraded mdc-ripple-upgraded--unbounded\" tabindex=\"0\" role=\"button\" aria-pressed=\"false\" aria-label=\"Add to favorites\" title=\"Add to favorites\" data-toggle-on=\"{&quot;content&quot;: &quot;favorite&quot;, &quot;label&quot;: &quot;Remove from favorites&quot;}\" data-toggle-off=\"{&quot;content&quot;: &quot;favorite_border&quot;, &quot;label&quot;: &quot;Add to favorites&quot;}\" style=\"--mdc-ripple-fg-size:28.8px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:10px; --mdc-ripple-top:10px;\">favorite_border</i>
                    <i class=\"material-icons mdc-ripple-surface mdc-card__action mdc-card__action--icon mdc-ripple-upgraded--unbounded mdc-ripple-upgraded\" tabindex=\"0\" role=\"button\" title=\"Share\" data-mdc-ripple-is-unbounded=\"true\" style=\"--mdc-ripple-fg-size:28.8px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:10px; --mdc-ripple-top:10px;\">share</i>
                    <i class=\"material-icons mdc-ripple-surface mdc-card__action mdc-card__action--icon mdc-ripple-upgraded--unbounded mdc-ripple-upgraded\" tabindex=\"0\" role=\"button\" title=\"More options\" data-mdc-ripple-is-unbounded=\"true\" style=\"--mdc-ripple-fg-size:28.8px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:10px; --mdc-ripple-top:10px;\">more_vert</i>
                </div>
            </div>
           </div>";
		echo "<div><a href=#"."><p>"."</p></div>";
	}
}
?>
<script src="/Web/js/event.js" async defer></script>
