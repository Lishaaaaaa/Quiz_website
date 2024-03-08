<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Question</title>
</head>
<body>
<form action="add_quiz.php" method="post">
<div>
    <label>New Category Name:</label>
    <input type="text" name="newCategoryName" id="newCategoryName"><br>
</div>

<div id="newTitleDiv">
    <label>Quiz Title:</label>
    <input type="text" name="newtitle"><br>
</div>

<label for="question">Question:</label>
<textarea name="question" id="question" rows="3" required></textarea><br>

<label for="options">Option1:</label>
<input type="text" name="option1"><br>
<label for="options">Option2:</label>
<input type="text" name="option2"><br>
<label for="options">Option3:</label>
<input type="text" name="option3"><br>
<label for="options">Option4:</label>
<input type="text" name="option4"><br>
<label for="options">Correct Option: </label>
<input type="text" name="correct_option"><br>

<button type="submit">Submit</button>
</form>
</body>
</html>
