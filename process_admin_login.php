<?php 
session_start();

// Hardcoded admin credentials (hash the password for security)
$admin_username = "admin";
$admin_password_hash = password_hash("password123", PASSWORD_DEFAULT); // Hash the password

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate input
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        header("Location: admin.php?error=Please enter username and password");
        exit();
    }

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Verify username and password
    if ($username === $admin_username && password_verify("password123", $admin_password_hash)) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        
        // Redirect to admin dashboard
        header("Location: admin_dashboard.php");
        exit();
    } else {
        header("Location: admin.php?error=Invalid username or password!");
        exit();
    }
} else {
    // Redirect if accessed directly
    header("Location: admin.php");
    exit();
}
?>
