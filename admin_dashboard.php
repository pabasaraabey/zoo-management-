<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="src/admin_dashboard.css">
</head>
<body>

<div class="dashboard">
    <h2>Welcome Admin, <?php echo $_SESSION['user_name']; ?></h2>

    <ul>
        <li><a href="programs.php">View Programs</a></li>
        <li><a href="admin.php">Settings</a></li>
        <li><a href="logout.php" onclick="return confirmLogout()">Logout</a></li>
    </ul>
</div>

<!-- JavaScript for Logout Confirmation -->
<script>
function confirmLogout() {
    return confirm("Are you sure you want to logout?");
}


    if (window.history.replaceState) {
        window.history.replaceState(null, "", window.location.href);
    }
    window.onpopstate = function () {
        window.location.href = "index.php"; // Forces back navigation to login page
    };

</script>

</body>
</html>  
