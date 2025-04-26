<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/rental/sidebar_car.php') ?>
<div class="main--content" style="background-color: #f0f2f5;;">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <div class="table--content">
        <table>
            <thead>
                <tr>
                    <th>Review ID</th>
                    <th>Review </th>
                    <th>Ratings</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review) : ?>
                    <tr>
                        <td><?= '#' . $review['reviewid'] ?></td>
                        <td><?= $review['review'] ?></td>
                        <td><?= $review['ratings'] ?? 'No ratings yet' ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/rental/js/review.php') ?>
<?php require base_path('views/partials/footer.php') ?>