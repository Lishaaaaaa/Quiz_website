<?php
include "../shared/footer.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            /* background: #250821; */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: black;
            overflow-x: hidden;
        }
        
        /* header {
            width: 100%;
            height: 100vh;
            background-size: cover;
            font-family: sans-serif;
        }
         */
        .navbar {
            background-color: #12f7ff;
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
            color: black;
            font-weight: bold;
        }
        
        .nav-links a:hover {
            color: purple;
        }
        
        .burger-menu {
            display: none;
            color: black;
            font-size: 1.5em;
            cursor: pointer;
            padding: 0;
        }
        
        .link {
            background: none;
            border: none;
            text-decoration: none;
            color: black;
            font-weight: bold;
            font-size: inherit;
            font-family: inherit;
            cursor: pointer;
        }
        
        .link:hover {
            color: purple;
        }
        
        .dropdown.active>.link,
        .link:hover {
            color: black;
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
        
        .logout a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            font-size: 15px;
            background: purple;
            border-radius: 8px;
            transition: 0.4s;
        }
        
        .logout a:hover {
            background: transparent;
            border: 1px solid purple;
        }
        li{
            list-style-type: none;
        }
        
        
        @media screen and (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                height: 100%;
                width: 60%;
                top: 50px;
                right: 0;
                overflow: hidden;
                background-color: #12f7ff;
                transform-origin: 0 0;
                transition: transform 0.6s ease;
                transition-delay: var(--delay-open);
            }
            .nav-links.show {
                display: flex;
            }
            .nav-links li {
                margin: 0;
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
            .logout {
                margin: 0;
                text-align: center;
                padding: 10px;
            }
            .hide {
                display: none;
            }
        }
    </style>
    <title>Responsive Navigation</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">QuizWiz</div>
            <ul class="nav-links">
             
                <li><a href="#">Change </a></li>
                <div class="logout">
                <a href="../shared/logout.php">Logout</a>
             </div>
            </ul>
        
        </div>
        <div class="burger-menu">&#9776;</div>
        </div>
        </div>
    </header>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const burgerMenu = document.querySelector('.burger-menu');
            const navLinks = document.querySelector('.nav-links');

            burgerMenu.addEventListener('click', function() {
                navLinks.classList.toggle('show');
            });
        });
        document.addEventListener('click', e => {
            const isDropdownButton = e.target.matches("[data-dropdown-button]")
            if (!isDropdownButton && e.target.closest('[data-dropdown]') != null) return
            let currentDropdown
            if (isDropdownButton) {
                currentDropdown = e.target.closest('[data-dropdown]')
                currentDropdown.classList.toggle('active')
            }
            document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
                if (dropdown === currentDropdown) return
                dropdown.classList.remove('active')
            })
        })
        var burgerMenu = document.querySelector('.burger-menu');

        function toggleMenu() {
            burgerMenu.classList.toggle('hide');
        }
        burgerMenu.addEventListener('click', toggleMenu);
    </script>

      
   
</body>

</html>