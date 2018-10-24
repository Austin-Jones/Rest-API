<?php
class Database{
public $conn;

private $hostname='sql01';
private $dbname='LatTest';
private $username='sa';
private $password='Holiday90';


    // get the database connection
    public function getConnection(){

        $conn = null;

        try{
           $this->conn = new PDO("sqlsrv:Server=" . $this->hostname . ";Database=" . $this->dbname, $this->username, $this->password);
           $this->conn->setAttribute( PDO::ATTR_PERSISTENT, TRUE );
           $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>