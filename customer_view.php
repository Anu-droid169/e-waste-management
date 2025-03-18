<?php
session_start();
$conn = new mysqli("localhost", "root", "", "e_waste_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get customer ID from session
if (!isset($_SESSION["customer_id"])) {
    echo "No booking found.";
    exit();
}

$customer_id = $_SESSION["customer_id"];
$query = "SELECT * FROM bookings WHERE id = '$customer_id'";
$result = $conn->query($query);
$booking = $result->fetch_assoc();

if (!$booking) {
    echo "Booking details not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Booking Details</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f8f8; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #333; }
        p { font-size: 18px; }
        .btn { display: block; text-align: center; margin-top: 20px; padding: 10px; background: #5b42f3; color: white; text-decoration: none; border-radius: 5px; }
        .btn:hover { background: #40c9ff; }
    </style>
</head>
<body>

<div class="container">
    <h2>Your Booking Details</h2>
    <p><strong>Order ID:</strong> <?= htmlspecialchars($booking["id"]) ?></p>
    <p><strong>Name:</strong> <?= htmlspecialchars($booking["name"]) ?></p>
    <p><strong>Address:</strong> <?= htmlspecialchars($booking["address"]) ?></p>
    <p><strong>Phone:</strong> <?= htmlspecialchars($booking["phone_number"]) ?></p>
    <p><strong>Computers:</strong> <?= htmlspecialchars($booking["computers"]) ?></p>
    <p><strong>Laptops:</strong> <?= htmlspecialchars($booking["laptops"]) ?></p>
    <p><strong>Monitors:</strong> <?= htmlspecialchars($booking["monitors"]) ?></p>
    <p><strong>Mobile Phones:</strong> <?= htmlspecialchars($booking["mobilephone"]) ?></p>
    <p><strong>Collection Date:</strong> <?= date("d-m-Y", strtotime($booking["collection_date"])) ?></p>
    <p><strong>Collection Time:</strong> <?= htmlspecialchars($booking["collection_time"]) ?></p>
    <p><strong>Special Instructions:</strong> <?= htmlspecialchars($booking["special_instructions"]) ?></p>
    <a href="index.php" class="btn">Back to Home</a>
</div>

</body>
</html>

<?php
$conn->close();
?>
