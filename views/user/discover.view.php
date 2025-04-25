<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>
<?php require (BASE_PATH.'views/partials/user/nav.php');?>
<?php require (BASE_PATH.'views/partials/user/script.php');?>

<div class="center-container">
    <div style="text-align:center; margin-bottom: 20px;">
        <h2>Welcome to traveLK</h2>
        <p>Start planning your trip or continue with your existing plan</p>
    </div>
    <?php if(!isset($_SESSION['user']['email'])): ?>
    <!-- <a href="#" style="text-decoration: none;"> -->
        <button type="button" class="start-planning-btn" onclick="showAuthPopup()">
            I don't have a plan
            <img src="assets/Arrow 1.png" alt="arrow icon" class="arrow-icon">
        </button>
        <button type="button" class="start-planning-btn" onclick="showAuthPopup()">
            I have a plan
            <img src="assets/Arrow 1.png" alt="arrow icon" class="arrow-icon">
        </button>
    <!-- </a> -->
    <?php else: ?>
    <a href="/planning" style="text-decoration: none;">     
        <button type="button" class="start-planning-btn">
            I don't have a plan
            <img src="assets/Arrow 1.png" alt="arrow icon" class="arrow-icon">
        </button>
    </a>
    <a href="/planning/place" style="text-decoration: none;">
        <button type="button" class="start-planning-btn">
            I have a plan
            <img src="assets/Arrow 1.png" alt="arrow icon" class="arrow-icon">
        </button>
    </a>
    <?php endif; ?>
</div><br><br>

<div id="auth-popup" class="popup-overlay" style="display: none;">
    <div class="popup-content">
        <h3>Do you already have an account?</h3>
        <div class="popup-buttons">
            <button onclick="redirectToLogin()">Yes, Log in</button>
            <button onclick="redirectToRegister()">No, Register</button>
        </div>
        <button class="popup-close" onclick="closePopup()">X</button>
    </div>
</div>




<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>
