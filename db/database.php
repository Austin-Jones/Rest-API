<?php
class Database{
public $conn;

private $hostname='YourServer'; // This is the ip address or host name of the server hosting your database.
private $dbname='YourDB'; // This is the name of the database you want to use. 
private $username='YourUsername'; // This is the username for the SQL account you want to use.
private $password='YourPassword';// This is the password for SQL account you want to use. 


    // get the database connection
    public function getConnection(){

        $conn = null;

        try{
           $this->conn = new PDO("sqlsrv:Server=" . $this->hostname . ";Database=" . $this->dbname, $this->username, $this->password);
            // Note the above is for SQL Server Use the below line instead for mySQL.
           $this->conn->setAttribute( PDO::ATTR_PERSISTENT, TRUE );
           $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
