<?php
include 'functions/auth.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (login($email, $password)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<p>Invalid email or password.</p>";
    }
}
?>

<h2>Login</h2>
<form method="POST" action="">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Login</button>
</form>

<?php include 'includes/footer.php'; ?>
