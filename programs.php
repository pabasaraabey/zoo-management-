<?php
session_start(); // Start session before using $_SESSION
include 'db_connect.php';

$search_query = "";
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $sql = "SELECT * FROM programs WHERE title LIKE '%$search_query%' OR category LIKE '%$search_query%' ORDER BY date ASC";
} else {
    $sql = "SELECT * FROM programs ORDER BY date ASC";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs & Events</title>
    <link rel="stylesheet" href="src/programs.css">
</head>
<body>

<div class="programs-container">
    <h2>Available Programs & Events</h2>

    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search by title or category..." value="<?php echo $search_query; ?>">
        <button type="submit">Search</button>
    </form>

    <ul>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <li>
                <strong><?php echo $row['title']; ?></strong> <br>
                <?php echo $row['description']; ?> <br>
                <em>Date: <?php echo $row['date']; ?> | Category: <?php echo $row['category']; ?></em>
            </li>
        <?php } ?>
    </ul>
</div>

<!-- Check if the session role is set before using it -->
<?php if (isset($_SESSION['role'])): ?>
    <a href="<?php echo ($_SESSION['role'] == 'admin') ? 'admin_dashboard.php' : 'volunteer_index.php'; ?>" class="back-btn">Back</a>
<?php else: ?>
    <a href="login.php" class="back-btn">Back</a> <!-- Redirect to login if no role is set -->
<?php endif; ?>

</body>
</html>
