<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">Edit Listing</h1>

    <form action="/edit_listing" method="POST" enctype="multipart/form-data" class="edit-form">
        <input type="hidden" name="listid" value="<?= htmlspecialchars($listing['listid']) ?>">

        <label>Listing Name:</label>
        <input type="text" name="name" required value="<?= htmlspecialchars($listing['name']) ?>">

        <label>Category:</label>
        <input type="text" name="category" required value="<?= htmlspecialchars($listing['category']) ?>">

        <label>Features:</label>
        <textarea name="features"><?= htmlspecialchars($listing['features']) ?></textarea>

        <!-- <label>Location:</label>
        <input type="text" name="location" required value="<?= htmlspecialchars($listing['location']) ?>"> -->

        <label>Price (LKR):</label>
        <input type="number" name="price" step="0.01" required value="<?= htmlspecialchars($listing['price']) ?>">

        <label>
            <input type="checkbox" name="availability" <?= $listing['availability'] ? 'checked' : '' ?>>
            Available
        </label>

        <label for="image">Listing Image:</label>
        <input type="file" name="image" id="image" accept="image/*">

        <?php if (!empty($listing['image'])): ?>
            <div class="current-image">
                <p>Current Image:</p>
                <img src="<?= $listing['image'] ?>/listing_<?= $listing['listid'] ?>.jpg" alt="Listing Image" style="max-width: 200px;">
            </div>
        <?php endif; ?>

        <div class="action-buttons">
            <button type="submit" class="btn btn-save">Update Listing</button>
            <a href="/listing_hotel" class="btn btn-cancel">Cancel</a>
        </div>
    </form>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>
