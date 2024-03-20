<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Users</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding-bottom: 50px;
    }
    .container {
        width: 60%; /* Adjusted width */
        margin: 0px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        margin-top: 150px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }
    table {
        width: 100%; 
        border-collapse: collapse;
    }
    td {
        text-align: center; /* Align content to center */
        padding: 8px;
        border: 1px solid #dddddd;
    }
    th {
        background-color: #f2f2f2;
        text-align: center; /* Align content to center */
        padding: 8px;
        border: 1px solid #dddddd;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #dddddd;
    }
    @media screen and (max-width:780px) {
        .container{
            width:70%;
            font-size: 14px;
            margin-top: 150px;
            
        }
        table{
            width: 60%;  
        }
     
        
    }
</style>
</head>
<body>
<div class="container">
    <h1>View Users</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../shared/config.php";
            include "./navbar.php";
           
            $query = "SELECT UserID, Username, Email FROM users";
            $result = mysqli_query($conn, $query);

            if ($result) {
                // Loop through the results and display users
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['UserID']}</td>";
                    echo "<td>{$row['Username']}</td>";
                    echo "<td>{$row['Email']}</td>";
                    echo "</tr>";
                }
            } else {
                // Display error message if query fails
                echo "<tr><td colspan='3'>Error: " . mysqli_error($conn) . "</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
