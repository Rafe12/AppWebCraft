<?php
include 'functions/auth.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (signup($username, $email, $password)) {
        echo "<p>Signup successful. You can now <a href='login.php'>login</a>.</p>";
    } else {
        echo "<p>Signup failed. Please try again.</p>";
    }
}
?>

<h2>Signup</h2>
<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Signup</button>
</form>

<?php include 'includes/footer.php'; ?>
