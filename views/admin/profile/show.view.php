<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $heading ?></title>
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
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid #5EBC67;
            text-align: left;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }

        .profile-picture {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #5EBC67;
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
            padding: 14px 16px;
            border-bottom: 1px solid #eaeef2;
        }

        th {
            width: 30%;
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

        .profile-card a {
            background-color: #5EBC67;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .profile-card a:hover {
            background-color: #4fa858;
        }

        .go-back-container {
            margin-bottom: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .go-back-btn {
            background-color: #5EBC67;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .go-back-btn:hover {
            background-color: #4fa858;
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 20px;
                width: 100%;
            }

            .admin-sidebar {
                width: 100%;
                height: auto;
                position: static;
                box-shadow: none;
                border-right: none;
                border-bottom: 1px solid #ddd;
            }

            .profile-card {
                padding: 20px;
            }

            th, td {
                display: block;
                width: 100%;
                padding: 10px 16px;
            }

            th {
                background-color: transparent;
                font-weight: 600;
                padding-top: 15px;
                text-transform: uppercase;
            }

            td {
                padding-bottom: 15px;
                border-bottom: 1px solid #eaeef2;
            }
        }
    </style>
</head>
<body>
    <div class="admin-sidebar">
        <?php include('../Http/controllers/admin/sidebar.php'); ?>
    </div>
    <div class="content">
        <h1><?= htmlspecialchars($mainadmin['first_name'] . ' ' . $mainadmin['last_name'] . '\'s') ?> Profile</h1>
        <div class="go-back-container">
            <a href="/admin" class="go-back-btn">Go Back</a>
        </div>
        <div class="profile-card">
            <img src="<?= $mainadmin['profile'] ?>" alt="Profile Picture" class="profile-picture">
            <table>
                <tr>
                    <th>Full Name</th>
                    <td><?= htmlspecialchars($mainadmin['first_name'] . ' ' . $mainadmin['last_name']) ?></td>
                </tr>
                <tr>
                    <th>NIC</th>
                    <td><?= htmlspecialchars($mainadmin['nic']) ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= htmlspecialchars($mainadmin['email']) ?></td>
                </tr>
                <tr>
                    <th>Contact Number</th>
                    <td><?= htmlspecialchars($mainadmin['con_num']) ?></td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td><?= htmlspecialchars($mainadmin['dob']) ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?= htmlspecialchars($mainadmin['address']) ?></td>
                </tr>
                <tr>
                    <th>Languages Spoken</th>
                    <td>
                        <?= $mainadmin['language_eng'] ? 'English ' : '' ?>
                        <?= $mainadmin['language_sin'] ? 'Sinhala ' : '' ?>
                        <?= $mainadmin['language_tam'] ? 'Tamil' : '' ?>
                    </td>
                </tr>
                <tr>
                    <th>LinkedIn</th>
                    <td>
                        <?php if (!empty($mainadmin['linkedin'])): ?>
                            <a href="<?= htmlspecialchars($mainadmin['linkedin']) ?>" target="_blank">View LinkedIn</a>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>CV</th>
                    <td>
                        <?php if (!empty($mainadmin['cv'])): ?>
                            <a href="<?= htmlspecialchars($mainadmin['cv']) ?>" target="_blank">View CV</a>
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