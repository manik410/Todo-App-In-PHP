<?php
class Task{
    private $conn;
    public $table_name="tasklist";
    public $name;
    public $description;
    public $priority;
    public $id;
    public function __construct($db){
        $this->conn = $db;
    }
function read(){
    $query = "SELECT * from tasklist order by ID";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
  
    return $stmt;
    }
function create(){
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                Task=:name,Description=:description,Priority=:priority";
    $stmt = $this->conn->prepare($query);
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->priority=htmlspecialchars(strip_tags($this->priority));
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":priority", $this->priority);
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
    }
    function update()
    {
    $query = "UPDATE
                " . $this->table_name . "
            SET
            Priority=:priority
            WHERE
                ID = :id";
    $stmt = $this->conn->prepare($query);
    $this->priority=htmlspecialchars(strip_tags($this->priority));
    $this->id=htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(':priority',$this->priority);
    $stmt->bindParam(':id', $this->id);
    if($stmt->execute()){
        return true;
    }
  
    return false;
    }
function delete(){
  
    $query = "DELETE FROM " . $this->table_name . " WHERE ID = ?";
    $stmt = $this->conn->prepare($query);
    $sql="ALTER TABLE tasklist AUTO_INCREMENT = 1";
    $stmt1=$this->conn->prepare($sql);
    $this->id=htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(1, $this->id);
    $stmt1->execute();
    if($stmt->execute()){
        if($stmt1->execute())
        return true;
    }
  
    return false;
}
}
?>