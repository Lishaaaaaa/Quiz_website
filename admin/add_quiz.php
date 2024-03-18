<?php
include "../shared/config.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $newCategoryName = $_POST['newCategoryName'];
    $newTitle = $_POST['newtitle'];


    // Insert new category if provided
    if (!empty($newCategoryName)) {
        $sql = "INSERT INTO Categories (CategoryName) VALUES ('$newCategoryName')";
        mysqli_query($conn, $sql);
        // Get the ID of the newly inserted category
        $categoryID = mysqli_insert_id($conn);
    }

    // Insert new quiz
    $sql = "INSERT INTO Quizzes (CategoryID, Title) VALUES ('$categoryID', '$newTitle')";
    mysqli_query($conn, $sql);
    // Get the ID of the newly inserted quiz
    $quizID = mysqli_insert_id($conn);

 

    // Redirect user to a confirmation page or elsewhere
    header("Location: confirmation.php");
    exit();
}
