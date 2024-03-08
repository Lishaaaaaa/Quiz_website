<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <style>
        #timer {
            text-align: center;
            font-size: larger;
            font-style: italic;
        }
    
    </style>
    <script>
        window.onload = function() {
            // Set the countdown time in minutes
            var countdownMinutes = 1;
            var secondsRemaining = countdownMinutes * 60;
            var timerDisplay = document.getElementById('timer');
            var timeUpMessage = document.getElementById('timeUpMessage');
            var form = document.getElementById('quizForm');
            var questionContainers = document.querySelectorAll('.question-container');

            // Function to update the timer display
            function updateTimer() {
                var minutes = Math.floor(secondsRemaining / 60);
                var seconds = secondsRemaining % 60;
                timerDisplay.innerHTML = minutes + 'm ' + seconds + 's';
                secondsRemaining--;

                // Check if time has run out
                if (secondsRemaining < 0) {
                    clearInterval(timerInterval);
                    // Display time up message
                    timeUpMessage.innerHTML = "Time's up!";
                    // Disable further interaction with questions
                    questionContainers.forEach(function(container) {
                        container.style.display = 'none';
                    });
                    // Submit the quiz form after a short delay
                    setTimeout(function() {
                        form.submit();
                    }, 1000);
                }
            }

            // Update the timer every second
            var timerInterval = setInterval(updateTimer, 1000);
        };
    </script>
</head>
<body>
<?php
session_start();
include("./shared/config.php");
//include("./shared/navbar.php");

// Check if the user is logged in
if (!isset($_SESSION['userID'])) {
    // If not logged in, redirect to login page
    header("Location: login.php?redirect=questions.php");
    exit();
}

// Fetch quiz ID from URL
$quizID = isset($_GET['quizID']) ? $_GET['quizID'] : null;
// Fetch category ID from URL
$categoryID= isset($_GET['categoryID']) ? $_GET['categoryID'] : null;

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
        echo "<form id='quizForm' action='process_response.php' method='post'>";
        echo "<input type='hidden' name='quizID' value='" . $quizID . "'>";
        echo "<input type='hidden' name='categoryID' value='" . $categoryID . "'>";
        // Add timer display
        echo "<div id='timer'>1m 0s</div>";
        while ($question_row = $question_result->fetch_assoc()) {
            $question_text = $question_row['QuestionText'];
            $question_id = $question_row['QuestionID'];
          
            echo "<input type='hidden' name='responses[$question_id][question]' value='" . $question_text . "'>";
            echo "<div class='question-container'>";
            echo "<label>" . $question_text . "</label><br>";
            echo "<label><input type='radio' name='responses[$question_id][answer]' value='$question_row[Option1]' required>" . $question_row['Option1'] . "</label><br>";
            // var_dump($question_row['Option1']);
            echo "<label><input type='radio' name='responses[$question_id][answer]' value='$question_row[Option2]' required>" . $question_row['Option2'] . "</label><br>";
            echo "<label><input type='radio' name='responses[$question_id][answer]' value='$question_row[Option3]' required>" . $question_row['Option3'] . "</label><br>";
            echo "<label><input type='radio' name='responses[$question_id][answer]' value='$question_row[Option4]' required>" . $question_row['Option4'] . "</label><br>";
            echo "</div>";
        }
      
        // Add time up message container
        echo "<div id='timeUpMessage'></div>";

        // Add submit button
        echo "<input class='btn' type='submit' name='submit' value='Finish'>";
        echo "</form>";

    } else {
        echo "No questions found for the quiz.";
    }

} else {
    echo "Invalid quiz.";
}

$conn->close();
?>
</body>
</html>
