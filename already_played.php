<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .content {
            margin-top: 200px; /* Adjust this value as needed */
            text-align: center;
            position: relative; /* Add position relative */
            z-index: 1; /* Ensure content appears above other elements */
        }

        .quiz-link {
            display: inline-block;
            padding: 15px 20px;
            background-color: #ffffff;
            border: 1px solid #007bff;
            border-radius: 5px;
            text-decoration: none;
            color: #007bff;
            transition: background-color 0.3s, color 0.3s;
        }

        .quiz-link:hover {
            background-color: #007bff;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <?php
    include "./shared/config.php";

    if(isset($_GET['quizID'])) {
        $quizID = $_GET['quizID'];
        $sql = "SELECT Title FROM Quizzes WHERE QuizID = $quizID";
        $result = $conn->query($sql);

        if($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <div class="content">
                <p>You have already played the quiz <strong><?php echo $row['Title']; ?></strong>.</p>
                <a class="quiz-link" href="category.php">Go back to Categories</a>
            </div>
            <?php
        } else {
            ?>
            <div class="content">
                <p>Quiz not found.</p>
            </div>
            <?php
        }
    } else {
        echo "<p>QuizID parameter not provided.</p>";
    }
    ?>
</body>
</html>
