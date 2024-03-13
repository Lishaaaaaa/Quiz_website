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
            $option_values[] = mysqli_real_escape_string($conn, $_POST['option_' . $i . '_' . $question_id]);
        }
        $update_question_status = "UPDATE Questions SET Question = ?, Option1 = ?, Option2 = ?, Option3 = ?, Option4 = ?, CorrectOption = ? WHERE QuestionID = ?";
        $stmt = $conn->prepare($update_question_status);
        $stmt->bind_param("ssssssi", $new_question_text, $option_values[0], $option_values[1], $option_values[2], $option_values[3], $new_correct_option, $question_id);
        $stmt->execute();
        if (!$stmt->affected_rows > 0) {
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            animation: fadeInAnimation ease 1s forwards;
        }

        .section {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
            /* Increase margin bottom */
        }

        .input-box {
            width: calc(100% - 50px);
            background-color: burlywood;
            padding: 9px;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            /* Add margin top */
        }

        button:hover {
            background-color: #45a049;
        }

        label {
            width: 120px;
            display: inline-block;
            text-align: right;
            margin-right: 10px;
        }

        .option {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
            /* Add margin-bottom for spacing between options */
        }

        input {
            padding: 3px;
        }

        .category-input {
            width: 200px;
        }

        h2 {
            text-align: center;
            font-family: 'Roboto', sans-serif;
            color: #333;
           
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Quiz</h2>
        <?php if (!empty($updateMessage)) : ?>
            <div class="message"><?php echo $updateMessage; ?></div>
        <?php endif; ?>
        <form method="post">
            <?php if (!empty($categoryName) && !empty($quizTitle)) : ?>
                <div class="section">
                    <label for="category_name" class="category-label">Category:</label>
                    <input type="text" name="category_name" id="category_name" value="<?php echo $categoryName; ?>">
                </div>

                <div class="section">
                    <label for="title">Quiz Title:</label>
                    <input type="text" name="title" id="title" value="<?php echo $quizTitle; ?>">
                </div>
                <div class="question-container">
                    <?php
                    $questionCounter = 1; // Initialize question counter
                    while ($question = mysqli_fetch_assoc($questions_result)) : ?>
                        <div class="question">
                            <div class="section">
                                <label for="question_<?php echo $question['QuestionID']; ?>" class="question">Question <?php echo $questionCounter; ?>:</label>
                                <input type="text" name="question_<?php echo $question['QuestionID']; ?>" id="question_<?php echo $question['QuestionID']; ?>" class="input-box" value="<?php echo $question['Question']; ?>">
                            </div>

                            <!-- Display options -->
                            <div class="option-container">
                                <?php for ($i = 1; $i <= 4; $i++) : ?>
                                    <?php if ($i <= 2) : ?>
                                        <div class="option">
                                            <label for="option_<?php echo $i; ?>_<?php echo $question['QuestionID']; ?>">Option <?php echo $i; ?>:</label>
                                            <input type="text" name="option_<?php echo $i; ?>_<?php echo $question['QuestionID']; ?>" id="option_<?php echo $i; ?>_<?php echo $question['QuestionID']; ?>" value="<?php echo $question['Option' . $i]; ?>">
                                        </div>
                                    <?php else : ?>
                                        <div class="option">
                                            <label for="option_<?php echo $i; ?>_<?php echo $question['QuestionID']; ?>">Option <?php echo $i; ?>:</label>
                                            <input type="text" name="option_<?php echo $i; ?>_<?php echo $question['QuestionID']; ?>" id="option_<?php echo $i; ?>_<?php echo $question['QuestionID']; ?>" value="<?php echo $question['Option' . $i]; ?>">
                                        </div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>

                            <!-- Display the correct option -->
                            <label class="correct-option" for="correct_option_<?php echo $question['QuestionID']; ?>">Correct Option:</label>
                            <input type="text" name="correct_option_<?php echo $question['QuestionID']; ?>" id="correct_option_<?php echo $question['QuestionID']; ?>" value="<?php echo $question['CorrectOption']; ?>">
                        </div>
                    <?php $questionCounter++; // Increment question counter
                    endwhile; ?>
                </div>
                <div class="section">
                    <button type="submit" name="update_quiz">Update Quiz</button>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>