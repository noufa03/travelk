<style>
    /* Sidebar Styles */
    .sidebar {
        width: 250px;
        background-color: #ffffff;
        padding: 30px 20px;
        position: fixed;
        height: 100%;
        left: 0;
        top: 0;
        border-right: 1px solid #ddd;
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.05);
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar ul li {
        margin-bottom: 18px;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: #333;
        font-size: 16px;
        font-weight: 500;
        padding: 10px 14px;
        display: block;
        border-radius: 6px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .sidebar ul li a:hover {
        background-color: #5EBC67;
        color: #fff;
    }

    .sidebar ul li a.active {
        background-color: #5EBC67;
        color: #fff;
        font-weight: 600;
    }
</style>

<div class="sidebar">
    <ul>
        <li><a href="/admin">Home</a></li>
        <li><a href="/admin/areaadmins">Area Admins</a></li>
        <li><a href="/admin/districts">Districts</a></li>
        <li><a href="/admin/carrentals">Car Rentals</a></li>
        <li><a href="/admin/notifications">Notifications</a></li>
        <li><a href="/admin/places">Places</a></li>
        <li><a href="/admin/restaurants">Restaurants</a></li>
        <li><a href="/admin/accommodation">Accommodation</a></li>
        <li><a href="/admin/inquiries">Inquiries</a></li>
        <li><a href="/admin/profile">Profile</a></li>
    </ul>
</div>