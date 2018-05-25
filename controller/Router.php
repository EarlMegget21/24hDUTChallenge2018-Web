<?php

require_once File::build_path(array('controller','ControllerUser.php'));
require_once File::build_path(array('controller','ControllerEvent.php'));

if(array_key_exists("page", $_GET)){ //routes prises par un lien/URL la première fois qu'on atterit sur le site
    if(array_key_exists("action", $_GET)) {
        ControllerMain::layout();
    }else{
        $action='accueil';
        ControllerMain::layout($action);
    }
}else if(array_key_exists("controller", $_GET)){ //route prises par les requêtes XHR (AJAX)
    $controller = $_GET["controller"];
    $controller_class = 'controller'.ucfirst($controller); //ucfirst transforme une chaine en capitalisant sa première lettre

    if(class_exists($controller_class)){
        if(array_key_exists("action", $_GET)){
            $action = $_GET["action"];
            $actions=get_class_methods($controller_class);
            $valide=false;
            foreach ($actions as $act){
                if($action==$act){
                    $valide=true;
                    break;
                }
            }
            if($valide){
                //Si aucune action dans l'URL alors readAll
                $controller_class::$action();
            }else{
                ControllerMain::error();
            }
        }else{
            // Appel de la méthode statique $action du controller specifié
            $controller_class::readAll();//remplacera $action() par readAll() lorsque ?action=readAll dans l'URL
        }
    }else{
        ControllerMain::error();
    }
}else{ //route prise par default si aucun paramêtre (Lien/UEL)
    $page='main';
    $action='accueil';
    ControllerMain::layout($action, $page);
}
