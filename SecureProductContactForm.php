<?php
// GitHub repo: https://github.com/keani-julian/cs85-module3b-createform

// PHP submission handling logic
$submitted = false;
$full_name = $email = $topic = $message = '';

// Detect a POST submission from this form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $submitted = true;

    // Read the user input from the $_POST superglobal
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $message = $_POST['message'];
}
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

<?php if ($submitted): ?>
    <p>Thank you, <?= $full_name ?>! We received your message about: "<?= $topic ?>"</p>
    <p>We'll get back to you at <?= $email ?>.</p>
<?php endif; ?>

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
