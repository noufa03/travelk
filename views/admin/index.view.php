<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - travelLK</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
        }


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


        .header {
            position: fixed;
            top: 0;
            left: 210px;
            width: calc(100% - 210px);
            height: 60px;
            background-color: #f5f6f5;
            border-bottom: 1px solid #ddd;
            box-shadow: none;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 20px;
            font-family: 'Poppins', sans-serif;
            z-index: 1000;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-email {
            font-size: 14px;
            font-weight: 400;
            color: #333;
        }

        .profile-picture {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }


        .main-content {
            margin-left: 210px;
            margin-top: 60px;
            padding: 24px;
            min-height: calc(100vh - 60px);
            background-color: #f9fafb;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .dashboard-container {
            max-width: 1200px;
            width: 100%;
        }


        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 32px;
            margin-bottom: 32px;
        }

        .dashboard-card {
            background-color: #fff;
            padding: 32px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            min-height: 150px;
            transition: transform 0.2s ease;
        }

        .dashboard-card:hover {
            transform: scale(1.03);
        }

        .card-icon svg {
            width: 40px;
            height: 40px;
            color: #5EBC67;
        }

        .card-content h3 {
            font-size: 18px;
            font-weight: 400;
            color: #666;
            margin-bottom: 8px;
            text-align: center;
        }

        .card-content p {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            background-color: #f5f6f5;
            padding: 8px 16px;
            border-radius: 6px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>

    <?php include('../Http/controllers/admin/header.php'); ?>
    <?php include('../Http/controllers/admin/sidebar.php'); ?>

    <div class="main-content">
        <div class="dashboard-container">
        <div class="dashboard-cards">
    <div class="dashboard-card">
        <div class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
            </svg>
        </div>
        <div class="card-content">
            <h3>Total Places</h3>
            <p><?= htmlspecialchars($places['count'] ?? 0) ?></p>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 2h2v20H4V2zm4 0h2v8h1V2h2v8h1V2h2v8a4 4 0 01-4 4v8h-2v-8a4 4 0 01-4-4V2z"/>
            </svg>
        </div>
        <div class="card-content">
            <h3>Total Restaurants</h3>
            <p><?= htmlspecialchars($restaurants['count'] ?? 0) ?></p>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 12h16M4 12v8h16v-8M4 12L12 4l8 8"/>
            </svg>
        </div>
        <div class="card-content">
            <h3>Total Accommodations</h3>
            <p><?= htmlspecialchars($accommodation['count'] ?? 0) ?></p>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M5 13l1.5-4.5h11L19 13H5zm0 0v4a1 1 0 001 1h1a1 1 0 001-1v-1h8v1a1 1 0 001 1h1a1 1 0 001-1v-4H5z"/>
            </svg>
        </div>
        <div class="card-content">
            <h3>Cars to Rent</h3>
            <p><?= htmlspecialchars($carstorent['count'] ?? 0) ?></p>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </div>
        <div class="card-content">
            <h3>Area Administrators</h3>
            <p><?= htmlspecialchars($areaadmins['count'] ?? 0) ?></p>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM6 4h8l6 6v10a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1z"/>
            </svg>
        </div>
        <div class="card-content">
            <h3>Applications</h3>
            <p><?= htmlspecialchars($applications['count'] ?? 0) ?></p>
        </div>
    </div>
</div>
        </div>
    </div>
</body>
</html>