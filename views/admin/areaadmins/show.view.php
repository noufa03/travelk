<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Details</title>
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
            margin-top: 50px;
            padding: 40px;
            width: calc(100% - 250px);
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid #5EBC67;
            text-align: left;
            margin-left: 20px;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s;
            display: inline-block;
            border: none;
            cursor: pointer;
            margin-left: 10px; /* slight space between buttons */
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 0 50px 20px;
            max-width: 1000px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }

        th, td {
            text-align: left;
            padding: 14px 16px;
            border-bottom: 1px solid #eaeef2;
        }

        th {
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
            vertical-align: middle; /* Ensures vertical centering */
        }

        .btn-primary, .view-button {
            background-color: #5EBC67;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s;
            display: inline-block;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            margin-left: 20px;
            margin-bottom: 20px;
        }

        .btn-primary:hover, .view-button:hover {
            background-color: #4fa858;
        }

        td .view-button {
            display: inline-block;
            text-align: center;
            width: 80px; /* Fixed width for consistency */
            padding: 8px 0; /* Adjust padding for equal height */
        }

        .error-message {
            margin-left: 20px;
            color: #dc3545;
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<?php include('../Http/controllers/admin/header.php'); ?>
<div class="admin-sidebar">
    <?php include('../Http/controllers/admin/sidebar.php'); ?>
</div>
<div class="content">
    <h1><?= $heading ?></h1>
    <a href="/admin/applications" class="btn-primary" id="openPopup">Applications</a>
    <a href="/admin/areaadmins/dismissed" class="btn-danger">Dismissed</a>
    <?php if (empty($areaadmins) || !is_array($areaadmins)): ?>
        <p class="error-message">No admins found.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                <th style="width: 20%;">Admin Name</th>
                <th style="width: 20%;">Administrating District</th>
                <th style="width: 15%;">Phone</th>
                <th style="width: 20%;">Email</th>
                <th style="width: 10%;">Profile</th>
                <th style="width: 10%;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ((array) $areaadmins as $areaadmin): ?>
                    <tr>
                        <td><?= htmlspecialchars(($areaadmin['first_name'] ?? 'N/A') . ' ' . ($areaadmin['last_name'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string) ($areaadmin['district'] ?? 'N/A')) ?></td>
                        <td><?= htmlspecialchars((string) ($areaadmin['con_num'] ?? 'N/A')) ?></td>
                        <td><?= htmlspecialchars((string) ($areaadmin['email'] ?? 'N/A')) ?></td>
                        <td>
                            <a class="view-button" href="/admin/areaadmins/profile?id=<?= urlencode($areaadmin['areaadminid']) ?>">View</a>
                        </td>
                        <td>
                            <form method="POST" action="/admin/areaadmins/probation/password">
                                <input type="hidden" name="areaadminid" value="<?= htmlspecialchars($areaadmin['areaadminid']) ?>">
                                <button type="submit" class="view-button"><?= $areaadmin['probation'] ? 'Inactive' : 'Active' ?></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>