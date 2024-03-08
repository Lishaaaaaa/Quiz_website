<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Categories</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }
    .category-container {
        width: 50%; /* Adjust the width as needed */
        margin: 0 auto; /* Center the container horizontally */
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .category-link {
        display: block;
        color: #333;
        text-decoration: none;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        transition: background-color 0.3s, color 0.3s;
    }
    .category-link:hover {
        background-color: #e0e0e0;
        color: #000;
    } 
</style>
</head>
<body>
<div class="category-container">
<?php
session_start();
include("./shared/config.php");
include("./shared/navbar.php");

$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;

// Display categories
$sql = "SELECT * FROM Categories";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<a class='category-link' href='quizzes.php?category=" . $row['CategoryID'] . "'>" . $row['CategoryName'] . "</a><br>";
}
$conn->close();
?>
</div>
</body>
</html>
