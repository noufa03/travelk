<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">Welcome, <?= htmlspecialchars($hotelEmail) ?>!</h1>

    <?php if (!$profileComplete || !$hotel): ?>
        <!-- GET STARTED SECTION -->
        <div class="get-started-section">
            <h2 class="get-started-heading">Welcome to your dashboard!</h2>
            <p class="get-started-subtext">Let’s get you started by completing your hotel profile.</p>
            <a href="/edit_hotel" class="btn-get-started">Complete Your Setup</a>
        </div>

    <?php else: ?>
        <div class="dashboard-boxes">
            <!-- Left Box -->
            <div class="left-box">
                <div class="logo-wrapper">
                    <?php if (!empty($hotel['logo'])): ?>
                        <img src="/assets/hotel/logo/<?= htmlspecialchars($hotel['logo']) ?>" alt="Hotel Logo" class="hotel-logo">
                        <?php else: ?>
                        <p class="no-logo">No logo available</p>
                    <?php endif; ?>


                    <h2 class="hotel-name"><?= ucwords(explode('@', $hotelEmail)[0]) ?></h2>
                    <p class="hotel-email"><?= htmlspecialchars($hotelEmail) ?></p>

                    <p class="star-rating">
                        <?php
                        $stars = (int) $hotel['star_rating'];
                        echo str_repeat('⭐', $stars);
                        ?>
                        <br><span class="hotel-label">Hotel</span>
                    </p>
                </div>

                <div class="hotel-info">
                    <div class="amenities-tags">
                        <?php
                        $amenities = explode(',', $hotel['amenities']);
                        $amenities = array_filter(array_map('trim', $amenities));
                        if (!empty($amenities)) {
                            foreach ($amenities as $item): ?>
                                <span class="amenity-pill"><?= htmlspecialchars($item) ?></span>
                        <?php endforeach;
                        } else {
                            echo '<span class="no-amenities">No amenities listed</span>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Right Box -->
            <div class="right-box">
                <h3 class="section-title">Statistics</h3>
                <div class="stats-graph">
                    <img src="/assets/hotel/graph-placeholder.png" alt="Graph" class="graph-placeholder">
                    <p class="graph-note">Customers vs Time (sample)</p>
                </div>
            </div>
        </div>

        <!-- Info Row -->
        <div class="info-row">
            <div><strong>Check-in:</strong> <?= htmlspecialchars($hotel['checkin']) ?></div>
            <div><strong>Check-out:</strong> <?= htmlspecialchars($hotel['checkout']) ?></div>
            <div><strong>Booking Confirmation:</strong> <?= $hotel['booking_confirmation'] ? 'Enabled' : 'Disabled' ?></div>
        </div>

        <!-- Actions -->
        <div class="action-buttons">
            <a href="/edit_hotel" class="btn btn-edit">Edit Hotel</a>
            <a href="/edit_location" class="btn btn-edit">Add a Location</a>
            <a href="/delete_hotel" class="btn btn-delete">Delete Hotel</a>
        </div>
    <?php endif; ?>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>