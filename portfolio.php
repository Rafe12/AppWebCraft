<?php
include 'functions/db.php';
include 'includes/header.php';

$sql = "SELECT * FROM portfolio_items ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<h2>Portfolio</h2>
<?php while ($item = $result->fetch_assoc()): ?>
    <div class="portfolio-item">
        <h3><?php echo $item['title']; ?></h3>
        <p><?php echo $item['description']; ?></p>
        <?php if (!empty($item['image_path'])): ?>
            <img src="<?php echo $item['image_path']; ?>" alt="<?php echo $item['title']; ?>">
        <?php endif; ?>
    </div>
<?php endwhile; ?>

<?php include 'includes/footer.php'; ?>
