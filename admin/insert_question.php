<?php
session_start();
include("config.php");

// Check if the user is logged in as admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // If not logged in as admin, redirect to login page
    header("Location: login.php");
    exit();
}

// Get form data from POST request
$quizID = isset($_POST['quizID']) ? $_POST['quizID'] : null;
$questionText = isset($_POST['questionText']) ? $_POST['questionText'] : null;
$option1 = isset($_POST['option1']) ? $_POST['option1'] : null;
$option2 = isset($_POST['option2']) ? $_POST['option2'] : null;
$option3 = isset($_POST['option3']) ? $_POST['option3'] : null;
$option4 = isset($_POST['option4']) ? $_POST['option4'] : null;
$correctOption = isset($_POST['correctOption']) ? $_POST['correctOption'] : null;

if ($quizID !== null && $questionText !== null && $option1 !== null && $option2 !== null && $option3 !== null && $option4 !== null && $correctOption !== null) {
    // Insert the new question into the database
    $insert_question_sql = "INSERT INTO Questions (QuizID, QuestionText, Option1, Option2, Option3, Option4, CorrectOption) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_question_sql);
    $stmt->bind_param("issssss", $quizID, $questionText, $option1, $option2, $option3, $option4, $correctOption);
    $stmt->execute();

    // Redirect back to the edit quiz page
    header("Location: edit_quiz.php?quizID=$quizID");
    exit();
} else {
    echo "Error: Missing required fields.";
}
?>
