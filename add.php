<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Stylesheets/login.css">
    <link rel="stylesheet" href="Stylesheets/view.css">
    <title>Add VechileDetails</title>
</head>
<body>
    <div class="background"></div>
    <div class="login-btn logout">
        <a href="logout.php">Logout</a>
    </div>
<div class="login">
        <h1>Add Vehicle</h1>
        <form action="" method="POST">
            <input type="text" name="vin"  placeholder="Enter VIN Number" autocomplete="off">
            <input type="text" name="manufacturer"  placeholder="Enter Manufacturing Company" autocomplete="off">
            <input type="text" name="model"  placeholder="Enter Model" autocomplete="off">
            <input type="text" name="year"  placeholder="Enter Year Of Manufacturing" autocomplete="off">
            <input type="text" name="fuel"  placeholder="Enter Fuel Type" autocomplete="off">
            <input type="text" name="milage"  placeholder="Enter Mileage in Km/l" autocomplete="off">
            <input type="text" name="displace"  placeholder="Enter Engine Displacement" autocomplete="off">
            <input type="text" name="cly"  placeholder="Enter Number of Cylinder" autocomplete="off">
            <input type="submit" name="submit" value="ADD">
        </form>
    </div>  
</body>
</html>
<?php
include('connection.php'); //including database connection file
if (isset($_POST['submit'])) { //Checking sumbit button is clicked or not
    $vin = $_POST['vin'];                    //Storing  textfield values in variable 
    $manufacturer=$_POST['manufacturer'];   
    $model=$_POST['model'];
    $year=$_POST['year'];
    $fuel=$_POST['fuel'];
    $milage=$_POST['milage'];
    $displace=$_POST['displace'];
    $cly=$_POST['cly'];

    // Checking that all the required fields are filled
    if (empty($vin) || empty($manufacturer) || empty($model)|| empty($year)|| empty($fuel)|| empty($displace)|| empty($cly)|| empty($milage)){
        echo '<script language="javascript">';
        echo 'alert("Failed! Please insure that all the fields have data.")'; // Error Message if their is an empty fields
        echo '</script>';
        exit(); // Exit if error
    }

    // Checking if the data regarding a vin you want to insert is already in the database:
    $vin_check = null;
    $vin_sql = mysqli_query($conn, "SELECT `vin` FROM `vehicle` WHERE `vin`='$vin'");
    while ($row = mysqli_fetch_assoc($vin_sql)) {
        $vin_check = $row['vin'];  // fetch the vin from the database
    }

    // Data is already in the database: 
    if (!empty($vin_check)) {   
        echo '<script language="javascript">';
        echo 'alert("Data Already Exist")'; //alert
        echo '</script>';
        exit(); //Exit
    }
    // else it will continue insertion of data

    // Sql query for data insertion:
    $sql = "INSERT INTO `vehicle`(`vin`, `man_company`, `model`, `year`, `fuel`, `milage`, `displacement`, `cylinder`) VALUES ('$vin','$manufacturer','$model','$year','$fuel','$milage','$displace','$cly')";
    $result = mysqli_query($conn, $sql); //firing the query for data insertion

    // if failed to insert
    if (!$result) {
        echo '<script language="javascript">';
        echo 'alert("Failed to insert Details")'; //alert
        echo '</script>';
?>
        <script>
            window.location.replace("add.php"); // Heading to add.php page
        </script>
    <?php
    } else { //if data insertion sucessful:
        echo '<script language="javascript">';
        echo 'alert("Data insertion Successful")';  // alert
        echo '</script>';
    ?>
        <script>
            window.location.replace("add.php");
        </script>
<?php
    }
}

?>