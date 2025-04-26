<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">Add New Listing</h1>
    <form action="/add_listing" method="POST" enctype="multipart/form-data" class="edit-form">
        <label>Listing Name:</label>
        <input type="text" name="name" required>

        <label>Category:</label>
        <input type="text" name="category" required>

        <label>Features:</label>
        <textarea name="features"></textarea>

        <label>Location:</label>
        <input type="text" name="location" required>

        <label>Price (LKR):</label>
        <input type="number" name="price" step="0.01" required>

        <label>
            <input type="checkbox" name="availability" checked>
            Available
        </label>

        <label for="image">Listing Image:</label>
        <input type="file" name="image" id="image" accept="image/*">

        <div class="action-buttons">
            <button type="submit" class="btn btn-save">Add List</button>
            <a href="/listing_hotel" class="btn btn-cancel">Cancel</a>
        </div>
    </form>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>
