<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);



$servername = "localhost";
$username = "root";
$password = "";
$database = "e_waste_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Registration

require_once 'db_connect.php'; // Use require_once to prevent recursive inclusion

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
    $phone = trim($_POST["phone"]);
    
    // Check if the email already exists
    $check_sql = "SELECT email FROM users WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);

    if ($check_stmt) {
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            echo "<script>alert('Error: The email \"$email\" is already registered. Please use a different email.'); window.location.href='registration.php';</script>";
            exit();
        }
        $check_stmt->close();
    } else {
        die("Error preparing check statement: " . $conn->error);
    }

    // Insert user data only if email does not exist
    $sql = "INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $name, $email, $password, $phone);
        
        if ($stmt->execute()) {
            echo "<script>alert('Registration Successful!'); window.location.href='login.php';</script>";
            exit();
        } else {
            die("Error: " . $stmt->error);
        }
        $stmt->close();
    } else {
        die("Error preparing insert statement: " . $conn->error);
    }

    $conn->close();
}?>





