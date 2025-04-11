<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/script.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php'); ?>
<?php require (BASE_PATH.'views/partials/user/nav.php'); ?>

<main class="register-page">
    <div class="register-containerform">
        <div class="register-header">
            <h2 class="register-title">Register for a new account</h2>
        </div>

        <form method="POST" action="/register_rest" class="register-form" enctype="multipart/form-data">
            <div class="form-group">
               <div class="input-container">
                        <label for="businessType" class="form-label">Business Type</label>
                        <select id="businessType" name="businessType" class="form-input" onchange="toggleCustomInput(this)">
                            <option value="" disabled selected>Select your Business Type</option>
                            
                             <option value="fast_food" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "fast_food") ? 'selected' : '' ?>>Fast Food</option>
                             <option value="casual_dining" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "casual_dining") ? 'selected' : '' ?>>Casual Dining</option>
                            <option value="fine_dining" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "fine_dining") ? 'selected' : '' ?>>Fine Dining</option>
                            <option value="cafe" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "cafe") ? 'selected' : '' ?>>Café</option>
                            <option value="buffet" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "buffet") ? 'selected' : '' ?>>Buffet</option>
                            <option value="food_truck" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "food_truck") ? 'selected' : '' ?>>Food Truck</option>
                            <option value="bistro" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "bistro") ? 'selected' : '' ?>>Bistro</option>
                            <option value="steakhouse" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "steakhouse") ? 'selected' : '' ?>>Steakhouse</option>
                            <option value="seafood" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "seafood") ? 'selected' : '' ?>>Seafood Restaurant</option>
                            <option value="pizzeria" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "pizzeria") ? 'selected' : '' ?>>Pizzeria</option>
                            <option value="bbq" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "bbq") ? 'selected' : '' ?>>BBQ Restaurant</option>
                            <option value="vegan" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "vegan") ? 'selected' : '' ?>>Vegan/Vegetarian Restaurant</option>
                            <option value="ethnic" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "ethnic") ? 'selected' : '' ?>>Ethnic Cuisine</option>
                            <option value="diner" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "diner") ? 'selected' : '' ?>>Diner</option>
                            <option value="dessert" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "dessert") ? 'selected' : '' ?>>Dessert Shop</option>
                            <option value="custom" <?= (isset($_POST['businessType']) && $_POST['businessType'] == "custom") ? 'selected' : '' ?>>Custom</option>


                        </select>
                    
                        <input id="customBusinessType" name="customBusinessType" type="text" class="form-input" style="display: none; margin-top: 10px;" placeholder="Enter your Business Type">
                    
                        <?php if (isset($errors['businessType'])) : ?>
                            <p  style="font-size:smaller;color:red"><?= $errors['businessType'] ?></p>
                        <?php endif; ?>
                    </div>
            
                </div>
                <div class="input-container">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="form-input" autocomplete="email"  placeholder="Enter your email" value="<?= isset($_POST['email'])?$_POST['email']:'' ?>">
                    <?php if (isset($errors['email'])) : ?>
                        <p style="font-size:smaller;color:red"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>
                  <div class="input-container">
                    <label for="businessRegNo" class="form-label">Business Reg No:</label>
                    <input id="businessRegNo" name="businessRegNo" type="businessRegNo" class="form-input" value="<?= isset($_POST['businessRegNo'])?$_POST['businessRegNo']:'' ?>"  required>
                    <?php if (isset($errors['businessRegNo'])) : ?>
                        <p style="font-size:smaller;color:red"><?= $errors['businessRegNo'] ?></p>
                    <?php endif; ?>
                </div>
                
                  <div class="input-container">
                    <label for="ownerName" class="form-label">Owner Name:</label>
                    <input id="ownerName" name="ownerName" type="text" class="form-input"  value="<?= isset($_POST['ownerName'])?$_POST['ownerName']:'' ?>"  required>
                    <?php if (isset($errors['ownerName'])) : ?>
                        <p style="font-size:smaller;color:red"><?= $errors['ownerName'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="input-container">
                    <label for="emergencyContact" class="form-label">Emergency Contact:</label>
                    <input id="emergencyContact" name="emergencyContact" type="text"  value="<?= isset($_POST['emergencyContact'])?$_POST['emergencyContact']:'' ?>" class="form-input"  required>
                    <?php if (isset($errors['emergencyContact'])) : ?>
                        <p style="font-size:smaller;color:red"><?= $errors['emergencyContact'] ?></p>
                    <?php endif; ?>
                </div>
                 
                <div class="input-container">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-input"   value="<?= isset($_POST['password'])?$_POST['password']:'' ?>" autocomplete="current-password" requiredplaceholder="Enter your password">
                    <?php if (isset($errors['password'])) : ?>
                        <p style="font-size:smaller;color:red"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>
            

            <div class="form-actions">
                <button type="submit" class="register-button">Register</button>
            </div>

        
        </form>
    </div>
</main>

<script>
    function toggleCustomInput(select) {
        var customInput = document.getElementById("customBusinessType");
        if (select.value === "custom") {
            customInput.style.display = "block";
            customInput.setAttribute("required", "required");
        } else {
            customInput.style.display = "none";
            customInput.removeAttribute("required");
        }
    }
</script>


<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>
