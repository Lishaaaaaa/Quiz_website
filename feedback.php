<?php
session_start();
include("config.php");

// Check if the user is logged in
if (!isset($_SESSION['userID'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $feedback = $_POST['feedback'];
    $contactInfo = $_POST['contact_info'];
    $userID = $_SESSION['userID'];

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (UserID, Feedback, ContactInfo) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $userID, $feedback, $contactInfo);
    $stmt->execute();

    // Check if the feedback is successfully inserted
    if ($stmt->affected_rows > 0) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error submitting feedback.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback & Contact</title>
</head>
<body>
    <h2>Feedback & Contact</h2>
    <form action="feedback_stored.php" method="POST">
        

        <label for="name">Name:</label>
        <input type="text" name="name"><br>

        <label for="userEmail">Email</label><br>
        <input type="email" name="userEmail" id="userEmail"><br>
        <label for="feedback">Feedback:</label><br>
        <textarea name="feedback" id="feedback" rows="4" cols="50" required></textarea>

        <button type="submit">Submit Feedback</button>
    </form>
</body>
</html>
