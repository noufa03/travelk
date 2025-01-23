<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php'); ?>
<?php require (BASE_PATH.'views/partials/user/nav.php'); ?>

<main class="login-page">
    <div class="login-container">
        <div class="login-header">
            <h2 class="login-title">Log In!</h2>
        </div>

        <form action="/session" method="POST" class="login-form">
            <div class="form-group">
                <div class="input-container">
                    <label for="email" class="form-label">Email address</label>
                    <input id="email"
                           name="email"
                           type="email"
                           autocomplete="email"
                           required
                           placeholder="Email address"
                           class="form-input"
                           value="<?= old('email') ?>">
                </div>

                <div class="input-container">
                    <label for="password" class="form-label">Password</label>
                    <input id="password"
                           name="password"
                           type="password"
                           autocomplete="current-password"
                           required
                           placeholder="Password"
                           class="form-input">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="login-button">Log In</button>
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
