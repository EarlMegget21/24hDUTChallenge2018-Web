Pr�sentation:
-Site style OnePage avec AJAX
-Backend en PHP natif et Frontend en JQuery
-Module de connexion d�j� en place

Config:
-il faut placer le htaccess qu'il y a sur git � la racine de votre www/ en le renommant .htaccess!!
-Mon serveur est ouvert � l'exterieur, on peut soit exporter la bd sur votre localhost soit vous vous connectez direct � la mienne avec mon ip en host et les id mdp que
	vous pourrez me demander
-Si on acc�de au site depuis l'exterieur il faudra modifier tous les liens et dans la fonction changerPage() de header.js en cons�quence (cr�er un fonction PHP/js g�n�rique
	qui renvoie la bonne URL ?)
-J'ai bloqu� l'acc�s aux autre �tudiants au cas o� il y aurait des vicieux (j'ai pens� � le faire sur les autres donc �a m'a rappell� de nous prot�ger mdr, jsuis s�r que 
	beaucoup ne vont pas y penser et on va pouvoir hacker du bambi 3:)
-V�rifiez quand m�me que votre wamp/lamp soit pas accessible depuis votre ip aussi ^^

Organisation:
-controller/ : les Controller<Module>.php
-model/ : les Model<Module>.php
-view/<Module>/ : les vues du module en php
-view/main/ : les vues communes � tout le site
-img/ : les images (en vrac pour l'instant)
-js/ : les fichier js (un par page + un header + un footer + un commun au site)
-conf/ : fichier configuration en php
-font/ : les polices
-lib/ : des fonctions g�n�rales en php et utiles � tout le site
-css/styles.css : gros fichier css avec les r�gles (peut �tre le diviser en plusieur fichiers?

Proc�dure de d�veloppement Back:
1-Cr�er son mod�le puis la table correspondante dans la BD avec le nom de la table commencant par une majuscule, en configurant bien les attributs dans la BD (taille, type, null? , unique? , etc...)
	pour �viter le plus possible les erreurs SQL
2-Cr�er le Controller correspondant avec toutes les fonction CRUD (Create, Read, Update, Delete) puis celles qui peuvent servir en plus, chaque methode renvoie 
	la vue correspondante(!= pagelayout g�n�ral) qui sera le corps de la page (<div id="content"> donc un bout de page)
3-Cr�er les vues correspondantes de fa�on simple (html avec les infos � afficher), c'est le Front qui se chargera de styler tout �a
4-Ajouter dans le .htaccess apr�s les lignes du m�me style :
 RewriteRule    ^(Create|ReadAll|Read|Update)/?$    Web/index.php?page=<MODULE>&action=$1    [NC,L]
 RewriteRule    ^(Read|Update|Delete)/([A-Za-z0-9_-]+)/?$    Web/index.php?page=<MODULE>&action=$1&login=$2    [NC,L]
	avec <MODULE> = le nom du module/mod�le cr��. Ca permet de r��crire l'URL proprement. Attention! �a doit correspondre avec l'URL g�n�r� par l'appel �
	window.pushState() (qui permet de changer l'affichage de l'URL dans la barre du navigateur) dans la fonction JS changePage()

Proc�dure de d�veloppement Front:
1-Cr�er les balises etc n�cessaire � l'organisation de la page
2-Cr�er le fichier <MODULE>.js dans le dossier js/ qui se charge de toute l'interaction avec les liens etc des vues du module
3-Ajouter les r�gles css pour les vues du module (utiliser des id et class longs et explicites pour �tre sur de ne pas avoir de conflits avec d'autres
4-Ajouter au <MODULE>.js les fonctions etc qui permettront de rejouter de la fluidit� � la page (slide, fondu, appartition, ...)
5-Ajouter les r�gles css et fonctions js qui se chargent du responsive design

Git:
-quand on clone et qu'on commence un dev, on cr�er une branche � nous (lui donner un nom descriptif de la fonctionnalit� d�velopp�e) et on dev sur cette branche, pas directe sur master, 
	d�s que tout marche sans bug on peut merger branch sur master, bien faire attention lors de conflits de demander aux autres pour pas effacer leurs modifs