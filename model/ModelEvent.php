<?php
require_once File::build_path(array('model','Model.php'));

class ModelEvent extends Model
{
    private $id;
    private $hash;
    private $localisation;
    private $titre;
    private $description;
    private $date;
    private $heure;
    private $loginCreateur;
    private $public;
    protected static $object = 'event';
    protected static $primary = 'id';

    public function __construct($id = NULL, $localisation = NULL, $titre = NULL, $description = NULL, $date = NULL, $heure = NULL, $loginCreateur = NULL, $public = NULL)
    {
        if (!is_null($id) && !is_null($localisation) && !is_null($titre) && !is_null($description) && !is_null($date) && !is_null($heure) && !is_null($loginCreateur) && !is_null($public)) {
            $this->id = $id;
            $this->localisation = $localisation;
            $this->titre = $titre;
            $this->description = $description;
            $this->date = $date;
            $this->heure = $heure;
            $this->loginCreateur = $loginCreateur;
            $this->public = $public;
        }
    }

    // getter
    public function get($attribut)
    {
        return $this->$attribut;
    }

    public static function search($data){
        $sql = "SELECT * FROM Evenement e WHERE e.id:=id";
        // Prepare the SQL statement
        $req_prep = Model::$pdo->prepare($sql);
        // Execute the SQL prepared statement after replacing tags
        $req_prep->execute($data); //on associe le tableau à la requete pour éviter l'injection
        // Retrieve results as previously
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelEvent');
        $tab = $req_prep->fetchAll();
        return $tab;
    }

    public static function save($data)  #Va d'abord chercher l'id max dans la BD puis l'incrémente et en fait un hash
    {

        return parent::save($newData);
    }

    public static function selectAll()
    {
        $sql = "SELECT * FROM Evenement e";
        // Prepare the SQL statement
        $req_prep = Model::$pdo->prepare($sql);
        // Execute the SQL prepared statement after replacing tags
        $req_prep->execute($data); //on associe le tableau à la requete pour éviter l'injection
        // Retrieve results as previously
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelEvent');
        $tab = $req_prep->fetchAll();
        return $tab;
    }
}

