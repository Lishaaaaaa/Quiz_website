<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>social media</title>
</head>
<body>
    <!-- Inside your HTML body -->
<div class="container">
    <!-- Dashboard content here -->
    
    <!-- Share buttons -->
    <div class="section">
        <!-- Facebook Share Button -->
        <a class="dashboard-link" href="https://www.facebook.com/sharer/sharer.php?u=YOUR_PAGE_URL&quote=Check%20out%20my%20score:%20<?php echo $score; ?>" target="_blank">
            Share on Facebook
        </a>
        
        <!-- Twitter Share Button -->
        <a class="dashboard-link" href="https://twitter.com/intent/tweet?url=YOUR_PAGE_URL&text=Check%20out%20my%20score:%20<?php echo $score; ?>" target="_blank">
            Share on Twitter
        </a>
    </div>
</div>

</body>
</html>