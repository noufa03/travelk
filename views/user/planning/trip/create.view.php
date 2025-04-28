<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles-trippage2.php'); ?>
<?php require (BASE_PATH.'views/partials/user/right-logo.php'); ?>

<div class="trip-container-create">
  <div class="trip-container-places">
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

  <div class="trip-container-budget">
    <div class="trip-container-section sticky-summary">
      <div class="trip-container-left-item">
        <h4><i class='bx bx-wallet'></i> Trip Summary</h4>
      </div>
      <div class="trip-container-budget-item-list">
        <div class="summary-item">
          <span class="display-budget">Budget: LKR <?= htmlspecialchars(number_format(floatval($budget), 2)) ?></span>
          <form method="POST" action="/planning/trip/plan" class="edit-budget-form" style="display: none;">
            <input type="number" name="budget" class="form-input" value="<?= htmlspecialchars(floatval($budget)) ?>" min="0" step="0.01" required>
            <button type="submit" class="save-button">Save</button>
            <button type="button" class="cancel-button" onclick="toggleEdit('budget', false)">Cancel</button>
          </form>
          <button class="edit-button toggle-budget" onclick="toggleEdit('budget', true)" style="outline-style: none; margin-left: 10px; color: #76c07d;">Edit</button>
        </div>
        <div class="summary-item">
          <span>Travelers: <?= htmlspecialchars($num_travelers) ?></span>
        </div>
        <div class="summary-item">
          <span class="display-dates">Start Date: <?= htmlspecialchars(date('F j, Y', strtotime($startDate))) ?></span>
          <span class="display-dates">End Date: <?= htmlspecialchars(date('F j, Y', strtotime($endDate))) ?></span>
          <form method="POST" action="/planning/trip/plan" class="edit-dates-form" style="display: none;">
            <div class="date-input-group">
              <label for="start_date" class="form-label">Start Date</label>
              <input type="date" name="startDate" id="start_date" class="form-input" value="<?= htmlspecialchars($startDate) ?>" placeholder="<?= htmlspecialchars($startDate) ?>" required>
            </div>
            <div class="date-input-group">
              <label for="end_date" class="form-label">End Date</label>
              <input type="date" name="endDate" id="end_date" class="form-input" value="<?= htmlspecialchars($endDate) ?>" placeholder="<?= htmlspecialchars($endDate) ?>" required>
            </div>
            <button type="submit" class="save-button">Save</button>
            <button type="button" class="cancel-button" onclick="toggleEdit('dates', false)">Cancel</button>
          </form>
          <button class="edit-button toggle-dates" onclick="toggleEdit('dates', true)" style="outline-style: none; margin-left: 10px; color: #76c07d;">Edit</button>
        </div>
      </div>
      <table class="budget-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Price per Person</th>
            <th>Total (x<?= htmlspecialchars($num_travelers) ?>)</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $grand_total = 0;
          // Places
          if (!empty($place_userID)) {
            foreach ($place_userID as $place) {
              $price = 0; // No price field available
              $total = $price * intval($num_travelers);
              $grand_total += $total;
          ?>
              <tr>
                <td><?= htmlspecialchars($place['display_name']) ?></td>
                <td>Place</td>
                <td>LKR <?= htmlspecialchars(number_format($price, 2)) ?></td>
                <td>LKR <?= htmlspecialchars(number_format($total, 2)) ?></td>
              </tr>
          <?php
            }
          }
          // Stays
          if (!empty($stay_userID)) {
            foreach ($stay_userID as $stay) {
              $price = isset($stay['min_price'][0]['min_price']) && !is_null($stay['min_price'][0]['min_price']) ? floatval($stay['min_price'][0]['min_price']) : 0;
              $total = $price * intval($num_travelers);
              $grand_total += $total;
          ?>
              <tr>
                <td><?= htmlspecialchars($stay['display_name']) ?></td>
                <td>Stay</td>
                <td>LKR <?= htmlspecialchars(number_format($price, 2)) ?></td>
                <td>LKR <?= htmlspecialchars(number_format($total, 2)) ?></td>
              </tr>
          <?php
            }
          }
          // Restaurants
          if (!empty($rest_userID)) {
            foreach ($rest_userID as $rest) {
              $price = isset($rest['min_price'][0]['min_price']) && !is_null($rest['min_price'][0]['min_price']) ? floatval($rest['min_price'][0]['min_price']) : 0;
              $total = $price * intval($num_travelers);
              $grand_total += $total;
          ?>
              <tr>
                <td><?= htmlspecialchars($rest['display_name']) ?></td>
                <td>Restaurant</td>
                <td>LKR <?= htmlspecialchars(number_format($price, 2)) ?></td>
                <td>LKR <?= htmlspecialchars(number_format($total, 2)) ?></td>
              </tr>
          <?php
            }
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3"><strong>Grand Total</strong></td>
            <td><strong>LKR <?= htmlspecialchars(number_format($grand_total, 2)) ?></strong></td>
          </tr>
        </tfoot>
      </table>
      <div class="budget-note">Note: Some places, stays, or restaurants do not have valid prices (0 or not added). They are excluded from the total cost.</div>
      <?php if ($grand_total > floatval($budget)): ?>
        <div class="budget-warning">Warning: Total cost exceeds budget by LKR <?= htmlspecialchars(number_format($grand_total - floatval($budget), 2)) ?></div>
      <?php endif; ?>
    </div>
    <form method="POST" action="/planning/trip/rent" class="create-trip-form">
      <button type="submit" class="create-trip-button">Create Trip</button>
    </form>
  </div>
</div>

<script>
function toggleEdit(section, show) {
    const budgetDisplay = document.querySelector('.display-budget');
    const budgetForm = document.querySelector('.edit-budget-form');
    const budgetButton = document.querySelector('.toggle-budget');
    const datesDisplay = document.querySelectorAll('.display-dates');
    const datesForm = document.querySelector('.edit-dates-form');
    const datesButton = document.querySelector('.toggle-dates');

    if (section === 'budget') {
        budgetDisplay.style.display = show ? 'none' : 'block';
        budgetForm.style.display = show ? 'flex' : 'none';
        budgetButton.style.display = show ? 'none' : 'inline-block';
    } else if (section === 'dates') {
        datesDisplay.forEach(span => span.style.display = show ? 'none' : 'block');
        datesForm.style.display = show ? 'flex' : 'none';
        datesButton.style.display = show ? 'none' : 'inline-block';
    }
}
</script>

<?php require (BASE_PATH.'views/partials/user/toast.php'); ?>
<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>