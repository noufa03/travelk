<?php require(BASE_PATH . 'views/partials/user/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/styles.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/nav.php'); ?>

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
            </div><br>

            <div style="display: flex; flex-direction: column; align-items: center; gap: 15px; padding: 20px; background: #fff; border-radius: 12px; max-width: 400px; margin: 20px auto; font-family: Arial, sans-serif;">
                <p style="margin: 0; font-size: 16px; color: #333; text-align: center;">
                    Don't have an account?
                    <a href="/register" style="text-decoration: none; color: #28a745; font-weight: 600; padding: 5px 10px; border-radius: 6px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#28a745'; this.style.color='#fff'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 2px 8px rgba(40, 167, 69, 0.3)';" onmouseout="this.style.backgroundColor=''; this.style.color='#28a745'; this.style.transform=''; this.style.boxShadow='';">Sign up</a>
                </p>
                <p style="margin: 0; font-size: 16px; color: #333; text-align: center;">
                    <a href="/forget_password" style="text-decoration: none; color: #28a745; font-weight: 600; padding: 5px 10px; border-radius: 6px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#28a745'; this.style.color='#fff'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 2px 8px rgba(40, 167, 69, 0.3)';" onmouseout="this.style.backgroundColor=''; this.style.color='#28a745'; this.style.transform=''; this.style.boxShadow='';">Forgot password?</a>
                </p>
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