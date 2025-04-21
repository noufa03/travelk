<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php'); ?>

<?php require (BASE_PATH.'views/partials/user/nav.php'); ?>

<main class="login-page">
    <div class="login-container">
        <div class="login-header">
            <h2 class="login-title">Reset Password!</h2>
        </div>
<form  method="post">
                        
                         <div class="input-container">
                            <label  for="email" class="form-label">
                                Email
                                <input type="email" class="form-input" name="email" placeholder="name@company.com" required value="<?= old('email') ?? '' ?>">
                                <?php if (isset($errors['email'])): ?>
                                    <span style="color: #e11d48; font-size: 0.75rem;"><?= $errors['email'] ?></span>
                                <?php endif ?>
                            </label>
                        </div>

                        <button type="submit" class="login-button" style="width: 100%; ">
                            Reset
                        </button>
  </form>
  
   </div>
</main>