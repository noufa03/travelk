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
          <button type="submit"  style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';" onmouseover="this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
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
            <input type="text" id="hot_line" name="hot_line" value="<?= $locations['hot_line'] ?>" required>
          </div>

          <div class="form-group">
            <label for="operatingHoursFrom">Operating Hours (From - To):</label>
            <input type="time" id="operatingHoursFrom" name="operatingHoursFrom" value="<?= $details['operatingHoursFrom'] ?>" required>
            <span style="color: black;"> to </span>
            <input type="time" id="operatingHoursTo" name="operatingHoursTo" value="<?= $details['operatingHoursTo'] ?>" required><br><br>
          </div>

          <?php

          $selectedmethods = explode(',', $details['paymentMethods']);
          ?>

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
        </div>

        <div class="second--grp">

          <div class="form-group">
            <label for="seatingCapacity">Seating Capacity:</label><br>
            <input type="number" id="seatingCapacity" name="seatingCapacity" step="0.01" value="<?= $details['seatingCapacity'] ?>" required>
          </div>


          <?php
          $selectedOptions = explode(',', $details['deliveryOptions']);

          ?>
          <label for='deliveryOptions'>Delivery Options:</label>
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


          <div class="form-group">
            <label for="operatingdaysFrom">Operating Days (From - To):</label>

            <select name="operatingdaysFrom" id="operatingdaysFrom" required>
              <option value="<?= $details['operatingdaysFrom'] ?>"><?= $details['operatingdaysFrom'] ?></option>
              <option value="monday">Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wednesday">Wednesday</option>
              <option value="thursday">Thursday</option>
              <option value="friday">Friday</option>
              <option value="saturday">Saturday</option>
              <option value="sunday">Sunday</option>

            </select>


            <span style="color: black;"> to </span>
            <select name="operatingdaysTo" id="operatingdaysTo" required>
              <option value="<?= $details['operatingdaysTo'] ?>"><?= $details['operatingdaysTo'] ?></option>
              <option value="monday">Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wednesday">Wednesday</option>
              <option value="thursday">Thursday</option>
              <option value="friday">Friday</option>
              <option value="saturday">Saturday</option>
              <option value="sunday">Sunday</option>

            </select>
            <br><br>
          </div>
        </div>
      </div>
      <ul>
        <?php if (isset($errors['email'])) : ?>
          <li class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></li>
        <?php endif; ?>

        <?php if (isset($errors['password'])) : ?>
          <li class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></li>
        <?php endif; ?>
      </ul>
      <br><br>
      <div class="first--row" style="display: flex; justify-content: center; align-items: center;">
        <div class="form-group" style="width:100%;">
          <label for="display_name">Restuarant name:</label>
          <input type="text" id="display_name" name="display_name" value="<?= $locations['display_name'] ?>" required>
          <label for="district"> District: </label>

          <select id="district" name="district" required onchange="updateCityField()">
            <option value="<?= $district['district'] ?>"><?= $district['district'] ?></option>
            <option value="Ampara">Ampara</option>
            <option value="Anuradhapura">Anuradhapura</option>
            <option value="Badulla">Badulla</option>
            <option value="Batticaloa">Batticaloa</option>
            <option value="Colombo">Colombo</option>
            <option value="Galle">Galle</option>
            <option value="Gampaha">Gampaha</option>
            <option value="Hambantota">Hambantota</option>
            <option value="Jaffna">Jaffna</option>
            <option value="Kalutara">Kalutara</option>
            <option value="Kandy">Kandy</option>
            <option value="Kegalle">Kegalle</option>
            <option value="Kilinochchi">Kilinochchi</option>
            <option value="Kurunegala">Kurunegala</option>
            <option value="Mannar">Mannar</option>
            <option value="Matale">Matale</option>
            <option value="Matara">Matara</option>
            <option value="Monaragala">Monaragala</option>
            <option value="Mullaitivu">Mullaitivu</option>
            <option value="Nuwara Eliya">Nuwara Eliya</option>
            <option value="Polonnaruwa">Polonnaruwa</option>
            <option value="Puttalam">Puttalam</option>
            <option value="Ratnapura">Ratnapura</option>
            <option value="Trincomalee">Trincomalee</option>
            <option value="Vavuniya">Vavuniya</option>
          </select>
          <br><br>
          <label for="city"> City: </label>
          <input type="text" id="city" name="city" value="<?= $locations['city'] ?>" required>

          <label for="street_address">Street Adrress:</label>
          <input type="text" id="street_address" name="street_address" value="<?= $locations['street_address'] ?>" required>
          <label for="google_map_link"> Google map link: </label>
          <input type="text" id="google_map_link" name="google_map_link" value="<?= $locations['google_map_link'] ?>" required>

          <br><br>
        </div>
      </div>

      <div style="display:grid;grid-template-columns:1fr ;gap:1rem">
        <div class="form-group">



          <label for="logo">logo:</label><br>
          <div class="upload-box">


            <img src="/<?= $details['logo'] ?>" alt="Photo" width="250px" height="180px">
            <input type="hidden" name="logo" id="logo" value="<?= $details['logo'] ?>">

            <input type="file" id="logo" name="logo" accept="image/*">


            <h6 style="color: red;">Add the logo of your restuarant</h6>
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

    </form>

  </div>
</div>
</body>

</html>

<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/detail_js.php') ?>
<?php require base_path('views/partials/footer.php') ?>