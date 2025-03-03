<!-- sidebar.php -->
<div class="sidebar">
    <ul>
        <li><a href="areaadmins">Area Admins</a></li>
        <li><a href="districts">Districts</a></li>
        <li><a href="carrentals">Car rentals</a></li>
        <li><a href="/notifications">Notifications</a></li>
        <li><a href="/admin/locations">Locations</a></li>
        <li><a href="/admin/locations">Restaurants</a></li>
        <li><a href="/admin/locations">Accommodation</a></li>
        <li><a href="/admin/settings">Settings</a></li>
        <!-- Add other sidebar items here -->
    </ul>
</div>

<style>
    /* Sidebar Styles */
    .sidebar {
        width: 250px; /* Sidebar width */
        background-color: #f4f4f4;
        padding: 20px;
        position: fixed;
        height: 100%;
        left: 0;
        top: 0;
        border-right: 2px solid #ddd;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul li {
        margin-bottom: 20px;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: #333;
        font-size: 18px;
        padding: 8px 12px;
        display: block;
        transition: background-color 0.3s ease;
    }

    .sidebar ul li a:hover {
        background-color: #007BFF;
        color: white;
    }
</style>