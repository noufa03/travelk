<aside class="sidebar">
    <div class="sidebar-header">
        <img src="/assets/logo.png" alt="Travelk Logo" class="logo">
    </div>

    <nav class="sidebar-menu">
        <ul>
            <li><a href="/dashboard_hotel">Dashboard</a></li>
            <li><a href="/listing_hotel">My Listings</a></li>
            <li><a href="/review_hotel">User Reviews</a></li>
        </ul>

        <!-- Logout Button -->
        <form action="/session" method="POST" onsubmit="event.preventDefault(); this.submit();">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </nav>
</aside>

