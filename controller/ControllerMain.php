<?php

class ControllerMain {

    public static function layout($action=NULL, $page=NULL){
        $pagetitle="Concours";
        if(isset($_GET['page']))
            $page=lcfirst($_GET['page']);
        if(isset($_GET['action']))
            $action=lcfirst($_GET['action']);
        require File::build_path(array('view', 'PageLayout.php'));
    }

    public static function accueil(){
        require File::build_path(array('view', 'main', 'Accueil.php'));
    }

    public static function propos(){
        require File::build_path(array('view', 'main', 'Propos.php'));
    }

    public static function faq(){
        require File::build_path(array('view', 'main', 'FAQ.php'));
    }

    public static function error(){
        require File::build_path(array('view', 'main', 'Error.php'));
    }
}