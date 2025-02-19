
    <aside class="sidebar">
        <div class="sidebar-header">
            <img src="/assets/logo.png" alt="Travelk Logo" class="logo">
        </div>
        <nav class="sidebar-menu">
            <ul>
                <li><a href="/dashboard_hotel">Dashboard</a></li>
                <li><a href="/accommodation_hotel">Accommodation</a></li>
                <li><a href="/dining_hotel">Dining</a></li>
                <li><a href="/others_hotel">Other Services</a></li>
                <li><a href="/reports_hotel">User Reports</a></li>
            </ul>

            <!-- logout button sidebar -->
            <form action="/session" method="POST" onsubmit="event.preventDefault(); this.submit();">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-logout">Logout</button>
            </form>
        </nav>
    </aside>


