<?php require base_path("views/partials/rental/styles/detail.php"); ?>
<?php require base_path("views/partials/rental/sidebar_car.php"); ?>
<div class="main--content">
    <?php require base_path("views/partials/restaurants/heading.php"); ?>
    <div class="form--content">
        <form method="POST" action="/details_rental" enctype="multipart/form-data">
            <h1 style="color: black;">Add Details</h1>
            <div class="first--row">
                <div class="first--grp">
                    <div class="form-group">
                        <label for="profile_picture">Profile Picture:</label><br>
                        <?php if (
                            isset($errors["profile_picture"])
                        ): ?>
                            <p class="errormsg"><?= $errors["profile_picture"] ?></p>
                        <?php endif; ?>
                        <div class="upload-box" style="margin-bottom: 10px;">
                            <div id="previewprofile"> </div>
                        </div>
                        <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
                        <h6 style="color: red;">Add profile pic</h6>
                    </div>
                    <div class="form-group">
                        <label for="payment_methods">Payment Methods(Do you accept card payments):</label>

                        <select id="payment_methods" name="payment_methods" class="custom-select ">
                            <option value="" disabled selected>Select a option</option>
                            <option value="yes" <?= isset(
                                                    $_POST["payment_methods"]
                                                ) &&
                                                    $_POST["payment_methods"] == "yes"
                                                    ? "selected"
                                                    : "" ?>>yes</option>
                            <option value="no" <?= isset(
                                                    $_POST["payment_methods"]
                                                ) &&
                                                    $_POST["payment_methods"] == "no"
                                                    ? "selected"
                                                    : "" ?>>no</option>

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
            <!-- location details -->
            <div class="first--row" style="display: flex; justify-content: center; align-items: center;">
                <div class="form-group" style="width:100%;">
                    <h2 style="color: black;"> Add Location info</h2>
                    <h6 style="color: red;">Add your operational area</h6>
                    <!-- <label for="display_name">V:</label>
                                <input type="text" id="display_name" name="display_name" > -->
                    <label for="district"> District: </label>
                    <?php if (isset($errors["district"])): ?>
                        <p class="errormsg"><?= $errors["district"] ?></p>
                    <?php endif; ?>
                    <select id="district" name="district" class="custom-select " onchange="updateCityField()">
                        <option value="" disabled <?= empty($_POST["district"])
                                                        ? "selected"
                                                        : "" ?>>-- Select District --</option>
                        <option value="Ampara" <?= isset(
                                                    $_POST["district"]
                                                ) && $_POST["district"] == "Ampara"
                                                    ? "selected"
                                                    : "" ?>>Ampara</option>
                        <option value="Anuradhapura" <?= isset(
                                                            $_POST["district"]
                                                        ) && $_POST["district"] == "Anuradhapura"
                                                            ? "selected"
                                                            : "" ?>>Anuradhapura</option>
                        <option value="Badulla" <?= isset(
                                                    $_POST["district"]
                                                ) && $_POST["district"] == "Badulla"
                                                    ? "selected"
                                                    : "" ?>>Badulla</option>
                        <option value="Batticaloa" <?= isset(
                                                        $_POST["district"]
                                                    ) && $_POST["district"] == "Batticaloa"
                                                        ? "selected"
                                                        : "" ?>>Batticaloa</option>
                        <option value="Colombo" <?= isset(
                                                    $_POST["district"]
                                                ) && $_POST["district"] == "Colombo"
                                                    ? "selected"
                                                    : "" ?>>Colombo</option>
                        <option value="Galle" <?= isset(
                                                    $_POST["district"]
                                                ) && $_POST["district"] == "Galle"
                                                    ? "selected"
                                                    : "" ?>>Galle</option>
                        <option value="Gampaha" <?= isset(
                                                    $_POST["district"]
                                                ) && $_POST["district"] == "Gampaha"
                                                    ? "selected"
                                                    : "" ?>>Gampaha</option>
                        <option value="Hambantota" <?= isset(
                                                        $_POST["district"]
                                                    ) && $_POST["district"] == "Hambantota"
                                                        ? "selected"
                                                        : "" ?>>Hambantota</option>
                        <option value="Jaffna" <?= isset(
                                                    $_POST["district"]
                                                ) && $_POST["district"] == "Jaffna"
                                                    ? "selected"
                                                    : "" ?>>Jaffna</option>
                        <option value="Kalutara" <?= isset(
                                                        $_POST["district"]
                                                    ) && $_POST["district"] == "Kalutara"
                                                        ? "selected"
                                                        : "" ?>>Kalutara</option>
                        <option value="Kandy" <?= isset(
                                                    $_POST["district"]
                                                ) && $_POST["district"] == "Kandy"
                                                    ? "selected"
                                                    : "" ?>>Kandy</option>
                        <option value="Kegalle" <?= isset(
                                                    $_POST["district"]
                                                ) && $_POST["district"] == "Kegalle"
                                                    ? "selected"
                                                    : "" ?>>Kegalle</option>
                        <option value="Kilinochchi" <?= isset(
                                                        $_POST["district"]
                                                    ) && $_POST["district"] == "Kilinochchi"
                                                        ? "selected"
                                                        : "" ?>>Kilinochchi</option>
                        <option value="Kurunegala" <?= isset(
                                                        $_POST["district"]
                                                    ) && $_POST["district"] == "Kurunegala"
                                                        ? "selected"
                                                        : "" ?>>Kurunegala</option>
                        <option value="Mannar" <?= isset(
                                                    $_POST["district"]
                                                ) && $_POST["district"] == "Mannar"
                                                    ? "selected"
                                                    : "" ?>>Mannar</option>
                        <option value="Matale" <?= isset(
                                                    $_POST["district"]
                                                ) && $_POST["district"] == "Matale"
                                                    ? "selected"
                                                    : "" ?>>Matale</option>
                        <option value="Matara" <?= isset(
                                                    $_POST["district"]
                                                ) && $_POST["district"] == "Matara"
                                                    ? "selected"
                                                    : "" ?>>Matara</option>
                        <option value="Monaragala" <?= isset(
                                                        $_POST["district"]
                                                    ) && $_POST["district"] == "Monaragala"
                                                        ? "selected"
                                                        : "" ?>>Monaragala</option>
                        <option value="Mullaitivu" <?= isset(
                                                        $_POST["district"]
                                                    ) && $_POST["district"] == "Mullaitivu"
                                                        ? "selected"
                                                        : "" ?>>Mullaitivu</option>
                        <option value="Nuwara Eliya" <?= isset(
                                                            $_POST["district"]
                                                        ) && $_POST["district"] == "Nuwara Eliya"
                                                            ? "selected"
                                                            : "" ?>>Nuwara Eliya</option>
                        <option value="Polonnaruwa" <?= isset(
                                                        $_POST["district"]
                                                    ) && $_POST["district"] == "Polonnaruwa"
                                                        ? "selected"
                                                        : "" ?>>Polonnaruwa</option>
                        <option value="Puttalam" <?= isset(
                                                        $_POST["district"]
                                                    ) && $_POST["district"] == "Puttalam"
                                                        ? "selected"
                                                        : "" ?>>Puttalam</option>
                        <option value="Ratnapura" <?= isset(
                                                        $_POST["district"]
                                                    ) && $_POST["district"] == "Ratnapura"
                                                        ? "selected"
                                                        : "" ?>>Ratnapura</option>
                        <option value="Trincomalee" <?= isset(
                                                        $_POST["district"]
                                                    ) && $_POST["district"] == "Trincomalee"
                                                        ? "selected"
                                                        : "" ?>>Trincomalee</option>
                        <option value="Vavuniya" <?= isset(
                                                        $_POST["district"]
                                                    ) && $_POST["district"] == "Vavuniya"
                                                        ? "selected"
                                                        : "" ?>>Vavuniya</option>
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
                    <input type="text" id="city" name="city" value="<?= $_POST["city"] ?? "" ?>">
                    <div class="error">
                        <label for="street_address">Street Adrress:</label>
                        <?php if (
                            isset($errors["street_address"])
                        ): ?>
                            <p class="errormsg"><?= $errors["street_address"] ?></p>
                        <?php endif; ?>
                    </div>
                    <input type="text" id="street_address" name="street_address" value="<?= $_POST["street_address"] ?? "" ?>">
                    <div class="error">
                        <label for="google_map_link"> Google map link: </label>
                        <?php if (
                            isset($errors["google_map_link"])
                        ): ?>
                            <p class="errormsg"><?= $errors["google_map_link"] ?></p>
                        <?php endif; ?>
                    </div>
                    <input type="text" id="google_map_link" name="google_map_link" value="<?= $_POST["google_map_link"] ?? "" ?>">
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
                <input type="text" id="vehicle_type" name="vehicle_type" value="<?= $_POST["vehicle_type"] ?? "" ?>" placeholder="car,tuk,van......">

                <div class="error">
                    <label for="vehicle_model"> Model: </label>
                    <?php if (isset($errors["vehicle_model"])): ?>
                        <p class="errormsg"><?= $errors["vehicle_model"] ?></p>
                    <?php endif; ?>
                </div>
                <input type="text" id="vehicle_model" name="vehicle_model" value="<?= $_POST["vehicle_model"] ?? "" ?>" placeholder="suzuki,bently.....">
            </div>
            <div class="second--row">

                <button type="submit" class="btn btn-submit">
                    Submit
                </button>
                <button type="reset" class="btn btn-cancel">Cancel</button>
            </div>
            <ul>
                <?php if (isset($errors["email"])): ?>
                    <li class="text-red-500 text-xs mt-2"><?= $errors["email"] ?></li>
                <?php endif; ?>

                <?php if (isset($errors["password"])): ?>
                    <li class="text-red-500 text-xs mt-2"><?= $errors["password"] ?></li>
                <?php endif; ?>
            </ul>

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