<?php require base_path('views/partials/restaurants/styles/details/detail.php') ?>
<?php require base_path('views/partials/restaurants/styles/details/details.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
  <?php require base_path('views/partials/restaurants/heading.php') ?>
  <div class="form--content">
    <form method="POST" enctype="multipart/form-data" action="/reservations/store">
      <div class="first--row">
        <div class="first--grp">
          <div class="form-group">
            <label for="name">Name:</label><br>
            <input type="varchar" id="name" name="name" min="0" max="100" value="<?= old('name') ?>">
          </div>
          <div class="form-group">
            <label for="email(traveler)">Email:</label><br>
            <input type="email" id="email(traveler)" name="email(traveler)" min="0" max="100" value="<?= old('email(traveler)') ?>">
            <?php if (isset($errors['email(traveler)'])) : ?>
              <li class="error-text"><?= $errors['email(traveler)'] ?></li>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="category">Available tables:</label><br>
            <select id="category" name="category">
              <option selected="">Select table category</option>
              <?php foreach ($available_tables as $available_table): ?>
                <option value="<?= $available_table['category'] ?>" <?= (old('category') == $available_table['category']) ? 'selected' : '' ?>><?= $available_table['category'] ?></option>
              <?php endforeach; ?>
            </select>
            <?php if (isset($errors['category'])) : ?>
              <li class="error-text"><?= $errors['category'] ?></li>
            <?php endif; ?>
          </div>
        </div>
        <div class="second--grp">
          <div class="form-group">
            <label for="reservation_date">Reservation date and time:</label><br>
            <input type="datetime-local" id="reservation_date" name="reservation_date" step="0.01" value="<?= old('reservation_date') ?>">
            <?php if (isset($errors['reservation_date'])) : ?>
              <li class="error-text"> <?= $errors['reservation_date'] ?></li>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="specialrequests">Special request:</label><br>
            <textarea name="specialrequests" id="specialrequests"><?= old('specialrequests') ?></textarea>
            <?php if (isset($errors['specialrequests'])) : ?>
              <li class="error-text"><?= $errors['specialrequests'] ?></li>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="second--row"> <button type="submit" class="btn btn-submit">Book
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