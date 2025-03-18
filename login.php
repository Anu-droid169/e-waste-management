<?php 
 session_start();

 $conn = new mysqli("localhost", "root", "", "e_waste_management");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN FORM</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    <style>
        #user-message {
            color: red;
            font-size: 14px;
        }

        /* General Styling */
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

        /* Login Container */
        .container {
            max-width: 250px;
            margin: 100px auto;
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
        input[type="password"],
        input[type="email"] {
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
            box-sizing: border-box;
            color: #ffffff;
            display: flex;
            font-size: 18px;
            justify-content: center;
            line-height: 1em;
            max-width: 100%;
            min-width: 140px;
            padding: 15px;
            text-decoration: none;
            user-select: none;
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

        /* Centered Link for Registration */
        .register-link, .home-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a, .home-link a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: color 0.3s;
        }

        .register-link a:hover, .home-link a:hover {
            color: black;
        }

        /* 3D Button Styling */
        .btn-3d {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            background: linear-gradient(145deg, #6a5acd, #483d8b);
            border-radius: 8px;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3), inset 2px 2px 5px rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease-in-out;
        }

        .btn-3d:hover {
            background: linear-gradient(145deg, #483d8b, #6a5acd);
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2), inset -2px -2px 5px rgba(255, 255, 255, 0.2);
        }

        .btn-3d:active {
            transform: translateY(3px);
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
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
                        if (xhr.responseText.trim() === "available") {
                            status.innerHTML = " Please register first";
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
    <section class="login-container">
        <div class="container">
            <h2>LOGIN FORM</h2>
            <form action="login1.php" method="POST">
                <label for="email">Email Id:</label>
                <input type="email" id="email" name="email" required onkeyup="checkEmail()">
                <div id="email-status"></div>
                <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <button class="btn" type="submit" name="login"><span>Login</span></button>
            </form>
            <p class="register-link">Don't have an account? <a href="registration.php">Register here</a></p>
            <p class="home-link">
                <a href="index.php" class="btn-3d">← Back to Home</a>
            </p>
        </div>
    </section>
</body>
</html>
