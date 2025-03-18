<?php
session_start();
$conn = new mysqli("localhost", "root", "", "e_waste_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['book'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $computers = (int)$_POST['computers'];
    $laptops = (int)$_POST['laptops'];
    $monitors = (int)$_POST['monitors'];
    $mobilephone = (int)$_POST['mobilephone'];
    $collection_date = $conn->real_escape_string($_POST['collection_date']);
    $collection_time = $conn->real_escape_string($_POST['collection_time']);
    $special_instructions = $conn->real_escape_string($_POST['special_instructions']);

    // Insert into database
    $query = "INSERT INTO bookings (name, address, phone_number, computers, laptops, monitors, mobilephone, collection_date, collection_time, special_instructions) 
              VALUES ('$name', '$address', '$phone_number', '$computers', '$laptops', '$monitors', '$mobilephone', '$collection_date', '$collection_time', '$special_instructions')";

    if ($conn->query($query) === TRUE) {
        $last_id = $conn->insert_id;  // Get the last inserted ID
        $_SESSION["customer_id"] = $last_id; // Store ID in session
        header("Location: customer_view.php"); // Redirect to customer view page
        exit();
    } else {
        $_SESSION["message"] = "Error: " . $conn->error;
        header("Location: booking.php"); // Redirect back to the form
        exit();
    }
}

$conn->close();
?>
