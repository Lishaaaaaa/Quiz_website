<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dbms.css">
    <title>Responsive Navigation</title>
    <style>
        body {
 
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color:black;
    overflow-x: hidden;
}
header{
    width:100%;
    /* height:100vh; */
    background-size:cover;
    font-family: sans-serif;
}
.navbar {
    background-color:#12f7ff;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.logo {
    color: black;
    font-size: 1.5em;
}
.nav-links {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.nav-links li {
    margin-right: 15px;
}
.nav-links a {
    text-decoration: none;
    color:black;
    font-weight: bold;
}
.nav-links a:hover{
   color:purple;
}
.burger-menu {
    display: none;
    color:black;
    font-size: 1.5em;
    cursor: pointer;
    padding:0;
}
.link{
    background: none;
    border: none;
    text-decoration: none;
    color:black;
    font-weight: bold;
    font-size: inherit;
    font-family: inherit;
    cursor: pointer;
}
.link:hover{
    color:purple;
 }
.dropdown.active > .link, .link:hover{
    color: black;
}
.dropdown{
    position:relative;
}
.dropdown-menu{
    position: absolute;
    left:0;
    top:calc(100% + .25rem);
    background-color: white;
    padding:.75rem;
    border-radius: .25rem;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.3);
 opacity:0;
 pointer-events: none;
 transform:translateY(-10px);
 transition: opacity 150ms ease-in-out,transform 150ms ease-in-out;
}
.dropdown.active > .link +.dropdown-menu{
 opacity: 1;
 transform: translateY(0);
 pointer-events: auto;
}
.information-grid{
    display: grid;
    grid-template-columns: repeat(2, max-content);
    gap:2rem;
}
.dropdown-links{
    display: flex;
    flex-direction: column;
    gap: .25rem;
}
.logout a{
    text-decoration: none;
  color: white;
  padding: 5px 10px;
  font-size: 15px;
  background: purple;
  border-radius: 8px;
  transition: 0.4s;
}
.logout a:hover{
background: transparent;
border: 1px solid purple;
}
.footer{
    position:fixed;
    bottom: 0;
    text-align:center;
    padding:15px;
    background:#12f7ff;
    color:black;
}
@media screen and (max-width: 768px) {
    .nav-links {
        display: none;
        flex-direction: column;
        position: absolute;
        height:100%;
        width: 60%;
        top: 50px;
        right: 0;
        overflow: hidden;
        background-color:#12f7ff;
        transform-origin: 0 0;
        transition: transform 0.6s ease;
        transition-delay: var(--delay-open);
    }
    .nav-links.show {
        display: flex;
    }
    .nav-links li {
        margin:0;
        text-align: center;
       padding: 10px;
       
    }
    .burger-menu {
        display: block;
         position: absolute;
         padding: 15px;
        top: 0;
        right: 0; 
    }
    .logout{
        margin:0;
        text-align: center;
       padding: 10px;
    }
    .hide{
        display: none;
    }
}
    </style>
</head>
<body>
<?php
// session_start(); // Start or resume the session

// Check if a category is selected, then set $_SESSION['categoryID']
if (isset($_GET['category'])) {
    $_SESSION['categoryID'] = $_GET['category'];
}
?>

<header>
<div class="navbar">
    <div class="logo">QuizWiz</div>
    <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="leaderboard.php">User Dashboard</a></li>
        <li><div class="dropdown" data-dropdown>
            <button class="link" data-dropdown-button>Category</button>
            <div class="dropdown-menu information-grid">
             <div>
                <div class="dropdown-heading"><a href="./quizzes.php?category=<?php echo isset($_SESSION['categoryID']) ? $_SESSION['categoryID'] : ''; ?>" class="link">Programming</a></div>
                <!-- <div class="dropdown-links">
                    <a href="#" class="link">C/C++</a>
                    <a href="#" class="link">Java/Python</a>
                    <a href="#" class="link">HTML</a>
                    </div> -->
             </div>
             <div>
                <div class="dropdown-heading"> <a href="./quizzes.php?category=<?php echo isset($_SESSION['categoryID']) ? $_SESSION['categoryID'] : ''; ?>" class="link">Sports</a></div>
                <!-- <div class="dropdown-links">
                    <a href="#" class="link">Cricket</a>
                    <a href="#" class="link">Football</a>
                    <a href="#" class="link">Volleyball</a>
                    </div> -->
             </div>
             <div>
                <div class="dropdown-heading"><a href="./quizzes.php?category=<?php echo isset($_SESSION['categoryID']) ? $_SESSION['categoryID'] : ''; ?>" class="link">Movie</a></div>
                <!-- <div class="dropdown-links">
                    <a href="#" class="link">Horror</a>
                    <a href="#" class="link">Comedy</a>
                    <a href="#" class="link">Action</a>
                    </div> -->
             </div>
             <div>
                <div class="dropdown-heading"><a href="./quizzes.php?category=<?php echo isset($_SESSION['categoryID']) ? $_SESSION['categoryID'] : ''; ?>" class="link">Social</a></div>
                <!-- <div class="dropdown-links">
                    <a href="#" class="link">History</a>
                    <a href="#" class="link">Geography</a>
                    <a href="#" class="link">Politics</a>
                    </div> -->
             </div>
             <div>
                <div class="dropdown-heading"><a href="./quizzes.php?category=<?php echo isset($_SESSION['categoryID']) ? $_SESSION['categoryID'] : ''; ?>" class="link">Knowledge</a></div>
                <!-- <div class="dropdown-links">
                    <a href="#" class="link">Nature</a>
                    <a href="#" class="link">Logo Identify</a>
                    <a href="#" class="link">Thinking</a>
                    </div> -->
             </div>
             <div>
                <div class="dropdown-heading"><a href="./quizzes.php?category=<?php echo isset($_SESSION['categoryID']) ? $_SESSION['categoryID'] : ''; ?>" class="link">Kids</a></div>
                <!-- <div class="dropdown-links">
                    <a href="#" class="link">Simple Quiz</a>
                    <a href="#" class="link">Cartoon</a>
                    <a href="#" class="link">Image Identify</a>
                    </div> -->
             </div>
             </div></div></li>
            
        <li><a href="dish.php">Contact Us</a></li>
        <!-- <li><a href="contact.php">Contact Us</a></li> -->
        <div class="logout">
            <a href="./shared/logout.php">Logout</a>
            </div>
    </ul> 
    </div>
    <div class="burger-menu">&#9776;</div>
</div>
</div> 
</header>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const burgerMenu = document.querySelector('.burger-menu');
    const navLinks = document.querySelector('.nav-links');

    burgerMenu.addEventListener('click', function () {
        navLinks.classList.toggle('show');
    });
});
document.addEventListener('click', e =>{
    const isDropdownButton = e.target.matches("[data-dropdown-button]")
    if(!isDropdownButton && e.target.closest('[data-dropdown]') != null) return
    let currentDropdown
    if(isDropdownButton){
currentDropdown = e.target.closest('[data-dropdown]')
currentDropdown.classList.toggle('active')
    }
    document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
        if(dropdown === currentDropdown) return
        dropdown.classList.remove('active')
    })
})
var burgerMenu = document.querySelector('.burger-menu');
function toggleMenu() {
    burgerMenu.classList.toggle('hide');
}
burgerMenu.addEventListener('click', toggleMenu);
</script>
<div class="footer">
    <footer>&#169 Created By QuizWiz | All rights are reserved.</footer>
</div>
</body>
</html>
