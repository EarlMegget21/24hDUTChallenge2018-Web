<div id="head">
    <div id="logo">
        <img src="http://localhost/Web/img/logo.png" alt="Logo" height="42" width="42">
        <p>Web</p>
    </div>
    <form id="chercher" method="get" action="/Web/index.php">
        <input type="hidden" name="action" value="searched"/>
        <input type="hidden" name="controller" value="Event"/>
        <input type="hidden" value="0" name="montantMin" id="montantMin_id"/>
        <input type="hidden" value="100" name="montantMax" id="montantMax_id"/>
        <input id="search_input" type="text" name="marque" placeholder="Chercher une Bière">
        <input id="search_button" type="image" alt="Submit" src="http://localhost/Web/img/loupe.png" height="15" width="15">
    </form>
    <div id="connexion">
        <div>
            <?php
            if(isset($_SESSION['login'])){
                echo "<p>Bienvenue ".htmlspecialchars($_SESSION['login'])."</p>";
            }
            ?>
        </div>
        <div>
            <?php
            if(Session::is_admin()){
                echo '<a id="users" href="#">Users</a> ';
            }
            if(isset($_SESSION['login'])){
                echo '<a id="profil" href="#">Mon Profil</a> ';
                echo '<a id="logout" href="#">Deconnexion</a>';
            }else{
                echo '<a id="login" href="#">Connexion</a> ';
                echo '<a id="signup" href="#">S\'inscrire</a>';
            }
            ?>
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
</nav>