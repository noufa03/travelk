<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $heading ?></title>
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

        .admin-sidebar {
            width: 210px;
            background-color: #ffffff;
            padding: 30px 20px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            border-right: 1px solid #ddd;
            box-shadow: 2px 0 8px rgba(0,0,0,0.05);
        }

        .content {
            margin-left: 250px;
            padding: 40px;
            width: calc(100% - 250px);
            margin-top: 50px;
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

        .go-back-container {
            margin-bottom: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .go-back-btn {
            background-color: #5EBC67;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .go-back-btn:hover {
            background-color: #4fa858;
        }

        .rejection-message {
            margin: 20px auto;
            max-width: 800px;
            color: #dc3545;
            font-weight: 500;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php include('../Http/controllers/admin/header.php'); ?>
<div class="admin-sidebar">
    <?php include('../Http/controllers/admin/sidebar.php'); ?>
</div>
<div class="content">
    <h1><?= htmlspecialchars($areaadmin['first_name'] . ' ' . $areaadmin['last_name'] . '\'s') ?> Profile</h1>
    <div class="go-back-container">
        <a href="/admin/applications/allrejected" class="go-back-btn">Go Back</a>
    </div>
    <p class="rejection-message">This application has been rejected</p>
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
                    <?= $areaadmin['language_spk_eng'] ? 'English ' : '' ?>
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