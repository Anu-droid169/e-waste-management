<?php
session_start();
$conn = new mysqli("localhost", "root", "", "e_waste_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST["category"];
    $price = $_POST["price"];
    $details = $_POST["details"];

    // Image upload handling
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $image_name = basename($_FILES["photo"]["name"]);
    $target_file = $target_dir . $image_name;

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        // Insert into database using prepared statements
        $stmt = $conn->prepare("INSERT INTO products (category, image, price, details) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $category, $image_name, $price, $details);
        
        if ($stmt->execute()) {
            $_SESSION["product_id"] = $conn->insert_id; // Store product ID in session
            header("Location: product_details.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "File upload failed.";
    }
}

$conn->close();
?>
<h2>Your Submitted Products</h2>

<?php
$productQuery = "SELECT * FROM products WHERE customer_id = '$customer_id'";
$productResult = $conn->query($productQuery);

if ($productResult->num_rows > 0) {
    while ($product = $productResult->fetch_assoc()) {
        echo "<div class='container'>";
        echo "<p><strong>Category:</strong> " . htmlspecialchars($product["category"]) . "</p>";
        echo "<p><strong>Estimated Price:</strong> $" . htmlspecialchars($product["price"]) . "</p>";
        echo "<p><strong>Details:</strong> " . htmlspecialchars($product["details"]) . "</p>";
        echo "<img src='uploads/" . htmlspecialchars($product["image"]) . "' width='200' alt='Product Image'>";
        echo "</div>";
    }
} else {
    echo "<p>No products submitted yet.</p>";
}
?>
