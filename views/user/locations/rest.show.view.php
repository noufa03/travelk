<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles-restview.php');?>
<?php require (BASE_PATH.'views/partials/user/script.php');?>

<div class="place-container">
    <div class="back-button">
        <a href="javascript:void(0);" onclick="goBackAndReload();">
            <i class='bx bxs-left-arrow-circle'></i>
        </a>
    </div>
    <section class="restaurant-header">
        <h1><i class='bx bx-restaurant'></i> <?= htmlspecialchars($place['display_name']) ?></h1>
        <div class="photo-gallery">
            <?php if (!empty($all_photos)) : ?>
                <?php foreach ($all_photos as $photo) : ?>
                    <img src="<?= htmlspecialchars('/' . $photo) ?>" alt="<?= htmlspecialchars($place['display_name']) ?>" class="gallery-image" onclick="openLightbox('<?= htmlspecialchars('/' . $photo) ?>')">
                <?php endforeach; ?>
            <?php else : ?>
                <p>No photos available.</p>
            <?php endif; ?>
        </div>
        <div id="lightbox" class="lightbox">
            <span class="close-lightbox" onclick="closeLightbox()">×</span>
            <img id="lightbox-image" class="lightbox-image" src="" alt="Full-size image">
        </div>
    </section>
  
    <div class="resturant-details-container">
        <section class="restaurant-details">
            <p><strong><i class='bx bx-location-plus'></i> Address:</strong> <a href="<?= htmlspecialchars($place['google_map_link']) ?>" target="_blank"><?= htmlspecialchars($place['street_address']) ?></a></p>
            <p><strong><i class='bx bx-phone'></i> To reserve a seat, call us at:</strong> <a href="tel:<?= htmlspecialchars($place['hot_line']) ?>"><?= htmlspecialchars($place['hot_line']) ?></a></p>
            <p><strong><i class='bx bx-chair'></i> Seating Capacity:</strong> <?= htmlspecialchars($resturant_display_details['seatingCapacity']) ?> seats available</p>
            <p><strong><i class='bx bx-wallet'></i> Payment Methods:</strong> <?= htmlspecialchars($resturant_display_details['paymentMethods']) ?></p>
            <p><strong><i class='bx bx-bowl-hot'></i> Delivery Options:</strong> <?= htmlspecialchars($resturant_display_details['deliveryOptions']) ?></p>
        </section>
          
        <section class="opening-hours">
            <div class="save-box">
                <h3>Save this Restaurant</h3>
                <button class="save-button" onclick="toggleFavorite(this)"><i class='bx bx-heart'></i> Save</button>
            </div>
            <div class="hours-box">
                <div class="hours-header">
                    <h3>Hours</h3>
                </div>
                <div>
                    <?php
                    $now = new DateTime();
                    $openingTime = new DateTime($resturant_display_details['operatingHoursFrom']);
                    $closingTime = new DateTime($resturant_display_details['operatingHoursTo']); 

                    $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    $operatingDayStart = strtolower($resturant_display_details['operatingdaysFrom']);
                    $operatingDayEnd = strtolower($resturant_display_details['operatingdaysTo']);

                    $currentDay = strtolower(date('l'));
                    $dayToIndex = array_flip(array_map('strtolower', $days));
                    $startIndex = $dayToIndex[$operatingDayStart];
                    $endIndex = $dayToIndex[$operatingDayEnd];
                    $todayIndex = $dayToIndex[$currentDay];

                    if ($startIndex <= $endIndex) {
                        $isOperatingToday = ($todayIndex >= $startIndex && $todayIndex <= $endIndex);
                    } else {
                        $isOperatingToday = ($todayIndex >= $startIndex || $todayIndex <= $endIndex);
                    }

                    if ($isOperatingToday) {
                        if ($now < $openingTime) {
                            $diff = $now->diff($openingTime);
                            $minutes = ($diff->h * 60) + $diff->i;
                            echo "<p class='opens'>Opens in {$minutes} minutes</p>";
                        } elseif ($now >= $openingTime && $now <= $closingTime) {
                            echo "<p class='opens'>Open now</p>";
                        } else {
                            echo "<p class='opens'>Closed for today</p>";
                        }
                    } else {
                        echo "<p class='opens'>Closed today</p>";
                    }

                    $operatingHoursFrom = date('g:i A', strtotime($resturant_display_details['operatingHoursFrom']));
                    $operatingHoursTo = date('g:i A', strtotime($resturant_display_details['operatingHoursTo']));
                    ?>

                    <ul class="hours-list">
                        <?php
                        foreach ($days as $index => $day) {
                            if ($startIndex <= $endIndex) {
                                $isOperatingDay = ($index >= $startIndex && $index <= $endIndex);
                            } else {
                                $isOperatingDay = ($index >= $startIndex || $index <= $endIndex);
                            }

                            $isToday = strtolower($day) === $currentDay;
                            ?>
                            <li>
                                <span class="<?= $isToday ? 'bold' : '' ?>"><?= $day ?></span>
                                <span class="<?= $isToday ? 'bold' : '' ?>">
                                    <?= $isOperatingDay ? "{$operatingHoursFrom} – {$operatingHoursTo}" : "Closed" ?>
                                </span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </section>
    </div>
  
    <section class="restaurant-menu">
        <h2>Menu</h2>
        <div class="menu-photos">
            <?php if (!empty($cuisines)) : ?>
                <div class="cuisine-container">
                    <?php foreach ($cuisines as $cuisine) : ?>
                        <div class="cuisine-item" onclick="openMenuPopup(this)">
                            <img src="<?= htmlspecialchars('/' . $cuisine['photo']) ?>" alt="<?= htmlspecialchars($place['display_name']) ?>">
                            <p class="cuisine-name"><?= htmlspecialchars($cuisine['name']) ?></p>
                            <div class="details" style="display:none;">
                                <p><strong>Cuisine Type:</strong> <?= htmlspecialchars($cuisine['cuisine_type']) ?></p>
                                <p><?= htmlspecialchars($cuisine['description']) ?></p>
                                <?php if (!empty($cuisine['sizes'])) : ?>
                                    <div class="sizes">
                                        <?php foreach ($cuisine['sizes'] as $size) : ?>
                                            <div class="size-item">
                                                <span class="size">
                                                    <?php
                                                    $sizeDisplay = '';
                                                    switch(strtolower($size['size'])) {
                                                        case 'large':
                                                            $sizeDisplay = 'L';
                                                            break;
                                                        case 'medium': 
                                                            $sizeDisplay = 'M';
                                                            break;
                                                        case 'small':
                                                            $sizeDisplay = 'S';
                                                            break;
                                                    }
                                                    echo $sizeDisplay;
                                                    ?>
                                                </span>
                                                <span class="price">Rs. <?= htmlspecialchars(number_format($size['price'], 2)) ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($cuisine['flagged_reviews'])) : ?>
                                    <div class="cuisine-reviews">
                                        <?php foreach ($cuisine['flagged_reviews'] as $review) : ?>
                                            <div class="menu-review">
                                                <div class="menu-review-author">
                                                    <img src="<?= htmlspecialchars('/' . $review['profile']) ?>" alt="<?= htmlspecialchars($review['user_name']) ?>" class="menu-review-profile">
                                                    <p>By <?= htmlspecialchars($review['user_name']) ?></p>
                                                </div>
                                                <p class="menu-review-rating">
                                                    Rating: <?= htmlspecialchars($review['ratings']) ?>
                                                    <?php 
                                                    if($review['ratings'] != null){
                                                        for($i = 0; $i < $review['ratings']; $i++){
                                                            echo "<i class='bx bxs-star'></i>";
                                                        }
                                                    }
                                                    ?>
                                                </p>
                                                <p class="menu-review-text"><?= htmlspecialchars($review['review']) ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div id="menu-popup" class="menu-popup">
                    <div class="menu-popup-content">
                        <span class="close-btn" onclick="closeMenuPopup()">×</span>
                        <div class="popup-details"></div>
                    </div>
                </div>
            <?php else : ?>
                <p>No menu items available.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="restaurant-reviews">
        <div class="reviews-header">
            <h2>Reviews</h2>
            <a href="#" class="write-review" id="openReviewModal"><i class='bx bx-edit-alt'></i> Write a Review</a>
        </div>
        <?php if (!empty($reviews_with_names)) : ?>
            <div class="reviews-container">
                <?php foreach ($reviews_with_names as $review) : ?>
                    <div class="review">
                        <div class="review-author">
                            <img src="<?= htmlspecialchars('/' . $review['traveller_profile']) ?>" alt="<?= htmlspecialchars($review['traveller_name']) ?>" class="review-profile">
                            <p>By <?= htmlspecialchars($review['traveller_name']) ?></p>
                        </div>
                        <p class="review-rating">Rating: <?= htmlspecialchars($review['ratings']) ?>
                            <?php if($review['ratings'] != null){
                                for($i = 0; $i < $review['ratings']; $i++){
                                    echo "<i class='bx bxs-star'></i>";
                                }
                            } ?>
                        </p>
                        <p class="review-text"><?= htmlspecialchars($review['review']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>No reviews available.</p>
        <?php endif; ?>
    </section>
  
    <section class="write-review-section">
        <div id="reviewModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeReviewModal">×</span>
                <h2>Write a Review</h2>
                <?php if (!$user) : ?>
                    <div class="auth-warning">
                        <p>Please <a href="/login">login</a> or <a href="/register_user">register</a> to write a review.</p>
                    </div>
                <?php else : ?>
                    <form action="/resturent?id=<?= htmlspecialchars($place['locationid']) ?>" method="post">
                        <input type="hidden" name="place" value="<?= htmlspecialchars(json_encode($place)) ?>">
                        <input type="hidden" name="user" value="<?= htmlspecialchars(json_encode($user)) ?>">
                        <input type="hidden" name="restid" value="<?= htmlspecialchars(json_encode($restid)) ?>">
                        <input type="hidden" name="resturant_details" value="<?= htmlspecialchars(json_encode($resturant_details)) ?>">
                        <input type="hidden" name="resturant_display_details" value="<?= htmlspecialchars(json_encode($resturant_display_details)) ?>">
                        <input type="hidden" name="all_photos" value="<?= htmlspecialchars(json_encode($all_photos)) ?>">
                        <input type="hidden" name="menu_photos" value="<?= htmlspecialchars(json_encode($menu_photos)) ?>">
                        <input type="hidden" name="location_photos" value="<?= htmlspecialchars(json_encode($location_photos)) ?>">
                        <label for="review-type">What are you reviewing?</label>
                        <select id="review-type" name="review_type" required>
                            <option value="restaurant">The Restaurant</option>
                            <option value="menu">A Menu Item</option>
                        </select>
                        <div id="menu-select-container" style="display: none;">
                            <label for="menu-item">Select Menu Item</label>
                            <select name="menu_item" id="menu-item">
                                <option value="">-- Choose Menu Item --</option>
                                <?php if (!empty($cuisines)) : ?>
                                    <?php foreach ($cuisines as $item) : ?>
                                        <option value="<?= htmlspecialchars($item['cuisineID']) ?>">
                                            <?= htmlspecialchars($item['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div> 
                        <label for="review">Your Review</label>
                        <textarea name="review" id="review" placeholder="Write your review here..." required></textarea>
                        <label for="rating">Rating</label>
                        <select name="ratings" id="rating" required>
                            <option value="">Choose a rating</option>
                            <option value="1">1 ★</option>
                            <option value="2">2 ★★</option>
                            <option value="3">3 ★★★</option>
                            <option value="4">4 ★★★★</option>
                            <option value="5">5 ★★★★★</option>
                        </select>
                        <button type="submit">Submit Review</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<script>
function goBackAndReload() {
    sessionStorage.setItem('reloadAfterBack', 'true');
    history.back();
}

window.addEventListener('pageshow', function(event) {
    if (sessionStorage.getItem('reloadAfterBack')) {
        sessionStorage.removeItem('reloadAfterBack');
        location.reload();
    }
});

function openLightbox(src) {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    lightboxImage.src = src;
    lightbox.style.display = 'flex';
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.style.display = 'none';
}

function openMenuPopup(element) {
    const popup = document.getElementById('menu-popup');
    const popupDetails = popup.querySelector('.popup-details');
    const details = element.querySelector('.details').innerHTML;
    popupDetails.innerHTML = details;
    popup.style.display = 'flex';
}

function closeMenuPopup() {
    const popup = document.getElementById('menu-popup');
    popup.style.display = 'none';
}

function toggleFavorite(button) {
    const icon = button.querySelector('i');
    icon.classList.toggle('favorite');
}
</script>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>