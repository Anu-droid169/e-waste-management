<?php 
$conn = new mysqli("localhost", "root", "", "e_waste_management");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Us</title>
    <style>
        /* General Page Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 600px;
            background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(38, 219, 243, 0.85);
            text-align: center;
            margin-bottom: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        /* Fancy Button Styling */
        .btn {
            background: linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);
            border: none;
            padding: 12px 24px;
            margin: 5px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            text-shadow: 1px 1px 2px linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);
            transition: all 0.3s ease;
            box-shadow: 0 5px 8px rgba(94, 124, 199, 0.83);
        }

        .btn:hover {
            background: linear-gradient(to bottom, #22a0a8, #44d1d5);
            box-shadow: 0 6px 12px rgba(216, 145, 189, 0.95);
        }

        /* Text Area */
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Back to Home Button */
        .home-button {
            display: inline-block;
            text-decoration: none;
            background: linear-gradient(to bottom, #5aa7e0, #3182d4);
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            padding: 12px 24px;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            text-transform: uppercase;
            margin-top: 20px;
        }

        .home-button:hover {
            background: linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);
            transform: translateY(-2px);
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.3);
        }

        .home-button:active {
            transform: translateY(2px);
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Rate Our Service</h1>
        <form method="POST" action="submit.php">
            <input type="hidden" id="rating" name="rating">

            <button type="button" class="btn" onclick="rate(1)">Terrible 😠</button>
            <button type="button" class="btn" onclick="rate(2)">Bad 😞</button>
            <button type="button" class="btn" onclick="rate(3)">Okay 🙂</button>
            <button type="button" class="btn" onclick="rate(4)">Good 😊</button>
            <button type="button" class="btn" onclick="rate(5)">Excellent 😍</button>

            <p id="feedback"></p>

            <h2>Customer Feedback</h2>
            <label for="comments">Comments:</label><br>
            <textarea id="comments" name="comments" rows="4"></textarea><br><br>
            
            <button type="submit" class="btn"><span>Submit Feedback</span></button>
        </form>
    </div>

    <!-- Back to Home Button at the Bottom -->
    <a href="index.php" class="home-button">← Back to Home</a>

    <script>
        function rate(value) {
            document.getElementById("rating").value = value;
            document.getElementById("feedback").innerText = "Thank you for rating us " + value + " stars!";
        }
    </script>

</body>
</html>
