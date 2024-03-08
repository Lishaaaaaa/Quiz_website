<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quiz Completed</title>
<style>
    /* Style for the completion message */
    .completion-message {
        font-size: 24px;
        text-align: center;
        animation: slideUp 2s ease-in-out forwards;
    }

    /* Keyframes for sliding up animation */
    @keyframes slideUp {
        0% { opacity: 0; transform: translateY(100px); }
        100% { opacity: 1; transform: translateY(0); }
    }
</style>
</head>
<body>
<div class="completion-message">
    Congratulations! You have completed the quiz.
</div>
<a href="feedback.php">
<button type="submit">Give feedback</button></a>
</body>
</html>
