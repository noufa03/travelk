<?php require(BASE_PATH . 'views/partials/head.php'); ?>
<?php require (BASE_PATH.'views/partials/header3.php'); ?>

<div class="trip-container">
    <form method="POST" action="/trips?userID=<?= htmlspecialchars($userID) ?>">
        <button class="back-button">&lt; Back</button>
    </form>
    <!-- Trip Details Section -->
    <div class="trip-details">
        <h1>Trip Details</h1>
        <p><strong>Starting Date:</strong> <?= htmlspecialchars($trip[0]['start_date']) ?></p>
        <p><strong>Ending Date:</strong> <?= htmlspecialchars($trip[0]['end_date']) ?></p>
        <p><strong>Total Amount:</strong> <?= htmlspecialchars($trip[0]['full_amount']) ?></p>
    </div>
<!--    --><?php //dd($trip) ?>
    <!-- Places Section -->
    <div class="places-container">
        <h2>Places in Trip</h2>
        <?php foreach ($trip as $place): ?>
            <div class="place-entry">
                <?php if (!empty($place['visitDate'])): ?>
                    <p><strong>Location Date:</strong> <?= htmlspecialchars($place['visitDate']) ?></p>
                <?php else: ?>
                    <p><strong>Location Date:</strong> Not available</p>
                <?php endif; ?>

                <?php if (!empty($place['display_name'])): ?>
                    <p><strong>Location Name:</strong> <?= htmlspecialchars($place['display_name']) ?></p>
                <?php else: ?>
                    <p><strong>Location Name:</strong> Not available</p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Action Buttons -->
    <div class="actions">
        <form method="POST" action="/edit-trip">
            <input type="hidden" name="tripID" value="<?= htmlspecialchars($trip[0]['tripID']) ?>">
            <button type="submit" class="edit-button">Edit Trip</button>
        </form>

        <form method="POST" action="/delete-trip" onsubmit="return confirm('Are you sure you want to delete this trip?');">
            <input type="hidden" name="tripID" value="<?= htmlspecialchars($trip[0]['tripID']) ?>">
            <button type="submit" class="delete-button">Delete Trip</button>
        </form>
    </div>
</div>

<?php require(BASE_PATH . 'views/partials/foot.php'); ?>

