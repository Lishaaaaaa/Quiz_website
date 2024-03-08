<?php
session_start();
include "../shared/config.php";

// Check if the user is logged in
if (!isset($_SESSION['userID'])) {
    // Redirect to login page if not logged in
    header("Location:../shared/login.php");
    exit();
}

$userID = $_SESSION['userID'];

// Fetch categories from the database
$sql = "SELECT * FROM Categories";
$result = $conn->query($sql);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['categorySelect'])) {
        // Retrieve selected category ID
        $categoryID = $_POST['categorySelect'];
        // Fetch quizzes for the selected category from the database
        $quizzes_sql = "SELECT * FROM Quizzes WHERE CategoryID = ?";
        $stmt = $conn->prepare($quizzes_sql);
        $stmt->bind_param("i", $categoryID);
        $stmt->execute();
        $quizzes_result = $stmt->get_result();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Management</title>
</head>
<body>
    <form method="post">
        <label for="categorySelect">Select Category:</label>
        <select name="categorySelect" id="categorySelect" onchange="this.form.submit()">
            <option value="">Select Category</option>
            <?php
            
            // Display categories fetched from the database
            while ($row = $result->fetch_assoc()) {
                $categoryName = $row['CategoryName'];
                echo "<option value='{$row['CategoryID']}'>{$row['CategoryName']}</option>";
            }
          
            ?>
           
        </select>
    </form>

    <?php
    // Display quizzes if a category is selected
    if (isset($quizzes_result)) {
        if ($quizzes_result->num_rows > 0) {
            echo "<h2>Quizzes</h2>";
            echo "<ul>";
            while ($row = $quizzes_result->fetch_assoc()) {
                echo "<li><a href='view_questions.php?quizID={$row['QuizID']}&categoryID={$row['CategoryID']}'>{$row['Title']}</a></li>";

            }
            echo "</ul>";
        } else {
            echo "No quizzes found for the selected category.";
        }
    }
    ?>

    <!-- Add more HTML and PHP logic as needed for managing questions -->

</body>
</html>
