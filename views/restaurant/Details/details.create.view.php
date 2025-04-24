<?php require base_path('views/partials/restaurants/styles/details/detail.php') ?>
<?php require base_path('views/partials/restaurants/styles/details/details.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>

<div class="main--content">
  <?php require base_path('views/partials/restaurants/heading.php') ?>
  <div class="form--content">
    <form method="POST" action="/details_rest" enctype="multipart/form-data">
      <div class="first--row">
        <div class="first--grp">
          <div class="form-group">
            <?php if (isset($errors['profile'])) : ?>
                            <li class="errormsg"><?= $errors['profile'] ?></li>
                        <?php endif; ?>
            <label for="profile">profile-pic:</label><br>
            <div class="upload-box2">
              <input type="file" name="profile" id="profile" accept="image/*">
              <div id="previewprofile"></div>
            </div>
          </div>
          <div class="form-group">
            <label for="hot_line">Hot Line:</label><br>
            <input type="text" id="hot_line" name="hot_line" required>
              <?php if (isset($errors['hot_line'])) : ?>
                            <li class="errormsg"><?= $errors['hot_line'] ?></li>
                        <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="operatingHoursFrom">Operating Hours (From - To):</label>
            <input type="time" id="operatingHoursFrom" name="operatingHoursFrom" required>
            <span style="color: black;"> to </span>
            <input type="time" id="operatingHoursTo" name="operatingHoursTo" required><br><br>
              <?php if (isset($errors['operatingHoursTo'])) : ?>
                            <li class="errormsg"><?= $errors['operatingHoursTo'] ?></li>
                        <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="operatingdaysFrom">Operating Days (From - To):</label>
            <select name="operatingdaysFrom" id="operatingdaysFrom" required>
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
              <option value="monday">Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wednesday">Wednesday</option>
              <option value="thursday">Thursday</option>
              <option value="friday">Friday</option>
              <option value="saturday">Saturday</option>
              <option value="sunday">Sunday</option>
            </select>
            <br><br>
              <?php if (isset($errors['operatingdays'])) : ?>
                            <li class="errormsg"><?= $errors['operatingdays'] ?></li>
                        <?php endif; ?>
                        
                
          </div>
          <div class="form-group">
            <label for="seatingCapacity">Seating Capacity:</label><br>
            <input type="number" id="seatingCapacity" name="seatingCapacity" step="0.01" required>
              <?php if (isset($errors['seatingCapacity'])) : ?>
                            <li class="errormsg"><?= $errors['seatingCapacity'] ?></li>
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
                            <li class="errormsg"><?= $errors['deliveryOptions'] ?></li>
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
                            <li class="errormsg"><?= $errors['paymentMethods'] ?></li>
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
                            <li class="errormsg"><?= $errors['photos'] ?></li>
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
                            <li class="errormsg"><?= $errors['logo'] ?></li>
                        <?php endif; ?>
          </div>
        </div>
      </div>
     
      <br><br>
      <!-- location details -->
      <div class="first--row" style="display: flex; justify-content: center; align-items: center;">
        <div class="form-group" style="width:100%;">
          <label for="display_name">Restuarant name:</label>
            <?php if (isset($errors['display_name'])) : ?>
                            <li class="errormsg"><?= $errors['display_name'] ?></li>
                        <?php endif; ?>
          <input type="text" id="display_name" name="display_name" required>
          
          <label for="district"> District: </label>
            <?php if (isset($errors['district'])) : ?>
                            <li class="errormsg"><?= $errors['district'] ?></li>
                        <?php endif; ?>
          <select id="district" name="district" required onchange="updateCityField()">
            <option value="">-- Select District --</option>
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
            <?php if (isset($errors['city'])) : ?>
                            <li class="errormsg"><?= $errors['city'] ?></li>
                        <?php endif; ?>
          <input type="text" id="city" name="city" required>

          <label for="street_address">Street Adrress:</label>
            <?php if (isset($errors['steet_address'])) : ?>
                            <li class="errormsg"><?= $errors['steet_address'] ?></li>
                        <?php endif; ?>
          <input type="text" id="street_address" name="street_address" required>
          <label for="google_map_link"> Google map link: </label>
            <?php if (isset($errors['google_map_link'])) : ?>
                            <li class="errormsg"><?= $errors['google_map_link'] ?></li>
                        <?php endif; ?>
          <input type="text" id="google_map_link" name="google_map_link" required>
          <br><br>
        </div>
      </div>
      <div class="second--row">
        <button type="submit" class="btn btn-submit">
          Submit
        </button>
        <button type="reset" class="btn btn-cancel">Cancel</button>
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