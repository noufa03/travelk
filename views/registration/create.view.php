<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php'); ?>
<?php require (BASE_PATH.'views/partials/user/nav.php'); ?>

<main class="register-page">
    <div class="register-containerform">
        <div class="register-header">
            <h2 class="register-title">Register for a new account</h2>
        </div>

        <form action="/register_user" method="POST" class="register-form">
            <div class="form-group">
                <div class="input-container">
                    <label for="user_name" class="form-label">Username</label>
                    <input id="user_name" name="user_name" type="text" class="form-input" autocomplete="username" required placeholder="Enter your username">
                </div>
                <div class="input-container">
                    <label for="profile" class="form-label">Profile</label>
                    <input id="profile" name="profile" type="text" class="form-input" autocomplete="profile" required placeholder="Enter your profile">
                </div>
                <div class="input-container">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="form-input" autocomplete="email" required placeholder="Enter your email">
                </div>
                <div class="input-container">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-input" autocomplete="current-password" required placeholder="Enter your password">
                </div>
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

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>
