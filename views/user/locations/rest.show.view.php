<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles-restview.php');?>

<div class="place-container">
<div class="back-button">
    <a href="javascript:history.back()"><i class='bx bxs-left-arrow-circle'></i></a>
</div>
        <section class="restaurant-header">
          <h1><i class='bx bx-restaurant'></i> <?php echo $place['display_name'] ?></h1>
              <div class="photo-gallery">
              <?php if (!empty($all_photos)) : ?>
                <?php foreach ($all_photos as $photo) : ?>
                    <img src="<?= htmlspecialchars($photo) ?>" alt="<?= htmlspecialchars($place['display_name']) ?>">
                <?php endforeach; ?>
              <?php else : ?>
                  <p>No photos available.</p>
              <?php endif; ?>
              </div>
        </section>
        <section class="restaurant-details">
          <p><strong><i class='bx bx-location-plus'></i></strong> <a href="https://maps.app.goo.gl/BtTPNqQEZKRbuP2s7" target="_blank"><?php echo $place['street_address'] ?></a></p>
          <p><strong><i class='bx bx-phone' ></i></strong> <a href="tel:<?php echo $place['hot_line'] ?>"><?php echo $place['hot_line'] ?></a></p>
          
          <p><strong><i class='bx bx-chair' ></i></strong> <?php echo $resturant_display_details['seatingCapacity'] ?></p>
          <p><strong><i class='bx bx-wallet' ></i></strong> <?php echo $resturant_display_details['paymentMethods'] ?></p>
          <p><strong><i class='bx bx-bowl-hot' ></i></strong> <?php echo $resturant_display_details['deliveryOptions'] ?></p>
        </section>
        
        <section class="opening-hours">
          <!-- Save Box -->
          <div class="save-box">
            <h3>Save this restaurant</h3>
            <button class="save-button"><i class='bx bx-heart'></i> Save</button>
          </div>

          <!-- Hours Box -->
          <div class="hours-box">
            <div class="hours-header">
              <h3>Hours</h3>
            </div>
            
            <?php
            $now = new DateTime();
            $openingTime = new DateTime($resturant_display_details['operatingHoursFrom']);
            $closingTime = new DateTime($resturant_display_details['operatingHoursTo']); 
            
            $currentDay = strtolower(date('l'));
            $isOperatingDay = $currentDay >= $resturant_display_details['operatingdaysFrom'] && 
                              $currentDay <= $resturant_display_details['operatingdaysTo'];

            if ($isOperatingDay) {
                if ($now < $openingTime) {
                    $diff = $now->diff($openingTime);
                    $minutes = ($diff->h * 60) + $diff->i;
                    echo "<p class='opens'>Opens in {$minutes} minutes</p>";
                } else if ($now >= $openingTime && $now <= $closingTime) {
                    echo "<p class='opens'>Open now</p>";
                } else {
                    echo "<p class='opens'>Closed for today</p>";
                }
            } else {
                echo "<p class='opens'>Closed today</p>";
            }
            ?>
            <ul class="hours-list">
              <?php
              $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
              $operatingDayStart = $resturant_display_details['operatingdaysFrom'];
              $operatingDayEnd = $resturant_display_details['operatingdaysTo'];
              $operatingHoursFrom = date('g:i A', strtotime($resturant_display_details['operatingHoursFrom']));
              $operatingHoursTo = date('g:i A', strtotime($resturant_display_details['operatingHoursTo']));

              foreach ($days as $day) {
                  $isOperatingDay = strtolower($day) >= $operatingDayStart && strtolower($day) <= $operatingDayEnd;
                  ?>
                  <li>
                      <span><?= $day ?></span>
                      <span<?= strtolower($day) === date('l') ? ' class="bold"' : '' ?>
                          <?php if ($isOperatingDay): ?>
                              <?= $operatingHoursFrom ?> – <?= $operatingHoursTo ?>
                          <?php else: ?>
                              Closed
                          <?php endif; ?>
                      </span>
                  </li>
              <?php } ?>
            </ul>
          </div>
        </section>
        <section class="restaurant-menu">
          <h2>Menu</h2>
          <div class="menu-photos">
            <?php if (!empty($menu_photos)) : ?>
                <?php foreach ($menu_photos as $photo) : ?>
                    <img src="<?= htmlspecialchars($photo) ?>" alt="<?= htmlspecialchars($place['display_name']) ?>">
                <?php endforeach; ?>
            <?php else : ?>
                <p>No photos available.</p>
            <?php endif; ?>
          </div>
        </section>
        <section class="restaurant-reviews">
          <div class="reviews-header">
            <h2>Reviews</h2>
            <a href="/reviews/create" class="write-review"><i class='bx bx-edit-alt' ></i>Write a review</a>
          </div>
          <div class="reviews-container">
            <?php foreach ($reviews_with_names as $review) : ?>
              <div class="review">
                <div class="review-author">
                  <img src="<?= htmlspecialchars($review['traveller_profile']) ?>" alt="<?= htmlspecialchars($review['traveller_name']) ?>" class="review-profile">
                  <p>By <?= htmlspecialchars($review['traveller_name']) ?></p>
                </div>
                <p class="review-rating">Rating: <?= htmlspecialchars($review['ratings']) ?>
                <?php if($review['ratings'] != null){
                    for($i = 0; $i < $review['ratings']; $i++){
                      echo "<i class='bx bxs-star' ></i>";
                    }
                }
                ?></p>
                <p class="review-text"><?= htmlspecialchars($review['review']) ?></p>
              </div>
              <hr/>
            <?php endforeach; ?>
          </div>
        </section>
    
    </main>
  </div>
</div>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>
