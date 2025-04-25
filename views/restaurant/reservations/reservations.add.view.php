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
            <label for="tablename">Available tables:</label><br>
            <select id="tablename" name="tablename">
              <option selected="">Select table </option>
              <?php foreach ($available_tables as $available_table): ?>
                <option value="<?= $available_table['tablename'] ?>" <?= (old('tablename') == $available_table['tablename']) ? 'selected' : '' ?>><?= $available_table['tablename'] ?></option>
              <?php endforeach; ?>
            </select>
            <?php if (isset($errors['tablename'])) : ?>
              <li class="error-text"><?= $errors['tablename'] ?></li>
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
      <div class="second--row">
        <button type="submit" class="btn btn-submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 24px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
          Book
        </button>
        <button type="reset" class="btn btn-cancel" style="background: #ffffff; color: #60a56a; padding: 8px 21px; border-radius: 6px; border: 2px solid #60a56a; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='#f5f5f5'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='#ffffff'; this.style.boxShadow='none';">
          <a href="/reservations" style="color: #60a56a; text-decoration: none;">Cancel</a>
        </button>
      </div>
  </div>
  </form>
</div>
</div>
</body>

</html>

<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>