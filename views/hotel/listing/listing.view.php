<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require (BASE_PATH.'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main>
    <div class="listings-container">
        <!-- Add New Listing Box -->
        <div class="listing add-new">
            <a href="/add_listing">
                <span class="plus">+</span>
                <p>Add New Listing</p>
            </a>
        </div>

        <!-- Sample Listing Box (Loop This in PHP) -->
        <?php foreach ($listings as $listing): ?>
        <div class="listing">
            <h3><?= htmlspecialchars($listing['name']) ?></h3>
            <p><?= htmlspecialchars($listing['location']) ?></p>
            <div class="listing-actions">
                <a href="/hotel/edit/<?= $listing['listid'] ?>" class="btn btn-edit">Edit</a>
                <a href="/hotel/delete/<?= $listing['listid'] ?>" class="btn btn-delete">Remove</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>


<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>
