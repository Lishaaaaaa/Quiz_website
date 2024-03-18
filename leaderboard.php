<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-bottom: 50px;
        }

        .container {
            max-width: 560px;
            margin: 150px auto;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #dddddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            /* Green */
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #dddddd;
        }

        @media screen and (max-width: 768px) {
            body {
                margin-top: 100px;
            }

            .container {
                max-width: 280px;
                font-size: 12px;
                
            }

            table {
                margin: 0 auto; /* Center the table horizontally */
                width: 80%;
                /* Ensure the table takes up 100% width of its container */
                max-width: none;
                /* Remove max-width limit to allow table to expand */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        session_start();
        include("./shared/config.php");
        include("./shared/navbar.php");

        // Retrieve top 3 users for each category
        $top_users_query = "SELECT r.UserID, r.CategoryID, c.CategoryName, MAX(r.Score) AS MaxScore, u.Username
    FROM Responses r 
    INNER JOIN Quizzes q ON r.QuizID = q.QuizID
    INNER JOIN Categories c ON r.CategoryID = c.CategoryID
    INNER JOIN Users u ON r.UserID = u.UserID
    GROUP BY r.CategoryID, r.UserID 
    ORDER BY r.CategoryID, MaxScore DESC, u.Username ASC;
    ";

        $result = mysqli_query($conn, $top_users_query);

        // Check if query was successful
        if ($result) {
            echo "<h2>Leaderboard</h2>";
            echo "<div class='leaderboard-table'>";
            echo "<table>";
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
            echo "</div>"; // end leaderboard-table
        } else {
            // Display error message if query fails
            echo "Error: " . mysqli_error($conn);
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>