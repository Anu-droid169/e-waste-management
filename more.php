<?php 
$conn = new mysqli("localhost", "root", "", "e_waste_management");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Product Submission</title>
    <style>
                body {
            font-family: Arial, sans-serif;
            background: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }

        .container {
            max-width: 400px;
            padding: 15px;
            background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .section {
            margin-bottom: 16px;
            padding: 10px;
            backgroun:linear-gradient(45deg, #e81cff, #40c9ff);
            border-radius: 5px;
        }
        select, input, textarea {
            width: 100%;
            padding: 6px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .btn {
            background: linear-gradient(45deg, #e81cff, #40c9ff);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
        }
        .btn:hover {
            background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
        }
        .button-group {
            margin-top: 10px;
            text-align: center;
        }
        .button {
            display: inline-block;
            background: linear-gradient(45deg, #e81cff, #40c9ff);
            ;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }
        .button:hover {
            background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Submit Your E-Waste Product</h2>
    <form method="POST" action="more1.php"  enctype="multipart/form-data">
        <div class="section">
            <label>Category:</label>
            <select name="category" required>
                <option value="Computers">Computers</option>
                <option value="Laptops">Laptops</option>
                <option value="Monitors">Monitors</option>
                <option value="Mobile Phones">Mobile Phones</option>
                <option value="Bluetooth">Bluetooth</option>
                <option value="Wifi">Wifi</option>
                <option value="Hard Drives (HDD)">Hard Drives (HDD)</option>
                <option value="Solid-State Drives (SSD)">Solid-State Drives (SSD)</option>
                <option value="Graphics Cards (GPU)">Graphics Cards (GPU)</option>
                <option value="RAM (Memory)">RAM (Memory)</option>
                <option value="Power Supplies (PSU)">Power Supplies (PSU)</option>
                <option value="Power Banks">Power Banks</option>
                <option value="Smartwatches">Smartwatches</option>
                <option value="Feature Phones">Feature Phones</option>
                <option value="LAN Cables">LAN Cables</option>
                <option value="Fiber Optic Cables">Fiber Optic Cables</option>
                <option value="VPN Routers">VPN Routers</option>
                <option value="Projectors">Projectors</option>
                <option value="Digital Media Players">Digital Media Players</option>
            </select>
        </div>
        <div class="section">
            <label>Upload Product Image:</label>
            <input type="file" name="photo" accept="image/*" required>
        </div>
        <div class="section">
            <label>Estimated Price:</label>
            <input type="number" name="price" placeholder="Enter price" required>
        </div>
        <div class="section">
            <label>Product Details:</label>
            <textarea name="details" rows="3" placeholder="Describe your product..." required></textarea>
        </div>
        <button type="submit" class="btn">Submit Product</button>
    </form>
    
    <div class="button-group">
        <a href="index.php" class="button">← Back to Home</a>
    </div>
</div>

</body>
</html>
