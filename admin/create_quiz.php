<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Question</title>
    <!-- Include Font Awesome library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url(../images/bg.avif);
            background-repeat: no-repeat;
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the background image */
        }
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: left;
            position: relative;
            transition: all 0.3s ease;
        }
        label {
            font-size: 18px;
            display: block;
            margin-bottom: 10px;
            color: #333333;
        }
        input[type="text"],
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 16px;
        }
        textarea {
            height: 120px;
        }
        .fa-pen-alt {
            position: absolute;
            top: 2%;
            right: 10%;
            transform: translateX(-20%);
            font-size: 40px;
            color: #4CAF50;
            opacity: 0.2;
        }
        .options input[type="text"] {
            margin-bottom: 5px;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form id="quizForm" action="add_quiz.php" method="post">
        <div>
            <label for="newCategoryName">New Category Name:</label>
            <input type="text" name="newCategoryName" id="newCategoryName" required>
        </div>

        <div>
            <label for="newtitle">Quiz Title:</label>
            <input type="text" name="newtitle" required>
        </div>

        <div>
            <label for="question">Question:</label>
            <textarea name="question" id="question" required></textarea>
        </div>

        <!-- Font Awesome icon -->
        <i class="fas fa-pen-alt"></i>

        <div class="options">
            <label for="options">Options:</label>
            <input type="text" name="option1" required>
            <input type="text" name="option2" required>
            <input type="text" name="option3" required>
            <input type="text" name="option4" required>
        </div>

        <div>
            <label for="correct_option">Correct Option:</label>
            <input type="text" name="correct_option" required>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        // Reset the form after submission
        window.onload = function() {
            document.getElementById("quizForm").reset();
        };
        
        // Disable caching to prevent back button from displaying cached content
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        });
    </script>
</body>
</html>
