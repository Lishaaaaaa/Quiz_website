<?php
session_start();
include("./shared/config.php");
include("./shared/navbar.php");

$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;

if (isset($_GET['category'])) {
    $categoryID = $_GET['category'];

    // Display quizzes for selected category
    $sql = "SELECT QuizID, Title FROM Quizzes WHERE CategoryID = $categoryID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>Quizzes for Selected Category</h1>";
        echo "<ul class='quiz-list'>";
        while ($row = $result->fetch_assoc()) {
            // Check if the user has already played this quiz
            $quizID = $row['QuizID'];
            $playedQuery = "SELECT * FROM Responses WHERE UserID = $userID AND QuizID = $quizID";
            $playedResult = $conn->query($playedQuery);

            if ($playedResult->num_rows > 0) {
                // User has already played this quiz
                echo "<li><a class='quiz-link' href='already_played.php?quizID=$quizID&&categoryID=$categoryID'>" . $row['Title'] . "</a></li>";
            } else {
                // User has not played this quiz yet
                echo "<li><a class='quiz-link' href='rules.php?quizID=$quizID&&categoryID=$categoryID'>" . $row['Title'] . "</a></li>";
            }
        }
        echo "</ul>";
    } else {
        echo "<p>No quizzes found for the selected category.</p>";
    }
} else {
    echo "<p>Invalid category.</p>";
}

$conn->close();
?>
