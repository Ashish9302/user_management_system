<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project-1";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    header("Location: 404Error.html");
    exit();
}
?>