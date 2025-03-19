<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "<h2>Welcome, " . $_SESSION['name'] . "!</h2>";
echo "<p>Here you can view your assigned events and volunteer programs.</p>";
?>

<a href="logout.php">Logout</a>
