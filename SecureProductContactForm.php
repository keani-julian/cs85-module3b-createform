<?php
// GitHub repo: https://github.com/keani-julian/cs85-module3b-createform
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Product Contact Form</title>
</head>
<body>
    <h1>Product Contact Form</h1>

    <!-- Self-processing form: action="" posts back to this same file -->
    <form action="" method="POST">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="topic">Topic of Message:</label>
        <input type="text" id="topic" name="topic" required><br>

        <label for="message">Message (50–150 words):</label>
        <textarea id="message" name="message" rows="6" required></textarea><br>

        <button type="submit" name="submit" value="Send Message">
            Send Message
        </button>
    </form>
</body>
</html>
