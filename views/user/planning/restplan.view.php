<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>
<?php require (BASE_PATH.'views/partials/user/right-logo.php');?>

<div class="main-container">
    <div id="left-pane">
        <?php if(!empty($selectedPlacesDetails)): ?>
            <h3>Picked Places</h3>
            <?php foreach ($selectedPlacesDetails as $place): ?>
                <p class="place-info"><?= htmlspecialchars($place['display_name']) ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if(!empty($selectedPlacesStayDetails)): ?>
            <h3>Picked Stays</h3>
            <?php foreach ($selectedPlacesStayDetails as $place): ?>
                <p class="place-info"><?= htmlspecialchars($place['display_name']) ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <h3>Picked Restaurants</h3>
        <div class="watermark">
            <p>Choose your restaurants and click <strong>Add</strong> to build your dining list.</p>
        </div>
        <br/>
        <?php if (!empty($selectedPlacesRestDetails)): ?>
            <ul id="selected-places">
                <div class="selected-places-container">
                    <?php foreach ($selectedPlacesRestDetails as $place): ?>
                        <li class="selected-place">
                            <h4><?= htmlspecialchars($place['display_name']) ?></h4>    
                            <p class="place-info"><?= htmlspecialchars($place['street_address']) ?></p>
                            <p class="place-info"><?= htmlspecialchars($place['hot_line']) ?></p>
                            <form method="POST" action="/planning/rest" style="display: inline;">
                                <input type="hidden" name="selectedPlaces" value="<?= htmlspecialchars(json_encode($selectedPlaces)) ?>">
                                <input type="hidden" name="remove_place" value="<?= htmlspecialchars($place['locationid']) ?>">
                                <button type="submit" class="remove-button">Remove</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </div>
                <br/>
                <div class="sticky-container">
                    <div class="watermark">
                        <p><strong>Tasty picks!</strong><br/> Ready to finalize? Click <strong>NEXT</strong> to complete your trip plan.</p>
                    </div>
                    <form method="POST" action="/planning/trip">
                        <input type="hidden" name="selectedPlacesDetails" value="<?= htmlspecialchars(json_encode($selectedPlacesDetails)) ?>">
                        <input type="hidden" name="selectedPlacesStayDetails" value="<?= htmlspecialchars(json_encode($selectedPlacesStayDetails)) ?>">
                        <input type="hidden" name="selectedPlacesRestDetails" value="<?= htmlspecialchars(json_encode($selectedPlacesRestDetails)) ?>">
                        <button type="submit" class="next-button">NEXT <i class='bx bx-right-arrow-alt' style="font-size: 1.2rem;"></i></button>
                    </form>
                    <form method="POST" action="/planning/stay">
                        <button type="submit" class="back-button">BACK <i class='bx bx-left-arrow-alt' style="font-size: 1.2rem;"></i></button>
                    </form>
                </div>
            </ul>
        <?php else: ?>
            <div class="sticky-container">
                <div class="watermark">
                    <p>Select restaurants and click <strong>Add</strong> to include them in your trip.</p>
                    <form method="POST" action="/planning/trip">
                        <input type="hidden" name="selectedPlacesDetails" value="<?= htmlspecialchars(json_encode($selectedPlacesDetails)) ?>">
                        <input type="hidden" name="selectedPlacesStayDetails" value="<?= htmlspecialchars(json_encode($selectedPlacesStayDetails)) ?>">
                        <input type="hidden" name="selectedPlacesRestDetails" value="<?= htmlspecialchars(json_encode($selectedPlacesRestDetails)) ?>">
                        <p>Not ready to choose restaurants? <strong>Skip to finalize your trip.</strong></p>
                        <button type="submit" class="skip-button">SKIP <i class='bx bx-right-arrow-alt' style="font-size: 1.2rem;"></i></button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div id="right-pane">
        <div class="place-plan-header">
            <span><strong>Where to dine?</strong> Pick your favorite restaurants.</span>
            <p class="place-plan-header-text">Select the dining spots you love, and traveLK will weave them into your itinerary!</p>
        </div>
        <div class="search-container">
            <form method="GET">
                <div class="search-bar">
                    <div class="search-inputs">
                        <div class="input-group">
                            <input type="text" name="search" placeholder="Search restaurants..." value="<?= htmlspecialchars($searchTerm ?? '') ?>">
                        </div>
                    </div>
                    <button type="submit" class="search-button">
                        <i class='bx bx-search' style="font-size: 1.2rem;"></i>
                    </button>
                </div>
            </form>
        </div>
        <br><br>
        <div id="places-list">
            <?php foreach ($places as $place): ?>
                <div class="place-card">
                    <?php
                    echo '<img src="/' . htmlspecialchars($place['photos'] . DIRECTORY_SEPARATOR . $place['photo_name']) . '" alt="' . htmlspecialchars($place['display_name']) . '" class="place-image">';
                    ?>
                    <h4><?= htmlspecialchars($place['display_name']) ?></h4>
                    <p><strong>Location:</strong> <?= htmlspecialchars($place['city']) ?></p>
                    <p><strong>Category:</strong> <?= htmlspecialchars($place['location_type']) ?></p>
                    <div style="display: flex; justify-content: space-between; gap: 20px;">
                        <form method="POST" action="/planning/rest">
                            <input type="hidden" name="selectedPlaces" value="<?= htmlspecialchars(json_encode($selectedPlaces)) ?>">
                            <input type="hidden" name="add_place" value="<?= htmlspecialchars($place['locationid']) ?>">
                            <button type="submit" class="add-button">Add</button>
                        </form>
                        <form method="GET" action="/resturent?id=<?= urlencode($place['locationid']) ?>">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($place['locationid']) ?>">
                            <button type="submit" class="details-button">View Details</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>