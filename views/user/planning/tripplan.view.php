<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>
<?php require (BASE_PATH.'views/partials/user/right-logo.php');?>

<div class="trip-container">
    <div class="trip-container-left">
        <div>
            <?php if(!empty($selectedPlacesDetails)): ?>
              <div class="trip-container-left-item">
                <h4><i class='bx bx-map'></i> Picked Places</h4>
                <?= htmlspecialchars(count($selectedPlacesDetails)) ?>
              </div>
              <div>
                <?php foreach ($selectedPlacesDetails as $place): ?>
                    <p><?= htmlspecialchars($place['display_name']) ?></p>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <div>
                <form method="POST" action="/planning/place">
                    <button type="submit" class="next-button">Change Places</button>
                </form>
            </div>
        </div>
        <div>
            <?php if(!empty($selectedPlacesStayDetails)): ?>
              <div class="trip-container-left-item"> 
                <h4><i class='bx bxs-hotel'></i> Picked Stays</h4>
                <?= htmlspecialchars(count($selectedPlacesStayDetails)) ?>
              </div>
              <div>
                <?php foreach ($selectedPlacesStayDetails as $place): ?>
                    <p><?= htmlspecialchars($place['display_name']) ?></p>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <div>
                <form method="POST" action="/planning/stay">
                    <button type="submit" class="next-button">Change Stays</button>
                </form>
            </div>
        </div>
        <div>
            <?php if(!empty($selectedPlacesRestDetails)): ?>
              <div class="trip-container-left-item">
                <h4><i class='bx bx-restaurant'></i> Picked Restaurants</h4>
                <?= htmlspecialchars(count($selectedPlacesRestDetails)) ?>
              </div>
              <div>
                <?php foreach ($selectedPlacesRestDetails as $place): ?>
                    <p><?= htmlspecialchars($place['display_name']) ?></p>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <div>
                <form method="POST" action="/planning/rest">
                    <button type="submit" class="next-button">Change Restaurants</button>
                </form>
            </div>
        </div>
        <br/>
    </div>
  
    
      <div class="trip-container-right">
      <form id="traveler-form">
        <div class="trip-container-right-right">

          <!-- Traveler Profile -->
          <div class="trip-question active">
            <h3>Traveler Profile</h3>
            <div class="trip-options">
              <label class="trip-option">
                <span>Nationality</span>
                <input type="text" name="nationality" placeholder="e.g., Germany" required>
              </label>
              <label class="trip-option">
                <span>Preferred Language</span>
                <input type="text" name="language" placeholder="e.g., English" required>
              </label>
            </div>
          </div>

          <!-- Trip Basics -->
          <div class="trip-question">
            <h3>Trip Basics</h3>
            <div class="trip-options">
              <label class="trip-option">
                <span>Start Date</span>
                <input type="date" name="startDate" required>
              </label>
              <label class="trip-option">
                <span>End Date</span>
                <input type="date" name="endDate" required>
              </label>
              <label class="trip-option">
                <input type="checkbox" name="flexibleDates">
                <span>Date Flexibility</span>
              </label>
            </div>
            <div class="buttons">
              <button type="button" class="btn btn-next">Next</button>
              <button type="button" class="btn btn-back">Back</button>
              <button type="submit" class="btn btn-next-step">Submit</button>
            </div>
          </div>

        </div>

        <div class="trip-container-right-left">
          <h4>Budget</h4>
        </div>
        </form>
      </div>
    
</div>

<?php require (BASE_PATH.'views/partials/user/foot.php');?>





<!-- 
<div class="budget-container">
            <form class="budget-form" method="POST" action="/planning/trip/plan">
              <h2 class="section-title">🌍 Traveler Info</h2>

              <label class="form-label">Country of Origin</label>
              <input type="text" name="country" class="form-input" placeholder="e.g. Sri Lanka, Germany" required>

              <label class="form-label">Currency Preference</label>
              <select name="currency" class="form-select">
                  <option value="LKR">LKR (Sri Lankan Rupees)</option>
                  <option value="USD">USD (US Dollar)</option>
                  <option value="EUR">EUR (Euro)</option>
                  <option value="INR">INR (Indian Rupees)</option>
              </select>

              <h2 class="section-title">💰 Budget</h2>
              <label class="form-label">Total Budget or Per Person</label>
              <input type="range" name="budget" min="1000" max="100000" step="1000" value="50000" class="form-slider" id="budget-slider">
              <span id="budget-display">LKR 50,000</span>

              <label class="form-label">Budget Preference</label>
              <select name="budget_preference" class="form-select">
                  <option value="luxury">Luxury</option>
                  <option value="midrange">Mid-Range</option>
                  <option value="budget">Budget-Friendly</option>
              </select>

              <h2 class="section-title">🚘 Rental Details</h2>
              <label class="form-label">Do You Need a Rental Vehicle?</label>
              <select name="rental_required" id="rental-required" class="form-select">
                  <option value="no">No</option>
                  <option value="yes">Yes</option>
              </select>

              <div id="rental-options" style="display:none;">
                  <label class="form-label">Select Vehicle Type</label>
                  <select name="rental_type" class="form-select">
                      <option value="car">Car</option>
                      <option value="van">Van</option>
                      <option value="bike">Bike</option>
                  </select>

                  <label class="form-label">With Driver?</label>
                  <select name="with_driver" class="form-select">
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                  </select>
              </div>

              <h2 class="section-title">🧍 Group Info</h2>
              Keep the existing traveler details and date selectors

              <button type="submit" class="submit-btn">Create My Plan</button>
          </form> -->