<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

<style>
    /* Sidebar Styles */
    .sidebar {
        width: 210px;
        background-color: #f5f6f5;
        padding: 20px;
        position: fixed;
        height: 100%;
        left: 0;
        top: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        font-family: 'Poppins', sans-serif;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .logo-container {
        display: flex;
        align-items: center;
        margin-bottom: 40px;
        padding-left: 10px;
    }

    .logo {
        width: 100px;
        height: auto;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        flex-grow: 1;
    }

    .sidebar ul li {
        margin-bottom: 15px;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: #333;
        font-size: 14px;
        font-weight: 400;
        padding: 10px 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-radius: 6px;
        transition: background-color 0.3s ease, color 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }

    .sidebar ul li a:hover {
        background-color: #5EBC67;
    }

    /* Ensure the form doesn't add extra spacing */
    .sidebar ul li form {
        margin: 0;
        padding: 0;
        display: flex; /* Ensure the form behaves like a flex container */
        align-items: center;
    }

    .sidebar-button {
        all: unset;
        font-size: 14px;
        font-weight: 400;
        padding: 10px 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-radius: 6px;
        color: #333;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
        font-family: 'Poppins', sans-serif;
        box-sizing: border-box; /* Ensure padding is included in width */
        width: 100%; /* Match the width of the parent <li> */
    }

    .sidebar-button:hover {
        background-color: #5EBC67;
        color: #fff;
    }

    .copyright {
        font-size: 10px;
        font-weight: 300;
        color: #666;
        text-align: center;
        padding: 10px 0;
        font-family: 'Poppins', sans-serif;
    }

    .logout-btn {
        all: unset;
        font-size: 14px;
        font-weight: 400;
        padding: 10px 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-radius: 6px;
        color: #333;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
        font-family: 'Poppins', sans-serif;
        box-sizing: border-box;
        width: 100%;
    }

    .logout-btn:hover {
        background-color: #5EBC67;
        color: #fff;
    }
</style>

<div class="sidebar">
    <div>
        <div class="logo-container">
            <img src="/assets/admins/TravelkLOGO.png" alt="Logo" class="logo">
        </div>
        <ul>
            <li><a href="/areaadmin">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 9.5L12 3l9 6.5V21a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1V9.5z"/></svg>
                Home
            </a></li>

            <li><a href="/areaadmin/carrentals">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M5 13l1.5-4.5h11L19 13H5zm0 0v4a1 1 0 001 1h1a1 1 0 001-1v-1h8v1a1 1 0 001 1h1a1 1 0 001-1v-4H5z"/></svg>
                Car Rentals
            </a></li>

            <li><a href="/areaadmin/notifications">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 22a2 2 0 0 0 2-2H10a2 2 0 0 0 2 2zm6-6V9a6 6 0 10-12 0v7H4v2h16v-2h-2z"/></svg>
                Notifications
            </a></li>

            <li><a href="/areaadmin/places">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
                Places
            </a></li>

            <li><a href="/areaadmin/restaurants">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 2h2v20H4V2zm4 0h2v8h1V2h2v8h1V2h2v8a4 4 0 01-4 4v8h-2v-8a4 4 0 01-4-4V2z"/></svg>
                Restaurants
            </a></li>

            <li><a href="/areaadmin/accommodation">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 12h16M4 12v8h16v-8M4 12L12 4l8 8"/></svg>
                Accommodation
            </a></li>

            <li><a href="/areaadmin/inquiries">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.5 8.5 0 018 8v.5z"/></svg>
                Inquiries
            </a></li>

            <li>
                <form action="/areaadmin/profile" method="POST" style="display:inline;">
                    <input type="hidden" name="areaadminid" value="<?= $_SESSION['user']['areaadminid'] ?>">
                    <button type="submit" class="logout-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                        Profile
                    </button>
                </form>
            </li>

            <?php $areaadminid = $_SESSION['user']['areaadminid']; ?>
            <li>
                <form action="/areaadmin/logout" method="POST" onsubmit="return confirm('Are you sure you want to log out?');" style="display:inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="logout-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
    <div class="copyright">
        © 2025 travelLK. All rights reserved. <!-- Added to match previous sidebar -->
    </div>
</div>