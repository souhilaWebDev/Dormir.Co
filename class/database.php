<?php
class Database {
    
    private $host = 'localhost';
    private $db = 'dormirco';
    // private $db = 'f2i_php';
    private $user = 'root';
    private $password = '';
    private $port = 3306;

    public function connectDb() {
        try {
            $pdo = new PDO(
                'mysql:host='.
                $this->host
                .';port='.
                $this->port
                .';dbname='.
                $this->db
                .'', 
                $this->user, 
                $this->password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
            );
            $pdo->exec("SET CHARACTER SET utf8");
            return $pdo;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    } 

    // select function pdo object, recherche, table et le filtre where 
    public function select($pdo, $search, $table, $where) {
        // requete sql
        $sql = "SELECT ".$search." FROM ".$table."";
        // init array
        $array = [];
        // si le tableau est superieur a 1
        if(!empty($where)){
        if (count($where) > 1) {

            // le where egale au résultat
            $sql = $sql." WHERE ".$where[0]."= ?";
            // la valeur dans le tableau pour execute
            $array = [$where[1]];
        }}
        // je prépare ma requete sql pour eviter les injection sql
        $statement = $pdo->prepare($sql);
        // j'execute ma requete sql avec les valeurs
        $statement->execute($array);
        // $statement->execute($array)or die(print_r($db->errorInfo()));
        return $statement;
    }
    
    public function insert($pdo, $champs, $table, $array, $pi){
        try {
            $sql = "INSERT INTO ";
            $sql = $sql.$table." ( ".$champs." ) VALUES (".$pi.");";
            // $sql .= $table." ( ".$champs." ) VALUES (".$pi.");";
            $statement = $pdo->prepare($sql);
            $statement->execute($array);
            return $statement;
        } catch (Exception $e) {
            return false;
        }
    }
  
    public function update($pdo, $champs_valeur, $table, $where){
        try {
            $sql = "UPDATE ";
            $sql .= $table." SET ";
            
            $sql .= implode( ', ',$champs_valeur);
           
            $array = [];
            // si le tableau est superieur a 1
            if (count($where) > 1) {
                // le where egale au résultat
                $sql .= " WHERE ".$where[0]."= ?";
                // la valeur dans le tableau pour execute
                $array = [$where[1]];
            }
            var_dump($sql);
            var_dump($array);
            $statement = $pdo->prepare($sql);
            $statement->execute($array);
            return $statement;
        } catch (Exception $e) {
            return false;
        }
    }

    public function selectLeftJoinWhereLike($pdo, $champs, $table,$table2, $fusion, $where) {
        // requete sql
        $sql = "SELECT ".$champs." FROM ".$table." LEFT JOIN ".$table2." ON ".$fusion." ";
        // init array
        $array = [];
        // si le tableau est superieur a 1
        if(!empty($where)){
        if (count($where) > 1) {
            // le where egale au résultat
            $sql = $sql." WHERE ".$where[0]." LIKE ?";
            // la valeur dans le tableau pour execute
            $array = [$where[1]];
        }}
        // je prépare ma requete sql pour eviter les injection sql
        $statement = $pdo->prepare($sql);
        // j'execute ma requete sql avec les valeurs
        $statement->execute($array);
        return $statement;
    }
    public function delete($pdo, $table, $champ_id,$array, $numero){

        try {
        
         $sql = "DELETE ";
        
        
         $sql = $sql." FROM ".$table." WHERE ".$table.".".$champ_id."=".$numero.";";
        
         $statement = $pdo->prepare($sql);
        
         $statement->execute($array);
        
         return $statement;
        
         } catch (Exception $e) {
        
        return false;
        
       }}
        
    
}
?>