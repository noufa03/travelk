<?php require(BASE_PATH . 'views/partials/user/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/styles.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/nav.php'); ?>

<main class="register-page">
    <div class="register-containerform">
        <div class="register-header">
            <h2 class="register-title">Register for a New Account</h2>
        </div>
        <form class="register-form" action="/register_hotel" method="POST">


            <!-- Email -->
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input class="form-input" id="email" name="email" type="email" value="<?= old('email') ?>" placeholder="Email address">
                <?php if (isset($errors['email'])) : ?>
                    <p class="error-item" style="color: red;"><?= $errors['email'] ?></p>
                <?php endif; ?>
            </div>


            <!-- Business Registration Number -->
            <div class="form-group">
                <label class="form-label" for="business_reg_num">Business Registration Number</label>
                <input class="form-input" id="business_reg_num" name="business_reg_num" type="text" value="<?= old('business_reg_num') ?>" placeholder="Business Registration Number">
                <?php if (isset($errors['business_reg_num'])) : ?>
                    <p class="error-item" style="color: red;"><?= $errors['business_reg_num'] ?></p>
                <?php endif; ?>
            </div>



            <!-- Owner Name -->
            <div class="form-group">
                <label class="form-label" for="owner_name">Owner Name</label>
                <input class="form-input" id="owner_name" name="owner_name" type="text" value="<?= old('owner_name') ?>" placeholder="Owner Name">
                <?php if (isset($errors['owner_name'])) : ?>
                    <p class="error-item" style="color: red;"><?= $errors['owner_name'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Owner Contact -->
            <div class="form-group">
                <label class="form-label" for="owner_contact">Owner Contact</label>
                <input class="form-input" id="owner_contact" name="owner_contact" type="tel" value="<?= old('owner_contact') ?>" placeholder="Owner Contact">
                <?php if (isset($errors['owner_contact'])) : ?>
                    <p class="error-item" style="color: red;"><?= $errors['owner_contact'] ?></p>
                <?php endif; ?>
            </div>




            <!-- Password -->
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input class="form-input" id="password" name="password" type="password" autocomplete="current-password" value="<?= old('password') ?>" placeholder="Password">
                <?php if (isset($errors['password'])) : ?>
                    <p class="error-item" style="color: red;"><?= $errors['password'] ?></p>
                <?php endif; ?>
            </div>



            <!-- Submit Button -->
            <div class="form-actions">
                <button class="register-button" type="submit">Register</button>
            </div>


        </form>
    </div>
</main>

<?php require(BASE_PATH . 'views/partials/user/foot.php'); ?>