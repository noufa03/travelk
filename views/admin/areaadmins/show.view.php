<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Details</title>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        background-color: #f9f9f9;
        color: #333;
    }

    .content {
        margin-left: 250px;
        padding: 30px;
        width: calc(100% - 250px);
    }

    h1 {
        font-size: 26px;
        font-weight: bold;
        color: #333;
        margin-bottom: 30px;
    }

    table {
        width: 85%;
        border-collapse: collapse;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin: 20px 0;
        margin-left: 50px;
    }

    th, td {
        padding: 16px;
        text-align: left;
        border-bottom: 1px solid #eee;
        border-right: 1px solid #ddd;
    }

    th:last-child,
    td:last-child {
        border-right: none;
    }

    th {
        background-color: #f0f0f0;
        color: #555;
        font-weight: 600;
    }

    tr:hover {
        background-color: #f7f7f7;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .button {
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .update-button {
        background-color: #5EBC67;
        color: white;
    }

    .delete-button {
        background-color: #FF5C5C;
        color: white;
    }

    .view-button {
        background-color: #5EBC67;
        color: white;
    }

    .btn-primary {
        display: inline-block;
        background-color: #5EBC67;
        color: white;
        padding: 12px 20px;
        margin-top: 20px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        border: none;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #4aac59;
    }

    .error-message {
        font-size: 16px;
        color: #999;
        margin: 20px;
    }
</style>
</head>

<body>

    <?php include('../Http/controllers/admin/sidebar.php'); ?>

    <div class="content">
        <h1 style="margin-left: 50px; font-size: 24px;"><?= $heading ?></h1>

        <a href="/admin/applications" class="btn-primary" id="openPopup" style="margin-left: 50px;">Applications</a>

        <?php if (empty($areaadmins) || !is_array($areaadmins)): ?>
            <p class="error-message" style="margin-left: 50px">No admins found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Admin Name</th>
                        <th>Administrating District</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Profile</th>
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
                                <a class="button view-button" href="/admin/areaadmins/profile?id=<?= urlencode($areaadmin['areaadminid']) ?>">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>