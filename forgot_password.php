<?php
session_start();
include "db_connect.php"; // Ensure database connection is included

$success_message = $error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));

        // Store token in the database
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // Send reset link (replace with actual email sending code)
        $reset_link = "http://yourwebsite.com/reset_password.php?token=$token";
        // mail($email, "Password Reset Request", "Click here to reset your password: $reset_link");

        $success_message = "✅ Password reset link sent to your email!";
    } else {
        $error_message = "❌ Email not found. Please check and try again.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="src/forgot_password.css">
</head>
<body>
    <div class="container">
        <div class="forgot-card">
            <h2>Forgot Password</h2>
            <p>Enter your email address to receive a password reset link.</p>

            <?php if ($success_message): ?>
                <p class="success"><?php echo $success_message; ?></p>
            <?php elseif ($error_message): ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <button type="submit" class="submit-button">Send Reset Link</button>
            </form>

            <p><a href="login.php">Back to Login</a></p>
        </div>
    </div>
</body>
</html>
