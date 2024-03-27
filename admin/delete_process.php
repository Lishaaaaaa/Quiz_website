<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Category and Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
        }
        /* Add your CSS styles here */
        .button-container {
            margin-top: 20px;
            text-align: center; /* Center the button horizontally */
        }
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 3px;
        }
        .button:hover {
            background-color: #45a049;
        }
        .message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .success {
            background-color: #4CAF50;
            color: white;
        }
        .error {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include "../shared/config.php";

        if (isset($_POST['delete_category'])) {
            // Handle category deletion
            $categoryId = $_POST['category_id'];

            // Delete category from database
            $deleteCategorySql = "DELETE FROM Categories WHERE CategoryID = ?";
            $stmt = $conn->prepare($deleteCategorySql);
            $stmt->bind_param("i", $categoryId);
            $stmt->execute();

            // Check if deletion was successful
            if ($stmt->affected_rows > 0) {
                echo "<div class='message success'>Category deleted successfully.</div>";
            } else {
                echo "<div class='message error'>Error deleting category: " . $stmt->error . "</div>";
            }

            $stmt->close();
        }

        if (isset($_POST['delete_quiz'])) {
            // Handle quiz deletion
            $quizId = $_POST['quiz_id'];

            // Delete questions associated with the quiz
            $deleteQuestionsSql = "DELETE FROM Questions WHERE QuizID = ?";
            $stmt = $conn->prepare($deleteQuestionsSql);
            $stmt->bind_param("i", $quizId);
            $stmt->execute();

            $deleteQuestionsSql = "DELETE FROM Responses WHERE QuizID = ?";
            $stmt = $conn->prepare($deleteQuestionsSql);
            $stmt->bind_param("i", $quizId);
            $stmt->execute();

            // Delete quiz from database
            $deleteQuizSql = "DELETE FROM Quizzes WHERE QuizID = ?";
            $stmt = $conn->prepare($deleteQuizSql);
            $stmt->bind_param("i", $quizId);
            $stmt->execute();

            // Check if deletion was successful
            if ($stmt->affected_rows > 0) {
                echo "<div class='message success'>Quiz and associated questions deleted successfully.</div>";
            } else {
                echo "<div class='message error'>Error deleting quiz and associated questions: " . $stmt->error . "</div>";
            }

            $stmt->close();
        }
        ?>

        <div class="button-container">
            <a href="admin.php" class="button">Back to Admin Panel</a>
        </div>
    </div>
</body>
</html>
