<?php
session_start();
include "../shared/config.php";

// Initialize variables
$userID = $_SESSION['userID'];
$categoryID = null;
$quizID = null;
$categoryName = null;
$quizTitle = null;
$updateMessage = "";

// Check if the category ID and quiz ID are provided in the URL
if (isset($_GET['categoryID']) && isset($_GET['quizID'])) {
    $categoryID = $_GET['categoryID'];
    $quizID = $_GET['quizID'];

    // Fetch the existing quiz details from the database
    $quizzes_sql = "SELECT * FROM Quizzes WHERE CategoryID = ? AND QuizID = ?";
    $stmt = $conn->prepare($quizzes_sql);
    $stmt->bind_param("ii", $categoryID, $quizID);
    $stmt->execute();
    $quizzes_result = $stmt->get_result();
    
    if ($quizzes_result->num_rows > 0) {
        $quiz = $quizzes_result->fetch_assoc();
        $quizTitle = $quiz['Title'];
        
        // Fetch the category name
        $category_sql = "SELECT CategoryName FROM Categories WHERE CategoryID = ?";
        $stmt = $conn->prepare($category_sql);
        $stmt->bind_param("i", $categoryID);
        $stmt->execute();
        $category_result = $stmt->get_result();
        if ($category_result->num_rows > 0) {
            $category = $category_result->fetch_assoc();
            $categoryName = $category['CategoryName'];
        } else {
            echo "Error: Category not found.";
            exit();
        }
        
        // Fetch questions for this quiz from the database
        // You need to implement this part according to your database structure
        // and retrieve the questions related to the provided quizID
        $questions_sql = "SELECT * FROM Questions WHERE QuizID = ?";
        $stmt = $conn->prepare($questions_sql);
        $stmt->bind_param("i", $quizID);
        $stmt->execute();
        $questions_result = $stmt->get_result();
        if (!$questions_result) {
            echo "Error fetching questions: " . mysqli_error($conn);
            exit();
        }
    } else {
        echo "Error: Quiz not found.";
        exit();
    }
}

// Handle the form submission for updating the quiz and category
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update category name
    $new_category_name = $_POST['category_name'];
    $update_category_status = mysqli_query($conn, "UPDATE Categories SET CategoryName = '$new_category_name' WHERE CategoryID = '$categoryID'");
    if ($update_category_status) {
        $updateMessage .= "Category updated successfully. ";
        $categoryName = $new_category_name; // Update the category name variable
    } else {
        $updateMessage .= "Error updating category: " . mysqli_error($conn);
    }
    
    // Update quiz title
    $new_quiz_title = $_POST['title'];
    $update_quiz_status = mysqli_query($conn, "UPDATE Quizzes SET Title = '$new_quiz_title' WHERE QuizID = '$quizID'");
    if ($update_quiz_status) {
        $updateMessage .= "Quiz title updated successfully. ";
        $quizTitle = $new_quiz_title; // Update the quiz title variable
    } else {
        $updateMessage .= "Error updating quiz title: " . mysqli_error($conn);
    }
    
    // Update questions and correct answers
    while ($question = mysqli_fetch_assoc($questions_result)) {
        $question_id = $question['QuestionID'];
        $new_question_text = $_POST['question_' . $question_id];
        $new_correct_option = $_POST['correct_option_' . $question_id];
        $option_values = array();
        for ($i = 1; $i <= 4; $i++) {
            $option_values[] = $_POST['option_' . $i . '_' . $question_id];
        }
        $update_question_status = mysqli_query($conn, "UPDATE Questions SET QuestionText = '$new_question_text', Option1 = '$option_values[0]', Option2 = '$option_values[1]', Option3 = '$option_values[2]', Option4 = '$option_values[3]', CorrectOption = '$new_correct_option' WHERE QuestionID = '$question_id'");
        if (!$update_question_status) {
            $updateMessage .= "Error updating question: " . mysqli_error($conn);
        }
    }
    header("Location: success_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quiz</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Quiz</h2>
        <?php if (!empty($updateMessage)): ?>
            <div class="message"><?php echo $updateMessage; ?></div>
        <?php endif; ?>
        <form method="post">
            <?php if (!empty($categoryName) && !empty($quizTitle)): ?>
                <div class="section">
                    <label for="category_name">Category Name:</label>
                    <input type="text" name="category_name" id="category_name" value="<?php echo $categoryName; ?>">
                </div>
                <div class="section">
                    <label for="title">Quiz Title:</label>
                    <input type="text" name="title" id="title" value="<?php echo $quizTitle; ?>">
                </div>
                <!-- Display questions and options -->
                <?php while ($question = mysqli_fetch_assoc($questions_result)): ?>
                    <div class="section">
                        <label for="question_<?php echo $question['QuestionID']; ?>">Question:</label>
                        <input type="text" name="question_<?php echo $question['QuestionID']; ?>" id="question_<?php echo $question['QuestionID']; ?>" value="<?php echo $question['QuestionText']; ?>">
                    </div>
                    <!-- Display options -->
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                        <div class="section">
                            <label for="option_<?php echo $i; ?>_<?php echo $question['QuestionID']; ?>">Option <?php echo $i; ?>:</label>
                            <input type="text" name="option_<?php echo $i; ?>_<?php echo $question['QuestionID']; ?>" id="option_<?php echo $i; ?>_<?php echo $question['QuestionID']; ?>" value="<?php echo $question['Option'.$i]; ?>">
                        </div>
                    <?php endfor; ?>
                    <!-- Display the correct option -->
                    <div class="section">
                        <label for="correct_option_<?php echo $question['QuestionID']; ?>">Correct Option:</label>
                        <input type="text" name="correct_option_<?php echo $question['QuestionID']; ?>" id="correct_option_<?php echo $question['QuestionID']; ?>" value="<?php echo $question['CorrectOption']; ?>">
                    </div>
                <?php endwhile; ?>
                <div class="section">
                    <input type="submit" value="Update Quiz">
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
