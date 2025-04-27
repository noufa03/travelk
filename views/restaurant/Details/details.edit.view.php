<?php require base_path('views/partials/restaurants/styles/details/detail.php') ?>
<?php require base_path('views/partials/restaurants/styles/details/details.php') ?>
<?php require base_path('views/partials/restaurants/styles/details/button.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content" style="background-color: #f0f2f5;;">
  <?php require base_path('views/partials/restaurants/heading.php') ?>
  <div class="form--content">
    <div class="form-group" style="margin: 20px 0; padding: 20px; background: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <div class="upload-box" style="display: flex; flex-direction: column; align-items: center; gap: 15px; padding: 20px; border: 2px dashed #d1d1d1; border-radius: 8px; background: #fff;">
        <label for="" style="font-size: 18px; font-weight: 600; color: #333;">Profile Picture</label>
        <img src="/<?= $details['profile'] ?>" alt="Profile Picture" id="profilePic" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #e0e0e0;">
        <form action="/details/profile/photo" enctype="multipart/form-data" method="post" style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
          <input type="hidden" name="_method" value="PATCH">
          <input type="file" name="profile" accept="image/*" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; color: #555; cursor: pointer;">
          <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';" onmouseover="this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
            Upload Photo
          </button>
        </form>
      </div>
    </div>
    <form method="POST" action="/details_rest/update?id=<?php echo $details['id'] ?>" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="id" value="<?= $details['id'] ?>">
      <div class="first--row">
        <div class="first--grp">
          <div class="form-group">
            <label for="hot_line">Hot Line:</label><br>
            <input type="text" id="hot_line" name="hot_line" value="<?= (empty(old('hot_line'))) ?  $locations['hot_line'] : old('hot_line') ?>">
            <?php if (isset($errors['hot_line'])) : ?>
              <li class="error-text"><?= $errors['hot_line'] ?></li>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="operatingHoursFrom">Operating Hours (From - To):</label>
            <input type="time" id="operatingHoursFrom" name="operatingHoursFrom" value="<?= (empty(old('operatingHoursFrom'))) ? $details['operatingHoursFrom'] : old('operatingHoursFrom') ?>">
            <span style="color: black;"> to </span>
            <input type="time" id="operatingHoursTo" name="operatingHoursTo" value="<?= (empty(old('operatingHoursTo'))) ? $details['operatingHoursTo'] : old('operatingHoursTo') ?>"><br><br>
            <?php if (isset($errors['operatingHours'])): ?>
              <li class="error-text"> <?= $errors['operatingHours'] ?></li>
            <?php endif; ?>
          </div>

          <?php $selectedmethods = explode(',', $details['paymentMethods']); ?>
          <label for="paymentMethods">Payment Methods:</label>
          <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr 1fr">
            <label for="credit" style="display: flex">
              Credit
              <input type="checkbox" id="credit" name="paymentMethods[]" value="credit"
                <?= in_array('credit', $selectedmethods) ? 'checked' : '' ?>>
            </label>

            <label for="debit" style="display: flex;">
              Debit
              <input type="checkbox" id="debit" name="paymentMethods[]" value="debit"
                <?= in_array('debit', $selectedmethods) ? 'checked' : '' ?>>
            </label>

            <label for="cash" style="display: flex;">
              Cash
              <input type="checkbox" id="cash" name="paymentMethods[]" value="cash"
                <?= in_array('cash', $selectedmethods) ? 'checked' : '' ?>>
            </label>
          </div>
          <?php if (isset($errors['paymentMethods'])): ?>
            <li class="error-text"> <?= $errors['paymentMethods'] ?></li>
          <?php endif; ?>
        </div>

        <div class="second--grp">
          <div class="form-group">
            <label for="seatingCapacity">Seating Capacity:</label><br>
            <input type="number" id="seatingCapacity" name="seatingCapacity" step="0.01" value="<?= (empty(old('seatingCapacity'))) ? $details['seatingCapacity'] : old('seatingCapacity') ?>">
            <?php if (isset($errors['seatingCapacity'])): ?>
              <li class="error-text"> <?= $errors['seatingCapacity'] ?></li>
            <?php endif; ?>
          </div>

          <?php $selectedOptions = explode(',', $details['deliveryOptions']); ?>
          <label for="deliveryOptions">Delivery Options:</label>
          <div class="form-group" style="display:flex;flex-wrap:wrap">
            <label for="dinein" style="display: flex;flex-wrap:wrap">
              Dine In
              <input type="checkbox" id="dinein" name="deliveryOptions[]" value="dinein"
                <?= in_array('dinein', $selectedOptions) ? 'checked' : '' ?>>
            </label>

            <label for="takeaway" style="display: flex;flex-wrap:wrap">
              Takeaway
              <input type="checkbox" id="takeaway" name="deliveryOptions[]" value="takeaway"
                <?= in_array('takeaway', $selectedOptions) ? 'checked' : '' ?>>
            </label>

            <label for="delivery" style="display: flex;flex-wrap:wrap">
              Delivery
              <input type="checkbox" id="delivery" name="deliveryOptions[]" value="delivery"
                <?= in_array('delivery', $selectedOptions) ? 'checked' : '' ?>>
            </label>
          </div>
          <?php if (isset($errors['deliveryOptions'])): ?>
            <li class="error-text"> <?= $errors['deliveryOptions'] ?></li>
          <?php endif; ?>

          <div class="form-group">
            <label for="operatingdaysFrom">Operating Days (From - To):</label>

            <select name="operatingdaysFrom" id="operatingdaysFrom">
              <option value="<?= (empty(old('operatingdaysFrom'))) ? $details['operatingdaysFrom'] : old('operatingdaysFrom') ?>"><?= (empty(old('operatingdaysFrom'))) ? $details['operatingdaysFrom'] : old('operatingdaysFrom') ?></option>
              <option value="monday">Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wednesday">Wednesday</option>
              <option value="thursday">Thursday</option>
              <option value="friday">Friday</option>
              <option value="saturday">Saturday</option>
              <option value="sunday">Sunday</option>
            </select>

            <span style="color: black;"> to </span>

            <select name="operatingdaysTo" id="operatingdaysTo">
              <option value="<?= (empty(old('operatingdaysTo'))) ? $details['operatingdaysTo'] : old('operatingdaysTo') ?>"><?= (empty(old('operatingdaysTo'))) ? $details['operatingdaysTo'] : old('operatingdaysTo') ?></option>
              <option value="monday">Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wednesday">Wednesday</option>
              <option value="thursday">Thursday</option>
              <option value="friday">Friday</option>
              <option value="saturday">Saturday</option>
              <option value="sunday">Sunday</option>
            </select>
            <br><br>
            <?php if (isset($errors['operatingdays'])): ?>
              <li class="error-text"> <?= $errors['operatingdays'] ?></li>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <br><br>

      <div class="first--row" style="display: flex; justify-content: center; align-items: center;">
        <div class="form-group" style="width:100%;">
          <label for="display_name">Restaurant Name:</label>
          <input type="text" id="display_name" name="display_name" value="<?= (empty(old('display_name'))) ? $locations['display_name'] : old('display_name') ?>">
          <?php if (isset($errors['display_name'])): ?>
            <li class="error-text"> <?= $errors['display_name'] ?></li>
          <?php endif; ?>

          <label for="district">District:</label>
          <select id="district" name="district" onchange="updateCityField()">
            <option value="<?= (empty(old('district'))) ? $district['district'] : old('district') ?>"><?= (empty(old('district'))) ? $district['district'] : old('district') ?></option>
            <!-- options... -->
          </select>
          <?php if (isset($errors['district'])): ?>
            <li class="error-text"> <?= $errors['district'] ?></li>
          <?php endif; ?>
          <br><br>

          <label for="city">City:</label>
          <input type="text" id="city" name="city" value="<?= (empty(old('city'))) ? $locations['city'] : old('city') ?>">
          <?php if (isset($errors['city'])): ?>
            <li class="error-text"> <?= $errors['city'] ?></li>
          <?php endif; ?>

          <label for="street_address">Street Address:</label>
          <input type="text" id="street_address" name="street_address" value="<?= (empty(old('street_address'))) ? $locations['street_address'] : old('street_address') ?>">
          <?php if (isset($errors['street_address'])): ?>
            <li class="error-text"> <?= $errors['street_address'] ?></li>
          <?php endif; ?>

          <label for="google_map_link">Google Map Link:</label>
          <input type="text" id="google_map_link" name="google_map_link" value="<?= (empty(old('google_map_link'))) ? $locations['google_map_link'] : old('google_map_link') ?>">
          <?php if (isset($errors['google_map_link'])): ?>
            <li class="error-text"> <?= $errors['google_map_link'] ?></li>
          <?php endif; ?>

          <br><br>
        </div>
      </div>


      <div style="display:grid;grid-template-columns:1fr ;gap:1rem">
        <div class="form-group">
          <label for="logo">Logo:</label><br>
          <div class="upload-box">
            <img src="/<?= $details['logo'] ?>" alt="Photo" width="250px" height="180px">
            <input type="hidden" name="logo" id="logo" value="<?= $details['logo'] ?>">
            <input type="file" id="logo" name="logo" accept="image/*">
            <h6 style="color: red;">Add the logo of your restaurant</h6>
          </div>

        </div>
      </div>
      <div class="form-group">
        <label for="photos">Photos:</label><br>
        <div class="upload-box image-container">
          <!-- Hidden input for count (only once) -->
          <input type="hidden" name="count" value="<?= count($photos) ?>" />

          <!-- Display existing photos -->
          <div>
            <?php for ($i = 0; $i < count($photos); $i++): ?>
              <?php if (!empty($photos[$i])): ?>
                <div class="image-wrapper">
                  <!-- Unique ID for each preview image -->
                  <img id="preview-img-<?= $i ?>"
                    src="/<?= $photos[$i] ?>"
                    alt="Image Preview"
                    style="max-width: 400px;overflow:hidden; margin-top: 10px;">

                  <!-- Add onchange event and pass unique ID -->
                  <input type="file"
                    name="photos[]"
                    accept="image/*"
                    onchange="previewImage(event, 'preview-img-<?= $i ?>')">

                  <!-- Hidden input to track old photo -->
                  <input type="hidden"
                    name="old_photos[]"
                    value="<?= $photos[$i] ?>">
                </div>
              <?php endif; ?>
            <?php endfor; ?>
          </div>


          <div>
            <?php if (count($photos) < 5): ?>
              <label>Add New Photos:</label><br>
              <?php for ($i = 0; $i < (5 - count($photos)); $i++): ?>
                <input type="file" id="new_photos[]" name="new_photos[]" accept="image/*">
              <?php endfor; ?>
            <?php endif; ?>
          </div>
        </div>

        <h6 style="color: red;">Add images of your restaurant</h6>
      </div>

      <div class="second--row">
        <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
          Save changes
        </button>
        <button type="reset" style="background: #ffffff; color: #60a56a; padding: 12px 24px; border-radius: 8px; border: 2px solid #60a56a; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='#f5f5f5';" onmouseout="this.style.transform='scale(1)'; this.style.background='#ffffff';">
          <a href="/dashboard_rest" style="color: #60a56a; text-decoration: none;">Discard Changes</a>
        </button>
      </div>
      <div>
        <h5 style="color: red;font-weight:lighter;display: flex; justify-content: center; align-items: center;margin-top:10px;">These are the details customers can view</h5>

      </div>
  </div>





  </form>

</div>

</body>

</html>

<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/detail_js.php') ?>
<?php require base_path('views/partials/footer.php') ?>