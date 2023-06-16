<?php
  require_once "database.php";

  class validate extends database{
    public function __construct(){
      parent::__construct();
    }

    //verify if the empID aligns with the staff email on record
    public function verifyID($empID, $email){
      $query = "SELECT * FROM Employee_Info WHERE empID = $empID AND email = '$email';";
      $result = $this->connection->query($query);
      if($result->num_rows == 0){
        return false;
      }
      else {
        return true;
      }
    }

    //verify if the endTime is greater than the startTime
    public function verifyTime($startTime, $endTime){
      if($endTime > $startTime){
        return true;
      }
      else{
        return false;
      }
    }

  }
?>