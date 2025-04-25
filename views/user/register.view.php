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
        <br/>
        <div class="admin-container">
            <h2>Interested in managing local spots and helping improve the travel experience for others?</h2>
            <p><a href="/recruitments" style="text-decoration: none; color: #ffffff; border: 1px solid #ffffff; border-radius: 5px; padding: 10px 20px;">Become an Area Administrator</a> and take charge of places in your region!</p>
            <p style="font-size: 14px;">Being an Area Administrator means you get to update information about places in your area ;<br/> like adding or editing details for restaurants, attractions, or transport options. You also help keep reviews clean and useful by managing flagged content.</p>
        </div>
        
    </div>
</main>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>

