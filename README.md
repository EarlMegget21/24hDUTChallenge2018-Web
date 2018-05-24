Présentation:
-Site style OnePage avec AJAX
-Backend en PHP natif et Frontend en JQuery
-Module de connexion déjà en place

Config:
-il faut placer le htaccess qu'il y a sur git à la racine de votre www/ en le renommant .htaccess!!
-Mon serveur est ouvert à l'exterieur, on peut soit exporter la bd sur votre localhost soit vous vous connectez direct à la mienne avec mon ip en host et les id mdp que
	vous pourrez me demander
-Si on accède au site depuis l'exterieur il faudra modifier tous les liens et dans la fonction changerPage() de header.js en conséquence (créer un fonction PHP/js générique
	qui renvoie la bonne URL ?)
-J'ai bloqué l'accès aux autre étudiants au cas où il y aurait des vicieux (j'ai pensé à le faire sur les autres donc ça m'a rappellé de nous protéger mdr, jsuis sûr que 
	beaucoup ne vont pas y penser et on va pouvoir hacker du bambi 3:)
-Vérifiez quand même que votre wamp/lamp soit pas accessible depuis votre ip aussi ^^

Organisation:
-controller/ : les Controller<Module>.php
-model/ : les Model<Module>.php
-view/<Module>/ : les vues du module en php
-view/main/ : les vues communes à tout le site
-img/ : les images (en vrac pour l'instant)
-js/ : les fichier js (un par page + un header + un footer + un commun au site)
-conf/ : fichier configuration en php
-font/ : les polices
-lib/ : des fonctions générales en php et utiles à tout le site
-css/styles.css : gros fichier css avec les règles (peut être le diviser en plusieur fichiers?

Procédure de développement Back:
1-Créer son modèle puis la table correspondante dans la BD avec le nom de la table commencant par une majuscule, en configurant bien les attributs dans la BD (taille, type, null? , unique? , etc...)
	pour éviter le plus possible les erreurs SQL
2-Créer le Controller correspondant avec toutes les fonction CRUD (Create, Read, Update, Delete) puis celles qui peuvent servir en plus, chaque methode renvoie 
	la vue correspondante(!= pagelayout général) qui sera le corps de la page (<div id="content"> donc un bout de page)
3-Créer les vues correspondantes de façon simple (html avec les infos à afficher), c'est le Front qui se chargera de styler tout ça
4-Ajouter dans le .htaccess après les lignes du même style :
 RewriteRule    ^(Create|ReadAll|Read|Update)/?$    Web/index.php?page=<MODULE>&action=$1    [NC,L]
 RewriteRule    ^(Read|Update|Delete)/([A-Za-z0-9_-]+)/?$    Web/index.php?page=<MODULE>&action=$1&login=$2    [NC,L]
	avec <MODULE> = le nom du module/modèle créé. Ca permet de réécrire l'URL proprement. Attention! ça doit correspondre avec l'URL généré par l'appel à
	window.pushState() (qui permet de changer l'affichage de l'URL dans la barre du navigateur) dans la fonction JS changePage()

Procédure de développement Front:
1-Créer les balises etc nécessaire à l'organisation de la page
2-Créer le fichier <MODULE>.js dans le dossier js/ qui se charge de toute l'interaction avec les liens etc des vues du module
3-Ajouter les règles css pour les vues du module (utiliser des id et class longs et explicites pour être sur de ne pas avoir de conflits avec d'autres
4-Ajouter au <MODULE>.js les fonctions etc qui permettront de rejouter de la fluidité à la page (slide, fondu, appartition, ...)
5-Ajouter les règles css et fonctions js qui se chargent du responsive design

Git:
-quand on clone et qu'on commence un dev, on créer une branche à nous (lui donner un nom descriptif de la fonctionnalité développée) et on dev sur cette branche, pas directe sur master, 
	dès que tout marche sans bug on peut merger branch sur master, bien faire attention lors de conflits de demander aux autres pour pas effacer leurs modifs