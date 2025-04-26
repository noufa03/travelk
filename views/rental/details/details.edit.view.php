<?php require base_path('views/partials/rental/styles/detail.php') ?>
<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>
<?php require base_path('views/partials/rental/sidebar_car.php') ?>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 30px;
            z-index: 999;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        .popup.open-popup {
            display: block;
        }
    </style>


    <div class="form--content">
        <!-- 1 form -->
        <?php if ($driver_availability == 'yes' || isset($driver_details['driverid'])): ?>
            <form method="POST" action="/driver/update" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="driverid" value="<?= $driver_details['driverid'] ?>">

                <div class="form-group" style="width:100%;">
                    <h1 style="color: black;"> Add Driver info</h1>

                    <label for="driver_name">Name:</label>
                    <input type="text" id="driver_name" name="driver_name" value="<?= (empty(old('driver_name'))) ? $driver_details['name'] : old('driver_name') ?>">
                    <?php if (isset($errors['driver_name'])) : ?>
                        <li class="errormsg"><?= $errors['driver_name'] ?></li>
                    <?php endif; ?>

                    <label for="license_number">License Number:</label>
                    <input type="text" id="license_number" name="license_number" value="<?= (empty(old('license_number'))) ? $driver_details['license_number'] : old('license_number') ?>">
                    <?php if (isset($errors['license_number'])) : ?>
                        <li class="errormsg"><?= $errors['license_number'] ?></li>
                    <?php endif; ?>
                
                 
                    <label for="license_issue_date">Issue Date:</label><br>
                    <input type="date" id="license_issue_date" name="license_issue_date" value="<?= (empty(old('license_issue_date'))) ? $driver_details['license_issue_date'] : old('license_issue_date') ?>">
                    <?php if (isset($errors['license_issue_date'])) : ?>
                            <li class="errormsg"><?= $errors['license_issue_date'] ?></li>
                    <?php endif; ?>
                
                 
                    <label for="license_expiry_date">Expiry Date:</label><br>
                    <input type="date" id="license_expiry_date" name="license_expiry_date" value="<?= (empty(old('license_expiry_date'))) ? $driver_details['license_expiry_date'] : old('license_expiry_date') ?>">
                    <?php if (isset($errors['license_expiry_date'])) : ?>
                        <li class="errormsg"><?= $errors['license_expiry_date'] ?></li>
                    <?php endif; ?>
                    <!-- if the expired one is equal or in the past than the issue date -->
                      <?php if (isset($errors['license_date'])) : ?>
                        <li class="errormsg"><?= $errors['license_date'] ?></li>
                    <?php endif; ?>
                  

                    <label for="phone_number">Phone Number:</label>
                    <input type="text" id="phone_number" name="phone_number" value="<?= isset($_POST['phone_number']) ? $_POST['phone_number'] : $driver_details['phone_number'] ?>">
                    <?php if (isset($errors['phone_number'])) : ?>
                        <li class="errormsg"><?= $errors['phone_number'] ?></li>
                    <?php endif; ?>
                    <label for="hourlyrate_driver">Rate per hour(for driver):</label>
                    <input type="text" id="hourlyrate_driver" name="hourlyrate_driver" value="<?= isset($_POST['hourlyrate_driver']) ? $_POST['hourlyrate_driver'] : $driver_details['hourlyrate_driver'] ?>">
                    <?php if (isset($errors['hourlyrate_driver'])) : ?>
                        <li class="errormsg"><?= $errors['hourlyrate_driver'] ?></li>
                    <?php endif; ?>
                </div>
                    <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                    Update Driver</button>
            </form>
        <?php else: ?>
             <h1 style="color: black;"> Add Driver </h1>
            <!-- your popup form goes here... -->
            <button onclick="openPopup_addriver(<?= $driver_profile['userid'] ?>)">Add driver</button>
            <div class="popup" id="popup-<?= $driver_profile['userid'] ?>" style="color: black;">

                <h2>Add Driver</h2>

                <form id="delete-form-<?= $driver_profile['userid'] ?>" method="POST" action="/driver/add">

                    <input type="hidden" name="vehicle_details_id" value="<?= $driver_profile['userid'] ?>">

                    <label for="name">Driver name:</label>
                    <input type="text" name="name">

                    <label for="license_number">License Number</label>
                    <input type="text" name="license_number">
                    
                    <label for="license_issue_date">License Issue Date</label>
                    <input type="date" name="license_issue_date">
                    
                    <label for="license_expiry_date">License Expiry Date</label>
                    <input type="date" name="license_expiry_date">
                    

                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number">
                    
                    <label for="hourlyrate_driver">Rate per hour(for driver)</label>
                    <input type="text" name="hourlyrate_driver">
                    <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                        Save</button>
                </form>
                <button type="reset" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                    onclick="closePopup_addriver(<?= $driver_profile['userid'] ?>)">Cancel</button>

            </div>
        <?php endif; ?>


    </div>
    <br>
    <!-- 2 form -->
    <div class="form--content">
        <form method="POST" action="/details_rental/update?id=<?php echo $driver_profile['userid'] ?>" enctype="multipart/form-data">
            <div class="first--row">
                <div class="first--grp">
                    <h1 style="color: black;">Personal Info</h1>
                    <div class="form-group">
                        <label for="first_name">First Name:</label><br>
                        <input type="text" id="first_name" name="first_name" value="<?= (empty(old('first_name'))) ? $driver_profile['first_name'] : old('first_name') ?>">
                        <!-- if the current value  is empty i will display the name that was in the db if it is not empty  will show the old(current value) -->
                        <?php if (isset($errors['first_name'])) : ?>
                            <li class="errormsg"><?= $errors['first_name'] ?></li>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label><br>
                        <input type="text" id="last_name" name="last_name" value="<?= (empty(old('last_name'))) ? $driver_profile['last_name'] : old('last_name') ?>">
                        <?php if (isset($errors['last_name'])) : ?>
                            <li class="errormsg"><?= $errors['last_name'] ?></li>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label><br>
                        <input type="text" id="address" name="address" value="<?= (empty(old('address'))) ? $driver_profile['address'] : old('address') ?>">
                        <?php if (isset($errors['address'])) : ?>
                            <li class="errormsg"><?= $errors['address'] ?></li>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label><br>
                        <input type="text" id="phone_number" name="phone_number" value="<?= (empty(old('phone_number'))) ? $driver_profile['phone_number'] : old('phone_number') ?>">
                        <?php if (isset($errors['phone_number'])) : ?>
                            <li class="errormsg"><?= $errors['phone_number'] ?></li>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth:</label><br>
                        <input type="date" id="date_of_birth" name="date_of_birth" value="<?= (empty(old('date_of_birth'))) ? $driver_profile['date_of_birth'] : old('date_of_birth') ?>">
                        <?php if (isset($errors['date_of_birth'])) : ?>
                            <li class="errormsg"><?= $errors['date_of_birth'] ?></li>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $selectedGender = old('gender') ?: ($driver_profile['gender'] ?? '');
                        ?>
                        <label for="gender">Gender:</label>
                        <select class="custom-select" name="gender">
                            <option value="" disabled <?= empty($driver_profile['gender']) ? 'selected' : '' ?>>Select Gender</option>
                            <option value="male" <?= ($selectedGender == 'male') ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?= ($selectedGender == 'female') ? 'selected' : '' ?>>Female</option>

                        </select>
                        <?php if (isset($errors['gender'])) : ?>
                            <li class="errormsg"><?= $errors['gender'] ?></li>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $selectedMethods = old('payment_methods') ?: ($driver_profile['payment_methods'] ?? '');
                        ?>
                        <label for="payment_methods">Payment Methods(Do you accept card payments):</label>
                        <select class="custom-select" id="payment_methods" name="payment_methods">
                            <option value="yes" <?= ($selectedMethods == 'credit,debit,cash') ? 'selected' : '' ?>>Yes</option>
                            <option value="no" <?= ($selectedMethods != 'credit,debit,cash') ? 'selected' : '' ?>>No</option>
                        </select>
                        <h6 style="color: red;">Add the methods the customer can use to pay you</h6>
                        <?php if (isset($errors['payment_methods'])) : ?>
                            <li class="errormsg"><?= $errors['payment_methods'] ?></li>
                        <?php endif; ?>
                    </div>
            
                </div>
                <div class="second--grp">
                    <div class="form-group">
                        <label for="profile_picture">Profile Picture:</label><br>

                        <div class="upload-box">
                            <img id="preview" src="/<?= $profile ?>" alt="Image Preview" class="preview-img" />
                        </div>
                        <br>
                        <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                        <input type="hidden" id="old_profile_picture" name="old_profile_picture" value="<?= $profile ?>" accept="image/*">
                        <h6 style="color: red;">Add profile pic</h6>
                        <?php if (isset($errors['profile_picture'])) : ?>
                            <li class="errormsg"><?= $errors['profile_picture'] ?></li>
                        <?php endif; ?>
                    </div>

                    <div class="form-group" style="width:100%;">
                        <h1 style="color: black;"> Add Vehicle info</h1>
                        <h6 style="color: red;">Add your vehicle information</h6>
                        <label for="vehicle_type"> Type: </label>
                         <select id="vehicle_type" name="vehicle_type">
                            <option value="" disabled selected>Select Vehicle Type</option>
                            <?php
                                $selectedVehicle = empty(old('vehicle_type')) ? $details['vehicle_type'] : old('vehicle_type');
                            ?>
                            <option value="CAR" <?= ($selectedVehicle === 'CAR') ? 'selected' : '' ?>>CAR</option>
                            <option value="TUK TUK" <?= ($selectedVehicle === 'TUK TUK') ? 'selected' : '' ?>>TUK TUK</option>
                            <option value="VAN" <?= ($selectedVehicle === 'VAN') ? 'selected' : '' ?>>VAN</option>
                            <option value="SUV" <?= ($selectedVehicle === 'SUV') ? 'selected' : '' ?>>SUV</option>
                            <option value="MOTORCYCLE" <?= ($selectedVehicle === 'MOTORCYCLE') ? 'selected' : '' ?>>MOTORCYCLE</option>
                        </select>

                        <?php if (isset($errors['vehicle_type'])) : ?>
                            <li class="errormsg"><?= $errors['vehicle_type'] ?></li>
                        <?php endif; ?>
                        <label for="vehicle_model"> Model: </label>
                        <input type="text" id="vehicle_model" name="vehicle_model" placeholder="suzuki,bently....." value="<?= (empty(old('vehicle_model'))) ? $details['vehicle_model'] : old('vehicle_model') ?>">
                        <?php if (isset($errors['vehicle_model'])) : ?>
                            <li class="errormsg"><?= $errors['vehicle_model'] ?></li>
                        <?php endif; ?>
                        <label for="hourlyrate"> Rate per hour(for vehicle): </label>
                        <input type="text" id="hourlyrate" name="hourlyrate"  value="<?= (empty(old('hourlyrate'))) ? $details['hourlyrate'] : old('hourlyrate') ?>">
                        <?php if (isset($errors['hourlyrate'])) : ?>
                            <li class="errormsg"><?= $errors['hourlyrate'] ?></li>
                        <?php endif; ?>
                        <label for="numberplate"> Vehicle Number Plate: </label>
                        <input type="text" id="numberplate" name="numberplate"  value="<?= (empty(old('numberplate'))) ? $details['numberplate'] : old('numberplate') ?>">
                        <?php if (isset($errors['numberplate'])) : ?>
                            <li class="errormsg"><?= $errors['numberplate'] ?></li>
                        <?php endif; ?>
                    </div>


                </div>

            </div>
            <!-- location details -->
            <div class="first--row" style="display: flex; justify-content: center; align-items: center">
                <div class="form-group" style="width:100%;">
                    <h2 style="color: black;"> Add Location info</h2>
                    <h6 style="color: red;">Add your operational area</h6>
                    <label for="district"> District: </label>
                    <?php if (isset($errors['district'])) : ?>
                        <li class="errormsg"><?= $errors['district'] ?></li>
                    <?php endif; ?>
                    <select class="custom-select" id="district" name="district" onchange="updateCityField()">
                        <option value="<?= $district['district'] ?>"><?= $district['district'] ?></option>
                        <option value="Ampara" <?= (empty(old('district'))) ? (($district['district'] == 'Ampara') ? 'selected' : '') : ((old('district') == 'Ampara') ? 'selected' : '') ?>>Ampara</option>
                        <option value="Anuradhapura" <?= (empty(old('district'))) ? (($district['district'] == 'Anuradhapura') ? 'selected' : '') : ((old('district') == 'Anuradhapura') ? 'selected' : '') ?>>Anuradhapura</option>
                        <option value="Badulla" <?= (empty(old('district'))) ? (($district['district'] == 'Badulla') ? 'selected' : '') : ((old('district') == 'Badulla') ? 'selected' : '') ?>>Badulla</option>
                        <option value="Batticaloa" <?= (empty(old('district'))) ? (($district['district'] == 'Batticaloa') ? 'selected' : '') : ((old('district') == 'Batticaloa') ? 'selected' : '') ?>>Batticaloa</option>
                        <option value="Colombo" <?= (empty(old('district'))) ? (($district['district'] == 'Colombo') ? 'selected' : '') : ((old('district') == 'Colombo') ? 'selected' : '') ?>>Colombo</option>
                        <option value="Galle" <?= (empty(old('district'))) ? (($district['district'] == 'Galle') ? 'selected' : '') : ((old('district') == 'Galle') ? 'selected' : '') ?>>Galle</option>
                        <option value="Gampaha" <?= (empty(old('district'))) ? (($district['district'] == 'Gampaha') ? 'selected' : '') : ((old('district') == 'Gampaha') ? 'selected' : '') ?>>Gampaha</option>
                        <option value="Hambantota" <?= (empty(old('district'))) ? (($district['district'] == 'Hambantota') ? 'selected' : '') : ((old('district') == 'Hambantota') ? 'selected' : '') ?>>Hambantota</option>
                        <option value="Jaffna" <?= (empty(old('district'))) ? (($district['district'] == 'Jaffna') ? 'selected' : '') : ((old('district') == 'Jaffna') ? 'selected' : '') ?>>Jaffna</option>
                        <option value="Kalutara" <?= (empty(old('district'))) ? (($district['district'] == 'Kalutara') ? 'selected' : '') : ((old('district') == 'Kalutara') ? 'selected' : '') ?>>Kalutara</option>
                        <option value="Kandy" <?= (empty(old('district'))) ? (($district['district'] == 'Kandy') ? 'selected' : '') : ((old('district') == 'Kandy') ? 'selected' : '') ?>>Kandy</option>
                        <option value="Kegalle" <?= (empty(old('district'))) ? (($district['district'] == 'Kegalle') ? 'selected' : '') : ((old('district') == 'Kegalle') ? 'selected' : '') ?>>Kegalle</option>
                        <option value="Kilinochchi" <?= (empty(old('district'))) ? (($district['district'] == 'Kilinochchi') ? 'selected' : '') : ((old('district') == 'Kilinochchi') ? 'selected' : '') ?>>Kilinochchi</option>
                        <option value="Kurunegala" <?= (empty(old('district'))) ? (($district['district'] == 'Kurunegala') ? 'selected' : '') : ((old('district') == 'Kurunegala') ? 'selected' : '') ?>>Kurunegala</option>
                        <option value="Mannar" <?= (empty(old('district'))) ? (($district['district'] == 'Mannar') ? 'selected' : '') : ((old('district') == 'Mannar') ? 'selected' : '') ?>>Mannar</option>
                        <option value="Matale" <?= (empty(old('district'))) ? (($district['district'] == 'Matale') ? 'selected' : '') : ((old('district') == 'Matale') ? 'selected' : '') ?>>Matale</option>
                        <option value="Matara" <?= (empty(old('district'))) ? (($district['district'] == 'Matara') ? 'selected' : '') : ((old('district') == 'Matara') ? 'selected' : '') ?>>Matara</option>
                        <option value="Monaragala" <?= (empty(old('district'))) ? (($district['district'] == 'Monaragala') ? 'selected' : '') : ((old('district') == 'Monaragala') ? 'selected' : '') ?>>Monaragala</option>
                        <option value="Mullaitivu" <?= (empty(old('district'))) ? (($district['district'] == 'Mullaitivu') ? 'selected' : '') : ((old('district') == 'Mullaitivu') ? 'selected' : '') ?>>Mullaitivu</option>
                        <option value="Nuwara Eliya" <?= (empty(old('district'))) ? (($district['district'] == 'Nuwara Eliya') ? 'selected' : '') : ((old('district') == 'Nuwara Eliya') ? 'selected' : '') ?>>Nuwara Eliya</option>
                        <option value="Polonnaruwa" <?= (empty(old('district'))) ? (($district['district'] == 'Polonnaruwa') ? 'selected' : '') : ((old('district') == 'Polonnaruwa') ? 'selected' : '') ?>>Polonnaruwa</option>
                        <option value="Puttalam" <?= (empty(old('district'))) ? (($district['district'] == 'Puttalam') ? 'selected' : '') : ((old('district') == 'Puttalam') ? 'selected' : '') ?>>Puttalam</option>
                        <option value="Ratnapura" <?= (empty(old('district'))) ? (($district['district'] == 'Ratnapura') ? 'selected' : '') : ((old('district') == 'Ratnapura') ? 'selected' : '') ?>>Ratnapura</option>
                        <option value="Trincomalee" <?= (empty(old('district'))) ? (($district['district'] == 'Trincomalee') ? 'selected' : '') : ((old('district') == 'Trincomalee') ? 'selected' : '') ?>>Trincomalee</option>
                        <option value="Vavuniya" <?= (empty(old('district'))) ? (($district['district'] == 'Vavuniya') ? 'selected' : '') : ((old('district') == 'Vavuniya') ? 'selected' : '') ?>>Vavuniya</option>
                    </select>
                    <br><br>
                    <label for="city"> City: </label>
                    <?php if (isset($errors['city'])) : ?>
                        <li class="errormsg"><?= $errors['city'] ?></li>
                    <?php endif; ?>
                    <input type="text" id="city" name="city" value="<?= (empty(old('city'))) ? $details['city'] : old('city') ?>">
                    <label for="street_address">Street Adrress:</label>
                    <?php if (isset($errors['street_address'])) : ?>
                        <li class="errormsg"><?= $errors['street_address'] ?></li>
                    <?php endif; ?>
                    <input type="text" id="street_address" name="street_address" value="<?= (empty(old('street_address'))) ? $details['street_address'] : old('street_address') ?>">
                    <label for="google_map_link"> Google map link: </label>
                    <?php if (isset($errors['google_map_link'])) : ?>
                        <li class="errormsg"><?= $errors['google_map_link'] ?></li>
                    <?php endif; ?>
                    <input type="text" id="google_map_link" name="google_map_link" value="<?= (empty(old('google_map_link'))) ? $details['google_map_link'] : old('google_map_link') ?>">
                    <br><br>
                </div>
            </div>
            <div class="second--row">
                  <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                      Save changes
                    </button>
                     <button type="reset" style="background: #ffffff; color: #60a56a; padding: 12px 24px; border-radius: 8px; border: 2px solid #60a56a; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='#f5f5f5';" onmouseout="this.style.transform='scale(1)'; this.style.background='#ffffff';">
                     <a href="/dashboard_rental" style="color: #60a56a; text-decoration: none;">Discard Changes</a>
                     </button>
            </div>
        </form>
    </div>

    </body>

    </html>

    <script>
        function openPopup_addriver($id) {
            var popup = document.getElementById('popup-' + $id); // Get the unique popup
            popup.classList.add("open-popup"); // Add class to show the popup
        }

        function closePopup_addriver($id) {
            var popup = document.getElementById('popup-' + $id); // Get the unique popup
            popup.classList.remove("open-popup"); // Remove class to hide the popup
            window.location.href = "/details_rental/edit"; // Redirect to the tables page
        }
    </script>

    <?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>
    <?php require base_path('views/partials/restaurants/filejs.php') ?>
    <?php require base_path('views/partials/rental/js/detail_js.php') ?>
    <?php require base_path('views/partials/footer.php') ?>