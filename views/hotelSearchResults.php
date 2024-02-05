<?php foreach ($hotels as $hotel): ?>
<div class="hotel">
    <h3><?php echo htmlspecialchars($hotel['name']); ?></h3>
    <p><?php echo htmlspecialchars($hotel['description']); ?></p>
    <p>Location: <?php echo htmlspecialchars($hotel['location']); ?></p>
</div>
<?php endforeach; ?>
