<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">Add New Room</h1>

        <?php if (!$profileComplete) : ?>
            <div class="alert alert-warning">
                Please complete your hotel profile before adding a new room.
            </div>
        <?php else : ?>
            <form action="/add_room" method="POST" enctype="multipart/form-data" class="edit-form">
                <div class="form-group">
                    <label for="room_number">Room Number</label>
                    <input type="text" id="room_number" name="room_number" required>
                </div>

                <div class="form-group">
                    <label for="room_type">Room Type</label>
                    <input type="text" id="room_type" name="room_type" required>
                </div>

                <div class="form-group">
                    <label for="bed_type">Bed Type</label>
                    <input type="text" id="bed_type" name="bed_type" required>
                </div>

                <div class="form-group">
                    <label for="capacity">Capacity</label>
                    <input type="number" id="capacity" name="capacity" required min="1">
                </div>

                <div class="form-group">
                    <label for="price_per_night">Price per Night ($)</label>
                    <input type="number" id="price_per_night" name="price_per_night" step="0.01" required min="0">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="amenities">Amenities (comma-separated)</label>
                    <input type="text" id="amenities" name="amenities" required>
                </div>

                <div class="form-group">
                    <label for="availability">Availability</label>
                    <select id="availability" name="availability" required>
                        <option value="available">Available</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="images">Room Images</label>
                    <input type="file" id="images" name="images[]" multiple accept="image/*">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Add Room</button>
                    <a href="/room_hotel" class="btn-secondary">Cancel</a>
                </div>
            </form>
        <?php endif; ?>
    </div>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>
