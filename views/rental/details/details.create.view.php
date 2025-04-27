<?php require base_path("views/partials/rental/styles/detail.php"); ?>
<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>
<?php require base_path("views/partials/rental/sidebar_car.php"); ?>
<div class="main--content">
    <?php require base_path("views/partials/restaurants/heading.php"); ?>
    <div class="form--content">
        <form method="POST" action="/details_rental" enctype="multipart/form-data">
            <h1 style="color: black;">Add Details</h1>
            <div class="first--row">
                <div class="first--grp">
                    <div class="form-group">
                        <label for="profile_picture">Logo:</label><br>
                        <?php if (
                            isset($errors["profile_picture"])
                        ): ?>
                            <p class="errormsg"><?= $errors["profile_picture"] ?></p>
                        <?php endif; ?>
                        <div class="upload-box" style="margin-bottom: 10px;">
                            <div id="previewprofile"> </div>
                        </div>
                        <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
                        <h6 style="color: red;">Add Company  logo</h6>
                    </div>
                    <div class="form-group">
                        <label for="payment_methods">Payment Methods(Do you accept card payments):</label>

                        <select id="payment_methods" name="payment_methods" class="custom-select ">
                            <option value="" disabled selected>Select a option</option>
                            <option value="yes" <?= (old("payment_methods") == "yes") ? "selected" : "" ?>>yes</option>
                            <option value="no" <?= (old("payment_methods") == "no") ? "selected" : "" ?>>no</option>
                        </select>
                        <h6 style="color: red;">Add the methods the customer can use to pay you</h6>
                        <?php if (
                            isset(
                                $errors["payment_methods"]
                            )
                        ): ?>
                            <p class="errormsg"><?= $errors["payment_methods"] ?></p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <br><br>
          
            <div class="first--row" style="display: flex; justify-content: center; align-items: center;">
                <div class="form-group" style="width:100%;">
                    <h2 style="color: black;"> Add Location info</h2>
                    <h6 style="color: red;">Add your operational area</h6>
                 
                    <label for="district"> District: </label>
                    <?php if (isset($errors["district"])): ?>
                        <p class="errormsg"><?= $errors["district"] ?></p>
                    <?php endif; ?>
               <select id="district" name="district" class="custom-select" onchange="updateCityField()">
                        <option value="" disabled <?= empty($_POST["district"]) ? "selected" : "" ?>>-- Select District --</option>
                        <option value="Ampara" <?= old("district") == "Ampara" ? "selected" : "" ?>>Ampara</option>
                        <option value="Anuradhapura" <?= old("district") == "Anuradhapura" ? "selected" : "" ?>>Anuradhapura</option>
                        <option value="Badulla" <?= old("district") == "Badulla" ? "selected" : "" ?>>Badulla</option>
                        <option value="Batticaloa" <?= old("district") == "Batticaloa" ? "selected" : "" ?>>Batticaloa</option>
                        <option value="Colombo" <?= old("district") == "Colombo" ? "selected" : "" ?>>Colombo</option>
                        <option value="Galle" <?= old("district") == "Galle" ? "selected" : "" ?>>Galle</option>
                        <option value="Gampaha" <?= old("district") == "Gampaha" ? "selected" : "" ?>>Gampaha</option>
                        <option value="Hambantota" <?= old("district") == "Hambantota" ? "selected" : "" ?>>Hambantota</option>
                        <option value="Jaffna" <?= old("district") == "Jaffna" ? "selected" : "" ?>>Jaffna</option>
                        <option value="Kalutara" <?= old("district") == "Kalutara" ? "selected" : "" ?>>Kalutara</option>
                        <option value="Kandy" <?= old("district") == "Kandy" ? "selected" : "" ?>>Kandy</option>
                        <option value="Kegalle" <?= old("district") == "Kegalle" ? "selected" : "" ?>>Kegalle</option>
                        <option value="Kilinochchi" <?= old("district") == "Kilinochchi" ? "selected" : "" ?>>Kilinochchi</option>
                        <option value="Kurunegala" <?= old("district") == "Kurunegala" ? "selected" : "" ?>>Kurunegala</option>
                        <option value="Mannar" <?= old("district") == "Mannar" ? "selected" : "" ?>>Mannar</option>
                        <option value="Matale" <?= old("district") == "Matale" ? "selected" : "" ?>>Matale</option>
                        <option value="Matara" <?= old("district") == "Matara" ? "selected" : "" ?>>Matara</option>
                        <option value="Monaragala" <?= old("district") == "Monaragala" ? "selected" : "" ?>>Monaragala</option>
                        <option value="Mullaitivu" <?= old("district") == "Mullaitivu" ? "selected" : "" ?>>Mullaitivu</option>
                        <option value="Nuwara Eliya" <?= old("district") == "Nuwara Eliya" ? "selected" : "" ?>>Nuwara Eliya</option>
                        <option value="Polonnaruwa" <?= old("district") == "Polonnaruwa" ? "selected" : "" ?>>Polonnaruwa</option>
                        <option value="Puttalam" <?= old("district") == "Puttalam" ? "selected" : "" ?>>Puttalam</option>
                        <option value="Ratnapura" <?= old("district") == "Ratnapura" ? "selected" : "" ?>>Ratnapura</option>
                        <option value="Trincomalee" <?= old("district") == "Trincomalee" ? "selected" : "" ?>>Trincomalee</option>
                        <option value="Vavuniya" <?= old("district") == "Vavuniya" ? "selected" : "" ?>>Vavuniya</option>
                    </select>

                    <br><br>
                    <div class="error">
                        <label for="city"> City: </label>
                        <?php if (isset($errors["city"])): ?>
                            <p class="errormsg">
                                <?= htmlspecialchars(
                                    $errors["city"]
                                ) ?>
                            </p>

                        <?php endif; ?>
                    </div>
                    <input type="text" id="city" name="city" value="<?= old("city") ?? "" ?>">
                    <div class="error">
                        <label for="street_address">Street Adrress:</label>
                        <?php if (
                            isset($errors["street_address"])
                        ): ?>
                            <p class="errormsg"><?= $errors["street_address"] ?></p>
                        <?php endif; ?>
                    </div>
                    <input type="text" id="street_address" name="street_address" value="<?= old("street_address") ?? "" ?>">
                    <div class="error">
                        <label for="google_map_link"> Google map link: </label>
                        <?php if (
                            isset($errors["google_map_link"])
                        ): ?>
                            <p class="errormsg"><?= $errors["google_map_link"] ?></p>
                        <?php endif; ?>
                    </div>
                    <input type="text" id="google_map_link" name="google_map_link" value="<?= old("google_map_link") ?? "" ?>">
                    <br><br>
                </div>
            </div>
            <div class="form-group" style="width:100%;">
                <h2 style="color: black;"> Add Vehicle info</h2>
                <h6 style="color: red;">Add your vehicle information</h6>
                <div class="error">
                    <label for="vehicle_type"> Type: </label>
                    <?php if (isset($errors["vehicle_type"])): ?>
                        <p class="errormsg"><?= $errors["vehicle_type"] ?></p>
                    <?php endif; ?>
                </div>
              <select id="vehicle_type" name="vehicle_type">
                    <option value="" disabled selected>Select Vehicle Type</option>
                    <option value="CAR" <?= ((old("vehicle_type") ?? '') === 'CAR') ? 'selected' : '' ?>>CAR</option>
                    <option value="TUK TUK" <?= ((old("vehicle_type") ?? '') === 'TUK TUK') ? 'selected' : '' ?>>TUK TUK</option>
                    <option value="VAN" <?= ((old("vehicle_type") ?? '') === 'VAN') ? 'selected' : '' ?>>VAN</option>
                    <option value="SUV" <?= ((old("vehicle_type") ?? '') === 'SUV') ? 'selected' : '' ?>>SUV</option>
                    <option value="MOTORCYCLE" <?= ((old("vehicle_type") ?? '') === 'MOTORCYCLE') ? 'selected' : '' ?>>MOTORCYCLE</option>
                </select>
                <div class="error">
                    <label for="vehicle_model"> Model: </label>
                     <?php if (isset($errors["vehicle_model"])): ?>
                        <p class="errormsg"><?= $errors["vehicle_model"] ?></p>
                    <?php endif; ?>
                </div>
                <input type="text" id="vehicle_model" name="vehicle_model" value="<?= old("vehicle_model") ?? "" ?>" placeholder="suzuki,bently.....">
                <div class="error">
                    <label for="hourlyrate">Rate per hour(for vehicle): </label>
                    <?php if (isset($errors["hourlyrate"])): ?>
                        <p class="errormsg"><?= $errors["hourlyrate"] ?></p>
                    <?php endif; ?>
                </div>
                <input type="text" id="hourlyrate" name="hourlyrate" value="<?= old("hourlyrate") ?? "" ?>">
                <div class="error">
                    <label for="numberplate">Number Plate: </label>
                    <?php if (isset($errors["numberplate"])): ?>
                        <p class="errormsg"><?= $errors["numberplate"] ?></p>
                    <?php endif; ?>
                </div>
                <input type="text" id="numberplate" name="numberplate" value="<?= old("numberplate") ?? "" ?>" placeholder="CAR 1234">
            </div>

            <div class="form-group" style="width:100%;">
                <h2 style="color: black;"> Add driver info</h2>
                <h6 style="color: red;">
                    If you are renting the vehicle with a driver, please complete the following details. Otherwise, you may leave them blank.
                </h6>
                <div class="error">
                    <label for="name"> Name: </label>

                </div>
                <input type="text" id="name" name="name" value="<?= old("name") ?? "" ?>">

                <div class="error">
                    <label for="phone_number"> Phone Number: </label>
                    <?php if (isset($errors["phone_number"])): ?>
                        <p class="errormsg"><?= $errors["phone_number"] ?></p>
                    <?php endif; ?>
                </div>
                <input type="text" id="phone_number" name="phone_number" value="<?= old("phone_number") ?? "" ?>">
                <div class="error">
                    <label for="license_number"> License Number: </label>
                    <?php if (isset($errors["license_number"])): ?>
                        <p class="errormsg"><?= $errors["license_number"] ?></p>
                    <?php endif; ?>
                </div>
                <input type="text" id="license_number" name="license_number" value="<?= old("license_number") ?? "" ?>">
                <div class="error">
                    <label for="license_issue_date"> License Issue Date: </label>
                    <?php if (isset($errors["license_issue_date"])): ?>
                        <p class="errormsg"><?= $errors["license_issue_date"] ?></p>
                    <?php endif; ?>
                </div>
                <input type="date" id="license_issue_date" name="license_issue_date" value="<?= old("license_issue_date")?? "" ?>">
                <div class="error">
                    <label for="license_expiry_date"> License Expiry Date: </label>
                    <?php if (isset($errors["license_expiry_date"])): ?>
                        <p class="errormsg"><?= $errors["license_expiry_date"] ?></p>
                    <?php endif; ?>
                </div>
                <input type="date" id="license_expiry_date" name="license_expiry_date" value="<?= old("license_expiry_date") ?? "" ?>">

                <div class="error">
                    <label for="hourlyrate_driver">Rate per hour(for driver): </label>
                    <?php if (isset($errors["hourlyrate_driver"])): ?>
                        <p class="errormsg"><?= $errors["hourlyrate_driver"] ?></p>
                    <?php endif; ?>
                </div>
                <input type="text" id="hourlyrate_driver" name="hourlyrate_driver" value="<?= old("hourlyrate_driver")?? "" ?>">
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
<?php require base_path("views/partials/rental/js/previewimgs.php"); ?>
<?php require base_path("views/partials/restaurants/filejs.php"); ?>
<?php require base_path("views/partials/rental/js/detail_js.php"); ?>
<?php require base_path("views/partials/footer.php"); ?>