<!DOCTYPE html>
<html>
<head>
    <title>Quiz Score</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .quiz-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .quiz-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Quiz Score</h1>
    <?php
    session_start();
    include("./shared/config.php");
    include("./shared/navbar.php");

    // Check if the user is logged in
    if (!isset($_SESSION['userID'])) {
        // If not logged in, redirect to login page
        header("Location: login.php?redirect=score_display.php");
        exit();
    }

    // Get quiz ID from URL
    $quizID = isset($_GET['quizID']) ? $_GET['quizID'] : null;

    // Retrieve the user's total score for the quiz from the Responses table
    $userID = $_SESSION['userID'];
    $totalScore_sql = "SELECT Score FROM Responses WHERE QuizID = ? AND UserID = ?";
    $stmt = $conn->prepare($totalScore_sql);
    $stmt->bind_param("ii", $quizID, $userID);
    $stmt->execute();
    $totalScore_result = $stmt->get_result();

    if ($totalScore_result->num_rows > 0) {
        $totalScore_row = $totalScore_result->fetch_assoc();
        $totalScore = $totalScore_row['Score'];

        // Display the user's total score for the quiz
        echo "<p>Your total score for Quiz ID $quizID is: $totalScore</p>";
    } else {
        echo "Error: Unable to retrieve score.";
    }

    $conn->close();
    ?>
    <a class="quiz-link" href="category.php">Go back to Categories</a>
</body>
</html>
