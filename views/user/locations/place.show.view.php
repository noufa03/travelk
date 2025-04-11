<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles-placeview.php');?>



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
        <div class="place-details"> 
        <div class="place-header">          
          <h1 class="place-name"><?= $place['display_name'] ?></h1>
          <div>
            <i class='bx bx-heart'></i>
            <button class="plan-trip-button" onclick=>Plan a trip</button>
          </div>
        </div>
        <p class="place-description"><?= $place_details['description'] ?></p>
        </div>


        

        <!-- Key Details Section -->
        <section class="key-details">
            <h2>Key Details</h2>
            <div class="details-grid">
                          <div class="detail-item">
            <span class="detail-label">Opening Hours:</span>
            <span class="detail-value"><?= $place_details['open_h'] ?></span>
          </div>
          <div class="detail-item">
            <span class="detail-label">Entry Fee:</span>
            <span class="detail-value"><?= $place_details['entry_fee'] ?></span>
          </div>
          <div class="detail-item">
            <span class="detail-label">Best Time to Visit:</span>
            <span class="detail-value"><?= $place_details['best_travel_time'] ?></span>
          </div>
          <div class="detail-item">
              <span class="detail-label">Accessibility:</span>

            <span class="detail-value"><?= $place_details['accessibility'] ?></span>
        </div>
        </div>

    </section>
    
      <!-- Location Section -->
      <section class="location">
          <h2>Location</h2>
          <div class="location-details">
              <div class="address">
                  <span class="label">Address:</span>
                  <span class="value"><?= $place['street_address'], ', ', $place['city']?></span>
                </div>
                <div class="map-link">
                    <a href="https://goo.gl/maps/XYZ123" target="_blank">View on Google Maps</a>
                </div>
                
            </div>
        </section>
        
        <!-- Photos Section -->
        


    </main>
  </div>
</div>





<?php require (BASE_PATH.'views/partials/user/foot.php');?>