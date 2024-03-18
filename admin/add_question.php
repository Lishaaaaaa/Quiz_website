<?php
session_start();
include("config.php");

// Check if the user is logged in as admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // If not logged in as admin, redirect to login page
    header("Location: login.php");
    exit();
}

// Get quiz ID from URL
$quizID = isset($_GET['quizID']) ? $_GET['quizID'] : null;

if ($quizID !== null) {
    // Display form to add a new question
    echo "<h2>Add New Question</h2>";
    echo "<form action='insert_question.php' method='post'>";
    echo "<input type='hidden' name='quizID' value='$quizID'>";
    echo "Question Text: <input type='text' name='questionText'><br>";
    echo "Image: <input type='file' name='qimg'><br>";
    echo "Option 1: <input type='text' name='option1'><br>";
    echo "Option 2: <input type='text' name='option2'><br>";
    echo "Option 3: <input type='text' name='option3'><br>";
    echo "Option 4: <input type='text' name='option4'><br>";
    echo "Correct Option: <input type='text' name='correctOption'><br>";
    echo "<input type='submit' value='Add Question'>";
    echo "</form>";
} else {
    echo "Invalid quiz.";
}
?>

