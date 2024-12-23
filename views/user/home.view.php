<!--    --><?php //require (BASE_PATH.'views/partials/head.php'); ?>
<!--    --><?php //require (BASE_PATH.'views/partials/header.php');?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Love+Light&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <title>traveLK</title>

        <style>
            .text-color-active {
                color: #76c07d; /* Active color */
            }
            .text-color-default {
                color: #000000; /* Default color */
            }

            /* Home Page */
            .logo {
                width: 250px;
                cursor: pointer;
            }
            body {
                font-family: Poppins, sans-serif;
                position: relative;
                background-color: #ffffff;
                color: black;
                padding: 5px 5px;
                margin: 25px 25px 0px 25px;
            }
            .logo-and-navigation {
                margin: 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            nav {
                display: flex;
                align-items: center;
                gap: 20px;
            }
            nav a {
                text-decoration: none;
                color: black;
                /*margin-left: 20px;*/
                font-weight: 700;
            }
            .homepage-picture-container {
                background-image: url('assets/4.jpeg');
                background-size: cover;
                height: 80vh;
                background-position: 0px -60px;
                background-repeat: no-repeat;
                color: white;
                position: relative;
                overflow: hidden;
                border-radius: 12px 12px 0 0;
            }
            /*.homepage-picture-container {*/
            /*    !*pointer-events: none;*!*/
            /*    content: '';*/
            /*    border-radius: 15px 15px 0 0;*/
            /*    padding-top: 2px;*/
            /*    background: rgba(0, 0, 0, 0.09); !* Semi-transparent overlay *!*/
            /*    z-index: 0;*/
            /*}*/
            .header-1{
                text-align: center;
            }
            .slogan{
                text-align: center;
            }
            .h1-SriLK {
                color: #000000; /* Black color for text */
                margin-left: 12px;
                font-family: "Love Light", cursive;
                font-weight: 600;
                font-size: 5.5rem; /* Increased font size */
                font-style: normal;
                letter-spacing: 12px; /* Adds more spacing between letters */
            }
            .center-container{
                display: flex;
                justify-content: center; /* Centers the button horizontally */
                align-items: center;
            }
            .start-planning-btn {
                background-color: #76c07d; /* Adjusted to match the orange color */
                color: #ffffff; /* White text */
                border: none;
                border-radius: 25px; /* Rounded edges */
                padding: 10px 20px; /* Space inside the button */
                font-size: 16px; /* Text size */
                font-weight: bold; /* Bold text */
                display: inline-flex; /* Flex for text and arrow alignment */
                align-items: center; /* Center content vertically */
                cursor: pointer;
                /*box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); !* Subtle shadow for depth *!*/
                transition: all 0.3s ease; /* Smooth hover effect */

            }
            .start-planning-btn:hover {
                background-color: #005700; /* Slightly darker orange on hover */
                /*box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15); !* Stronger shadow *!*/
                transform: translateY(-2px); /* Slight lift effect */
            }

            .arrow {
                margin-left: 8px; /* Space between text and arrow */
                font-size: 18px; /* Slightly larger arrow size */
            }

            /*!* Search Container *!*/
            .search-container {
                background-color: #005700; /* Dark green */
                padding: 5px 5px;
                /*margin: 0px 25px 0px 25px;*/
                /*text-align: center;*/
            }
            .hero {
                display: flex;
                justify-content: center; /* Centers items horizontally */
                align-items: center; /* Centers items vertically */
                gap: 10px; /* Adds space between items */
                padding: 20px; /* Optional: Adds padding to the hero section */
                /*background-color: #A7D087; !* Optional: Sets the background color *!*/
            }

            .search-bar {
                display: flex;
                flex-grow: 1; /* Allows the input to grow */
                max-width: 660px /* Restricts the total width of the search bar */
            }

            .search-bar input {
                flex-grow: 1; /* Makes the input take up available space */
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px 0 0 5px; /* Rounded corners on the left */
                font-size: 1em;
                width: 530px;
            }

            .search-bar button {
                padding: 10px 20px;
                background-color: #5EBC67; /* Green button */
                color: white;
                border: none;
                border-radius: 0 5px 5px 0; /* Rounded corners on the right */
                font-size: 1em;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .hero-text {
                font-size: 1.2em;
                font-weight: bold;
                margin-right: 10px; /* Adds space between text and input */
            }

            .nav-2 {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 8.6%;

            }
            .nav-2 a {
                text-decoration: none;
                color: black;
                margin-left: 20px;
                transition: color 0.3s ease;
                font-weight: 700;
            }
            .nav-2 a:hover {
                color: #5EBC67;
                text-decoration: underline;
                text-decoration-color: #5EBC67;
            }
            .feature-grid {
                margin: 40px 8%;
            }
            .feature-title {
                text-align: center;
                font-size: 1.8em;
                font-weight: 600;
                margin-bottom: 20px;
            }
            .grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
            }
            .card {
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s;
            }
            .card img {
                width: 100%;
                height: 150px;
                object-fit: cover;
            }
            .card h3 {
                margin: 0;
                padding: 15px;
                font-size: 1.2em;
                color: #333;
                background-color: #fff;
            }
            .card:hover {
                transform: translateY(-5px);
            }

            footer {
                text-align: center;
                padding: 20px;
                background-color: #333;
                color: white;
                font-size: 0.9em;
            }

        </style>

    </head>
    <body>

    <header>
        <div class="logo-and-navigation">
            <a href="/">
                <img src="assets/logo.png" alt="traveLK logo" class="logo">
            </a>
            <form method="post" action="/login" id="logout-form">
                <input type="hidden" name="_method" value="DELETE">
            </form>
            <nav>
                <a href="/" class="<?= urlIs('/') ? 'text-color-active' : 'text-color-default'; ?>">Home</a>
                <a href="/discover" class="<?= urlIs('/discover') ? 'text-color-active' : 'text-color-default'; ?>">Discover</a>
                <a href="/about" class="<?= urlIs('/about') ? 'text-color-active' : 'text-color-default'; ?>">About Us</a>
                <?php if($_SESSION['user'] ?? false): ?>
                    <a href="/userpage" class="<?= urlIs('/userpage') ? 'text-color-active' : 'text-color-default'; ?>">Profile</a>
                    <a href="#" class="login-logout" onclick="document.getElementById('logout-form').submit(); return false;">Log out</a>
                <?php else: ?>
                    <a href="/register" class="<?= urlIs('/register') ? 'text-color-active' : 'text-color-default'; ?>">Sign Up</a>
                    <a href="/login" class="login-logout">Log in</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
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
                    <button type="button" class="start-planning-btn">Start Planning<span class="arrow">→</span></button>
                </a>
            </div><br><br>
    </div>
    </div>
<div class="search-container">
    <section class="hero">
        <h1 class="hero-text">Where to?</h1>
        <div class="search-bar">
            <form method="GET">
                <input type="text" name="query" placeholder="Places to go, things to do, hotels...">
                <button type="submit">Search</button>
            </form>
        </div>
    </section>
</div>
<br><br>
<nav class="nav-2">
    <a herf="#">Place to visit</a>
    <a herf="#">Place to stay</a>
    <a herf="#">Restaurants</a>
    <a herf="#">Shops</a>
    <a herf="#">Rent a car</a>
</nav>

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




</main>
</div>
<?php //require (BASE_PATH.'views/partials/foot.php'); ?>

    </body>
</html>