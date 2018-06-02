<?php
require_once File::build_path(array('model','ModelParticipant.php')); // chargement du modèle
require_once File::build_path(array('lib','Security.php'));
require_once File::build_path(array('controller','ControllerMain.php'));

class ControllerParticipant {

    protected static $object = 'participant';

    public static function readAll(){
        $tab_v = ModelParticipant::selectAll();     //appel au modèle pour gerer la BD
        //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle = 'List';
        require File::build_path(array('view', 'participant', 'List.php'));
    }

    public static function readById($login)
    {
        $tab_v = ModelParticipant::select(array('login'=>$login));
        $pagetitle = 'List Evenements';
        require File::build_path(array('view', 'participation', 'List.php'));
    }
    
    public static function read() {
        if(isset($_GET['nom']) && isset($_GET['idEvent'])){
            $nom=$_GET['nom'];
            $idEvent=$_GET['idEvent'];
            if(!$tv = ModelParticipant::select(array('nom'=>$nom, 'idEvent'=>$idEvent))){
                ControllerMain::error();
            } else {
                $v = $tv[0];
                $pagetitle = 'DetailParticipant';
                require File::build_path(array('view', 'participant', 'Detail.php'));
            }
        } else {
            ControllerMain::error();
        }
    }

    public static function create() {
        $pagetitle='Create';
        require File::build_path(array('view', 'participant', 'Create.php'));
    }

    public static function created() {
        $error=[];
        $data=array(
            'idEvent'=>$_POST['idEvent'],
            'nom'=>$_POST['nom'],
            'message'=>$_POST['message']
        );

        if(array_key_exists ('isPresent', $_POST)){
            $data['isPresent']=1;
        }else{
            $data['isPresent']=0;
        }
        if(!ModelParticipant::select(array('nom'=>$data['nom'], 'idEvent'=>$data['idEvent']))){
            if(!ModelParticipant::save($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
                ControllerMain::error();
            } else {
                $tab_v = ModelParticipant::selectAll();
                $pagetitle='Accueil';
                require File::build_path(array('view', 'participant', 'Created.php'));
            }
        }else{
            array_push($error, 'Ce nom existe déjà');
            echo json_encode($error);
        }
    }

    public static function update() {
        if(isset($_GET['nom']) && isset($_GET['idEvent'])){
            $tv=ModelParticipant::select(array('nom'=>$_GET['nom'], 'idEvent'=>$_GET['idEvent']));
            $v=$tv[0];
            $pagetitle='Update';
            require File::build_path(array('view', 'participant', 'Create.php'));
        }else{
            ControllerMain::error();
        }
    }

    public static function updated() {
        if(isset($_POST['nom'])){
            $data=array(
                'idEvent'=>$_POST['idEvent'],
                'nom'=>$_POST['nom'],
                'message'=>$_POST['message']
            );
            if(isset($_POST['isPresent'])){
                $data['isPresent']=1;
            }else{
                $data['isPresent']=0;
            }
            if (!ModelParticipant::update($data)) { //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
                ControllerMain::error();
            } else {
                $tv = ModelParticipant::select(array('nom'=>$_POST['nom'], 'idEvent'=>$_POST['idEvent']));
                $v=$tv[0];
                $pagetitle='Accueil';
                require File::build_path(array('view', 'participant', 'Created.php'));
            }
        } else {
            ControllerMain::error();
        }
    }

    public static function delete() {
        if(isset($_GET['nom']) && isset($_GET['idEvent'])){
            ModelParticipant::delete(array('nom'=>$_GET['nom'], 'idEvent'=>$_GET['idEvent']));
            $pagetitle = 'List';
            require File::build_path(array('view', 'participant', 'Deleted.php'));
        } else {
            ControllerMain::error();
        }
    }

}
