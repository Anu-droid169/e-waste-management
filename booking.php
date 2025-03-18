<?php 
session_start();
$conn = new mysqli("localhost", "root", "", "e_waste_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-waste Collection Booking</title>
    <style>
        body { font-family: Arial, sans-serif; background: white; margin: 0; padding: 20px; }
        form { background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%); padding: 15px; border-radius: 10px; max-width: 330px; margin: auto; box-shadow: 0 0 10px rgba(79, 201, 209, 0.89); }
        h2, h3 { text-align: center; }
        label { display: block; font-weight: bold; margin: 10px 0 5px; }
        input, textarea, select { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        .btn { display: block; width: 100%; background: linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb); color: rgb(196, 234, 238); padding: 15px; border: none; border-radius: 8px; font-size: 18px; cursor: pointer; transition: all 0.3s; text-align: center; }
        .btn:hover { background: linear-gradient(45deg, #e81cff, #40c9ff); }
        .home-link { text-align: center; margin-top: 20px; }
        .home-link a { color: white; text-decoration: none; font-weight: bold; padding: 10px 20px; background: linear-gradient(to bottom, #87CEEB, #5BA4CF); border: none; border-radius: 5px; box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.2); display: inline-block; transition: all 0.2s ease-in-out; }
        .home-link a:hover { text-decoration: underline; background: linear-gradient(45deg, #e81cff, #40c9ff); box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.3); transform: translateY(2px); }
        .more-btn { width: auto; background: linear-gradient(144deg, #ffaf40, #ffb63f 50%, #ffeb3b); color: black; padding: 10px; font-size: 18px; cursor: pointer; transition: all 0.3s; border-radius: 5px; border: none; }
        .more-btn:hover { background: linear-gradient(45deg, #e81cff, #40c9ff); }
    </style>
</head>
<body>

<?php
// Display session message (if any)
if (isset($_SESSION["message"])) {
    echo "<script>alert('" . addslashes($_SESSION["message"]) . "');</script>";
    unset($_SESSION["message"]); // Clear the message after showing it
}
?>

<h2>Welcome to the Booking Page</h2>

<form method="POST" action="handler.php">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="address">Address:</label>
    <input type="text" name="address" required><br>

    <label for="phone_number">Phone Number:</label>
    <input type="text" name="phone_number" required><br>

    <label>Computers:</label>
    <input type="number" name="computers" min="0" value="0"><br>

    <label>Laptops:</label>
    <input type="number" name="laptops" min="0" value="0"><br>

    <label>Monitors:</label>
    <input type="number" name="monitors" min="0" value="0"><br>

    <label>Mobile Phones:</label>
    <input type="number" name="mobilephone" min="0" value="0"><br>

    <label for="collection_date">Collection Date:</label>
    <input type="date" id="collection_date" name="collection_date" required><br>

    <label for="collection_time">Collection Time:</label>
    <input type="time" name="collection_time" required><br>

    <label for="special_instructions">Special Instructions:</label>
    <textarea name="special_instructions"></textarea><br>

    <button type="button" class="btn more-btn" onclick="redirectToMorePage()">More</button>
    <button type="submit" name="book" class="btn">Book Collection</button>
    <p class="home-link"><a href="index.php">Back to Home</a></p>
</form>

<script>
    function redirectToMorePage() {
        window.location.href = 'more.php';
    }

    document.addEventListener("DOMContentLoaded", function () {
        let dateInput = document.getElementById("collection_date");
        
        dateInput.addEventListener("change", function () {
            let date = new Date(this.value);
            let formattedDate = ("0" + date.getDate()).slice(-2) + "-" + 
                                ("0" + (date.getMonth() + 1)).slice(-2) + "-" + 
                                date.getFullYear();
            alert("Selected Date: " + formattedDate);
        });
    });
</script>

</body>
</html>
