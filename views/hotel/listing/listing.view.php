<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main>
    <div class="listings-container">
        <!-- Add New Listing -->
        <div class="listing add-new">
            <a href="/add_listing">
                <span class="plus">+</span>
                <p>Add New Listing</p>
            </a>
        </div>

        <!-- List existing listings -->
        <?php foreach ($listings as $listing): ?>
            <div class="listing">
                <img 
                    src="<?= htmlspecialchars($listing['image'] ?? '/assets/hotel/listing.png') ?>" 
                    onerror="this.onerror=null;this.src='/assets/hotel/listing.png';"
                    alt="Listing Image"
                    class="listing-image"
                >

                <h3><?= htmlspecialchars($listing['name']) ?></h3>

                <p><?= htmlspecialchars($listing['price']) ?> USD</p>

                <div class="listing-actions">
                    <a href="/edit_listing?id=<?= $listing['listid'] ?>" class="btn btn-edit">Edit</a>
                    <a href="/remove_listing?id=<?= $listing['listid'] ?>" class="btn btn-delete">Remove</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>
