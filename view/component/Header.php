<div class="top-app-bar__frame">
	<div class="drawer-container-flex">
		<aside class="mdc-drawer mdc-drawer--temporary" style="">
			<nav class="mdc-drawer__drawer">
				<header class="mdc-drawer__header">
					<div class="mdc-drawer__header-content mdc-theme--on-primary mdc-theme--primary-bg">Reunionou
					</div>
				</header>
				<nav class="mdc-drawer__content mdc-list-group">
					<div id="icon-with-text-demo" class="mdc-list">
						<a id="accueilMenu" class="mdc-list-item demo-drawer-list-item" tabindex="-1"
						   data-mdc-tabindex="-1"
						   data-mdc-tabindex-handled="true">
							<i class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>
							Accueil
						</a>
						<a id="eventPublic" class="mdc-list-item demo-drawer-list-item" tabindex="-1"
						   data-mdc-tabindex="-1"
						   data-mdc-tabindex-handled="true">
							<i class="material-icons mdc-list-item__graphic" aria-hidden="true">event</i>
							Evenements publiques
						</a>
						<?php if(isset($_SESSION['login'])){
							echo '<a id="createEvent"class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1" data-mdc-tabindex-handled="true">
								  <i class="material-icons mdc-list-item__graphic" aria-hidden="true">add</i>Créer un evenement</a>';
						} ?>
					</div>
					<hr class="mdc-list-divider">
					<div class="mdc-list" id="connexion">
						<?php
							if(Session::is_admin()){
								echo '<a id="users" class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1"
                                data-mdc-tabindex-handled="true">
                            <i class="material-icons mdc-list-item__graphic"
                               aria-hidden="true">person</i>
                            Utilisateurs
                        </a> ';
							}
							if(isset($_SESSION['login'])){
								echo '<a id="profil" class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1"
                                data-mdc-tabindex-handled="true">
                            <i class="material-icons mdc-list-item__graphic"
                               aria-hidden="true">account_circle
                            </i>
                            Mon profil
                        </a> ';
								echo '<a id="logout" class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1"
                                data-mdc-tabindex-handled="true">
                            <i class="material-icons mdc-list-item__graphic"
                               aria-hidden="true">power_off</i>
                            Deconnexion
                        </a>';
							}else{
								echo '<a id="login" class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1"
                                data-mdc-tabindex-handled="true">
                            <!--<i class="material-icons mdc-list-item__graphic"
                               aria-hidden="true">report</i>-->
                            Connexion/Inscription
                        </a> ';
							}
						?>
					</div>
				</nav>
			</nav>
		</aside>
		<div class="drawer-header-flex">
			<header class="mdc-top-app-bar" style="top: 0px;">
				<div class="mdc-top-app-bar__row">
					<section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
						<button class="material-icons mdc-top-app-bar__navigation-icon mdc-ripple-upgraded--unbounded mdc-ripple-upgraded"
								style="--mdc-ripple-fg-size:28.7917px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:10px; --mdc-ripple-top:10px;">
							menu
						</button>
						<span class="mdc-top-app-bar__title">Reunionou</span></section>
				</div>
			</header>
		</div>
		<div class="mdc-top-app-bar--fixed-adjust"></div>
	</div>
</div>

