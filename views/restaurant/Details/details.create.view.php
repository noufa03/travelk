<?php require base_path('views/partials/restaurants/styles/details/detail.php') ?>
<?php require base_path('views/partials/restaurants/styles/details/details.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<?php require base_path('views/partials/restaurants/styles/error-style.php') ?>

<div class="main--content" style="background-color: #f0f2f5;;">
  <?php require base_path('views/partials/restaurants/heading.php') ?>
  <div class="form--content">
    <form method="POST" action="/details_rest" enctype="multipart/form-data">
      <div class="first--row">
        <div class="first--grp">
          <div class="form-group">

            <label for="profile">profile-pic:</label><br>
            <div class="upload-box2">
              <input type="file" name="profile" id="profile" accept="image/*">
              <div id="previewprofile"></div>
            </div>
            <?php if (isset($errors['profile'])) : ?>
              <li class="error-text"><?= $errors['profile'] ?></li>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="hot_line">Hot Line:</label><br>
            <input type="text" id="hot_line" name="hot_line" value="<?= old('hot_line') ?>">
            <?php if (isset($errors['hot_line'])) : ?>
              <li class="error-text"><?= $errors['hot_line'] ?></li>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="operatingHoursFrom">Operating Hours (From - To):</label>
            <input type="time" id="operatingHoursFrom" name="operatingHoursFrom" value="<?= old('operatingHoursFrom') ?>">
            <span style="color: black;"> to </span>
            <input type="time" id="operatingHoursTo" name="operatingHoursTo" value="<?= old('operatingHoursTo') ?>"><br><br>
            <?php if (isset($errors['operatingHours'])) : ?>
              <li class="error-text"><?= $errors['operatingHours'] ?></li>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="operatingdaysFrom">Operating Days (From - To):</label>
            <select name="operatingdaysFrom" id="operatingdaysFrom">
              <option value="monday" <?= (old('operatingdaysFrom') == 'monday') ? 'selected' : '' ?>>Monday</option>
              <option value="tuesday" <?= (old('operatingdaysFrom') == 'tuesday') ? 'selected' : '' ?>>Tuesday</option>
              <option value="wednesday" <?= (old('operatingdaysFrom') == 'wednesday') ? 'selected' : '' ?>>Wednesday</option>
              <option value="thursday" <?= (old('operatingdaysFrom') == 'thursday') ? 'selected' : '' ?>>Thursday</option>
              <option value="friday" <?= (old('operatingdaysFrom') == 'friday') ? 'selected' : '' ?>>Friday</option>
              <option value="saturday" <?= (old('operatingdaysFrom') == 'saturday') ? 'selected' : '' ?>>Saturday</option>
              <option value="sunday" <?= (old('operatingdaysFrom') == 'sunday') ? 'selected' : '' ?>>Sunday</option>
            </select>
            <span style="color: black;"> to </span>
            <select name="operatingdaysTo" id="operatingdaysTo">
              <option value="monday" <?= (old('operatingdaysTo') == 'monday') ? 'selected' : '' ?>>Monday</option>
              <option value="tuesday" <?= (old('operatingdaysTo') == 'tuesday') ? 'selected' : '' ?>>Tuesday</option>
              <option value="wednesday" <?= (old('operatingdaysTo') == 'wednesday') ? 'selected' : '' ?>>Wednesday</option>
              <option value="thursday" <?= (old('operatingdaysTo') == 'thursday') ? 'selected' : '' ?>>Thursday</option>
              <option value="friday" <?= (old('operatingdaysTo') == 'friday') ? 'selected' : '' ?>>Friday</option>
              <option value="saturday" <?= (old('operatingdaysTo') == 'saturday') ? 'selected' : '' ?>>Saturday</option>
              <option value="sunday" <?= (old('operatingdaysTo') == 'sunday') ? 'selected' : '' ?>>Sunday</option>
            </select>
            <br><br>
            <?php if (isset($errors['operatingdays'])) : ?>
              <li class="error-text"><?= $errors['operatingdays'] ?></li>
            <?php endif; ?>


          </div>
          <div class="form-group">
            <label for="seatingCapacity">Seating Capacity:</label><br>
            <input type="number" id="seatingCapacity" name="seatingCapacity" step="0.01" value="<?= old('seatingCapacity') ?>">
            <?php if (isset($errors['seatingCapacity'])) : ?>
              <li class="error-text"><?= $errors['seatingCapacity'] ?></li>
            <?php endif; ?>
          </div>
        </div>
        <div class="second--grp">
          <label for="deliveryOptions">Delivery Options:</label>
          <div class="form-group" style="display:flex;flex-wrap:wrap">
            <label for="dinein" style="display: flex;flex-wrap:wrap;">Dine In
              <input type="checkbox" id="dinein" name="deliveryOptions[]" value="dinein">
            </label>
            <label for="takeaway" style="display: flex;flex-wrap:wrap">Takeaway
              <input type="checkbox" id="takeaway" name="deliveryOptions[]" value="takeaway">
            </label>
            <label for="delivery" style="display: flex;flex-wrap:wrap">Delivery
              <input type="checkbox" id="delivery" name="deliveryOptions[]" value="delivery">
            </label>
            <?php if (isset($errors['deliveryOptions'])) : ?>
              <li class="error-text"><?= $errors['deliveryOptions'] ?></li>
            <?php endif; ?>
          </div>
          <label for="paymentMethods">Payment Methods:</label>
          <h6 style="color: red;">Add the methods the customer can use to pay you</h6>
          <div class="form-group" style="display: grid;grid-template-columns:1fr 1fr 1fr">
            <label for="credit" style="display:flex">Credit
              <input type="checkbox" id="credit" name="paymentMethods[]" value="credit">
            </label>
            <label for="debit" style="display: flex;">Debit
              <input type="checkbox" id="debit" name="paymentMethods[]" value="debit">
            </label>
            <label for="cash" style="display: flex;">Cash
              <input type="checkbox" id="cash" name="paymentMethods[]" value="cash">
            </label>
            <?php if (isset($errors['paymentMethods'])) : ?>
              <li class="error-text"><?= $errors['paymentMethods'] ?></li>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="photos">Photos (Add 5 photos):</label><br>
            <div class="upload-box2" style="max-width:300px;overflow: hidden;">
              <input type="file" name="photos[]" class="file-input">
              <input type="file" name="photos[]" class="file-input">
              <input type="file" name="photos[]" class="file-input">
              <input type="file" name="photos[]" class="file-input">
              <input type="file" name="photos[]" class="file-input">
              <h6 style="color: red;">
                Please upload five images of your restaurant (maximum size: 1MB per image). All five images are required, but you may add them later if needed.
              </h6>
            </div>
            <?php if (isset($errors['photos'])) : ?>
              <li class="error-text"><?= $errors['photos'] ?></li>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="logo">logo:</label><br>
            <div class="upload-box2">
              <input type="file" id="logo" name="logo" accept="image/*">
              <div id="preview-logo"> </div>
              <h6 style="color: red;">Add the logo of your restuarant,max-size limit:1mB</h6>
            </div>
            <?php if (isset($errors['logo'])) : ?>
              <li class="error-text"><?= $errors['logo'] ?></li>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <br><br>
 
      <div class="first--row" style="display: flex; justify-content: center; align-items: center;">
        <div class="form-group" style="width:100%;">
          <label for="display_name">Restuarant name:</label>
          <?php if (isset($errors['display_name'])) : ?>
            <li class="error-text"><?= $errors['display_name'] ?></li>
          <?php endif; ?>
          <input type="text" id="display_name" name="display_name" value="<?= old('display_name') ?>">

          <label for="district"> District: </label>
          <?php if (isset($errors['district'])) : ?>
            <li class="error-text"><?= $errors['district'] ?></li>
          <?php endif; ?>
          <select id="district" name="district" onchange="updateCityField()">
            <option value="">-- Select District --</option>
            <option value="Ampara" <?= (old('district') == 'Ampara') ? 'selected' : '' ?>>Ampara</option>
            <option value="Anuradhapura" <?= (old('district') == 'Anuradhapura') ? 'selected' : '' ?>>Anuradhapura</option>
            <option value="Badulla" <?= (old('district') == 'Badulla') ? 'selected' : '' ?>>Badulla</option>
            <option value="Batticaloa" <?= (old('district') == 'Batticaloa') ? 'selected' : '' ?>>Batticaloa</option>
            <option value="Colombo" <?= (old('district') == 'Colombo') ? 'selected' : '' ?>>Colombo</option>
            <option value="Galle" <?= (old('district') == 'Galle') ? 'selected' : '' ?>>Galle</option>
            <option value="Gampaha" <?= (old('district') == 'Gampaha') ? 'selected' : '' ?>>Gampaha</option>
            <option value="Hambantota" <?= (old('district') == 'Hambantota') ? 'selected' : '' ?>>Hambantota</option>
            <option value="Jaffna" <?= (old('district') == 'Jaffna') ? 'selected' : '' ?>>Jaffna</option>
            <option value="Kalutara" <?= (old('district') == 'Kalutara') ? 'selected' : '' ?>>Kalutara</option>
            <option value="Kandy" <?= (old('district') == 'Kandy') ? 'selected' : '' ?>>Kandy</option>
            <option value="Kegalle" <?= (old('district') == 'Kegalle') ? 'selected' : '' ?>>Kegalle</option>
            <option value="Kilinochchi" <?= (old('district') == 'Kilinochchi') ? 'selected' : '' ?>>Kilinochchi</option>
            <option value="Kurunegala" <?= (old('district') == 'Kurunegala') ? 'selected' : '' ?>>Kurunegala</option>
            <option value="Mannar" <?= (old('district') == 'Mannar') ? 'selected' : '' ?>>Mannar</option>
            <option value="Matale" <?= (old('district') == 'Matale') ? 'selected' : '' ?>>Matale</option>
            <option value="Matara" <?= (old('district') == 'Matara') ? 'selected' : '' ?>>Matara</option>
            <option value="Monaragala" <?= (old('district') == 'Monaragala') ? 'selected' : '' ?>>Monaragala</option>
            <option value="Mullaitivu" <?= (old('district') == 'Mullaitivu') ? 'selected' : '' ?>>Mullaitivu</option>
            <option value="Nuwara Eliya" <?= (old('district') == 'Nuwara Eliya') ? 'selected' : '' ?>>Nuwara Eliya</option>
            <option value="Polonnaruwa" <?= (old('district') == 'Polonnaruwa') ? 'selected' : '' ?>>Polonnaruwa</option>
            <option value="Puttalam" <?= (old('district') == 'Puttalam') ? 'selected' : '' ?>>Puttalam</option>
            <option value="Ratnapura" <?= (old('district') == 'Ratnapura') ? 'selected' : '' ?>>Ratnapura</option>
            <option value="Trincomalee" <?= (old('district') == 'Trincomalee') ? 'selected' : '' ?>>Trincomalee</option>
            <option value="Vavuniya" <?= (old('district') == 'Vavuniya') ? 'selected' : '' ?>>Vavuniya</option>
          </select>
          <br><br>
          <label for="city"> City: </label>
          <?php if (isset($errors['city'])) : ?>
            <li class="error-text"><?= $errors['city'] ?></li>
          <?php endif; ?>
          <input type="text" id="city" name="city" value="<?= old('city') ?>">

          <label for="street_address">Street Adrress:</label>
          <?php if (isset($errors['street_address'])) : ?>
            <li class="error-text"><?= $errors['street_address'] ?></li>
          <?php endif; ?>
          <input type="text" id="street_address" name="street_address" value="<?= old('street_address') ?>">
          <label for="google_map_link"> Google map link: </label>
          <?php if (isset($errors['google_map_link'])) : ?>
            <li class="error-text"><?= $errors['google_map_link'] ?></li>
          <?php endif; ?>
          <input type="text" id="google_map_link" name="google_map_link" value="<?= old('google_map_link') ?>">
          <br><br>
        </div>
      </div>
      <div class="second--row">
        <button type="submit" class="btn btn-submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 24px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
          Submit
        </button>
        <button type="reset" class="btn btn-cancel" style="background: #ffffff; color: #60a56a; padding: 10px 24px; border-radius: 6px; border: 2px solid #60a56a; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='#f5f5f5'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='#ffffff'; this.style.boxShadow='none';">
          Cancel
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
<?php require base_path('views/partials/restaurants/js/previewimgs.php') ?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/detail_js.php') ?>
<!-- <?php require base_path('views/partials/restaurants/js/addimg.php') ?> -->
<?php require base_path('views/partials/footer.php') ?>