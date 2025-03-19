<?php
include "db_connect.php"; // Ensure database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $role = $_POST['role'];

    //  admin access codes
    $valid_admin_codes = ["ADM001", "ADM002", "ADM003", "ADM004", "ADM005"];
    
    // Check if admin code is required
    if ($role == "admin") {
        if (!isset($_POST['admin_code']) || !in_array($_POST['admin_code'], $valid_admin_codes)) {
            die("Invalid Admin Access Code!"); // Stop registration if code is wrong
        }
    }

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $role);

    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: login.php"); // Redirect to login page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
