<?php require(BASE_PATH . 'views/partials/user/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/styles.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/nav.php'); ?>
<br>
<?php require(BASE_PATH . 'views/partials/user/nav-2.php'); ?>

<br>
<div class="search-container">
    <section class="hero">
        <!-- <h1 class="hero-text">Where to?</h1> -->
        <div class="search-bar">
            <form method="GET">
                <div class="search-inputs">
                    <div class="input-group">
                        <label for="location">Resturents in</label>
                        <input type="text" id="location" name="location" placeholder="Search by location">
                    </div>
                    <div class="input-group">
                        <label for="cuisine">Cuisine</label>
                        <input type="text" id="cuisine" name="cuisine" placeholder="Type of cuisine">
                    </div>
                    <div class="input-group">
                        <label for="price">Price Range</label>
                        <select id="price" name="price">
                            <option value="">Any</option>
                            <option value="low">$</option>
                            <option value="medium">$$</option>
                            <option value="high">$$$</option>
                        </select>
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
<br>

<div class="container">
    <?php if (!empty($allcars)): ?>
        <div class="places-container" style="display:grid;grid-template-columns:1fr 1fr">
    <div style="display: flex;">
         <?php foreach ($allcars as $allcar): ?>
            
                <div class="place-card" >
                    

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
        
        <div style="display: flex;">   
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