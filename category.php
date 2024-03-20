<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Categories</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0; 
        padding-bottom: 50px;
    }
    .container {
        width: 100%;
        max-width: 960px;
        margin: 125px auto 20px; 
        padding: 10px;
        position: relative;
    }

    .category-container {
        width: 50%; /* Adjust the width as needed */
        margin: 0 auto; /* Center the container horizontally */
        box-sizing: border-box; /* Include padding and border in the width */
        position: sticky; 
        top: 350px; 
    }

    .category-box {
        margin-bottom: 10px; 
        border-radius: 5px;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.5); 
    }

    .category-link {
        display: block;
        color: #333;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        background-color: #f0f0f0;
        transition: background-color 0.3s, color 0.3s;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add box shadow */
    }

    .category-link:hover {
        background-image: linear-gradient(135deg, #4CAF50, #007bff); 
        color: #fff; /* text color to white */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: calc(100% - 22px); /* Adjust input width */
        padding: 8px;
        margin: 5px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .footer {
        text-align: center;
        padding: 15px;
        background-color: #050635;
        color: white;
        position: relative; /* Add relative positioning */
        margin-top: 20px; /* Adjust margin-top to separate it from the content */
    }

    h1{
        text-align: center;
    }


@media screen and (max-width: 780px) {
    .container {
        margin: 100px auto 10px;
    padding: 1px;

    
    }

    .category-container {
        width: 80%; 
        top: 250px; 
        
    }
}

</style>
</head>
<body>

<div class="container">
    <div class="category-container">
        <?php
        session_start();
        include("./shared/config.php");
        include("./shared/navbar.php");

        $userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;

        // Display categories
        $sql = "SELECT * FROM Categories";
        $result = $conn->query($sql);
        echo "<h1>Categories</h1>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='category-box'><a class='category-link' href='quizzes.php?category=" . $row['CategoryID'] . "'>" . $row['CategoryName'] . "</a></div>";
        }
        $conn->close();
        ?>
    </div>
</div>

</body>
</html>
