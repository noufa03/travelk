<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $heading ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7f9;
            color: #333;
            display: flex;
        }

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
            align-items: chữa center;
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

        /* Header Styles */
        .header {
            position: fixed;
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

        /* Content Styles */
        .content {
            margin-left: 210px;
            padding: 40px;
            width: calc(100% - 210px);
            margin-top: 60px; /* Adjusted for header height */
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid #5EBC67;
            text-align: left;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }

        .profile-picture-main {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #5EBC67;
            margin: 0 auto 25px;
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 14px 16px;
            border-bottom: 1px solid #eaeef2;
        }

        th {
            width: 30%;
            background-color: #f8fbf8;
            color: #444;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            color: #555;
            font-size: 14px;
        }

        .profile-card a {
            background-color: #5EBC67;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .profile-card a:hover {
            background-color: #4fa858;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
                box-shadow: none;
                border-bottom: 1px solid #ddd;
            }

            .header {
                left: 0;
                width: 100%;
            }

            .content {
                margin-left: 0;
                padding: 20px;
                width: 100%;
            }

            .profile-card {
                padding: 20px;
            }

            th, td {
                display: block;
                width: 100%;
                padding: 10px 16px;
            }

            th {
                background-color: transparent;
                font-weight: 600;
                padding-top: 15px;
                text-transform: uppercase;
            }

            td {
                padding-bottom: 15px;
                border-bottom: 1px solid #eaeef2;
            }
        }
    </style>
</head>
<body>
<?php include('../Http/controllers/areaadmin/header.php'); ?>
<div class="sidebar">
    <?php include('../Http/controllers/areaadmin/sidebar.php'); ?>
</div>

<div class="content">
    <h1><?= htmlspecialchars($areaadmin['first_name'] . ' ' . $areaadmin['last_name'] . '\'s') ?> Profile</h1>

    <div class="profile-card">
        <img src="<?= $areaadmin['profile'] ?>" alt="Profile Picture" class="profile-picture-main">

        <table>
            <tr>
                <th>Full Name</th>
                <td><?= htmlspecialchars($areaadmin['first_name'] . ' ' . $areaadmin['last_name']) ?></td>
            </tr>
            <tr>
                <th>Admin ID</th>
                <td><?= htmlspecialchars($areaadmin['areaadminid']) ?></td>
            </tr>
            <tr>
                <th>NIC</th>
                <td><?= htmlspecialchars($areaadmin['nic']) ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= htmlspecialchars($areaadmin['email']) ?></td>
            </tr>
            <tr>
                <th>Contact Number</th>
                <td><?= htmlspecialchars($areaadmin['con_num']) ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?= htmlspecialchars($areaadmin['dob']) ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?= htmlspecialchars($areaadmin['address']) ?></td>
            </tr>
            <tr>
                <th>District</th>
                <td><?= htmlspecialchars($areaadmin['district']) ?></td>
            </tr>
            <tr>
                <th>Languages Spoken</th>
                <td>
                    <?= $areaadmin['language_eng'] ? 'English ' : '' ?>
                    <?= $areaadmin['language_sin'] ? 'Sinhala ' : '' ?>
                    <?= $areaadmin['language_tam'] ? 'Tamil' : '' ?>
                </td>
            </tr>
            <tr>
                <th>LinkedIn</th>
                <td>
                    <?php if (!empty($areaadmin['linkedin'])): ?>
                        <a href="<?= htmlspecialchars($areaadmin['linkedin']) ?>" target="_blank">View LinkedIn</a>
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>CV</th>
                <td>
                    <?php if (!empty($areaadmin['cv'])): ?>
                        <a href="<?= htmlspecialchars($areaadmin['cv']) ?>" target="_blank">View CV</a>
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>