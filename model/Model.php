<?php
require_once File::build_path(array('config','Conf.php'));

class Model {

    public static $pdo;

    public static function Init(){
        $hostname=Conf::getHostname();
        $login=Conf::getLogin();
        $password=Conf::getPassword();
        $database=Conf::getDatabase();
        try{
            self::$pdo=new PDO("mysql:host=$hostname;dbname=$database",$login,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die(); //supprimer equilvalent à System.exit(1); en java
        }

    }

    public static function selectAll(){
        $table_name= static::$object;
        $class_name= ucfirst($table_name);
        try{
            $rep=Model::$pdo->query('SELECT * FROM '.$class_name);
            $tab=$rep->fetchAll(PDO::FETCH_CLASS, 'Model'.$class_name);
            return $tab;
        } catch(PDOException $e){
            echo $e->getMessage(); // affiche un message d'erreur
            die(); //supprimer equilvalent à System.exit(1); en java
        }
    }

    public static function select($primary) { //j'ai modifié la fonction select pour prendre un tableau en entree car certaines tables ont deux clés primaires
        $table_name= static::$object;
        $class_name= ucfirst($table_name);
        //$key_name=static::$primary;
        // In the query, put tags :xxx instead of variables $xxx
        $sql = "SELECT * from $class_name WHERE ";
        foreach($primary as $key => $value){ //on ajoute dans le WHERE tout ce qui a dans le tableau
            $sql=$sql."$key=:$key AND ";
        }
        $sql=rtrim($sql,"AND "); //on supprime le dernier AND
        try{
            // Prepare the SQL statement
            $req_prep = Model::$pdo->prepare($sql);
            // Execute the SQL prepared statement after replacing tags
            // with the values given in $values
            $req_prep->execute($primary); //on associe le tableau à la requete pour éviter l'injection

            // Retrieve results as previously
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model'.$class_name);
            $tab = $req_prep->fetchAll();
            // Careful: you should handle the special case of no results
            if (empty($tab))
                return false;
            return $tab; //on retourne un tableau car pour les tables à plusieurs clés primaire, si on en met qu'une dans le WHERE, ça peut renvoyer plusieurs tuples
        } catch(PDOException $e){
            echo $e->getMessage(); // affiche un message d'erreur
            die(); //supprimer equilvalent à System.exit(1); en java
        }
    }

    public static function delete($primary) { //j'ai modifié la fonction delete pour prendre un tableau en entree car certaines tables ont deux clés primaires
        $table_name= static::$object;
        $class_name= ucfirst($table_name);
        //$key_name=static::$primary;
        $sql = "DELETE FROM $class_name WHERE ";
        foreach($primary as $key => $value){ //on ajoute dans le WHERE tout ce qui a dans le tableau
            $sql=$sql."$key=:$key    AND ";
        }
        $sql=rtrim($sql,"AND "); //on supprime le dernier AND
        try{
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($primary); //on associe le tableau à la requete pour éviter l'injection
            return true; //si on return pas true, la valeur retournée sera NULL
        } catch(PDOException $e){
            echo $e->getMessage(); // affiche un message d'erreur
            return false;
        }
    }

    public static function update($data) {
        $table_name= static::$object;
        $class_name= ucfirst($table_name);
        $key_name=static::$primary;
        $sql = "UPDATE $class_name SET ";
        foreach($data as $key => $value){
            if($key!=$key_name){
                $sql=$sql.$key."=:$key, ";
            }
        }
        $sql=rtrim($sql,", ");
        $sql=$sql." WHERE $key_name=:$key_name";
        try{
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);
            return true; //si on return pas true, la valeur retournée sera NULL
        } catch(PDOException $e){
            echo $e->getMessage(); // affiche un message d'erreur
            return false;
        }
    }

    public static function save($data) {
        $table_name= static::$object;
        $class_name= ucfirst($table_name);
        //$key_name=static::$primary;
        $sql = "INSERT INTO $class_name (";
        foreach($data as $key => $value){
            $sql=$sql."$key, ";
        }
        $sql= rtrim($sql,", ");
        $sql=$sql.") VALUES (";
        foreach($data as $key => $value){
            $sql=$sql.":$key, "; //avec les deux points, prend la valeur de de la clé indiquée après les : dans le tableau passé en parametre de execute(), evite l'sql injection par rapport à "='".$value"'";
        }
        $sql= rtrim($sql,", ");
        $sql=$sql.");";
        try{
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);
            return true; //si on return pas true, la valeur retournée sera NULL
        } catch(PDOException $e){
            var_dump( $e->getMessage()); // affiche un message d'erreur
            return false;
        }
    }
}
Model::Init();
