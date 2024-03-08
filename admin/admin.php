<?php
session_start();
include "../shared/config.php";
include "./navbar.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Website Admin Panel</title>
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
    <h1>Welcome to the Quiz Website Admin Panel</h1>
    
    <h2>Manage Quizzes</h2>
    <ul>
        <li><a class='category-link' href="create_quiz.php">Create New Quiz</a></li>
        <li><a class='category-link' href="edit_quiz.php">Edit Existing Quiz</a></li>
        <li><a class='category-link' href="delete_quiz.php">Delete Quiz</a></li>
    </ul>
    
    <h2>Manage Users</h2>
    <ul>
        <li><a class='category-link' href="view_users.php">View Users</a></li>
    </ul>
    
    <h2>Statistics</h2>
    <ul>
        <li><a class='category-link' href="quiz_statistics.php">Quiz Statistics</a></li>
        <li><a class='category-link' href="user_statistics.php">User Statistics</a></li>
    </ul>
    
    <!-- <h2>Settings</h2>
    <ul>
        <li><a href="change_password.php">Change Password</a></li>
       
    </ul> -->
</body>
</html>
