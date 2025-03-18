<?php 
$conn = new mysqli("localhost", "root", "", "e_waste_management");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
            max-width: 300px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%); 
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }
        input[type="text"], 
        input[type="email"], 
        input[type="tel"], 
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Button Styling */
        .btn {
            align-items: center;
            background-image: linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);
            border: 0;
            border-radius: 8px;
            box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
            color: #ffffff;
            display: flex;
            font-size: 18px;
            justify-content: center;
            max-width: 100%;
            min-width: 140px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s;
            margin: 15px auto;
        }

        .btn span {
            background-color: rgb(5, 6, 45);
            padding: 12px 20px;
            border-radius: 6px;
            width: 100%;
            transition: 300ms;
        }

        .btn:hover span {
            background: none;
        }

        .btn:active {
            transform: scale(0.9);
        }

        /* Centered Link for Home */
        .home-link {
            text-align: center;
            margin-top: 10px;
        }

        .home-link a {
            padding: 12px 20px;
            font-size: 16px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2), inset -2px -2px 5px rgba(255, 255, 255, 0.2);
           text-decoration: none;
            color:white;
            font-weight: bold;
            transition: color 0.3s;
        }

        .home-link a:hover {
            color:black;
        }

        /* Email validation message */
        #email-status {
            color: red;
            font-size: 14px;
            text-align: left;
            margin-top: 5px;
        }

    </style>

    <script>
        function checkEmail() {
            let email = document.getElementById("email").value;
            let status = document.getElementById("email-status");

            if (email.length > 5) { // Only check if email is valid length
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "check_email.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText.trim() === "exists") {
                            status.innerHTML = " Email is already registered!";
                            status.style.color = "red";
                        } else {
                            status.innerHTML = ""; // Clear message if email is available
                        }
                    }
                };

                xhr.send("email=" + encodeURIComponent(email));
            } else {
                status.innerHTML = ""; // Clear message if email is empty
            }
        }
    </script>
</head>
<body>

    <div class="container">
        <h2>Registration Form</h2>
        <form action="db_connect.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email Id:</label>
            <input type="email" id="email" name="email" required onkeyup="checkEmail()">
            <div id="email-status"></div>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="electric-device">If you have any other Electronic devices?</label>
            <select id="electric-device" name="electric_device" required>
                <option value="">Select Yes or No</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>

            <button class="btn" type="submit" name="register"><span>register</span></button>
        </form>

        <!-- Back to Home Button -->
        <p class="home-link"><a href="index.php">← Back to Home</a></p>
    </div>

</body>
</html>