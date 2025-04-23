<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
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

        .content {
            margin-left: 250px;
            padding: 40px;
            width: calc(100% - 250px);
            background-color: #ffffff;
            min-height: 100vh;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            color: #222;
            margin-bottom: 20px;
            margin-left: 0;
        }

        .btn-primary {
            display: inline-block;
            background-color: #5EBC67;
            color: white;
            padding: 12px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
            margin-right: 10px;
        }

        .btn-primary:hover {
            background-color: #4fa858;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin-bottom: 50px;
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

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .button {
            padding: 8px 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
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
            padding: 8px 14px;
            border-radius: 5px;
            color: white;
            font-size: 14px;
            font-weight: 500;
            cursor: not-allowed;
            display: inline-block;
        }

        .error-message {
            color: #dc3545;
            font-weight: 500;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <?php include('../Http/controllers/areaadmin/sidebar.php'); ?>
    </div>

    <div class="content">
        <h1><?= $heading ?? 'Notifications' ?></h1>

        <a href="/areaadmin/notifications/create" class="btn-primary">Send New Notification</a>
        <a href="/areaadmin/notifications/deleted" class="btn-primary btn-secondary">Deleted Notifications</a>

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