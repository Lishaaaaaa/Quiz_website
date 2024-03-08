<?php
include("config.php");

// Insert into Categories
$sql = "INSERT INTO Categories (CategoryName) VALUES ('Mathematics')";
$conn->query($sql);

// Retrieve the auto-generated CategoryID
$categoryID = $conn->insert_id;

// Insert a quiz with the correct CategoryID
$sql = "INSERT INTO Quizzes (CategoryID, Title, Description , StartTime, EndTime) 
        VALUES ($categoryID, 'Math Quiz', 'Test your math skills.', '2024-01-01 12:00:00', '2024-01-01 13:00:00')";
$conn->query($sql);

// Retrieve the auto-generated QuizID
$quizID = $conn->insert_id;

// Insert questions for the quiz
$sql = "INSERT INTO Questions (QuizID, QuestionText, Option1, Option2, Option3, Option4, CorrectOption) 
        VALUES 
            ($quizID, 'What is 2 + 2?', '3', '4', '5', '6', 2),
            ($quizID, 'What is 3 * 5?', '10', '15', '20', '25', 3)";
$conn->query($sql);




$sql = "INSERT INTO Responses (UserID, QuestionID, UserAnswer, IsCorrect) 
        VALUES (1, $questionID, $userAnswer, ($userAnswer = 2))";
$conn->query($sql);

$conn->close();
?>
