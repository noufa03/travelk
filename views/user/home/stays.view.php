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
                        <label for="destination">Where</label>
                        <input type="text" id="destination" name="destination" placeholder="Search destinations">
                    </div>
                    <div class="input-group">
                        <label for="checkin">Check in</label>
                        <input type="text" id="checkin" name="checkin" placeholder="Add dates">
                    </div>
                    <div class="input-group">
                        <label for="checkout">Check out</label>
                        <input type="text" id="checkout" name="checkout" placeholder="Add dates">
                    </div>
                    <div class="input-group">
                        <label for="guests">Who</label>
                        <input type="text" id="guests" name="guests" placeholder="Add guests">
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

