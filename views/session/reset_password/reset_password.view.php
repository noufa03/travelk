<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php'); ?>
<?php require (BASE_PATH.'views/partials/user/nav.php'); ?>

<main class="login-page">
    <div class="login-container">
        <div class="login-header">
            <h2 class="login-title">Reset Password!</h2>
        </div>

    <form  method="post">
                        <input type="hidden" name="email" value="<?= $email?>">
                        <input type="hidden" name="token" value="<?= $token?>">

                      <div class="input-container">
                            <label class="form-label">
                                Password
                                <input type="password" name="password"  class="form-input" required value="<?= old('password') ?? '' ?>">
                                <?php if (isset($errors['password'])): ?>
                                    <span style="color: #e11d48; font-size: 0.75rem;"><?= $errors['password'] ?></span>
                                <?php endif ?>
                            </label>
                        </div>
                    <div class="input-container">
                            <label class="form-label">
                                Confirm Password
                                <input type="password" name="confirm_password" class="form-input" required value="<?= old('confirm_password') ?? '' ?>">
                                <?php if (isset($errors['confirm_password'])): ?>
                                    <span style="color: #e11d48; font-size: 0.75rem;"><?= $errors['confirm_password'] ?></span>
                                <?php endif ?>
                            </label>
                        </div>

                        <button type="submit" class="login-button" style="width: 100%; ">
                            Reset
                        </button>
              </form>
                    
   </div>
</main>