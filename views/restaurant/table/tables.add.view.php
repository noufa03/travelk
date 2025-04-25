<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<?php require base_path('views/partials/restaurants/styles/custom-select.php') ?>
<?php require base_path('views/partials/restaurants/styles/error-style.php') ?>
<div class="main--content">
  <?php require base_path('views/partials/restaurants/heading.php') ?>
  <div class="form--content">
    <form action="/tables/Add" method="POST" enctype="multipart/form-data">
      <div class="first--row" style="display: flex;flex-direction:column;gap:2rem;justify-content:center">

        <div class="form-group">
          <input type="hidden" id="tableid" name="tableid">
        </div>

        <div class="form-group">
          <label for="tablename">Table Name:</label><br>
          <input type="text" name="tablename" id="tablename" value="<?= old('tablename') ?>" placeholder="ex:table no 5">
          <span style="color: grey;font-size:smaller;">Add a name to identify each table</span>
          <?php if (isset($errors['tablename'])): ?>
            <li class="error-text"><?= $errors['tablename'] ?> </li>
          <?php endif; ?>

        </div>
        <div class="form-group">
          <label for="seatcapacity">Table Capacity(no of seats available):</label><br>
          <input type="number" name="seatcapacity" id="seatcapacity">

          <?php if (isset($errors['seatcapacity'])): ?>
            <li class="error-text"><?= $errors['seatcapacity'] ?> </li>
          <?php endif; ?>
        </div>


        <div class="form-group" id="custom-table-container" style="display: none;">
          <label for="customtable">Enter Custom Table Type:</label><br>
          <input type="text" id="customtable" name="customtable" class="form-control" placeholder="Enter custom table type" value="<?= old('customable') ?>">
          <?php if (isset($errors['customtable'])): ?>
            <li class="error-text"><?= $errors['customtable'] ?> </li>
          <?php endif; ?>
        </div>


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
      <div class="second--row" style="gap:1rem;justify-content: center;">
        
          <button type="submit" class="btn btn-submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 24px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
            Add Table
          </button>
          <button type="reset" class="btn btn-cancel" style="background: #ffffff; color: #60a56a; padding: 10px 24px; border-radius: 6px; border: 2px solid #60a56a; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='#f5f5f5'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='#ffffff'; this.style.boxShadow='none';">
            <a href="/dashboard_rest" style="color: #60a56a; text-decoration: none;">Cancel</a>
          </button>
      
      </div>
    </form>
  </div>
</div>
</body>

</html>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>