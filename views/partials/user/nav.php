<header>
    <div class="logo-and-navigation">
        <a href="/">
            <img src="assets/logo.png" alt="traveLK logo" class="logo">
        </a>
        <form method="post" action="/login" id="logout-form">
            <input type="hidden" name="_method" value="DELETE">
        </form>
        <nav>
            <a href="/" class="<?= urlIs('/') ? 'text-color-active' : 'text-color-default'; ?>">Home</a>
            <a href="/discover" class="<?= urlIs('/discover') ? 'text-color-active' : 'text-color-default'; ?>">Discover</a>
            <a href="/about" class="<?= urlIs('/about') ? 'text-color-active' : 'text-color-default'; ?>">About Us</a>
            <?php if($_SESSION['user'] ?? false): ?>
                <a href="/profile" class="<?= urlIs('/profile') ? 'text-color-active' : 'text-color-default'; ?>">Profile</a>
                <a href="#" class="login-logout" onclick="document.getElementById('logout-form').submit(); return false;">Log out</a>
            <?php else: ?>
                <a href="/register" class="<?= urlIs('/register') ? 'text-color-active' : 'text-color-default'; ?>">Sign Up</a>
                <a href="/login" class="login-logout">Log in</a>
            <?php endif; ?>
        </nav>
    </div>
</header>