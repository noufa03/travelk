<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles-trippage.php');?>

<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles-trippage.php'); ?>

<div class="trip-container">
  <div class="trip-container-left">
    <!-- Picked Places -->
    <div class="trip-container-section">
      <?php if (!empty($place_userID)): ?>
        <div class="trip-container-left-item">
            <h4><i class='bx bx-map'></i> Picked Places</h4>
            <?= htmlspecialchars(count($place_userID)) ?>
        </div>
        <div class="trip-container-left-item-list">
            <?php foreach ($place_userID as $place): ?>
                
                <div><?= htmlspecialchars($place['display_name']) ?></div>
                
            <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <div class="change-places-form">
        <form method="POST" action="/planning/place">
            <button type="submit" class="next-button">Change Places</button>
        </form>
      </div>
    </div>

    <!-- Picked Stays -->
    <div class="trip-container-section">
      <?php if (!empty($stay_userID)): ?>
        <div class="trip-container-left-item">
          <h4><i class='bx bxs-hotel'></i> Picked Stays</h4>
          <?= htmlspecialchars(count($stay_userID)) ?>
        </div>
        <div class="trip-container-left-item-list">
          <?php foreach ($stay_userID as $place): ?>
            <div><?= htmlspecialchars($place['display_name']) ?></div>
            <div><?= is_null($place['min_price'][0]['min_price']) ?></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <div class="change-places-form">
        <form method="POST" action="/planning/stay">
          <button type="submit" class="next-button">Change Stays</button>
        </form>
      </div>
    </div>

    <!-- Picked Restaurants -->
    <div class="trip-container-section">
      <?php if (!empty($rest_userID)): ?>
        <div class="trip-container-left-item">
          <h4><i class='bx bx-restaurant'></i> Picked Restaurants</h4>
          <?= htmlspecialchars(count($rest_userID)) ?>
        </div>
        <div class="trip-container-left-item-list">
          <?php foreach ($rest_userID as $place): ?>
            <div><?= htmlspecialchars($place['display_name']) ?></div>
            <div><?= is_null($place['min_price'][0]) ?></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <div class="change-places-form">
        <form method="POST" action="/planning/rest">
          <button type="submit" class="next-button">Change Restaurants</button>
        </form>
      </div>
    </div>
  </div>

  <div class="trip-container-middle">

  </div>
  <div class="trip-container-right">

  </div>

<?php require (BASE_PATH.'views/partials/user/script.php');?>