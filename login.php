<?php
session_start();
include "db_connect.php"; // Ensure database connection is included

$error_message = ""; // Variable to store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check user credentials
    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role with a success alert
            if ($row['role'] == 'admin') {
                echo "<script>
                        alert('✅ Login Successful! Welcome, Admin.');
                        window.location.href = 'admin_dashboard.php'; 
                      </script>";
            } else {
                echo "<script>
                        alert('✅ Login Successful! Welcome, Volunteer.');
                        window.location.href = 'volunteer_index.php'; 
                      </script>";
            }
            exit();
        } else {
            $error_message = "❌ Invalid password. Please try again.";
        }
    } else {
        $error_message = "❌ Invalid email or account does not exist.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="src/login.css">

    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, "", window.location.href);
    }
    window.onpopstate = function () {
        window.location.href = "index.php"; // Forces back 
    };

    function togglePassword() {
        var passwordInput = document.getElementById("password");
        var showPasswordCheckbox = document.getElementById("showPassword");

        if (showPasswordCheckbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
    </script>

</head>
<body>
    <div class="login-container">
        <div class="login-card">
            
            <div class="login-header">
                <h2>ZooPark Login</h2>
            </div>
            
            <?php if(!empty($error_message)): ?>
            <script>
                alert("<?php echo $error_message; ?>");
            </script>
            <?php endif; ?>
            
            <form method="POST" action="" class="login-form">
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required autocomplete="email">
                </div>
                
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="showPassword" onclick="togglePassword()">
                    <label for="showPassword">Show Password</label>
                </div>

                <button type="submit" class="submit-button">
                    <span>Log In</span>
                </button>
            </form>
            
            <div class="login-footer">
                <p>New to ZooPark? <a href="register.php">Create an account</a></p>
                <p><a href="forgot_password.php">Forgot Password?</a></p>

                <a href="index.php" class="back-btn">Back</a>
            </div>
        </div>
        
    </div>
    
</body>
</html>
