<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/script.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php'); ?>
<?php require (BASE_PATH.'views/partials/user/nav.php'); ?>

<main class="register-page">
    <div class="register-containerform">
        <div class="register-header">
            <h2 class="register-title">Register for a new account</h2>
        </div>

        <form method="POST" action="/register_rental" class="register-form" enctype="multipart/form-data">
            <div class="form-group">
                <div class="input-container">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input id="first_name" name="first_name" type="text" class="form-input" value="<?= $_POST['first_name'] ?? '' ?>" "  >
                    <?php if (isset($errors['first_name'])) : ?>
                        <p class="error-message" style="color: red;"><?= $errors['first_name'] ?></p>
                    <?php endif; ?>
                </div>
                 <div class="input-container">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input id="last_name" name="last_name" type="text" class="form-input"  value="<?= $_POST['last_name'] ?? '' ?>" >
                    <?php if (isset($errors['last_name'])) : ?>
                        <p class="error-message" style="color: red;"><?= $errors['last_name'] ?></p>
                    <?php endif; ?>
                </div>
                
            
                </div>
                <div class="input-container">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="form-input"  value="<?= $_POST['email'] ?? '' ?>"  autocomplete="email" required placeholder="Enter your email">
                    <?php if (isset($errors['email'])) : ?>
                        <p class="error-message" style="color: red;"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>
                  <div class="input-container">
                    <label for="phone_number" class="form-label">Phone number:</label>
                    <input id="phone_number" name="phone_number" type="text" class="form-input" value="<?= $_POST['phone_number'] ?? '' ?>" required >
                    <?php if (isset($errors['phone_number'])) : ?>
                        <p class="error-message" style="color: red;"><?= $errors['phone_number'] ?></p>
                    <?php endif; ?>
                </div>
                
                  <div class="input-container">
                    <label for="address" class="form-label">Address:</label>
                    <input id="address" name="address" type="text" class="form-input" value="<?= $_POST['address'] ?? '' ?>" required >
                    <?php if (isset($errors['address'])) : ?>
                        <p class="error-message"   style="color: red;"><?= $errors['address'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="input-container">
                    <label for="date_of_birth" class="form-label">DOB:</label>
                    <input id="date_of_birth" name="date_of_birth" type="date" class="form-input" value="<?= $_POST['date_of_birth'] ?? '' ?>" required >
                    <?php if (isset($errors['date_of_birth'])) : ?>
                        <p class="error-message" style="color: red;"> <?= $errors['date_of_birth'] ?></p>
                    <?php endif; ?>
                </div>
                     <div class="input-container">
                    <label for="gender" class="form-label">Gender:</label>
                  <select id="gender" name="gender" required
                            class="form-input" >
                            <option value="" disabled <?= empty($_POST['gender'])? 'selected':'' ?>>Select gender</option>
                            
                            <option value="Male" <?= (isset($_POST['gender']) && $_POST['gender']=='Male')? 'selected':'' ?> >Male</option>
                            <option value="Female"  <?= (isset($_POST['gender']) && $_POST['gender']=='Female')? 'selected':'' ?> >Female</option>
                            <option value="Other"  <?= (isset($_POST['gender']) && $_POST['gender']=='Other')? 'selected':'' ?> >Other</option>
                        </select>
                    <?php if (isset($errors['gender'])) : ?>
                        <p class="error-message" style="color: red;"> <?= $errors['gender'] ?></p>
                    <?php endif; ?>
                </div>
                     <div class="input-container">
                    <label for="license_number" class="form-label">License Number:</label>
                    <input id="license_number" name="license_number" type="text" class="form-input"  value="<?= $_POST['license_number']?? ''?>" required >
                    <?php if (isset($errors['license_number'])) : ?>
                        <p class="error-message" style="color: red;"> <?= $errors['license_number'] ?></p>
                    <?php endif; ?>
                </div>
                  <div class="input-container">
                    <label for="license_issue_date" class="form-label">License Issue date:</label>
                    <input id="license_issue_date" name="license_issue_date" type="date" class="form-input" value="<?= $_POST['license_issue_date'] ?? '' ?>"  required >
                    <?php if (isset($errors['license_issue_date'])) : ?>
                        <p class="error-message" style="color: red;"> <?= $errors['license_issue_date'] ?></p>
                    <?php endif; ?>
                </div>
                  <div class="input-container">
                    <label for="license_expiry_date" class="form-label">License expiry date:</label>
                    <input id="license_expiry_date" name="license_expiry_date" type="date" class="form-input" value="<?= $_POST['license_expiry_date'] ?? '' ?>" required >
                    <?php if (isset($errors['license_expiry_date'])) : ?>
                        <p class="error-message" style="color: red;"> <?= $errors['license_expiry_date'] ?></p>
                    <?php endif; ?>
                </div>
                  <div class="input-container">
                    <label for="membership_status" class="form-label">Membership status:</label>
                  <select id="membership_status" name="membership_status" required
                            class="form-input" >
                            <option value="" disabled <?=(empty($_POST['membership_status']))?'selected':"" ?>Select status></option>
                            <option value="Active" <?=(isset($_POST['membership_status']) && $_POST['membership_status']=='Active' )?'selected':'' ?>>Active</option>
                         <option value="Inactive"  <?=(isset($_POST['membership_status']) && $_POST['membership_status']=='Inactive' )?'selected':'' ?>>Inactive</option>
                            
                        </select>
                    <?php if (isset($errors['membership_status'])) : ?>
                        <p class="error-message" style="color: red;"> <?= $errors['membership_status'] ?></p>
                    <?php endif; ?>
                </div>
                 
                <div class="input-container">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-input" autocomplete="current-password" value="<?= $_POST['password'] ?? '' ?>"  required placeholder="Enter your password">
                    <?php if (isset($errors['password'])) : ?>
                        <p class="error-message" style="color: red;"> <?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>
            

            <div class="form-actions">
                <button type="submit" class="register-button">Register</button>
            </div>

       
    </div>
</main>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>
