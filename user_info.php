<?php
session_start();
include("./shared/config.php");

// Check if user is logged in
if (!isset($_SESSION['userID'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Get the user ID
$userID = $_SESSION['userID'];

// Query to retrieve user details
$query = "SELECT * FROM users WHERE UserID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();

// Check if user details are found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Display user details
    echo "<h1>User Details</h1>";
    echo "<p>Name: " . $row['Username'] . "</p>";
    echo "<p>Email: " . $row['Email'] . "</p>";
    // Include an edit form
    echo "<h2>Edit Details</h2>";
    echo "<form action='update_user.php' method='POST'>";
    echo "<input type='hidden' name='userID' value='" . $userID . "'>";
    echo "<label for='name'>Name:</label><br>";
    echo "<input type='text' id='name' name='name' value='" . $row['Username'] . "'><br>";
    echo "<label for='email'>Email:</label><br>";
    echo "<input type='email' id='email' name='email' value='" . $row['Email'] . "'><br>";
    echo "<input type='submit' name='submit' value='Update'>";
    echo "</form>";
} else {
    echo "User details not found.";
}

$stmt->close();
$conn->close();
?>
