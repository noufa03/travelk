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
                width: 70%;
                border-collapse: collapse;
                margin: 30px 20px 50px;
                background-color: #ffffff;
                border: 1px solid #dee2e6;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
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
                min-width: 250px; /* Ensures it won't collapse */
                max-width: 250px;
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
                background-color: #ffffff;
                color: #333;
                margin: 5% auto;
                padding: 20px;
                border-radius: 8px;
                width: 50%;
                max-height: 80vh;
                overflow-y: auto;
                position: relative;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
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
                font-weight: bold;
                color: #222;
            }

            input, textarea {
                padding: 10px;
                margin-bottom: 20px;
                border-radius: 4px;
                border: 1px solid #ccc;
                font-size: 15px;
                background-color: #fff;
                color: #333;
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
        <?php include('../Http/controllers/areaadmin/sidebar.php'); ?>
    </div>

    <div class="content">
        <h1><?= $heading ?></h1>
        <a href="/areaadmin/notifications" class="btn-primary" style="background-color: #6c757d;">Go Back</a>

        <?php if (!empty($notifications) && is_array($notifications)): ?>
        <table>
            <thead>
                <tr>
                    <th>Notification</th>
                    <th>Sent on</th>
                    <th>Recipient</th>
                    <th>Deleted on</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ((array) $notifications as $notification): ?>
                    <tr>
                        <td><?= htmlspecialchars((string) $notification['body']) ?></td>
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
</html>