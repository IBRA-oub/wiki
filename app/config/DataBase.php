<?php

class DataBase{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    
    protected $cnx;


    public function connection() {
        
            try {
                // dont forget to create database
            $cnx = new PDO("mysql:host=$this->servername;dbname=wiki", $this->username, $this->password);
            // set the PDO error mode to exception
            $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "Connected successfully";
            return $cnx;

            } catch(PDOException $e) {

            echo "Connection failed: " . $e->getMessage();

            }
    }

}



?>