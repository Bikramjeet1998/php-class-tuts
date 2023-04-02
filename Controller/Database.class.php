<?php

class Database extends PDO {

    private $server = "localhost";
    private $database = "bikramjeet";
    private $username = "root";
    private $password = "";

    function __construct()
    {
        parent::__construct("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
    }

    public function getUsers(){
        $Query = "SELECT * from Employees ";
        $sql = $this->prepare($Query);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($postData){
        try {
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $fname = $postData['fname'];
            $lname = $postData['lname'];
            $email = $postData['email'];
    
            $sql = "INSERT INTO Employees(First_name,Last_name,Email) VALUES ('$fname','$lname','$email')";
            return $this->exec($sql);

        } catch (PDOException $e) {
            echo "failed to insert" . $e->getMessage();
        }
    }

}