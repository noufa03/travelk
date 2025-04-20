<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<?php require base_path('views/partials/restaurants/styles/custom-select.php') ?>
<?php require base_path('views/partials/restaurants/styles/error-style.php') ?>
<div class="main--content">
  <?php require base_path('views/partials/restaurants/heading.php') ?>
  <div class="form--content">
    <form action="/tables/Add" method="POST" enctype="multipart/form-data">
      <div class="first--row">
        <div class="first--grp">
          <div class="form-group">
            <input type="hidden" id="tableid" name="tableid">
          </div>
          <div class="form-group">
            <label for="category">Table Type:</label><br>
            <select id="category" name="category" class="form-control custom-select" onchange="handleTableTypeChange()">
              <option value="">Select Table Type</option>
              <option value="two-seater" <?= old('category') === 'two-seater' ? 'selected' : '' ?>>
                Two-Seater Tables (Deuce Tables): Small tables designed for two diners, often found in cafes or intimate dining spaces.
              </option>
              <option value="four-seater" <?= old('category') === 'four-seater' ? 'selected' : '' ?>>
                Four-Seater Tables: Standard size for small groups or families.
              </option>
              <option value="six-seater" <?= old('category') === 'six-seater' ? 'selected' : '' ?>>
                Six-Seater Tables: Larger tables for medium-sized groups.
              </option>
              <option value="eight-seater" <?= old('category') === 'eight-seater' ? 'selected' : '' ?>>
                Eight-Seater Tables (or More): Typically used for large families or group reservations.
              </option>
              <option value="outdoor" <?= old('category') === 'outdoor' ? 'selected' : '' ?>>
                Outdoor Tables: Designed for outdoor dining, often weather-resistant and paired with umbrellas or canopies.
              </option>
              <option value="custom" <?= old('category') === 'custom' ? 'selected' : '' ?>>
                Custom Table
              </option>
            </select>
            <?php if (isset($errors['category'])): ?>
              <li class="error-text"><?= $errors['category'] ?> </li>
            <?php endif; ?>
          </div>
          <div class="form-group" id="custom-table-container" style="display: none;">
            <label for="customtable">Enter Custom Table Type:</label><br>
            <input type="text" id="customtable" name="customtable" class="form-control" placeholder="Enter custom table type" value="<?= old('customable') ?>">
            <?php if (isset($errors['customtable'])): ?>
              <li class="error-text"><?= $errors['customtable'] ?> </li>
            <?php endif; ?>
          </div>
        </div>
        <div class="second--grp">
          <div class="form-group">
            <label for="tablepricetype">Price:</label>
            <span style="color: grey;font-size:smaller;">Add the reservation fee for the table</span><br>
            <select id="tablepricetype" name="tablepricetype" class="custom-select" onchange="handleReserveTypeChange()">
              <option value="" disabled <?= old('tablepricetype') === '' ? 'selected' : '' ?>>Select an option</option>
              <option value="NoCharge" <?= old('tablepricetype') === 'NoCharge' ? 'selected' : '' ?>>
                No Charge for Reservation
              </option>
              <option value="Prepayment" <?= old('tablepricetype') === 'Prepayment' ? 'selected' : '' ?>>
                Prepayment for Special Events
              </option>
              <option value="Cancellation Fee" <?= old('tablepricetype') === 'Cancellation Fee' ? 'selected' : '' ?>>
                Cancellation or No-Show Fee
              </option>
            </select>
            <?php if (isset($errors['tablepricetype'])): ?>
              <li class="error-text"><?= $errors['tablepricetype'] ?> </li>
            <?php endif; ?>
            <br><br>
            <div class="form-group" id="tableprice-container">
              <label for="tableprice">Fee:</label>
              <input type="number" id="tableprice" name="tableprice" step="0.01" placeholder="Enter fee amount" value="<?= old('tableprice') ?>">
              <span style="color: grey;font-size:smaller;">Please take note that all payments wont happen through online paymeny in this site.</span>
              <?php if (isset($errors['tableprice'])): ?>
                <li class="error-text"><?= $errors['tableprice'] ?> </li>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="second--row">
        <button type="submit" class="btn btn-submit">Add Table</button>
        <button type="reset" class="btn btn-cancel"><a href="/dashboard_rest">Cancel</a></button>
      </div>
    </form>
  </div>
</div>
</body>

</html>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>