<?php foreach ($tours as $tour): ?>
<div class="tour">
    <h3><?php echo htmlspecialchars($tour['title']); ?></h3>
    <p><?php echo htmlspecialchars($tour['description']); ?></p>
    <p>Location: <?php echo htmlspecialchars($tour['location']); ?></p>
</div>
<?php endforeach; ?>
