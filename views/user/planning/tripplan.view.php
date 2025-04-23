<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>

<div class="trip-container">
  <div class="trip-container-left">
    <div>
      <?php if(!empty($selectedPlacesDetails)): ?>
        <h4>Picked Places</h4>
        <?php foreach ($selectedPlacesDetails as $place): ?>
          <p><?= htmlspecialchars($place['display_name']) ?></p>
        <?php endforeach; ?>
      <?php endif; ?>
      <div>
        <form method="POST" action="/planning/place">
            <button type="submit" class="next-button">Change Places</button>
        </form>
      </div>
    </div>
    <div>
      <?php if(!empty($selectedPlacesStayDetails)): ?>
        <h4>Picked Stays</h4>
        <?php foreach ($selectedPlacesStayDetails as $place): ?>
          <p><?= htmlspecialchars($place['display_name']) ?></p>
        <?php endforeach; ?>
      <?php endif; ?>
      <div>
        <form method="POST" action="/planning/stay">
            <button type="submit" class="next-button">Change Stays</button>
        </form>
      </div>
    </div>
    <div>
      <?php if(!empty($selectedPlacesRestDetails)): ?>
        <h4>Picked Resturants</h4>
        <?php foreach ($selectedPlacesRestDetails as $place): ?>
          <p><?= htmlspecialchars($place['display_name']) ?></p>
        <?php endforeach; ?>
      <?php endif; ?>
      <div>
        <form method="POST" action="/planning/rest">
            <button type="submit" class="next-button">Change Resturants</button>
        </form>
      </div>
    </div>
    <br/>
  </div>

  <div class="trip-container-right">
  <div class="budget-container">
    <form class="budget-form" method="POST" action="/planning/trip/plan">
      <!-- <div type="hidden" name="selectedPlacesDetails" value="<?php echo json_encode($selectedPlacesDetails); ?>"></div>
      <div type="hidden" name="selectedPlacesStayDetails" value="<?php echo json_encode($selectedPlacesStayDetails); ?>"></div>
      <div type="hidden" name="selectedPlacesRestDetails" value="<?php echo json_encode($selectedPlacesRestDetails); ?>"></div> -->
      <h2 class="section-title">💰 Budget Details</h2>

      <label class="form-label">Total Budget or Per Person</label>
      <input type="text" name="budget" placeholder="e.g. LKR 50,000 per person" class="form-input">

      <label class="form-label">Budget Preference</label>
      <select name="budget_preference" class="form-select">
        <option value="luxury">Luxury</option>
        <option value="midrange">Mid-Range</option>
        <option value="budget">Budget-Friendly</option>
      </select>

      <label class="form-label">Expense Priorities</label>
      <input type="text" name="expense_priority" placeholder="e.g. Focus on experiences, better hotels" class="form-input">

      <h2 class="section-title">🧍 Group Information</h2>

      <label class="form-label">Number of Travelers</label>
      <input type="number" name="travelers" min="1" class="form-input">

      <label class="form-label">Age Range</label>
      <input type="text" name="age_range" placeholder="e.g. 18-30" class="form-input">

      <label class="form-label">Type of Travelers</label>
      <select name="traveler_type" class="form-select">
        <option value="solo">Solo</option>
        <option value="family">Family</option>
        <option value="friends">Friends</option>
        <option value="couple">Couple</option>
      </select>

      <h2 class="section-title">📅 Travel Dates</h2>

      <div class="flex-group">
        <div>
          <label class="form-label">Departure Date</label>
          <input type="date" name="departure_date" class="form-input">
        </div>
        <div>
          <label class="form-label">Return Date</label>
          <input type="date" name="return_date" class="form-input">
        </div>
      </div>

      <label class="form-label">Are your dates flexible?</label>
      <select name="flexible_dates" class="form-select">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>

      <h2 class="section-title">🚗 Transport Preferences</h2>

      <label class="form-label">Preferred Travel Mode</label>
      <select name="transport_mode" class="form-select">
        <option value="train">Train</option>
        <option value="bus">Bus</option>
        <option value="private_car">Private Car</option>
        <option value="tuk_tuk">Tuk-Tuk</option>
        <option value="walking">Walking</option>
      </select>

      <label class="form-label">Need Airport/Station Pickup?</label>
      <select name="pickup" class="form-select">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>

      <label class="form-label">Vehicle Preference</label>
      <select name="vehicle_preference" class="form-select">
        <option value="own">Own Vehicle</option>
        <option value="rental">Need Rental</option>
      </select>

      <button type="submit" class="submit-btn">Create My Plan</button>
    </form>
  </div>
</div>




<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>