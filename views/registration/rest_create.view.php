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
                        <select id="businessType" name="businessType" class="form-input" required onchange="toggleCustomInput(this)">
                            <option value="" disabled selected>Select your Business Type</option>
                            <option value="fast_food">Fast Food</option>
                            <option value="casual_dining">Casual Dining</option>
                            <option value="fine_dining">Fine Dining</option>
                            <option value="cafe">Café</option>
                            <option value="buffet">Buffet</option>
                            <option value="food_truck">Food Truck</option>
                            <option value="bistro">Bistro</option>
                            <option value="steakhouse">Steakhouse</option>
                            <option value="seafood">Seafood Restaurant</option>
                            <option value="pizzeria">Pizzeria</option>
                            <option value="bbq">BBQ Restaurant</option>
                            <option value="vegan">Vegan/Vegetarian Restaurant</option>
                            <option value="ethnic">Ethnic Cuisine</option>
                            <option value="diner">Diner</option>
                            <option value="dessert">Dessert Shop</option>
                            <option value="custom">Custom</option>
                        </select>
                    
                        <input id="customBusinessType" name="customBusinessType" type="text" class="form-input" style="display: none; margin-top: 10px;" placeholder="Enter your Business Type">
                    
                        <?php if (isset($errors['businessType'])) : ?>
                            <p class="error-message"><?= $errors['businessType'] ?></p>
                        <?php endif; ?>
                    </div>
            
                </div>
                <div class="input-container">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="form-input" autocomplete="email" required placeholder="Enter your email">
                    <?php if (isset($errors['email'])) : ?>
                        <p class="error-message"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>
                  <div class="input-container">
                    <label for="businessRegNo" class="form-label">Business Reg No:</label>
                    <input id="businessRegNo" name="businessRegNo" type="businessRegNo" class="form-input"  required >
                    <?php if (isset($errors['businessRegNo'])) : ?>
                        <p class="error-message"><?= $errors['businessRegNo'] ?></p>
                    <?php endif; ?>
                </div>
                
                  <div class="input-container">
                    <label for="ownerName" class="form-label">Owner Name:</label>
                    <input id="ownerName" name="ownerName" type="text" class="form-input"  required >
                    <?php if (isset($errors['ownerName'])) : ?>
                        <p class="error-message"><?= $errors['ownerName'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="input-container">
                    <label for="emergencyContact" class="form-label">Emergency Contact:</label>
                    <input id="emergencyContact" name="emergencyContact" type="text" class="form-input"  required >
                    <?php if (isset($errors['emergencyContact'])) : ?>
                        <p class="error-message"><?= $errors['emergencyContact'] ?></p>
                    <?php endif; ?>
                </div>
                 
                <div class="input-container">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-input" autocomplete="current-password" required placeholder="Enter your password">
                    <?php if (isset($errors['password'])) : ?>
                        <p class="error-message"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>
            

            <div class="form-actions">
                <button type="submit" class="register-button">Register</button>
            </div>

            <ul class="error-messages">
                <?php if (isset($errors['email'])) : ?>
                    <li class="error-item"><?= $errors['email'] ?></li>
                <?php endif; ?>

                <?php if (isset($errors['password'])) : ?>
                    <li class="error-item"><?= $errors['password'] ?></li>
                <?php endif; ?>
            </ul>
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
