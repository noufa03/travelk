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
                        <label for="location">Pickup Location</label>
                        <input type="text" id="location" name="location" placeholder="Enter pickup location">
                    </div>
                    <div class="input-group">
                        <label for="vehicle_type">Vehicle Type</label>
                        <select id="vehicle_type" name="vehicle_type">
                            <option value="">All Types</option>
                            <option value="car">Car</option>
                            <option value="van">Van</option>
                            <option value="suv">SUV</option>
                            <option value="motorcycle">Motorcycle</option>
                            <option value="tuk">Tuk Tuk</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="driver">Driver Option</label>
                        <select id="driver" name="driver">
                            <option value="">Select Option</option>
                            <option value="with_driver">With Driver</option>
                            <option value="without_driver">Without Driver</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="pickup_date">Pickup Date</label>
                        <input type="date" id="pickup_date" name="pickup_date" placeholder="Pickup Date">
                    </div>
                    <div class="input-group">
                        <label for="return_date">Return Date</label>
                        <input type="date" id="return_date" name="return_date" placeholder="Return Date">
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