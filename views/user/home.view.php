<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>
<?php require (BASE_PATH.'views/partials/user/nav.php');?>
<div class="homepage-picture-container">
    <div class="container">
        <br>
        <main>
            <div class="box">
                <h1 class="header-1">Let's explore<span class="h1-SriLK">Sri Lanka!</span></h1>
                <p class="slogan">Your Ultimate Guide to Explore Sri Lanka's<br> Rich Heritage and Natural Beauty</p>
            </div><br><br><br>
            <div class="center-container">
                <a href="/planning" style="text-decoration: none;">
                    <button type="button" class="start-planning-btn">
                        Start Planning
                        <img src="assets/Arrow 1.png" alt="arrow icon" class="arrow-icon">
                    </button>
                </a>
            </div><br><br>
    </div>
    </div>
<div class="search-container">
    <section class="hero">
        <!-- <h1 class="hero-text">Where to?</h1> -->
        <div class="search-bar">
            <form method="GET">
                <div class="search-inputs">
                    <div class="input-group">
                        <label for="destination">Where to</label>
                        <input type="text" id="destination" name="destination" placeholder="Search destinations">
                    </div>
                    <button type="submit" class="search-button">
                        <i class='bx bx-search' style="font-size: 1.2rem;"></i>
                    </button>
                </div>
                
            </form>
        </div>
    </section>
</div>
<br><br>
<?php require (BASE_PATH.'views/partials/user/nav-2.php');?>

<br>

<!-- Feature Grid -->
<section class="feature-grid">
    <h2 class="feature-title">Explore Sri Lanka's Attractions</h2>
    <div class="grid">
        <div class="card">
            <img src="assets/homepage/beach.jpg" alt="Sri Lanka Beaches">
            <h3>Sri Lanka's Beaches</h3>
        </div>
        <div class="card">
            <img src="assets/homepage/temple.jpg" alt="Ancient Temples">
            <h3>Ancient Temples</h3>
        </div>
        <div class="card">
            <img src="assets/homepage/wildlife.jpg" alt="Wildlife & Safaris">
            <h3>Wildlife & Safaris</h3>
        </div>
    </div>
</section>
<!---->
<!--<section class="feature-grid">-->
<!--    <h2 class="feature-title">Plan Your Budget</h2>-->
<!--    <div class="grid">-->
<!--        <div class="card">-->
<!--            <img src="assets/homepage/food.jpeg" alt="Food & Dining">-->
<!--            <h3>Food & Dining</h3>-->
<!--        </div>-->
<!--        <div class="card">-->
<!--            <img src="assets/homepage/hotel.png" alt="Accommodation Tips">-->
<!--            <h3>Accommodation Tips</h3>-->
<!--        </div>-->
<!--        <div class="card">-->
<!--            <img src="assets/homepage/activities.jpg" alt="Activities & Entertainment">-->
<!--            <h3>Activities & Entertainment</h3>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!---->
<!--<section class="feature-grid">-->
<!--    <h2 class="feature-title">Top Hotels & Stays</h2>-->
<!--    <div class="grid">-->
<!--        <div class="card">-->
<!--            <img src="assets/homepage/luxary.jpg" alt="Luxury Hotels">-->
<!--            <h3>Luxury Hotels</h3>-->
<!--        </div>-->
<!--        <div class="card">-->
<!--            <img src="assets/homepage/guest.jpg" alt="Guesthouses">-->
<!--            <h3>Guesthouses</h3>-->
<!--        </div>-->
<!--        <div class="card">-->
<!--            <img src="assets/homepage/budget.jpg" alt="Budget Stays">-->
<!--            <h3>Budget Stays</h3>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!---->
<!--<section class="feature-grid">-->
<!--    <h2 class="feature-title">Culinary Adventures</h2>-->
<!--    <div class="grid">-->
<!--        <div class="card">-->
<!--            <img src="assets/homepage/street.jpg" alt="Street Food">-->
<!--            <h3>Street Food</h3>-->
<!--        </div>-->
<!--        <div class="card">-->
<!--            <img src="assets/homepage/fine-dine.jpg" alt="Fine Dining">-->
<!--            <h3>Fine Dining</h3>-->
<!--        </div>-->
<!--        <div class="card">-->
<!--            <img src="assets/homepage/spices.jpg" alt="Sri Lankan Spices">-->
<!--            <h3>Sri Lankan Spices</h3>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!---->


<!-- Footer -->
<footer>
    © 2024 traveLK. All rights reserved.
</footer>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>

