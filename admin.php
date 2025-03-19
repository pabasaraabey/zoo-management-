<?php
include 'db_connect.php';
session_start();

// Check if the user is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch programs
$sql = "SELECT * FROM programs ORDER BY date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program</title>
    <link rel="stylesheet" href="src/admin.css">
</head>
<body>

<?php
include 'db_connect.php';
session_start();

// Check if the user is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch programs
$sql = "SELECT * FROM programs ORDER BY date ASC";
$result = $conn->query($sql);
?>

<h2>Admin Panel - Manage Events & Programs</h2>

<a href="add_event.php">➕ Add New Event</a>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td>
                <a href="edit_event.php?id=<?php echo $row['id']; ?>">✏️ Edit</a> |
                <a href="delete_event.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">🗑 Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<a href="admin_dashboard.php" class="back-btn">Back</a>

</body>
</html>