<?php
require_once File::build_path(array('model','ModelEvent.php')); // chargement du modèle
require_once File::build_path(array('lib','Security.php'));
require_once File::build_path(array('controller','ControllerMain.php'));

class ControllerEvent { //TODO: tester chaque variable POST, GET et SESSION avant de l'utiliser et renvoyer vers la page d'erreur si absent

    protected static $object = 'event';

    public static function readAll()
    {
            $tab_v = ModelEvent::selectAll();
            $pagetitle = 'List Evenements';
            require File::build_path(array('view', 'event', 'List.php'));
    }

    public static function read()
    {
        //read the Model
        if (isset($_GET['id'])) {
            $tab_v = ModelEvent::search($_GET['id']);
            $v = $tab_v[0];
            $pagetitle = 'Detail de l\'evenements';
            require File::build_path(array('view', 'event', 'Detail.php'));
        }
    }

    public static function update() {
        $pagetitle='Create';
        require File::build_path(array('view', 'event', 'Update.php'));
    }

    public static function updated(){

        if($_POST['public'] == NULL){
            $public = 0;
        }else{
            $public = 1;
        }
        $data=array(
            'localisation'=>$_POST['localisation'],
            'titre'=>$_POST['titre'],
            'description'=>$_POST['description'],
            'date'=>$_POST['date'],
            'heure'=>$_POST['heure'] + ":" + $_POST['minutes'],
            'public'=>$public,
            'loginCreateur'=>$_POST['loginCreateur']);
        var_dump($data);
        if (!ModelEvent::save($data)) { //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            ControllerMain::error();
        } else {
            $tv = ModelEvent::select(array('id'=>$_POST['id']));
            $v=$tv[0];
            $pagetitle='Accueil';
            require File::build_path(array('view', 'event', 'Updated.php'));
        }
    }



}
