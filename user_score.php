<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Scores</title>
    <style>
     .container {
    text-align: center;
    margin-top: 150px;
}

table {
    width: 50%;
    margin: 20px auto;
    border-collapse: collapse;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    animation: fadeIn 1s ease-in-out;
}

th,
td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background: rgb(2, 0, 36);
    background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(203, 88, 235, 0.6963118010876226) 0%, rgba(174, 112, 224, 1) 91%, rgba(174, 115, 236, 1) 100%, rgba(0, 255, 160, 1) 100%, rgba(63, 177, 248, 1) 100%);
}

tr:nth-child(even) {
    background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
    
}


table, th, td {
    border: 1px solid black; /* Adding border for the table, th, and td */
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    </style>
</head>

<body>

    <?php
    session_start();
    include("./shared/config.php");
    include("./shared/navbar.php");

    // Check if user is logged in
    if (!isset($_SESSION['userID'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    }

    // Get the user ID
    $userID = $_SESSION['userID'];

    // Query to retrieve QuizID, Score, and Title for all quizzes for the user
    $query = "SELECT r.QuizID, r.Score, q.Title 
          FROM Responses r 
          JOIN Quizzes q ON r.QuizID = q.QuizID
          WHERE r.UserID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any scores are found
    if ($result->num_rows > 0) {
    
        echo "<div class='container'>";
        echo "<h1>User Scores</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Quiz ID</th><th>Title</th><th>Score</th></tr>";
        // Output scores in a table
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['QuizID'] . "</td><td>" . $row['Title'] . "</td><td>" . $row['Score'] . "</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='container'>";
        echo "No scores found.";
        echo "</div>";
    }

    $stmt->close();
    $conn->close();
    ?>

</body>

</html>
