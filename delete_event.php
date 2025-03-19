<?php
include 'db_connect.php';
session_start();

// Check if admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$sql = "DELETE FROM programs WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: admin.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>
