<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Stylesheets/login.css">
    <link rel="stylesheet" href="Stylesheets/view.css">
    <script src="https://kit.fontawesome.com/2d83476129.js" crossorigin="anonymous"></script>
    <link rel="icon" href="media/logo.png" type="image/png">
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

    $result_sql = mysqli_query($conn, "SELECT * FROM `vehicle` WHERE `vin`='$vin'"); // sql query to get data regarding vin entered
    while ($row = mysqli_fetch_assoc($result_sql)) { // fetch data from database in variables
        $man_company = $row['man_company'];
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
                    <td><b><?= $man_company ?></b></td><!-- Printing data fetched from database -->
                </tr>
                <tr>
                    <td>Model</td>
                    <td><b><?= $model ?></b></td><!-- Printing data fetched from database -->
                </tr>
                <tr>
                    <td>Year Of Manufacturing</td>
                    <td><b><?= $year ?> </b></td><!-- Printing data fetched from database -->
                </tr>
                <tr>
                    <td>Fuel Type</td>
                    <td><b><?= $fuel ?></b></td><!-- Printing data fetched from database -->
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
    <div class="login" style="margin-top: 30px;">
        <form action="" method="post">

            <input type="email" name="email" placeholder="Enter Your Email Here" required><br>
            <input type="submit" Style="width:300px; background-color:blue;" value="Get Details By Email" name="send">
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['send'])) {
    $template_file = "email_template.php";
    $to_email = $_POST['email'];
    $subject = "SMTP mail to";
    $headers = "From: Arjun Murthy <parivestra@gmail.com>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $swap_var = array(
        "{VIN_NUMBER}" => $vin,
        "{MAN_COMPANY}" => $man_company,
        "{MODEL}" => $model,
        "{YEAR_OF_MAN}" => $year,
        "{FUEL}" => $fuel,
        "{MILAGE}" => $milage,
        "{ENGINE_DIS}" => $Displacement,
        "{NO_OF_CLY}" => $cylinder
    );

    if (file_exists($template_file))
        $body = file_get_contents($template_file);
    else
        die("Unable to locate your template file");

    foreach (array_keys($swap_var) as $key) {
        if (strlen($key) > 2 && trim($swap_var[$key]) != '')
            $body = str_replace($key, $swap_var[$key], $body);
    }
    if (mail($to_email, $subject, $body, $headers)) {
        echo '<script language="javascript">';
        echo 'alert("Email Successfully Sent!")'; //alert
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Failed to send Email!")'; //alert
        echo '</script>';
    }
}
?>