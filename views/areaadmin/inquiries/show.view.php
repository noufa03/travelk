<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reported Issues</title>
    <style>
        /* Same styles as your previous view */
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
            margin-bottom: 20px;
            margin-left: 20px;
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
            padding: 30px;
            width: calc(100% - 210px);
            background-color: #ffffff;
            min-height: 100vh;
        }

        input[type="text"] {
            margin-left: 20px;
            padding: 10px;
            width: 300px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 0 20px 50px;
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

        .status {
            padding: 6px 10px;
            border-radius: 5px;
            font-weight: 500;
            font-size: 14px;
            text-align: center;
            display: inline-block;
        }

        .status.pending { background-color: #ffc107; color: #212529; }
        .status.in_review { background-color: #17a2b8; color: white; }
        .status.resolved { background-color: #28a745; color: white; }
        .status.rejected { background-color: #dc3545; color: white; }

        .loading-spinner {
            margin-left: 20px;
            width: 20px;
            height: 20px;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-top: 4px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body>

<div class="sidebar">
    <?php include('../Http/controllers/areaadmin/sidebar.php'); ?>
</div>

<div class="content">
    <h1><?= $heading ?? 'Reported Issues' ?></h1>

    <table>
        <thead>
            <tr>
                <th>Issue</th>
                <th>Status</th>
                <th>User ID</th>
            </tr>
        </thead>
        <tbody id="issuesTableBody">
            <?php if (empty($issues) || !is_array($issues)): ?>
                <tr><td colspan="3">No issues found.</td></tr>
            <?php else: ?>
                <?php foreach ((array) $issues as $issue): ?>
                    <tr>
                        <td><?= htmlspecialchars($issue['issue']) ?></td>
                        <td><span class="status <?= htmlspecialchars($issue['status']) ?>"><?= htmlspecialchars($issue['status']) ?></span></td>
                        <td><?= htmlspecialchars($issue['userid']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>