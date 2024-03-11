<?php
session_start();
include "../shared/config.php";

// Fetch categories
$categorySql = "SELECT * FROM Categories";
$categoryResult = mysqli_query($conn, $categorySql);

if (!$categoryResult) {
    echo "Error fetching categories: " . mysqli_error($conn);
    exit();
}

// Fetch quizzes
$quizSql = "SELECT * FROM Quizzes";
$quizResult = mysqli_query($conn, $quizSql);

if (!$quizResult) {
    echo "Error fetching quizzes: " . mysqli_error($conn);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Category and Quiz</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .delete-button {
            background-color: #ff6347;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        .delete-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Delete Categories</h2>
                <?php while ($row = mysqli_fetch_assoc($categoryResult)) : ?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p><?php echo $row['CategoryName']; ?></p>
                        <form method="post" action="delete_process.php">
                            <input type="hidden" name="category_id" value="<?php echo $row['CategoryID']; ?>">
                            <button type="submit" class="delete-button" name="delete_category">Delete</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <h2>Delete Quizzes</h2>
                <?php while ($row = mysqli_fetch_assoc($quizResult)) : ?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p><?php echo $row['Title']; ?></p>
                        <form method="post" action="delete_process.php">
                            <input type="hidden" name="quiz_id" value="<?php echo $row['QuizID']; ?>">
                            <button type="submit" class="delete-button" name="delete_quiz">Delete</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>
</html>
