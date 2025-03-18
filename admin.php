<?php 
session_start();

// If already logged in, redirect to admin dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin_dashboard.php");
    exit;
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            background: #f4f4f4;
            margin: 0;
        }
        .login-box {
            background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 320px;
            color: white;
        }
        .login-box h2 {
            margin-bottom: 15px;
            font-size: 22px;
        }
        input {
            padding: 12px;
            margin: 10px 0;
            width: 90%;
            border: none;
            border-radius: 5px;
            outline: none;
            text-align: center;
            font-size: 16px;
            box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
        .login-btn {
            background: linear-gradient(45deg, #e81cff, #40c9ff);
            color: white;
            border: none;
            padding: 12px;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3);
        }
        .login-btn:hover {
            background: linear-gradient(to right, #1E90FF, #4682B4);
            transform: translateY(-3px);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
        }
        .error {
            color: yellow;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Admin Login</h2>

    <!-- Display Error Message -->
    <?php if (isset($_GET['error']) && !empty($_GET['error'])): ?>
        <p class="error"><?php echo htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>

    <form action="process_admin_login.php" method="POST">
        <input type="text" name="username" placeholder="Admin Username" required autocomplete="off"><br>
        <input type="password" name="password" placeholder="Password" required autocomplete="off"><br>
        <button type="submit" class="login-btn">Login</button>
    </form>
</div>

</body>
</html>
