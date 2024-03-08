<?php
include "../shared/config.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $newCategoryName = $_POST['newCategoryName'];
    $newTitle = $_POST['newtitle'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correct_option = $_POST['correct_option'];

    // Insert new category if provided
    if (!empty($newCategoryName)) {
        $sql = "INSERT INTO Categories (CategoryName) VALUES ('$newCategoryName')";
        mysqli_query($conn, $sql);
        // Get the ID of the newly inserted category
        $categoryID = mysqli_insert_id($conn);
    }

    // Insert new quiz
    $sql = "INSERT INTO Quizzes (CategoryID, Title) VALUES ('$categoryID', '$newTitle')";
    mysqli_query($conn, $sql);
    // Get the ID of the newly inserted quiz
    $quizID = mysqli_insert_id($conn);

    // Insert new question
    $sql = "INSERT INTO Questions (QuizID, QuestionText, Option1, Option2, Option3, Option4, CorrectOption) 
            VALUES ('$quizID', '$question', '$option1', '$option2', '$option3', '$option4', '$correct_option')";
    mysqli_query($conn, $sql);

    // Redirect user to a confirmation page or elsewhere
    header("Location: confirmation.php");
    exit();
}
?>
