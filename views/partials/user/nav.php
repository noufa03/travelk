<header>
    <div class="logo-and-navigation">
        <a href="/">
            <img src="assets/logo.png" alt="traveLK logo" class="logo">
        </a>
        <!-- Hidden form for logout -->
        <form id="logout-form" method="POST" action="/session" style="display: none;">
            <input type="hidden" name="_method" value="DELETE"/>
        </form>
        <nav>
            <a href="/" class="<?= urlIs('/') ? 'text-color-active' : 'text-color-default'; ?>">Home</a>
            <a href="/discover" class="<?= urlIs('/discover') ? 'text-color-active' : 'text-color-default'; ?>">Discover</a>
            <?php if($_SESSION['user'] ?? false): ?>
                <a href="/profile" class="<?= urlIs('/profile') ? 'text-color-active' : 'text-color-default'; ?>"><i class='bx bxs-user-circle profile-icon' style="font-size: 40px;"></i></a>
                <!-- <a href="#" class="login-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a> -->
            <?php else: ?>
                <a href="/register" class="<?= urlIs('/register') ? 'text-color-active' : 'text-color-default'; ?>">Sign Up</a>
                <a href="/login" class="login-logout">Log in</a>
            <?php endif; ?>
        </nav>
    </div>
</header>