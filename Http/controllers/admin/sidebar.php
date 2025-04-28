<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

<style>

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
        margin-bottom: 12px;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: #333;
        font-size: 13px;
        font-weight: 400;
        padding: 8px 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        border-radius: 6px;
        transition: background-color 0.3s ease, color 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }

    .sidebar ul li a:hover {
        background-color: #5EBC67;
        color: #fff;
    }

    /* Ensure the form doesn't add extra spacing */
    .sidebar ul li form {
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
    }

    .sidebar-button {
        all: unset;
        font-size: 13px;
        font-weight: 400;
        padding: 8px 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        border-radius: 6px;
        color: #333;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
        font-family: 'Poppins', sans-serif;
        box-sizing: border-box;
        width: 100%;
    }

    .sidebar-button:hover {
        background-color: #5EBC67;
        color: #fff;
    }

    .sidebar svg {
        width: 16px;
        height: 16px;
    }

    .copyright {
        font-size: 9px;
        font-weight: 300;
        color: #666;
        text-align: center;
        padding: 10px 0;
        font-family: 'Poppins', sans-serif;
    }
</style>

<div class="sidebar">
    <div>
        <div class="logo-container">
            <img src="/assets/admins/TravelkLOGO.png" alt="Logo" class="logo">
        </div>
        <ul>
            <li><a href="/admin">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 3h4v4H3zm7 0h4v4h-4zm7 0h4v4h-4zM3 10h4v4H3zm7 0h4v4h-4zm7 0h4v4h-4zM3 17h4v4H3zm7 0h4v4h-4zm7 0h4v4h-4z"/>
                </svg>
                Home
            </a></li>

            <li><a href="/admin/areaadmins">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
                Area Admins
            </a></li>

            <li><a href="/admin/districts">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 2l8 8-8 8-8-8 8-8z"/>
                </svg>
                Districts
            </a></li>

            <li><a href="/admin/carrentals">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M5 13l1.5-4.5h11L19 13H5zm0 0v4a1 1 0 001 1h1a1 1 0 001-1v-1h8v1a1 1 0 001 1h1a1 1 0 001-1v-4H5z"/>
                </svg>
                Car Rentals
            </a></li>

            <li><a href="/admin/notifications">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 22a2 2 0 0 0 2-2H10a2 2 0 0 0 2 2zm6-6V9a6 6 0 10-12 0v7H4v2h16v-2h-2z"/>
                </svg>
                Notifications
            </a></li>

            <li><a href="/admin/places">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                </svg>
                Places
            </a></li>

            <li><a href="/admin/restaurants">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 2h2v20H4V2zm4 0h2v8h1V2h2v8h1V2h2v8a4 4 0 01-4 4v8h-2v-8a4 4 0 01-4-4V2z"/>
                </svg>
                Restaurants
            </a></li>

            <li><a href="/admin/accommodation">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 12h16M4 12v8h16v-8M4 12L12 4l8 8"/>
                </svg>
                Accommodation
            </a></li>

            <li><a href="/admin/profile">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 12c2.7 0 4-1.5 4-4s-1.3-4-4-4-4 1.5-4 4 1.3 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
                Profile
            </a></li>

            <li>
                <form action="/admin/logout" method="POST" onsubmit="return confirm('Are you sure you want to log out?');">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="sidebar-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
    <div class="copyright">
        © 2025 travelLK. All rights reserved.
    </div>
</div>