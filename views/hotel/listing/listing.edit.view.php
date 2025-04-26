<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require (BASE_PATH.'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>


<main class="dashboard-container">
    <h1 class="welcome-message">Edit Listing</h1>

    <form action="/edit_listing" method="POST" enctype="multipart/form-data" class="edit-form">
        <!-- Hidden ID field -->
        <input type="hidden" name="listid" value="<?= htmlspecialchars($listing['listid']) ?>">

        <label>Listing Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($listing['name']) ?>" required>

        <label>Category:</label>
        <input type="text" name="category" value="<?= htmlspecialchars($listing['category']) ?>" required>

        <label>Features:</label>
        <textarea name="features"><?= htmlspecialchars($listing['features']) ?></textarea>

        <label>Location:</label>
        <input type="text" name="location" value="<?= htmlspecialchars($listing['location']) ?>" required>

        <label>Price (LKR):</label>
        <input type="number" name="price" step="0.01" value="<?= htmlspecialchars($listing['price']) ?>" required>

        <label>
            <input type="checkbox" name="availability" <?= $listing['availability'] ? 'checked' : '' ?>>
            Available
        </label>

        <div class="action-buttons">
            <button type="submit" class="btn btn-save">Update Listing</button>
            <a href="/listing_hotel" class="btn btn-cancel">Cancel</a>
        </div>
    </form>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>