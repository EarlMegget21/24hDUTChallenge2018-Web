<!--<div id="head">
    <div id="logo">
        <img src="/Web/img/logo.png" alt="Logo" height="42" width="42">
        <p>Web</p>
    </div>
    <form id="chercher" method="get" action="/Web/index.php">
        <input type="hidden" name="action" value="searched"/>
        <input type="hidden" name="controller" value="biere"/>
        <input type="hidden" value="0" name="montantMin" id="montantMin_id"/>
        <input type="hidden" value="100" name="montantMax" id="montantMax_id"/>
        <input id="search_input" type="text" name="marque" placeholder="Chercher une Bière">
        <input id="search_button" type="image" alt="Submit" src="http://localhost/Web/img/loupe.png" height="15" width="15">
    </form>
    <div id="connexion">
        <div>
            <?php
if (isset($_SESSION['login'])) {
    echo "<p>Bienvenue " . htmlspecialchars($_SESSION['login']) . "</p>";
}
?>
        </div>
        <div>

        </div>
    </div>
</div>
<nav>
    <a id="accueilMenu" href="#">Accueil</a>
    <a href="#">Exemple 1</a>
    <a href="#">Exemple 2</a>
    <a href="#">Exemple 3</a>
    <a id="proposMenu" href="#">A Propos</a>
    <a id="faqMenu" href="#">FAQ</a>
</nav>-->

<div class="top-app-bar__frame">
    <div class="drawer-container-flex">
        <aside class="mdc-drawer mdc-drawer--temporary" style="">
            <nav class="mdc-drawer__drawer">
                <header class="mdc-drawer__header">
                    <div class="mdc-drawer__header-content mdc-theme--on-primary mdc-theme--primary-bg">Header here
                    </div>
                </header>
                <nav class="mdc-drawer__content mdc-list-group">
                    <div id="icon-with-text-demo" class="mdc-list">
                        <a id="accueilMenu" class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1"
                           data-mdc-tabindex-handled="true">
                            <i class="material-icons mdc-list-item__graphic"  aria-hidden="true">home</i>
                            Accueil
                        </a>
                        <a id="eventPublic" class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1"
                                data-mdc-tabindex-handled="true">
                            <i class="material-icons mdc-list-item__graphic"  aria-hidden="true">event</i>
                            Evenements publiques
                        </a>
                        <a id="createEvent"class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1"
                                data-mdc-tabindex-handled="true">
                            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">add</i>
                            Créer un evenement
                        </a>
                    </div>
                    <hr class="mdc-list-divider">
                    <div class="mdc-list" id="connexion">
                        <?php
                        if (Session::is_admin()) {
                            echo '<a id="users" class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1"
                                data-mdc-tabindex-handled="true">
                            <i class="material-icons mdc-list-item__graphic"
                               aria-hidden="true">person</i>
                            Utilisateurs
                        </a> ';
                        }
                        if (isset($_SESSION['login'])) {
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
                        } else {
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

