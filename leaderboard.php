<?php
session_start();
include("./shared/config.php");

// Retrieve top 3 users for each category
$top_users_query = "SELECT r.UserID, r.CategoryID, c.CategoryName, MAX(r.Score) AS MaxScore 
                    FROM Responses r 
                    INNER JOIN Quizzes q ON r.QuizID = q.QuizID
                    INNER JOIN Categories c ON r.CategoryID = c.CategoryID
                    GROUP BY r.CategoryID, r.UserID 
                    ORDER BY r.CategoryID, MaxScore DESC";

$result = mysqli_query($conn, $top_users_query);

// Check if query was successful
if ($result) {
    // Display leaderboard
    echo "<h2>Leaderboard</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Category ID</th><th>Category Name</th><th>User Name</th><th>Score</th></tr>";

    // Initialize an array to store the top users for each category
    $top_users = array();

    // Loop through results to find the top 3 users for each category
    while ($row = mysqli_fetch_assoc($result)) {
        $categoryID = $row['CategoryID'];
        $categoryName = $row['CategoryName'];
        $score = $row['MaxScore'];

        // If the category doesn't exist in the array or if the score is higher than the existing top scores
        if (!isset($top_users[$categoryID]) || count($top_users[$categoryID]) < 3 || $score > min(array_column($top_users[$categoryID], 'score'))) {
            // Retrieve user details
            $userID = $row['UserID'];
            $user_query = "SELECT Username FROM Users WHERE UserID = ?";
            $stmt = mysqli_prepare($conn, $user_query);
            mysqli_stmt_bind_param($stmt, "i", $userID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $userName);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            // Add user to the array along with category name
            $top_users[$categoryID][] = array('userName' => $userName, 'score' => $score, 'categoryName' => $categoryName);
        }
    }

    // Loop through the top users array to display the leaderboard
    foreach ($top_users as $categoryID => $users) {
        foreach ($users as $user) {
            $categoryName = $user['categoryName']; // Fetch category name from the stored data
            echo "<tr><td>$categoryID</td><td>$categoryName</td><td>{$user['userName']}</td><td>{$user['score']}</td></tr>";
        }
    }

    echo "</table>";
} else {
    // Display error message if query fails
    echo "Error: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
