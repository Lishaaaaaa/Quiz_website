<?php
session_start();
include("./shared/config.php");

// Check if the user is logged in
if (!isset($_SESSION['userID'])) {
    // Redirect to the login page if the user is not logged in
    header("Location:./shared/login.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $feedback = $_POST['feedback'];
    $contactInfo = $_POST['contact_info'];
    $userID = $_SESSION['userID'];

    // Retrieve user's email from the session data
    $userEmail = $_SESSION['userEmail'];

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (UserID, Feedback, ContactInfo) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $userID, $feedback, $contactInfo);
    $stmt->execute();

    // Check if the feedback is successfully inserted
    if ($stmt->affected_rows > 0) {
        // Feedback submitted successfully
        echo "Feedback submitted successfully!";

        // Notify the admin about the new feedback
        $adminEmail = "admin@example.com"; // Replace with the admin's email address
        $subject = "New Feedback Submitted";
        $message = "A user with email " . $userEmail . " has submitted the following feedback:\n\n" . $feedback . "\n\nContact Information: " . $contactInfo;
        $headers = "From: no-reply@example.com"; // Replace with a valid sender email address

        // Send email to admin
        mail($adminEmail, $subject, $message, $headers);
    } else {
        // Error submitting feedback
        echo "Error submitting feedback.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
