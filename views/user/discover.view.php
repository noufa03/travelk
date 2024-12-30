<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>
<?php require (BASE_PATH.'views/partials/user/nav.php');?>

<div class="container">
    <?php if (!empty($places)): ?>
        <div class="places-container">
            <?php foreach ($places as $place): ?>
                <div class="place-card">
                    <img src="<?= BASE_PATH . 'assets/homepage' . $place['image'] ?>" alt="<?= htmlspecialchars($place['display_name']) ?>" class="place-image">
                    <div class="place-details">
                        <h3><?= htmlspecialchars($place['display_name']) ?></h3>
                        <p>City: <?= htmlspecialchars($place['city']) ?></p>
                        <p>Type: <?= htmlspecialchars($place['location_type']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="no-places-watermark">
            <p>Oops! We couldn't find any places for you. Please check back later or try exploring other categories.</p>
        </div>
    <?php endif; ?>
</div>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>
