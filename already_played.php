<!DOCTYPE html>
<html lang="en">
<head>
  <style>
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
        echo "You have already played <strong>" . $row['Title'] . "</strong>.";
        echo "<a class='quiz-link' href='category.php'>" . "Go back to Categories" . "</a>";
    } else {
        echo "Quiz not found.";
    }
} else {
    echo "QuizID parameter not provided.";
}
?>
</body>
</html>