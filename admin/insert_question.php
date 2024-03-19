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

// Check if quizID and categoryID are provided
if (!isset($_GET['quizID']) || !isset($_GET['categoryID'])) {
    echo "Error: QuizID and CategoryID not provided.";
    exit();
}

$quizID = $_GET['quizID'];
$categoryID = $_GET['categoryID'];

// Fetch quiz title from the database
$quiz_sql = "SELECT Title FROM Quizzes WHERE QuizID = ?";
$stmt = $conn->prepare($quiz_sql);
$stmt->bind_param("i", $quizID);
$stmt->execute();
$quiz_result = $stmt->get_result();

if ($quiz_result->num_rows > 0) {
    $quiz_row = $quiz_result->fetch_assoc();
    $quizTitle = $quiz_row['Title'];
} else {
    echo "Error: Quiz not found.";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correct_option = $_POST['correct_option'];

    if ($_FILES['qimg']['error'] === UPLOAD_ERR_OK) {
        // Retrieve the temporary file path
        $tmpFilePath = $_FILES['qimg']['tmp_name'];
        // Move the file to the desired location
        $imgpath = "./shared/images/" . $_FILES['qimg']['name'];
        move_uploaded_file($tmpFilePath, $imgpath);
    } else {
        // Set imgpath to NULL if no image is uploaded
        $imgpath = NULL;
    }


    // Insert question into the database
    $sql = "INSERT INTO Questions (QuizID, Question, Option1, Option2, Option3, Option4, CorrectOption, CategoryID, imgpath)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssssss", $quizID, $question, $option1, $option2, $option3, $option4, $correct_option, $categoryID, $imgpath); // Fix here

    if ($stmt->execute()) {
        // Question inserted successfully
        header("Location: qstn_added.php"); // Redirect to confirmation page
        exit();
    } else {
        // Error occurred while inserting question
        echo "Error: " . $stmt->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question to <?php echo $quizTitle; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Base styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            background-image: url(../images/bg.avif);
            background-repeat: no-repeat;
            background-size: cover;
            /* Cover the entire viewport */
            background-position: center;
            /* Center the background image */
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
            width: 100%;
            text-align: left;
            position: relative;
            transition: all 0.3s ease;
        }

        h2 {
            text-align: center;
        }

        label {
            display: flex;
            flex-direction: column;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        button,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 8px;
            box-sizing: border-box;

        }

        button {
            background-color: #5cb85c;
            border-radius: 10px;
        }
        
        .options input[type="text"] {
                width: 50%;

                margin-bottom: 10px;
                /* Add some space between options */
            }
        /* Additional styles for large screens */
        @media screen and (max-width: 768px) {
            form {

                width: 80% !important;
            }

            label {
                font-size: 18px;
            }

            input[type="text"],
            textarea,
            button,
            input[type="file"] {
                width: 80%;
                padding: 8px;
                margin-top: 4px;
                margin-bottom: 8px;
                box-sizing: border-box;
            }


            .options {
                display: flex;
                flex-wrap: wrap;
                flex-direction: column;
                /* Change flex direction to column */
            }

            .options input[type="text"] {
                width: 80%;

                margin-bottom: 10px;
                /* Add some space between options */
            }
        }
    </style>
</head>

<body>
    <h2>Add Question to <?php echo $quizTitle; ?>Quiz</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?quizID=$quizID&categoryID=$categoryID"; ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="question">Question:</label>
            <textarea name="question" id="question" required></textarea>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" name="qimg">


        </div>
        <div class="options">
            <label for="options">Options:</label>
            <input type="text" name="option1" required>
            <input type="text" name="option2" required>
            <input type="text" name="option3" required>
            <input type="text" name="option4" required>
        </div>
        <div>
            <label for="correct_option">Correct Option:</label>
            <input type="text" name="correct_option" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>

</html>