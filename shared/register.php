<?php 
// include("navbar.php");
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $utype='user';
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert user into the Users table
    $sql = "INSERT INTO Users (Username, Email, Password,user_type) VALUES ('$username','$email', '$password',' $utype')";
    $conn->query($sql);

    // Redirect to login page
    header("Location: login.html");
    exit;
}

$conn->close();
?>






