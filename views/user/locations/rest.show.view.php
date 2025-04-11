<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles-restview.php');?>

<div class="place-container">
<div class="back-button">
    <a href="javascript:history.back()"><i class='bx bxs-left-arrow-circle'></i></a>
</div>
        <section class="photos">
            <div class="photo-gallery">
            <?php if (!empty($place['photo_names'])) : ?>
              <?php foreach ($place['photo_names'] as $photo_name) : ?>
                  <img src="<?= htmlspecialchars($place['photos'] . DIRECTORY_SEPARATOR . $photo_name) ?>" alt="<?= htmlspecialchars($place['display_name']) ?>">
              <?php endforeach; ?>
            <?php else : ?>
                <p>No photos available.</p>
            <?php endif; ?>
            </div>
        </section>
        <section class="restaurant-details">
          <h1><?php echo $place['display_name'] ?></h1>
          <p><strong>Address:</strong> <?php echo $place['street_address'] ?></p>
          <p><strong>Hotline:</strong> <a href="tel:<?php echo $place['hot_line'] ?>"><?php echo $place['hot_line'] ?></a></p>
          
          <p><strong>Seating Capacity:</strong> <?php echo $resturant_display_details['seatingCapacity'] ?></p>
          <p><strong>Payment Methods:</strong> <?php echo $resturant_display_details['paymentMethods'] ?></p>
          <p><strong>Delivery Options:</strong> <?php echo $resturant_display_details['deliveryOptions'] ?></p>
          <p><strong>Location:</strong> <a href="https://maps.app.goo.gl/BtTPNqQEZKRbuP2s7" target="_blank">View on Google Maps</a></p>
        </section>
        <!-- Save Box -->
        <!-- rray(10) {

        array(13) {
  ["locationid"]=>
  int(39)
  ["location_type"]=>
  string(10) "restaurant"
  ["name"]=>
  string(12) "a Restaurant"
  ["display_name"]=>
  string(10) "Bisro cafe"
  ["street_address"]=>
  string(14) "111/J,Bollatha"
  ["city"]=>
  string(9) "ganemulla"
  ["google_map_link"]=>
  string(41) "https://maps.app.goo.gl/BtTPNqQEZKRbuP2s7"
  ["districtid"]=>
  int(7)
  ["photos"]=>
  string(67) "restaurants/folder56/locations/20fe632ffa72efbc37e4f91bb1244512.png"
  ["hot_line"]=>
  string(10) "0762402350"
  ["userid"]=>
  int(56)
  ["latitude"]=>
  string(8) "6.927079"
  ["longitude"]=>
  string(9) "79.861244"
}
  ["id"]=>
  int(56)
  ["operatingHoursFrom"]=>
  string(8) "08:00:00"
  ["seatingCapacity"]=>
  int(112)
  ["deliveryOptions"]=>
  string(6) "credit"
  ["paymentMethods"]=>
  string(6) "credit"
  ["logo"]=>
  string(62) "restaurants/folder56/logo/33aea7d09336723545bdf9f409228ac6.png"
  ["operatingHoursTo"]=>
  string(8) "12:00:00"
  ["profile"]=>
  string(65) "restaurants/folder56/profile/914b0ea2d0aff67628c72f8b7ae82cb7.png"
  ["operatingdaysFrom"]=>
  string(6) "monday"
  ["operatingdaysTo"]=>
  string(8) "thursday"
} -->
    <div class="save-box">
      <h3>Save this restaurant</h3>
      <button class="save-button">♡ Save</button>
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
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $operatingDayStart = $resturant_display_details['operatingdaysFrom'];
        $operatingDayEnd = $resturant_display_details['operatingdaysTo'];
        $operatingHoursFrom = date('g:i A', strtotime($resturant_display_details['operatingHoursFrom']));
        $operatingHoursTo = date('g:i A', strtotime($resturant_display_details['operatingHoursTo']));

        foreach ($days as $day) {
            $isOperatingDay = strtolower($day) >= $operatingDayStart && strtolower($day) <= $operatingDayEnd;
            ?>
            <li>
                <span><?= $day ?></span>
                <span<?= strtolower($day) === date('l') ? ' class="bold"' : '' ?>>
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
    </main>
  </div>
</div>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>
