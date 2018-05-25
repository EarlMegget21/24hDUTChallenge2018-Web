<?php
require_once File::build_path(array('model','Model.php'));

class ModelUser extends Model
{
    private $login;
    private $mdp;
    private $nom;
    private $prenom;
    private $isAdmin;
    private $email;
    private $nonce;
    protected static $object='user';
    protected static $primary='login';

    public function __construct($login=NULL, $nom=NULL, $prenom=NULL, $mdp=NULL, $isAdmin=NULL, $email=NULL, $nonce=NULL)
    {
        if (!is_null($login) && !is_null($nom) && !is_null($prenom) && !is_null($mdp) && !is_null($isAdmin) && !is_null($email) && !is_null($nonce)) {
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mdp = $mdp;
            $this->isAdmin = $isAdmin;
            $this->email = $email;
            $this->nonce = $nonce;
        }
    }


    // getter
    public function get($attribut){
        return $this->$attribut;
    }

    public function isAdmin(){
        return $this->isAdmin;
    }
    
    
    public static function checkPassword($login,$mot_de_passe_chiffre){
        $sql='SELECT * FROM User WHERE login=\''.$login.'\'';
        try{
            $rep=Model::$pdo->query($sql);
            $tab=$rep->fetchAll(PDO::FETCH_CLASS, 'ModelUser');
            if (empty($tab)|| $tab[0]->get("mdp")!=$mot_de_passe_chiffre){
                return false;
            }else{
                return true;
            } 
        } catch(PDOException $e){
           echo $e->getMessage(); // affiche un message d'erreur
           die(); //supprimer equilvalent à System.exit(1); en java
        }
    }
    
    public static function isValide($login){
        $sql='SELECT count(nonce) FROM User WHERE login=\''.$login.'\' AND nonce is not null';
        try{
            $rep=Model::$pdo->query($sql);
            $tab=$rep->fetch();
            if (!empty($tab)&&$tab[0]){
                return false;
            }else{
                return true;
            } 
        } catch(PDOException $e){
           echo $e->getMessage(); // affiche un message d'erreur
           die(); //supprimer equilvalent à System.exit(1); en java
        }
    }
    
    public static function validate($login){
        $sql='UPDATE User SET nonce=NULL WHERE login=:login';
        try{
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "login" => $login
            );
            $req_prep->execute($values);
            return true;
             
        } catch(PDOException $e){
           echo $e->getMessage(); // affiche un message d'erreur
           return false;
        }
    }

}
