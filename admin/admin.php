<?php
session_start();
include "../shared/config.php";
include "navbar.php"

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Website Admin Panel</title>
    <style>
        body {
            font-family: cursive;
            background-color: #f4f4f4;
            padding: 20px;
            margin-top: 120px;
            background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(203,88,235,0.6963118010876226) 1%, rgba(174,112,224,1) 73%, rgba(174,115,236,1) 100%, rgba(0,255,160,1) 100%, rgba(63,177,248,1) 100%); }

        h2 {
            text-align: center;

        }

        .category-container {
            width: 50%;
            /* Adjust the width as needed */
            /* margin: 0px auto; */
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .category-link {
            margin: 0px auto;
            display: block;
            color: #333;
            text-decoration: none;
            padding: 10px;
            margin: 5px auto;
            text-align: center;
            width: 300px;
            border-radius: 5px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            transition: background-color 0.3s, color 0.3s;
        }

        .category-link:hover {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(88, 235, 97, 0.6963118010876226) 0%, rgba(0, 255, 160, 1) 100%, rgba(63, 177, 248, 1) 100%, rgba(174, 115, 236, 1) 100%);
            color: #000;
        }

        h1 {
            text-align: center;
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



    <!-- <h2>Settings</h2>
    <ul>
        <li><a href="change_password.php">Change Password</a></li>
       
    </ul> -->
</body>

</html>