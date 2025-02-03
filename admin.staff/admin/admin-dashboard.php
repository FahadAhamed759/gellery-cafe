<?php
session_start();
include("../php/db-conn.php");
include("admin-session.php");
$user_data = check_login($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../pictures/logo/fevicon-logo.png">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Admin Dashboard</title>

    <style>

        h1 {
            font-size: 45px;
            margin-bottom: 30px;
            margin-left: 15px;
        }

        .group {
            display: flex;
            justify-content: space-evenly;

        }

        .button {
            background-color: #f4dfdf;
            padding: 50px;
            border-radius: 100px;
            font-size: 20px;
            color: black;
            font-weight: 500;
            margin-right: 10px;
            transition: 0.15s;
        }

        .button a {   
            color: black;
            text-decoration: none;      
        }

        .button:hover {
            border: 2px solid #E4080A;
          
        }
    </style>
</head>

<body>


    <nav class="sidebar" id="sidebar">
        <div class="sidebar-toggle" onclick="toggleSidebar()">
            
        </div>
        <a href="admin-dashboard.php">
        <img src="../pictures/icons/home1.png">
            <p>Home</p>
        </a>
        <a href="manage-user.php">
        <img src="../pictures/icons/user1.jpg">
            <p>Manage Users</p>
        </a>
        <a href="manage-food.php">
        <img src="../pictures/icons/food1.png">
            <p>Manage Foods</p>
        </a>
        <a href="manage-table-res.php">
        <img src="../pictures/icons/table1.jpg">
            <p>Manage Table Reservations</p>
        </a>
        <a href="manage-food-preorder.php">
        <img src="../pictures/icons/order1.png">
            <p>Manage Food Pre-Orders</p>
        </a>
        <a href="manage-message.php">
        <img src="../pictures/icons/message1.jpg">
            <p>Manage Messages</p>
        </a>
        <div class="logout-box">
            <a class="logout-button" href="admin-logout.php">
                <img src="../pictures/icons/logout1.jpg">
                <p>Logout</p>
            </a>
        </div>
    </nav>

    <main class="main-content">

        <h1>Admin Dashboard</h1>
        <div class="group">


            <a href="manage-user.php">
                <div class="button">Manage Users</div>
            </a>


            <a href="manage-food.php">
                <div class="button">Manage Foods</div>
            </a>

            <a href="manage-table-res.php">
                <div class="button">Manage Table Reservation</div>
            </a>

            <a href="manage-food-preorder.php">
                <div class="button">Manage Food Pre-Orders</div>
            </a>

            <a href="manage-message.php">
                <div class="button">Manage Messages</div>
            </a>
        </div>

    </main>

    <script src="../javascript/sidebar-minimize.js"></script>

</body>

</html>