<?php require (BASE_PATH.'views/partials/head.php'); ?>

<div class="main-container">
        <div id="left-pane">
        <h3>Selected Places</h3>
            <?php if (!empty($selectedPlacesDetails)): ?>
                <ul id="selected-places">
                    <?php foreach ($selectedPlacesDetails as $place): ?>
                        <li class="selected-place">
                            <?= htmlspecialchars($place['display_name']) ?><br>
                            <?= htmlspecialchars($place['street_address']) ?><br>
                            <?= htmlspecialchars($place['hot_line']) ?><br>
                            <form method="POST" action="/planning" style="display: inline;">
                                <input type="hidden" name="selectedPlaces" value="<?= htmlspecialchars(json_encode($selectedPlaces)) ?>">
                                <input type="hidden" name="remove_place" value="<?= htmlspecialchars($place['locationID']) ?>">
                                <button type="submit" class="remove-button">Remove</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                    <form method="POST" action="/store">
                        <input type="hidden" name="selectedPlacesDetails" value="<?= htmlspecialchars(json_encode($selectedPlacesDetails)) ?>">
                        <button type="submit" class="next-button">NEXT</button>
                    </form>
                </ul>
            <?php else: ?>
            <div class="watermark">
                Add Places
            </div>
        <?php endif; ?>
    </div>

    <div id="right-pane">
        <div class="map-container">
            <iframe src="https://www.google.com/maps/d/embed?mid=1ci9V3TXZfESUmTiNt9txvv9TKUIKkCw&ehbc=2E312F" width="640" height="480"></iframe>
        </div>
        <div class="search-bar">
            <form method="GET" action="/planning">
                <input type="text" name="search" placeholder="Search places..." value="<?= htmlspecialchars($searchTerm ?? '') ?>">
                <button type="submit">Search</button>
            </form>
        </div>
        <br><br>
        <div id="places-list">
            <?php foreach ($places as $place): ?>
                <div class="place-card">
                    <h4><?= htmlspecialchars($place['display_name']) ?></h4>
                    <p><strong>Location:</strong> <?= htmlspecialchars($place['city']) ?></p>

                    <?php if (!empty($place['description'])): ?>
                        <p><?= htmlspecialchars($place['description']) ?></p>
                    <?php endif; ?>

                    <p><strong>Category:</strong> <?= htmlspecialchars($place['location_type']) ?></p>

                    <form method="POST" action="/planning">
                        <input type="hidden" name="selectedPlaces" value="<?= htmlspecialchars(json_encode($selectedPlaces)) ?>">
                        <input type="hidden" name="add_place" value="<?= htmlspecialchars($place['locationID']) ?>">
                        <button type="submit">Add</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>



<?php require (BASE_PATH.'views/partials/foot.php'); ?>

