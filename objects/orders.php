<?php
class Orders{
 
    // database connection and table name
    private $conn;
    private $table_name = "YourTable"; // Change this to the table you'd like to access.
 
    // object properties
    public $OrderStatus; // This var can be whatever you'd like
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    // read products
function read(){
 
    // select all query
    $query = "SELECT OrderStatus
            FROM " . $this->table_name . "";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
}

