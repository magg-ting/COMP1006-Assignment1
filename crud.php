<?php
  require_once "database.php";
  
  //This class is an extension of the database class and will execute CRUD queries on the database
  class crud extends database {
    public function __construct(){
      parent::__construct();
    }

    public function getData($query){
      $result = $this->connection->query($query);
      if ($result == false){
        return false;
      }
      $rows = array();
      while ($row = $result->fetch_assoc()){
        $rows[] = $row;
      }
      return $rows;
    }
    
    public function execute($query){
      $result = $this->connection->query($query);
      if ($result){
        return true;
      }
      else{
        return false;
      }
    }
  }
?>