<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/styles/custom-select.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
  <?php require base_path('views/partials/restaurants/heading.php') ?>
  <div class="form--content">
    <form action="/tables/update" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="tableid" value="<?= $table['tableid'] ?>">
      <div class="first--row" style="display: flex;flex-direction:column;gap:2rem;justify-content:center">


        <div class="form-group">
          <label for="tablename">Table Name:</label><br>
          <input type="text" name="tablename" id="tablename" value="<?= $table['tablename'] ?>">

        </div>
        <div class="form-group">
          <label for="seatcapacity">Table capacity:</label><br>
          <input type="text" name="seatcapacity" id="seatcapacity" value="<?= $table['seatcapacity'] ?>">

        </div>
     



        <div class="form-group">
          <label for="tablepricetype">Price:</label>
          <span style="color: grey;font-size:smaller;">Add the revervation fee for the table</span><br>
          <select id="tablepricetype" name="tablepricetype" onchange="handleReserveTypeChange()" class="custom-select">
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
      <div class="second--row" style="justify-content:center">
        <button type="submit" class="btn btn-submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 24px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
          Update Table
        </button>
        <button type="reset" class="btn btn-cancel" style="background: #ffffff; color: #60a56a; padding: 10px 24px; border-radius: 6px; border: 2px solid #60a56a; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='#f5f5f5'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='#ffffff'; this.style.boxShadow='none';">
          <a href="/tables" style="color: #60a56a; text-decoration: none;">Discard Changes</a>
        </button>
      </div>
    </form>
  </div>
</div>
</body>

</html>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>