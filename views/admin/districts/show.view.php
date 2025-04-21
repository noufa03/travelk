<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $heading ?></title>
    <style>
            body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fb;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: #5EBC67;
            color: white;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #51a85a;
        }

        /* Content container */
        .content {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 40px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            height: 100vh;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        h1 {
            font-size: 26px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
        }

        /* Table Styling */
        table {
            width: 75%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
            margin-bottom: 70px;
            margin-left: 50px;
        }

        th, td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #eee;
            border-right: 1px solid #e0e0e0;
        }

        th {
            background-color: #f1f1f1;
            color: #333;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .no-districts {
            color: #999;
            font-size: 16px;
            margin-top: 20px;
        }

        .add-btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #5EBC67;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .add-btn:hover {
            background-color: #4aac59;
        }

        .view-btn {
            display: inline-block;
            padding: 10px 18px;
            background-color: #5EBC67;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .view-btn:hover {
            background-color: #4aac59;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <?php include('../Http/controllers/admin/sidebar.php'); ?>
    </div>

    <!-- Content -->
    <div class="content">
        <h1 style="margin-left: 50px;"><?= $heading ?></h1>

        <!-- Check if there are districts -->
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
                          <td><?php if (!empty($district['adminid'])): ?>
                                    <a class="view-btn" href="/admin/areaadmins/profile?id=<?= urlencode($district['adminid']) ?>">View</a>
                                <?php else: ?>
                                    <span>Not assigned</span>
                                <?php endif; ?></td>
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