<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Responsive Navigation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        header {
            width: 100%;
            background-size: cover;
            font-family: sans-serif;
            position: fixed;
            top: 0;
            left: 0;
        }

        .navbar {
            background-color: #050635;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
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

        .nav-links a {
            text-decoration: none;
            color: rgb(220, 219, 219);
            font-weight: bold;
            font-size: 1.1em;
            margin: 0 15px;
            letter-spacing: 1px;
        }

        .nav-links a:hover {
            color: purple;
        }

        .nav-links a:hover {
            color: purple;
        }

        .burger-menu {
            display: none;
            color: white;
            font-size: 1.5em;
            cursor: pointer;
            padding: 0;
            margin-right: 15px;
           
        }

        .link {
            background: none;
            border: none;
            text-decoration: none;
            color: rgb(229, 212, 212);
            font-weight: bold;
            font-size: inherit;
            font-family: inherit;
            cursor: pointer;
        }

        .link:hover {
            color: purple;
        }

        .dropdown button:hover {
            color: purple;
        }

        .dropdown.active>.link,
        .link:hover {
            color: rgb(220, 216, 216);
        }

        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            left: 0;
            top: calc(100% + .25rem);
            background-color: white;
            padding: .75rem;
            border-radius: .25rem;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .3);
            opacity: 0;
            pointer-events: none;
            transform: translateY(-10px);
            transition: opacity 150ms ease-in-out, transform 150ms ease-in-out;
        }

        .dropdown.active>.link+.dropdown-menu {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .information-grid {
            display: grid;
            grid-template-columns: repeat(2, max-content);
            gap: 2rem;
        }

        .dropdown-links {
            display: flex;
            flex-direction: column;
            gap: .25rem;
        }

        .logout {
            margin-right: 25px;
        }

        .logout a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            font-size: 15px;
            background: purple;
            border-radius: 8px;
            transition: 0.4s;
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            margin-left: 25px;
        }

        .logout a:hover {
            background: transparent;
            border: 1px solid purple;
        }

     

        .logo-container img {
            height: 100px;
            border-radius: 75px;
        }

        @media screen and (max-width: 768px) {


            .nav-links {
                display: none;
                flex-direction: column;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                overflow-y: auto;
                background-color: #050635;
                text-align: center;
                transform-origin: 0 0;
                transition: transform 0.6s ease;
                transition-delay: var(--delay-open);
                z-index: 100;
            }

            .nav-links.show {
                display: flex;
                margin-top: 130px;
            }

            .nav-links li {
                margin: 0;
                text-align: center;
                padding: 10px;
                width: 100%;
            }

            .burger-menu {
                display: block;
                position: fixed;
                top: 15px;
                right: 15px;
                z-index: 101;
                /* hamburger menu is displayed above navigation links */
            }

            .logout {
                display: flex;
                justify-content: flex-end;
                margin:0 auto;
            }

            .logout a {
                padding: 5px 10px;
            }


            .category-container {
                width: 90%;
                margin: 50px auto 0;
            
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
    $isMenuOpen = false; // Set this variable based on your logic to determine if the menu is open


    ?>

    <header>
        <div class="navbar">
            <div class="logo-container">
                <img src="quiz_logo.jpeg" alt="QUIZ WIZ.png">
            </div>
            <ul class="nav-links">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./dashboard.php">User Dashboard</a></li>
                <li><a href="category.php">Category</a></li>


                <li><a href="contact.php">Contact Us</a></li>
                <div class="logout">
                    <a href="./shared/logout.php">Logout</a>
                </div>
            </ul>
            <div class="burger-menu">&#9776;</div>
        </div>
    </header>

    <script>
        let isMenuOpen = false;

        document.addEventListener('DOMContentLoaded', function() {
            const burgerMenu = document.querySelector('.burger-menu');
            const navLinks = document.querySelector('.nav-links');

            burgerMenu.addEventListener('click', function() {
                navLinks.classList.toggle('show');
            });

        
        });

     
  
    </script>
 
</body>

</html>