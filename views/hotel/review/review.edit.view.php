<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1>Edit Review</h1>

    <form action="/edit_review" method="POST" class="edit-form">
        <input type="hidden" name="reviewid" value="<?= $review['reviewid'] ?>">

        <p><strong>Review:</strong> <?= htmlspecialchars($review['review']) ?></p>
        <p><strong>Rating:</strong> <?= htmlspecialchars($review['rating']) ?> / 5</p>

        <label for="reply">Reply:</label>
        <textarea name="reply"><?= htmlspecialchars($review['reply']) ?></textarea>

        <label for="status">Visibility:</label>
        <div class="custom-select-wrapper">
            <select name="status">
                <option value="visible" <?= $review['status'] === 'visible' ? 'selected' : '' ?>>Visible</option>
                <option value="hidden" <?= $review['status'] === 'hidden' ? 'selected' : '' ?>>Hidden</option>
            </select>
        </div>

        <button type="submit" class="btn btn-save">Update</button>
    </form>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>