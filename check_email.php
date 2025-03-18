<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('db_connect.php');

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = trim($_POST['email']);
    $email = mysqli_real_escape_string($conn, $email);

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("SQL Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        echo "exists"; // Email found
    } else {
        echo "available"; // No email found
    }

    mysqli_close($conn);
} else {
    echo "No email received!";
}
?>