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

        .view-button {
            background-color: #5EBC67;
        }

        .update-button {
            background-color: #4a9d53;
        }

        .delete-button {
            background-color: #dc3545;
        }

        .view-button:hover {
            background-color: #4fa858;
        }

        .update-button:hover {
            background-color: #3e8847;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        .modal,
        .popup-background {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .modal-content,
        .popup {
            background-color: #fff;
            color: #333;
            margin: 5% auto;
            padding: 30px;
            border-radius: 10px;
            width: 50%;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }

        .close-modal,
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
            color: #999;
        }

        .close-modal:hover,
        .close-btn:hover {
            color: #dc3545;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-weight: 600;
            color: #444;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #eaeef2;
            border-radius: 6px;
            font-size: 14px;
            color: #555;
            background-color: #fff;
            font-family: inherit;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #5EBC67;
            box-shadow: 0 0 0 3px rgba(94, 188, 103, 0.2);
        }

        button[type="submit"] {
            background-color: #5EBC67;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }

        button[type="submit"]:hover {
            background-color: #4fa858;
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
        <a href="/admin/notifications" class="btn-primary">Go Back</a>
        <?php if (!empty($notifications) && is_array($notifications)): ?>
        <table>
            <thead>
                <tr>
                    <th>Notification</th>
                    <th>Admin ID</th>
                    <th>Sent on</th>
                    <th>Recipient</th>
                    <th>Deleted on</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ((array) $notifications as $notification): ?>
                    <tr>
                        <td><?= htmlspecialchars((string) $notification['body']) ?></td>
                        <td><?= htmlspecialchars((string) $notification['adminid']) ?></td>
                        <td><?= htmlspecialchars((string) $notification['created_at']) ?></td>
                        <td><?= htmlspecialchars((string) $notification['recipient']) ?></td>
                        <td><?= htmlspecialchars((string) $notification['deleted_at']) ?></td>
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