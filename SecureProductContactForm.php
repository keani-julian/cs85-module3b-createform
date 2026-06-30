<?php
// GitHub repo: https://github.com/keani-julian/cs85-module3b-createform

// PHP submission handling logic
$submitted = false;
$errors    = [];
$full_name = $email = $topic = $message = '';

// Detect a POST submission from this form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    // Read and trim the user input from the $_POST superglobal
    $full_name = trim($_POST['full_name']);
    $email     = trim($_POST['email']);
    $topic     = trim($_POST['topic']);
    $message   = trim($_POST['message']);

    // Validate inputs
    if ($full_name === '') {
        $errors[] = 'Full name is required.';
    }
    if ($email === '') {
        $errors[] = 'Email address is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if ($topic === '') {
        $errors[] = 'Topic of message is required.';
    }
    $word_count = $message === '' ? 0 : str_word_count($message);
    if ($message === '') {
        $errors[] = 'Message of 50-150 words is required.';
    } elseif ($word_count < 50 || $word_count > 150) {
        $errors[] = "Message must be 50-150 words (you wrote $word_count).";
    }

    // Submission succeeds only when there are no errors
    if (empty($errors)) {
        $submitted = true;
    }
}

// Sanitize output with htmlspecialchars() to prevent XSS
function clean($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
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
    <!-- Success = every value escaped with clean() before output -->
    <p>Thank you, <?= clean($full_name) ?>! We received your message about: "<?= clean($topic) ?>"</p>
    <p>We'll get back to you at <?= clean($email) ?>.</p>
<?php else: ?>

    <?php if (!empty($errors)): ?>
    <!-- Show any validation errors to user-->
    <ul>
        <?php foreach ($errors as $error): ?>
        <li><?= clean($error) ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <!-- Self-processing form: action="" posts back to this same file -->
    <form action="" method="POST">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" value="<?= clean($full_name) ?>" required><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="<?= clean($email) ?>" required><br>

        <label for="topic">Topic of Message:</label>
        <input type="text" id="topic" name="topic" value="<?= clean($topic) ?>" required><br>

        <label for="message">Message (50–150 words):</label>
        <textarea id="message" name="message" rows="6" required><?= clean($message) ?></textarea><br>

        <button type="submit" name="submit" value="Send Message">
            Send Message
        </button>
    </form>
<?php endif; ?>
</body>
</html>
