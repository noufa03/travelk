<?php require(BASE_PATH . 'views/partials/user/styles-sidebar.php'); ?>


<nav id="sidebar" style="display: flex;flex-direction:column;justify-content:space-between">
    <ul>
        <li>
            <p class="logo"><img src="/assets/logo.png" height="24px" /></p>
            <button onclick=toggleSidebar() id="toggle-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                    <path d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z" />
                </svg>
            </button>
        </li>
        <li>
            <a href="/profile"
                class="<?= urlIs('/profile') ? 'active' : ''; ?>">
                <i class='bx bx-user'></i>
                <span>My Profile</span>
            </a>
        </li>
        <li>
            <button onclick=toggleSubMenu(this) class="dropdown-btn">
                <i class='bx bx-briefcase-alt-2'></i>
                <span>My Trips</span>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                </svg>
            </button>
            <ul class="sub-menu">
                <div>
                    <li><a href="/upcoming-trips" class="<?= urlIs('/upcoming-trips') ? 'active' : ''; ?>">Upcoming Trips</a></li>
                    <li><a href="/past-trips" class="<?= urlIs('/past-trips') ? 'active' : ''; ?>">Past Trips</a></li>
                    <!-- <li><a href="/saved-itineraries" class="<?= urlIs('/saved-itineraries') ? 'active' : ''; ?>">Saved Itineraries</a></li>
                     <li><a href="/book/rental/details" class="<?= urlIs('/book/rental/details') ? 'active' : ''; ?>">My Bookings</a></li> -->
                </div>
            </ul>
        </li>
        
        <li>
            <a href="/wishlist"
                class="<?= urlIs('/wishlist') ? 'active' : ''; ?>">
                <i class='bx bx-heart'></i>
                <span>Wishlist</span>
            </a>
        </li>
        <li>
            <a href="/review"
                class="<?= urlIs('/re') ? 'active' : ''; ?>">
                <i class='bx bx-wallet'></i>
                <span>Reviews</span>
            </a>
        </li>

        <li>
            <button onclick=toggleSubMenu(this) class="dropdown-btn">
                <i class='bx bx-cog'></i>
                <span>General</span>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                </svg>
            </button>
            <ul class="sub-menu">
                <div>
                    <li> <a href="/report-issues" class="<?= urlIs('/report-issues') ? 'active' : ''; ?>"> Report Issues</a> </li>
                    <li>
                        <form id="logout-form" action="/session" method="POST">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="dropdown-btn" style="padding-left: 2em;">Logout</button>
                        </form>
                    </li>

                </div>
            </ul>
        </li>
    </ul>
    <ul>
        <li>
            <div id=copyright>
                <p style=" white-space: pre-line;margin-bottom:1rem;font-size:smaller">© 2025 traveLK. All rights reserved. </p>
            </div>
        </li>
    </ul>
</nav>


<script>
    const toggleButton = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');
    const copyright = document.querySelector('#copyright');




    function toggleSidebar() {
        sidebar.classList.toggle('close')
        toggleButton.classList.toggle('rotate')

        if (copyright.style.display === "none") {
            copyright.style.display = "block";
        } else {
            copyright.style.display = "none";
        }

        CloseAllSubMenus()


    }


    function toggleSubMenu(button) {

        if (!button.nextElementSibling.classList.contains('show')) {
            closeAllSubMenus()
        }


        button.nextElementSibling.classList.toggle('show')
        button.classList.toggle('rotate')

        if (sidebar.classList.contains('close')) {
            sidebar.classList.toggle('close')
            toggleButton.classList.toggle('rotate')
        }


    }
    // to have one drop down at atime
    function closeAllSubMenus() {

        Array.from(sidebar.getElementsByClassName('show')).forEach((ul) => {
            ul.classList.remove('show');
            ul.previousElementSibling.classList.remove('rotate');
        });


    }
</script>