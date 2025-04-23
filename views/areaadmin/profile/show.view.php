<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $heading ?></title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
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
                min-width: 250px; /* Ensures it won't collapse */
                max-width: 250px;
            }

        .content {
            margin-left: 250px;
            padding: 40px;
            width: calc(100% - 250px);
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #1e2a38;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 12px;
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 6px 20px rgba(0,0,0,0.06);
            transition: box-shadow 0.3s ease;
        }

        .profile-card:hover {
            box-shadow: 0 8px 28px rgba(0,0,0,0.08);
        }

        .profile-picture {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #5EBC67;
            margin: 0 auto 25px;
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 16px 20px;
            vertical-align: middle;
        }

        th {
            width: 30%;
            background-color: #f9fafb;
            color: #555;
            font-weight: 600;
            border-bottom: 1px solid #eee;
        }

        td {
            background-color: #ffffff;
            color: #333;
            border-bottom: 1px solid #f1f3f5;
        }

        a {
            color: #1a73e8;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 20px;
                width: 100%;
            }

            .profile-card {
                padding: 20px;
            }

            th, td {
                display: block;
                width: 100%;
                padding: 10px 0;
            }

            th {
                background-color: transparent;
                font-weight: 700;
                padding-top: 15px;
            }

            td {
                padding-bottom: 15px;
                border-bottom: 1px solid #eee;
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
        <?php include('../Http/controllers/areaadmin/sidebar.php'); ?>
</div>

<div class="content">
    <h1><?= htmlspecialchars($areaadmin['first_name'] . ' ' . $areaadmin['last_name'] . '\'s') ?> Profile</h1>

    <div class="profile-card">
        <img src="<?= $areaadmin['profile'] ?>" alt="Profile Picture" class="profile-picture">

        <table>
            <tr>
                <th>Full Name</th>
                <td><?= htmlspecialchars($areaadmin['first_name'] . ' ' . $areaadmin['last_name']) ?></td>
            </tr>
            <tr>
                <th>Admin ID</th>
                <td><?= htmlspecialchars($areaadmin['areaadminid']) ?></td>
            </tr>
            <tr>
                <th>NIC</th>
                <td><?= htmlspecialchars($areaadmin['nic']) ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= htmlspecialchars($areaadmin['email']) ?></td>
            </tr>
            <tr>
                <th>Contact Number</th>
                <td><?= htmlspecialchars($areaadmin['con_num']) ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?= htmlspecialchars($areaadmin['dob']) ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?= htmlspecialchars($areaadmin['address']) ?></td>
            </tr>
            <tr>
                <th>District</th>
                <td><?= htmlspecialchars($areaadmin['district']) ?></td>
            </tr>
            <tr>
                <th>Languages Spoken</th>
                <td>
                    <?= $areaadmin['language_eng'] ? 'English ' : '' ?>
                    <?= $areaadmin['language_sin'] ? 'Sinhala ' : '' ?>
                    <?= $areaadmin['language_tam'] ? 'Tamil' : '' ?>
                </td>
            </tr>
            <tr>
                <th>LinkedIn</th>
                <td>
                    <?php if (!empty($areaadmin['linkedin'])): ?>
                        <a href="<?= htmlspecialchars($areaadmin['linkedin']) ?>" target="_blank">View LinkedIn</a>
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>CV</th>
                <td>
                    <?php if (!empty($areaadmin['cv'])): ?>
                        <a href="<?= htmlspecialchars($areaadmin['cv']) ?>" target="_blank">View CV</a>
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>