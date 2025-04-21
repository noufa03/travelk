<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
  <?php require base_path('views/partials/restaurants/heading.php') ?>
  <div class="form--content">
    <form action="/tables/update" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="tableid" value="<?= $table['tableid'] ?>">
      <div class="first--row">
        <div class="first--grp">
          <div class="form-group">
            <label for="category">Table Type:</label><br>
            <select id="category" name="category" class="form-control" onchange="handleTableTypeChange()">
              <option value="">Select Table Type</option>
              <option value="two-seater" <?= ($table['category'] == 'two-seater') ? 'selected' : '' ?>>Two-Seater Tables (Deuce Tables): Small tables designed for two diners, often found in cafes or intimate dining spaces.</option>
              <option value="four-seater" <?= ($table['category'] == 'four-seater') ? 'selected' : '' ?>>Four-Seater Tables: Standard size for small groups or families.</option>
              <option value="six-seater" <?= ($table['category'] == 'six-seater') ? 'selected' : '' ?>>Six-Seater Tables: Larger tables for medium-sized groups.</option>
              <option value="eight-seater" <?= ($table['category'] == 'eight-seater') ? 'selected' : '' ?>>Eight-Seater Tables (or More): Typically used for large families or group reservations.</option>
              <option value="outdoor" <?= ($table['category'] == 'outdoor') ? 'selected' : '' ?>>Outdoor Tables: Designed for outdoor dining, often weather-resistant and paired with umbrellas or canopies.</option>
              <option value="custom" <?= (strpos($table['category'], 'custom:') === 0) ? 'selected' : '' ?>>Custom Table</option>
            </select>
          </div>
          <div class="form-group" id="tableprice-container">
            <label for="status"><span style="color: grey; font-size:smaller">Available</span></label>
            <select id="status" name="status" required>
              <option value="1" <?= ($table['status'] == 1) ? 'selected' : '' ?>>Available</option>
              <option value="0" <?= ($table['status'] == 0) ? 'selected' : '' ?>>Booked</option>
            </select>
          </div>
          <?php if (strpos($table['category'], 'custom:') === 0): ?>
            <div class="form-group" id="custom-table-container" style="display: block;">
              <label for="customtable">Enter Custom Table Type:</label><br>
              <input type="text" id="customtable" name="customtable" class="form-control" placeholder="Enter custom table type" value="<?= htmlspecialchars(substr($table['category'], 7)) ?>">
            </div>
          <?php else: ?>
            <div class="form-group" id="custom-table-container" style="display: none;">
              <label for="customtable">Enter Custom Table Type:</label><br>
              <input type="text" id="customtable" name="customtable" class="form-control" placeholder="Enter custom table type" value="">
            </div>
          <?php endif; ?>
        </div>
        <div class="second--grp">
          <div class="form-group">
            <label for="tablepricetype">Price:</label>
            <span style="color: grey;font-size:smaller;">Add the revervation fee for the table</span><br>
            <select id="tablepricetype" name="tablepricetype" onchange="handleReserveTypeChange()" required>
              <option value="" disabled selected>Select an option</option>
              <option value="NoCharge" <?= ($table['tablepricetype'] == 'NoCharge') ? 'selected' : '' ?>>No Charge for Reservation</option>
              <option value="Advance Deposit" <?= ($table['tablepricetype'] == 'Advance Deposit') ? 'selected' : '' ?>>Advance Deposit</option>
              <option value="Prepayment" <?= ($table['tablepricetype'] == 'Prepayment') ? 'selected' : '' ?>>Prepayment for Special Events</option>
              <option value="Cancellation Fee" <?= ($table['tablepricetype'] == 'Cancellation Fee') ? 'selected' : '' ?>>Cancellation or No-Show Fee</option>
            </select>
            <br><br>
            <div class="form-group" id="tableprice-container">
              <label for="tableprice">Fee(Rs):<span style="color: grey; font-size:smaller">in rupees</span></label>
              <input type="number" id="tableprice" name="tableprice" step="0.01" placeholder="Enter fee amount" value=<?= $table['tableprice'] ?> required>
            </div>
          </div>
        </div>
      </div>
      <div class="second--row">
        <button type="submit" class="btn btn-submit">Update Table</button>
        <button type="type" class="btn btn-cancel"><a href="/tables" style="color:orange;">Discard Changes</a></button>
      </div>
    </form>
  </div>
</div>
</body>

</html>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>