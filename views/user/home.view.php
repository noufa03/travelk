<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>
<?php require (BASE_PATH.'views/partials/user/nav.php');?>
<div class="homepage-picture-container">
    <div class="container">
        <main>
            <div class="box">
                <h1 class="header-1">Let's explore <span class="h1-SriLK">Sri Lanka!</span></h1>
                <p class="slogan">Your Ultimate Guide to Explore Sri Lanka's Rich Heritage and Natural Beauty</p>
            </div>
        </main>
    </div>
</div>
<div class="search-container">
    <section class="hero">
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
<?php require (BASE_PATH.'views/partials/user/nav-2.php');?>
<div class="container">
    <?php if (!empty($places)): ?>
        <div class="places-container">
            <?php foreach ($places as $place): ?>
                <div class="place-card">
                    <div class="place-details">
                        <?php if ($place['location_type'] === 'restaurant'): ?>
                            <a href="/resturent?id=<?= urlencode($place['locationid']) ?>">
                                <img src="/<?= htmlspecialchars($place['photos'] . DIRECTORY_SEPARATOR . $place['photo_name']) ?>" alt="<?= htmlspecialchars($place['display_name']) ?>" class="place-image">
                                <h3><?= htmlspecialchars($place['display_name']) ?></h3>
                                <p>City: <?= htmlspecialchars($place['city']) ?></p>
                                <p>Type: <?= htmlspecialchars($place['location_type']) ?></p>
                            </a>
                        <?php elseif ($place['location_type'] === 'accommodation'): ?>
                            <a href="/hotel?id=<?= urlencode($place['locationid']) ?>">
                                <img src="/<?= htmlspecialchars($place['photos'] . DIRECTORY_SEPARATOR . $place['photo_name']) ?>" alt="<?= htmlspecialchars($place['display_name']) ?>" class="place-image">
                                <h3><?= htmlspecialchars($place['display_name']) ?></h3>
                                <p>City: <?= htmlspecialchars($place['city']) ?></p>
                                <p>Type: <?= htmlspecialchars($place['location_type']) ?></p>
                            </a>
                        <?php elseif ($place['location_type'] === 'place'): ?>
                            <a href="/place?id=<?= urlencode($place['locationid']) ?>">
                                <img src="/<?= htmlspecialchars($place['photos'] . DIRECTORY_SEPARATOR . $place['photo_name']) ?>" alt="<?= htmlspecialchars($place['display_name']) ?>" class="place-image">
                                <h3><?= htmlspecialchars($place['display_name']) ?></h3>
                                <p>City: <?= htmlspecialchars($place['city']) ?></p>
                                <p>Type: <?= htmlspecialchars($place['location_type']) ?></p>
                            </a>
                        <?php endif; ?>
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
<footer>
    © 2024 traveLK. All rights reserved.
</footer>
<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>