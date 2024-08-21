<?php
include 'functions/db.php';
include 'templates/csrf.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (verify_csrf_token($_POST['csrf_token'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact_submissions (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo "<p>Thank you for contacting us. We'll get back to you soon.</p>";
        } else {
            echo "<p>Failed to send your message. Please try again.</p>";
        }
    } else {
        echo "<p>Invalid CSRF token!</p>";
    }
}
?>

<h2>Contact Us</h2>
<form method="POST" action="">
    <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>
    <button type="submit">Send Message</button>
</form>

<?php include 'includes/footer.php'; ?>
