<?php
require_once File::build_path(array('model','Model.php'));

class ModelParticipant extends Model
{
    private $nom;
    private $idEvent;
    private $isPresent;
    private $message;
    protected static $object='participant';
    protected static $primary='nom';

    public function __construct($nom = NULL, $idEvent = NULL, $isPresent = NULL, $message= NULL)
    {
        if (!is_null($nom) && !is_null($idEvent) && !is_null($isPresent) && !is_null($message)) {
            $this->nom = $nom;
            $this->idEvent = $idEvent;
            $this->isPresent = $isPresent;
            $this->message = $message;
        }
    }


    // getter
    public function get($attribut){
        return $this->$attribut;
    }

    public function isAdmin(){
        return $this->isAdmin;
    }

}
