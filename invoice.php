<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin.php?error=Unauthorized access!");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Waste Collection & Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
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
            background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            text-align: center;
            margin-bottom: 25px;
            color: white;
        }
        .section {
            border: 1px solid black;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background: white;
            color: black;
            text-align: left;
        }
        input, textarea, select {
            width: 60%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        .submit-button {
            background: linear-gradient(45deg, #e81cff, #40c9ff);
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3);
        }
        .submit-button:hover {
            background: linear-gradient(to right, #1E90FF, #4682B4);
            transform: translateY(-3px);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
        }
        .logout-btn {
            display: inline-block;
            background: linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background 0.3s, transform 0.2s;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3);
            border: none;
            cursor: pointer;
        }
        .logout-btn:hover {
            background: #555;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <!-- Invoice Form Section -->
    <div class="container">
        <h1>E-Waste Collection & Payment</h1>

        <form action="receip.php" method="POST">
            <div class="section">
                <h2>Customer Information</h2>
                <label for="customerName">Customer Name:</label>
                <input type="text" id="customerName" name="customerName" required autocomplete="off"><br>

                <label for="collectedItems">Collected Items:</label>
                <textarea id="collectedItems" name="collectedItems" required></textarea><br>

                <label for="totalAmount">Total Amount (₹):</label>
                <input type="number" id="totalAmount" name="totalAmount" required>
            </div>

            <div class="section">
                <h2>Payment Options</h2>
                <label for="paymentMethod">Select Payment Method:</label>
                <select id="paymentMethod" name="paymentMethod" required>
                    <option value="" disabled selected>-- Choose Payment Method --</option>
                    <option value="Cash">Cash</option>
                    <option value="Google Pay">Google Pay</option>
                    <option value="Paytm">Paytm</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
            </div>

            <button type="submit" class="submit-button">Submit</button>
        </form>

        <!-- Logout Button -->
        <p>
            <a href="logout.php" class="logout-btn">← Logout</a>
        </p>
    </div>

</body>
</html>
