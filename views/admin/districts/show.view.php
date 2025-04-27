<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            margin-left: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 0 50px 20px;
            max-width: 900px;
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
        }

        .no-districts {
            margin-left: 20px;
            color: #dc3545;
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .view-btn {
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

        .view-btn:hover {
            background-color: #4fa858;
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
        <?php if (count($districts) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>District Name</th>
                        <th>District ID</th>
                        <th>Admin Assigned</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($districts as $district): ?>
                        <tr>
                            <td><?= htmlspecialchars((string) ($district['district'] ?? 'N/A')) ?></td>
                            <td><?= htmlspecialchars((string) ($district['districtid'] ?? 'N/A')) ?></td>
                            <td>
                                <?php if (!empty($district['adminid'])): ?>
                                    <a class="view-btn" href="/admin/areaadmins/profile?id=<?= urlencode($district['adminid']) ?>">View</a>
                                <?php else: ?>
                                    <span>Not assigned</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-districts">No districts found.</p>
        <?php endif; ?>
    </div>
</body>
</html>