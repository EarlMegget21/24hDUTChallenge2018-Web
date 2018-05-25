<?php
require_once File::build_path(array('model','Model.php'));

class ModelEvent extends Model
{
    private $id;
    private $adresse;
    private $titre;
    private $description;
    private $date;
    private $heure;
    private $loginCreateur;
    private $public;
    protected static $object='event';
    protected static $primary='id';

    public function __construct($id=NULL, $adresse=NULL, $titre=NULL, $description=NULL, $date=NULL, $heure=NULL, $loginCreateur=NULL, $public=NULL)
{
    if (!is_null($id) && !is_null($adresse) && !is_null($titre) && !is_null($description) && !is_null($date) && !is_null($heure) && !is_null($loginCreateur) && !is_null($public)) {
        $this->id = $id;
        $this->adresse = $adresse;
        $this->titre = $titre;
        $this->description = $description;
        $this->date = $date;
        $this->heure = $heure;
        $this->loginCreateur = $loginCreateur;
        $this->public = $public;
    }
}


    // getter
    public function get($attribut){
    return $this->$attribut;
}

}
