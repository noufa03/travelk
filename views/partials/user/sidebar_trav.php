<?php require (BASE_PATH.'views/partials/user/styles-sidebar.php');?>

<!-- Sidebar -->
<div class="sidebar">
    <ul class="sidebar-menu nav-list">
        <li class="sidebar-item-logo">
            <img src="assets/logo.png" alt="traveLK logo" class="logo-userprofile">
            <button class="toggle-btn" onclick="toggleSidebar()">
                <i class='bx bx-chevrons-right'></i>
            </button>
            <!-- <span class="logo_name">traveLK</span> -->
        </li>
        <div class="sidebar-item-container">
        <!-- Profile -->
        <li class="sidebar-item <?= urlIs('/profile') ? 'active' : '' ?>">
            <a href="/profile">
                <i class='bx bx-user'></i>
                <span class="links_name">My Profile</span>
            </a>
        </li>

        <!-- My Trips (Dropdown) -->
        <li class="sidebar-item <?= urlIs('/upcoming-trips') ? 'active' : '' ?>">
            <button type="button" class="dropdown-toggle" onclick="toggleDropdown(this)">
                <i class='bx bx-briefcase-alt-2'></i>
                <span class="links_name">My Trips</span>
                <i id="dropdown-icon" class='bx bx-chevron-down dropdown-icon'></i>
            </button>
            <ul class="dropdown-menu">
                <div class="dropdown-menu-container">   
                    <li><a href="/upcoming-trips">Upcoming Trips</a></li>
                        <!-- <i class='bx bx-calendar'></i>Upcoming Trips</a></li>  -->
                    <li><a href="/past-trips">Past Trips</a></li>
                        <!-- <i class='bx bx-history'></i> Past Trips</a></li> -->
                    <li><a href="/saved-itineraries">Saved Itineraries</a></li>
                        <!-- <i class='bx bx-save'></i> Saved Itineraries</a></li> -->
                </div>
            </ul>
        </li>

        <!-- Preferences -->
        <li class="sidebar-item <?= urlIs('/preferences') ? 'active' : '' ?>">
            <a href="/preferences">
                <i class='bx bx-map-alt'></i>
                <span class="links_name">Preferences</span>
            </a>
        </li>

        <!-- Wishlist -->
        <li class="sidebar-item <?= urlIs('/wishlist') ? 'active' : '' ?>">
            <a href="/wishlist">
                <i class='bx bx-heart'></i>
                <span class="links_name">Wishlist</span>
            </a>
        </li>

        <!-- Travel Budget -->
        <li class="sidebar-item <?= urlIs('/budget-planner') ? 'active' : '' ?>">
            <a href="/budget-planner">
                <i class='bx bx-wallet'></i>
                <span class="links_name">Budget Planner</span>
            </a>
        </li>

        <!-- Settings -->
        <li class="sidebar-item <?= urlIs('/settings') ? 'active' : '' ?>">
            <a href="/settings">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Settings</span>
            </a>
        </li>

        <!-- Logout -->
        <li class="sidebar-item">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out-circle' ></i>
                <span class="links_name">Logout</span>
            </a>
        </li>
        </div>
    </ul>
</div>

<!-- Hidden logout form -->
<form id="logout-form" action="/session" method="POST" style="display: none;">
    <input type="hidden" name="_method" value="DELETE"/>
</form>
