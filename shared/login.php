<?php
session_start();
// Include the database configuration file
include("config.php");

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email, password, and user_type from the POST data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type']; 

    // Prepare a SQL statement to retrieve user data
    $sql = "SELECT * FROM Users WHERE Email = ?";
    $stmt = $conn->prepare($sql);

    // Bind the email parameter
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['Password'])) {
            // Set the user ID in the session after successful login
            $_SESSION['userID'] = $row['UserID'];

            // Set the user type in the session
            $_SESSION['user_type'] = strtolower(trim($row['user_type']));

            // Redirect based on user type
            if ($_SESSION['user_type'] === 'user') {
                header("Location:../category.php");
               
              
                exit;
            } elseif ($_SESSION['user_type'] === 'admin') {
                header("Location:../admin/admin.php");
                exit;
            }
        } else {
            // Invalid password
            echo "Invalid password";
        }
    } else {
        // User not found
        echo "User not found";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
