<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/script.php'); ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8fff9;
        color: #2c2c2c;
        overflow-x: hidden;
    }

    /* Header */
    .header {
        position: relative;
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: #ffffff;
    }

    .left-logo-traveLK {
        position: absolute;
        top: 20px;
        left: 20px;
        width: 200px;
        max-width: 40vw;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .left-logo-traveLK:hover {
        transform: scale(1.05);
    }

    .header-content {
        max-width: 700px;
        padding: 20px;
    }

    .header-content h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .header-content p {
        font-size: 18px;
        font-weight: 300;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .cta-button {
        background-color: #76c07d;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 25px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .cta-button:hover {
        background-color: #5EBC67;
        transform: scale(1.05);
    }

    /* Features Section */
    .features {
        padding: 60px 20px;
        background-color: #ffffff;
        text-align: center;
    }

    .features h2 {
        font-size: 36px;
        font-weight: 600;
        color: #2c2c2c;
        margin-bottom: 40px;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .feature-card {
        background: linear-gradient(135deg, #e8f7ea, #f0fff2);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(118, 192, 125, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 18px rgba(118, 192, 125, 0.15);
    }

    .feature-card i {
        font-size: 40px;
        color: #76c07d;
        margin-bottom: 15px;
    }

    .feature-card h3 {
        font-size: 22px;
        font-weight: 500;
        color: #2c2c2c;
        margin-bottom: 10px;
    }

    .feature-card p {
        font-size: 15px;
        color: #5a5a5a;
        line-height: 1.5;
    }

    /* Footer */
    .footer {
        background-color: #2c2c2c;
        color: #ffffff;
        padding: 40px 20px;
        text-align: center;
    }

    .footer p {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .footer a {
        color: #76c07d;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer a:hover {
        color: #5EBC67;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .header-content h1 {
            font-size: 36px;
        }

        .header-content p {
            font-size: 16px;
        }

        .left-logo-traveLK {
            width: 120px;
            top: 10px;
        }

        .features h2 {
            font-size: 28px;
        }
    }

    @media (max-width: 480px) {
        .header-content h1 {
            font-size: 28px;
        }

        .header-content p {
            font-size: 14px;
        }

        .left-logo-traveLK {
            width: 100px;
            top: 8px;
        }

        .cta-button {
            padding: 10px 20px;
            font-size: 14px;
        }
    }

    .start-planning-btn {
        padding: 15px 25px;
        font-weight: bold;
        border: 2px solid black;
        background-color: white;
        border-radius: 25px;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .start-planning-btn:hover {
        background-color: rgb(28, 255, 160);
        transform: scale(1.05);
    }

    .arrow-icon {
        margin-left: 10px;
        width: 20px;
        transition: transform 0.3s ease;
    }

    .start-planning-btn:hover .arrow-icon {
        transform: translateX(5px);
    }

    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        animation: fadeIn 0.3s ease-in-out;
    }

    .popup-overlay.active {
        display: flex;
    }

    .popup-content {
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        text-align: center;
        width: 300px;
        position: relative;
        box-shadow: 0 4px 12px rgba(118, 192, 125, 0.2);
    }

    .popup-content h3 {
        font-size: 22px;
        font-weight: 600;
        color: #2c2c2c;
        margin-bottom: 20px;
    }

    .popup-buttons button {
        margin: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        background-color: #76c07d;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .popup-buttons button:hover {
        background-color: #5EBC67;
        transform: scale(1.05);
    }

    .popup-close {
        background: none;
        border: none;
        font-size: 18px;
        position: absolute;
        top: 10px;
        right: 15px;
        cursor: pointer;
        color: #2c2c2c;
        transition: color 0.3s ease;
    }

    .popup-close:hover {
        color: #76c07d;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>

<!-- Header -->
<header class="header">
    <?php require (BASE_PATH.'views/partials/user/left-logo.php'); ?>
    <div class="header-content">
        <h1>Discover Sri Lanka with traveLK</h1>
        <p>Plan your dream trip with ease. Explore stunning destinations, book stays, and create unforgettable memories.</p>
        <div class="center-container">
            <div style="text-align:center; margin-bottom: 20px;">
                <p>Start planning your trip or continue with your existing plan</p>
            </div>
            <div style="display: flex; justify-content: center; gap: 20px;">
                <?php if(!isset($_SESSION['user']['email'])): ?>
                    <button type="button" class="start-planning-btn" onclick="showAuthPopup()">
                        I don't have a plan
                        <img src="assets/Arrow 1.png" alt="arrow icon" class="arrow-icon">
                    </button>
                    <button type="button" class="start-planning-btn" onclick="showAuthPopup()">
                        I have a plan
                        <img src="assets/Arrow 1.png" alt="arrow icon" class="arrow-icon">
                    </button>
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
            </div>
        </div><br><br>

        <div id="auth-popup" class="popup-overlay">
            <div class="popup-content">
                <h3>Do you already have an account?</h3>
                <div class="popup-buttons">
                    <button onclick="redirectToLogin()">Yes, Log in</button>
                    <button onclick="redirectToRegister()">No, Register</button>
                </div>
                <button class="popup-close" onclick="closePopup()">X</button>
            </div>
        </div>
    </div>
</header>

<!-- Features Section -->
<section class="features">
    <h2>Why Choose traveLK?</h2>
    <div class="features-grid">
        <div class="feature-card">
            <i class='bx bx-map'></i>
            <h3>Curated Destinations</h3>
            <p>Handpicked places to explore, from beaches to ancient ruins.</p>
        </div>
        <div class="feature-card">
            <i class='bx bxs-hotel'></i>
            <h3>Perfect Stays</h3>
            <p>Find accommodations that match your style and budget.</p>
        </div>
        <div class="feature-card">
            <i class='bx bx-restaurant'></i>
            <h3>Local Dining</h3>
            <p>Discover the best restaurants for authentic Sri Lankan flavors.</p>
        </div>
        <div class="feature-card">
            <i class='bx bx-wallet'></i>
            <h3>Budget Planning</h3>
            <p>Plan your trip within your budget with our smart tools.</p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <p>© 2025 traveLK. All rights reserved.</p>
    <p><a href="/privacy">Privacy Policy</a> | <a href="/terms">Terms of Service</a></p>
</footer>

<script>
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Add subtle animation to CTA button on hover
    const ctaButton = document.querySelector('.cta-button');
    if (ctaButton) {
        ctaButton.addEventListener('mouseover', () => {
            ctaButton.style.transform = 'scale(1.1)';
        });
        ctaButton.addEventListener('mouseout', () => {
            ctaButton.style.transform = 'scale(1)';
        });
    }

    // Popup functionality
    function showAuthPopup() {
        document.getElementById('auth-popup').classList.add('active');
    }

    function closePopup() {
        document.getElementById('auth-popup').classList.remove('active');
    }

    function redirectToLogin() {
        window.location.href = '/login';
    }

    function redirectToRegister() {
        window.location.href = '/register_user';
    }

    window.onclick = function(event) {
        const popup = document.getElementById('auth-popup');
        if (event.target === popup) {
            closePopup();
        }
    };
</script>

<?php require base_path('views/partials/user/foot.php'); ?>