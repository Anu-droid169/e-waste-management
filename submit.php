<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "e_waste_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = isset($_POST["rating"]) ? intval($_POST["rating"]) : 0;
    $comments = isset($_POST["comments"]) ? trim($_POST["comments"]) : "";

    // Validate rating
    if ($rating < 1 || $rating > 5) {
        echo "<script>alert('Invalid rating! Please select a number between 1 and 5.'); window.location.href='index.php';</script>";
        exit();
    }

    // Validate comments
    if (empty($comments)) {
        echo "<script>alert('Please enter a comment!'); window.location.href='index.php';</script>";
        exit();
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO feedback (rating, comments) VALUES (?, ?)");
    $stmt->bind_param("is", $rating, $comments);

    // Execute and check result
    if ($stmt->execute()) {
        echo "<script>alert('Thank you! Your feedback has been recorded.'); window.location.href='index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error saving feedback! Please try again.'); window.location.href='index.php';</script>";
        exit();
    }

    // Close connection
    $stmt->close();
}

$conn->close();
?>
