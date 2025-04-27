<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $heading ?? 'Notifications' ?></title>
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

        .btn-primary {
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
            margin-left: 20px;
            margin-bottom: 20px;
        }

        .btn-primary:hover {
            background-color: #4fa858;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .button {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            cursor: pointer;
        }

        .update-button {
            background-color: #4a9d53;
        }

        .delete-button {
            background-color: #dc3545;
        }

        .update-button:hover {
            background-color: #3e8847;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        .invalid-tag {
            background-color: #6c757d;
            padding: 8px 16px;
            border-radius: 6px;
            color: #fff;
            font-size: 14px;
            font-weight: 500;
            cursor: not-allowed;
            display: inline-block;
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
    <?php include('../Http/controllers/areaadmin/sidebar.php'); ?>
    <?php include('../Http/controllers/areaadmin/header.php'); ?>

    <div class="content">
        <h1><?= $heading ?? 'Notifications' ?></h1>

        <a href="/areaadmin/notifications/create" class="btn-primary">Send New Notification</a>
        <a href="/areaadmin/notifications/deleted" class="btn-primary">Deleted Notifications</a>

        <?php if (!empty($notifications) && is_array($notifications)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Notification</th>
                        <th>Sent Timestamp</th>
                        <th>Status</th>
                        <th>Recipient</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ((array) $notifications as $notification): ?>
                        <tr>
                            <td><?= htmlspecialchars((string) $notification['body']) ?></td>
                            <td>
                                <?php
                                    $datetime = new DateTime($notification['created_at']);
                                    echo $datetime->format('M j, Y · g:i A');
                                ?>
                            </td>
                            <td><?= ucfirst($notification['status']) ?></td>
                            <td><?= htmlspecialchars((string) $notification['recipient']) ?></td>
                            <td class="action-buttons">
                                <?php if ($notification['status'] === 'valid'): ?>
                                    <form action="/areaadmin/notifications/edit?id=<?= $notification['id'] ?>" method="GET" onsubmit="return confirm('Mark this notification as invalid? This cannot be undone.');" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($notification['id']) ?>">
                                        <button type="submit" class="button update-button">Mark as Invalid</button>
                                    </form>
                                <?php else: ?>
                                    <span class="invalid-tag">Invalid</span>
                                <?php endif; ?>
                                <form action="/areaadmin/notifications/delete" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($notification['id']) ?>">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="button delete-button">Delete</button>
                                </form>
                            </td>
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