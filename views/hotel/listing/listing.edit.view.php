<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">
        <?= isset($location['locationid']) ? 'Edit Location' : 'Add New Location' ?>
    </h1>

    <div class="edit-form-container">
        <form action="/edit_location" method="POST" enctype="multipart/form-data" class="edit-form">
            <?php if (isset($location['locationid'])): ?>
                <input type="hidden" name="locationid" value="<?= $location['locationid'] ?>">
            <?php endif; ?>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required value="<?= $location['name'] ?? '' ?>">

            <label for="display_name">Display Name (optional):</label>
            <input type="text" name="display_name" id="display_name" value="<?= $location['display_name'] ?? '' ?>">

            <label for="street_address">Street Address:</label>
            <textarea name="street_address" id="street_address" required><?= $location['street_address'] ?? '' ?></textarea>

            <label for="city">City:</label>
            <input type="text" name="city" id="city" required value="<?= $location['city'] ?? '' ?>">

            <label for="google_map_link">Google Map Link:</label>
            <textarea name="google_map_link" id="google_map_link" required><?= $location['google_map_link'] ?? '' ?></textarea>

            <label for="districtid">District:</label>
            <select name="districtid" id="districtid" required>
                <option value="">Select a district</option>
                <?php foreach ($districts as $district): ?>
                    <option value="<?= $district['districtid'] ?>" 
                        <?= (isset($location['districtid']) && $location['districtid'] == $district['districtid']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($district['district']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="hot_line">Hot Line (optional):</label>
            <input type="text" name="hot_line" id="hot_line" value="<?= $location['hot_line'] ?? '' ?>">

            <label for="latitude">Latitude (optional):</label>
            <input type="text" name="latitude" id="latitude" value="<?= $location['latitude'] ?? '' ?>">

            <label for="longitude">Longitude (optional):</label>
            <input type="text" name="longitude" id="longitude" value="<?= $location['longitude'] ?? '' ?>">

            <label for="photos">Location Photos:</label>
            <input type="file" name="photos" id="photos">

            <div class="action-buttons">
                <button type="submit" class="btn btn-save">
                    <?= isset($location['locationid']) ? 'Update Location' : 'Add Location' ?>
                </button>
                <a href="/dashboard_hotel" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>
