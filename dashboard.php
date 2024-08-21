<?php
include 'functions/auth.php';
include 'includes/header.php';

if (!is_logged_in()) {
    header("Location: login.php");
    exit();
}

?>

<h2>Dashboard</h2>
<p>Welcome, <?php echo $_SESSION['user_id']; ?>!</p>
<p>This is your dashboard where you can manage your content.</p>
<?php if (is_admin()): ?>
    <p><a href="admin/dashboard.php">Go to Admin Dashboard</a></p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
