<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="ABC Company">
        <meta name="description" content="Timesheet records from the database">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Nunito&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/main.css">
        <title>Timesheet Records | Employee Portal</title>
    </head>
    <body>
        <header>
            <?php include ("includes/navbar.php"); ?>
        </header>
        <main>
            <h1>Timesheet Records</h1>
            <!-- .table-response class allows horizontal scrolling when the screen width is too small -->
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Duration<br><small>(HH:MM)</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- display selected columns from the joined tables
                             use Date_Format function to format the columns with data type = Time -->
                        <?php
                            include_once("crud.php");
                            $crud = new crud();
                            $query = "SELECT Employee_Info.empID, Employee_Info.fname, Employee_Info.lname, Employee_Info.dept, Employee_Info.position, Timesheet.workDate, 
                                            DATE_FORMAT(Timesheet.startTime, '%H:%i %p') AS startTime, DATE_FORMAT(Timesheet.endTime, '%H:%i %p') AS endTime, 
                                            DATE_FORMAT(Timesheet.workHours, '%H:%i') AS duration
                                    FROM Timesheet INNER JOIN Employee_Info
                                    WHERE Timesheet.empID = Employee_Info.empID;";
                            $rows = $crud->getData($query);

                            foreach($rows as $row){
                        ?>
                                <tr>
                                    <td><?php echo $row["empID"];?></td>
                                    <td><?php echo $row["fname"];?></td>
                                    <td><?php echo $row["lname"];?></td>
                                    <td><?php echo $row["dept"];?></td>
                                    <td><?php echo $row["position"];?></td>
                                    <td><?php echo $row["workDate"];?></td>
                                    <td><?php echo $row["startTime"];?></td>
                                    <td><?php echo $row["endTime"];?></td>
                                    <td><?php echo $row["duration"];?></td>
                                </tr>    
                        <?php    
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
        <footer>
            <?php include ("includes/footer.php"); ?>
        </footer>
    </body>
</html>