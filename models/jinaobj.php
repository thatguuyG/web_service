<?php
class JinaObj{
 
    // database connection and table name
    private $conn;
    private $table_name = "jina";
 
    // object properties
    public $id;
    public $jina;
    public $created_at;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function create(){
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    jina=:jina, created_at=:created_at";
     
        $stmt = $this->conn->prepare($query);
        $this->jina=htmlspecialchars(strip_tags($this->jina));
        $this->created_at=htmlspecialchars(strip_tags($this->created_at));
        $stmt->bindParam(":jina", $this->jina);
        $stmt->bindParam(":created_at", $this->created_at);
        if($stmt->execute()){
            return true;
        }
        return false;
         
    }
}
?>