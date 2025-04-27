<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>
<?php require (BASE_PATH.'views/partials/user/nav.php');?>
<br>
<?php require (BASE_PATH.'views/partials/user/nav-2.php');?>

<br>
<div class="search-container">
    <section class="hero">
        <!-- <h1 class="hero-text">Where to?</h1> -->
        <div class="search-bar">
            <form method="GET" action="/?destination=<?= htmlspecialchars($_GET['destination'] ?? '') ?>">
                <div class="search-inputs">
                    <div class="input-group">
                        <label for="destination">Where to</label>
                        <input type="text" id="destination" name="destination" placeholder="Search destinations" value="<?= htmlspecialchars($_GET['destination'] ?? '') ?>">
                    </div>
                    <button type="submit" class="search-button">
                        <i class='bx bx-search' style="font-size: 1.2rem;"></i>
                    </button>
                </div>  
            </form>
        </div>
    </section>
</div>
<br>

<div class="container">
    <?php if (!empty($places)): ?>
        <div class="places-container">
            <?php foreach ($places as $place): ?>
                <div class="place-card">
                    <?php
                    echo '<img src="' . $place['photos'] . DIRECTORY_SEPARATOR . $place['photo_name'] . '" alt="' . htmlspecialchars($place['display_name']) . '" class="place-image">';
                    ?>
                    <div class="place-details">
                        <a href="/hotel?id=<?= urlencode($place['locationid']) ?>">
                            <h3><?= htmlspecialchars($place['display_name']) ?></h3>
                            <p>City: <?= htmlspecialchars($place['city']) ?></p>
                            <p>Type: <?= htmlspecialchars($place['location_type']) ?></p>
                            <!-- <p class="rating">★ <?= htmlspecialchars($place['rating']) ?></p>
                            <p class="price">Rs. <?= htmlspecialchars($place['price']) ?> night</p> -->
                        </a>
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

<!-- Footer -->
<footer>
    © 2024 traveLK. All rights reserved.
</footer>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>

