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

// Debug: Check if categories are fetched
if (!$result) {
    echo "Error: " . $conn->error;
}

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
    <style>
        body {

            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            /* Adjust width as needed */
            max-width: 500px;
            height: 40vh;
            margin: 20px auto;
            padding: 20px;

            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* overflow-y: auto; */
            /*to scroll vertically when its content exceeds the viewport height.
         height: auto; /* Set height to auto */
        }

        h2 {
            margin-top: 0;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
            margin-top: 100px;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        select {
            padding: 12px;
            font-size: 16px;
            border: 2px solid #007bff;
            border-radius: 25px;
            background-color: #f5f5f5;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        select:focus {
            outline: none;
            border-color: #0056b3;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        ul li {
            margin-bottom: 10px;
            display: inline-block;
        }

        a {
            color: #007bff;
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid #007bff;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        h2 {
            text-align: center;
        }

        a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .message-container {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="post">
            <label for="categorySelect">Select Category:</label>
            <select name="categorySelect" id="categorySelect" onchange="this.form.submit()">
                <option value="">Select Category</option>
                <?php
                // Display categories fetched from the database
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $categoryName = $row['CategoryName'];
                        echo "<option value='{$row['CategoryID']}'>{$row['CategoryName']}</option>";
                    }
                } else {
                    echo "<option value=''>No categories found</option>";
                }
                ?>
            </select>
        </form>

        <?php
        // Display quizzes if a category is selected
        if (isset($quizzes_result)) {
            if ($quizzes_result->num_rows > 0) {
                echo "<div class='message-container'>";
                echo "<h2>Quizzes</h2>";
                echo "<ul>";
                while ($row = $quizzes_result->fetch_assoc()) {
                    echo "<li><a href='update.php?quizID={$row['QuizID']}&categoryID={$row['CategoryID']}'>{$row['Title']}</a></li>";
                }
                echo "</ul>";
                echo "</div>";
            } else {
                echo "<div class='message-container'>No quizzes found for the selected category.</div>";
            }
        }
        ?>
    </div>

</body>

</html>