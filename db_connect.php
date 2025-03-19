<?php
$host = "localhost";  // XAMPP default hostname
$username = "root";   // Default XAMPP MySQL user
$password = "";       // Default XAMPP MySQL password (leave empty)
$dbname = "zooparc_db";  // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
   
}
?>
