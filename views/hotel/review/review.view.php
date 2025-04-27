<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">
        User Reviews
        <?php if ($totalReviews > 0): ?>
            <span class="overall-rating">
                (⭐ <?= $averageRating ?> based on <?= $totalReviews ?> review<?= $totalReviews > 1 ? 's' : '' ?>)
            </span>
        <?php endif; ?>
    </h1>

    <?php if (!empty($unrepliedReviews) || !empty($repliedReviews)): ?>
        <div class="reviews-container">

            <?php if (!empty($unrepliedReviews)): ?>
                <h2 class="review-section-title">Yet to Reply</h2>
                <table class="reviews-table">
                    <thead>
                        <tr>
                            <th class="review-col">Review</th>
                            <th>Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($unrepliedReviews as $review): ?>
                            <tr>
                                <td><?= htmlspecialchars($review['review']) ?></td>
                                <td><?= htmlspecialchars($review['rating']) ?> / 5</td>
                                <td>
                                    <a href="/edit_review?reviewid=<?= $review['reviewid'] ?>" class="btn btn-edit">Reply / Flag</a>
                                    <!-- <a href="/remove_review?reviewid=<?= $review['reviewid'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to remove this review?');">Remove</a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <?php if (!empty($repliedReviews)): ?>
                <h2 class="review-section-title">Replied</h2>
                <table class="reviews-table">
                    <thead>
                        <tr>
                            <th class="review-col">Review</th>
                            <th class="reply-col">Reply</th>
                            <th>Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($repliedReviews as $review): ?>
                            <tr>
                                <td><?= htmlspecialchars($review['review']) ?></td>
                                <td><?= htmlspecialchars($review['reply']) ?></td>
                                <td><?= htmlspecialchars($review['rating']) ?> / 5</td>
                                <td>
                                    <a href="/edit_review?reviewid=<?= $review['reviewid'] ?>" class="btn btn-edit">Flag</a>
                                    <!-- <a href="/remove_review?reviewid=<?= $review['reviewid'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to remove this review?');">Remove</a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <p class="no-data">No reviews found for this accommodation.</p>
    <?php endif; ?>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>