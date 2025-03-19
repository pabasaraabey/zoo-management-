<?php
include 'db_connect.php';
session_start();

// Check if admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $category = $_POST['category'];

    $sql = "INSERT INTO programs (title, description, date, category) 
            VALUES ('$title', '$description', '$date', '$category')";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="src/add_event.css">
</head>
<body>

<div class="add-event-container">
    <h2>Add New Event</h2>

    <form method="POST" action="add_event.php">
        <label for="title">Program Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Program Description:</label>
        <textarea name="description" id="description" rows="4" required></textarea>

        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required>

        <label for="category">Category:</label>
        <input type="text" name="category" id="category" required>

        <input type="submit" value="Add Event">

        <a href="admin.php" class="back-btn">Back</a>
    </form>

    
</div>

</body>
</html>