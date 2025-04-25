<header>
    <div class="logo-and-navigation">
        <a href="/">
            <img src="assets/logo.png" alt="traveLK logo" class="logo">
     
        <!-- Hidden form for logout -->
        <form id="logout-form" method="POST" action="/session" style="display: none;">
            <input type="hidden" name="_method" value="DELETE"/>
        </form>
        <nav>
            <a href="/" class="<?= urlIs('/') ? 'text-color-active' : 'text-color-default'; ?>">Home</a>
            <a href="/trip-planner" class="<?= urlIs('/trip-planner') ? 'text-color-active' : 'text-color-default'; ?>">Trip Planner</a>
            <?php if($_SESSION['user'] ?? false): ?>
 
                <?php if(isset($_SESSION['user']) && isset($_SESSION['user']['role'])): ?>
                    <?php if($_SESSION['user']['role']=='traveler'): ?>
                        <a href="/profile" class="<?= urlIs('/profile') ? 'text-color-active' : 'text-color-default'; ?>"><i class='bx bxs-user-circle profile-icon' style="font-size: 40px;"></i></a>
                    <?php endif; ?>
                
                    <?php if($_SESSION['user']['role']=='restaurant'): ?>
                        <a href="/dashboard_rest" class="<?= urlIs('/dashboard') ? 'text-color-active' : 'text-color-default'; ?>">Dashboard</a>
                       <form method="POST" action="/session">
                                 <input type="hidden" name="_method" value="DELETE"/>
                                <button> Log Out</button>
                        </form>
                        
                    <?php endif; ?>
                    <?php if($_SESSION['user']['role']=='accommodation'): ?>
                        <a href="/dashboard_hotel" class="<?= urlIs('/dashboard') ? 'text-color-active' : 'text-color-default'; ?>">Dashboard</a>
                        <form method="POST" action="/session">
                                 <input type="hidden" name="_method" value="DELETE"/>
                                <button> Log Out</button>
                        </form> 
                        
                    <?php endif; ?>
                    <?php if($_SESSION['user']['role']=='admin'): ?>
                        <a href="/dashboard_admin" class="<?= urlIs('/dashboard') ? 'text-color-active' : 'text-color-default'; ?>">Dashboard</a>
                           <form method="POST" action="/session">
                                 <input type="hidden" name="_method" value="DELETE"/>
                                <button> Log Out</button>
                        </form>
                        
                    <?php endif; ?>
                    <?php if($_SESSION['user']['role']=='driver'): ?>
                        <a href="/dashboard_rental" class="<?= urlIs('/dashboard') ? 'text-color-active' : 'text-color-default'; ?>">Dashboard</a>
                     <form method="POST" action="/session">
                                 <input type="hidden" name="_method" value="DELETE"/>
                                <button> Log Out</button>
                        </form>
                        
                    <?php endif; ?>
                <?php endif; ?>

            <?php else: ?>
                <a href="/register" class="<?= urlIs('/register') ? 'text-color-active' : 'text-color-default'; ?>">Sign Up</a>
                <a href="/login" class="login-logout">Log in</a>
            <?php endif; ?>
        </nav>
    </div>
</header>