<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">
        <?= !empty($location) ? 'Edit Location' : 'Add Location' ?>
    </h1>

    <div class="edit-form-container">
        <form action="/edit_location" method="POST" enctype="multipart/form-data" class="edit-form">
            <!-- <label for="location_type">Location Type:</label>
            <input type="text" name="location_type" id="location_type" required> -->
            <?php if (!empty($location['locationid'])): ?>
                <input type="hidden" name="locationid" value="<?= htmlspecialchars($location['locationid']) ?>">
            <?php endif; ?>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required value="<?= htmlspecialchars($location['name'] ?? '') ?>">

            <label for="display_name">Display Name :</label>
            <input type="text" name="display_name" id="display_name" required value="<?= htmlspecialchars($location['display_name'] ?? '') ?>">

            <label for="street_address">Street Address:</label>
            <textarea name="street_address" id="street_address" required><?= htmlspecialchars($location['street_address'] ?? '') ?></textarea>

            <label for="city">City:</label>
            <input type="text" name="city" id="city" required value="<?= htmlspecialchars($location['city'] ?? '') ?>">

            <label for="google_map_link">Google Map Link:</label>
            <textarea name="google_map_link" id="google_map_link" required><?= htmlspecialchars($location['google_map_link'] ?? '') ?></textarea>

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

            <label for="hot_line">Hot Line :</label>
            <input type="tel" pattern="0[0-9]{9}" name="hot_line" id="hot_line"  required value="<?= htmlspecialchars($location['hot_line'] ?? 'start from 0, 10 digits') ?>">

            <label for="latitude">Latitude :</label>
            <input type="number" step="any" min="5.9167" max="9.8350" name="latitude" id="latitude" required value="<?= htmlspecialchars($location['latitude'] ?? '') ?>">

            <label for="longitude">Longitude :</label>
            <input type="number" step="any" min="79.6500" max="81.8900" name="longitude" id="longitude" required value="<?= htmlspecialchars($location['longitude'] ?? '') ?>">

            <label for="photos">Location Photos:</label>
            <input type="file" name="photos" id="photos" required>

            <!-- <div class="action-buttons">
                <button type="submit" class="btn btn-save">
                    <?= !empty($location) ? 'Update Location' : 'Add Location' ?>
                </button>
                <a href="/dashboard_hotel" class="btn b">Cancel</a>
            </div> -->
            <div class="action-buttons">
                <button type="submit" class="btn btn-save">
                    <?= !empty($location) ? 'Update Location' : 'Add Location' ?>
                </button>
                <a href="/dashboard_hotel" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>