<?php
session_start();
include("./shared/config.php");

// Check if user is logged in
if (!isset($_SESSION['userID'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Get the user ID
$userID = $_SESSION['userID'];

// Query to retrieve QuizID, Score, and Title for all quizzes for the user
$query = "SELECT r.QuizID, r.Score, q.Title 
          FROM Responses r 
          JOIN Quizzes q ON r.QuizID = q.QuizID
          WHERE r.UserID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();

// Check if any scores are found
if ($result->num_rows > 0) {
    echo "<h1>User Scores</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Quiz ID</th><th>Title</th><th>Score</th></tr>";
    // Output scores in a table
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['QuizID'] . "</td><td>" . $row['Title'] . "</td><td>" . $row['Score'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No scores found.";
}

$stmt->close();
$conn->close();
?>
