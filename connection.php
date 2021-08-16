<?php
// Connection file to connect database
	$servername = "localhost:3307"; // server name with port number in your case this may be 3306
	$username = "root"; //username
	$password = ""; // password
	$conn = mysqli_connect($servername, $username, $password); // connect to server
	$db = mysqli_select_db($conn,'vechile_details'); // select database
?>