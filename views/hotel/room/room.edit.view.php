<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">Edit Room Details</h1>

    <div class="edit-form-container">
        <form action="/edit_room?roomid=<?= $room['roomid'] ?>" method="POST" class="edit-form" enctype="multipart/form-data">
            <label for="room_number">Room Number:</label>
            <input type="text" name="room_number" id="room_number" value="<?= htmlspecialchars($room['room_number']) ?>" required>

            <label for="room_type">Room Type:</label>
            <input type="text" name="room_type" id="room_type" value="<?= htmlspecialchars($room['room_type']) ?>" required>

            <label for="bed_type">Bed Type:</label>
            <input type="text" name="bed_type" id="bed_type" value="<?= htmlspecialchars($room['bed_type']) ?>" required>

            <label for="capacity">Capacity:</label>
            <input type="number" name="capacity" id="capacity" value="<?= htmlspecialchars($room['capacity']) ?>" required>

            <label for="price_per_night">Price per Night:</label>
            <input type="number" step="0.01" name="price_per_night" id="price_per_night" value="<?= htmlspecialchars($room['price_per_night']) ?>" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required><?= htmlspecialchars($room['description']) ?></textarea>

            <label for="amenities">Amenities:</label>
            <textarea name="amenities" id="amenities" required><?= htmlspecialchars($room['amenities']) ?></textarea>

            <label for="availability">Availability:</label>
            <select name="availability" id="availability" required>
                <option value="available" <?= $room['availability'] === 'available' ? 'selected' : '' ?>>Available</option>
                <option value="unavailable" <?= $room['availability'] === 'unavailable' ? 'selected' : '' ?>>Unavailable</option>
            </select>

            <label for="images">Upload Images (Multiple):</label>
            <input type="file" name="images[]" id="images" accept="image/*" multiple>
            <label>Existing Images:</label>
            <div class="existing-images">
                <?php if (!empty($room['images'])): ?>
                    <?php $images = explode(',', $room['images']); ?>
                    <div class="image-gallery">
                        <?php foreach ($images as $image): ?>
                            <img src="<?= $image ?>" alt="Room Image" class="gallery-image" />
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No images uploaded yet.</p>
                <?php endif; ?>
            </div>

            <div class="action-buttons">
                <button type="submit" class="btn btn-save">Save Changes</button>
                <a href="/room_hotel" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>


</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>