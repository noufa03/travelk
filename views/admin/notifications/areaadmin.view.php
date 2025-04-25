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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f8f9fa;
            color: #333;
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
            min-width: 250px;
            max-width: 250px;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            color: #222;
            margin-bottom: 30px;
            margin-left: 20px;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
            width: calc(100% - 280px);
            background-color: #ffffff;
            min-height: 100vh;
        }

        .btn-primary {
            display: inline-block;
            background-color: #5EBC67;
            color: white;
            padding: 12px 18px;
            margin-left: 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4fa858;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 30px 20px 50px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;
        }

        th {
            background-color: #f1f3f5;
            color: #333;
            font-weight: 600;
        }

        td {
            color: #555;
            background-color: #ffffff;
        }

        .error-message {
            margin-left: 20px;
            color: #dc3545;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <?php include('../Http/controllers/admin/sidebar.php'); ?>
    </div>

    <div class="content">
        <h1><?= $heading ?></h1>
        <a href="/admin/notifications" class="btn-primary" style="background-color: #6c757d;">Go Back</a>

        <?php if (!empty($notifications) && is_array($notifications)): ?>
        <table>
            <thead>
                <tr>
                    <th>Notification</th>
                    <th>Admin ID</th>
                    <th>Status</th>
                    <th>Sent on</th>
                    <th>Recipient</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notifications as $notification): ?>
                    <tr>
                        <td><?= htmlspecialchars($notification['body']) ?></td>
                        <td><?= htmlspecialchars($notification['adminid']) ?></td>
                        <td><?= htmlspecialchars($notification['status']) ?></td>
                        <td><?= htmlspecialchars($notification['created_at']) ?></td>
                        <td><?= htmlspecialchars($notification['recipient']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p class="error-message">No notifications found.</p>
        <?php endif; ?>
    </div>
</body>
</html>