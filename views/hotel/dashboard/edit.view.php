<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require (BASE_PATH.'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">Edit Hotel Details</h1>

    <form action="/edit_hotel" method="POST" enctype="multipart/form-data" class="edit-form">
        <label>Star Rating:</label>
        <input type="number" name="star_rating" value="<?= htmlspecialchars($hotel['star_rating']) ?>" required>

        <label>Number of Rooms:</label>
        <input type="number" name="no_rooms" value="<?= htmlspecialchars($hotel['no_rooms']) ?>" required>

        <label>Amenities:</label>
        <textarea name="amenities" required><?= htmlspecialchars($hotel['amenities']) ?></textarea>

        <label>Payment Options:</label>
        <div class="checkbox-group">
            <label><input type="checkbox" name="payment_credit" <?= $hotel['payment_credit'] ? 'checked' : '' ?>> Credit Card</label>
            <label><input type="checkbox" name="payment_debit" <?= $hotel['payment_debit'] ? 'checked' : '' ?>> Debit Card</label>
            <label><input type="checkbox" name="payment_cash" <?= $hotel['payment_cash'] ? 'checked' : '' ?>> Cash</label>
        </div>

        <label>Check-in Time:</label>
        <input type="time" name="checkin" value="<?= htmlspecialchars($hotel['checkin']) ?>" required>

        <label>Check-out Time:</label>
        <input type="time" name="checkout" value="<?= htmlspecialchars($hotel['checkout']) ?>" required>

        <label>Business Registration Number:</label>
        <input type="text" name="business_reg_num" value="<?= htmlspecialchars($hotel['business_reg_num']) ?>" required>

        <label>Licensing Info:</label>
        <textarea name="licensing_info" required><?= htmlspecialchars($hotel['licensing_info']) ?></textarea>

        <label>Owner Name:</label>
        <input type="text" name="owner_name" value="<?= htmlspecialchars($hotel['owner_name']) ?>" required>

        <label>Owner Contact:</label>
        <input type="text" name="owner_contact" value="<?= htmlspecialchars($hotel['owner_contact']) ?>" required>

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
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>
