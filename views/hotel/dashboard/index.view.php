<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">Welcome, <?= htmlspecialchars($hotelEmail) ?>!</h1>

    <?php if ($hotel): ?>
        <div class="dashboard-boxes">
            <!-- Left Box -->
            <div class="left-box">
                <div class="logo-wrapper">
                    <?php if (!empty($hotel['logo'])): ?>
                        <img src="/assets/hotel/hotel.png" alt="Hotel Logo" class="hotel-logo">
                    <?php else: ?>
                        <p class="no-logo">No logo available</p>
                    <?php endif; ?>

                    <h2 class="hotel-name">
                        <?= ucwords(explode('@', $hotelEmail)[0]) ?>
                    </h2>
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
                        foreach ($amenities as $item): ?>
                            <span class="amenity-pill"><?= htmlspecialchars(trim($item)) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Right Box (Graph Placeholder) -->
            <div class="right-box">
                <h3 class="section-title">Statistics</h3>
                <div class="stats-graph">
                    <img src="/assets/hotel/graph-placeholder.png" alt="Graph" class="graph-placeholder">
                    <p class="graph-note">Customers vs Time (sample)</p>
                </div>
            </div>
        </div>

        <!-- Info Row Below Boxes -->
        <div class="info-row">
            <div><strong>Check-in:</strong> <?= htmlspecialchars($hotel['checkin']) ?></div>
            <div><strong>Check-out:</strong> <?= htmlspecialchars($hotel['checkout']) ?></div>
            <div><strong>Booking Confirmation:</strong> <?= $hotel['booking_confirmation'] ? 'Enabled' : 'Disabled' ?></div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="/edit_hotel" class="btn btn-edit">Edit Hotel</a>
            <a href="/delete_hotel" class="btn btn-delete">Delete Hotel</a>
        </div>

    <?php else: ?>
        <p class="no-data">No hotel data found.</p>
    <?php endif; ?>
</main>


<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>