<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">
        Manage Reviews
        <?php if ($totalReviews > 0): ?>
            <span class="overall-rating">
                (⭐ <?= $averageRating ?> based on <?= $totalReviews ?> review<?= $totalReviews > 1 ? 's' : '' ?>)
            </span>
        <?php endif; ?>
    </h1>

    <?php if (!empty($reviews)): ?>
        <div class="reviews-container">
            <table class="reviews-table">
                <thead>
                    <tr>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews as $review): ?>
                        <tr>
                            <td><?= htmlspecialchars($review['review']) ?></td>
                            <td><?= htmlspecialchars($review['rating']) ?> / 5</td>
                            <td>
                                <a href="/edit_review?reviewid=<?= $review['reviewid'] ?>" class="btn btn-edit">Edit</a>
                                <a href="/remove_review?reviewid=<?= $review['reviewid'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to remove this review?');">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>No reviews found for this accommodation.</p>
    <?php endif; ?>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>