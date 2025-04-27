<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require (BASE_PATH.'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">Confirm Delete</h1>

    <div class="confirmation-box">
        <p class="no-data">Are you sure you want to delete this listing?</p>

        <form action="/remove_listing?id=<?= htmlspecialchars($listing['listid']) ?>" method="POST" class="edit-form">
            <div class="action-buttons">
                <button type="submit" class="btn btn-save">Delete</button>
                <a href="/listing_hotel" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>