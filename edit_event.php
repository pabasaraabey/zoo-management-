<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include "db_connect.php";

if (!isset($_GET['id'])) {
    echo "Invalid program ID!";
    exit();
}

$program_id = $_GET['id'];

// Fetch the existing program details
$stmt = $conn->prepare("SELECT * FROM programs WHERE id = ?");
$stmt->bind_param("i", $program_id);
$stmt->execute();
$result = $stmt->get_result();
$program = $result->fetch_assoc();

if (!$program) {
    echo "Program not found!";
    exit();
}

// Update program details when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $program_name = $_POST['program_name'];
    $program_date = $_POST['program_date'];
    $program_description = $_POST['program_description'];
    $program_category = $_POST['program_category'];

    $update_stmt = $conn->prepare("UPDATE programs SET program_name=?, program_date=?, program_description=?, program_category=? WHERE id=?");
    $update_stmt->bind_param("sssi", $program_name, $program_date, $program_description, $program_category, $program_id);

    if ($update_stmt->execute()) {
        echo "<script>alert('Program updated successfully!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "Error updating program.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program</title>
    <link rel="stylesheet" href="src/edit_event.css">
</head>
<body>

<div class="edit-program-container">
    <h2>Edit Program</h2>
    <form action="" method="POST">
        <label>Program Name:</label>
        <input type="text" name="program_name" value="<?php echo isset($program['program_name']) ? htmlspecialchars($program['program_name']) : ''; ?>" required>

        <label>Date:</label>
        <input type="date" name="program_date" value="<?php echo isset($program['program_date']) ? htmlspecialchars($program['program_date']) : ''; ?>" required>

        <label>Description:</label>
        <textarea name="program_description" required><?php echo isset($program['program_description']) ? htmlspecialchars($program['program_description']) : ''; ?></textarea>

        <label>Program Category :</label>
        <input type="text" name="program_category" value="<?php echo isset($program['program_category']) ? htmlspecialchars($program['program_category']) : ''; ?>" required>

        <button type="submit" name="update_program">Update Program</button>
    </form>

    <a href="admin.php">Back</a>
</div>

</body>
</html>
