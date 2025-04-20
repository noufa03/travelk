<?php require(BASE_PATH . 'views/partials/user/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/script.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/styles.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/nav.php'); ?>

<main class="register-page">
    <div class="register-containerform">
        <div class="register-header">
            <h2 class="register-title">Register for a new account</h2>
        </div>

        <form method="POST" action="/register_user" class="register-form" enctype="multipart/form-data">
            <div class="form-group">
                <div class="input-container">
                    <label for="user_name" class="form-label">Username</label>
                    <input id="user_name" name="user_name" type="text" class="form-input" autocomplete="username" placeholder="Enter your username">
                    <?php if (isset($errors['user_name'])) : ?>
                        <p class="error-message"><?= $errors['user_name'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="input-container">
                    <label for="profile" class="form-label">Profile Picture</label>
                    <input type="file" name="profile" id="profile" class="form-input" accept="image/*" onchange="previewImage(this);">

                    <div id="imagePreview" style="display: none;">
                        <img id="profile-preview" src="" alt="Profile Preview">
                        <button type="button" onclick="removeImage()" class="btn btn-danger btn-sm">X</button>
                    </div>
                </div>
                <div class="input-container">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="form-input" autocomplete="email" placeholder="Enter your email">
                    <?php if (isset($errors['email'])) : ?>
                        <p class="error-message"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="input-container">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-input" autocomplete="current-password" placeholder="Enter your password">
                    <?php if (isset($errors['password'])) : ?>
                        <p class="error-message"><?= $errors['password'] ?></p>
                    <?php endif; ?>
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

<?php require(BASE_PATH . 'views/partials/user/foot.php'); ?>