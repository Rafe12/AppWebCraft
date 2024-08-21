<?php
include 'functions/db.php';
include 'includes/header.php';

$sql = "SELECT * FROM blog_posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<h2>Blog</h2>
<?php while ($post = $result->fetch_assoc()): ?>
    <div class="blog-post">
        <h3><?php echo $post['title']; ?></h3>
        <p><?php echo substr($post['content'], 0, 150) . '...'; ?></p>
        <a href="blog_post.php?id=<?php echo $post['id']; ?>">Read More</a>
    </div>
<?php endwhile; ?>

<?php include 'includes/footer.php'; ?>
