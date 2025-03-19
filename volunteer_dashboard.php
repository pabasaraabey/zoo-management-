<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'volunteer') {
    header("Location: login.php"); // Redirect if not logged in as volunteer
    exit();
}
echo "<h2>Welcome Volunteer, " . $_SESSION['user_name'] . "</h2>";
?>

<link rel="stylesheet" href="src/volunteer_dashboard.css">
<ul>
<li><a href="programs.php">Events</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>