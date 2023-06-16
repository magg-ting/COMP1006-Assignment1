<?php
  include_once("database.php");
  include_once("crud.php");
  include_once("validate.php");

  //create class objects to add data to the database
  $database = new database();
  $crud  = new crud();
  $validate = new validate();

  if(isset($_POST["submit"])){
    $empID = $_POST["empID"];
    $email = $_POST["email"];
    $workDate = $_POST["date"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];

    //validate the employee ID and start/end time
    $validID = $validate->verifyID($empID, $email);
    $validTime = $validate->verifyTime($startTime, $endTime);

    //send msg by get method if the empID does not match with the email on record
    if(!$validID){
      header("Location:index.php?msg=invalidID");
    }
    else if(!$validTime){
      header("Location:index.php?msg=invalidTime");
    }
    //otherwise execute the query and add entry to the database
    else{
      $query = "INSERT INTO Timesheet(empID, workDate, startTime, endTime) VALUES('$empID','$workDate','$startTime','$endTime');";
      $result = $crud->execute($query);
      if($result){
        header("Location:index.php?msg=success");
      }
      else{
        header("Location:index.php?msg=error");
      }
    }
  }
  else{
    echo "<p>Data not received</p>";
  }    
?>