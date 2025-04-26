<?php require(BASE_PATH . 'views/partials/user/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/styles.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/nav.php'); ?>

<main>
    <div class="register-container">
        <h1>Who you are?</h1>

        <div class="role-boxes">
            <div class="role-box">
                <a href="/register_user">
                    <h3>Traveller</h3>
                    <p>Explore new destinations with ease.</p>
                </a>
            </div>
            <div class="role-box">
                <a href="/register_hotel">
                    <h3>Hotel Owner</h3>
                    <p>Showcase your property to the world.</p>
                </a>
            </div>
            <div class="role-box">
                <a href="/register_rest">
                    <h3>Restaurant Owner</h3>
                    <p>Attract food lovers to your restaurant.</p>
                </a>
            </div>
            <div class="role-box">
                <a href="/register_rental">
                    <h3>Car Rental Provider</h3>
                    <p>Offer trusted travel solutions.</p>
                </a>
            </div>
        </div>
        <div style="text-align: center; padding: 20px; font-family: 'Arial', sans-serif; border-radius: 10px; max-width: 600px; margin: 20px auto;">
            <p style="font-size: 16px; color: #2e7d32; margin: 0 0 20px 0;">
                Already have an account?
                <a href="/login" style="color: #4caf50; text-decoration: none; font-weight: bold; transition: color 0.3s ease;">Log In</a>
            </p>
            <div style="background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                <h2 style="font-size: 24px; color: #1b5e20; margin: 0 0 15px 0; font-weight: 600;">
                    Passionate about managing local gems and enriching travel experiences?
                </h2>
                <p style="margin: 0 0 20px 0;">
                    <a href="/recruitments" style="display: inline-block; text-decoration: none; color: #ffffff; background-color: #2e7d32; border: 2px solid #2e7d32; border-radius: 8px; padding: 12px 24px; font-size: 16px; font-weight: bold; transition: background-color 0.3s ease, color 0.3s ease;">Become an Area Administrator</a>
                </p>
                <p style="font-size: 14px; color: #33691e; line-height: 1.6; margin: 0;">
                    As an Area Administrator, you’ll oversee and update details for local restaurants, attractions, and transport options in your region. You’ll also maintain the quality of reviews by moderating flagged content, fostering memorable travel experiences for all.
                </p>
            </div>
        </div>
    </div>
</main>

<?php require(BASE_PATH . 'views/partials/user/foot.php'); ?>