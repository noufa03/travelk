<?php require(BASE_PATH . 'views/partials/user/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/styles.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/nav.php'); ?>
<br>
<?php require(BASE_PATH . 'views/partials/user/nav-2.php'); ?>
<br><br>
<div class="container">
    <?php if (!empty($allcars)): ?>
        <div class="places-container" style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr">
            <!-- <div> -->
            <!-- <h1>with drivers</h1> -->
             <?php foreach ($allcars as $allcar): ?>

                <div class="place-card">
               
                    <div class="place-details">
                        <!-- <a href="/resturent?id=<?= urlencode($allcar['locationid']) ?>"> -->
                        <h3><?= htmlspecialchars($allcar['vehicle_type']) ?></h3>
                        <p>City: <?= htmlspecialchars($allcar['vehicle_model']) ?></p>
                        <!-- <p>Type: <?= htmlspecialchars($allcar['location_type']) ?></p> -->
                        <!-- <p class="rating">★ <?= htmlspecialchars($allcar['rating']) ?></p>
                            <p class="price">Rs. <?= htmlspecialchars($allcar['price']) ?> night</p> -->
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <!-- </div> -->
           

            <?php foreach ($allcars as $allcar): ?>
                <div class="place-card">
                    <div class="place-details">
                        <!-- <a href="/resturent?id=<?= urlencode($allcar['locationid']) ?>"> -->
                        <h3><?= htmlspecialchars($allcar['vehicle_type']) ?></h3>
                        <p>City: <?= htmlspecialchars($allcar['vehicle_model']) ?></p>
                        <!-- <p>Type: <?= htmlspecialchars($allcar['location_type']) ?></p> -->
                        <!-- <p class="rating">★ <?= htmlspecialchars($allcar['rating']) ?></p>
                            <p class="price">Rs. <?= htmlspecialchars($allcar['price']) ?> night</p> -->
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

<?php require(BASE_PATH . 'views/partials/user/foot.php'); ?>