<?php
session_start();
$conn = new mysqli("localhost", "root", "", "e_waste_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check if user exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];

            // Redirect to booking page after successful login
            header("Location: booking.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid password!";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "No account found with this email!";
        header("Location: login.php");
        exit();
    }
}
?>

