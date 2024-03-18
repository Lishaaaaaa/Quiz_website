<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Quiz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            margin-top: 40px;
            /* Adjust margin top to accommodate timeUpMessage */
        }

        #timeUpMessage {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #dc3545;
            color: white;
            padding: 10px;
            text-align: center;
            display: none;
            z-index: 100;
            width: 300px;
            /* Adjust the width as needed */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        #timer-container {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 100px;
            height: 100px;
            padding: 20px;
            background-color: #007bff;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .circle {
            fill: none;
            stroke-width: 10;
            transform: rotate(-90deg);
            transform-origin: center;
        }

        #timer-foreground {
            stroke: #007bff;
            stroke-dasharray: 282.74;
            stroke-dashoffset: 282.74;
            animation: countdown 60s linear infinite;
        }

        @keyframes countdown {
            0% {
                stroke-dashoffset: 282.74;
                /* Full circle */
            }

            100% {
                stroke-dashoffset: 0;
                /* No circle (empty) */
            }
        }

        #timer-number {
            fill: white;
            font-family: Arial, sans-serif;
            font-size: 40px;
            text-anchor: middle;
            dominant-baseline: middle;
        }

        .content {
            margin-top: 20px;
            margin-right: 220px;
            /* Adjust margin right to accommodate timer */
        }

        .question-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;

        }

        .question-image img {
            margin-bottom: 10px;
            height: 70px;
            width: 75px;
            /* Set width to 100 pixels */
            display: block;
            /* Ensure the image is block-level element */
            /*margin: 0 auto; Center the image horizontally */
        }

        .answer-option {
            display: block;
            margin-bottom: 10px;
        }

        .answer-label {
            font-weight: normal;
            margin-left: 10px;
        }

        @media screen and (max-width: 780px) {
            #timer-container {
                border-radius: 50%;
                z-index: 999;
            }

            .content {
                margin-right: 0;
                /* Remove the right margin to make the content full-width */
            }

            .question-container {
                margin-right: 0;
                /* Remove margin on smaller screens */
                margin-top: 50px;
            }

            .question-image img {
                width: 50%;
                
                /* Make the image width 100% of its container */
                height: auto;
                /* Ensure the aspect ratio is maintained */
            }
        }
    </style>
    <script>
        window.onload = function() {
            // Set the countdown time in minutes
            var countdownMinutes = 2;
            var secondsRemaining = countdownMinutes * 60;
            var timerNumber = document.getElementById('timer-number');
            var submitButton = document.getElementById('finishButton');

            // Function to update the timer display
            function updateTimer() {
                var minutes = Math.floor(secondsRemaining / 60);
                var seconds = secondsRemaining % 60;
                var timerText = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
                timerNumber.textContent = timerText;
                secondsRemaining--;

                // Check if time has run out
                if (secondsRemaining < 0) {
                    clearInterval(timerInterval);
                    timerNumber.textContent = "02:00";
                    displayTimeUpMessage();
                    submitButton.disabled = true; // Disable the submit button
                }
            }

            // Update the timer every second
            var timerInterval = setInterval(updateTimer, 1000);

            // Function to display time-up message
            function displayTimeUpMessage() {
                var timeUpMessage = document.getElementById('timeUpMessage');
                timeUpMessage.textContent = "Time's up!";
                timeUpMessage.style.display = 'block';
            }
        };
    </script>
</head>

