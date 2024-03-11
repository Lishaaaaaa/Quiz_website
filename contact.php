<?php
include "./shared/navbar.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: relative;
        }

        form {
            margin-top: 130px;
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
           box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #4caf50;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background-color: #2E8B57;
        }

        .message-container {
            position: absolute;
            top: 140px;
            left: 50%;
            transform: translateX(-50%);
            width: 400px;
            max-width: 100%;
            z-index: 999;
            pointer-events: none;
        }

        .message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            font-weight: bold;
            opacity: 0;
            animation: slideIn 0.5s ease-in-out forwards, fadeOut 1.3s ease-in-out forwards;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
            }
            to {
                transform: translateY(0);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }

        .error-message {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>
</head>
<body>

    <form id="contactForm">
        <h1>Contact Us</h1>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="button" onclick="sendEmail()">Send Message</button>
    </form>

    <div class="message-container" id="messageContainer"></div> <!-- Container for success/error messages -->

    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
    <script>
        emailjs.init("CqOO6J6Xf_TDZA3xO");

        function sendEmail() {
            const form = document.getElementById("contactForm");
            emailjs.sendForm("service_64srsjx", "template_0bu29ck", form)
                .then((response) => {
                    console.log("Email sent successfully:", response);
                    displayMessage("success", "Your message has been sent successfully!");
                    form.reset();
                })
                .catch((error) => {
                    console.error("Failed to send email:", error);
                    displayMessage("error", "Oops! Something went wrong. Please try again later.");
                });
        }

        function displayMessage(type, message) {
            const messageContainer = document.getElementById("messageContainer");
            const messageElement = document.createElement("div");
            messageElement.textContent = message;
            messageElement.classList.add("message", type + "-message"); // Add class based on message type
            messageContainer.appendChild(messageElement);

            // Triggering reflow to enable CSS animation
            void messageElement.offsetWidth;

            // Show message with animation
            messageElement.style.opacity = 1;

            // Hide message after a delay
            setTimeout(() => {
                messageElement.style.opacity = 0;
                // Remove the message from the DOM after animation completes
                setTimeout(() => {
                    messageElement.remove();
                }, 500);
            }, 3000); // Adjust the delay as needed
        }
    </script>
</body>
</html>
