<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Details</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7f9;
            color: #333;
            display: flex;
        }

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

        .content {
            margin-left: 250px;
            padding: 40px;
            width: calc(100% - 250px);
            min-height: 100vh;
            margin-top: 50px;
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            margin-left: 20px;
            padding-bottom: 15px;
            border-bottom: 3px solid #5EBC67;
        }

        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 0 20px 50px;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
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

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .button {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            transition: background-color 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .view-button {
            background-color: #6c757d;
        }

        .view-button:hover {
            background-color: #5c636a;
        }

        .error-message {
            margin-left: 20px;
            color: #dc3545;
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 20px;
        }

        @media (max-width: 1024px) {
            .content {
                margin-left: 0;
                width: 100%;
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            table {
                font-size: 13px;
            }

            th, td {
                padding: 10px 12px;
            }

            .button {
                padding: 10px 12px;
                font-size: 14px;
            }
        }

        @media (max-width: 600px) {
            .content {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <?php include('../Http/controllers/admin/sidebar.php'); ?>
    </div>
    <?php include('../Http/controllers/admin/header.php'); ?>
    <div class="content">
        <h1><?= $heading ?? 'Drivers' ?></h1>
        <table>
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">License No</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Hourly Rate</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="driversTableBody">
                <?php if (empty($drivers) || !is_array($drivers)): ?>
                    <tr>
                        <td colspan="6">No drivers found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($drivers as $driver): ?>
                        <tr>
                            <td><?= htmlspecialchars((string) ($driver['name'] ?? 'N/A')) ?></td>
                            <td><?= htmlspecialchars((string) ($driver['license_number'] ?? 'N/A')) ?></td>
                            <td><?= htmlspecialchars((string) ($driver['phone_number'] ?? 'N/A')) ?></td>
                            <td><?= htmlspecialchars((string) ($driver['hourlyrate_driver'] ?? 'N/A')) ?></td>
                            <td><?= $driver['status'] ? 'Active' : 'Inactive' ?></td>
                            <td class="action-buttons">
                                <a href="/driver?id=<?= urlencode($driver['driverid']) ?>" class="button view-button">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>