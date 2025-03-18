<?php
session_start();
$conn = new mysqli("localhost", "root", "", "e_waste_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product ID from session
if (!isset($_SESSION["product_id"])) {
    echo "No product found.";
    exit();
}

$product_id = $_SESSION["product_id"];
$query = "SELECT * FROM products WHERE id = '$product_id'";
$result = $conn->query($query);
$product = $result->fetch_assoc();

if (!$product) {
    echo "Product details not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Product Details</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f8f8; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center; }
        h2 { color: #333; }
        p { font-size: 18px; }
        .product-image { width: 100%; max-width: 300px; border-radius: 5px; margin: 10px 0; }
        .btn { display: block; margin-top: 20px; padding: 10px; background: #5b42f3; color: white; text-decoration: none; border-radius: 5px; text-align: center; }
        .btn:hover { background: #40c9ff; }
    </style>
</head>
<body>

<div class="container">
    <h2>Your Submitted Product</h2>
    <p><strong>Product ID:</strong> <?= htmlspecialchars($product["id"]) ?></p>
    <p><strong>Category:</strong> <?= htmlspecialchars($product["category"]) ?></p>
    <img src="uploads/<?= htmlspecialchars($product["image"]) ?>" class="product-image" alt="Product Image">
    <p><strong>Estimated Price:</strong> $<?= htmlspecialchars($product["price"]) ?></p>
    <p><strong>Details:</strong> <?= htmlspecialchars($product["details"]) ?></p>
    <a href="index.php" class="btn">Back to Home</a>
</div>

</body>
</html>

<?php
$conn->close();
?>
