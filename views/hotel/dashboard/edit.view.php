<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <!-- Welcome message -->
    <h1 class="welcome-message">
        <?php if (!$profileComplete): ?>
            Add Hotel Details
        <?php else: ?>
            Edit Hotel Details
        <?php endif; ?>
    </h1>

    <div class="edit-form-container">
        <form action="/edit_hotel" method="POST" enctype="multipart/form-data" class="edit-form">
            <label for="star_rating">Star Rating:</label>
            <input type="number" name="star_rating" id="star_rating" value="<?= htmlspecialchars($hotel['star_rating']) ?>" required>

            <label for="no_rooms">Number of Rooms:</label>
            <input type="number" name="no_rooms" id="no_rooms" value="<?= htmlspecialchars($hotel['no_rooms']) ?>" required>

            <!-- Amentities from controller -->
            <label>Amenities:</label>
            <div class="checkbox-group">
                <?php foreach ($availableAmenities as $amenity): ?>
                    <label>
                        <input type="checkbox" name="amenities_list[]" value="<?= htmlspecialchars($amenity) ?>"
                            <?= in_array($amenity, $selectedAmenities) ? 'checked' : '' ?>>
                        <?= htmlspecialchars($amenity) ?>
                    </label>
                <?php endforeach; ?>
            </div>

            <label>Payment Options:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="payment_credit" <?= $hotel['payment_credit'] ? 'checked' : '' ?>> Credit Card</label>
                <label><input type="checkbox" name="payment_debit" <?= $hotel['payment_debit'] ? 'checked' : '' ?>> Debit Card</label>
                <label><input type="checkbox" name="payment_cash" <?= $hotel['payment_cash'] ? 'checked' : '' ?>> Cash</label>
            </div>

            <label for="checkin">Check-in Time:</label>
            <input type="time" name="checkin" id="checkin" value="<?= htmlspecialchars($hotel['checkin']) ?>" required>

            <label for="checkout">Check-out Time:</label>
            <input type="time" name="checkout" id="checkout" value="<?= htmlspecialchars($hotel['checkout']) ?>" required>

            <label for="business_reg_num">Business Registration Number:</label>
            <input type="text" name="business_reg_num" id="business_reg_num" value="<?= htmlspecialchars($hotel['business_reg_num']) ?>" required>

            <label for="licensing_info">Licensing Info:</label>
            <textarea name="licensing_info" id="licensing_info" required><?= htmlspecialchars($hotel['licensing_info']) ?></textarea>

            <label for="owner_name">Owner Name:</label>
            <input type="text" name="owner_name" id="owner_name" value="<?= htmlspecialchars($hotel['owner_name']) ?>" required>

            <label for="owner_contact">Owner Contact:</label>
            <input type="text" name="owner_contact" id="owner_contact" value="<?= htmlspecialchars($hotel['owner_contact']) ?>" required>

            <label>Booking Confirmation:</label>
            <input type="checkbox" name="booking_confirmation" <?= $hotel['booking_confirmation'] ? 'checked' : '' ?>>

            <label>Logo:</label>
            <input type="file" name="logo">
            <?php if (!empty($hotel['logo'])): ?>
                <img src="/assets/uploads/<?= htmlspecialchars($hotel['logo']) ?>" alt="Current Logo" class="preview-logo">
            <?php endif; ?>

            <div class="action-buttons">
                <button type="submit" class="btn btn-save">Save Changes</button>
                <a href="/dashboard_hotel" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>