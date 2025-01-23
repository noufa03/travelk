<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>

<div class="trip-container">
    <!-- Back Button -->
    <form method="POST" action="/userpage">
        <button class="back-button">&lt; Back</button>
    </form>

    <!-- Main Form -->
    <form method="POST" action="/update"> <!-- Change the action to POST /update -->
        <!-- Date Section -->
        <div class="date-container">
            <div class="start-date-container">
                <label for="start-date">Starting Date</label>
                <input type="date" id="start-date" name="start_date" value="<?= $trip['start_date'] ?>" required>
            </div>
            <div class="start-date-container">
                <label for="end-date">Ending Date</label>
                <input type="date" id="end-date" name="end_date" value="<?= $trip['end_date'] ?>" required>
            </div>
        </div>
        <br><br>

        <!-- Places Section -->
        <div class="places-container">
            <?php foreach ($locations as $place): ?>
                <div class="place-entry">
                    <input type="date" id="place-date-<?= $place['locationID'] ?>" class="calendar-date"
                           name="place_dates[<?= $place['locationID'] ?>]" value="<?= $place['visitDate'] ?>" required>
                    <div class="place-name"><?= htmlspecialchars($place['display_name']) ?></div>
                    <?php if($place['location_type'] === 'Accommodation'): ?>
                        <?= $place['booking_status'] === 'Booked' ? 'Booked' : 'Book Now' ?>
                    <?php endif; ?>
                    <button type="button" class="remove-button">Remove</button>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Amount Section -->
        <div class="amount-container">
            <label for="amount">Amount</label>
            <input type="text" id="amount" name="amount" value="<?= $trip['full_amount'] ?>" placeholder="Total amount" required>
        </div>

        <!-- Hidden Fields for Trip ID -->
        <input type="hidden" name="tripID" value="<?= $trip['tripID'] ?>">

        <!-- Action Buttons -->
        <div class="actions">
            <button type="submit" class="save-button">Save Trip</button>
        </div>
    </form>

    <!-- Add More Places Button -->
    <form method="POST" action="/planning">
        <input type="hidden" name="selectedPlacesDetails" value="<?= htmlspecialchars(json_encode($locations)) ?>">
        <button type="submit" class="add-button">Add More Places</button>
    </form>

    <!-- Budget Calculator Button -->
    <button class="budget-button" onclick="window.location.href='/budget-calculator';">Go to Budget Calculator</button>
</div>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>
