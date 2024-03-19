<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Image Carousel</title>
    <style>
        * {
            padding: 0;
            box-sizing: border-box;
        }

        footer {
            background-color: #050635;
            text-align: center;
            padding: 10px;
            color: #fff;
            font-size: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            overflow-y: auto;

        }



        .navbar {
            background-color: #050635;
            padding: 11px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            color: #fff;
            font-size: 1.5em;
            text-decoration: none;
        }

        .navbar-links {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar-links li {
            margin-right: 15px;
        }

        .navbar-links li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .navbar-links li a:hover {
            color: purple;
        }

        .slider {
            width: 100%;
            height: 350px;
            position: relative;
            overflow: hidden;
            border-radius: 1px;
        }

        .slide {
            width: 100%;
            height: 350px;
            position: absolute;
            transition: all 0.5s;
            top: 0;
        }

        .slide img {
            width: 100%;
            object-fit: cover;
            height: 400px;
        }

        .btn {
            position: absolute;
            width: 40px;
            height: 40px;
            padding: 10px;
            border: none;
            border-radius: 50%;
            z-index: 10px;
            cursor: pointer;
            background-color: #fff;
            font-size: 18px;
        }

        .btn:active {
            transform: scale(1.1);
        }

        .btn-prev {
            top: 45%;
            left: 2%;
        }

        .btn-next {
            top: 45%;
            right: 2%;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .cat-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            border-radius: 10px;
        }

        .cat {
            width: calc(50% - 10px);
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            transition: transform 0.3s ease;
            background: linear-gradient(to right, #ffcc00 50%, #66ccff 50%);
        }

        .cat:hover {
            transform: scale(1.05);
        }

        .image-container {
            width: 200px;
            height: auto;
            border: 1px solid #000;
            overflow: hidden;
            display: block;
            margin: 0 auto;
            transition: transform 0.3s ease;
            border-radius: 10px;
        }

        .logo {
            color: black;
            font-size: 1.5em;
        }

        .logo-container img {
            height: 100px;
            border-radius: 75px;
        }

        .image-container:hover {
            transform: scale(1.1);
        }

        .burger-menu {
            display: none;
       
            color: white;
            font-size: 1.5em;
            cursor: pointer;
            padding: 0;
            margin-right: 15px;
        }

        /* Adjust the position of the hamburger menu */
     


        @media screen and (max-width: 768px) {
            .container {
                max-width: 90%;
                padding: 10px;
            }

            .cat-container {
                flex-direction: column;
            }

            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }


            .cat {
                width: 100%;
                margin-bottom: 20px;
            }

            .slider {
                height: 250px;
            }

            .slide img {
                height: 250px;
            }

            .navbar {
                padding: 10px;

            }

            .navbar-links {
                display: none;
                flex-direction: column;
                background-color: #050635;
                position: absolute;
                top: 60px;
                /* Adjust based on your navbar height */
                left: 0;
                width: 100%;
                padding: 20px;
                box-sizing: border-box;
                z-index: 100;
            }

            .navbar-links li {
                margin: 0;
                text-align: center;
                padding: 10px;
                width: 100%;
            }

            .navbar-links.show {
                display: flex;
                margin-top: 65px;
            }

            .burger-menu {
                display: inline;
          
                top: 15px;
                right: 15px;
                z-index: 101;

            }


        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo-container">
            <img src="quiz_logo.jpeg" alt="QUIZ WIZ.png">
        </div>
        <ul class="navbar-links">

            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="./shared/register.html">Sign Up</a></li>
            <li><a href="./shared/login.html">Sign In</a></li>
        </ul>
        <div class="burger-menu">&#9776;</div>

    </div>
    <!-- Slider container -->
    <div id="home">
        <div class="slider">

            <div class="slide">
                <img src="./images/quiz1.png" alt="Carousel Image" />
            </div>

            <div class="slide">
                <img src="./images/quiz2.jpg" alt="Carousel Image" />
            </div>

            <div class="slide">
                <img src="./images/game.avif" alt="Carousel Image" />
            </div>

            <div class="slide">
                <img src="./images/quiz3.jpg" alt="Carousel Image" />
            </div>



            <!-- Next and Previous buttons -->
            <button class="btn btn-next">></button>
            <button class="btn btn-prev">
                <</button>
        </div>


        <div class="container">
            <center>
                <div id="about">
                    <h1>About Us</h1>
                    <b>Welcome to Quiz-Wiz!</b>
                    At Quiz-Wiz, we are passionate about knowledge, learning, and, of course, having fun! Our platform is designed to provide an engaging and interactive quiz experience for users of all ages. Whether you're a trivia enthusiast, a student looking to reinforce your knowledge, or just someone who enjoys a good challenge, we have something for everyone.
                    Created by students, for students, our platform is designed to cater to the diverse interests and learning styles of users of all ages. Whether you're a seasoned trivia buff, a curious learner, or someone looking to test your knowledge in a specific subject area, Quiz-Wiz has something exciting in store for you.

                    <h2>What Sets Us Apart?</h2>
                    Diverse Content: We curate a wide range of quizzes spanning various topics, from general knowledge and science to pop culture and history. There's always something new to discover!

                    User-Friendly Interface: Our user-friendly interface ensures a seamless and enjoyable quiz-taking experience. Whether you're a tech-savvy user or new to online quizzes, our platform is designed with you in mind.

                    Community Engagement: Join our vibrant community of quiz enthusiasts! Share your scores, challenge friends, and participate in discussions. Connect with like-minded individuals who share your passion for learning.
                </div>

            </center>
        </div>
        <div class="cat-container">
            <div class="cat">
                <h2>SPORTS</h2>
                <img src="./images/image3.jpg" class="image-container">
                <p>Hi there! Are You looking for Quiz on Sports?

                    Well, We got You covered! In this article, You'll find Sports Quiz on various Important Topics and Questions.</p>
            </div>

            <div class="cat">
                <h2>GENERAL KNOWLEDGE</h2>
                <img src="./images/image2.jpg" class="image-container">
                <p>Knowing about general knowledge can be super fun and exciting.

                    Why not test your general knowledge trivia with some of the awesome quizzes on the list? </p>
            </div>

            <div class="cat">
                <h2>MOVIES</h2>
                <img src="./images/imade1.png" class="image-container">
                Hi there! Are You looking for Quiz on Movies?
                <p>If you love cinema, and you consider yourself a true movie buff,then we've got the perfect list of questions for you!</p>
            </div>

            <div class="cat">
                <h2>KIDS</h2>
                <img src="./images/image4.jpg" class="image-container">
                <p>Are you looking for a fun and interesting activity for kids? We are here to help!

                    This General Knowledge Quiz for Kids is a great way to challenge your child's understanding of the world.</p>
            </div>

            <div class="cat">
                <h2>PROGRAMMING</h2>
                <img src="./images/image5.jpeg" class="image-container">
                <p>Quizzes on Programming Languages
                    C
                    C++
                    JAVA
                    Python
                    Why not test your general knowledge trivia with some of the awesome quizzes on the list?
                </p>
            </div>

            <div class="cat">
                <h2>SOCIAL</h2>
                <img src="./images/image6.jpg" class="image-container">
                <p>
                    Incorporating quiz questions into your study routine can be a great way to test your knowledge and identify areas for improvement.
                    Good luck with your studies!</p>
            </div>
        </div>
    </div>
    <footer>&#169; Created By QuizWiz | All rights are reserved.</footer>
    <script>
        "use strict";
        // Select all slides
        const slides = document.querySelectorAll(".slide");

        // loop through slides and set each slides translateX
        slides.forEach((slide, indx) => {
            slide.style.transform = `translateX(${indx * 100}%)`;
        });

        // select next slide button
        const nextSlide = document.querySelector(".btn-next");

        // current slide counter
        let curSlide = 0;
        // maximum number of slides
        let maxSlide = slides.length - 1;

        // add event listener and navigation functionality
        nextSlide.addEventListener("click", function() {
            // check if current slide is the last and reset current slide
            if (curSlide === maxSlide) {
                curSlide = 0;
            } else {
                curSlide++;
            }

            //   move slide by -100%
            slides.forEach((slide, indx) => {
                slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
            });
        });

        // select next slide button
        const prevSlide = document.querySelector(".btn-prev");

        // add event listener and navigation functionality
        prevSlide.addEventListener("click", function() {
            // check if current slide is the first and reset current slide to last
            if (curSlide === 0) {
                curSlide = maxSlide;
            } else {
                curSlide--;
            }

            //   move slide by 100%
            slides.forEach((slide, indx) => {
                slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
            });
        });
    </script>
    <script>
        // Smooth scrolling to anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <script>
   document.addEventListener('DOMContentLoaded', function () {
    const burgerMenu = document.querySelector('.burger-menu');
    const navLinks = document.querySelector('.navbar-links');

    burgerMenu.addEventListener('click', function () {
        navLinks.classList.toggle('show');
        
        // Toggle the "fixed" class on the hamburger menu based on the visibility of navbar links
        burgerMenu.classList.toggle('fixed', navLinks.classList.contains('show'));
    });
});

    </script>


</body>

</html>