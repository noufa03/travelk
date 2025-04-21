<?php require base_path('views/partials/restaurants/styles/details/detail.php') ?>
<?php require base_path('views/partials/restaurants/styles/details/details.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
  <?php require base_path('views/partials/restaurants/heading.php') ?>
  <div class="form--content">
    <form method="POST" enctype="multipart/form-data">
      <div class="first--row">
        <div class="first--grp">
          <div class="form-group">
            <label for="offer_title">Offer Name:</label><br>
            <input type="text" id="offer_title" name="offer_title" required>
          </div>
          <div class="form-group">
            <label for="cuisine_name">Cuisine name:</label><br>
            <select id="cuisine_name" name="cuisine_name" required>
              <option selected="">Select cuisine name</option>
              <?php foreach ($cuisines as $cuisine): ?>
                <option value="<?= $cuisine ?>"><?= $cuisine ?></option>
              <?php endforeach; ?>
              <option value="other">other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="offer_description">Description:</label><br>
            <textarea id="offer_description" name="offer_description" rows="4" cols="50"></textarea>
          </div>
          <div class="form-group">
            <label for="discount_percentage">Discount Percentage:</label><br>
            <input type="number" id="discount_percentage" name="discount_percentage" min="0" max="100" required>
          </div>
        </div>
        <div class="second--grp">
          <div class="form-group">
            <label for="start_time">Start time:</label><br>
            <input type="datetime-local" id="start_time" name="start_time" step="0.01" required>
          </div>
          <div class="form-group">
            <label for="end_time">End time:</label><br>
            <input type="datetime-local" id="end_time" name="end_time" step="0.01" required>
          </div>
        </div>
      </div>
      <div class="second--row">
        <button type="submit" class="btn btn-submit">
          Add Offer
        </button>
        <button type="reset" class="btn btn-cancel">Cancel</button>
      </div>
  </div>
  </form>
</div>
</div>
</body>

</html>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>