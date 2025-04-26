<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">Welcome, <?= htmlspecialchars($hotelEmail) ?>!</h1>

    <?php if (!$profileComplete || !$locationComplete): ?>
        <!-- GET STARTED SECTION -->
        <div class="get-started-section">
            <h2 class="get-started-heading">Let's Get Started!</h2>
            <p class="get-started-subtext">Complete the following steps to unlock your dashboard:</p>

            <div class="get-started-options">
                <a href="/edit_hotel" class="get-started-box <?= $profileComplete ? 'box-complete' : '' ?>">
                    <span class="plus">+</span>
                    <p>Add Hotel Details</p>
                </a>
                <a href="/edit_location" class="get-started-box <?= $locationComplete ? 'box-complete' : '' ?>">
                    <span class="plus">+</span>
                    <p>Add Location</p>
                </a>
            </div>
        </div>
    <?php else: ?>
        <!-- FULL DASHBOARD -->
        <div class="dashboard-boxes">
            <div class="left-box">
                <div class="logo-wrapper">
                    <?php if (!empty($hotel['logo'])): ?>
                        <img src="/assets/hotel/logo/<?= htmlspecialchars($hotel['logo']) ?>" alt="Hotel Logo" class="hotel-logo">
                    <?php else: ?>
                        <p class="no-logo">No logo</p>
                    <?php endif; ?>

                    <h2 class="hotel-name"><?= ucwords(explode('@', $hotelEmail)[0]) ?></h2>
                    <p class="star-rating">
                        <?= str_repeat('⭐', (int) $hotel['star_rating']) ?>
                        <span class="hotel-label">Hotel</span>
                    </p>
                </div>

                <div class="hotel-info">
                    <div class="amenities-tags">
                        <?php
                        $amenities = array_filter(array_map('trim', explode(',', $hotel['amenities'])));
                        echo empty($amenities)
                            ? '<span class="no-amenities">No amenities listed</span>'
                            : implode('', array_map(fn($a) => "<span class='amenity-pill'>" . htmlspecialchars($a) . "</span>", $amenities));
                        ?>
                    </div>
                </div>
            </div>

            <div class="right-box">
                <h3 class="section-title">Hotel Statistics</h3>
                <div class="stats-grid">
                    <?php
                    $icons = ['🛏️', '🎁', '⭐', '🌟', '📅'];
                    $labels = ['Total Rooms', 'Total Packages', 'Total Reviews', 'Avg. Rating', 'Bookings (Month)'];
                    $values = [
                        $stats['rooms'],
                        $stats['packages'],
                        $stats['reviews'],
                        $stats['averageRating'],
                        $stats['bookingsThisMonth']
                    ];
                    for ($i = 0; $i < count($labels); $i++): ?>
                        <div class="stat-card">
                            <span class="stat-icon"><?= $icons[$i] ?></span>
                            <div class="stat-info">
                                <div class="stat-label"><?= $labels[$i] ?></div>
                                <div class="stat-value"><?= $values[$i] ?></div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <div class="info-row">
            <div><strong>Check-in:</strong> <?= htmlspecialchars($hotel['checkin']) ?></div>
            <div><strong>Check-out:</strong> <?= htmlspecialchars($hotel['checkout']) ?></div>
            <div><strong>Booking Confirmation:</strong> <?= $hotel['booking_confirmation'] ? 'Enabled' : 'Disabled' ?></div>
        </div>

        <div class="action-buttons">
            <a href="/edit_hotel" class="btn btn-edit">Edit Hotel</a>
            <a href="/edit_location" class="btn btn-edit">Edit Location</a>
            <a href="/delete_hotel" class="btn btn-delete">Delete Hotel</a>
        </div>
    <?php endif; ?>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>
