<?php
require_once File::build_path(array('model','ModelUser.php')); // chargement du modèle
require_once File::build_path(array('lib','Security.php'));
require_once File::build_path(array('controller','ControllerMain.php'));

class ControllerUser { //TODO: tester chaque variable POST, GET et SESSION avant de l'utiliser et renvoyer vers la page d'erreur si absent

    protected static $object = 'user';

    public static function readAll(){
        if(Session::is_admin()){
            $tab_v = ModelUser::selectAll();     //appel au modèle pour gerer la BD
            //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
            $pagetitle = 'List';
            require File::build_path(array('view', 'user', 'List.php'));
        } else {
            ControllerMain::error();
        }
    }
    
    public static function read() {
        if(isset($_GET['login']) && (Session::is_user($_GET['login'])||Session::is_admin())){
            $login=$_GET['login'];
            if(!$tv = ModelUser::select(array('login'=>$login))){
                ControllerMain::error();
            } else {
                $v = $tv[0];
                $pagetitle = 'DetailUser';
                require File::build_path(array('view', 'user', 'Detail.php'));
            }
        } else {
            ControllerMain::error();
        }
    }

    public static function create() {
        $pagetitle='Create';
        require File::build_path(array('view', 'user', 'Create.php'));
    }

    public static function created() {
        $error=[];
        $data=array(
            'login'=>$_POST['login'],
            'nonce'=>Security::generateRandomHex(),
            'nom'=>$_POST['nom'],
            'prenom'=>$_POST['prenom'],
            'isAdmin'=>0);
        if($_POST['mdp']==$_POST['mdp2']){
            $mdp= Security::getSeed().$_POST['mdp'];
            $data['mdp']= Security::chiffrer($mdp);
        }
        sleep(3);
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email']=$_POST['email'];
        }
        $mail="Valider votre email à l'adresse: http://localhost/Web/index.php?action=validate&page=user&login=".$_POST['login']."&nonce=".$data['nonce'];
        mail($_POST['email'], 'Validation création de compte sur Concours', $mail);
        if(!ModelUser::select(array('login'=>$data['login']))){
            if(!ModelUser::save($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
                ControllerMain::error();
            } else {

                $tab_v = ModelUser::selectAll();
                $pagetitle='Accueil';
                require File::build_path(array('view', 'user', 'Created.php'));
            }
        }else{
            array_push($error, 'Le login existe déjà');
            echo json_encode($error);
        }
    }

    public static function update() {
        if(isset($_GET['login']) && (Session::is_user($_GET['login'])||Session::is_admin())){
            $tv=ModelUser::select(array('login'=>$_GET['login']));
            $v=$tv[0];
            $pagetitle='Update';
            require File::build_path(array('view', 'user', 'Update.php'));
        }else{
            ControllerMain::error();
        }
    }

    public static function updated() {
        if(isset($_GET['login']) && (Session::is_user($_GET['login'])||Session::is_admin())){
            $data=array(
                'login'=>$_POST['login'],
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom']);
            if($_POST['mdp']==$_POST['mdp2']){
                $mdp= Security::getSeed().$_POST['mdp'];
                $data['mdp']= Security::chiffrer($mdp);
            }
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email'] = $_POST['email'];
            }
            if (Session::is_admin() && isset($_POST['isAdmin'])) {
                $data['isAdmin'] = 1;
            }else{
                $data['isAdmin'] = 0;
            }
            if (!ModelUser::update($data)) { //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
                ControllerMain::error();
            } else {
                $tv = ModelUser::select(array('login'=>$_POST['login']));
                $v=$tv[0];
                $pagetitle='Accueil';
                require File::build_path(array('view', 'user', 'Updated.php'));
            }
        } else {
            ControllerMain::error();
        }
    }

    public static function delete() {
        if(isset($_GET['login']) && (Session::is_user($_GET['login'])||Session::is_admin())){
            ModelUser::delete(array('login'=>$_GET['login']));
            if(Session::is_user($_GET['login'])) {
                session_unset();
                session_destroy();
            }
            $pagetitle = 'List';
            require File::build_path(array('view', 'user', 'Deleted.php'));
        } else {
            ControllerMain::error();
        }
    }

    public static function connect(){
        $pagetitle = 'Connexion';
        require File::build_path(array('view', 'user', 'Connect.php'));
    }

    public static function connected() {
        if(isset($_POST['login']) && isset($_POST['mdp'])){
            $mdp1=Security::getSeed().$_POST['mdp'];
            $mdp= Security::chiffrer($mdp1);
            if(ModelUser::checkPassword($_POST['login'], $mdp)&&ModelUser::isValide($_POST['login'])){
                $_SESSION['login']=$_POST['login'];
                $tv = ModelUser::select(array('login'=>$_POST['login']));
                $v=$tv[0];
                if($v->isAdmin()){
                    $_SESSION['admin']=true;
                }
                require File::build_path(array('view', 'user', 'Connected.php'));
            }else{
                ControllerMain::error();
            }
        }else{
            ControllerMain::error();
        }
    }

    public static function deconnect(){
        session_unset();
        session_destroy();
        ControllerMain::accueil();
    }
    
    public static function validate(){
        if(isset($_GET['login'])){
			$login=$_GET['login'];
            $tv = ModelUser::select(array('login'=>$login));
            if(isset($_GET['nonce']) && $tv[0]->get("nonce")==$_GET["nonce"]){
                ModelUser::validate($login);
            }
            ControllerMain::accueil();
        }else{
			ControllerMain::error();
		}
    }
}
