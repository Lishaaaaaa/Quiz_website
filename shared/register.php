<?php
include("navbar.php");
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
<?php

$username = $_POST['username'];
$password=$_POST['password'];
$utype=$_POST['user_type'];

$encpass=md5($password);


$status=mysqli_query($conn,"insert into Users(FirstName,LastName,password,user_type) values('$firstName','$lastName','$encpass','$utype')");
if($status)
{
    echo "Registration successful";
   
}
else
{
    echo "Error in registration";
    echo mysqli_error($conn);
}

?>






//quizid and userid check for validating if the user have played the quiz earlier or not --done
//user page
//score board
//timer 
//admin page
//if the user selects the back button he can see questions and can submit again.but the answer will be displayed which he had given first.
//should the answers be submitted if the time is up..]
//navbar category redirection