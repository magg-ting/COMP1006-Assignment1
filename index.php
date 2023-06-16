<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ABC Company">
    <meta name="description" content="Employee portal for entering daily timesheet records">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <title>Home | Employee Portal</title>
</head>

<body>
    <header>
        <?php include("includes/navbar.php"); ?>
    </header>
    <main>
        <h1>Enter Daily Timesheet</h1>
            <form class="form-horizontal" id="timesheet" action="entry.php" method="post">
                <!-- all input fields are marked as required, so that the form data will not be submitted if any of the fields is empty -->
                <div class="form-group">
                    <label class="control-label col-sm-4" for="empID">Employee ID</label>
                    <div class="col-sm-6">
                        <!-- use client-side validation to ensure the ID entered is in the correct format -->
                        <input class="form-control" type="tel" id="empID" name="empID" pattern="[\d]{4}" size="4" placeholder="0000" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Email</label>
                    <div class="col-sm-6">
                        <!-- use client-side validation to ensure the email entered is in the correct format -->
                        <input class="form-control" type="email" id="email" name="email" placeholder="firstname.lastname@abc.com" pattern="[\w]+.[\w]+@abc.com" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="date">Date</label>
                    <div class="col-sm-6">
                        <!-- use client-side validation to ensure the date entered is no later than the current date -->
                        <input class="form-control" type="date" id="date" name="date" onfocus="this.max=new Date().toISOString().split('T')[0]" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="startTime">Start Time</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="time" id="startTime" name="startTime" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="endTime">End Time</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="time" id="endTime" name="endTime" required>
                    </div>
                </div>
                <div class="btn-row">
                    <input class="btn btn-dark reset" type="reset" name="reset" value="Clear">
                    <input class="btn btn-primary order" type="submit" name="submit" value="Submit">
                </div>
            </form>
        <!-- show a message based on the server-side validation and the query result -->
        <?php
        if (isset($_GET["msg"])) {
            // employee ID must match with the staff email record in the database
            if ($_GET["msg"] == "invalidID") {
                echo '<p class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        The employee ID does not match with the email address. Please try again.
                      </p>';
            }
            // end time must be later than start time
            else if ($_GET['msg'] == "invalidTime") {
                echo '<p class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        End time should not be the same or earlier than start time. Please try again.
                      </p>';
            } 
            // provide a link to the Records page if entry is succesfully added
            else if ($_GET['msg'] == "success") {
                echo '<p class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        Record added succesfully.  View <a href="records.php" title="Browse the timesheet records">here</a>.
                      </p>';
            }
            // display error if the SQL command fails to be exeucted
            else if ($_GET['msg'] == "error") {
                echo '<p class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        Error: cannot execute the command.
                      </p>';
            }
        }
        ?>
    </main>
    <footer>
        <?php include("includes/footer.php"); ?>
    </footer>
</body>

</html>