<body>
    <div id="timeUpMessage"></div>
    <div id="timer-container">
        <svg width="100%" height="100%" viewBox="-100 -100 200 200">
            <!-- Background Circle -->
            <circle id="timer-background" class="circle" r="80"></circle>
            <!-- Foreground Circle -->
            <circle id="timer-foreground" class="circle" r="80"></circle>
            <!-- Timer Number -->
            <text id="timer-number" x="0" y="5">02:00</text>
        </svg>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                include("./shared/config.php");


                // Check if the user is logged in
                if (!isset($_SESSION['userID'])) {
                    // If not logged in, redirect to login page

                    header("Location: login.php?redirect=questions.php");
                    exit();
                }

                // Fetch quiz ID from URL
                $quizID = isset($_GET['quizID']) ? $_GET['quizID'] : null;
                // Fetch category ID from URL
                $categoryID = isset($_GET['categoryID']) ? $_GET['categoryID'] : null;

                // Fetch current question ID from URL
                $questionID = isset($_GET['questionID']) ? $_GET['questionID'] : null;

                // If no question ID is provided, start from the first question
                if ($questionID === null) {
                    // Fetch the first question ID for the quiz
                    $first_question_sql = "SELECT MIN(QuestionID) AS FirstQuestionID FROM Questions WHERE QuizID = ?";
                    $stmt = $conn->prepare($first_question_sql);
                    $stmt->bind_param("i", $quizID);
                    $stmt->execute();
                    $first_question_result = $stmt->get_result();

                    if ($first_question_result->num_rows > 0) {
                        $first_question_row = $first_question_result->fetch_assoc();
                        $questionID = $first_question_row['FirstQuestionID'];
                    } else {
                        echo "No questions found for the quiz.";
                        exit; // Exit the script as there are no questions for the quiz
                    }
                }

                // Fetch quiz details from the database
                $quiz_sql = "SELECT * FROM Quizzes WHERE QuizID = ?";
                $stmt = $conn->prepare($quiz_sql);
                $stmt->bind_param("i", $quizID);
                $stmt->execute();
                $quiz_result = $stmt->get_result();

                if ($quiz_result->num_rows > 0) {
                    $quiz_row = $quiz_result->fetch_assoc();
                    $quiz_title = $quiz_row['Title'];

                    // Fetch all questions for the given quiz ID
                    $question_sql = "SELECT * FROM Questions WHERE QuizID = ?";
                    $stmt = $conn->prepare($question_sql);
                    $stmt->bind_param("i", $quizID);
                    $stmt->execute();
                    $question_result = $stmt->get_result();

                    // Check if there are questions
                    if ($question_result->num_rows > 0) {
                        // Display questions
                        echo "<form id='quizForm' action='process_response.php' method='post' class='content'>";
                        echo "<input type='hidden' name='quizID' value='" . $quizID . "'>";
                        echo "<input type='hidden' name='categoryID' value='" . $categoryID . "'>";
                        while ($question_row = $question_result->fetch_assoc()) {
                            $question_text = $question_row['Question'];
                            $question_id = $question_row['QuestionID'];
                            $imgpath = $question_row['imgpath'];

                            echo "<div class='question-container'>";
                            echo "<label>" . $question_text . "</label><br>";

                            if (!empty($imgpath)) {
                                echo "<div class='question-image'>";
                                echo "<img src='$imgpath' alt='Question Image'>";
                                echo "</div>";
                            }

                            echo "<div class='answer-option'>";
                            echo "<input type='radio' id='answer_option_$question_id' name='responses[$question_id][answer]' value='$question_row[Option1]' required>";
                            echo "<label class='answer-label' for='answer_option_$question_id'>" . $question_row['Option1'] . "</label><br>";
                            echo "</div>";
                            echo "<div class='answer-option'>";
                            echo "<input type='radio' id='answer_option_$question_id' name='responses[$question_id][answer]' value='$question_row[Option2]' required>";
                            echo "<label class='answer-label' for='answer_option_$question_id'>" . $question_row['Option2'] . "</label><br>";
                            echo "</div>";
                            echo "<div class='answer-option'>";
                            echo "<input type='radio' id='answer_option_$question_id' name='responses[$question_id][answer]' value='$question_row[Option3]' required>";
                            echo "<label class='answer-label' for='answer_option_$question_id'>" . $question_row['Option3'] . "</label><br>";
                            echo "</div>";
                            echo "<div class='answer-option'>";
                            echo "<input type='radio' id='answer_option_$question_id' name='responses[$question_id][answer]' value='$question_row[Option4]' required>";
                            echo "<label class='answer-label' for='answer_option_$question_id'>" . $question_row['Option4'] . "</label><br>";
                            echo "</div>";
                            echo "</div>";
                        }

                        // Add submit button
                        echo "<input id='finishButton' class='btn btn-primary' type='submit' name='submit' value='Finish'>";
                        echo "</form>";
                    } else {
                        echo "No questions found for the quiz.";
                    }
                } else {
                    echo "Invalid quiz.";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>

</html>