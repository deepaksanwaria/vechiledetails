<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Stylesheets/login.css">
    <link rel="icon" href="media/icon.png" type="image/png">
    <title>Login</title>
</head>

<body>
    <div class="background"></div>
    <div class="login">
        <h1>Admin Login</h1>
        <form action="" method="POST">
            <input type="text" name="username" id="uname" placeholder="Enter Username" autocomplete="off">
            <input type="password" name="password" id="password" placeholder="Enter Password">
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>
<?php
        include("connection.php"); //including Connection.php file
        //session_start(); 
        if (isset($_POST["username"], $_POST["password"])) {
            $username = $_POST["username"]; //Storing username in variable
            $password = $_POST["password"]; //Storing password in variable
            $sql = "SELECT `username` FROM `users` WHERE `username`='$username' AND `password`='$password'"; //Query to check username and password validity
            $result = mysqli_query($conn, $sql); //Firing query
            while ($row = mysqli_fetch_assoc($result)) { 
                $user= $row["username"]; //fetched username
            }
            $count = mysqli_num_rows($result); //Counting number of rows
            // if user is valid
            if ($count == 1) {
               // $_SESSION['login_user'] = $user;
                header("Location: add.php"); //heading to add.php file
            } else { //else if credentials are invalid:
                echo '<script language="javascript">';
                echo 'alert("Invalid Username or Password")'; //alert
                echo '</script>';
        }
        }
        ?>
