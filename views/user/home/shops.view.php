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
                        <label for="location">Shops in</label>
                        <input type="text" id="location" name="location" placeholder="Search by location">
                    </div>
                    <div class="input-group">
                        <label for="category">Category</label>
                        <select id="category" name="category">
                            <option value="">All Categories</option>
                            <option value="clothing">Clothing & Fashion</option>
                            <option value="souvenirs">Souvenirs & Handicrafts</option>
                            <option value="jewelry">Jewelry</option>
                            <option value="electronics">Electronics</option>
                            <option value="food">Local Food Products</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="price_range">Price Range</label>
                        <select id="price_range" name="price_range">
                            <option value="">Any</option>
                            <option value="budget">Budget</option>
                            <option value="mid">Mid-Range</option>
                            <option value="luxury">Luxury</option>
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
//Add places to stay by retriewing from database

<!-- Footer -->
<footer>
    © 2024 traveLK. All rights reserved.
</footer>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>