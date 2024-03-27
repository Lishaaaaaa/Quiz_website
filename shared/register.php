<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $utype = 'user';
    $password = $_POST['password'];

    // Username validation
    if (strlen($username) < 3) {
        echo "Username must be at least 4 characters long.<br>";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $username)) {
        echo "Username must only contain letters.<br>";
    } 

    // Password validation
    if (strlen($password) < 4) {
        echo "Password must be at least 4 characters long.<br>";
    } elseif (!preg_match("/^[a-zA-Z]+[0-9a-zA-Z]*$/", $password)) {
        echo "Password must start with one or more letters followed by any number of digits or letters.<br>";
    } else {
        // Password meets validation criteria
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $check_sql = "SELECT * FROM Users WHERE Email='$email'";
        $result = $conn->query($check_sql);
        if ($result->num_rows > 0) {
            // Email already exists, display error message
            echo "Email already registered. Please use a different email.<br>";
        } else {
            // Insert user into the Users table
            $sql = "INSERT INTO Users (Username, Email, Password, user_type) VALUES ('$username', '$email', '$password_hashed', '$utype')";
            if ($conn->query($sql) === TRUE) {
                // Redirect to login page
                header("Location: login.html");
                exit;
            } else {
                // Handle insertion error
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>
