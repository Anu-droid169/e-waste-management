<?php
session_start();

// If not logged in, redirect to login page
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin.php");
    exit();
}

// Security: Prevent Session Hijacking
session_regenerate_id(true);

$admin_username = $_SESSION["admin_username"]; // Set admin username variable
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        .dashboard {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 320px;
        }
        .dashboard h2 {
            margin-bottom: 15px;
            color: #333;
        }
        .btn {
            display: block;
            padding: 12px;
            margin: 10px 0;
            background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn:hover {
            background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%);
            color: black;
        }
        .logout {
            background: linear-gradient(45deg, #ff4b2b, #ff416c);
        }
        .logout:hover {
            background: linear-gradient(45deg, #ff416c, #ff4b2b);
        }
        /* Responsive Design */
        @media screen and (max-width: 400px) {
            .dashboard {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="dashboard">
    <h2>Welcome, <?php echo htmlspecialchars($admin_username); ?>!</h2>
    <a href="view_products.php" class="btn">📦 View Products</a>
    <a href="invoice.php" class="btn">🧾 View Invoices</a>
    <a href="logout.php" class="btn logout">🚪 Logout</a>
</div>

</body>
</html>
