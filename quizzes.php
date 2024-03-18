<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizzes</title>
<style>

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .quiz-container {
        width: 100%;
        max-width: 960px;
        margin: 150px auto 20px; 
        padding: 0 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

 
    .quiz-list {
        list-style: none;
        padding: 0;
    }

    .quiz-link {
        display: block;
        color: #333;
        text-decoration: none;
        padding: 10px;
        width: 150px;
        text-align: center;
        margin: 5px 0;
        border-radius: 5px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        transition: background-color 0.3s, color 0.3s;
    }

    .quiz-link:hover {
        background-color: #e0e0e0;
        color: #000;
    }


    @media screen and (max-width: 780px) {
        .quiz-container {
            margin-top: 130px; 
        }

        .quiz-link {
            margin: 5px auto; /* Center quiz links horizontally */
        }
    }
</style>
</head>
<body>
<div class="container">
    <div class="quiz-container">
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
    </div>
</div>
</body>
</html>
