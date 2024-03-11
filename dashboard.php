<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding-bottom: 50px;
        margin-top: 250px !important;
    }
    .container {
        position: relative;
        width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .container .dashboard-icon {
        position: absolute;
        top: 10px; /* Adjust the top position */
        right: 10px; /* Adjust the right position */
        color: #007bff;
        width: 20px; /* Adjust icon width */
        height: 20px; /* Adjust icon height */
    }
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }
    .section {
        margin-bottom: 40px;
    }
    .section h2 {
        margin-bottom: 10px;
    }
    .dashboard-link {
        display: block;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        text-align: center;
    }
    .dashboard-link:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <?php
    session_start();
    include "./shared/navbar.php";

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID']; // Initialize $userID if the session variable is set
} else {
    // Handle case where userID session variable is not set
    echo "User ID is not set";
}
?>

<div class="container">
    <img class="dashboard-icon" src="https://img.icons8.com/color/48/000000/dashboard-layout.png"/> <!-- Icon for dashboard -->
    <h1>User Dashboard</h1>

    <div class="section">
        <a class="dashboard-link" href="leaderboard.php">Leaderboard</a>
    </div>

    <div class="section">
        <a class="dashboard-link" href="user_score.php?user=<?php echo $userID; ?>">User Score</a>
    </div>
</div>
</body>
</html>
