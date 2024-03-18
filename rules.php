<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rules</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .quiz-rules {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 100px;
         }

        .info-list {
            margin-top: 20px;
            text-align: left;
        }

        .info {
            margin-bottom: 10px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .button-container {
    margin-top: 20px; /* Adjust margin as needed */
}

        button:hover {
            background-color: #45a049;
        }

      
        @media screen and (max-width: 780px) {
            /* Adjust the max-width for smaller screens */
            .quiz-rules {
                max-width: 80%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        include("./shared/config.php");
        include("./shared/navbar.php");

        if (isset($_GET['quizID']) && isset($_GET['categoryID'])) {
            $quizID = $_GET['quizID'];
            $categoryID = $_GET['categoryID'];

            // Fetch quiz details
            $quizQuery = "SELECT Title FROM Quizzes WHERE QuizID = $quizID";
            $quizResult = $conn->query($quizQuery);
            
            if ($quizResult->num_rows > 0) {
                $quizData = $quizResult->fetch_assoc();
                $quizTitle = $quizData['Title'];
        ?>
        <div class="quiz-rules">
            <h1>Rules for <?php echo $quizTitle; ?> Quiz</h1>
            <hr>
            <div class="info-list">
                <div class="info">1. You will have only <span>120 seconds</span> to play the quiz.</div>
                <div class="info">2. Each quiz contains 10 questions.</div>
                <div class="info">3.The timer starts as soon as the question is displayed.</div>
                <div class="info">4. You can't exit from the Quiz while you're playing.</div>
                <div class="info">5. You'll get points on the basis of your correct answers.</div>
            </div>
            <hr>
            <div class="button-container">
        <button onclick="window.location.href='questions.php?quizID=<?php echo $quizID; ?>&categoryID=<?php echo $categoryID; ?>'">Start Quiz</button>
    </div>
        </div>
        <?php
            } else {
                echo "Quiz not found.";
            }
        } else {
            echo "Invalid request.";
        }
        ?>
    </div>
</body>
</html>
