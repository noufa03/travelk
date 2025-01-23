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

<!-- <?php dd($restaurants);?> -->
//Add places to stay by retriewing from database

<!-- Footer -->
<footer>
    © 2024 traveLK. All rights reserved.
</footer>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>