<?php
session_start();
include("./shared/config.php");
include("./shared/navbar.php");

if (isset($_GET['quizID']) && isset($_GET['categoryID'])) {
    $quizID = $_GET['quizID'];
    $categoryID = $_GET['categoryID'];

    // Fetch quiz details
    $quizQuery = "SELECT Title FROM Quizzes WHERE QuizID = $quizID";
    $quizResult = $conn->query($quizQuery);
    
    if ($quizResult->num_rows > 0) {
        $quizData = $quizResult->fetch_assoc();
        $quizTitle = $quizData['Title'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rules for <?php echo $quizTitle; ?></title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <h1>Rules for <?php echo $quizTitle; ?> Quiz</h1>
    <div class="info-title"><span>Some Rules for this Quiz</span></div>
        <div class="info-list">
            <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
            <div class="info">2. Once you select your answer, it can't be undone.</div>
            <div class="info">3. You can't select any option once time goes off.</div>
            <div class="info">4. You can't exit from the Quiz while you're playing.</div>
            <div class="info">5. You'll get points on the basis of your correct answers.</div>
        </div>
    <button onclick="window.location.href='questions.php?quizID=<?php echo $quizID; ?>&categoryID=<?php echo $categoryID; ?>'">Start Quiz</button>
</body>
</html>
<?php
    } else {
        echo "Quiz not found.";
    }
} else {
    echo "Invalid request.";
}
?>
