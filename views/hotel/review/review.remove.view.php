<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1>Remove Review</h1>

    <p>Are you sure you want to remove the following review?</p>
    <p><strong>Review:</strong> <?= htmlspecialchars($review['review']) ?></p>
    <p><strong>Rating:</strong> <?= htmlspecialchars($review['rating']) ?> / 5</p>

    <form action="/remove_review" method="POST">
        <input type="hidden" name="reviewid" value="<?= $review['reviewid'] ?>">
        <button type="submit" class="btn btn-delete">Confirm Delete</button>
        <a href="/review_hotel" class="btn btn-cancel">Cancel</a>
    </form>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>
