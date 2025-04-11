<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require (BASE_PATH.'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">Welcome, <?= htmlspecialchars($hotelEmail) ?>!</h1>

    <?php if ($hotel): ?>
        <div class="hotel-details">
            <!-- Hotel Logo -->
            <?php if (!empty($hotel['logo'])): ?>
                <!-- Temp Logo -->
                <img src="/assets/hotel/hotel.png" alt="Hotel Logo" class="hotel-logo">
                <!-- <img src="/assets/uploads/<?= htmlspecialchars($hotel['logo']) ?>" alt="Hotel Logo" class="hotel-logo"> -->
            <?php else: ?>
                <p class="no-logo">No logo available</p>
            <?php endif; ?>

            <h2 class="section-title">Hotel Information</h2>
            <p><strong>Star Rating:</strong> <?= htmlspecialchars($hotel['star_rating']) ?> ⭐</p>
            <p><strong>Number of Rooms:</strong> <?= htmlspecialchars($hotel['no_rooms']) ?></p>
            <p><strong>Amenities:</strong> <?= nl2br(htmlspecialchars($hotel['amenities'])) ?></p>

            <h3 class="section-title">Payment Options</h3>
            <ul class="payment-options">
                <?php if ($hotel['payment_credit']) echo "<li>Credit Card</li>"; ?>
                <?php if ($hotel['payment_debit']) echo "<li>Debit Card</li>"; ?>
                <?php if ($hotel['payment_cash']) echo "<li>Cash</li>"; ?>
            </ul>

            <h3 class="section-title">Check-in & Check-out</h3>
            <p><strong>Check-in Time:</strong> <?= htmlspecialchars($hotel['checkin']) ?></p>
            <p><strong>Check-out Time:</strong> <?= htmlspecialchars($hotel['checkout']) ?></p>

            <p><strong>Booking Confirmation:</strong> <?= $hotel['booking_confirmation'] ? 'Enabled' : 'Disabled' ?></p>

            <div class="action-buttons">
                <a href="/edit_hotel" class="btn btn-edit">Edit Hotel</a>
                <a href="/delete_hotel" class="btn btn-delete">Delete Hotel</a>
            </div>
        </div>
    <?php else: ?>
        <p class="no-data">No hotel data found.</p>
    <?php endif; ?>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>
