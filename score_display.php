<!DOCTYPE html>
<html>
<head>
    <title>Quiz Score</title>
    <style>
        body {
            margin-top: 100px; 
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            
        }
        h1 {
            margin-top: 190px;
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
        .party-popper {
            width: 200px;
            margin: 20px auto;
            cursor: pointer;
        }
        .party-popper img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
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
    ?>
    <h1>Quiz Score</h1>
    <?php
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
    <div class="party-popper" onclick="partyPopper()">
        <img src="./images/party.gif" alt="Party Popper">
    </div>
    <script>
        function partyPopper() {
            var partyPopper = document.querySelector('.party-popper img');
            partyPopper.style.animation = 'pop 1s ease forwards';
            setTimeout(function() {
                partyPopper.style.animation = 'none';
            }, 1000);
        }
    </script>
    <!-- <a class="quiz-link" href="category.php">Go back to Categories</a> -->
</body>
</html>
