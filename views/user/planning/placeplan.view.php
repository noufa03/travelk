<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>

<div class="main-container">
        <div id="left-pane">
        <h3>Picked Places</h3>
        <div class="watermark">
            <p>Pick the places you want to visit and click <strong>Add</strong> to include them in your list.</p>
        </div>
        <br/>
        <?php if (!empty($selectedPlacesDetails)): ?>
                <ul id="selected-places">
                    <?php foreach ($selectedPlacesDetails as $place): ?>
                        <li class="selected-place">
                            <h4><?= htmlspecialchars($place['display_name']) ?></h4>    
                            <?= htmlspecialchars($place['street_address']) ?><br/>
                            <?= htmlspecialchars($place['hot_line']) ?><br/>
                            <form method="POST" action="/planning/place" style="display: inline;">
                                <input type="hidden" name="selectedPlaces" value="<?= htmlspecialchars(json_encode($selectedPlaces)) ?>">
                                <input type="hidden" name="remove_place" value="<?= htmlspecialchars($place['locationid']) ?>">
                                <button type="submit" class="remove-button">Remove</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                    <br/>
                    <div class="watermark">
                        <p>Great choice!<br/> Once you've picked all the places you'd like to visit, click <strong>NEXT</strong> to plan where you'll stay.</p>
                    </div>
                    <form method="POST" action="/planning/stay">
                        <input type="hidden" name="selectedPlacesDetails" value="<?= htmlspecialchars(json_encode($selectedPlacesDetails)) ?>">
                        <button type="submit" class="next-button">NEXT</button>
                    </form>
                </ul>
            <?php else: ?>
            <div class="watermark">
                <p>You can select places where you want to go and click <strong>Add</strong> to add them to this list.</p>
                <form method="POST" action="/planning/stay">
                    <input type="hidden" name="selectedPlacesDetails" value="<?= htmlspecialchars(json_encode($selectedPlacesDetails)) ?>">
                    <p>Not sure where you want to visit yet? Just hit Skip for now and you can choose your places later!</p>
                    <button type="submit" class="skip-button">SKIP</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <div id="right-pane">
        <div class="place-plan-header">
            <span><strong>Got any places in mind?</strong> Select the locations you're excited to visit.</span>
            <p class="place-plan-header-text">Tap all the places you want to visit — traveLK will handle the route magic!</p>
        </div>
        <div class="search-container">
            <form method="GET">
            
            <div class="search-bar">
                <div class="search-inputs">
                    <div class="input-group">
                        <!-- <label for="search">Search</label> -->
                        <input type="text" name="search" placeholder="Search places..." value="<?= htmlspecialchars($searchTerm ?? '') ?>">
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
                        echo '<img src="' . $place['photos'] . DIRECTORY_SEPARATOR . $place['photo_name'] . '" alt="' . htmlspecialchars($place['display_name']) . '" class="place-image">';
                    ?>
                    <h4><?= htmlspecialchars($place['display_name']) ?></h4>
                    <p><strong>Location:</strong> <?= htmlspecialchars($place['city']) ?></p>

                    <p><strong>Category:</strong> <?= htmlspecialchars($place['location_type']) ?></p>

                    <form method="POST" action="/planning/place">
                        <input type="hidden" name="selectedPlaces" value="<?= htmlspecialchars(json_encode($selectedPlaces)) ?>">
                        <input type="hidden" name="add_place" value="<?= htmlspecialchars($place['locationid']) ?>">
                        <button type="submit">Add</button>
                    </form>
                    <form method="GET" action="/place?id=<?= urlencode($place['locationid']) ?>">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($place['locationid']) ?>">
                        <button type="submit" class="details-button">View Details</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>



<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>

