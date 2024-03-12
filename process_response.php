<?php
session_start();
include("./shared/config.php");
// include("./shared/navbar.php");

if(isset($_POST['submit']) && $_POST['submit'] == 'Finish') {
    // Get quiz ID and user ID
    $quizID = $_POST['quizID'];
    $categoryID = $_POST['categoryID'];
    $userID = $_SESSION['userID'];

    // Initialize total score
    $totalScore = 0;

    // Gets responses from the form
    $responses = $_POST['responses'];

    // Iterate over responses and calculate score
    foreach ($responses as $questionID => $response) {
        // Retrieve the selected option for the current question
        $selectedOption = $response['answer'];

        // Retrieve the correct option for the current question from the database
        $correctOptionQuery = "SELECT CorrectOption FROM Questions WHERE QuestionID = ?";
        $stmt = $conn->prepare($correctOptionQuery);
        $stmt->bind_param("i", $questionID);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the result is fetched successfully
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $correctOption = $row['CorrectOption'];

            // Check if the selected option matches the correct option
            if ($selectedOption == $correctOption) {
                // Increment total score if the selected option is correct
                $totalScore++;
            }
          
            // Output the type and value of selectedOption and correctOption for each question
            // echo "Question ID: $questionID <br>";
            // echo "Selected Option: $selectedOption | Type: " . gettype($selectedOption) . "<br>";
            // echo "Correct Option: $correctOption | Type: " . gettype($correctOption) . "<br><br>";
        }
    }

    // Output total score outside the loop
    // echo  "Total score: $totalScore<br>";

    // Insert score into Responses table
    $insert_score_sql = "INSERT INTO Responses (UserID, QuizID, Score,CategoryID) VALUES (?, ?, ?,?)";
    $stmt = mysqli_prepare($conn, $insert_score_sql);
    mysqli_stmt_bind_param($stmt, "iiii", $userID, $quizID, $totalScore,$categoryID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

 
    // Redirect to score display page
    header("Location: score_display.php?quizID=$quizID");
    exit();
} else {
    echo "Invalid request!";
}
?>