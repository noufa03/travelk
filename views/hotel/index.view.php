<?php require (BASE_PATH.'views/partials/hotel/head.php'); ?>
<?php require (BASE_PATH.'views/partials/hotel/style.php'); ?>
<?php require (BASE_PATH. 'views/partials/hotel/nav_hotel.php'); ?>
<?php require (BASE_PATH. 'views/partials/hotel/sidebar_hotel.php'); ?>


<main>
    <h1>Welcome <?= ($hotelEmail)?> !</h1>
    <!-- chatgpt -->
    <main>
        <h1>Welcome to Your Hotel Dashboard</h1>

        <p><strong>Email:</strong> <?= htmlspecialchars($hotelEmail) ?></p>

        <?php if ($hotel): ?>
            <div class="hotel-details">
                <!-- Hotel Logo -->
                <?php if (!empty($hotel['logo'])): ?>
                    <img src="/assets/uploads/<?= htmlspecialchars($hotel['logo']) ?>" alt="Hotel Logo" class="hotel-logo">
                <?php else: ?>
                    <p>No logo available</p>
                <?php endif; ?>

                <h2>Hotel Information</h2>
                <p><strong>Star Rating:</strong> <?= htmlspecialchars($hotel['star_rating']) ?> ⭐</p>
                <p><strong>Number of Rooms:</strong> <?= htmlspecialchars($hotel['no_rooms']) ?></p>
                <p><strong>Amenities:</strong> <?= nl2br(htmlspecialchars($hotel['amenities'])) ?></p>

                <h3>Payment Options</h3>
                <ul>
                    <?php if ($hotel['payment_credit']) echo "<li>Credit Card</li>"; ?>
                    <?php if ($hotel['payment_debit']) echo "<li>Debit Card</li>"; ?>
                    <?php if ($hotel['payment_cash']) echo "<li>Cash</li>"; ?>
                </ul>

                <h3>Check-in & Check-out</h3>
                <p><strong>Check-in Time:</strong> <?= htmlspecialchars($hotel['checkin']) ?></p>
                <p><strong>Check-out Time:</strong> <?= htmlspecialchars($hotel['checkout']) ?></p>

                <h3>Business Details</h3>
                <p><strong>Business Reg. Number:</strong> <?= htmlspecialchars($hotel['business_reg_num']) ?></p>
                <p><strong>Licensing Info:</strong> <?= nl2br(htmlspecialchars($hotel['licensing_info'])) ?></p>

                <h3>Owner Information</h3>
                <p><strong>Owner Name:</strong> <?= htmlspecialchars($hotel['owner_name']) ?></p>
                <p><strong>Owner Contact:</strong> <?= htmlspecialchars($hotel['owner_contact']) ?></p>

                <p><strong>Booking Confirmation:</strong> <?= $hotel['booking_confirmation'] ? 'Enabled' : 'Disabled' ?></p>

                <a href="/edit" class="btn btn-edit">Edit Hotel</a>
                <a href="/delete" class="btn btn-delete">Delete Hotel</a>
            </div>
        <?php else: ?>
            <p>No hotel data found.</p>
        <?php endif; ?>
    </main>
</main>

<?php require (BASE_PATH. 'views/partials/hotel/foot.php'); ?>