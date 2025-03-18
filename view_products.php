<?php
session_start();
$conn = new mysqli("localhost", "root", "", "e_waste_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Fetch all bookings
$bookings = [];
$stmt = $conn->prepare("SELECT * FROM bookings");
if ($stmt === false) {
    die("SQL Error: " . $conn->error);
}
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $bookings[] = $row;
}
$stmt->close();

// ✅ Fetch all products
$products = [];
$stmt = $conn->prepare("SELECT * FROM products");
if ($stmt === false) {
    die("SQL Error: " . $conn->error);
}
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bookings & Products</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f8f8; margin: 0; padding: 20px; text-align: center; }
        .container { width: 90%; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin-bottom: 20px; }
        h2 { color: #333; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #5b42f3; color: white; }
        .btn { display: inline-block; margin-top: 20px; padding: 10px 15px; background: #5b42f3; color: white; text-decoration: none; border-radius: 5px; }
        .btn:hover { background: #40c9ff; }
        .product-image { width: 100px; border-radius: 5px; }
        .btn-container { margin-top: 20px; }
        @media print { .btn-container { display: none; } }
    </style>
</head>
<body>

<!-- ✅ All Bookings Table -->
<div class="container">
    <h2>All Bookings</h2>
    <?php if (!empty($bookings)): ?>
        <table>
            <tr>
                <th>Booking ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Computers</th>
                <th>Laptops</th>
                <th>Monitors</th>
                <th>Mobile Phones</th>
                <th>Collection Date</th>
                <th>Collection Time</th>
                <th>Special Instructions</th>
            </tr>
            <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?= htmlspecialchars($booking["id"]) ?></td>
                    <td><?= htmlspecialchars($booking["name"]) ?></td>
                    <td><?= htmlspecialchars($booking["address"]) ?></td>
                    <td><?= htmlspecialchars($booking["phone_number"]) ?></td>
                    <td><?= htmlspecialchars($booking["computers"]) ?></td>
                    <td><?= htmlspecialchars($booking["laptops"]) ?></td>
                    <td><?= htmlspecialchars($booking["monitors"]) ?></td>
                    <td><?= htmlspecialchars($booking["mobilephone"]) ?></td>
                    <td><?= htmlspecialchars($booking["collection_date"]) ?></td>
                    <td><?= htmlspecialchars($booking["collection_time"]) ?></td>
                    <td><?= htmlspecialchars($booking["special_instructions"]) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No bookings found.</p>
    <?php endif; ?>
</div>

<!-- ✅ All Submitted Products Table (Moved Below) -->
<div class="container">
    <h2>All Submitted Products</h2>
    <?php if (!empty($products)): ?>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Category</th>
                <th>Image</th>
                <th>Estimated Price</th>
                <th>Details</th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product["id"]) ?></td>
                    <td><?= htmlspecialchars($product["category"]) ?></td>
                    <td><img src="uploads/<?= htmlspecialchars($product["image"]) ?>" class="product-image" alt="Product Image"></td>
                    <td>$<?= htmlspecialchars($product["price"]) ?></td>
                    <td><?= htmlspecialchars($product["details"]) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No product submissions found.</p>
    <?php endif; ?>
</div>

<div class="btn-container">
    <button onclick="window.print()" class="btn">Print</button>
    <a href="logout.php" class="btn">Logout</a>
</div>

</body>
</html>
