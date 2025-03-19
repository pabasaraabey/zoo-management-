<?php
include 'db_connect.php'; // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $admin_code = $_POST['admin_code'] ?? '';

    // Admin Access Code Validation
    if ($role === 'admin' && $admin_code !== 'SECRET_CODE') { // Change 'SECRET_CODE' to the actual code
        echo "<script>
                alert('❌ Invalid Admin Access Code!');
                window.history.back();
              </script>";
        exit();
    }

    // Insert data into database
    $sql = "INSERT INTO volunteers (name, email, password, phone, address, role) 
            VALUES ('$name', '$email', '$password', '$phone', '$address', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('✅ Registration Successful!');
                window.location.href = 'volunteer_index.php'; // Redirect to login page
              </script>";
    } else {
        echo "<script>
                alert('❌ Error: " . $conn->error . "');
                window.history.back();
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="src/register.css">
</head>
<body>
    <form action="register.php" method="POST" onsubmit="return validatePassword()">
        <div class="login-header">
            <h2>ZooPark Registration</h2>
        </div>

        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="password" id="password" name="password" required>

        <label>Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <label>Mobile Number:</label>
        <input type="tel" name="phone" required>

        <label>Address:</label>
        <input type="text" name="address" required>

        <label>Select Role:</label>
        <select name="role" id="roleSelect" required onchange="toggleAccessCode()">
            <option value="volunteer">Volunteer</option>
            <option value="admin">Admin</option>
        </select>

        <!-- Hidden Admin Access Code Field -->
        <div id="adminCodeDiv" style="display: none;">
            <label>Admin Access Code:</label>
            <input type="text" name="admin_code">
        </div>

        <button type="submit" name="register">Register</button>
    </form>

    <script>
        function toggleAccessCode() {
            var role = document.getElementById("roleSelect").value;
            var codeDiv = document.getElementById("adminCodeDiv");
            if (role === "admin") {
                codeDiv.style.display = "block";
            } else {
                codeDiv.style.display = "none";
            }
        }

        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            
            if (password !== confirmPassword) {
                alert(" Passwords do not match! Please try again.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
