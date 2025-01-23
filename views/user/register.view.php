<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>
<?php require (BASE_PATH.'views/partials/user/nav.php');?>

<main>
    <div class="register-container">
        <h1>Who you are?</h1>

        <div class="role-boxes">
            <div class="role-box">
                <a href="/register_user">
                    <h3>I am a Traveller</h3>
                    <p>Join us as a traveller.</p>
                </a>
            </div>
            <div class="role-box">
                <a href="/register_hotel">
                    <h3>I am a Hotel Owner</h3>
                    <p>Register your hotel.</p>
                </a>
            </div>
            <div class="role-box">
                <a href="/register_rest">
                    <h3>I am a Restaurant Owner</h3>
                    <p>Register your restaurant.</p>
                </a>
            </div>
            <div class="role-box">
                <a href="/register_rental">
                    <h3>I am a Driver</h3>
                    <p>Join as a driver.</p>
                </a>
            </div>
        </div>

        <p>Already have an account? <a href="/login">Log In</a></p>
    </div>
</main>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>

