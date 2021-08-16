<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Stylesheets/login.css">
    <link rel="stylesheet" href="Stylesheets/view.css">
    <link rel="icon" href="media/icon.png" type="image/png">
    <title>View Details</title>
</head>

<body>

<?php
    include("connection.php");
    if (isset($_GET['vin']))
        $vin = $_GET['vin']; // Storing VIN in variable
    

    // validation if vin number is entered or not
    if (empty($vin)) {
         echo '<p class="error">Please enter valid VIN!</p>'; // Show error message
        echo '<p class="error-m">You will be auto redirected to previous page in 3 seconds.</p>'; //redirected 
    ?>
        <script>
            // script to redirect in 3 seconds to home page
            setTimeout(function() {
                window.location.href = 'index.html';
            }, 3000);
        </script>
    <?php
        exit(); // exit
    }

    $result_sql = mysqli_query($conn, "SELECT * FROM `vehicle` WHERE `vin`='$vin'");// sql query to get data regarding vin entered
    while ($row = mysqli_fetch_assoc($result_sql)) {// fetch data from database in variables
        $man_company =$row['man_company'];
        $model = $row['model'];
        $year = $row['year'];
        $fuel = $row['fuel'];
        $milage = $row['milage'];
        $Displacement = $row['displacement'];
        $cylinder = $row['cylinder'];
    }

    // Display error in no data rows
    if (mysqli_num_rows($result_sql) == 0) {
        echo '<p class="error">Result not found !</p>'; // Error message
        echo '<p class="error-m">You will be auto redirected to previous page in 3 seconds.</p>'; //redirect
    ?>
        <script>
            // script to redirect in 3 seconds
            setTimeout(function() {
                window.location.href = 'index.html';
            }, 3000);
        </script>
    <?php
        exit(); //Stop 
    }
    ?>

    <div class="background"></div>
    <div class="login-btn">
        <a href="index.html">Home</a>
    </div>
    <div class="login">
        <div class="view-table">
            <table>
                <tr>
                    <td>VIN number</td>
                    <td><b><?= $vin ?></b></td><!-- Printing data fetched from database -->
                </tr>
                <tr>
                    <td>Manufacturing Company</td>
                    <td><b><?=$man_company?></b></td><!-- Printing data fetched from database -->
                </tr>
                <tr>
                    <td>Model</td>
                    <td><b><?=$model?></b></td><!-- Printing data fetched from database -->
                </tr>
                <tr>
                    <td>Year Of Manufacturing</td>
                    <td><b><?= $year?> </b></td><!-- Printing data fetched from database -->
                </tr>
                <tr>
                    <td>Fuel Type</td>
                    <td><b><?= $fuel?></b></td><!-- Printing data fetched from database -->
                </tr>
                <tr>
                    <td>Milage</td>
                    <td><b><?= $milage ?> km/l</b></td><!-- Printing data fetched from database -->
                </tr>
                <tr>
                    <td>Engine Displacement (CI)</td>
                    <td><b><?= $Displacement ?></b></td><!-- Printing data fetched from database -->
                </tr>
                <tr>
                    <td>Number Of Clyinder</td>
                    <td><b><?= $cylinder ?></b></td><!-- Printing data fetched from database -->
                </tr>

            </table>
        </div>
    </div>
</body>

</html>