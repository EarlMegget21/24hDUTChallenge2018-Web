<aside id="mdc-dialog-with-list" class="mdc-dialog mdc-dialog--open" role="alertdialog"
	   aria-labelledby="mdc-dialog-with-list-label" aria-describedby="mdc-dialog-with-list-description"
	   data-vivaldi-spatnav-clickable="1">
	<div class="mdc-dialog__surface" data-vivaldi-spatnav-clickable="1">
		<header class="mdc-dialog__header"><h2 id="mdc-dialog-with-list-label" class="mdc-dialog__header__title">Ooooooops :'-(</h2></header>
		<section id="mdc-dialog-with-list-description" class="mdc-dialog__body mdc-dialog__body">Website-sama sent me 404-kun ! You dummy >.< !</section>
		<footer class="mdc-dialog__footer">
			<button type="button"
					class="mdc-button mdc-dialog__footer__button mdc-dialog__footer__button--accept mdc-ripple-upgraded" onclick="document.getElementById('mdc-dialog-with-list').parentNode.removeChild(document.getElementById('mdc-dialog-with-list'))">
				OK
			</button>
		</footer>
	</div>
	<div class="mdc-dialog__backdrop"></div>
</aside>
<?php require File::build_path(array('view', 'main', 'Accueil.php'));?>
