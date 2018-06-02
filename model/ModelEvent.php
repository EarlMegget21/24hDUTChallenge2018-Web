<?php
	require_once File::build_path(array('model',
										'Model.php'
								  ));
	
	class ModelEvent extends Model{
		
		
		private $id;
		private $hash;
		private $localisation;
		private $titre;
		private $description;
		private $date;
		private $heure;
		private $login;
		private $public;
		protected static $object = 'event';
		protected static $primary = 'id';
		
		
		public function __construct($id = null, $localisation = null, $titre = null, $description = null, $date = null, $heure = null, $login = null, $public = null){
			if(!is_null($id) && !is_null($localisation) && !is_null($titre) && !is_null($description) && !is_null($date) && !is_null($heure) && !is_null($loginCreateur) && !is_null($public)){
				$this->id = $id;
				$this->localisation = $localisation;
				$this->titre = $titre;
				$this->description = $description;
				$this->date = $date;
				$this->heure = $heure;
				$this->login = $loginCreateur;
				$this->public = $public;
			}
		}
		
		
		// getter
		public function get($attribut){
			return $this->$attribut;
		}
		
		
		public static function search($data){
			$sql = "SELECT * FROM Event e WHERE";
			if(isset($data["id"])){
				$sql = $sql."e.id=:id";
			}
			if(isset($data["titre"])){
				$sql = $sql."e.titre LIKE CONCAT('%',:titre,'%')  AND ";
			}
			if(isset($data["date"])){
				$sql = $sql."e.date=:date AND ";
			}
			if(isset($data["time"])){
				$sql = $sql."e.date LIKE CONCAT('%',:time,'%') AND "; //permet de vérifier si la chaîne rentrée est comprise dans la chaîne totale de la bdd (% = nimporte quelle chaîne de char)
			}
			if(isset($data["description"])){
				$sql = $sql."e.description LIKE CONCAT('%',:description,'%') AND ";
			}
			$sql = $sql."bi.montant > :montantMin AND montant < :montantMax";
			//echo $sql;    //DEBUG
			try{
				// Prepare the SQL statement
				$req_prep = Model::$pdo->prepare($sql);
				
				// Execute the SQL prepared statement after replacing tags
				$req_prep->execute($data); //on associe le tableau à la requete pour éviter l'injection
				
				// Retrieve results as previously
				$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelEvent');
				$tab = $req_prep->fetchAll();
				if(empty($tab)){
					return false;
				}
				
				return $tab; //on retourne un tableau car pour les tables à plusieurs clés primaire, si on en met qu'une dans le WHERE, ça peut renvoyer plusieurs tuples
			}catch(PDOException $e){
				echo $e->getMessage(); // affiche un message d'erreur
				die(); //supprimer equilvalent à System.exit(1); en java
			}
			$newId = $lastId + 1;
			$newData = $data;
			$newData['id'] = $newId;
			$newData['hash'] = Security::chiffrer($newId);
			
			return parent::save($newData);
		}
		
		
		public static function selectAll(){
			$sql = "SELECT * FROM Event e";
			// Prepare the SQL statement
			$req_prep = Model::$pdo->prepare($sql);
			$req_prep->execute();
			// Retrieve results as previously
			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelEvent');
			$tab = $req_prep->fetchAll();
			
			return $tab;
		}
		
		
		public static function getHash(){
			$p = Model::$pdo->query("SELECT MAX(id) FROM event");
			$id = $p->fetchAll();
			
			return Security::chiffrer($id[0][0] + 1);
		}
	}
