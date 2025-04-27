<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main style="padding: 40px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f9f9f9; min-height: 100vh;">

    <style>
        .hotel-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 1000px;
            margin: 0 auto 40px auto;
        }
        .hotel-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        .hotel-logo {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #ccc;
            background: #eee;
        }
        .hotel-name {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }
        .hotel-stars {
            color: #FFD700;
            font-size: 20px;
        }
        .hotel-section {
            margin-top: 20px;
        }
        .hotel-section h3 {
            font-size: 20px;
            color: #444;
            margin-bottom: 10px;
            border-bottom: 2px solid #eee;
            padding-bottom: 5px;
        }
        .amenities-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .amenity-badge {
            background-color: #e0f7fa;
            color: #00796b;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 20px;
            margin-top: 10px;
        }
        .stat-item {
            background: #f1f8e9;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            color: #33691e;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }
        .info-item {
            background: #fff8e1;
            padding: 10px 20px;
            border-radius: 10px;
            flex: 1;
            text-align: center;
            color: #ff6f00;
            min-width: 150px;
        }
        .review-button {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 24px;
            background-color: #4caf50;
            color: white;
            font-size: 16px;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s;
        }
        .review-button:hover {
            background-color: #388e3c;
        }
    </style>

    <?php if ($hotel): ?>
    <div class="hotel-card">
        <div class="hotel-header">
            <?php if (!empty($hotel['logo'])): ?>
                <img src="/assets/hotel/logo/<?= htmlspecialchars($hotel['logo']) ?>" alt="Hotel Logo" class="hotel-logo">
            <?php else: ?>
                <div class="hotel-logo" style="display: flex; align-items: center; justify-content: center; color: #888;">No Logo</div>
            <?php endif; ?>
            <div>
                <div class="hotel-name"><?= ucwords(explode('@', $hotelEmail)[0]) ?></div>
                <div class="hotel-stars"><?= str_repeat('⭐', (int) $hotel['star_rating']) ?></div>
            </div>
        </div>

        <div class="hotel-section">
            <h3>Amenities</h3>
            <?php
            $amenities = array_filter(array_map('trim', explode(',', $hotel['amenities'])));
            ?>
            <div class="amenities-list">
                <?php if (!empty($amenities)): ?>
                    <?php foreach ($amenities as $amenity): ?>
                        <div class="amenity-badge"><?= htmlspecialchars($amenity) ?></div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div>No amenities listed.</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="hotel-section">
            <h3>Statistics</h3>
            <div class="stats-grid">
                <div class="stat-item"><strong>Rooms</strong><br><?= $stats['rooms'] ?></div>
                <div class="stat-item"><strong>Packages</strong><br><?= $stats['packages'] ?></div>
                <div class="stat-item"><strong>Reviews</strong><br><?= $stats['reviews'] ?></div>
                <div class="stat-item"><strong>Avg Rating</strong><br><?= $stats['averageRating'] ?> ⭐</div>
            </div>
        </div>

        <div class="hotel-section">
            <h3>Info</h3>
            <div class="info-row">
                <div class="info-item"><strong>Check-in:</strong> <?= htmlspecialchars($hotel['checkin']) ?></div>
                <div class="info-item"><strong>Check-out:</strong> <?= htmlspecialchars($hotel['checkout']) ?></div>
                <div class="info-item"><strong>Booking Confirmation:</strong> <?= $hotel['booking_confirmation'] ? 'Enabled' : 'Disabled' ?></div>
            </div>
        </div>

        <a href="/add_review?accid=<?= $hotel['accid'] ?>" class="review-button">Add a Review</a>
    </div>
    <?php else: ?>
        <p style="text-align:center; color:#777; font-size:18px;">Hotel information is not available.</p>
    <?php endif; ?>

</main>
<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>