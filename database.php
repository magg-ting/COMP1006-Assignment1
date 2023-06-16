<?php
  class database{
    private $host = "localhost";
    private $username = "root";
    private $password = "password";
    private $database = "Assignment1";
    public $connection;

    //database connection
    public function __construct(){
      if (!isset($this->connection)){
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()){
          trigger_error("Failed to connect to database: " . mysqli_connect_error());
        }
      }
    }
  }
?>
